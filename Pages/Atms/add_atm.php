<?php
    session_start();
    if(!isset($_SESSION['token_crednosso']) && $_SESSION['token_crednosso'] === null ){
        header("Location: ./Pages/Login/login.php");
    }

    require_once './../../Functions/Admin.php';

    $adm = new AdminClass();

    $data = $adm->verifyUser($_SESSION['id_crednosso'], 
    $_SESSION['username_crednosso'], $_SESSION['token_crednosso']);
    if($data['error'] !== ''){
        $_SESSION['id_crednosso'] = null;
        $_SESSION['token_crednosso'] = null;
        $_SESSION['username_crednosso'] = null;
        header("Location: ./Pages/Login/login.php");
    }

    require_once './../../Functions/ShippingCompany.php';
    
    $shipping = new ShippingCompanyClass();
    $data = $shipping->getAllShippingCompany();
    

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
    <h3>ADICIONAR ATM</h3>
    <form action="./add_atm_helpper.php" method="POST">
        <div>
            <label for="id_atm">ID NO SISTEMA</label>
            <input type="number" name="id_atm" id="id_atm" />
        </div>
        <div>
            <label for="id_treasury">TESOURARIA</label>
            <select name="id_treasury" id="id_treasury">
                <option></option>
                <?php foreach($data as $dt): ?>
                    <option value="<?php echo $dt['id_shipping'] ?>"><?php echo $dt['name_shipping']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="name_atm">NOME ATM</label>
            <input type="text" name="name_atm" id="name_atm" />
        </div>
        <div>
            <label for="shortened_name_atm">NOME REDUZIDO ATM</label>
            <input type="text" name="shortened_name_atm" id="shortened_name_atm" />
        </div>
        <div>CONFIGURAÇÃO DOS CASSETES</div>
        <div>Se não for informado será setado o padrão</div>
        <div>
            <label>CASSETE A</label>
            <input type="number" name="cass_A" placeholder="CASSETE A" />
        </div>
        <div>
            <label>CASSETE B</label>
            <input type="number" name="cass_B" placeholder="CASSETE B" />
        </div>
        <div>
            <label>CASSETE C</label>
            <input type="number" name="cass_C" placeholder="CASSETE C" />
        </div>
        <div>
            <label>CASSETE D</label>
            <input type="number" name="cass_D" placeholder="CASSETE D" />
        </div>
        <input type="submit" value="CADASTRAR" />
        <a href="./atm.php">VOLTAR</a>
    </form>
</body>
</html>