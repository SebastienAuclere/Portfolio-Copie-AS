<?php
// traitement-contact.php avec persistance des données

// inclusion de la classe FormRepository afin d'y avoir accès
require_once 'Dao/FormRepository.php';

session_start(); // pour lier variable session avec index.php

// Si la requête est de type POST
if(!empty($_POST)){
    
    try{
        // Contrôler que tous les champs ont été soumis
        // Si un champ est manquant, on lève une erreur
        if(!isset(
            $_POST['name'],
            $_POST['email'],
            $_POST['messages'])
        ){
            throw new Exception('Le formulaire est incomplet');
        }
        
        $nom = $_POST['name'];
        $email = $_POST['email'];
        $messages = $_POST['messages'];

        // contrôle de saisie
   
        // Si le nom ne contient pas que des lettres
        // Si le nombre de caractères est inférieur à 2 ou supérieur à 60
        // Erreur
        if(!preg_match('/^[A-Za-zÀ-ÿ \'-]{2,60}$/', $nom)) {
            throw new Exception('Le format du nom est incorrect');
        }

        // Contrôler l'email
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('L\email est invalide');
        }

        // Supprime les éventuelles balises HTML
        // Permet d'éviter l'injection de <script>
        $messages = strip_tags($messages);
        // Convertit les sauts de lignes en balises `<br>`
        $messages = nl2br($messages);
        // A partir de ce point, on considère que les données sont valides 
    
        // Affichage des données
        //echo "<p>Nom: $nom</p>\n";                
        //echo "<p>Adresse email: $email</p>\n";
        //echo "<p>Message: $messages</p>\n";

        // Sauvegarde dans la base de données et affichage du résultat
        if(FormRepository::insertData($nom, $email, $messages)) {
            $_SESSION['validation_formulaire'] = 'Le formulaire est envoyé, je vous recontacte au plus vite !!'; // formulaire validé dans session
            header('location: index.php#contact'); // redirigé vers index et plus précisément section id contact
           // echo '<p style="background: url(\'images/pexels-tnp-1464613945-29971507.jpg\');color:red;">Le formulaire est envoyé, je vous recontacte au plus vite !! </p>';
        } else {
            throw new Exception('Erreur lors de la sauvegarde des données');
           // echo 'Erreur lors de la sauvegarde des données';
        }

        // Ajout d'un lien pour retourner vers le formulaire
        //echo '<p><a href="index.html">Retour sur mon site</a></p>';
        
    } catch(Exception $ex) {
        $_SESSION['erreur_formulaire'] = 'Erreur: '. $ex->getMessage(); //on ouvre une session a chaque erreurs
        header('location: index.php#contact');                          //redirigé sur index id contact
        //echo 'Erreur: '. $ex->getMessage();
        exit;
    } // fin du try/catch
        
} // fin du if (!empty($_POST))

           
