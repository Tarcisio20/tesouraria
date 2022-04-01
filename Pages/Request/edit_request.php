<?php
    session_start();
    if(!isset($_SESSION['token_crednosso']) && $_SESSION['token_crednosso'] === null ){
        header("Location: ./Pages/Login/login.php");
    }

    include_once './../../Functions/Admin.php';
    include_once './../../Functions/Request.php';
    include_once './../../Functions/ShippingCompany.php';
    include_once './../../Functions/OperationType.php';
    include_once './../../Functions/OrderType.php';

    $adm = new AdminClass();

    $dataAdmin = $adm->verifyUser($_SESSION['id_crednosso'], 
    $_SESSION['username_crednosso'], $_SESSION['token_crednosso']);
    if($dataAdmin['error'] !== ''){
        $_SESSION['id_crednosso'] = null;
        $_SESSION['token_crednosso'] = null;
        $_SESSION['username_crednosso'] = null;
        header("Location: ./Pages/Login/login.php");
    }

    if(!isset($_GET['id']) && $_GET['id'] === null){
        header("Location: ./request.php?error='Preciso de um Pedido para continuar'");
    }

    $request = new RequestClass();
    $req = $request->getRequestById($_GET['id']);
    if($req === false){
        header("Location: ./request.php?error='Sem resultado a motrar!'");
    }

    $shipping = new ShippingCompanyClass();
    $sh = $shipping->getAllShippingCompany();

    $operationType = new OperationTypeClass();
    $op = $operationType->getAllOperationType();

    $order = new OrderTypeClass();
    $ord = $order->getAllOrderType();

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
    <h3>EDITAR PEDIDO</h3>
    <form action="./add_request_helpper.php" method="POST">
        <h4>INFORMAÇÕES</h4>
        <div>
            <label>LOTE</label>
            <input type="text" disabled="disabled" value="<?php echo $req['date_request']; ?>" />
        </div>
        <div>
            <label>DATA PEDIDO</label>
            <input type="text" disabled="disabled" value="<?php echo $req['lote']; ?>" />
        </div>
        <div>
            <label>STATUS</label>
            <select name="status" >
                <option value="null"></option>
                <option value="open" <?php if($req['status'] === 'open'){ echo 'selected';} ?> >ABERTO</option>
                <option value="closed" <?php if($req['status'] === 'closed'){ echo 'selected';} ?> >FECHADO</option>
            </select>
        </div>

        <h4>TIPO</h4>
        <div>
            <label>TIPO DE OPERAÇÃO</label>
            <select name="id_operation_type">
                <option value="null"></option>
                <?php foreach($op as $o): ?>
                    <option value="<?php echo $o['id']; ?>" <?php if($o['id'] == $req['id_operation_type']){ echo "selected";} ?> ><?php echo $o['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label>TIPO DE ORDEM</label>
            <select name="id_order_type">
                <option value="null"></option>
                <?php foreach($ord as $or): ?>
                    <option value="<?php echo $or['id']; ?>" <?php if($or['id'] == $req['id_order_type']){ echo "selected";} ?>><?php echo $or['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        
        <h4>TESOURARIAS</h4>
        <div>
            <label>TESOURARIA ORIGEM</label>
            <select name="id_shipping_origin">
                <option value="null"></option>
                <?php foreach($sh as $s): ?>
                    <option value="<?php echo $s['id_shipping']; ?>" <?php if($s['id_shipping'] ==  $req['id_origin'] ){ echo "selected"; } ?>  ><?php echo $s['name_shipping'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label>TESOURARIA DESTINO</label>
            <select name="id_shipping_destiny">
                <option value="null"></option>
                <?php foreach($sh as $s): ?>
                    <option value="<?php echo $s['id_shipping']; ?>" <?php if($s['id_shipping'] ==  $req['id_destiny']){echo "selected";} ?> ><?php echo $s['name_shipping'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <h4>VALORES</h4>
        <div>
            <label for="value_10">VALOR DE R$ 10,00</label>
            <input type="number" name="value_10" id="value_10" value="<?php echo $req['qt_10']; ?>" />
        </div>
        <div>
            <label for="value_20">VALOR DE R$ 20,00</label>
            <input type="number" name="value_20" id="value_20" value="<?php echo $req['qt_20']; ?>" />
        </div>
        <div>
            <label for="value_10">VALOR DE R$ 50,00</label>
            <input type="number" name="value_50" id="value_50" value="<?php echo $req['qt_50']; ?>" />
        </div>
        <div>
            <label for="value_100">VALOR DE R$ 100,00</label>
            <input type="number" name="value_100" id="value_100" value="<?php echo $req['qt_100']; ?>" />
        </div>
        <div>
            <h4>VALORES TOTAIS</h4>
            <div>
                <label>VALOR TOTAL</label>
                <input type="text" disabled="disabled" value="<?php echo $req['value_total']; ?>" />
            </div>
            <div>
                <label>VALOR CONFIRMADO</label>
                <input type="text" disabled="disabled"  value="<?php echo $req['confirmed_value']; ?>" />
            </div>
            <div>
                <label>CONFIRMAÇÃO</label>
                <input type="checkbox" disabled="disabled" checked  
                <?php if($req['change_in_confirmation'] === 'Y'){ echo "disabled='disabled' checked "; } ?> />
            </div>
        </div>
        <h4>OBSERVAÇÕES</h4>
        <textarea name="note" id="note" placeholder="Digite as observações" value="<?php if($req['note']){ echo $req['note']; } ?>" ></textarea>
        <div>
            <input type="submit" value="ADICIONAR" />
            <a href="./request.php">VOLTAR</a>
        </div>
    </form>
</body>
</html>