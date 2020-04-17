<?php
if (!$statement) {
				print "Error en la consulta.\n";
			} else {
				foreach ($statement as $valor) {
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
                echo "Aquestes són totes les cerques trobades.";
            } 
            ?>