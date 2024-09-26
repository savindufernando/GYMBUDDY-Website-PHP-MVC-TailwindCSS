<?php

class AuthController extends Controller
{
    private $authModel;

    public function __construct()
    {
        // Load the AuthModel for use in the controller
        $this->authModel = $this->model('AuthModel');
    }

    // Show the login page
    public function loginIndex()
    {
        $data['page_title'] = "Login";
        $this->view("user/LoginPage", $data);
    }
     // Method to show all users
     public function showUsers()
     {
         if (session_status() == PHP_SESSION_NONE) {
             session_start();
         }
 
         if ($_SESSION['role'] === 'admin') {
             $data['users'] = $this->authModel->getAllUsers();
             $data['page_title'] = "Accounts";
             $this->view("admin/accounts", $data);
         } else {
             header("Location: " . BASE_URL . "/login");
             exit();
         }
     }
    // Function to log in a user
    public function login()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_POST['submit'])) {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            // Use the AuthModel to log in the user
            $user = $this->authModel->login($email, $password);

            if ($user) {
                // Store user details in session
                $_SESSION['id'] = $user->id;
                $_SESSION['name'] = $user->name;
                $_SESSION['email'] = $user->email;
                $_SESSION['role'] = $user->role;

                // Redirect based on user role
                if ($_SESSION['role'] == 'admin') {
                    header("Location: " . BASE_URL . "/dashboard");
                } elseif ($_SESSION['role'] == 'user') {
                    header("Location: " . BASE_URL . "/index");
                }
                exit();
            } else {
                // Login failed
                $data['error_message'] = "Incorrect email or password!";
                $this->view("user/LoginPage", $data);
            }
        } else {
            $this->loginIndex();
        }
    }

    // Function to logout a user
    public function logout()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Destroy session and redirect to login page
        session_destroy();
        header("Location: " . BASE_URL . "/login");
        exit();
    }

    // Show the sign-up page
    public function signupIndex()
    {
        $data['page_title'] = "Sign Up";
        $this->view("user/SignupPage", $data);
    }

    // Function to register a new user
    public function register()
    {
        if (isset($_POST['submit'])) {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $cpassword = trim($_POST['cpassword']);
            $errors = [];

            // Validate inputs
            if (empty($name)) {
                $errors['name'] = "Name is required";
            }

            if (empty($email)) {
                $errors['email'] = "Email is required";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Email is invalid";
            }

            if (empty($password)) {
                $errors['password'] = "Password is required";
            } elseif (strlen($password) < 6) {
                $errors['password'] = "Password must be at least 6 characters";
            }

            if (empty($cpassword)) {
                $errors['cpassword'] = "Confirm Password is required";
            } elseif ($password !== $cpassword) {
                $errors['cpassword'] = "Passwords do not match";
            }

            // Check if email already exists
            if ($this->authModel->emailExists($email)) {
                $errors['email'] = "Email already exists";
            }

            if (empty($errors)) {
                // Register the user
                $register = $this->authModel->register($name, $email, $password, 'user');

                if ($register) {
                    header("Location: " . BASE_URL . "/login");
                    exit();
                } else {
                    $data['error_message'] = "Registration failed. Please try again.";
                    $this->view("SignupPage", $data);
                }
            } else {
                $data['errors'] = $errors;
                $this->view("SignupPage", $data);
            }
        } else {
            $this->signupIndex();
        }
    }
    public function registerAll()
    {
        if (isset($_POST['submit'])) {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $cpassword = trim($_POST['cpassword']);
            $role = trim($_POST['role']);
            $errors = [];

            // Validate inputs
            if (empty($name)) {
                $errors['name'] = "Name is required";
            }

            if (empty($email)) {
                $errors['email'] = "Email is required";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Email is invalid";
            }

            if (empty($password)) {
                $errors['password'] = "Password is required";
            } elseif (strlen($password) < 6) {
                $errors['password'] = "Password must be at least 6 characters";
            }

            if (empty($cpassword)) {
                $errors['cpassword'] = "Confirm Password is required";
            } elseif ($password !== $cpassword) {
                $errors['cpassword'] = "Passwords do not match";
            }

            // Check if email already exists
            if ($this->authModel->emailExists($email)) {
                $errors['email'] = "Email already exists";
            }

            if (empty($errors)) {
                // Register the user
                $register = $this->authModel->registerAll($name, $email, $password, $role);

                if ($register) {
                    header("Location: " . BASE_URL . "/addacc");
                    exit();
                } else {
                    $data['error_message'] = "Registration failed. Please try again.";
                    $this->view("admin/accounts", $data);
                }
            } else {
                $data['errors'] = $errors;
                $this->view("admin/accounts", $data);
            }
        } else {
            $this->signupIndex();
        }
    }
    // Show the update form
    public function updateIndex()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['id'])) {
            $userId = $_SESSION['id'];
            $user = $this->authModel->getUserById($userId);

            if ($user) {
                $data['user'] = $user;
                $data['page_title'] = "Update Profile";
                $this->view("admin/updateProfile", $data);
            } else {
                // User not found, redirect to login
                header("Location: " . BASE_URL . "/login");
                exit();
            }
        } else {
            // No session, redirect to login
            header("Location: " . BASE_URL . "/login");
            exit();
        }
    }

    // Function to handle user profile update
    public function update()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (isset($_SESSION['id']) && isset($_POST['submit'])) {
            $userId = $_SESSION['id'];
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $cpassword = trim($_POST['cpassword']);
            $errors = [];

            if (empty($name)) {
                $errors['name'] = "Name is required";
            }

            if (empty($email)) {
                $errors['email'] = "Email is required";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors['email'] = "Email is invalid";
            }

            if (!empty($password)) {
                if (strlen($password) < 6) {
                    $errors['password'] = "Password must be at least 6 characters";
                }

                if ($password !== $cpassword) {
                    $errors['cpassword'] = "Passwords do not match";
                }
            }

            if (empty($errors)) {
                $hashed_password = !empty($password) ? password_hash($password, PASSWORD_BCRYPT) : null;

                $update = $this->authModel->updateUser($userId, $name, $email, $hashed_password);

                if ($update) {
                    // Update successful, redirect to profile or home
                    header("Location: " . BASE_URL . "/home");
                    exit();
                } else {
                    $data['error_message'] = "Update failed. Please try again.";
                    $this->view("updateProfile", $data);
                }
            } else {
                $data['errors'] = $errors;
                $this->view("admin/updateProfile", $data);
            }
        } else {
            // No session or form submission, redirect to login
            header("Location: " . BASE_URL . "/login");
            exit();
        }
    }


    public function dashboard() {
        // Load service count from ServiceController
        $serviceController = new ServiceController();
        $serviceCount = $serviceController->getServiceCount(); // Fetch service count

        $data['serviceCount'] = $serviceCount;

        // Load the dashboard view and pass the data
        $this->view('admin/dashboard', $data);
    }
    public function AddAccIndex()
    {
        $data['page_title'] = "Add Accounts";
        $this->view("admin/addaccounts", $data);
    }
}
