<?php $this->title = 'Billet simple pour l\'Alaska: Jean Forterohe vous en parle'; ?>
<?php $this->desc = 'Page home description'; ?>
<h2 class="page_title">Accueil</h2>
<div id="infos"><h3>Billet simple pour l'Alaska</h3></div>
<?= $this->session->show('add_article'); ?>
<?= $this->session->show('edit_article'); ?>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('add_comment'); ?>
<?= $this->session->show('flag_comment'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('register'); ?>
<?= $this->session->show('login'); ?>
<?= $this->session->show('logout'); ?>
<?= $this->session->show('delete_account'); ?>
<?php foreach ($articles as $article){?>
<div id="tickets">
    <fieldset>
        <legend><?= htmlspecialchars($article->getTitle());?></legend>
        <p class="content_tickets"><?= substr(($article->getContent()), 0, 220);?>   ...</p>
    <div class="footer_fieldset">
        <p>Publié le : <?= htmlspecialchars($article->getCreatedAt());?></p>
        <a class="read_more" href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>">Lire la suite</a>
    </div>
    </fieldset>
</div>
<br>
<?php }?>
<div id="About-me">
    <aside id="right_about">
        <h4 class="title_About">A propos de moi</h4>
        <div class="about_widget">
            <img src="../public/img/about_me.jpg" alt="A propos de moi">
            <h2 id="About_name">Jean Forteroche</h2>
            <p>Actuellement en train d'écrire mon prochain roman qui s'intitule "Billet simple pour l'Alaska", je vous propose quelques passage déposé petit a petit pour voir si cela vous plaît.</p>
        </div>
    </aside>
</div>
