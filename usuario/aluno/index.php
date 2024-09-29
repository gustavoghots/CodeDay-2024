<?php
    include_once '../../class/DAO/documento.DAO.class.php';
    session_start();
    $objDocumentoDAO = new Documento_DAO();
    $idDocumento = $objDocumentoDAO->documentoValidoAluno($_SESSION['idUsuario']);
    if($idDocumento){
        header("Location: formulario.php?id=".$idDocumento['idDocumento']);
        exit();
    }else{
        echo 'não temos nenhum formulário cadastrado vinculado ao seu usuário dentro do prazo';
    }
?>