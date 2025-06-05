<?php
require("../functions/library.php");
require("../functions/user.php");

$email_cond = condition($_POST["email"]);
$pswd_cond = condition($_POST["pswd"]) && $_POST["pswd"] == $_POST["pswd_r"];
$name_cond = condition($_POST["name"]);
$ulga_cond = condition($_POST["ulga"]);

if($email_cond && $pswd_cond && $name_cond && $ulga_cond)
{
    $user = new User($_POST["email"], $_POST["pswd"], $_POST["name"], $_POST["ulga"]);
    $user->CreateUser();
    header("Location: http://localhost/BetterPKP/index.php");
    exit();
}
else
{
    header("Location: http://localhost/BetterPKP/index.php?err=1");
    exit();
}
?>