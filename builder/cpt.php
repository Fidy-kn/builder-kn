<?php
  /*== Flexible Liste de contenus CPT ==*/
  $nb = get_sub_field('type_nb');
?>

  <div class="container">    
    <?= $custom_title; ?>
		<div class="teaser">
      <?php cpt_list(get_sub_field('type'), '', '', false, false, $nb); ?>
    </div>
  </div>
  