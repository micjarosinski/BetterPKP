<?php
session_start();
require("../functions/library.php");
require("../functions/user.php");

$email_cond = condition($_POST["email"]);
$pswd_cond = condition($_POST["pswd"]);
if($email_cond && $pswd_cond)
{
    $user = new User($_POST["email"], $_POST["pswd"], "", "");
    $user->CheckUser();
    if($user->CheckUser() == true)
    {
        $name = $user->CheckName();
        $permission = $user->CheckPermission();
        $_SESSION["logged"] = [time(), $name, $permission];
        header("Location: http://localhost/BetterPKP/page/site.php");
        exit();
    }
    else
    {
        header("Location: http://localhost/BetterPKP/index.php?err=3");
        exit();
    }
}
else
{
    header("Location: http://localhost/BetterPKP/index.php?err=1");
    exit();
}
?>