<?php
  $position = get_sub_field('full_2_col_position');
  $photo = get_sub_field('full_2_col_photo');
  $media = get_sub_field('full_2_col_media');
?>

  <div class="container-fluid">
                    
    <div class="pp row">

    <div class="<?= get_row_layout(); ?>__para col-md-6<?= (empty($position))? ' order-md-2':''; ?>">
        <?= $custom_title; ?>
        <?php the_sub_field('full_2_col_paragraphe'); ?>
      </div>

      <div class="<?= get_row_layout(); ?>__media col-md-6 p-0<?= (empty($position))? ' order-md-1':''; ?>">
        <?php
          switch($media['type']) {
            case 'image':
              echo wp_get_attachment_image($media['id'], 'large');
              break;
            case 'video':
              echo '<video autoplay muted loop><source src="'.$media['url'].'" type="video/mp4"></video>';
              break;
          }
        ?>
      </div>

    </div>
  </div>
