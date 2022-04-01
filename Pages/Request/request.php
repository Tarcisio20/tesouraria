<?php
    session_start();
    include_once './../../Functions/Admin.php';
    include_once './../../Functions/Request.php';
    include_once './../../Functions/ShippingCompany.php';
    $adm = new AdminClass();
    $req = new RequestClass();
    $shipping = new ShippingCompanyClass();

    $dataAdmin = $adm->verifyUser($_SESSION['id_crednosso'], 
    $_SESSION['username_crednosso'], $_SESSION['token_crednosso']);
    if($dataAdmin['error'] !== ''){
        $_SESSION['id_crednosso'] = null;
        $_SESSION['token_crednosso'] = null;
        $_SESSION['username_crednosso'] = null;
        header("Location: ./Pages/Login/login.php");
    }

    $data = $req->getAllRequests();
   // print_r($data);

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
    <h3>PEDIDOS</h3>
    <a href="./add_request.php">ADICIONAR</a>
    <?php if($data !== false): ?>
    <table width="100%" border="1px">
        <thead>
            <tr>
                <td>ID</td>
                <td>LOTE</td>
                <td>ORIGEM</td>
                <td>DESTINO</td>
                <td>DATA</td>
                <td>R$ 10,00</td>
                <td>R$ 20,00</td>
                <td>R$ 50,00</td>
                <td>R$ 100,00</td>
                <td>STATUS</td>
                <td>AÇÕES</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $dt): ?>
                <tr>
                    <td><?php echo $dt['id']; ?></td>
                    <td><?php echo $dt['lote']; ?></td>
                    <td><?php echo $shipping->getNameShippingCompanyById($dt['id_origin']); ?></td>
                    <td><?php echo $shipping->getNameShippingCompanyById($dt['id_destiny']); ?></td>
                    <td><?php echo $dt['date_request']; ?></td>
                    <td><?php echo $dt['qt_10']; ?></td>
                    <td><?php echo $dt['qt_20']; ?></td>
                    <td><?php echo $dt['qt_50']; ?></td>
                    <td><?php echo $dt['qt_100']; ?></td>
                    <td><?php echo $dt['status']; ?></td>
                    <td>
                        <a href="./edit_request.php?id=<?php echo $dt['id']; ?>">EDITAR</a>
                        <a href="./delete_request.php?id=<?php echo $dt['id']; ?>">BLOQUEAR</a>
                    </td>
                </tr>
            <?php endforeach; ?>   
        </tbody>
    </table>
    <?php else: ?>
        <p>Sem dados a mostrar!</p>
    <?php endif; ?>
</body>
</html>