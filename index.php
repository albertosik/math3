<?php
session_start();
if(isset($_GET['logout']))
{
    session_unset();
    session_destroy();
}
require_once 'header.php';

if(isset($_POST['reg']))
{
    if(!empty($_POST['name']) && !empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['repassword']))
    {
        if($_POST['password'] == $_POST['repassword'])
        {
             $db = new classDb(HOST, USER, PASSWORD, DB);
            registration($_POST['name'],$_POST['login'],$_POST['password'],$db);
            unset($_GET['cmd']);
        }
        else 
        {
            echo '<div class="error">Пароли не совпадают</div>';
        }
    }
    else
    {
        echo '<div class="error">Заполнены не все поля</div>';
    }
}
if(isset($_SESSION['userid']))
{
    require 'game.php';
}
else if($_GET['cmd']=='reg')
{
    require 'registration.php';
}
else
{
    require 'authform.php';
}
require_once 'footer.php';
?>



