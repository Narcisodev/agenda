<?php 

    session_start();

    include_once("connection.php");
    include_once("url.php");
    

    $data = $_POST;

    // modificações no banco
   

   
    if(!empty($data)) {

        // criar contatos
        if($data["type"] === "create") {
            $name = $data["name"];
            $phone= $data["phone"];
            $observations = $data["observations"];
            $date = $data["date"];

            
         

            $query = "INSERT INTO contacts (name, phone, observations, date) VALUES (:name, :phone, :observations, :date)";

            $stmt = $conn->prepare($query);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observations", $observations);
            $stmt->bindParam(":date", $date);
            try {

                $stmt->execute();

                $_SESSION["msg"] = "cliente cadastrado com sucesso";
                header("Location:" . $BASE_URL . "../index.php");


            } catch(PDOException $e) {
                // erro na conexão
                $error = $e->getMessage();
                echo "erro: $error";
            }
            
        } 
  // seleção de dados
        else if($data["type"] === "edit") {

        $name = $data["name"];
        $phone= $data["phone"];
        $observations = $data["observations"];
        $date = $data["date"];
        $id = $data["id"];

        $query = "UPDATE contacts SET name = :name, phone = :phone, observations = :observations, date = :date WHERE id = :id";
                  
            $stmt = $conn->prepare($query);

            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":observations", $observations);
            $stmt->bindParam(":date", $date);
            $stmt->bindParam(":id", $id);

            try {

                $stmt->execute();

                $_SESSION["msg"] = "cliente atualizado com sucesso";

                header("Location:" . $BASE_URL . "../index.php");

            } catch(PDOException $e) {
                // erro na conexão
                $error = $e->getMessage();
                echo "erro: $error";
            }
 // redirect
 
    } else if($data["type"] === "delete") {
        $id = $data["id"];

        $query = "DELETE FROM contacts WHERE id = :id";
        
        $stmt = $conn->prepare($query);

        $stmt->bindParam(":id", $id);


        
        try {

            $stmt->execute();

            $_SESSION["msg"] = "cliente excluido com sucesso";

            header("Location:" . $BASE_URL . "../index.php");

        } catch(PDOException $e) {
            // erro na conexão
            $error = $e->getMessage();
            echo "erro: $error";
        }

    }}
    else {

    $id;

    if(!empty($_GET)) {
      $id = $_GET["id"];
    }

    // Retorna o dado de um contato
    if(!empty($id)) {

        
      $query = "SELECT * FROM contacts WHERE id = :id";

      $stmt = $conn->prepare($query);

      $stmt->bindParam(":id", $id);

      $stmt->execute();

      $contact = $stmt->fetch();

    } else {

       
      // Retorna todos os contatos
      $contacts = [];

      $query = "SELECT * FROM contacts";
     
      $stmt = $conn->prepare($query);

      $stmt->execute();
      
      $contacts = $stmt->fetchAll();

    }


}

$conn = null;
?>