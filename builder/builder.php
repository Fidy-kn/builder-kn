<?php
	$settings = get_sub_field('layout_settings');
	$dataSection = '';
	if($settings['bg'] && get_row_layout() != 'full_1col') {
		$dataSection = ' data-color="'.$settings['bg'].'"';
	}
	$contrast = class_by_color($settings['bg']);
	
	include('parts/titles.php');

?>

<section class="builder <?= get_row_layout(); ?><?= $contrast ?>"<?= $dataSection ?>>

<?php include(get_row_layout().'.php'); ?>

</section>