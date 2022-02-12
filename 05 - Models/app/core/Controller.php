<?php
    
class Controller {

    //! VIEW METHOD
    public function view($view, $data = []){
        // Aktifkan View
        require_once "../app/views/".$view.".php"; 
    }

    //! MODEL METHOD
    public function model($model){
        // Aktifkan Model
        require_once "../app/models/".$model.".php";
        // Return in object type 
        return new $model;
    }
}