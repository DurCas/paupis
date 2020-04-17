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
        if (isset($_POST)){
            require_once "../conexio.php";
            $id             = $_POST['id'];
            $pass           = $_POST['contrasenya'];
            $consulta="SELECT * FROM usuari WHERE id=?";
            $statement=$con->prepare($consulta);
            $statement->execute(array($id));
            if($data = $statement->fetch(PDO::FETCH_ASSOC)){
                if (password_verify($pass, $data["contrasenya"])){
                    session_start();
                    $_SESSION["usuari"]=$id;
                    header("Location: ../home_regist.php");
                } else {
                    echo "Contrasenya incorrecte <br>";
                }
            } else {
                echo "El nom d'usuari no coincideix.";
            }
        } else {
            header("Location: ../index.php");
        }
        $statement->closeCursor();
    ?>
<p><a href="../index.php">Tornar a la pàgina inicial</a></p>
</body>
</html>