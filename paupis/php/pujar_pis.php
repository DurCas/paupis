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
		<title>PUJA UN PIS</title>
	</head>
	<body>
		<?php
			//Connexio
			require_once "../conexio.php";
			session_start();
			
			$anunci			= $_POST["anunci"];
			$via			= $_POST["via"];
			$adresa			= $_POST["adresa"];
			$numero			= $_POST["numero"];
			$pis			= $_POST["pis"];
			$porta			= $_POST["porta"];
			$escala			= $_POST["escala"];
			$districte	    = $_POST["districte"];	
			$superficie		= $_POST["superficie"];
			$habitacio		= $_POST["habitacio"];
			$lavabo			= $_POST["lavabo"];
			$orientacio		= $_POST["orientacio"];
			$preu			= $_POST["preu"];
			$coment			= $_POST["coment"];
			$visites        = 0;
			$datetime   	= date('Y-m-d H:i:s');

			$consulta   = "INSERT INTO immoble (anunci, via, carrer, numero, pis, porta, escala, districte, superficie, n_habitacions, n_lavabos, orientacio, preu, caracteristiques, visites, data_registre, id_usu) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$statement 	= $con->prepare($consulta);
			$statement->execute(array($anunci, $via, $adresa, $numero, $pis, $porta, $escala, $districte, $superficie, $habitacio, $lavabo, $orientacio, $preu, $coment, $visites, $datetime, $_SESSION["usuari"]));
			
			//$numfoto=$consulta->lastInsertId();
			$numfoto=$con->lastInsertId();
			if (is_uploaded_file ($_FILES['fotocasa1']['tmp_name'])) {
				$dir_subida = '../media/fotocases/';
				//Comprovar extensió
				$fileType = strtolower(pathinfo(basename($_FILES['fotocasa1']['name']),PATHINFO_EXTENSION));
				if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "pdf" && $fileType != "svg") {
					echo "Només s'accepten extensions jpg, jpeg, png, pdf";
				} else {
					//Pujar document
					$nombreDirectorio = "../media/fotoscases/";
					$fotocasa1 = $nombreDirectorio.$_SESSION["usuari"].$numfoto."-1.".$fileType;
					move_uploaded_file ($_FILES['fotocasa1']['tmp_name'],$fotocasa1);
					$actfoto1=$con->query("UPDATE immoble SET foto1='$fotocasa1' WHERE id='$numfoto'");
				}
			}

			if (is_uploaded_file ($_FILES['fotocasa2']['tmp_name'])) {
				$dir_subida = '../media/fotocases/';
				//Comprovar extensió
				$fileType = strtolower(pathinfo(basename($_FILES['fotocasa2']['name']),PATHINFO_EXTENSION));
				if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "pdf" && $fileType != "svg") {
					echo "Només s'accepten extensions jpg, jpeg, png, pdf";
				} else {
					//Pujar document
					$nombreDirectorio = "../media/fotoscases/";
					$fotocasa2 = $nombreDirectorio.$_SESSION["usuari"].$numfoto."-2.".$fileType;
					move_uploaded_file ($_FILES['fotocasa2']['tmp_name'],$fotocasa2);
					$actfoto2=$con->query("UPDATE immoble SET foto2='$fotocasa2' WHERE id='$numfoto'");
				}
			}

			if (is_uploaded_file ($_FILES['fotocasa3']['tmp_name'])) {
				$dir_subida = '../media/fotocases/';
				//Comprovar extensió
				$fileType = strtolower(pathinfo(basename($_FILES['fotocasa3']['name']),PATHINFO_EXTENSION));
				if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "pdf" && $fileType != "svg") {
					echo "Només s'accepten extensions jpg, jpeg, png, pdf";
				} else {
					//Pujar document
					$nombreDirectorio = "../media/fotoscases/";
					$fotocasa3 = $nombreDirectorio.$_SESSION["usuari"].$numfoto."-3.".$fileType;
					move_uploaded_file ($_FILES['fotocasa3']['tmp_name'],$fotocasa3);
					$actfoto3=$con->query("UPDATE immoble SET foto3='$fotocasa3' WHERE id='$numfoto'");
				}
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
					<a class="nav-item nav-link active" href="../pujar_pis.php">PUJAR UN PIS <span class="sr-only">(current)</span></a>
					<a class="nav-item nav-link" href="meu_pis.php">ELS MEUS PISOS</a>
				</div>
			</div>
			<span class="navbar-text">
				<?php echo "Hola ".$_SESSION["usuari"]. " |  "; ?>
			</span>
			<span class="navbar-text">
				<a href="tancar_sessio.php">Sortir</a>
			</span>
		</nav>

		<?php 	
			$consulta  = "SELECT * FROM immoble WHERE id=?";
			$statement = $con->prepare($consulta);
			$statement->execute(array($numfoto));
			if (!$statement) {
				print "Error en la consulta.\n";
			} else {
				foreach ($statement as $valor) {
					echo '<div class="container">';
						echo '<div class="row vp_foto">';
							echo '<div class="col-sm-4">';
								if ($valor["foto1"]!=""){
									echo '<img src="'.$valor["foto1"].'" class="imgportada"/>';
								} else {
									echo "";
								}
							echo '</div>';
							echo '<div class="col-sm-4">';
								if ($valor["foto2"]!=""){
									echo '<img src="'.$valor["foto2"].'" class="imgportada"/>';
								} else {
									echo "";
								}
							echo '</div>';
							echo '<div class="col-sm-4">';
								if ($valor["foto3"]!=""){
									echo '<img src="'.$valor["foto3"].'" class="imgportada"/>';
								} else {
									echo "";
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
						echo '<div class="row">';
							echo '<div class="col-sm infotab">';
								echo $valor["caracteristiques"];
							echo '</div>';
						echo '</div>';		
					echo '</div>';
				}
			} 	
	$statement->closeCursor();
?>
		


</body>
</html>