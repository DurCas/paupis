
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
    //include 'imprimir_pis.php';
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
    //include 'imprimir_pis.php'; 
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
    //include 'imprimir_pis.php';
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
   //include 'imprimir_pis.php';
}

if (!$statement) {
    print "Error en la consulta.\n";
} else {
    $arrayPisos=array();
    foreach ($statement as $valor) {
        $pis = array(
            "id"                => $valor["id"],
            "via"               => $valor["via"],
            "carrer"            => $valor["carrer"],
            "numero"            => $valor["numero"],
            "pis"               => $valor["pis"],
            "porta"             => $valor["porta"],
            "escala"            => $valor["escala"],
            "cp"                => $valor["cp"],
            "barri"             => $valor["barri"],
            "districte"         => $valor["via"],
            "superficie"        => $valor["superficie"],
            "n_habitacions"     => $valor["n_habitacions"],
            "n_lavabos"         => $valor["n_lavabos"],
            "orientacio"        => $valor["orientacio"],
            "preu"              => $valor["preu"],
            "foto1"             => $valor["foto1"],
            "foto2"             => $valor["foto2"],
            "foto3"             => $valor["foto3"],
            "caracteristiques"  => $valor["caracteristiques"],
            "visites"           => $valor["fotovisites1"],
            "data_registre"     => $valor["data_registre"],
            "id_usu"            => $valor["id_usu"],
        )
    }
}
?>