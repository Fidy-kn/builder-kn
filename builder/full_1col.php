<?php
	/*== Flexible Colonne pleine ==*/
  $position = ' '.get_sub_field('position_texte');
  $bgImage = get_sub_field('bg_image');
  if ($bgImage) {
    if(get_sub_field('parallaxe')) {
      echo '<div class="full_back fixed" style="--bg:url('.$bgImage['url'].')">';
    } else {
      echo '<div class="full_back" style="--bg:url('.$bgImage['url'].')">';
    }
  }
?>
  <div class="container<?= $position; ?>">
    <?= $custom_title; ?>
    <?php the_sub_field('full_1col_paragraphe'); ?> 
  </div>
<?= ($bgImage) ? '</div>' : ''; ?>
