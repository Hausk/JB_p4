<?php $this->title = 'Article'; ?>
<h2 class="page_title">Billet</h2>
<?= $this->session->show('add_comment'); ?>
<div class="single_ticket">
    <h2><?= htmlspecialchars($article->getTitle());?></h2>
    <p><span><?= ($article->getContent());?></span></p>
    <p class="date_single">Publié le : <?= substr($article->getCreatedAt(), 0, 10);?></p>
</div>
<br>
<div id="comments">
    <h3>Commentaires</h3>
    <?php 
    if($this->session->get('role') === 'user'){?>
        <fieldset class="fieldset_comment">
            <legend class="add_comment">Ajouter un commentaire</legend>
            <?php include('form_comment.php');?>
        </fieldset>
    <?php }
    foreach ($comments as $comment)
    {
        ?>
        <div class="caps_coms">
        <h4><?= htmlspecialchars($comment->getPseudo());?> a commenté:</h4>
        <p><?= htmlspecialchars($comment->getContent());?></p>
        <p>Posté le <?= substr($comment->getCreatedAt(), 0, 16);?></p>
        <?php
        if($comment->isFlag()) {
            ?>
            <p>Ce commentaire a déjà été signalé</p>
            <?php
        } else {
            ?>
            <p><a class="signale_comment" href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>">Signaler le commentaire</a></p>
            <?php
        }
        ?>
            <?php if($this->session->get('role') === 'admin') { ?>
        <p><a class="delete_comment" href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer le commentaire</a></p>
        <?php }?>
        </div>
        <br>
        <?php
    }
    ?>
</div>