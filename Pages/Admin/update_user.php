<?php

require_once '../../Functions/Admin.php';

if(!isset($_GET['id']) && empty($_GET['id']) === ''){
    header("Location: ./admin.php?error='Preciso de um usuario!'");
}

$adm = new AdminClass();

$data = $adm->getUserByID($_GET['id']);

//print_r($data);
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
    <h3>ALTERAR USUARIO</h3>
    <form>
        <div>
            <label>NOME</label>
            <input type="text" name="name" value="<?php echo $data['name']; ?>" />
        </div>
        <div>
            <label>USERNAME</label>
            <input type="text" name="username" value="<?php echo $data['username']; ?>" />
        </div>
        <div>
            <label>E-MAIL</label>
            <input type="email" name="email" value="<?php echo $data['email']; ?>" />
        </div>
        <div>
            <label>NIVEL</label>
            <select name="nivel">
                <option></option>
                <option value="admin" <?php if($data['nivel'] === 'admin'){echo 'selected';} ?> >ADMINISTRADOR</option>
                <option value="user" <?php if($data['nivel'] === 'user'){ echo 'selected';} ?> >USUARIO</option>
            </select>
        </div>
        <div>
            <label>STATUS</label>
            <select name="active">
                <option></option>
                <option value="Y" <?php if($data['active'] === 'Y'){ echo 'selected';} ?> >ATIVO</option>
                <option value="N" <?php if($data['active'] === 'N'){ echo 'selected';} ?> >INATIVO</option>
            </select>
        </div>

        <input type="submit" value="ALTERAR" />
        <a href="./admin.php">VOLTAR</a>
    </form>
</body>
</html>