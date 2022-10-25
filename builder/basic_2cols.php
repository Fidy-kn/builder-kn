<?php
  /*== Flexible Média Texte ==*/
  $position = get_sub_field('basic_twocols_position');
  $media = get_sub_field('basic_twocols_media');
  $media_size = get_sub_field('basic_twocols_media_size');	
?>

  <div class="container">
    <div class="<?= get_row_layout(); ?>__content row<?= (empty($media_size))? '':' fullsize'; ?>">

      <div class="<?= get_row_layout(); ?>__para col-md-6<?= (empty($position))? ' order-md-2':''; ?>">
				<?= $custom_title; ?>
        <?php the_sub_field('basic_twocols_paragraphe'); ?>
      </div>

      <div class="<?= get_row_layout(); ?>__media col-md-6 p-0<?= (empty($position))? ' order-md-1':''; ?>">
        <?php
          switch($media['type']) {
            case 'image':
              echo wp_get_attachment_image($media['id'], 'large');
              break;
            case 'video':
              echo do_shortcode('[video mp4="'.$media['url'].'"][/video]');
              break;
          }
        ?>
      </div>      
    </div>
    <?php get_template_part('builder/parts/bouton'); ?>
  </div>