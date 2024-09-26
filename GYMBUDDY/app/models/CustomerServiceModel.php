<?php

class CustomerServiceModel {
    private $db;

    public function __construct() {
        $this->db = new Database(); 
    }

    public function getServicesGroupedByCategory() {
        $this->db->query("SELECT service_category, service_name, service_price, service_brand, service_description, service_image 
                          FROM services 
                          ORDER BY service_category");
        $result = $this->db->resultSet();
        $servicesByCategory = [];
        foreach ($result as $service) {
            $servicesByCategory[$service->service_category][] = $service;
        }
        
        return $servicesByCategory;
    }
}
