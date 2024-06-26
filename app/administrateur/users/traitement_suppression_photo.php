<?php
$donnees = [];
$erreurs = [];
$message_erreur_global = "";
$message_success_global = "";



if (isset($_POST['supprimer_photo'])) {

    if (check_password_exist(($_POST['password']), $_SESSION['utilisateur_connecter_admin']['id'])) {
        if (!empty($params[3])) {

            $id_user= $params[3];

            $miseajour = mise_a_jour_photo_user($id_user, 'Aucune_image');

            if ($miseajour) {
                $message_success_global = "La suppression de la photo est effectuée avec succès.";
            } else {
                // La mise à jour du statut a échoué.
                $message_erreur_global =  "Oups ! Une erreur s'est produite lors de la suppression de la photo. Veuillez réessayez.";
            }
        } else {
            // Aucun user disponible
            $message_erreur_global = "Désolé, il n'y a pas d'utilisateur.";
        }
    } else {
        $message_erreur_global = "La suppression de la photo à échouer. Vérifier votre mot de passe et réessayez.";
    }
}

$_SESSION['suppression-photo-erreurs'] = $message_erreur_global;
$_SESSION['suppression-photo-success'] = $message_success_global;
header('location:' . PATH_PROJECT . 'administrateur/users/modifier-user/' .$params[3]);
