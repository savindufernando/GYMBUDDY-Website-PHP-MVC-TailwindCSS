<?php

class ServiceModel {
    private $db;

    public function __construct() {
        $this->db = new Database(); 
    }

    public function addService($service_name, $service_category, $service_price, $service_brand, $service_description, $folder) {
        $query = "INSERT INTO services (service_name, service_category, service_price, service_brand, service_description, service_image) 
                  VALUES (:service_name, :service_category, :service_price, :service_brand, :service_description, :folder)";
        $this->db->query($query);
    
        $this->db->bind(':service_name', $service_name);
        $this->db->bind(':service_category', $service_category);
        $this->db->bind(':service_price', $service_price);
        $this->db->bind(':service_brand', $service_brand);
        $this->db->bind(':service_description', $service_description);
        $this->db->bind(':folder', $folder);

        $this->db->execute();
    }

    public function getServices() {
        $this->db->query("SELECT id, service_name, service_category, service_price, service_brand, service_description, service_image FROM services");
        $result = $this->db->resultSet();
        return $result;
    }

    public function deleteServiceById($id) {
        $this->db->query("DELETE FROM services WHERE id = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();
    }

    public function updateServiceById($id, $service_name, $service_category, $service_price, $service_brand, $service_description, $folder) {
        $query = "UPDATE services SET service_name = :service_name, service_category = :service_category, service_price = :service_price, 
                  service_brand = :service_brand, service_description = :service_description, service_image = :folder WHERE id = :id";
        
        $this->db->query($query);
    
        $this->db->bind(':id', $id);
        $this->db->bind(':service_name', $service_name);
        $this->db->bind(':service_category', $service_category);
        $this->db->bind(':service_price', $service_price);
        $this->db->bind(':service_brand', $service_brand);
        $this->db->bind(':service_description', $service_description);
        $this->db->bind(':folder', $folder);
    
        $this->db->execute();
    }

    public function getServiceById($id) {
        $query = "SELECT * FROM services WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function countServices() {
        $query = "SELECT COUNT(*) as count FROM services";
        $this->db->query($query);
        $result = $this->db->single();
    
        // Debugging: Log the result fetched from the database
        error_log("Count result from DB: " . json_encode($result));
    
        return $result ? $result->count : 0; // Return 0 if no result is found
    }
    
    
    
}