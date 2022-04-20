<html>
  <link href='https://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="../style/inscrit.css">

<body>
<div class="container4">
  <form action="index.php?action=inscrit" method="POST">
     
  <fieldset>
  
    <label for="name">Nom:</label>
    <input type="text" id="nom" name="user_name">
  
    <label for="prenom">Prénom:</label>
    <input type="text" id="prenom" name="user_prenom">

    <label for="Adresse">Adresse:</label>
    <input type="text" id="adress" name="user_adress">
  
    <label for="email">Email:</label>
    <input type="email" id="mail" name="user_email">
    
    <label for="telephone">Telephone:</label>
    <input type="tel" id="telephone" name="user_phone">

    <div class="dropdown dropdown-dark">
    <label for="level">Niveau :</label>
      <select id="level" name="user_lvl" class="dropdown-select">
        <option value="Debutant">Debutant </option>
        <option value="Intermediaire">Intermédiaire</option>
        <option value="Experimente">Experimente</option>
      </select>
    </div>

    <div class="dropdown dropdown-dark">
    <label for="cours">Cours :</label>
      <select id="cours" name="cours_id" class="dropdown-select">
        <?php foreach ($result as $row){

           $idc = $row["id"]
          ?>
          <option value="<?php echo $idc ;?>" > <?php echo $row["id"];?></option>
      <?php } ?>
      </select>
    </div

  </section>
 
    <button type="submit" id="envoie" name="envoie">Inscrire</button>
    
  
  
 </form>
 </div>
</body>

</html>
