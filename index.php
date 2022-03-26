<?php
    include_once './functions/ShippingCompany.php';
    $shipping = new ShippingCompanyClass();

    $tesourarias = $shipping->getShippingCompanyAndBalance();
    //print_r($tesourarias);
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
    <h2>TESOURARIA</h2>
    <a href="#">ADICIONAR TESOURARIA</a>
    <?php if(count($tesourarias) > 0): ?>
        <table width="100%" border="1px">
            <thead>
                <tr>
                    <td width="10" >ID</td>
                    <td>NOME</td>
                    <td width="80">STATUS</td>
                    <td width="100">AÇÃO</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tesourarias as $tesouraria): ?>
                    <tr>
                        <td><?php echo $tesouraria['id_shipping']; ?></td>
                        <td><?php echo $tesouraria['name_shipping']; ?></td>
                        <td><?php echo $tesouraria['active']; ?></td>
                        <td>
                            <a 
                                href="./Pages/ShippingCompany/shipping_company.php?id=
                                <?php echo $tesouraria['id_shipping']; ?>"
                            >ABRIR</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <h4>Nada a mostrar</h4>
    <?php endif; ?>



</body>
</html>