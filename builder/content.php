<?php /*== Flexible Contenu simple ==*/ ?>
  <div class="container">
    <?= $custom_title; ?>
    <?php the_sub_field('contenu'); ?> 
  </div>
<?= ($bgImage) ? '</div>' : ''; ?>
