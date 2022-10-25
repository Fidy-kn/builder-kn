<?php
  $options = ($args['options'])? 'options':null;
  if (have_rows('reseaux', $options)) :
    echo '<ul class="socials '.$args['class'].'">';
    while (have_rows('reseaux', $options)) : the_row();
      echo '<li class="socials__item">';
      echo '<a href="'.get_sub_field('lien_du_reseau').'" data-social="'.get_sub_field('list_socials').'"></a>';
      echo '</li>';
    endwhile;
    echo '</ul>';
  endif;
