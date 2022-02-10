<?php 

class Home extends Controller {
    //! Property of Current Controller
    protected $controller = __CLASS__;
    
    //! DEFAULT METHOD
    public function index() {
        // Add Data Current Method
        $method = ucfirst(__FUNCTION__);
        // Construct Data
        $data = [
            "controller" => $this->controller,
            "method" => $method
        ];

        // View Template Header
        $this->view("templates/header", $data);
        // View Current Controller
        $this->view("home/index", $data);
        // View Template Footer
        $this->view("templates/footer", $data);
    }
}