<?php

session_start();
echo $_SESSION[$sesion];
if ($sesion!='activa'){
    header("location: index.html");
}
else{
    $_SESSION[$sesion]='activa';
}
try {
    $connection=mysqli_connect('localhost','root','','db_projecte');
        //echo "<script>alert('connexion establecida')</script>";
    } catch (\Exception $e) {
        header("Location: mantenimiento.html");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mac School</title>
    <link rel="stylesheet" href="./CSS/brocs10.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="navbar" >
        <button onclick="alumno()" class="boton">Alumnos</button>
        <button onclick="profe()" class="boton">Profesores</button>
        <button onclick="departamento()" class="boton">Departamentos</button>
        <button onclick="clase()" class="boton">Clases</button>
        <button onclick="añadir()" class="boton" id="a">Añadir</button>
        <input type="search" placeholder="Buscar" class="lupa">
        <button>Buscar</button>
        <button class="boton">Filtrar</button>
    </div>
    <!-- Tabla alumnos -->
    <div id="alumnos">
        <h1>Alumnos</h1>
        <table class="tabla">
        <thead>
        <tr>
        <th>Matricula</th>
        <th>Nombre</th>
        <th>Apellido 1</th>
        <th>Apellido 2</th>
        <th>Correo</th>
        <th>Dni</th>
        <th>Telefono</th>
        <th>Fecha de matriculacion</th>
        <th>Clase</th>
        <th>Borrar</th>
        <th>Editar</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <?php
        $sql = "SELECT ALUMNE.*, CLASSE.nom_classe FROM ALUMNE
        INNER JOIN CLASSE ON ALUMNE.classe = CLASSE.id_classe ORDER BY num_matric ASC";
        $listaalumnos=mysqli_query($connection, $sql);
        foreach ($listaalumnos as $alumno) {
            echo "<tr>
                    <td>{$alumno['num_matric']}</td>
                    <td>{$alumno['nom_alu']}</td>
                    <td>{$alumno['cognom1_alu']}</td>
                    <td>{$alumno['cognom2_alu']}</td>
                    <td>{$alumno['email_alu']}</td>
                    <td>{$alumno['dni_alu']}</td>
                    <td>{$alumno['telf_alu']}</td>
                    <td>{$alumno['fecha_matric_alu']}</td>
                    <td>{$alumno['nom_classe']}</td>
                    <td><button class='boton2' onclick='aviso({$alumno['num_matric']})' id=({$alumno['num_matric']})>Borrar</button></td>
                    <td><button class='boton3' onclick='aviso({$alumno['num_matric']})' id=({$alumno['num_matric']})>Editar</button></td>
             </tr>";
        }
        ?>
        </tr>
        </tbody>
        </table>
    </div>
    <!-- Tabla profesores -->
    <div id="profes">
        <h1>Profesores</h1>
        <table class="tabla">
        <thead>
        <tr>
        <th>DNI</th>
        <th>Nombre</th>
        <th>Apellido 1</th>
        <th>Apellido 2</th>
        <th>Correo</th>
        <th>Telefono</th>
        <th>Salario</th>
        <th>Departamento</th>
        <th>Borrar</th>
        <th>Editar</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <?php
        
        $sql = "SELECT PROFESSOR.*, DEPARTAMENT.nom_dept FROM PROFESSOR
        INNER JOIN DEPARTAMENT ON PROFESSOR.dept_prof = DEPARTAMENT.id_dep";

        $result = $connection->query ($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_array()) {
                $fila="<tr>";
                $fila=$fila."<td>" . $row["dni_profe"] . "</td>";
                $fila=$fila."<td>" . $row["nom_profe"] . "</td>";
                $fila=$fila."<td>" . $row["cognom1_profe"] . "</td>";
                $fila=$fila."<td>" . $row["cognom2_profe"] . "</td>";
                $fila=$fila."<td>" . $row["email_prof"] . "</td>";
                $fila=$fila."<td>" . $row["telf_prof"] . "</td>";
                $fila=$fila."<td>" . $row["sal_prof"] . "</td>";
                $fila=$fila."<td>" . $row["nom_dept"] . "</td>";
                $fila=$fila."<td><button class='boton2' onclick='aviso()'>Borrar</button></td>";
                $fila=$fila."<td><button class='boton3' onclick='aviso()'>Editar</button></td>";
                echo $fila;
                }
            }
        ?>
        </tr>
        </tbody>
        </table>
    </div>
    <!-- Tabla departamentos -->
    <div id="departamentos">
        <h1>Departamentos</h1>
        <table class="tabla">
        <thead>
        <tr>
        <th>Numero del departamento</th>
        <th>Nombre del departamento</th>
        <th>Borrar</th>
        <th>Editar</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <?php
        $sql = "SELECT * FROM DEPARTAMENT";
        
        $listado=mysqli_query($connection, $sql);
        
        foreach ($listado as $lista) {
            echo "<tr>
                    <td>{$lista['codi_dept']}</td>
                    <td>{$lista['nom_dept']}</td>
                    <td><button class='boton2' onclick='aviso({$lista['id_dep']})' id=({$lista['id_dep']})>Borrar</button></td>
                    <td><button class='boton3' onclick='aviso({$lista['id_dep']})' id=({$lista['id_dep']})>Editar</button></td>
             </tr>";
        }
        ?>
        </tr>
        </tbody>
        </table>
    </div>
    <!-- Tabla clases -->
    <div id="clases">
        <h1>Clases</h1>
        <table class="tabla">
        <thead>
        <tr>
        <th>Numero de la clase</th>
        <th>Clase</th>
        <th>Tutor</th>
        <th>Borrar</th>
        <th>Editar</th>
        </tr>
        </thead>
        <tbody>
        <tr>
        <?php

        $sql = "SELECT CLASSE.*, PROFESSOR.nom_profe FROM CLASSE
        INNER JOIN PROFESSOR ON CLASSE.tutor = PROFESSOR.dni_profe";
        
        $listado=mysqli_query($connection, $sql);
        
        foreach ($listado as $lista) {
            echo "<tr>
                    <td>{$lista['codi_classe']}</td>
                    <td>{$lista['nom_classe']}</td>
                    <td>{$lista['nom_profe']}</td>
                    <td><button class='boton2' onclick='aviso({$lista['id_classe']})' id=({$lista['id_classe']})>Borrar</button></td>
                    <td><button class='boton3' onclick='aviso({$lista['id_classe']})' id=({$lista['id_classe']})>Editar</button></td>
             </tr>";
        }
        ?>
        </tr>
        </tbody>
        </table>
    </div>
    <!-- Lista desplegable añadir datos -->
    <div id="añado">
        <button class="boton" onclick="crearAlumno()">Nuevo Alumno</button>
        <br>
        <button class="boton" onclick="crearProfe()">Nuevo profe</button>
        <br>
        <button class="boton" onclick="crearClase()">Nueva clase</button>
        <br>
        <button class="boton" onclick="crearDep()">Nuevo departamento</button>
    </div>
    <div id="crearAlu" class="formulario">
        <form action="inserts.php" method="post">
            <h2>Escriba los datos del alumno</h2>
            <label for="">Introduzca el numero de matricula:</label>
            <br>
            <input type="number" class="tex" name="matric" required>
            <br>
            <br>
            <label for="">Introduzca el nombre:</label>
            <br>
            <input type="text" class="tex" name="nomalu" required>
            <br>
            <br>
            <label for="">Introduzca el primer apellido:</label>
            <br>
            <input type="text" class="tex" name="apellidoalu" required>
            <br>
            <br>
            <label for="">Introduzca el segundo apellido:</label>
            <br>
            <input type="text" name="sapellidoalu" class="tex">
            <br>
            <br>
            <label for="">Introduzca el correo:</label>
            <br>
            <input type="email" name="mailalu" class="tex" required>
            <br>
            <br>
            <label for="">Introduzca el DNI:</label>
            <br>
            <input type="text" name="dnialu" class="tex" required>
            <br>
            <br>
            <label for="">Introduzca el numero de telefono:</label>
            <br>
            <input type="number" name="telfalu" class="tex" required>
            <br>
            <br>
            <label for="">Introduzca la clase:</label>
            <br>
            <select name="clasealu" id="" required>
                <?php
                $sql = "select id_classe, nom_classe from classe;";
                $respuestas = mysqli_query($connection, $sql);
                foreach ($respuestas as $respuesta){
                    $id=$respuesta['id_classe'];
                    $clase=$respuesta['nom_classe'];
                    echo "<option value='$id'>$clase</option>";
                }
                ?>
            </select>
            <br>
            <br>
            <button onclick="volver2()" class="boton2">Volver</button>
            <button type="submit" class="boton3" name="accion" value="1">Enviar</button>
            <br>
            <br>
        </form>
    </div>
    <div id="crearProf" class="formulario">
        <form action="inserts.php" method="post">
            <h2>Escriba los datos del profesor</h2>
            <label for="">Introduzca el DNI:</label>
            <br>
            <input type="number" name="dniprofe" class="tex" required>
            <br>
            <br>
            <label for="">Introduzca el nombre:</label>
            <br>
            <input type="text" name="nomprofe" class="tex" required>
            <br>
            <br>
            <label for="">Introduzca el primer apellido:</label>
            <br>
            <input type="text" name="apellidoprofe" class="tex" required>
            <br>
            <br>
            <label for="">Introduzca el segundo apellido:</label>
            <br>
            <input type="text" name="sapellidoprofe" class="tex">
            <br>
            <br>
            <label for="">Introduzca el correo:</label>
            <br>
            <input type="email" name="mailprofe" class="tex" required>
            <br>
            <br>
            <label for="">Introduzca el numero de telefono:</label>
            <br>
            <input type="number" name="telfprofe" class="tex" required>
            <br>
            <br>
            <label for="">Introduzca el salario:</label>
            <br>
            <input type="number" name="salprofe" class="tex" required>
            <br>
            <br>
            <label for="">Introduzca el departamento:</label>
            <br>
            <select name="deptprofe" id="" required>
                <?php
                $sql = "select id_dep, nom_dept from departament;";
                $respuestas = mysqli_query($connection, $sql);
                foreach ($respuestas as $respuesta){
                    $idDEP=$respuesta['id_dep'];
                    $DEP=$respuesta['nom_dept'];
                    echo "<option value='$idDEP'>$DEP</option>";
                }
                ?>
            </select>
            <br>
            <br>
            <button onclick="volver2()" class="boton2">Volver</button>
            <button type="submit" class="boton3" name="accion" value="2">Enviar</button>
            <br>
            <br>
        </form>
    </div>
    <div id="crearDep" class="formulario">
        <form action="inserts.php" method="post">
            <h2>Escriba los datos del departamento</h2>
            <label for="">Introduzca el numero:</label>
            <br>
            <input type="number" name="numdept" class="tex" required>
            <br>
            <br>
            <label for="">Introduzca el nombre:</label>
            <br>
            <input type="text" name="nomdept" class="tex" required>
            <br>
            <br>
            <button onclick="volver2()" class="boton2">Volver</button>
            <button type="submit" class="boton3" name="accion" value="3">Enviar</button>
            <br>
            <br>
        </form>
    </div>
    <div id="crearClase" class="formulario">
        <form action="inserts.php" method="post">
            <h2>Escriba los datos de la clase</h2>
            <label for="">Introduzca el numero:</label>
            <br>
            <input type="number" name="numclase" class="tex" required>
            <br>
            <br>
            <label for="">Introduzca el nombre:</label>
            <br>
            <input type="text" name="nomclase" class="tex" required>
            <br>
            <br>
            <label for="">Introduzca el tutor:</label>
            <br>
            <select name="tutor" id="" required>
                <?php
                $sql = "select dni_profe, nom_profe from professor;";
                $respuestas = mysqli_query($connection, $sql);
                foreach ($respuestas as $respuesta){
                    $dni_profe=$respuesta['dni_profe'];
                    $tutor=$respuesta['nom_profe'];
                    echo "<option value='$dni_profe'>$tutor</option>";
                }
                ?>
            </select>
            <br>
            <br>
            <button onclick="volver2()" class="boton2">Volver</button>
            <button type="submit" class="boton3" name="accion" value="4">Enviar</button>
            <br>
            <br>
        </form>
    </div>
    <div id="confir">
        <h2>¿Estas seguro?</h2>
        <br>
        <button class="boton2 botonmod" onclick="borrar()">Si</button>
        <button class="boton3 botonmod" onclick="cancelar()">No</button>
    </div>
    <?php $accion='0'; ?>
<script src="JS/main5.js"></script>
</body>
</html>
