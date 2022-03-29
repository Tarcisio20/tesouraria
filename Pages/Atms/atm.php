<?php
    require_once  './../../Functions/Atm.php';
    $atms = new AtmClass();

    $data = $atms->getAllAtms();
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
    <?php if(isset($data['error']) && $data['error'] === ''): ?>
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
                        <td><?php echo $data['id_atm']; ?></td>
                        <td><?php echo $data['name_atm']; ?></td>
                        <td><?php echo $data['hortened_name_atm']; ?></td>
                        <td><?php echo $data['status']; ?></td>
                        <td>
                            EDITAR | EXCLUIR
                        </td>
                    </tr>    
                <?php endforeach; ?>
           
                
        </tbody>
    </table>
    <?php else: ?>
        <p><?php echo $data['error']; ?></p>
    <?php endif; ?>
</body>
</html>