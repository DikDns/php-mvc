<?php
    
class Flasher {

    public static function setFlash($msg, $action, $type){
        $_SESSION["flash"] = [
            "msg" => $msg,
            "action" => $action,
            "type" => $type
        ];
    }

    public static function flash(){

        if ( isset($_SESSION["flash"]) ){
            echo '
                <script>
                    Swal.fire({
                        icon: "' . $_SESSION["flash"]["type"] . '",
                        title: "' . $_SESSION["flash"]["msg"] . ' ' . $_SESSION["flash"]["action"] . ' Student\'s Data"
                    });
                </script>
            ';
            unset($_SESSION["flash"]);
        }

    }

}