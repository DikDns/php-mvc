<?php
class About {
    //! DEFAULT METHOD
    public function index($name = "DikDns", $work = "programmer"){
        echo "About/index <br>";
        echo "Halo nama saya $name, saya adalah seorang $work.";
    }

    //! PAGE METHOD
    public function page(){
        echo "About/page";
    }
}