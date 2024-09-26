<?php

class Contacts extends Controller
{
    private $contactModel;

    public function __construct()
    {
        // Load the AuthModel for use in the controller
        $this->contactModel = $this->model('Contact');
    }
    public function ContactIndex()
    {
        $data['page_title'] = "Contact Us";
        $this->view("user/contactus", $data);
    }
    public function register()
    {
        if (isset($_POST['submit'])) {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $subject = trim($_POST['subject']);
            $message = trim($_POST['message']);
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

            // Validate inputs
            if (empty($subject)) {
                $errors['name'] = "Subject is required";
            }

            // Validate inputs
            if (empty($message)) {
                $errors['name'] = "Message is required";
            }
            if (empty($errors)) {
                // Register the user
                $register = $this->contactModel->register($name, $email, $subject, $message);

                if ($register) {
                    header("Location: " . BASE_URL . "/contact");
                    exit();
                } else {
                    $data['error_message'] = "Registration failed. Please try again.";
                    $this->view("user/contactus", $data);
                }
            } else {
                $data['errors'] = $errors;
                $this->view("user/contactus", $data);
            }
        } else {
            $this->contactIndex();
        }
    }
}
