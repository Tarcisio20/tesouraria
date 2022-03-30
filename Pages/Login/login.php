<?php 
    session_start();
    include_once './../../Functions/Admin.php';
    $adm = new AdminClass();

    $error = '';

    if(isset($_POST['username']) && $_POST['username'] !== null &&
     isset($_POST['password']) && $_POST['password'] !== null){

        $username = strtoupper(trim($_POST['username']));

        $data =  $adm->getUser($username, trim($_POST['password']));
      if($data['error'] === ''){
            $_SESSION['token_crednosso'] = $data['token'];
            $_SESSION['id_crednosso'] = $data['id'];
            $_SESSION['username_crednosso'] = $data['username'];
            header("Location: ./../../index.php");

        }else{
            $error = 'Problemas ao logar!';
        }
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
    <form method="POST">
        <p><?php if($error !== ''){ echo $error; } $error = ''; ?></p>
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" />
        </div>
        <div>
            <label for="password">Pasword</label>
            <input type="password" name="password" id="password" />
        </div>
        <input type="submit" value="Logar" />
    </form>
</body>
</html>