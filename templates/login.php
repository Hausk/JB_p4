<?php $this->title = "Connexion"; ?>
<h2 class="page_title">Connexion</h2>
<?= $this->session->show('error_login'); ?>
<div class="login_content">
    <fieldset id="login_fieldset">
        <legend>Connectez-vous</legend>
        <form class="login_form" method="post" action="../public/index.php?route=login">
            <label for="pseudo">Pseudo</label><br>
            <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
            <label for="password">Mot de passe</label><br>
            <input type="password" id="password" name="password"><br>
            <input class="login_submit" type="submit" value="Connexion" id="submit" name="submit">
        </form>
    </fieldset>
</div>