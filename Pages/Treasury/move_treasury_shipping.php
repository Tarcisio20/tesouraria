<?php

    include_once '../../Functions/ShippingCompany.php';

    if(!isset($_GET['id']) && empty($_GET['id'])){
        header("Location: ../ShippingCompany/shipping_company.php?error='Informe transportadora!'");
    }
    $shipping = new ShippingCompanyClass();
    $data = $shipping->getShippingByID($_GET['id']);
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
    <h3>SALDO TESOURARIA #<?php echo $data['id_shipping']; ?> - <?php echo $data['name_shipping']; ?></h3>
    <h2>R$ <?php echo $data['balance']; ?></h2>
    <form action="./helpper_move_treasury_shipping.php" method="POST"> 
        <div>
            <input type="radio" id="add" name="escolha" value="add" />
            <label for="add">ADICIONAR</label>
            <input type="radio" id="sub" name="escolha" value="sub" />
            <label for="sub">SUBTRAIR</label>
        </div>
        <div>
            <input type="number" name="value-for-treasury" />
        </div>
        <input type="hidden" name="id_shipping" value="<?php echo $data['id_shipping']; ?>" />
        <input type="submit" value="SUBMIT" />
        <a href="../ShippingCompany/shipping_company.php">VOLTAR</a>
    </form>
</body>
</html>