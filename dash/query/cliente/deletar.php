<?php
    require '../../config/init.php';

    $PDO = db_connect();
    

    // pega o ID da URL
    $id = isset($_GET['C_id']) ? $_GET['C_id'] : null;

    // valida o ID
    if (empty($id)){
        echo "ID não informado";
        exit;
    }

    // remove do banco
    $sql = "DELETE FROM CLIENTES WHERE C_id = :C_id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':C_id', $id);

    if ($stmt->execute()){
        header('Location: ../../clientes.php');
    }
    else{
        echo "Erro ao remover";
        print_r($stmt->errorInfo());
    }

?>