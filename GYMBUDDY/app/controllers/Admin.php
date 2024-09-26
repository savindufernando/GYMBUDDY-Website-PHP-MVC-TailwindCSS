<?php

class Admin extends Controller {

    public function index() 
    {
        
        
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Check if the user is logged in
        if (!isset($_SESSION['role'])) {
            header("Location: " . BASE_URL . "/home");
            exit();
        }
        // Check if the user is an admin
        if ($_SESSION['role'] == 'admin') {
            $_SESSION['page_title'] = "Dashboard";
            $this->view('admin/dashboard');
        } else {
            header("Location: " . BASE_URL . "/home");
            exit();
        }
    }

    public function Add() 
    {
        
        // Start the session if not started already
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Check if the user is logged in
        if (!isset($_SESSION['role'])) {
            header("Location: " . BASE_URL . "/home");
            exit();
        }

        // Check if the user is an admin
        if ($_SESSION['role'] == 'admin') {
            $_SESSION['page_title'] = "Add Product";
            $this->view('products/AddProduct');
        } else {
            header("Location: " . BASE_URL . "/home");
            exit();
        }
    }
    public function AddS() 
    {
        
        // Start the session if not started already
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Check if the user is logged in
        if (!isset($_SESSION['role'])) {
            header("Location: " . BASE_URL . "/home");
            exit();
        }

        // Check if the user is an admin
        if ($_SESSION['role'] == 'admin') {
            $_SESSION['page_title'] = "Add Service";
            $this->view('services/AddService');
        } else {
            header("Location: " . BASE_URL . "/home");
            exit();
        }
    }
}
