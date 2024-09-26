
<?php

class Home extends Controller {

    
    public function index() 
    {
        $data['page_title'] = "Home";
        $this->view("index", $data);
    }
    public function about()
    {
        $data['page_title'] = "About Us";
        $this->view("user/about", $data);
    }

}
