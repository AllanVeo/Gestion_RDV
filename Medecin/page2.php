<link rel="icon" type="image/x-icon" href="images/logo.png">


<?php
require_once("modèle/modele.php");
?>

<header>
<h2> Gestion des Patients </h2>
</header>
<center>
<?php
$lePatient = null;
if (isset($_GET['action']) && isset($_GET['idpatient'])){
    $action = $_GET['action'];
    $idPatient = $_GET['idpatient'];
    switch($action){
        case "supp" : deletePatient ($idPatient); break;
        case "edit" : 
        $lePatient = selectWherePatient($idPatient);
        break;
    }
}
    require_once ("vue/vue_insert_patient.php");
    if(isset($_POST['Valider'])){
        insertPatient($_POST);
        echo "<br> Insertion réussie du patient.";
    }

    if (isset($_POST['Modifier'])){
        updatePatient($_POST);
        header("Location: page2.php");
    }
    $lespatients = selectAllPatient();
    require_once ("vue/vue_select_patient.php");
?>
</center>