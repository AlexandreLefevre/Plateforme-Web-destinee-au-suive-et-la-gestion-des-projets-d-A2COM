<?php
header("Strict-Transport-Security:max-age=63072000");
                session_start();
                if(isset($_SESSION['username'])&&isset($_SESSION['Admin'])){
                }
                else{
                    header('Location: login.php');
                }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création de compte</title>
    <!-- Bootstrap Min CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<!-- MeanMenu CSS -->
    <link rel="stylesheet" href="styles/header.css">
    <link rel="icon" href="images/Favicon-A2com.ico">
</head>
<body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/index.js"></script>
<div class="container">
 <!-- Start Navbar Area -->
 <div class="navbar-area position-static">
	<!-- Menu For Desktop Device -->
	<div class="row main-nav">
		<div class="container">
			<nav class="navbar navbar-expand-md navbar-light">
				<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
                    <?php if($_SESSION['Admin']=='user'): ?>
						<li class="nav-item">
							<a href="index.php" class="nav-link">Dashboard</a>
						</li>
						<li class="nav-item">
							<a href="ProjetEnCous.php" class="nav-link">Projet en cours</a>
						</li>
						<li class="nav-item">
							<a href="MiniProjet.php" class="nav-link">Mini-Projet</a>
						</li>
						<li class="nav-item">
							<a href="ProjetVideo.php" class="nav-link">Projet video</a>
						</li>
						<li class="nav-item">
							<a href="Archives.php" class="nav-link">Archives</a>
						</li>
                        <?php else: ?>
                            <li class="nav-item">
							<a href="Inscription.php" class="nav-link">Création de compte</a>
						</li>
                        <li class="nav-item">
							<a href="GestionUser.php" class="nav-link">Gestion des utilisateurs</a>
						</li>
            <li class="nav-item">
							<a href="typesite.php" class="nav-link">Ajouter type de site</a>
						</li>
						<li class="nav-item">
							<a href="etapegraphisme.php" class="nav-link">Ajouter un état d'étape</a>
						</li>
            <li class="nav-item">
							<a href="projetencours/ProjectSubsteps.php" class="nav-link">Ajouter une sous-étape</a>
						</li>
                        <?php endif; ?>
                        <li class="nav-item">
                           <a href="logout.php">Déconnexion</a>
                       </li>
					</ul>
				</div>
			</div>
		</div>
	</div>

          <div class="container" style="margin-top:100px">
             <h1>Inscription</h1>
             <form class="needs-validation" novalidate method="post" action="verificationinscription.php">
                 <div class="form-row">
                     <div class="col-md-4 mb-3">
                         <label for="prenom">Nom d'utilisateur</label>
                         <input type="text" class="form-control" name="nomutilisateur" placeholder="Nom d'utilisateur" required>
						 <div class="valid-feedback">Ok !</div>
						 <div class="invalid-feedback">Champ vide</div>

                     </div>
                     <div class="col-md-4 mb-3">
                         <label for="nom">Mot de passe</label>
                         <input type="text" class="form-control" name="mot_de_passe" placeholder="Mot de passe" required>
						 <div class="valid-feedback">Ok !</div>
						 <div class="invalid-feedback">Champ vide</div>

                     </div>
                 </div>
                 <div class="form-row">
                     <div class="col-md-6 mb-3">
					 <label for="pseudo">Email</label>
                     <input type="email" class="form-control" placeholder="Email" name="email">
					 <div class="valid-feedback">Ok !</div>
					 <div class="invalid-feedback">Ce n'est pas une addresse mail valable</div>
                     </div>
                 </div>>
                 <button class="btn btn-primary" type="submit" name="submit">Inscription</button>
             </form>

           </div>
</div>
         <script>

           (function() {
             'use strict';
             window.addEventListener('load', function() {
               let forms = document.getElementsByClassName('needs-validation');
               let validation = Array.prototype.filter.call(forms, function(form) {
                 form.addEventListener('submit', function(event) {
                   if (form.checkValidity() === false) {
                     event.preventDefault();
                     event.stopPropagation();
                   }
                   form.classList.add('was-validated');
                 }, false);
               });
             }, false);
           })();

         </script>
</body>
</html>