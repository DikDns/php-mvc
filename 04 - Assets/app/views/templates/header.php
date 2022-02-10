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
    <!-- BootStrap V5 -->
    <link href="<?= Constant::$BASEURL; ?>/css/bootstrap.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand ms-4" href="<?= Constant::$BASEURL; ?>">PHP MVC</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" href="<?= Constant::$BASEURL; ?>">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?= Constant::$BASEURL; ?>/about">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>