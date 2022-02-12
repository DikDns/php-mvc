<?php
    
class App {
    //! CONTROLER PROPERTY
    protected $controller = "Home";
    //! METHOD PROPERTY
    protected $method = "index";
    //! PARAMATERS PROPERTY
    protected $params = [];

    //! CONSTRUCT METHOD
    public function __construct(){
        //* Parsing URL in new Instance
        $url = $this->parse_url();

        //* IF URL[0] IS A NULL OR NOT SET YET
        if ( !isset($url[0]) ){
            // Simpan default controllernya di url
            $url[] = $this->controller;
        }
        //* IF URL[1] IS A NULL OR NOT SET YET
        if ( !isset($url[1]) ){
            // Simpan default methodnya di url
            $url[] = $this->method;
        }
        
        //* IF CONTROLLER EXISTS
        if ( file_exists("../app/controllers/" . $url[0] . ".php") ){
            // Set new controller
            $this->controller = $url[0];
            // Remove first child in url
            unset($url[0]);
        }
        //? Tambah object yang dipilih controller
        require_once "../app/controllers/" . $this->controller . ".php";
        // Buat instance baru dari object itu
        $this->controller = new $this->controller;
        
        //* IF METHOD EXISTS
        if ( method_exists( $this->controller, $url[1]) ){
            // Set new method
            $this->method = $url[1];
            // Remove first child in url
            unset($url[1]);
        }
        
        //* IF URL[] NOT EMPTY ACCESS PARAMS
        if ( !empty($url) ){
            // Pindahkan value dari url ke property params
            $this->params = array_values($url);
        }
        
        //* RUN CONTROLLER & METHOD IF PARAMS EXISTS
        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    //! PARSE URL METHOD
    public function parse_url(){

        //! Routing URL
        if( isset($_GET["url"]) ){
            // Menghilangkan '/' di akhir address
            $url = rtrim($_GET["url"], "/");
            // Filter dari character jahat
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Pisahkan dengan '/' menjadi array
            $url = explode("/", $url);
            // Return
            return $url;
        }

    }
}