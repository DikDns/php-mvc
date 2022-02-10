<?php
    
class Controller {

    //! VIEW METHOD
    public function view($address, $data = []){
        // Aktifkan View
        require_once "../app/views/".$address.".php"; 

    }
}