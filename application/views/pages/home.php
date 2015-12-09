<h1>Home Page content</h1>
<?php echo $language_msg; ?><br>
<a href='<?php echo site_url('langswitch/switchLanguage/english'); ?>'>English</a>
<a href='<?php echo site_url('langswitch/switchLanguage/italian'); ?>'>Italian</a>

<a href='<?php echo site_url('sendmail/send'); ?>'>SEND EMAIL</a>

<?php
foreach($slides as $slide)
{
?>
    <img src="resources/slideshows/<?=$slide['slideshow']?>/<?=$slide['image']?>"/>
<?php
}
?>