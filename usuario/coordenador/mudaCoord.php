<?php 
include_once "../../class/DAO/usuario.DAO.class.php";
$objUsuarioDAO = new usuarioDAO();
$retornoCoord = $objUsuarioDAO->retornaCoord();
$idCoord = $retornoCoord['Usuario_idusuario'];
$idProf = $_GET['id'];

$operacao = $objUsuarioDAO->renovarCoord($idCoord,$idProf);

if($operacao)
    header("location: listarProf.php?CoordOK");
else
    header("location: listarProf.php?CoordNOK");
?>