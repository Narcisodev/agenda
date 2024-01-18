    <?php 
    include_once("templat/header.php")
    ?>

    <div class="container ">
        <?php if(isset($printMsg) && $printMsg != ''):?>
        <p id="msg"><?= $printMsg ?></p>
        <?php endif;?>
        <h1 id="main-title">Todos os dados</h1>
        <?php if(count($contacts)> 0):?>
            <table class="table table-striped table-bordered" id="contacts-table">
                <thead class="table table-dark">
                    <tr>
                     <th scope="col">ID</th>   
                     <th scope="col">Nome do cliente</th>   
                     <th scope="col">CNPJ</th>   
                     <th scope="col">Observações</th> 
                     <th scope="col">Data</th>
                     <th scope="col">Ações</th>   
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php foreach($contacts as $contact):?>
                        <tr>
                            <td scope="row" class="col-id"><?= $contact["id"]?></td>
                            <td scope="row"><?= $contact["name"]?></td>
                            <td scope="row"><?= $contact["phone"]?></td>
                            <td scope="row"><?= $contact["observations"]?></td>
                            <td scope="row"><?= date("d/m/Y",strtotime($contact["date"]))?></td>  
                            <td class="actions">
                                <a href="<?=$BASE_URL?>show.php?id=<?= $contact["id"]?>"><i class="fas fa-eye check-icon"></i></a>
                                <a href="<?=$BASE_URL?>edit.php?id=<?= $contact["id"]?>"><i class="far fa-edit edit-icon"></i></a>
                                <form class="delete-form" action="<?=$BASE_URL?>config/process.php" method="POST">
                                    <input type="hidden" name="type" value= "delete">
                                    <input type="hidden" name="id" value="<?= $contact["id"]?>">
                                <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                                </form>
                                </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        <?php else:?>
        <p id="empty-list-text">Ainda não há cliente na sua agenda, <a href="<?=$BASE_URL?>create.php">clique aqui para adicionar</a> </p>
        <?php endif;?>
    </div>





    <?php 
    include_once("templat/footer.php")
    ?>