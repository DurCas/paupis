<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  	<link rel="stylesheet" type="text/css" href="style/style.css">
  	<link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="functions.js"></script>
	<title>CERCA UN PIS</title>
</head>
<body>
		<?php
		//Connexio
	    require_once "conexio.php";
		session_start();
		?>
	
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
		<div class="navbar-nav">
			<a class="nav-item nav-link" href="home_regist.php">INICI </a>
			<a class="nav-item nav-link active" href="#">CERCA PISOS</a>
			<?php
				if(isset($_SESSION["usuari"])){
			?>
			<a class="nav-item nav-link" href="pujar_pis.php">PUJAR UN PIS <span class="sr-only">(current)</span></a>
			<a class="nav-item nav-link" href="php/meu_pis.php">ELS MEUS PISOS</a>
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
  		<a href="php/tancar_sessio.php">Sortir</a>
	</span>
	<?php
	}
	?>
</nav>

<form action="php/cerca_pis.php" method="POST" enctype="multipart/form-data" name="cerca_pis">
	<div class="container">
		<div class="row">
			<legend>FILTRES</legend>
		</div>
		<div class="row">
			<div class="col-sm-3">
				Anunci 
			</div>
			<div class="col-sm-2 filamodal">
				<select name="anunci" id="anunci">
					<option value="3">Lloguer i Venda</option>
					<option value="1">Lloguer</option>
					<option value="2">Venda</option>					
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				Districte 
			</div>
			<div class="col-sm-2 filaregis">
				<?php
					$consulta_dis = "SELECT nom FROM districte"; 
					$result = $con->query($consulta_dis);
					if (!$result) {
						print "Error en la consulta.\n";
					} else {
						echo '<select name="districte" id="districte">';
						echo '<option value="tots">Tots</option>';
						foreach ($result as $valor) {									
							echo '<option value="'.$valor["nom"].'">'.$valor["nom"].'</option>';
						}						
						echo '</select>';
					}
				?>
			</div>
		</div>
		<div class="row">
			<legend>CARACTERÍSTIQUES</legend>
		</div>
		<div class="row">
			<div class="col-sm-3">
				Superfície
			</div>	
			<div class="col-sm-1 filamodal minmax">
				Mínim
			</div>
			<div class="col-sm-2 filamodal">
				<input type="number" name="sup_min" pattern="^[1-9][0-9]*$" class="minmax" id="sup_min"></input>
			</div>
			<div class="col-sm-1 filamodal minmax">
				Màxim
			</div>		
			<div class="col-sm-2 filamodal">
				<input type="number" name="sup_max" pattern="^[1-9][0-9]*$" class="minmax" id="sup_max"></input>
			</div>			
		</div>
		<div class="row">
			<div class="col-sm-3">
				Número d'habitacions
			</div>
			<div class="col-sm-1 filamodal minmax">
				Mínim
			</div>
			<div class="col-sm-2 filamodal">
				<input type="number" name="n_habmin" pattern="^[1-9][0-9]*$" class="minmax" id="n_habmin"></input>
			</div>
			<div class="col-sm-1 filamodal minmax">
				Màxim
			</div>
			<div class="col-sm-2 filamodal">
				<input type="number" name="n_habmax" pattern="^[1-9][0-9]*$" class="minmax" id="n_habmax"></input>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				Número de lavabos
			</div>
			<div class="col-sm-1 filamodal minmax">
				Mínim
			</div>
			<div class="col-sm-2 filamodal">
				<input type="number" name="n_lavmin" pattern="^[1-9][0-9]*$" class="minmax" id="n_lavmin"></input>
			</div>
			<div class="col-sm-1 filamodal minmax">
				Màxim
			</div>
			<div class="col-sm-2 filamodal">
				<input type="number" name="n_lavmax" pattern="^[1-9][0-9]*$" class="minmax" id="n_lavmax"></input>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				Orientació
			</div>
			<div class="col-sm-3 filaregis">				
				<?php
					$consulta_ori = "SELECT nom FROM orientacio"; 
					$result = $con->query($consulta_ori);
					if (!$result) {
						print "Error en la consulta.\n";
					} else {
						echo '<select name="orientacio" id="orientacio">';
						echo '<option value="tots">Totes</option>';
						foreach ($result as $valor) {									
							echo '<option value="'.$valor["nom"].'">'.$valor["nom"].'</option>';
						}
						echo '</select>';
					}
				?>
			</div>
		</div>	
		<div class="row">
			<legend>CERCA</legend>
		</div>
		<div class="col-sm-2">
			<div class="row">
				<select name="buscar" class="filaregis" id="buscar">
					<option disabled selected>Escull com vols buscar</option>
					<option value="1">Preu més alt</option>
					<option value="2">Preu més baix</option>
					<option value="3">Més recent</option>
					<option value="4">Més antic</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-2"><button type="submit" class="btn btn-estil btn-tamany">Enviar</button></div>
			<div class="col-sm-2"><button type="reset" class="btn btn-warning btn-modal btn-tamany">Esborrar</button></div>
		</div>
	</div>
</form>
<div class="container">
	<div class="row">
		<div class="col-sm" is="result">
			RESULTAT AJAX 
		</div>
	</div>
</div>

<?php
	include 'php/modal.php';
?>

</body>
</html>