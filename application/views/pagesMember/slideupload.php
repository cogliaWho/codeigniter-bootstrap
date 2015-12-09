<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>
<?php echo $error;?> <!-- Error Message will show up here -->
<?php echo form_open_multipart('slideshows/upload'); ?>

    <label for="slideshow">Slideshow Name</label>
    <!-- <input type="input" name="slideshow" value="<?php echo set_value('slideshow'); ?>"/><br /> -->

    <select name="slideshow">
    <?php
    foreach($slideshows as $slideshow_name)
    {
        ?>
        <option value="<?=$slideshow_name['slideshow']?>"><?=$slideshow_name['slideshow']?></option>
        <?php
    }
    ?>
    </select>
    <br />
    <label for="image">Image</label>
    <!-- <input type="input" name="image" /><br /> -->
    <input type='file' name='image' size='20' value="<?php echo set_value('image'); ?>"/><br />

    <label for="position">Position</label>
    <input type="input" name="position" value="<?php echo set_value('position'); ?>"/><br />

    <label for="visible">Visible</label>
    <input type="input" name="visible" value="<?php echo set_value('visible'); ?>"/><br />

    <input type="submit" name="submit" value="Upload Slide" />

</form>

<table>
    <tr>
        <th>Slideshow</th>
        <th>Image</th>
        <th>Position</th>
        <th>Visible</th>
        <th>Remove</th>
    </tr>
    <?php
    foreach($slides as $slide)
    {
        ?>
        <tr>
            <td><?=$slide['slideshow']?></td>
            <td><?=$slide['image']?></td>
            <td><?=$slide['position']?></td>
            <td><?=$slide['visible']?></td>
            <td><?php echo anchor('slideshows/remove/'.$slide['id'], 'remove'); ?></td>
        </tr>
        <?php
    }
    ?>
</table>