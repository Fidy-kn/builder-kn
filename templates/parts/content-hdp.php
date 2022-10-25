<?php
  $current_id = (isset($args['blog_id']))? $args['blog_id'] : false;
  $title = get_field('titre', $current_id);
  $custom_title = '';
  $moreclasses = '';
  if(isset($args['tax'])) {
    $custom_title = '<div class="section__title"><h1>'.$args['tax'].'</h1></div>';
    $noheadbg = true;
  } else if($title){
    if(get_field('alignement_titre', $current_id) == "center") $moreclasses .= " text-center";
    if(get_field('alignement_titre', $current_id) == "right") $moreclasses .= " text-end";
    if(get_field('position_titre_secondaire', $current_id)) $moreclasses .= " flex-column-reverse";

    $custom_title .= '<div class="section__title'.$moreclasses.'">';
      if($title) $custom_title .= '<h1>'.$title.'</h1>';
      if(get_field('titre_secondaire', $current_id)) $custom_title .= '<h2 class="title_s">'.get_field('titre_secondaire', $current_id).'</h2>';
    $custom_title .= '</div>';
  } else {
    $custom_title = '<div class="section__title"><h1>'.get_the_title().'</h1></div>';    
  }
?>

<header class="hdp<?= ((get_field('hdp_media_background', $current_id) || get_the_post_thumbnail()) && !$noheadbg)? ' hdp--bg':'' ; ?>">
  <?php if((get_field('hdp_media_background', $current_id) || get_the_post_thumbnail()) && !$noheadbg){ ?>
  <div class="hdp__bg">
    <?php
      switch(get_field('hdp_media_background', $current_id)['type']) {
        case 'image':
          echo wp_get_attachment_image(get_field('hdp_media_background', $current_id)['id'], 'full');
          break;
        case 'video':
          echo '<video autoplay loop muted><source src="'.get_field('hdp_media_background', $current_id)['url'].'" type="video/mp4"></video>';
          break;
        default:
          the_post_thumbnail('original');
          break;
      }
    ?>
  </div>
  <?php } ?>
  <div class="hdp__content container">
      <?php
        echo $custom_title;
        if(get_field('hdp_texte') && !$noheadbg):
          echo '<div class="hdp-intro">'.
                get_field('hdp_texte', $current_id).
                '</div>';
        elseif(isset($args['tax_description'])):
          echo '<div class="hdp-intro">'.
                $args['tax_description'].
                '</div>';
        endif;
      ?>
  </div>
</header>
