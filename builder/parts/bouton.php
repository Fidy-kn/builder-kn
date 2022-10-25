<?php
  if(get_sub_field('ajouter_bouton')) :
    $link = get_sub_field('lien_bouton');
    if( $link ): 
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
?>
  <p class="section__btn">
    <a class="bouton" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
  </p>  
<?php endif;endif; ?>