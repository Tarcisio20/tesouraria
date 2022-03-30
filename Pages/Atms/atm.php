<?php
    session_start();
    if(!isset($_SESSION['token_crednosso']) && $_SESSION['token_crednosso'] === null ){
        header("Location: ./Pages/Login/login.php");
    }
    
    require_once  './../../Functions/Atm.php';
    include_once '../../Functions/Admin.php';
    include_once '../../Functions/ShippingCompany.php';

    $atms = new AtmClass();
    $adm = new AdminClass(); 
    $shipping = new ShippingCompanyClass();

    $dataAdmin = $adm->verifyUser($_SESSION['id_crednosso'], 
    $_SESSION['username_crednosso'], $_SESSION['token_crednosso']);
    if($dataAdmin['error'] !== ''){
        $_SESSION['id_crednosso'] = null;
        $_SESSION['token_crednosso'] = null;
        $_SESSION['username_crednosso'] = null;
        header("Location: ./Pages/Login/login.php");
    }

    $dataF = $atms->getAllAtms();
    foreach($dataF as $key => $d){
        $data[] = $d;
        $data[$key]['treasury_name'] = $shipping->getNameShippingCompanyById($d['id_treasury']); 

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
    <h3>ATM's</h3>
    <div>
        <a href="./add_atm.php">ADICIONAR ATMs</a>
        <a href="./../../index.php">VOLTAR</a>
    </div>
    <?php if($data !== false): ?>
    <table width="100%" border="1px">
        <thead>
            <tr>
                <td>ID</td>
                <td>NOME</td>
                <td>NOME REDUZIDO</td>
                <td>TRANSPORTADORA</td>
                <td>STATUS</td>
                <td>AÇÕES</td>
            </tr>
        </thead>
        <tbody>
           
                <?php foreach($data as $dt): ?>
                    <tr>
                        <td><?php echo $dt['id_atm']; ?></td>
                        <td><?php echo $dt['name_atm']; ?></td>
                        <td><?php echo $dt['shortened_name_atm']; ?></td>
                        <td><?php echo $dt['treasury_name']; ?></td>
                        <td><?php echo $dt['status']; ?></td>
                        <td>
                            <a href="./edit_atm.php?id=<?php echo $dt['id']; ?>">EDITAR</a>
                            <a href="./delete_atm.php?id=<?php echo $dt['id']; ?>">BLOQUEAR</a>
                        </td>
                    </tr>    
                <?php endforeach; ?>
           
                
        </tbody>
    </table>
    <?php else: ?>
        <p>Nada a Mostrar!</p>
    <?php endif; ?>
</body>
</html>