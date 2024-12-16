<?php
    ini_set('display_errors', true);
    error_reporting(E_ALL);
    $sucesso = array(
        'status' => 'atualizado',
        'mensagem' => 'Usuário atualizado com sucesso!'
    );

    $erro = array(
        'status' => 'erro',
        'mensagem' => 'Aconteceu algum coisa ao alterar o cadastro, tente novamente!'
    );
    require '../../config/init.php';

    $PDO = db_connect();
    
    // pega o ID da URL
    $id = isset($_GET['C_id']) ? $_GET['C_id'] : null;
    $action = isset($_GET['action']) ? $_GET['action'] : null;

    $C_status = "";

    if($action === "inactive"){
        $C_status = "INATIVO";
    }elseif($action === "active"){
        $C_status = "ATIVO";
    }

    // valida o ID
    if (!empty($id)){
        
        // artualiz o status no banco
        $sql = "UPDATE CLIENTES SET C_status = :C_status WHERE C_id = :C_id";
        try {
            $stmt = $PDO->prepare($sql);
            $stmt->bindParam( ":C_id", $id);
            $stmt->bindParam( ":C_status", $C_status );

        if ($stmt->execute()){
            header('Location: ../../clientes.php');
        }else{
            echo "Erro ao alterar o status do usuário!";
            echo "<pre>";
            print_r($stmt->errorInfo());
            echo "</pre>";
        }
        }catch (Exception $e){
            echo "Erro ao alterar o status do usuário!";
            echo "<pre>";
            print_r($e);
            echo "</pre>";
        }
    }

?>