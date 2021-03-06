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
                header("Location: ../index.php");
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
            $noupreu    = $_POST["preu"];
            $nousup     = $_POST["superficie"];
            $nouhab     = $_POST["n_habitacions"];
            $noulav     = $_POST["n_lavabos"];
            $coment     = $_POST["coment"];

            $consulta = "UPDATE immoble SET preu=$noupreu, superficie=$nousup, n_habitacions=$nouhab, n_lavabos=$noulav, caracteristiques='.$coment.' WHERE id=".$_POST["id"];
            //L'if només mira si la consulta es pot executar, no que sigui correcte
            
            if ($con->query($consulta)) {
				print "Modificat correctament<br>";
				$coment;
            } else {
                print "No s'ha modificat<br>" . $consulta;
            }
            
        ?>

        
        
	</body>
</html>