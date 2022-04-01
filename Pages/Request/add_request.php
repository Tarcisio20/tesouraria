<?php
    session_start();
    include_once './../../Functions/Admin.php';
    include_once './../../Functions/OperationType.php';
    include_once './../../Functions/ShippingCompany.php';
    include_once './../../Functions/OrderType.php';

    $adm = new AdminClass();
    $operationType = new OperationTypeClass();
    $shipping = new ShippingCompanyClass();
    $order = new OrderTypeClass();

    $dataAdmin = $adm->verifyUser($_SESSION['id_crednosso'], 
    $_SESSION['username_crednosso'], $_SESSION['token_crednosso']);
    if($dataAdmin['error'] !== ''){
        $_SESSION['id_crednosso'] = null;
        $_SESSION['token_crednosso'] = null;
        $_SESSION['username_crednosso'] = null;
        header("Location: ./Pages/Login/login.php");
    }

    $op = $operationType->getAllOperationType();
    $sh = $shipping->getAllShippingCompany();
    $ord = $order->getAllOrderType();

    if(isset($_GET['lote']) && $_GET['lote'] !== null ){
        $lote = $_GET['lote'];
    }else{
        $lote = null;
    }


 // print_r($_SESSION['lote_crednosso']);

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
    <h3>ADICIONAR PEDIDO</h3>
    <?php if(isset($lote) && $lote !== null): ?>
        <a href="./view_request.php">VER LOTES</a>
        <a href="./add_request.php?success='Lote Pausado!'">PAUSAR LOTE</a>
    <?php endif; ?>
    
    <form action="./add_request_helpper.php" method="POST">
        <h4>TIPO</h4>
        <?php if(isset($lote) && $lote !== null): ?>
          
        <?php endif; ?>
        <div>
                <label>LOTE</label>
                <input type="<?php if(isset($lote) && $lote !== null){ echo 'text'; }else{ echo 'hidden'; } ?>"  name="lote"  readonly value="<?php echo $lote; ?>" />
            </div>
        <div>
            <label>TIPO DE OPERAÇÃO</label>
            <select name="id_operation_type" id="id_operation_type">
                <option value="null"></option>
                <?php foreach($op as $o): ?>
                    <option value="<?php echo $o['id']; ?>"><?php echo $o['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label>TIPO DE ORDEM</label>
            <select name="id_order_type" id="id_order_type">
                <option value="null"></option>
                <?php foreach($ord as $or): ?>
                    <option value="<?php echo $or['id']; ?>"><?php echo $or['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <h4>TESOURARIAS</h4>
        <div>
            <label>TESOURARIA ORIGEM</label>
            <select name="id_shipping_origin" id="id_shipping_origin">
                <option value="null"></option>
                <?php foreach($sh as $s): ?>
                    <option value="<?php echo $s['id_shipping']; ?>"><?php echo $s['name_shipping'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label>TESOURARIA DESTINO</label>
            <select name="id_shipping_destiny" id="id_shipping_destiny">
                <option value="null"></option>
                <?php foreach($sh as $s): ?>
                    <option value="<?php echo $s['id_shipping']; ?>"><?php echo $s['name_shipping'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <h4>VALORES</h4>
        <div>
            <label for="value_10">VALOR DE R$ 10,00</label>
            <input type="number" name="value_10" id="value_10" />
        </div>
        <div>
            <label for="value_20">VALOR DE R$ 20,00</label>
            <input type="number" name="value_20" id="value_20" />
        </div>
        <div>
            <label for="value_10">VALOR DE R$ 50,00</label>
            <input type="number" name="value_50" id="value_50" />
        </div>
        <div>
            <label for="value_100">VALOR DE R$ 100,00</label>
            <input type="number" name="value_100" id="value_100" />
        </div>
        <h4>OBSERVAÇÕES</h4>
        <textarea name="note" id="note" placeholder="Digite as observações"></textarea>
        <div>
            <input type="submit" value="ADICIONAR" />
            <a href="./request.php">VOLTAR</a>
        </div>
    </form>  
</body>
</html>