<?php
  /*-----------------------------------------------------------------------------------*/
  /* == Sidebars
  /*-----------------------------------------------------------------------------------*/
  /*
  function kn_register_sidebars() {
    register_sidebar(array(
      'id' => 'sidebar',
      'name' => 'Sidebar',
      'description' => 'Ma sidebar',
      'before_widget' => '<div>',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="side-title">',
      'after_title' => '</h3>',
      'empty_title'=> '',
    ));
  }
  add_action( 'widgets_init', 'kn_register_sidebars' );
  */

  /*-----------------------------------------------------------------------------------*/
  /* CHANGER TITRE DES POSTS EN ACTUALITES DANS ADMIN
  /*-----------------------------------------------------------------------------------*/

  function change_post_menu_label() {
      global $menu;
      global $submenu;
      $menu[5][0] = 'Actualités';
      $submenu['edit.php'][5][0] = 'Actualités';
      $submenu['edit.php'][10][0] = 'Ajouter une actualité';
      $submenu['edit.php'][16][0] = 'Tags';
      echo '';
  }
  add_action( 'admin_menu', 'change_post_menu_label' );


  function change_post_object_label() {
      global $wp_post_types;
      $labels = &$wp_post_types['post']->labels;
      $labels->name = 'Actualités';
      $labels->singular_name = 'Actualité';
      $labels->add_new = 'Ajouter une actualité';
      $labels->add_new_item = 'Ajouter une actualité';
      $labels->edit_item = 'Modifier une actualité';
      $labels->new_item = 'Actualité';
      $labels->view_item = 'Voir les actualités';
      $labels->search_items = 'Chercher un actualité';
      $labels->not_found = 'Aucune actualité trouvée';
      $labels->not_found_in_trash = 'Aucune actualité dans la corbeille';
  }
  add_action( 'init', 'change_post_object_label' );

  /*-----------------------------------------------------------------------------------*/
  /* Classe si fond clair / foncé
  /*-----------------------------------------------------------------------------------*/

  function class_by_color($bg){
      $bgClass = 'c_white';
      if($bg!=''){
          $bg = str_replace('#','',$bg);
          $r = hexdec(substr($bg,0,2));
          $g = hexdec(substr($bg,2,2));
          $b = hexdec(substr($bg,4,2));

          $squared_contrast = (
              $r * $r * .299 +
              $g * $g * .587 +
              $b * $b * .114
          );
          
          if($squared_contrast > pow(130, 2)){
            $bgClass = 'c_light';
          }else{
            $bgClass = 'c_dark';
          }
      }
      
      return ' '.$bgClass;
  }


  /*-----------------------------------------------------------------------------------*/
  /* kn OPTIONS
  /*-----------------------------------------------------------------------------------*/
  function knoption($option_name){
      global $wpdb;
      $status = $wpdb->get_var( "SELECT COUNT(*) FROM akn_knoptions WHERE option_name LIKE '$option_name' AND option_status = 1" );
      if($status > 0){ echo $status; }
  }

  /*-----------------------------------------------------------------------------------*/
  /* CHAINE STATIQUES AVEC TRAD OU PAS SI POLYLANG OU NON
  /*-----------------------------------------------------------------------------------*/

  function trad_texte($string){
      if ( function_exists( 'pll_the_languages' ) ) {
          pll_e($string); 
      } else{
          echo $string; 
      }
  }

  
/*-----------------------------------------------------------------------------------*/
/* Galerie ajout de liens personnalisés
/*-----------------------------------------------------------------------------------*/

