<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>
<?php echo $error;?> <!-- Error Message will show up here -->
<?php echo form_open_multipart('slideshows/create'); ?>

    <label for="slideshow">Slideshow Name</label>
    <input type="input" name="slideshow" value="<?php echo set_value('slideshow'); ?>"/><br />
   
    <input type="submit" name="submit" value="Create Slideshow" />

</form>