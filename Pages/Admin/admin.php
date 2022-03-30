<?php
session_start();

if(!isset($_SESSION['token_crednosso']) && $_SESSION['token_crednosso'] === null ){
    header("Location: ./Pages/Login/index.php");
}

include_once '../../Functions/Admin.php';

$adm = new AdminClass(); 

$data = $adm->verifyUser($_SESSION['id_crednosso'], 
    $_SESSION['username_crednosso'], $_SESSION['token_crednosso']);
    if($data['error'] !== ''){
        $_SESSION['id_crednosso'] = null;
        $_SESSION['token_crednosso'] = null;
        $_SESSION['username_crednosso'] = null;
        header("Location: ./Pages/Login/login.php");
    }

$users = $adm->getAllUsers();

// print_r($users);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h3>Area Administrativa</h3>
    <h2><?php echo $data['username']; ?></h2>
    <h5><?php echo $data['nivel']; ?></h5>
    <a href="./add_user.php">ADICINAR USUARIO</a>
    <a href="../../index.php">VOLTAR</a>
    <?php if($users): ?>
        <table width="100%" border="1px">
            <thead>
                <tr>
                    <td>Nome</td>
                    <td>Username</td>
                    <td>E-mail</td>
                    <td>Nivel</td>
                    <td>Status</td>
                    <td>Ações</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($users as $user): ?>
                    <tr>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['nivel']; ?></td>
                        <td><?php echo $user['active']; ?></td>
                        <td>
                            <a href="./generate_password.php?id=<?php echo $user['id']; ?>">SENHA PADRAO</a>
                            <a href="./update_user.php?id=<?php echo $user['id']; ?>">EDITAR</a>
                            <a href="./delete_user.php?id=<?php echo $user['id']; ?>&status=<?php echo $user['active']; ?>">
                            <?php if($user['active'] === 'Y'){ echo "BLOQUEAR"; }else{ echo "DESBLOQUEAR"; } ?>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nada a mostrar</p>
    <?php endif; ?>
</body>
</html>