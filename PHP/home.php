
<?php
include 'user.php';
    if(!isset($_COOKIE['session']) || $_COOKIE['session']==NULL)
        header('Location: index.php');

    $user = unserialize(base64_decode($_COOKIE['session']));
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container" style="width:600px">
	<h1>Welcome <?php echo $user->username ?></h1>
    <?php
    if($user->admin == 1)
        echo '<h1>Admin Section unlocked</h1>';
    ?>
    <form action="logout.php">
    <input type="submit" value="logout"  class="btn">
    </form>
</body>
</html>