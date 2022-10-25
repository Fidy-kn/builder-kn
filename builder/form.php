<?php /*== Flexible Formulaire Gravity FOrms ==*/ ?>

	<div class="container">
		<?= $custom_title; ?>
		<?php
			if(get_sub_field('form')){
				$shortcode = '';
				$form_id = get_sub_field('form');
				$shortcode .= (get_sub_field('form_title'))? ' title="true"':' title="false"';
				$shortcode .= (get_sub_field('form_description'))? ' description="true"':' description="false"';
				$shortcode .=  (get_sub_field('form_ajax'))? ' ajax="true"':' ajax="false"';
		?>
			<div class="form__contener">
				<?php
					if(is_admin()) {
						echo "<h1>Formulaire</h1>";
						echo "<i>La prévisualisation du formulaire n'est pas disponible dans l'admin, préférez la prévisualisation classique</i>";
					} else {
						echo do_shortcode('[gravityform id="'.$form_id.'"'.$shortcode.']');
					}
				?>
			</div>
		<?php } ?>
	</div>
	