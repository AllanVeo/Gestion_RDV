<link rel="icon" type="image/x-icon" href="images/logo.png">


<?php
require_once("modèle/modele.php");
?>

<header>
<h2> Gestion des Ordonnances </h2>
</header>
<center>
<?php
$lordonance = null;
if (isset($_GET['action']) && isset($_GET['idordonance'])){
    $action = $_GET['action'];
    $idordonance = $_GET['idordonance'];
    switch($action){
        case "supp" : deleteOrdonance ($idordonance); break;
        case "edit" : 
        $lordonance = selectWhereOrdonance($idordonance);
        break;
    }
}
    require_once ("vue/vue_insert_ordonance.php");
    if(isset($_POST['Valider'])){
        insertOrdonance($_POST);
        echo "<br> Insertion réussie de l'ordonance.";
    }

    if (isset($_POST['Modifier'])){
        updateOrdonance($_POST);
        header(("Location: page4.php"));
    }
    $lesOrdonances = selectAllOrdonance();
    require_once ("vue/vue_select_ordonance.php");
?>
</center>