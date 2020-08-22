<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
	<h1>Login</h1>
    <form action="" method="post">
        <input type="text" placeholder="username" name="username" id="username" class="field">
        <input type="password" placeholder="password" name="password" id="password" class="field">
        <input type="submit" value="submit" class="btn">
    </form>
</div>
</body>
</html>
<?php
include 'user.php';
    
if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $token = openssl_random_pseudo_bytes(16);
    $token = bin2hex($token);
    $user = NULL;
    if ($_POST['username'] == 'admin' && $_POST['password'] == 'Pass@1234') {
        $user = new User('admin',1,$token);
    }
    else {
        $user = new User($_POST['username'],0,$token);
    }        
    $data = serialize($user);
    setcookie ('session', base64_encode ( $data ), time()+3600, "/");
    header('Location: home.php');
}
?>

