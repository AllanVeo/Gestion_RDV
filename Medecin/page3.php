<link rel="icon" type="image/x-icon" href="images/logo.png">


<?php
require_once("modèle/modele.php");
?>

<header>
<h2> Gestion des RDV </h2>
</header>
<center>
<?php
$leRDV = null;
if (isset($_GET['action']) && isset($_GET['idRDV'])){
    $action = $_GET['action'];
    $idRDV = $_GET['idRDV'];
    switch($action){
        case "supp" : deleteRDV ($idRDV); break;
        case "edit" : 
        $leRDV = selectWhereRDV($idRDV);
        break;
    }
}
    require_once ("vue/vue_insert_rdv.php");
    if(isset($_POST['Valider'])){
        insertRDV($_POST);
        echo "<br> Insertion réussie du rdv.";
    }

    if (isset($_POST['Modifier'])){
        updateRDV($_POST);
        header(("Location: page3.php"));
    }
    $lesRDV = selectAllRDV();
    require_once ("vue/vue_select_rdv.php");
?>
</center>