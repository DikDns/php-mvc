<?php
    
class App {
    public function __construct(){
        $url = $this->parse_url();
        var_dump($url);
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