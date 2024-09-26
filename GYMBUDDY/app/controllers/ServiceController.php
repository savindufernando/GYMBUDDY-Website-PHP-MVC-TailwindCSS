<?php

class ServiceController extends Controller {

    public function addService() {
        if (isset($_POST['submit'])) {

            $service_name = $_POST['service_name'];
            $service_category = $_POST['service_category'];
            $service_price = $_POST['service_price'];
            $service_brand = $_POST['service_brand'];
            $service_description = $_POST['service_description'];

            // Check if the file is uploaded and valid
            if (isset($_FILES['service_image']) && is_uploaded_file($_FILES['service_image']['tmp_name'])) {
                $filename = $_FILES["service_image"]["name"];
                $file_tmp = $_FILES["service_image"]["tmp_name"];
                $upload_dir = "uploads/";
                $folder = $upload_dir . $filename;

                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                // Check if copy is successful
                if (copy($file_tmp, $folder)) {
                    $display_message = "File uploaded successfully!";
                } else {
                    $display_message = "File upload failed!";
                    $folder = ''; // Set folder to empty if file upload fails
                }
            } else {
                // Handle the case where no file is uploaded
                $folder = ''; // No image uploaded
            }
            // Add service to the database
            $service = $this->model('ServiceModel');
            $service->addService($service_name, $service_category, $service_price, $service_brand, $service_description, $folder); 
            header("Location: " . BASE_URL . "/addservice");
            exit;
        }
    }

    public function showServices() {
        $service = $this->model('ServiceModel'); 
        $services = $service->getServices();    
        $data['services'] = $services;
        $data['page_title'] = "Services";
        $this->view('services/ViewService', $data);
    }

    public function deleteService() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['id'])) {
                $id = $_POST['id'];

                $service = $this->model('ServiceModel');
                $service->deleteServiceById($id);

                header("Location: " . BASE_URL . "/viewservice");
                exit();
            }
        }
    }

    public function updateService() {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $service_name = $_POST['service_name'];
            $service_category = $_POST['service_category'];
            $service_price = $_POST['service_price'];
            $service_brand = $_POST['service_brand'];
            $service_description = $_POST['service_description'];

            // Check if a new file is uploaded
            if (isset($_FILES['service_image']) && is_uploaded_file($_FILES['service_image']['tmp_name'])) {
                $filename = $_FILES["service_image"]["name"];
                $file_tmp = $_FILES["service_image"]["tmp_name"];
                $upload_dir = "uploads/";
                $folder = $upload_dir . $filename;

                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                if (!copy($file_tmp, $folder)) {
                    $folder = ''; // Use empty string if the file upload fails
                }
            } else {
                // If no new file is uploaded, maintain the previous image
                $service = $this->model('ServiceModel');
                $existingService = $service->getServiceById($id);
                $folder = $existingService->service_image; // Keep the old image
            }

            // Update the service
            $service = $this->model('ServiceModel');
            $service->updateServiceById($id, $service_name, $service_category, $service_price, $service_brand, $service_description, $folder);
            header("Location: " . BASE_URL . "/viewservice");
            exit();
        }
    }

    public function getServiceById($id) {
        $service = $this->model('ServiceModel');
        $serviceDetails = $service->getServiceById($id);
        echo json_encode($serviceDetails); // Return service details as JSON
    }

    public function getServiceCount() {
        $service = $this->model('ServiceModel');
        $serviceCount = $service->countServices(); // Fetch service count
    
        // Return service count to be used in other controllers
        return $serviceCount ?? 0; // Return 0 if no count is found
    }
    public function ViewServices()
    {
        $data['page_title'] = "Services";
        $this->view("services/CustomerViewService", $data);
    }
    
    
    
}
