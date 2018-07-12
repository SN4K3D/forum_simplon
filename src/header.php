<link rel="stylesheet" type="text/css" href="../css/header.css" />


<div class="entete">
 <div class="container-fluid">
     <div class="row">
         <div class="col-md-4">
            <div  id="logo" class="dropdown">
                <img src="../images/logo.png" alt="Mon compte" class="dropdown-toggle"  id="menu1" data-toggle="dropdown">
                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="acceuil.php">Acceuil</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="message.php">Envoyer un message privé</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="reception.php">Boite de réception</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="post_topic.php?categorie=1">Lancez un nouveau sujet</a></li>
                    <?php if(isset($_SESSION['id']) && !empty($_SESSION['id'])): ?>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href=<?="edition_profile.php?id=".$_SESSION['id'] ?>>Editer mon profile</a></li>
                    <?php endif ?>
                </ul>
            </div>
        </div>
            <div class="col-md-4">
                <div class="row">
                    <h1 class="titre_entete">SimplDiscuss'</h1>
                </div>
                <div class="row">
                    <h2 class="ss_titre_entete">Le forum des Simploniens</h2>
                </div>
            </div>
        <div class="col-md-4">
            <div class="row link">
            <?php if(isset($_SESSION['id']) && !empty($_SESSION['id'])): $url = "profile.php?id=".$_SESSION['id']; ?>
                <a href=<?= $url?> class="bouton">Mon compte</a>
            <?php else: ?>
                <a href="connexion.php" class="bouton">Connexion</a>
            <?php endif; ?>
            </div>

            <div class="row link">
            <?php if(isset($_SESSION['id']) && !empty($_SESSION['id'])): ?>
                <a href="deconnexion.php" class="bouton2">Déconnection</a>
            <?php else: ?>
                <a href="inscription.php" class="bouton2">Inscription</a>
            <?php endif; ?>
            </div>
         </div>     
     </div>
    </div>
</div>