<?php
session_start();
echo $_SESSION[$sesion];
if ($sesion!='activa'){
    header("location: index.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de errores</title>
    <link rel="stylesheet" href="CSS/styles.css">
</head>

<body>
    <div class="column-2" id="header">
        <h1>UUUPSS!</h1>
        <h3>La página está en mantenimiento. Se está mejorando su funcionamiento</h3>
    </div>

    <div class="column-2">
        <img src="IMG/robot.png" alt="">
    </div>

</body>

</html>