<?php $this->title = 'Administration'; ?>
<?= $this->session->show('add_article'); ?>
<?= $this->session->show('edit_article'); ?>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('unflag_comment'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('delete_user'); ?>
<h2 class="page_title">Espace Administrateur</h2>
<h4 class="separator_admin">Liste des articles</h4>
<table>
    <tr class="head_table">
        <td>Titre</td>
        <td>Contenu</td>
        <td>Date</td>
        <td>Modifier</td>
        <td>Supprimer</td>
    </tr>
    <?php
    foreach ($articles as $article)
    {
        ?>
        <tr>
            <td class="title_td"><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></td>
            <td class="td_content"><?= substr(($article->getContent()), 0, 80);?>...</td>
            <td><?= substr(htmlspecialchars($article->getCreatedAt()), 0, 10);?></td>
            <td class="actions_td"><a href="../public/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a></td>
            <td class="actions_td"><a href="../public/index.php?route=deleteArticle&articleId=<?= $article->getId(); ?>">Supprimer</a></td>
        </tr>
        <?php
    }
    ?>
</table>
<hr>
<h4 class="separator_admin">Commentaires signalés</h4>
<table>
    <tr class="head_table">
        <td>Pseudo</td>
        <td>Message</td>
        <td>Date</td>
        <td>Actions</td>
    </tr>
    <?php
    foreach ($comments as $comment)
    {
        ?>
        <tr class="content_table">
            <td><?= htmlspecialchars($comment->getPseudo());?></td>
            <td class="td_content"><?= substr(htmlspecialchars($comment->getContent()), 0, 150);?></td>
            <td>Créé le : <?= substr($comment->getCreatedAt(), 0, 16);?></td>
            <td>
                <a href="../public/index.php?route=unflagComment&commentId=<?= $comment->getId(); ?>">Annuler le signalement</a>
                <a href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer le commentaire</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
<hr>

<h4 class="separator_admin">Utilisateurs</h4>
<table>
    <tr class="head_table">
        <td>Pseudo</td>
        <td>Date de création</td>
        <td>Rôle</td>
        <td>Supprimer le compte</td>
    </tr>
    <?php
    foreach ($users as $user)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($user->getPseudo());?></td>
            <td>Créé le : <?= substr(($user->getCreatedAt()), 0, 16);?></td>
            <td><?= htmlspecialchars($user->getRole());?></td>
            <td>
                <?php
                if($user->getRole() != 'admin') {
                    ?>
                    <a href="../public/index.php?route=deleteUser&userId=<?= $user->getId(); ?>">Supprimer</a>
                <?php }
                else {
                    ?>
                    Suppression impossible
                    <?php
                }
                ?>
            </td>
        </tr>
        <?php
    }
    ?>
</table>