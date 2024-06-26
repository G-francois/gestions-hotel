<?php

$_SESSION['sauvegarder-erreurs'] = "";

$_SESSION['donnees-utilisateur'] = [];

$donnees = $_SESSION['utilisateur_connecter_recept'];

$new_data = [];

$erreurs = [];

if (isset($_POST['sauvegarder'])) {

    if (check_password_exist(($_POST['password']), $donnees['id'])) {

        if (!empty($_POST['nom']) && $_POST['nom'] != $donnees['nom']) {
            $new_data['nom'] = strtoupper(htmlentities($_POST['nom']));
        } else {
            if (empty($_POST['nom'])) {
                $erreurs["nom"] = "Le champ nom ne doit pas être vide.";
            } else {
                $new_data['nom'] = $donnees['nom'];
            }
        }

        if (!empty($_POST['prenom']) && $_POST['prenom'] != $donnees['prenom']) {
            $new_data['prenom'] = ucfirst(htmlentities($_POST['prenom']));
        } else {
            if (empty($_POST['prenom'])) {
                $erreurs["prenom"] = "Le champ prenom ne doit pas être vide.";
            } else {
                $new_data['prenom'] = $donnees['prenom'];
            }
        }


        if (!empty($_POST['telephone'])) {
            $telephone = trim(htmlentities($_POST['telephone']));
            if (strlen($telephone) == 8 && ctype_digit($telephone)) {
                if ($telephone != $donnees['telephone']) {
                    // le champ est valide 
                    $new_data['telephone'] = $telephone;
                } else {
                    $new_data['telephone'] = $donnees['telephone'];
                }
            } else {
                // le champ n'est pas valide 
                $erreurs["telephone"] = "Le champ téléphone doit contenir 8 chiffres.";
            }
        } else {
            $erreurs["telephone"] = "Le champ téléphone est vide.";
        }

        
        if (!empty($_POST['nom_utilisateur']) && $_POST['nom_utilisateur'] != $donnees['nom_utilisateur']) {
            $new_data['nom_utilisateur'] = htmlentities($_POST['nom_utilisateur']);
        } else {
            if (empty($_POST['nom_utilisateur'])) {
                $erreurs["nom_utilisateur"] = "Le champ nom d'utilisateur ne doit pas être vide.";
            } else {
                $new_data['nom_utilisateur'] = $donnees['nom_utilisateur'];
            }
        }

        $_SESSION['donnees-utilisateur'] = $new_data;

        if (empty($erreurs)) {
            if (mettre_a_jour_informations_utilisateur(
                $donnees['id'],
                $new_data['nom'],
                $new_data['prenom'],
                $new_data['telephone'],
                $new_data['nom_utilisateur']
            )) {
                $new_user_data = recuperer_mettre_a_jour_informations_utilisateur($donnees['id']);

                if (!empty($new_user_data)) {

                    $_SESSION['success'] = "Modification(s) effectuée(s) avec succès";

                    $_SESSION['utilisateur_connecter_recept'] = $new_user_data;
                } else {
                    $_SESSION['sauvegarder-erreurs'] = "La modification à echouer. Veuiller réessayez.";
                }
            } else {
                $_SESSION['sauvegarder-erreurs'] = "La mise à jour à echouer. Veuiller réessayez.";
            }
        } else {

            $_SESSION['erreurs'] = $erreurs;
        }
    } else {
        $_SESSION['sauvegarder-erreurs'] = "La modification à echouer. Vérifier votre mot de passe et réessayez.";
    }
} else {
    $_SESSION['sauvegarder-erreurs'] = "Veuiller appuyer sur le boutton sauvegarder.";
}

header('location:' . PATH_PROJECT . 'receptionniste/dashboard/profil');
