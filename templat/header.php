<?php 

    include_once("config/url.php");
    include_once("config/process.php");

    // limpa a mensagem
    if(isset($_SESSION['msg'])) {
        $printMsg = $_SESSION['msg'];
        $_SESSION['msg'] = '';
    }
  
?>


<!DOCTYPE html>
<html lang="pt-br" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>agenda</title>

    <!-- bootstrap-->
    <link rel="stylesheet" href="<?= $BASE_URL ?>bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <!--fonte-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--css-->
    <link rel="stylesheet" href="<?= $BASE_URL ?>css/styles.css">

</head>
<body>

    <header>
        <nav class="navbar navbar-expand-lg  bg-success">
        <a class="navbar-brand" href="<?=$BASE_URL?>index.php">
        <img src="<?=$BASE_URL?>img/logo.svg" class="img-fluid" alt="agenda">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div>
            <div class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link " id="home-link" href="<?=$BASE_URL?>index.php" >Agenda</a>
                </li>
                <li class="nav-item">
                <a class="nav-link " href="<?=$BASE_URL?>create.php"  >Create</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="<?=$BASE_URL?>pdf.php" >Gerar pdf</a>
                </li>
            </div>
        </div>
        </div>
    </nav>
   
</header>




