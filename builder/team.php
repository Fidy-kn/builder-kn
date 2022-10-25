<?php
	/*== Flexible Liste de l'équipe ==*/
  $class_arg = '';
	$nb_arg = get_sub_field('membres_nb');
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
    default:
      $class_arg = "row-cols-2 row-cols-md-".$nb_arg;
      break;
  }
?>

  <div class="container">
    <?= $custom_title; ?>

    <?php if (have_rows('membres')) { ?>
    <div class="team__list row <?= $class_arg ?> gx-md-5">
      <?php
        while (have_rows('membres')){ the_row();
          $portrait = get_sub_field('team_photo');
      ?>
      <div class="team__item col">
        <?php if($portrait){ ?>
          <div class="team__portrait">
            <?php echo wp_get_attachment_image($portrait, 'thumbnail'); ?>
          </div>
        <?php } ?>
        <?php if(get_sub_field('team_prenom') || get_sub_field('team_nom')){ ?>
            <h4 class="team__name"><?php the_sub_field('team_prenom'); ?> <span><?php the_sub_field('team_nom'); ?></span></h4>
        <?php } ?>
        <p class="team__description"><?php the_sub_field('team_description') ?></p>
        <?php get_template_part('builder/parts/socials', null, ['class'=>'team__links']); ?>
      </div>
      <?php } ?>
    </div>
    <?php } ?>
    <?php get_template_part('builder/parts/bouton'); ?>
  </div>
  