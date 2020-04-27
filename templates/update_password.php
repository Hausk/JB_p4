<?php $this->title = 'Modifier mot mot de passe'; ?>
<h4 class="page_title">Modification de mot de passe</h4>
<div class="change_password">
    <p>Votre mot de passe sera modifié</p>
    <form method="post" action="../public/index.php?route=updatePassword">
        <label for="password">Nouveau mot de passe</label><br>
        <input class="password_word" type="password" id="password" name="password"><br>
        <input class="password_changer" type="submit" value="Mettre à jour" id="submit" name="submit">
    </form>
</div>