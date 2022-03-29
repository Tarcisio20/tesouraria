<?php

include_once '../../Functions/Admin.php';

$adm = new AdminClass();

if(!isset($_GET['id']) && $_GET['id'] === ''){
    header("Location: ./admin.php?error='Preciso de um usuario'");
}

if($adm->generateDefaultPassword($_GET['id'])){
    header("Location: ./admin.php?success='Senha do sistema gerada com sucesso!'");
}else{
    header("Location: ./admin.php?error='Erro ao gerar senha padrão!'");
}

