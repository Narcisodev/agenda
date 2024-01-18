    <?php 
    include_once("templat/header.php");
    ?>
      

    <div class="container" id="view-contact"> 
      <?php include_once("templat/backbtn.html");?>
      <h1 id="main-title"><?= $contact["name"] ?></h1>
      <p class="bold">CNPJ:</p>
      <p><?= $contact["phone"] ?></p>
      <p class="bold">Observações:</p>
      <p><?= $contact["observations"] ?></p>
      <p class="bold">Data:</p>
      <p><?= date("d/m/Y",strtotime($contact["date"]))?></p>
    </div>   

    <?php 
    include_once("templat/footer.php");
    ?>

