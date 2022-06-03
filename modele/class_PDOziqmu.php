<?php

class PdoMusic{
  private static $serveur = 'mysql:host=localhost:3306';
  private static  $bdd = 'dbname=db_zicmu';
  private static  $user = 'IntraAdmin';
  private static  $password = '6syf4R_4';	
        
        private static $monPdo;
	    private static $monPdoMusic=null;

        private function __construct(){
            try{
                PdoMusic::$monPdo = new PDO(PdoMusic::$serveur.';'. PdoMusic::$bdd, PdoMusic::$user, PdoMusic::$password);
            PdoMusic::$monPdo ->query("SET CHARACTER SET utf8") ;
            }catch (PDOException $e) {
   
                echo 'Échec lors de la connexion ' . $e->getMessage();
                die();

            } 
           
        }
        public function _destruct() {
            PdoMusic::$monPdo = null;
        }

        public static function getPdoMusic() {
            if (PdoMusic::$monPdoMusic == null) {
               PdoMusic::$monPdoMusic = new PdoMusic(); 
            }
            return PdoMusic::$monPdoMusic;
        }

        public  static function getMonPdo(){
		
            return PdoMusic::$monPdo;  
        }

        public function getSeances(){
            try {
                //$monPdoMusic = PdoMusic::getPdoMusic();
//$pdo = PdoMusic::getMonPdo();


                $cours = array();

                $req = "Select person.nom nomP, instrument.nom nomI, jourDate, nbPlace, cours.id id from cours
                INNER JOIN professeur ON cours.idProf = professeur.id
                INNER JOIN person ON professeur.id = person.id
                INNER JOIN instrument ON cours.idInstrument = instrument.id";

                $rs = self::$monPdo->prepare($req);
                
                $rs->execute();
                
                try{
                
                    $cours = $rs->fetchAll();
                
                }catch (PDOException $e) {
   
                    echo 'Échec lors de la recupération de données : ' . $e->getMessage();
                
    
                } 
                
                
                //var_dump($cours);
                return $cours;

            } 
            catch (PDOException $e) {
   
                echo 'Échec lors de la connexion : ' . $e->getMessage();

            }   
        }

       Public function InsertPerson($nom, $prenom,$adresse, $email, $tel, $niv){

       
        try{

            $req = "Insert into person (nom,prenom,adresse,mail,telephone) values('$nom','$prenom','$adresse','$email','$tel')";

            $rs = self::$monPdo->prepare($req);
                
            $rs->execute();

            echo 'inscrit !';


        } catch (PDOException $e) {

   
            echo 'Échec lors de la connexion : ' . $e->getMessage();

        }
        try{
        
            $req = "select id from person where nom = '$nom'";
            $rs = self::$monPdo->prepare($req);
            $rs->execute();

            $persoId = $rs->fetch()[0];
            return $persoId;

        }catch (PDOException $e) {
             echo "Échec lors de la recupération de l'id";
            
        }

    }

   

    public function insertStudent($persoId, $niv){

       
            $req = "Insert into students (id,niveau) values ($persoId, '$niv')";
            $rs = self::$monPdo->prepare($req);
                
            $rs->execute();
    }

    public function insertInscrit($persoId,$idCours){      
            $req = "Insert into inscription (idStudent,paye,idCours) values ($persoId,1, $idCours)";
            $rs = self::$monPdo->prepare($req);
            $rs->execute();
            
    }
    
    public function GetInscrits(){

        try{
            $inscr = array();
            $req = 'select pers.nom as nomAd, pers.prenom as prenomAd, c.jourDate as date, c.nbPlace as place, pers1.nom as nomProf, pers1.prenom as prenomProf, i.nom as instru, ins.idStudent as idAd, ins.idCours as idC from inscription ins 
            inner join students as a on a.id = ins.idStudent 
            inner join cours as c on c.id = ins.idCours 
            inner join professeur as prof on prof.id = c.idProf inner join person as pers on pers.id = a.id 
            inner join person as pers1 on pers1.id = prof.id 
            inner join instrument as i on i.id = c.idInstrument
            ';

            $rs = self::$monPdo->prepare($req);
            
            $rs->execute();
            
               $inscr = $rs->fetchAll();
               
               return $inscr;
           
        }catch (PDOException $e) {
            echo "Échec lors de la l'affichage";
            }
                            
    }
    public function UpdateNbplace($idcours){
        $req = "UPDATE cours SET nbPlace = nbPlace - 1 WHERE id = '$idcours';";
        $rs = self::$monPdo->prepare($req);
        $rs->execute();
    }
    

}

         
?>