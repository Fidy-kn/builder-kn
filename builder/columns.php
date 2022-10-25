<?php
	/*== Flexible Colonnes ==*/
  $class_arg = '';
	$nb_arg = get_sub_field('colonnes_nb');
  switch($nb_arg) {
		case 1:
			$class_arg = "row-cols-".$nb_arg;
			break;
		case 2:
			$class_arg = "row-cols-".$nb_arg;
			break;
		case 3:
			$class_arg = "row-cols-2 row-cols-md-".$nb_arg;
			break;
		case 4:
			$class_arg = "row-cols-2 row-cols-md-".$nb_arg;
			break;
		case 5:
			$class_arg = "row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-".$nb_arg;
			break;
		case 6:
			$class_arg = "row-cols-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-".$nb_arg;
			break;		
  }
?>
	<div class="container">
		<?= $custom_title; ?>

		<?php if (have_rows('colonnes')) : ?>
			<div class="colonnes__list row <?= $class_arg ?> gx-md-5">
				<?php
					while (have_rows('colonnes')) :
						the_row();

						$lien = '';
						$lien_btn = '';
						if(get_sub_field('colonne_add_lien') && get_sub_field('colonne_lien')) {
							$lien = get_sub_field('colonne_lien');
							$lien_btn = (get_sub_field('colonne_lien_bouton'))? '<a href="'.$lien['url'].'" class="bouton">'.$lien['title'].'</a>':'';
						}
						
						$img = (get_sub_field('colonne_add_image'))? wp_get_attachment_image(get_sub_field('colonne_image')['id'], 'medium'):'';
						$title = (get_sub_field('colonne_titre'))? "<h4 class='colonnes__title'>".get_sub_field('colonne_titre')."</h4>":'';
						$texte = (get_sub_field('colonne_texte'))? "<div class='colonnes__text'>".get_sub_field('colonne_texte')."</div>":'';
				?>
					<div class="colonnes__item col">
						<?= ($lien && !get_sub_field('colonne_lien_bouton'))? '<a href="'.$lien['url'].'">':''; ?>
						<?= $img ?>
						<?= $title ?>
						<?= $texte ?>
						<?= $lien_btn ?>
						<?= ($lien && !get_sub_field('colonne_lien_bouton'))? '</a>':''; ?>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
    <?php get_template_part('builder/parts/bouton'); ?>
	</div>
	