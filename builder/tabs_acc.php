<?php /*== Flexible Onglets ou Accordeons ==*/ ?>

  <div class="container">
    <?= $custom_title; ?>
    
    <?php
      $onglets = get_sub_field('type_onglets_accordeons');
      if (have_rows('onglets_accordeons')) :
        $numero_ongacc = 1;
        if($onglets) :
    ?>
        <div class="tab">
          <ul class="nav nav-tabs tab__nav">
          <?php while (have_rows('onglets_accordeons')) : the_row(); ?>
            <li class="nav-item">
              <button class="nav-link <?php echo ($numero_ongacc==1)? "active":""; ?>" data-toggle="tab" data-target="#tab<?php echo $numero_ongacc; ?>" type="button" role="tab"><?php echo get_sub_field('titre'); ?></button>
            </li>
          <?php $numero_ongacc++; endwhile; $numero_ongacc = 1; ?>
          </ul>
          <div class="tab-content">
            <?php while (have_rows('onglets_accordeons')) : the_row(); ?>
            <div class="tab-pane fade <?php echo ($numero_ongacc==1)? "show active":""; ?>" id="tab<?php echo $numero_ongacc; ?>"><?php echo get_sub_field('contenu'); ?></div>
          <?php $numero_ongacc++; endwhile; ?>
          </div>
        </div>
      <?php else : ?>      
        <div class="bloc_accordeon accordion">
          <?php while (have_rows('onglets_accordeons')) : the_row(); ?> 
          <div class="accordion-item">
            <h3 class="accordion-header" id="accordion<?php echo $numero_ongacc; ?>">
              <button class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo $numero_ongacc; ?>" aria-expanded="true" aria-controls="collapse<?php echo $numero_ongacc; ?>">
                <?php the_sub_field('titre') ?>
              </button>
            </h3>
            <div class="accordion-collapse collapse" id="collapse<?php echo $numero_ongacc; ?>" aria-labelledby="accordion<?php echo $numero_ongacc; ?>">
              <div class="accordion-body">
                <?php the_sub_field('contenu') ?>
              </div>
            </div>
          </div>
          <?php $numero_ongacc++; endwhile; ?>
        </div>
      <?php endif; ?>
    <?php endif; ?>
    <?php get_template_part('builder/parts/bouton'); ?>
  </div>