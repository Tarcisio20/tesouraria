<?php
    session_start();
    include_once './../../Functions/Admin.php';

    $adm = new AdminClass();


    $dataAdmin = $adm->verifyUser($_SESSION['id_crednosso'], 
    $_SESSION['username_crednosso'], $_SESSION['token_crednosso']);
    if($dataAdmin['error'] !== ''){
        $_SESSION['id_crednosso'] = null;
        $_SESSION['token_crednosso'] = null;
        $_SESSION['username_crednosso'] = null;
        header("Location: ./Pages/Login/login.php");
    }
    print_r($_GLOBALS['lote_crednosso']);
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
<?php if(isset($_SESSION['lote_crednosso']) && $_SESSION['lote_crednosso'] !== null ): ?>
        <table>
            <thead>
                <tr>
                    <td>ORIGEM</td>
                    <td>DESTINO</td>
                    <td>VALOR 10</td>
                    <td>VALOR 20</td>
                    <td>VALOR 50</td>
                    <td>VALOR 100</td>
                    <td>TOTAL</td>
                </tr>
            </thead>
            <tbody>
                <?php // foreach($_SESSION['lote_crednosso'] as $key => $item): ?>
                    <?php // print_r($item[$key]); ?>
                    <tr>
                        <td><?php // echo $item['id_shipping_origin ']; ?></td>
                        <td><?php // echo $item['id_shipping_destiny  ']; ?></td>
                        <td><?php // echo $item['value_10']; ?></td>
                        <td><?php // echo $item['value_20']; ?></td>
                        <td><?php // echo $item['value_50']; ?></td>
                        <td><?php // echo $item['value_100']; ?></td>
                        <td>VALOR TOTAL</td>
                    </tr>
                <?php // endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        Nada a mostrar
    <?php endif; ?>
</body>
</html>