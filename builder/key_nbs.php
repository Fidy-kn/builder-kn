<?php
	/*== Flexible Chiffres clés ==*/
  $class_arg = "row-cols-2 row-cols-md-3 row-cols-lg-".$nb_arg;
?>
  <div class="container">
    <?= $custom_title; ?>

		<?php if (have_rows('chiffres')) : ?>
			<div class="bloc_para row <?= $class_arg ?> gx-md-5">
			<?php while (have_rows('chiffres')) : the_row(); ?>
				<div class="chiffre init">
					<div class="top">
						<?php if(get_sub_field('chiffre_prefixe')){?>
							<span class="prefix"><?php the_sub_field('chiffre_prefixe') ?></span>
						<?php } ?>
						<span class="valeur"><?php the_sub_field('chiffre_nb') ?></span>
						<?php if(get_sub_field('chiffre_suffixe')){?>
							<span class="suffix"><?php the_sub_field('chiffre_suffixe') ?></span>
						<?php } ?>
					</div>
					<div class="chiffre_label">
						<?php the_sub_field('chiffre_texte') ?>
					</div>
				</div>
			<?php endwhile; ?>
			</div>
		<?php endif; ?>
    <?php get_template_part('builder/parts/bouton'); ?>
  </div>