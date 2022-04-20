<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../style/cataloguestyle.css">
    <title>Document</title>
</head>
<body><h1>Liste des Inscrits </h1>
    <tr>
        <table>
        <tr>
            <td>Nom</td>
            <td>Prenom</td>
            <td>Cours</td>
            <td>Date</td>
        </tr>               
            <?php
            $var = 0;
        foreach   ($inscr as $row) {
                
                ?>
                    <tr>
                        <td><?php echo $row[0];?></td>
                        <td><?php echo $row[1];?></td>
                        <td><?php echo $row[6];?></td>
                        <td><?php echo $row[2];?></td>
                        
                        <td><a href="index.php?action=pdf&numero=<?php echo $var ;?>">PDF</a></td>
                    
                        
                        
                    </tr>
                <?php
            $var++;
                }
                ?>
        </table>
                
    </tr>  
</body>
</html>