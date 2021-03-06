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
                <a class="nav-item nav-link" href="../cerca_pis.php">CERCA PISOS</a>
                <?php
                    if(isset($_SESSION["usuari"])){
                ?>
                <a class="nav-item nav-link" href="../pujar_pis.php">PUJAR UN PIS</a>
                <a class="nav-item nav-link" href="../php/meu_pis.php">ELS MEUS PISOS</a>
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
        $consulta = "SELECT * FROM immoble";
		$result = $con->query($consulta);
			if (!$result) {
				print "Error en la consulta.\n";
			} else {
				foreach ($result as $valor) {
					echo '<div class="container finalcontainer">';
						echo '<div class="row vp_foto">';
							echo '<div class="col-sm-4">';
								if ($valor["foto1"]==null){
									echo '';
								} else{
									echo '<img src="'.$valor["foto1"].'" class="imgportada"/>';
								}								
							echo '</div>';
							echo '<div class="col-sm-4">';
								if ($valor["foto2"]==null){
									echo '';
								} else{
									echo '<img src="'.$valor["foto2"].'" class="imgportada"/>';
								}	
							echo '</div>';
							echo '<div class="col-sm-4">';
								if ($valor["foto3"]==null){
									echo '';
								} else{
									echo '<img src="'.$valor["foto3"].'" class="imgportada"/>';
								}	
							echo '</div>';
						echo '</div>';
						echo '<div class="row filamodal">';
							echo '<div class="col-sm vp_preu">';
								echo $valor["preu"].'€';
							echo '</div>';
						echo '</div>';	
						echo '<div class="row">';
							echo '<div class="col-sm vp_titol">';
								echo '<legend>ADREÇA</legend>';
							echo '</div>';
						echo '</div>';					
						echo '<div class="row filaregis vp_direccio">';
							echo '<div class="col-sm infotab">';
								echo $valor["via"]. " " .$valor["carrer"].', '. $valor["numero"];
								if ($valor["pis"]!=""){
									echo ', '. $valor["pis"];
								}
								if ($valor["porta"]!=""){
									echo ' - '. $valor["porta"];
								}
								if ($valor["escala"]!=""){
									echo ', Escala '. $valor["escala"];
								}
							echo '</div>';
						echo '</div>';
						echo '<div class="row">';
							echo '<div class="col-sm vp_titol">';
								echo '<legend>CARACTERÍSTIQUES</legend>';
							echo '</div>';
						echo '</div>';	
						echo '<div class="row filaregis infotab">';
							echo '<div class="col-sm-1">';
								echo '<i class="fas fa-home vp_fas"></i>';
							echo '</div>';
							echo '<div class="col-sm-1">';
								echo $valor["superficie"].'m²';
							echo '</div>';
							echo '<div class="col-sm-1">';
								echo '<i class="fas fa-bed vp_fas"></i>';
							echo '</div>';
							echo '<div class="col-sm-1">';
								echo $valor["n_habitacions"];
							echo '</div>';
							echo '<div class="col-sm-1">';
								echo '<i class="fas fa-toilet vp_fas"></i>';
							echo '</div>';
							echo '<div class="col-sm-1">';
								echo $valor["n_lavabos"];
							echo '</div>';
						echo '</div>';
						echo '<div class="row">';
							echo '<div class="col-sm vp_titol">';
								echo '<legend>COMENTARIS</legend>';
							echo '</div>';
						echo '</div>';		
						echo '<div class="row filaregis">';
							echo '<div class="col-sm infotab">';
								echo $valor["caracteristiques"];
							echo '</div>';
						echo '</div>';
							echo "<a href='#' onclick='info(".$valor['id'].")'>+ INFO</button></a>";		
					echo '</div>';				
				}
			} 	
	?>

	<?php	
		include 'modal_totspisos.php';
	?>
    
</body>
</html>
<script>
function info(x){
    window.location="info.php?peli="+x;
}
</script>