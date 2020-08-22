<html>
<form action="" method="post">
    <label for="">Set/Reset cookie</label>
    <input type="submit" name="set" value="Reset">
</form>
</html>

<?php
class Secret{
    public $username;
    public $token;
    public function __construct($username, $token)
    {
        $this->username = $username;
        $this->token = $token;
    }
}

function setSecretCookie()
{
    $someguy = new Secret('someguy', 'WEAKTOKEN');
    setcookie ('secret', base64_encode ( serialize($someguy) ), time()+3600, "/");
}

if(isset($_POST['set']) && $_POST['set']=='Reset')
    setSecretCookie();

$user = unserialize(base64_decode($_COOKIE['secret']));
if($user->username == 'admin' && $user->token == 'AVERYLONGANDRANDOMTOKENWITHOORANYNUMBERLIKE1234789')
    echo 'You are admin and you have accessed the secret section';
else
    echo 'Sup low privileged punk';

?>
