<?php
session_start();
if(!isset($_SESSION['token_crednosso']) && $_SESSION['token_crednosso'] === null ){
    header("Location: ./Pages/Login/login.php");
}

include_once '../../Functions/Admin.php';
include_once '../../Functions/Atm.php';
include_once '../../Functions/ShippingCompany.php';

$adm = new AdminClass();
$atm = new AtmClass();
$shipping = new ShippingCompanyClass();

$dataAdmin = $adm->verifyUser($_SESSION['id_crednosso'], 
    $_SESSION['username_crednosso'], $_SESSION['token_crednosso']);
    if($dataAdmin['error'] !== ''){
        $_SESSION['id_crednosso'] = null;
        $_SESSION['token_crednosso'] = null;
        $_SESSION['username_crednosso'] = null;
        header("Location: ./Pages/Login/login.php");
}

if(!isset($_GET['id']) && $_GET['id'] === null){
    header("Location: ./atm.php?error='Preciso de um ATM para proseguir!'");
}

$sh = $shipping->getAllShippingCompany();
$data = $atm->getAtmById($_GET['id']);
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
    <h3>EDITAR ATM</h3>
    <form action="./edit_atm_helpper.php" method="POST">
        <div>
            <label for="name_atm">NOME ATM</label>
            <input type="text" name="name_atm" id="name_atm" value="<?php echo $data['name_atm']; ?>" />
        </div>
        <div>
            <label for="shortened_name_atm">NOME REDUZIDO ATM</label>
            <input type="text" name="shortened_name_atm" id="shortened_name_atm" value="<?php echo $data['shortened_name_atm']; ?>" />
        </div>
        <div>
            <label for="shortened_name_atm">STATUS</label>
            <select name="status">
                <option value="null"></option>
                <option value="Y" <?php if($data['status'] === 'Y'){ echo 'selected';} ?> >ATIVO</option>
                <option value="N" <?php if($data['status'] === 'N'){ echo 'selected';} ?> >INATIVO</option>
            </select>
        </div>
        <div>
            <label for="id_treasury">TESOURARIA</label>
            <select name="id_treasury" id="id_treasury">
                <option></option>
                <?php foreach($sh as $s): ?>
                    <option 
                        value="<?php echo $s['id_shipping'] ?>"
                        <?php if($s['id_shipping'] ==  $data['id_treasury']){ echo 'selected'; }  ?>    
                    ><?php echo $s['name_shipping']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <div>CONFIGURAÇÃO DOS CASSETES</div>
        <div>Se não for informado será setado o padrão</div>
        <div>
            <label>CASSETE A</label>
            <input type="number" name="cass_A" placeholder="CASSETE A" value="<?php echo $data['cass_A']; ?>" />
        </div>
        <div>
            <label>CASSETE B</label>
            <input type="number" name="cass_B" placeholder="CASSETE B" value="<?php echo $data['cass_B']; ?>"  />
        </div>
        <div>
            <label>CASSETE C</label>
            <input type="number" name="cass_C" placeholder="CASSETE C" value="<?php echo $data['cass_C']; ?>"  />
        </div>
        <div>
            <label>CASSETE D</label>
            <input type="number" name="cass_D" placeholder="CASSETE D" value="<?php echo $data['cass_D']; ?>"  />
        </div>
        <input type="submit" value="EDITAR" />
        <a href="./atm.php">VOLTAR</a>
    </form>
</body>
</html>