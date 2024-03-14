<link rel="icon" type="image/x-icon" href="images/logo.png">
<link rel="stylesheet" href="page.css"/> 

<?php
require_once("modèle/modele.php");
?>

<header>
<h2> Gestion des Medecins </h2>
</header>
<center>
<?php
$leMedecin = null;
if (isset($_GET['action']) && isset($_GET['idMedecin'])){
    $action = $_GET['action'];
    $idMedecin = $_GET['idMedecin'];
    switch($action){
        case "supp" : deleteMedecin ($idMedecin); break;
        case "edit" : 
        $leMedecin = selectWhereMedecin($idMedecin);
        break;
    }
}
    require_once ("vue/vue_insert_medecin.php");
    if(isset($_POST['Valider'])){
        insertMedecin($_POST);
        echo "<br> Insertion réussie du medecin.";
    }

    if (isset($_POST['Modifier'])){
        updateMedecin($_POST);
        header(("Location: page1.php"));
    }
    $lesMedecins = selectAllMedecin();
    require_once ("vue/vue_select_medecin.php");
?>

</center>