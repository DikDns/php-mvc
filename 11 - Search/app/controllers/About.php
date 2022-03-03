<?php
class About extends Controller {
    //! Property of Current Controller
    protected $controller = __CLASS__;

    //! DEFAULT METHOD
    public function index($name = "DikDns", $job = "programmer"){
        // Add Data Current Method
        $method =  ucfirst(__FUNCTION__);
        // Construct Data
        $data = [
            "controller" => $this->controller,
            "method" => $method,
            "name" => $name,
            "job" => $job
        ];

        // View Template Header
        $this->view("templates/header", $data);
        // View Current Controller
        $this->view("about/index", $data);
        // View Template Footer
        $this->view("templates/footer", $data);
    }

    //! PAGE METHOD
    public function page(){
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
        $this->view("about/page", $data);
        // View Template Footer
        $this->view("templates/footer", $data);
    }
}