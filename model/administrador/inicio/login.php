<?php
    session_start();
    require_once ("../../../db/connection.php");
    //include("../../../controller/validar_licencia.php");
    $db = new DataBase();
    $con = $db -> conectar();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="../../../css/login.css">
     
</head>


<?php
    $nit=123456789;


    $sql= $con -> prepare ("select * FROM licencia WHERE licencia !='' AND id_estado = 1 AND nit = $nit");
    $sql -> execute();
    $fila = $sql -> fetchAll(PDO::FETCH_ASSOC);

    if ($fila){
      ?>    

<body>

   <header>
   <td>
    <form action="" method="POST">
   <div class="contenido">

<td><input type="submit" value="regresar" name="regresar" id="regresar"></td>
</div>
</form>

</tr>
</form>
<?php 

if (isset($_POST['regresar'])){
header('Location: ../../../index.html');
}

?>
    </header>
    
            <div class="login-box">

            <form method="POST" name="form1" id="form1" action="../../../controller/inicio.php" autocomplete="off" class="registration"> 
                <h1>👋  Iniciar Sesion</h1>
              
                <div class="user-box">
                <input type="text" name="cedula" required>
                <label>Documento</label>
                </div>
                
                <div class="user-box">
                <input type="password" name="contrasena" required>
                <label>Contraseña</label>
                </div>
              
                <button type="submit" name="inicio" value="validar" class="ingresar">Ingresar</button>
              
                <a href="../registrar/registro_user.php #usuarios" class="enlaces">Registrarse</a>
                <a href="recuperar_con.php" class="enlaces" id="contra">Olvide la contraseña</a>
          </form>   
</body>
</html>

<?php
    }
     else {
         header ("Location: ../../../index.html");
         exit();
     }
?>