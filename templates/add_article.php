<?php
$this->title = "Jean Forteroche: Nouveau billet";
$route = isset($post) && $post->get('id') ? 'editArticle&articleId='.$post->get('id') : 'addArticle';
$submit = $route === 'addArticle' ? 'Poster' : 'Valider la modification';
?>
<h2 class="page_title">Création d'un nouveau billet</h2>
<form class="form_ticket" method="post" action="../public/index.php?route=<?= $route; ?>">
    <label class="title_ticket" for="title"><strong>Titre</strong></label><br>
    <input class="title_input" type="text" id="title" name="title" value="<?= isset($post) ? htmlspecialchars($post->get('title')): ''; ?>"><br>
    <?= isset($errors['title']) ? $errors['title'] : ''; ?>
    <textarea id="tinytextarea" name="content"><?= isset($post) ? ($post->get('content')): ''; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <input class="submit_add_ticket" type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>