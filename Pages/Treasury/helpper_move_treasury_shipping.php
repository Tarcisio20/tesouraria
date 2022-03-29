<?php

include_once '../../Functions/Treasury.php';

$treasury = new TreasuryClass();

if(
    !isset($_POST['escolha']) && empty($_POST['escolha']) &&
    !isset($_POST['value-for-treasury']) && empty($_POST['value-for-treasury']) &&
    !isset($_POST['id_shipping']) && empty($_POST['id_shipping'])
){
    header('Location: ./move_treasury_shipping.php?id='.$_POST["id_shipping"].'&error="informe os campos"');
}

$trea = $treasury->moveBalanceTreasury($_POST['id_shipping'],$_POST['escolha'], $_POST['value-for-treasury']);

header("Location: ./move_treasury_shipping.php?id=".$_POST['id_shipping']);