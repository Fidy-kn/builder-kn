<?php	/*== Flexible Slider ==*/ ?>

  <div class="container">
    <?= $custom_title; ?>
  </div>
	<?php if (have_rows('slider')) : ?>
  <div class="container">
    <div class="slider_basic">
    <?php while (have_rows('slider')) : the_row(); ?>
      <div class="slider">
        <?php if(get_sub_field('slider_lien') && !get_sub_field('lien_en_bouton')){echo "<a href='".get_sub_field('slider_lien')['url']."'>";} ?>
        <div class="slider__content">
          <div class="slider__img">
            <?php if(get_sub_field('slider_image')){ ?>
              <?php  echo wp_get_attachment_image(get_sub_field('slider_image')['id'], 'fullsize'); ?>
            <?php } ?>
          </div>
          <div class="slider__text">
            <?php the_sub_field('slider_texte') ?>
            <?php if(get_sub_field('slider_lien') && get_sub_field('lien_en_bouton')){echo "<a href='".get_sub_field('slider_lien')['url']."' class='bouton'>".get_sub_field('slider_lien')['title']."</a>";} ?>
          </div>
        </div>
        <?php if(get_sub_field('slider_lien') && !get_sub_field('lien_en_bouton')){echo "</a>";} ?>
      </div>
    <?php endwhile; ?>
    </div>
  </div>
	<?php endif; ?>

<?php if(is_admin()): ?>
<script>
$ = jQuery.noConflict();

$(document).ready(function(){
  $('.slider_basic').slick({
    slidesToShow: 1,
    autoplay: true,
    autoplaySpeed: 6000,
    speed :500,
  });
});
</script>
<?php endif; ?>
  