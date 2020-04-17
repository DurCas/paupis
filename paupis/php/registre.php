<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/style.css">
 </head>
<body>
    <?php
        require_once "../conexio.php";
        $id         = $_POST['id'];
        $consulta   = "SELECT * FROM usuari WHERE id=?";
        $statement  = $con->prepare($consulta);
        $statement->execute(array($id));
        $x=0;
        //echo $x;
            //Preparar l'INSERT d'usuari
            //if ($statement->fetchColumn!=0)
            while ($fila=$statement->fetch(PDO::FETCH_ASSOC)){
                $x=1;
                echo "Aquest nom d'usuari ja existeix <br />";                
                ?><p><a href="..\index.php">Tornar a la pàgina de registre</a></p> <?php                
            } 
            if($x==0){
                //Preparar si el mail existeix
                $email      = $_POST['email'];
                $consulta2  = "SELECT * FROM usuari WHERE email=?";
                $statement  = $con->prepare($consulta2); 
                $statement->execute(array($email));  
                //$consulta2->store_result();
                if ($consulta2->fetchColumn!=0){
                    echo " Aquest email ja existeix <br />";
                    ?><p><a href="..\index.php">Tornar a la pàgina de registre</a></p> <?php
                } else {
                    $id             = $_POST['id'];
                    $x              = $_POST['contrasenya'];
                    $contrasenya    = password_hash($x, PASSWORD_DEFAULT);
                    $email          = $_POST['email'];
                    $datetime       = date('Y-m-d H:i:s');
                    $consulta3      = "INSERT INTO usuari(id, contrasenya, email, data_registre) VALUES (?, ?, ?, ?)";
                    $statement      = $con->prepare($consulta3);
                    $statement->execute(array($id, $contrasenya, $email, $datetime));
                    header("Location: ../home_regist.php");                 
                }
            } 
            /*else {
                //Preparar si el mail existeix
                $email      = $_POST['email'];
                $consulta2  = "SELECT * FROM usuari WHERE email=?";
                $statement  = $con->prepare($consulta2); 
                $statement->execute(array($email));  
                //$consulta2->store_result();
                if ($consulta2->fetchColumn!=0){
                    echo " Aquest email ja existeix <br />";
                    ?><p><a href="..\index.php">Tornar a la pàgina de registre</a></p> <?php
                } else {
                    $id             = $_POST['id'];
                    $x              = $_POST['contrasenya'];
                    $contrasenya    = password_hash($x, PASSWORD_DEFAULT);
                    $email          = $_POST['email'];
                    $datetime       = date('Y-m-d H:i:s');
                    $consulta3      = "INSERT INTO usuari(id, contrasenya, email, data_registre) VALUES (?, ?, ?, ?)";
                    $statement      = $con->prepare($consulta3);
                    $statement->execute(array($id, $contrasenya, $email, $datetime));
                    header("Location: ../home_regist.php");                 
                }
            }*/
            ?><p><a href="../index.php">Logueja't</a></p><?php
        $statement->closeCursor();
    ?>

</body>
</html>