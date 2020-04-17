<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="../style/style.css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="functions.js"></script>
    <title>CERCA UN PIS</title>
</head>

<body>
		<?php
		//Connexio
	    require_once "../conexio.php";
		session_start();
		?>
	
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav">
			<a class="nav-item nav-link" href="../home_regist.php">INICI </a>
			<a class="nav-item nav-link active" href="../cerca_pis.php">CERCA PISOS</a>
			<?php
				if(isset($_SESSION["usuari"])){
			?>
			<a class="nav-item nav-link" href="../pujar_pis.php">PUJAR UN PIS <span class="sr-only">(current)</span></a>
			<a class="nav-item nav-link" href="meu_pis.php">ELS MEUS PISOS</a>
			<?php
				}
			?>
		</div>
	</div>
	<?php
	if(!isset($_SESSION["usuari"])){?>
	<span class="navbar-text">
		<a class="nav-item nav-link"  data-toggle="modal" href="#login">LOGUEJA'T</a>
	</span>
	<span class="navbar-text">
		<a class="nav-item nav-link"  data-toggle="modal" href="#regist">REGISTRA'T</a>
	</span>
	<?php
	} else {
	?>
	<span class="navbar-text">
	<?php echo "Hola ".$_SESSION["usuari"]. " |  "; ?>
	</span>
		<span class="navbar-text">
  		<a href="tancar_sessio.php">Sortir</a>
	</span>
	<?php
	}
	?>
</nav>

