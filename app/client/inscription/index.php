<?php
include('./app/commum/header_client_icm.php');
?>

    <div class="container" style="color: black;">

        <div class="card o-hidden border-0 shadow-lg" style="margin-top: 5rem; margin-bottom: 5rem;">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-6">
                        <div class="p-5">

							<?php
							if (!empty($_SESSION['inscription-message-success-global'])) {
								?>
                                <div class="alert alert-primary"
                                     style="color: white; background-color: #5cb85c; text-align:center; border-color: snow;">
									<?= $_SESSION['inscription-message-success-global'] ?>
                                </div>
								<?php
							}
							?>

							<?php
							if (!empty($_SESSION['inscription-message-erreur-global'])) {
								?>
                                <div class="alert alert-primary"
                                     style="color: white; background-color: #490303; border-color: snow;">
									<?= $_SESSION['inscription-message-erreur-global'] ?>
                                </div>
								<?php
							}
							?>

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Créez un compte Client !</h1>
                            </div>

                            <form action="<?= PATH_PROJECT ?>client/inscription/traitement" method="post" class="user" novalidate>
                                <!-- Le champ nom -->
                                <div class="form-group">
                                    <label for="inscription-nom">
                                        Nom:
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" name="nom" id="inscription-nom" class="form-control"
                                           placeholder="Veuillez entrer votre nom"
                                           value="<?= (!empty($donnees["nom"])) ? $donnees["nom"] : ''; ?>"
                                           required>
									<?php if (!empty($erreurs["nom"])) { ?>
                                        <span class="text-danger">
										<?php echo $erreurs["nom"]; ?>
									</span>
									<?php } ?>
                                </div>

                                <!-- Le champ prénom -->
                                <div class="form-group">
                                    <label for="inscription-prenom">
                                        Prénoms:
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" name="prenom" id="inscription-prenom" class="form-control"
                                           placeholder="Veuillez entrer vos prénoms"
                                           value="<?= (!empty($donnees["prenom"])) ? $donnees["prenom"] : ''; ?>"
                                           required>
									<?php if (!empty($erreurs["prenom"])) { ?>
                                        <span class="text-danger">
										<?php echo $erreurs["prenom"]; ?>
									</span>
									<?php } ?>
                                </div>

                                <!-- Le champ téléphone -->
                                <!-- <div class="form-group">
								<label for="inscription-telephone">
									Téléphone :
									<span class="text-danger">(*)</span>
								</label>
								<input type="text" name="telephone" id="inscription-telephone" class="form-control" placeholder="Veuillez entrer votre numéro de téléphone" value="<?= (!empty($donnees["telephone"])) ? $donnees["telephone"] : ''; ?>" required>
								<?php if (!empty($erreurs["telephone"])) { ?>
									<span class="text-danger">
										<?php echo $erreurs["telephone"]; ?>
									</span>
								<?php } ?>
							</div> -->

                                <!-- Le champ email -->
                                <div class="form-group">
                                    <label for="inscription-email">
                                        Adresse mail:
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="email" name="email" id="inscription-email" class="form-control"
                                           placeholder="Veuillez entrer votre adresse mail"
                                           value="<?= (!empty($donnees["email"])) ? $donnees["email"] : ''; ?>"
                                           required>
									<?php if (!empty($erreurs["email"])) { ?>
                                        <span class="text-danger">
										<?php echo $erreurs["email"]; ?>
									</span>
									<?php } ?>
                                </div>

                                <!-- Le champ nom d'utilisateur -->
                                <div class="form-group">
                                    <label for="inscription-nom-utilisateur">
                                        Nom d'utilisateur:
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="text" name="nom-utilisateur" id="inscription-nom-utilisateur"
                                           class="form-control" placeholder="Veuillez entrer votre nom d'utilisateur"
                                           value="<?= (!empty($donnees["nom-utilisateur"])) ? $donnees["nom-utilisateur"] : ''; ?>"
                                           required>
									<?php if (!empty($erreurs["nom-utilisateur"])) { ?>
                                        <span class="text-danger">
										<?php echo $erreurs["nom-utilisateur"]; ?>
									</span>
									<?php } ?>
                                </div>

                                <!-- Le champ mot de passe -->
                                <div class="form-group">
                                    <label for="inscription-mot-passe">
                                        Mot de passe:
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="password" name="mot-passe" id="inscription-mot-passe"
                                           class="form-control" placeholder="Veuillez entrer votre mot de passe"
                                           value="<?= (!empty($donnees["mot-passe"])) ? $donnees["mot-passe"] : ''; ?>"
                                           required>
									<?php if (!empty($erreurs["mot-passe"])) { ?>
                                        <span class="text-danger">
										<?php echo $erreurs["mot-passe"]; ?>
									</span>
									<?php } ?>
                                </div>

                                <!-- Le champ, retapez mot de passe -->
                                <div class="form-group">
                                    <label for="inscription-retapez-mot-passe">
                                        Retaper mot de passe:
                                        <span class="text-danger">(*)</span>
                                    </label>
                                    <input type="password" name="retapez-mot-passe" id="inscription-retapez-mot-passe"
                                           class="form-control" placeholder="Veuillez retaper votre mot de passe"
                                           value="<?= (!empty($donnees["retapez-mot-passe"])) ? $donnees["retapez-mot-passe"] : ''; ?>"
                                           required>
									<?php if (!empty($erreurs["retapez-mot-passe"])) { ?>
                                        <span class="text-danger">
										<?php echo $erreurs["retapez-mot-passe"]; ?>
									</span>
									<?php } ?>
                                </div>

                                <!-- Le champ terms et conditions -->
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" name="termes-conditions"
                                               id="customCheck" required>
                                        <label class="custom-control-label" for="customCheck"
                                               style="color: blue; font-size: large;">
                                            J'accepte les termes et conditions
                                            <span class="text-danger">(*)</span>
                                        </label>
                                    </div>
									<?php if (!empty($erreurs["termes-conditions"])) { ?>
                                        <span class="text-danger">
										<?php echo $erreurs["termes-conditions"]; ?>
									</span>
									<?php } ?>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block">Inscription</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= PATH_PROJECT ?>client/mot_de_passe">
                                    Mot de passe oublié ?
                                </a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?= PATH_PROJECT ?>client/connexion">
                                    Vous avez déjà un compte ? Connectez-vous!
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php
unset($_SESSION['donnees-utilisateur'], $_SESSION['inscription-erreurs'], $_SESSION['inscription-message-success-global'], $_SESSION['inscription-message-erreur-global']);
?>

<?php
include('./app/commum/footer_client_icm.php');
?>