<article itemscope itemtype="http://schema.org/Article" class="teaser__item">
  <?php if(isset($args['type']) == "events") { the_terms(get_the_ID(), 'eventtype', '<div class="teaser__category">', ' ', '</div>'); } ?>
  <?php if(isset($args['showcat'])) { the_terms(get_the_ID(), $args['tax'], '<div class="teaser__category">', ' ', '</div>'); } ?>

  <a class="teaser__link" href="<?php the_permalink(); ?>">
    <div class="teaser__image">
      <?= (has_post_thumbnail())? the_post_thumbnail('medium', array('itemprop'=>'image')) : ''; ?>
    </div>
    <div class="teaser__text">
      <?php
        if(isset($args['type']) == "events") :
          if(get_field('start_date')) :
            echo '<time class="teaser__date">';
              trad_texte('Du');
              echo ' ';
              the_field('start_date');

              if(get_field('end_date')) :
                trad_texte('Au');
                echo ' ';
                the_field('end_date');
              endif;

            echo '</time>';
          endif;
        else :
          $date_format = ( function_exists( 'pll_the_languages' ) && pll_current_language()!='fr') ? 'F d Y' : 'd F Y';
          echo '<time class="teaser__date">';
          trad_texte('Le ');
          echo get_the_date($date_format);
          echo '</time>';
        endif;
      ?>
      <h4 class="teaser__title"><?php the_title(); ?></h4>
      <?= (get_field('lieu')) ? '<p class="teaser__lieu">'.get_field('lieu').'</p>': ''; ?>
      <div class="teaser__excerpt"><?php the_excerpt(); ?></div>    
      <span class="teaser__btn bouton"><?php trad_texte('En savoir plus') ?></span>
    </div>
  </a>
</article>
