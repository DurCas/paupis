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
		<title>PUJA UN PIS</title>
	</head>

	<body>
		<?php
		//Connexio
	    require_once "conexio.php";
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
					<a class="nav-item nav-link" href="home_regist.php">INICI </a>
					<a class="nav-item nav-link" href="cerca_pis.php">CERCA PISOS</a>
					<a class="nav-item nav-link active" href="pujar_pis.php">PUJAR UN PIS <span class="sr-only">(current)</span></a>
					<a class="nav-item nav-link" href="php/meu_pis.php">ELS MEUS PISOS</a>
				</div>
			</div>
			<span class="navbar-text">
				<?php echo "Hola ".$_SESSION["usuari"]. " |  "; ?>
			</span>
			<span class="navbar-text">
				<a href="php/tancar_sessio.php">Sortir</a>
			</span>
		</nav>

		<form action="php/pujar_pis.php" method="POST" enctype="multipart/form-data" name="pujar_pis">
			<div class="container">
				<div class="row">			
					<legend>ANUNCI</legend>			
				</div>				
				<div class="row">
					<div class="col-sm-3">
						Tipus d'anunci
					</div>
					<div class="col-sm-2 filaregis">
						<select name="anunci">'
							<option disabled selected>Escull quin tipus d'anunci</option>
							<option value="1">Venda</option>';
							<option value="2">Lloguer</option>';
							<option value="3">Venda i Lloguer</option>';
						</select>
					</div>
				</div>
				<div class="row">			
					<legend>DIRECCIÓ</legend>			
				</div>	
				<div class="row">
					<div class="col-sm-3">
						Via
					</div>
					<div class="col-sm-2 filamodal">
						<?php
							$consulta_via = "SELECT nom FROM via"; 
							$result = $con->query($consulta_via);
							if (!$result) {
								print "Error en la consulta.\n";
							} else {
								echo '<select name="via">';
								echo "<option disabled selected>Escull el tipus de via</option>";
								foreach ($result as $valor) {									
									echo '<option value="'.$valor["nom"].'">'.$valor["nom"].'</option>';
								}
								echo '</select>';
							}
						?>
					</div>	
				</div>		
				<div class="row">
					<div class="col-sm-3">
						Adreça 
					</div>
					<div class="col-sm-2 filamodal">
						<input type="text" name="adresa" required>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						Número
					</div>
					<div class="col-sm-2 filamodal">
						<input type="text" name="numero">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						Pis
					</div>
					<div class="col-sm-2 filamodal">
						<input type="text" name="pis">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						Porta
					</div>
					<div class="col-sm-2 filamodal">
						<input type="text" name="porta">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						Escala
					</div>
					<div class="col-sm-2 filamodal">
						<input type="text" name="escala">
					</div>
				</div>
				<!--<div class="row">
					<div class="col-sm-3">
						Barri
					</div>
					<div class="col-sm-2 filamodal">
						<select name="barri"></select>
					</div>
				</div>-->
				<div class="row">
					<div class="col-sm-3">
						Districte
					</div>
					<div class="col-sm-2 filamodal">
						<?php
							$consulta_dis = "SELECT nom FROM districte"; 
							$result = $con->query($consulta_dis);
							if (!$result) {
								print "Error en la consulta.\n";
							} else {
								echo '<select name="districte">';
								echo "<option disabled selected>Escull el districte</option>";
								foreach ($result as $valor) {									
									echo '<option value="'.$valor["nom"].'">'.$valor["nom"].'</option>';
								}
								echo '</select>';
							}
						?>
					</div>
				</div>
				<!--<div class="row">
					<div class="col-sm-3">
						Codi Postal
					</div>
					<div class="col-sm-2 filaregis">
						<select name="codi_postal"></select>
					</div>
				</div>-->

				<div class="row">
					<legend>INFORMACIÓ</legend>
				</div>
				<div class="row">
					<div class="col-sm-3">
						Superfície (m2)
					</div>
					<div class="col-sm-2 filamodal">
						<input type="number" name="superficie" pattern="^[1-9][0-9]*$">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						Número d'habitacions 
					</div>
					<div class="col-sm-2 filamodal">
						<input type="number" name="habitacio" pattern="^[1-9][0-9]*$">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						Número de lavabos
					</div>		
					<div class="col-sm-2 filamodal">	
						<input type="number" name="lavabo" pattern="^[1-9][0-9]*$">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-3">
						Orientació
					</div>
					<div class="col-sm-2 filaregis">
						<?php
							$consulta_ori = "SELECT nom FROM orientacio"; 
							$result = $con->query($consulta_ori);
							if (!$result) {
								print "Error en la consulta.\n";
							} else {
								echo '<select name="orientacio">';
								echo "<option disabled selected>Escull la orientació</option>";
								foreach ($result as $valor) {									
									echo '<option value="'.$valor["nom"].'">'.$valor["nom"].'</option>';
								}
								echo '</select>';
							}
						?>
					</div>
				</div>
					
				<div class="row">
					<legend>PREU</legend>
				</div>
				<div class="row">
					<div class="col-sm-3 filaregis">
						<input type="number" name="preu" pattern="^[1-9][0-9]*$"> €
					</div>
				</div>

				<div class="row">
					<legend>IMATGES</legend>
				</div>
				<div class="row">
					<div class="col-sm-4 filamodal">
						Selecciona com a màxim 3 arxius
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 filamodal">
						<input id="fotocasa1" type="file" name="fotocasa1">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 filamodal">
						<input id="fotocasa2" type="file" name="fotocasa2">
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 filaregis">
						<input id="fotocasa3" type="file" name="fotocasa3">
					</div>
				</div>
						
				<div class="row">
					<legend>COMENTARIS</legend>
				</div>
				<div class="row">
					<div class="col-sm-4 filamodal">	
						Escriu informació rellevant:
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 filaregis">
						<textarea name="coment" rows="5" cols="40"></textarea>
					</div>
				</div>	
					
				<div class="row">
					<div class="col-sm-2"><button type="submit" class="btn btn-estil btn-tamany">Enviar</button></div>
					<div class="col-sm-2"><button type="reset" class="btn btn-warning btn-modal btn-tamany">Esborrar</button></div>
				</div>
			</div>	
		</form>
	</body>
</html>