<?php $optionID = getOptionID(); ?>
<?php $bgprefooter = get_field('prefooter_bg', $optionID); ?>
<section class="newsletter <?php if($bgprefooter){ ?> avec_bg <?php } ?>" <?php if($bgprefooter){ ?> style="background-image:url( <?= $bgprefooter['url'] ?>);"<?php } ?> >
    <div class="container txtcenter">
      <?php if(get_field('prefooter_surtitre', $optionID)){ ?>
          <h3 class="surtitre"><?php the_field('prefooter_surtitre', $optionID) ?></h3>
      <?php } ?>
      <?php if(get_field('prefooter_titre', $optionID)){ ?>
          <h2><?php the_field('prefooter_titre', $optionID) ?></h2>
      <?php } ?>
      <?php the_field('prefooter_texte', $optionID) ?>
      <?=  do_shortcode(get_field('prefooter_formulaire', $optionID)) ?>
    </div>
</section>