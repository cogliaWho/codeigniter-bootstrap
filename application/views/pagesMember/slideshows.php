<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('slideshows/create'); ?>

    <label for="title">Title</label>
    <input type="input" name="title" /><br />

    <label for="image">Image</label>
    <input type="input" name="image" /><br />

    <label for="position">Position</label>
    <input type="input" name="position" /><br />

    <label for="visible">Visible</label>
    <input type="input" name="visible" /><br />

    <input type="submit" name="submit" value="Create Slideshow" />

</form>