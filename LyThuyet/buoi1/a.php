<?php $s = 'Hi'; ?>
<h1><?php echo $s; ?></h1>
<?php 
for($i=1; $i<=10; $i++)
{	echo '<h2>' . $s . '</h2>'; }
?>
<hr>
<?php 
for($i=1; $i<=10; $i++)
{	?>
	<h2><?php echo $s; ?></h2>
	<?php
}