# Projet-ZiqMu
 
Le Projet est un Intranet en localhost connecté a une base de donnée mysql.

# INTERFACE 

L'interface permet d'avoir une vue sur les cours et les inscrits en fonctions de leurs cours.
On peut également inscrire un individu a un cours ce qui créera dans la base de donnée une personne donc un compte et l'assignera directement au cours.

# ARCHITECTURE DU CODE 

Le code est divisé en trois parties: 
- le controleur, c'est la page index qui va recevoir les informations des pages a afficher mais va également appeler les fonctions.
- le modèle, c'est la bas que ce situe la connexion a la base de donnée ainsi que toutes les fonctions. (La plupart des fonctions requires une connexions a la base de donnée donc j'ai choisis da faire les fonction dans la meme connexions pour ne pas surcharger le code et utiliser qu'une connexion.)
- Les vues, se sont les affichages, une fois les fonctions effectuer, on affiche les return donc dans ces pages. 

# BASE DE DONNEE 

La base de donnée utilisé en locale est une base de donnée mysql avec un serveur Apache sur l'environnement XAMPP.
