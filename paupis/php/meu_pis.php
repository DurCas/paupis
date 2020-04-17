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
		<title>ELS MEUS PISOS</title>
	</head>

	<body>
        <?php
        	//Connexio
	        require_once "../conexio.php";
            session_start();
            if(!isset($_SESSION["usuari"])){
                header("Location: index.php");
            } 
		?>
		
		<nav class="navbar navbar-expand-lg navbar-light sticky-top">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-item nav-link" href="../home_regist.php">INICI </a>
					<a class="nav-item nav-link" href="../cerca_pis.php">CERCA PISOS</a>
					<a class="nav-item nav-link" href="../pujar_pis.php">PUJAR UN PIS</a>
					<a class="nav-item nav-link active" href="meu_pis.php">ELS MEUS PISOS <span class="sr-only">(current)</span></a>
				</div>
			</div>
			<span class="navbar-text">
				<?php echo "Hola ".$_SESSION["usuari"]. " |  "; ?>
			</span>
			<span class="navbar-text">
				<a href="../php/tancar_sessio.php">Sortir</a>
			</span>
		</nav>

        <?php
			//$consulta = 'SELECT * FROM immoble WHERE id_usu="'.$_SESSION['usuari'].'"';
			$consulta	= 'SELECT * FROM immoble WHERE id_usu=?';
			$statement	= $con->prepare($consulta);
			$statement->execute(array($_SESSION['usuari']));
                if (!$statement) {
                    print "Error en la consulta.\n";
                } else {
					echo '<div class="container">';
						echo '<div class="row titoltaula">';
							echo '<div class="col-sm-2">';
								echo 'Adreça';
							echo '</div>';
							echo '<div class="col-sm-1">';
								echo 'Número';
							echo '</div>';
							echo '<div class="col-sm-1">';
								echo 'Pis';
							echo '</div>';
							echo '<div class="col-sm-1">';
								echo 'Porta';
							echo '</div>';
							echo '<div class="col-sm-1">';
								echo 'Escala';
							echo '</div>';
							echo '<div class="col-sm-1">';
								echo '';
							echo '</div>';
							echo '<div class="col-sm-2">';
								echo 'Preu';
							echo '</div>';
							echo '<div class="col-sm-1">';
								echo 'Superfície';
							echo '</div>';
							echo '<div class="col-sm-1">';
								echo 'Editar';
							echo '</div>';
							echo '<div class="col-sm-1">';
								echo 'Borrar';
							echo '</div>';
						echo '</div>';		
                    foreach ($statement as $valor) {
						echo '<div class="row texttaula" id="'.$valor["id"].'">';
							echo '<div class="col-sm-2">';
								echo $valor["carrer"];
							echo '</div>';
							if ($valor["numero"]!=""){
								echo '<div class="col-sm-1">';
									echo $valor["numero"];
								echo '</div>';
							} else {
								echo '<div class="col-sm-1">';
									echo " ";
								echo '</div>';								
							}							
							if ($valor["pis"]!=""){
								echo '<div class="col-sm-1">';
									echo $valor["pis"];
								echo '</div>';
							} else {
								echo '<div class="col-sm-1">';
									echo " ";
								echo '</div>';								
							}	
							if ($valor["porta"]!=""){
								echo '<div class="col-sm-1">';
									echo $valor["porta"];
								echo '</div>';
							} else {
								echo '<div class="col-sm-1">';
									echo " ";
								echo '</div>';								
							}	
							if ($valor["escala"]!=""){
								echo '<div class="col-sm-1">';
									echo $valor["escala"];
								echo '</div>';
							} else {
								echo '<div class="col-sm-1">';
									echo " ";
								echo '</div>';								
							}		
							echo '<div class="col-sm-1">';
								echo ' ';
							echo '</div>';
							echo '<div class="col-sm-2">';
								echo $valor["preu"],' €';
							echo '</div>';
							echo '<div class="col-sm-1">';
								echo $valor["superficie"].'m2';
							echo '</div>';
							echo '<div class="col-sm-1">';
								echo "<a href='#' onclick='editar(".$valor['id'].")'><i class='fas fa-edit'></i></a>";
							echo '</div>';
							echo '<div class="col-sm-1">';
								echo "<a href='#' onclick='borrar(".$valor['id'].")'><i class='fas fa-trash-alt'></i></a>";
							echo '</div>';
						echo '</div>';
					}
					echo '</div>';
                }                
            $statement->closeCursor();
        ?>
	</body>
</html>
<script>
function borrar(x){
    window.location="borrar.php?peli="+x;
}
function editar(x){
    window.location="editar.php?peli="+x;
}
</script>