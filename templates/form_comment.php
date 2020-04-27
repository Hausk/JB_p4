<?php
$route = isset($post) && $post->get('id') ? 'editComment' : 'addComment';
$submit = $route === 'addComment' ? 'Ajouter' : 'Mettre à jour';
?>

<form method="post" action="../public/index.php?route=<?= $route; ?>&articleId=<?= htmlspecialchars($article->getId()); ?>">
    <label for="pseudo">Pseudo</label><br>
    <input id="pseudo" name="pseudo" value="<?= $this->session->get('pseudo'); ?><?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
    <textarea id="comment_post" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')): ''; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <input id="input_submitcoms" type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>