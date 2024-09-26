<?php 

class CustomerServiceController extends Controller {
    
    public function viewServicesByCategory() {
        $serviceModel = $this->model('CustomerServiceModel'); 
        $servicesByCategory = $serviceModel->getServicesGroupedByCategory();    
        $data['servicesByCategory'] = $servicesByCategory;
        $data['page_title'] = "Services";
        $this->view('services/ViewServicesByCategory', $data);
    }
}
