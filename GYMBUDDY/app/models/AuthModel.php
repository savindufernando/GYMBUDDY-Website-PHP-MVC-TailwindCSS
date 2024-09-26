<?php

class AuthModel
{
    private $db;

    public function __construct()
    {
        // Initialize the database connection (PDO assumed)
        $this->db = new Database();
    }

    // Function to log in a user
    public function login($email, $password)
    {
        // Query to find the user by email
        $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $this->db->query($query);
        $this->db->bind(':email', $email);
        $user = $this->db->single();

        if ($user) {
            // Verify the password (assuming password is hashed)
            if (password_verify($password, $user->password)) {
                return $user; // Login successful, return the user object
            }
        }

        return false; // Login failed
    }

    // Function to check if an email already exists
    public function emailExists($email)
    {
        $query = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $this->db->query($query);
        $this->db->bind(':email', $email);
        $this->db->execute();

        // Return true if email exists, otherwise false
        return $this->db->rowCount() > 0;
    }

    // Function to register a new user
    public function register($name, $email, $password, $role = 'user')
    {
        // Hash the password before storing it
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insert query to register the user
        $query = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)";
        $this->db->query($query);
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $hashed_password);
        $this->db->bind(':role', $role);

        // Execute the query and return true if successful
        return $this->db->execute();
    }
    public function registerAll($name, $email, $password, $role)
    {
        // Hash the password before storing it
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insert query to register the user
        $query = "INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)";
        $this->db->query($query);
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $hashed_password);
        $this->db->bind(':role', $role);

        // Execute the query and return true if successful
        return $this->db->execute();
    }
    public function getUserById($id)
    {
        $query = "SELECT * FROM users WHERE id = :id LIMIT 1";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    public function updateUser($id, $name, $email, $password = null)
    {
        if ($password) {
            $query = "UPDATE users SET name = :name, email = :email, password = :password WHERE id = :id";
            $this->db->query($query);
            $this->db->bind(':password', $password);
        } else {
            $query = "UPDATE users SET name = :name, email = :email WHERE id = :id";
            $this->db->query($query);
        }

        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
    public function getUserCount() {
        // Query to get count of all users with role 'user'
        $query = "SELECT COUNT(*) as count FROM users WHERE role = 'user'";
        $this->db->query($query);
        return $this->db->single()->count;
    }
    
    public function getAdminCount() {
        // Query to get count of all users with role 'admin'
        $query = "SELECT COUNT(*) as count FROM users WHERE role = 'admin'";
        $this->db->query($query);
        return $this->db->single()->count;
    }
    public function getAllUsers()
    {
        $query = "SELECT * FROM users";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function deleteUser($id)
    {
        $query = "DELETE FROM users WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
    
}
