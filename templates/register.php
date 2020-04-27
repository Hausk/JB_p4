<?php $this->title = "Inscription"; ?>
<h2 class="page_title">Inscription</h2>
<div class="login_content">
    <fieldset id="login_fieldset">
        <legend>Inscrivez-vous</legend>
        <form method="post" action="../public/index.php?route=register">
            <label for="pseudo">Pseudo</label><br>
            <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
            <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
            <label for="password">Mot de passe</label><br>
            <input type="password" id="password" name="password"><br>
            <?= isset($errors['password']) ? $errors['password'] : ''; ?>
            <input class="login_submit" type="submit" value="Inscription" id="submit" name="submit">
        </form>
    </fieldset>
</div>