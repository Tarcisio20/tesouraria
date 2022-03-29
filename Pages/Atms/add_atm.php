<?php

    require_once './../../Functions/Atm.php';
    require_once './../../Functions/ShippingCompany.php';

    $error = '';

    if(isset($_POST['id_atm']) && !empty($_POST['id_atm']) &&
    isset($_POST['id_treasury']) && !empty($_POST['id_treasury']) &&
    isset($_POST['name_atm']) && !empty($_POST['name_atm']) &&
    isset($_POST['shortened_name_atm']) && !empty($_POST['shortened_name_atm']) ){
        $atm = new AtmClass();

        $dt = $atm->setAtm($_POST['id_atm'], $_POST['id_treasury'], $_POST['name_atm'],$_POST['shortened_name_atm']);
    }

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
    <form method="POST">
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
        <input type="submit" value="CADASTRAR" />
        <a href="./atm.php">VOLTAR</a>
    </form>
</body>
</html>