<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('users/registration'); ?>

    <label for="email">Email</label>
    <input type="input" name="email" /><br />

    <label for="password">Password</label>
    <input type="input" name="password"/><br />

    <input type="submit" name="submit" value="Create new user" />

</form>