<?php
class DashboardController {
    public function index() {
        $data['messageCount'] = $this->getMessageCount(); // Example function to fetch messages count
        $data['productCount'] = $this->getProductCount();
        $data['serviceCount'] = $this->getServiceCount();
        $data['userCount'] = $this->getUserCount();
        $data['adminCount'] = $this->getAdminCount();
        
        // Fetch user name from session
        $data['userName'] = $_SESSION['name'] ?? 'Guest';

        $this->view('admin/dashboard', $data);
    }

    private function getMessageCount() {
        // Logic for counting messages
        return 10; // Placeholder value
    }

    private function getProductCount() {
        return 25; // Placeholder value
    }

    private function getServiceCount() {
        return 5; // Placeholder value
    }

    private function getUserCount() {
        return 100; // Placeholder value
    }

    private function getAdminCount() {
        return 5; // Placeholder value
    }
}
?>