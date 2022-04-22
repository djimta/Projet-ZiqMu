<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/cataloguestyle.css">
    
</head>
<body>
 <h1>Catalogue des Cours </h1>
<tr>
    <table>
    <tr>
        <td>Nombre de Places</td>
        <td>Professeur</td>
        <td>Date </td>
        <td>Places Restantes </td>
       
    </tr>               
        <?php
    foreach   ($result as $row) {
            
            ?>
                <tr>
                    
                    <td><?php echo $row["nomP"];?></td>
                    <td><?php echo $row["jourDate"];?></td>
                    <td><?php echo $row["nomI"];?></td>
                    <td><?php echo $row["nbPlace"];?></td>
                    <td><a href="index.php?action=inscription"><div class="sign_up_btn">s'inscrire</div></a></td>
                </tr>
            <?php
            }
            ?>
    </table>
            
</tr>  
</body>
</html>