<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('sendmail/send'); ?>
	<label for="name">Nome</label>
    <input type="input" name="name" /><br />

    <label for="email">Email</label>
    <input type="input" name="email" /><br />

    <label for="subject">Oggetto</label>
    <input type="input" name="subject" /><br />

    <label for="message">Messaggio</label>
    <textarea name="message" placeholder="lascia un messaggio.."></textarea><br />

    <input type="submit" name="submit" value="Invia" />

</form>