<?php

    $anunci     = $_POST["anunci"];
    $districte  = $_POST["districte"];
    $sup_min    = $_POST["sup_min"];
    if ($sup_min==0){
        $sup_min=0;
    }
    $sup_max    = $_POST["sup_max"]; 
    if ($sup_max==0){
        $sup_max=999;
    }  
    $n_habmin   = $_POST["n_habmin"];
    if ($n_habmin==0){
        $n_habmin=0;
    }
    $n_habmax   = $_POST["n_habmax"];
    if ($n_habmax==0){
        $n_habmax=999;
    }
    $n_lavmin   = $_POST["n_lavmin"];
    if ($n_lavmin==0){
        $n_lavmin=0;
    }
    $n_lavmax   = $_POST["n_lavmax"];
    if ($n_lavmax==0){
        $n_lavmax=999;
    }
    $orientacio = $_POST["orientacio"];
    //$terrassa   = $_POST["terrassa"];
    $buscar     = $_POST["buscar"];

    if($buscar==1){
        if($districte=='tots'){
            if($orientacio=='tots'){
                if ($anunci==3){
                    $consulta   = "SELECT * FROM immoble WHERE (anunci=1 OR anunci=2 OR anunci=3) AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? ORDER BY preu DESC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax)); 
                } else {
                    $consulta   = "SELECT * FROM immoble WHERE anunci=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? ORDER BY preu DESC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($anunci, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax)); 
                }
            } else{
                if ($anunci==3){
                    $consulta   = "SELECT * FROM immoble WHERE (anunci=1 OR anunci=2 OR anunci=3) AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? AND orientacio=? ORDER BY preu DESC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax, $orientacio)); 
                } else {
                    $consulta   = "SELECT * FROM immoble WHERE anunci=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? AND orientacio=? ORDER BY preu DESC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($anunci, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax, $orientacio)); 
                }
            }
        } else{
            if($orientacio=='tots'){
                if ($anunci==3){
                    $consulta   = "SELECT * FROM immoble WHERE (anunci=1 OR anunci=2 OR anunci=3) AND districte=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? ORDER BY preu DESC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($districte, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax)); 
                } else {
                    $consulta   = "SELECT * FROM immoble WHERE anunci=? AND districte=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ?ORDER BY preu DESC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($anunci, $districte, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax)); 
                }
            } else{
                if ($anunci==3){
                    $consulta   = "SELECT * FROM immoble WHERE (anunci=1 OR anunci=2 OR anunci=3) AND districte=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? AND orientacio=? ORDER BY preu DESC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($districte, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax, $orientacio)); 
                } else {               
                    $consulta   = "SELECT * FROM immoble WHERE anunci=? AND districte=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? AND orientacio=? ORDER BY preu DESC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($anunci, $districte, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax, $orientacio));    
                }
            }
        }
        include 'imprimir_pis.php';
    } else if($buscar==2) {
        if($districte=='tots'){
            if($orientacio=='tots'){
                if ($anunci==3){
                    $consulta   = "SELECT * FROM immoble WHERE (anunci=1 OR anunci=2 OR anunci=3) AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? ORDER BY preu ASC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax)); 
                } else {
                    $consulta   = "SELECT * FROM immoble WHERE anunci=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? ORDER BY preu ASC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($anunci, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax)); 
                }
            } else{
                if ($anunci==3){
                    $consulta   = "SELECT * FROM immoble WHERE (anunci=1 OR anunci=2 OR anunci=3) AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? AND orientacio=? ORDER BY preu ASC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax, $orientacio)); 
                } else {
                    $consulta   = "SELECT * FROM immoble WHERE anunci=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? AND orientacio=? ORDER BY preu ASC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($anunci, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax, $orientacio)); 
                }
            }
        } else{
            if($orientacio=='tots'){
                if ($anunci==3){
                    $consulta   = "SELECT * FROM immoble WHERE (anunci=1 OR anunci=2 OR anunci=3) AND districte=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? ORDER BY preu ASC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($districte, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax)); 
                } else {
                    $consulta   = "SELECT * FROM immoble WHERE anunci=? AND districte=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ?ORDER BY preu ASC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($anunci, $districte, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax)); 
                }
            } else{
                if ($anunci==3){
                    $consulta   = "SELECT * FROM immoble WHERE (anunci=1 OR anunci=2 OR anunci=3) AND districte=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? AND orientacio=? ORDER BY preu ASC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($districte, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax, $orientacio)); 
                } else {               
                    $consulta   = "SELECT * FROM immoble WHERE anunci=? AND districte=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? AND orientacio=? ORDER BY preu ASC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($anunci, $districte, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax, $orientacio));    
                }
            }
        }
		include 'imprimir_pis.php'; 
    } else if($buscar==3){
        if($districte=='tots'){
            if($orientacio=='tots'){
                if ($anunci==3){
                    $consulta   = "SELECT * FROM immoble WHERE (anunci=1 OR anunci=2 OR anunci=3) AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? ORDER BY data_registre DESC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax)); 
                } else {
                    $consulta   = "SELECT * FROM immoble WHERE anunci=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? ORDER BY data_registre DESC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($anunci, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax)); 
                }
            } else{
                if ($anunci==3){
                    $consulta   = "SELECT * FROM immoble WHERE (anunci=1 OR anunci=2 OR anunci=3) AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? AND orientacio=? ORDER BY data_registre DESC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax, $orientacio)); 
                } else {
                    $consulta   = "SELECT * FROM immoble WHERE anunci=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? AND orientacio=? ORDER BY data_registre DESC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($anunci, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax, $orientacio)); 
                }
            }
        } else{
            if($orientacio=='tots'){
                if ($anunci==3){
                    $consulta   = "SELECT * FROM immoble WHERE (anunci=1 OR anunci=2 OR anunci=3) AND districte=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? ORDER BY data_registre DESC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($districte, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax)); 
                } else {
                    $consulta   = "SELECT * FROM immoble WHERE anunci=? AND districte=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ?ORDER BY data_registre DESC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($anunci, $districte, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax)); 
                }
            } else{
                if ($anunci==3){
                    $consulta   = "SELECT * FROM immoble WHERE (anunci=1 OR anunci=2 OR anunci=3) AND districte=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? AND orientacio=? ORDER BY data_registre DESC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($districte, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax, $orientacio)); 
                } else {               
                    $consulta   = "SELECT * FROM immoble WHERE anunci=? AND districte=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? AND orientacio=? ORDER BY data_registre DESC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($anunci, $districte, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax, $orientacio));    
                }
            }
        }
		include 'imprimir_pis.php';
    } else if($buscar==4){
        if($districte=='tots'){
            if($orientacio=='tots'){
                if ($anunci==3){
                    $consulta   = "SELECT * FROM immoble WHERE (anunci=1 OR anunci=2 OR anunci=3) AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? ORDER BY data_registre ASC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax)); 
                } else {
                    $consulta   = "SELECT * FROM immoble WHERE anunci=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? ORDER BY data_registre ASC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($anunci, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax)); 
                }
            } else{
                if ($anunci==3){
                    $consulta   = "SELECT * FROM immoble WHERE (anunci=1 OR anunci=2 OR anunci=3) AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? AND orientacio=? ORDER BY data_registre ASC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax, $orientacio)); 
                } else {
                    $consulta   = "SELECT * FROM immoble WHERE anunci=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? AND orientacio=? ORDER BY data_registre ASC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($anunci, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax, $orientacio)); 
                }
            }
        } else{
            if($orientacio=='tots'){
                if ($anunci==3){
                    $consulta   = "SELECT * FROM immoble WHERE (anunci=1 OR anunci=2 OR anunci=3) AND districte=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? ORDER BY data_registre ASC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($districte, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax)); 
                } else {
                    $consulta   = "SELECT * FROM immoble WHERE anunci=? AND districte=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ?ORDER BY data_registre ASC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($anunci, $districte, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax)); 
                }
            } else{
                if ($anunci==3){
                    $consulta   = "SELECT * FROM immoble WHERE (anunci=1 OR anunci=2 OR anunci=3) AND districte=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? AND orientacio=? ORDER BY data_registre ASC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($districte, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax, $orientacio)); 
                } else {               
                    $consulta   = "SELECT * FROM immoble WHERE anunci=? AND districte=? AND superficie BETWEEN ? AND ? AND n_habitacions BETWEEN ? AND ? AND n_lavabos BETWEEN ? AND ? AND orientacio=? ORDER BY data_registre ASC";
                    $statement  = $con->prepare($consulta);
                    $statement->execute(array($anunci, $districte, $sup_min, $sup_max, $n_habmin, $n_habmax, $n_lavmin, $n_lavmax, $orientacio));    
                }
            }
        }
		include 'imprimir_pis.php';
    }
?>

<?php
	include 'modal.php';
?>

</body>
</html>
<script>
function info(x){
    window.location="info.php?peli="+x;
}
</script>