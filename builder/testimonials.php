<?php /*== Flexible Témoignages ==*/ ?>

	<div class="container">
		<?= $custom_title; ?>
                
		<?php if(have_rows('temoignages')) : ?>
			<div class="testimonials__list">
				<?php while(have_rows('temoignages')) : the_row() ; ?>
				<div>
					<div class="testimonials__item">
					<?php
						$portrait = get_sub_field('temoignages_photo');
						if($portrait){
					?>
						<div class="testimonials__portrait">
							<?= wp_get_attachment_image($portrait['id'], 'medium'); ?>
						</div>
					<?php } ?>
						<div class="testimonials__content">
							<p class="testimonials__quote">	
								<?php the_sub_field('temoignages_citation') ?>
							</p>
							<?php if(get_sub_field('temoignages_nom') || get_sub_field('temoignages_poste')) { ?>
							<p class="testimonials__author">
								<span class="testimonials__nom"><?php the_sub_field('temoignages_nom') ?></span>
								<span class="testimonials__poste"><?php the_sub_field('temoignages_poste') ?></span>
							</p>
							<?php } ?>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
			</div>  
		<?php endif; ?>
    <?php get_template_part('builder/parts/bouton'); ?>
	</div>

<?php if(is_admin()): ?>
	<script>
		$ = jQuery.noConflict();

		$(document).ready(function(){
			$('.testimonials__list').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				autoplay: true,
				autoplaySpeed: 2000,
			});
		});
	</script>
<?php endif; ?>
  