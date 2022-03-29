<?php
    include_once  __DIR__ ."/../../Functions/ShippingCompany.php";

    $shipping = new ShippingCompanyClass();


    if(!isset($_GET['id']) && empty($_GET['id'])){
        header('Location: ./../../index.php?error="Informar tranportadora!"');
    }
    $data = $shipping->getShippingByID($_GET['id']);
    if($data === false){
        header('Location: ./../../index.php?error="Tranportadora não encontrada!"');
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
    <div>
        <h3>INFORMAÇÕES</h3>
        NOME: <?php echo $data['name_shipping']; ?>
        SALDO: <?php echo $data['balance']; ?>
    </div>
    <div>
        <a href="./../Treasury/move_treasury_shipping.php?id=<?php echo $data['id_shipping']; ?>">Movimentar Saldo</a>
    </div>
    <div>
        <h3>TERMINAIS</h3>
        <div>
            terminal 1 terminal 2
        </div>
    </div>
    <div>
        <h3>REGISTROS</h3>
        <table width="100%" border="1px">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>AÇAO</td>
                    <td>USER</td>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</body>
</html>