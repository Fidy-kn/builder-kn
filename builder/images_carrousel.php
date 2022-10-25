<?php
	/*== Flexible Carrousel d'images ==*/
  $nbItems = get_sub_field('carousel_nb');
  if(!isset($nbItems) || trim($nbItems)=='') { $nbItems = 4; }
  $nbItemsToScroll = get_sub_field('carousel_scroll');
  if(!isset($nbItemsToScroll) || trim($nbItemsToScroll)==''){ $nbItemsToScroll = 1; }
  if(get_sub_field('carousel_ratio')) {
    $carousel_options = " ".get_sub_field('carousel_ratio');
  }
?>
	<div class="container">
		<?= $custom_title; ?>

		<?php if (have_rows('carousel_images')) : ?>
			<div class="carrousel__list<?= $carousel_options; ?>" data-items="<?= $nbItems ?>" data-scroll="<?= $nbItemsToScroll ?>">
        <?php
          $size = 'medium';
          if($nbItems < 4) {
            $size = 'large';
          }
          while (have_rows('carousel_images')): the_row();
            $logLink = get_sub_field('lien');
            $l = get_sub_field('image');
        ?>
          <div class="carrousel__item">
            <?= ($logLink)? "<a href='$logLink' target='_blank' rel='noreferrer'>":""; ?>
            <?= ($l)? wp_get_attachment_image($l['id'], $size):'' ; ?>
            <?= ($logLink)? '</a>':''; ?>       
          </div>
        <?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
  
<?php if(is_admin()): ?>
<script>
$ = jQuery.noConflict();

$(document).ready(function(){
  $('.carrousel__list').slick({
    slidesToShow: <?= $nbItems ?>,
    slidesToScroll: <?= $nbItemsToScroll ?>,
    infinite: true,
    autoplay: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
        slidesToShow: 3,
        }
      },
              {
        breakpoint: 576,
        settings: {
        slidesToShow: 2,
        }
      }
    ]
  });
});
</script>
<?php endif; ?>
