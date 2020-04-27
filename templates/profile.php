
<?php $this->title = 'Mon profil'; ?>
<h2 class="page_title">Mon profil</h2>
<div id="profile_content">
<h3>Gestion du compte</h3>
<?= $this->session->show('update_password'); ?>
<fieldset>
    <legend>Pseudo : <span id="pseudo_profil"><strong><?= $this->session->get('pseudo'); ?></strong></span></legend>
    <a class="separator_profile_1" href="../public/index.php?route=updatePassword">Modifier son mot de passe</a>
    <a class="separator_profile_2" href="../public/index.php?route=deleteAccount">Supprimer mon compte</a>
</fieldset>
</div>