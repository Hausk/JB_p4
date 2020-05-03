<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tiny.cloud/1/lyogw3xbmu9fu2ns8hii8qp3iz04mxpn49t0abf31n9pyfwg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="../public/js/tinymce.js"></script>
    <link rel="stylesheet" href="../public/css/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaina+2:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
<!-- Navigation -->
<div id="navbar">
    <div id="navbar_content">
        <div class="subnav">
            <button class="subnavbtn">Dashboard <i class="fa fa-caret-down"></i></button>
            <div class="subnav-content">
                <?php 
                    if ($this->session->get('role') === 'admin') {?>
                        <a href="../public/index.php?route=addArticle">Nouveau billet</a>
                    <?php }if ($this->session->get('pseudo')) {?>
                        <a href="../public/index.php?route=logout">Déconnexion</a>
                        <a href="../public/index.php?route=profile">Profil</a>
                <?php
                    } else {?>
                <a href="../public/index.php?route=login">Connexion</a>
                <a href="../public/index.php?route=register">Inscription</a>
                <?php } ?>
                <?php if($this->session->get('role') === 'admin') { ?>
                    <a href="../public/index.php?route=administration">Administration</a>
                <?php }?>
            </div>
        </div>
        <a href="../public/index.php"><span id="acceuil">Accueil</span></a>
    </div>
</div>
<div id="content">
    <?= $content ?>
</div>
</body>
</html>