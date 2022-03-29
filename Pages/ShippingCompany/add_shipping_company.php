<?php

    include_once '../../Functions/ShippingCompany.php';

    $shipping = new ShippingCompanyClass();
    if(isset($_POST['name_shipping']) && !empty($_POST['name_shipping']) && isset($_POST['id_shipping']) && !empty($_POST['id_shipping'])){

        $data = $shipping->setShippingCompany($_POST['id_shipping'], strtoupper($_POST['name_shipping']));

        header("Location: ../../index.php?error=".$data['error']);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>ADICIONAR TRANSPORTADORA</h3>
    <form method="POST">
        <div>
            <label for="id_shipping">ID NO SISTEMA</label>
            <input type="number" name="id_shipping" id="id_shipping" />
        </div>
        <div>
            <label for="name">NOME</label>
            <input type="text" name="name_shipping" id="name" />
        </div>
       <input type="submit" value="CRIAR" />
       <a href="./../../index.php">VOLTAR</a>
    </form>
</body>
</html>