<?php
    require '../../config/init.php';

    $PDO = db_connect();
    

    // pega o ID da URL
    $id = isset($_GET['U_id']) ? $_GET['U_id'] : null;

    // valida o ID
    if (empty($id)){
        echo "ID não informado";
        exit;
    }

    // remove do banco
    $sql = "DELETE FROM USUARIOS WHERE U_id = :U_id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':U_id', $id);

    if ($stmt->execute()){
        header('Location: ../../usuarios.php');
    }
    else{
        echo "Erro ao remover";
        print_r($stmt->errorInfo());
    }

?>