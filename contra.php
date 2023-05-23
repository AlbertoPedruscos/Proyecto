<?php
$user=$_POST['user'];
$contra=$_POST['contra'];
if ($user!='admin' or $contra!='qweQWE123'){
    echo "<script>alert('usuario o contraseña incorrectos')</script>";
    header("location: index.html");
    exit;
}
else{
    $_SESSION[$sesion]='activa';
    header("location: pagina2.php");
}
