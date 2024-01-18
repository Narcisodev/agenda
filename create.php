<?php 
    include_once("templat/header.php")
    ?>
    

    <div class="container">
    <?php include_once("templat/backbtn.html");?>
        <h1 id="main-title">Cadastro</h1>
        <form id="create-form" action="<?= $BASE_URL ?>config/process.php" method="POST">
        <input type="hidden" name="type" value="create"></input>
        <div class="form-group">
          <label for="name">Nome do cliente:</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="digite o nome do cliente" required>  
        </div>
        <div class="form-group">
          <label for="phone">CNPJ do cliente:</label>
          <input type="text" class="form-control" id="name" name="phone" placeholder="digite o CNPJ do cliente" required>  
        </div>
        <div class="form-group">
          <label for="observations">Observações:</label>
          <textarea type="text" class="form-control" id="name" name="observations" placeholder="insira as Observações" rows="3"> </textarea> 
        </div>
        <div class="form-group">
          <label for="observations">Data de Cadastro:</label>
          <input type="date" value="date" class="form-control" id="date" name="date" rows="3">
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
    </div>
    <?php 
    include_once("templat/footer.php")
    ?>