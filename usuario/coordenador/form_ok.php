<?php
ob_start();
session_start();
include_once '../../class/DAO/documento.DAO.class.php';
include_once '../../class/documento.class.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idDocumento = $_POST['idDocumento'];
    $representantes = $_POST['Representantes'];
    $conselheiros = $_POST['Conselheiros'];
    $participantes = $_POST['Participantes'];

    // Prepare respostas data
    $respostas = [
        [
            'questao' => 1,
            'valor' => $_POST['valor1'],
            'texto' => $_POST['motivo1']
        ],
        [
            'questao' => 2,
            'valor' => $_POST['valor3'],
            'texto' => $_POST['motivo3']
        ],
        [
            'questao' => 3,
            'valor' => $_POST['valor4'],
            'texto' => $_POST['motivo4']
        ],
        [
            'questao' => 4,
            'valor' => $_POST['valor5'],
            'texto' => $_POST['motivo5']
        ],
        [
            'questao' => 5,
            'valor' => $_POST['valor6'],
            'texto' => $_POST['motivo6']
        ],
        [
            'questao' => 6,
            'valor' => $_POST['valor7'],
            'texto' => $_POST['motivo7']
        ],
        [
            'questao' => 7,
            'valor' => $_POST['valor8'],
            'texto' => $_POST['motivo8']
        ]
    ];

    // Create Documento object
    $objDocumento = new Documento();
    $objDocumento->setId($idDocumento);
    $objDocumento->setRepresentantes($representantes);
    $objDocumento->setConselheiro($conselheiros);
    $objDocumento->setParticipantes($participantes);
    $objDocumento->setRespostas($respostas);

    // Create DAO and update
    $objDocumentoDAO = new Documento_DAO();

    try {
        $objDocumentoDAO->AtualizarForm($objDocumento);
        header('location: index.php?enviado');
    } catch (Exception $e) {
        header('location: index.php?erro');
    }
} else {
    header('location: index.php?erro');
}