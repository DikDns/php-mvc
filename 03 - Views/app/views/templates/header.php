<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            if ( isset($data["controller"] )){
                echo $data["controller"];
            }  
            if ( isset($data["method"]) && $data["method"] != "Index" ) {
                echo " | " . $data["method"];
            } 
        ?>
    </title>
</head>
<body>