function gallery_custom( $output, $attr ) {

  global $post;

  if ( isset($attr['orderby'] ) ) {
      $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
      if ( ! $attr['orderby'] ) {
          unset( $attr['orderby'] );
      }
  }

  extract(shortcode_atts(array(
      'order' => 'ASC',
      'orderby' => 'menu_order ID',
      'id' => $post->ID,
      'itemtag' => 'dl',
      'icontag' => 'dt',
      'captiontag' => 'dd',
      'columns' => 3,
      'size' => 'thumbnail',
      'include' => '',
      'exclude' => ''
  ), $attr ));

  $id = intval( $id );
  if ('RAND' == $order ) $orderby = 'none';

  if ( ! empty( $include ) ) {
      $include = preg_replace('/[^0-9,]+/', '', $include);
      $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

      $attachments = array();
      foreach ($_attachments as $key => $val) {
          $attachments[$val->ID] = $_attachments[$key];
      }
  }

  if ( empty( $attachments ) ) return '';

  // Here's your actual output, you may customize it to your need
  $output .= "<div class='gallery galleryid-$columns row row-cols-2 row-cols-md-$columns gallery-size-$size'>";

  // Now you loop through each attachment
  foreach ( $attachments as $id => $attachment ) {
      // Fetch the thumbnail (or full image, it's up to you)

      $img = wp_get_attachment_image_src( $id, $size );

      $output .= '<figure class="gallery-item"><div class="gallery-icon landscape">';
      if(get_field('lien_perso', $attachment->ID)) {
          $output .= '<a href="'.get_field('lien_perso', $attachment->ID).'" target="_blank">';
      }
      $output .= '<img src="' . $img[0] . '" width="' . $img[1] . '" height="' . $img[2] . '" alt="" />';
      if(get_field('lien_perso', $attachment->ID)) {
          $output .= '</a>';
      }
      $output .= '</div>';
      if ( $captiontag && trim($attachment->post_excerpt) ) {
          $output .= "
              <{$captiontag} class='gallery-caption'>
              " . wptexturize($attachment->post_excerpt) . "
              </{$captiontag}>";
      }
      $output .= '</figure>';
  }

  $output .= '</div>';

  return $output;
}

add_filter( 'post_gallery', 'gallery_custom', 10, 2 );

/**
* Populate ACF select field options with Gravity Forms forms
*/
function acf_populate_gf_forms_ids( $field ) {
if ( class_exists( 'GFFormsModel' ) ) {
  $choices = [];

  foreach ( \GFFormsModel::get_forms() as $form ) {
    $choices[ $form->id ] = $form->title;
  }

  $field['choices'] = $choices;
}

return $field;
}
add_filter( 'acf/load_field/key=field_632ad5fdefb46', 'acf_populate_gf_forms_ids' );

/*-----------------------------------------------------------------------------------*/
/* Flexible auto render
/*-----------------------------------------------------------------------------------*/
function my_acf_layout_template($file, $field, $layout, $is_preview){
  $file = get_stylesheet_directory() . '/builder/builder.php';
  return $file;
}
add_filter('acfe/flexible/render/template/name=bloc', 'my_acf_layout_template', 10, 4);

function my_acf_layout_thumbnail($thumbnail, $field, $layout){
    return get_stylesheet_directory_uri().'/builder/thumbnails/'.$layout['name'].'.jpg';
}
add_filter('acfe/flexible/thumbnail/name=bloc', 'my_acf_layout_thumbnail', 10, 3);

function my_acf_flexible_enqueue($field, $is_preview){
    wp_enqueue_style('builder',  get_stylesheet_directory_uri() . '/builder/styles.css', array(), null);
}
if(is_admin()){
  add_action('acfe/flexible/enqueue/name=bloc', 'my_acf_flexible_enqueue', 10, 2);
}


/*-----------------------------------------------------------------------------------*/
/* GMAP API
/*-----------------------------------------------------------------------------------*/
function my_acf_google_map_api( $api ){
  acf_update_setting('google_api_key', get_field('google_maps', 'options'));    
}
add_filter('acf/init', 'my_acf_google_map_api');



/*-----------------------------------------------------------------------------------*/
/* Allow changing of the canonical URL. (@param string $canonical The canonical URL.)
/*-----------------------------------------------------------------------------------*/
add_filter( 'rank_math/frontend/canonical', function( $canonical ) {
	return trailingslashit( $canonical );
});

/*-----------------------------------------------------------------------------------*/
/* == ESPACE INSECABLE 
/*-----------------------------------------------------------------------------------*/
function non_break($content){
  $content = preg_replace( '/\s([?:!])/', '&nbsp;$1', $content );
  return $content;
}
add_filter('acf/format_value/type=textarea', 'non_break', 10, 3);
add_filter('acf/format_value/type=text', 'non_break', 10, 3);
add_filter('the_title', 'non_break', 10, 2);


/*-----------------------------------------------------------------------------------*/
/* IMG OU SVG
/*-----------------------------------------------------------------------------------*/
function file_get_contents_ssl($url) {
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_REFERER, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3000); // 3 sec.
  curl_setopt($ch, CURLOPT_TIMEOUT, 10000); // 10 sec.
  $result = curl_exec($ch);
  curl_close($ch);
  return $result;
}

function imgsvg($file=false, $taille=false, $max_width=false, $classe=""){
  if($file && $file['mime_type']  == 'image/svg+xml' ){		
    $output = file_get_contents_ssl( str_replace("//", "//client:client@",  $file["url"] ));
    return $output;
  }	
}