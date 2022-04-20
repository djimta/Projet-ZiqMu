<?php
if(!isset($_REQUEST['action']))
{
 $action = 'accueil';
}
else {
 $action = $_REQUEST['action'];
}

// vue qui crée l’en-tête de la page
include("../vues/v_entete.php") ;

require_once ("../modele/class_PDOziqmu.php");
$monPdoMusic = PdoMusic::getPdoMusic();

switch($action)
{
 case 'accueil':
 // vue qui crée le contenu de la page d’accueil
 include("../vues/v_accueil.php");
 break;
}
 switch($action)
 {
  case 'catalogue':
  require_once ("../modele/class_PDOziqmu.php");
  $result = $monPdoMusic -> getSeances();


  include("../vues/v_catalogue.php");
  break;
 } 
switch($action)
  {
    case 'inscription':
    require_once ("../modele/class_PDOziqmu.php");
    $result = $monPdoMusic -> getSeances(); 
   include("../vues/v_inscrits.php");
   break;
}

switch($action)
  {
    // vue qui crée le contenu de la page des inscrits
    case 'inscrit':
      require_once ("../modele/class_PDOziqmu.php");
      $inscr = $monPdoMusic -> GetInscrits();
  if(isset($_POST["envoie"])){
    try{

      $idcours = $_POST['cours_id'];
      $nom = $_POST['user_name'];
      $prenom = $_POST['user_prenom'];
      $adresse = $_POST['user_adress']; 
      $email = $_POST['user_email'];
      $telephone = $_POST['user_phone'];
      $niveau = $_POST['user_lvl'];
    
  
      require_once ("../modele/class_PDOziqmu.php");
      $persoId = $monPdoMusic -> InsertPerson($nom, $prenom,$adresse, $email, $telephone, $niveau);
      $monPdoMusic -> insertStudent($persoId, $niveau);
      //echo 'niveau :', $idcours;
      $monPdoMusic -> InsertInscrit($persoId,$idcours);
      $monPdoMusic -> UpdateNbplace($idcours);
      $inscr = $monPdoMusic -> GetInscrits();
    }catch(PDOException $e){
      echo "Erreur de foncfion";
    }

  }
  

   include("../vues/Inscription.php");
   break;
}

switch($action)
{
 case 'inscription':
// vue qui crée le contenu de la page d’inscription

 break;

    case 'pdf':
      $num = $_REQUEST['numero'];
      $inscriptions = $monPdoMusic -> GetInscrits();
      $inscription = $inscriptions[$num];
   include("../vues/pdf_inscription.php");
   creePDF($inscription);
   break;
}


// vue qui crée le pied de pages
include("../vues/v_pied.php") ;
?>

</body>
</html>