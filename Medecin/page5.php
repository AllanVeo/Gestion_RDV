<link rel="icon" type="image/x-icon" href="images/logo.png">


<?php
require_once("modèle/modele.php");
?>

<hearder>
<h2> Gestion des Médicaments </h2>
</header>
<center>
<?php
$leMedicament = null;
if (isset($_GET['action']) && isset($_GET['idmedicament'])){
    $action = $_GET['action'];
    $idmedicament = $_GET['idmedicament'];
    switch($action){
        case "supp" : deleteMedicament ($idmedicament); break;
        case "edit" : 
        $leMedicament = selectWhereMedicament($idmedicament);
        break;
    }
}
    require_once ("vue/vue_insert_medicament.php");
    if(isset($_POST['Valider'])){
        insertMedicament($_POST);
        echo "<br> Insertion réussie du medicament.";
    }

    if (isset($_POST['Modifier'])){
        updateMedicament($_POST);
        header(("Location: page5.php"));
    }
    $lesMedicaments = selectAllMedicament();
    require_once ("vue/vue_select_medicament.php");
?>
</center>