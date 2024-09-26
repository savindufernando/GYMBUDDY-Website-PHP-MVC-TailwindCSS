<?php

class Contact
{
    private $db;

    public function __construct()
    {
        // Initialize the database connection (PDO assumed)
        $this->db = new Database();
    }
    // Function to register a new user
    public function register($name, $email, $subject, $message)
    {
        // Insert query to register the user
        $query = "INSERT INTO contacts (name, email, subject, message) VALUES (:name, :email, :subject, :message)";
        $this->db->query($query);
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':subject', $subject);
        $this->db->bind(':message', $message);

        // Execute the query and return true if successful
        return $this->db->execute();
    } 
}
