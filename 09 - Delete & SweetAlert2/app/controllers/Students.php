<?php
    
class Students extends Controller {
    protected $controller = __CLASS__;

    public function index(){
        $method = ucfirst(__FUNCTION__);
        $data = [
            "controller" => $this->controller,
            "method" => $method,
            "students" => $this->model("Students_model")->getAllStudents()
        ];
        $this->view("templates/header", $data);
        $this->view("students/index", $data);
        $this->view("templates/footer", $data);
    }

    public function details($id){
        $method = ucfirst(__FUNCTION__);
        $data = [
            "controller" => $this->controller,
            "method" => $method,
            "students" => $this->model("Students_model")->getStudentById($id)
        ];
        $this->view("templates/header", $data);
        $this->view("students/details", $data);
        $this->view("templates/footer", $data);
    }

    public function insert(){
        
        if ( $this->model("Students_model")->insertStudent($_POST) > 0 ){
            Flasher::setFlash("Success", "Inserting", "success");
            header("Location: " . BASEURL . "/students");
            exit;
        } else {
            Flasher::setFlash("Failed", "Inserting", "error");
            header("Location: " . BASEURL . "/students");
            exit;
        }

    }

    public function delete($id){
        
        if ( $this->model("Students_model")->deleteStudent($id) > 0 ){
            Flasher::setFlash("Success", "Deleting", "success");
            header("Location: " . BASEURL . "/students");
            exit;
        } else {
            Flasher::setFlash("Failed", "Deleting", "error");
            header("Location: " . BASEURL . "/students");
            exit;
        }

    } 
}