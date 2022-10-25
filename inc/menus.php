<?php
/*-----------------------------------------------------------------------------------*/
/* Filter pour recup picto et couleur sur menus items
/*-----------------------------------------------------------------------------------*/
function add_picto($items, $args) {
  foreach( $items as $item ) {
    $icon = '';
    $bg = '';
    
    $icon = get_field('menu_item_picto', $item);
    if(get_field('menu_item_color', $item) && get_field('menu_item_color', $item)!='transparent'){
        $bg = strtolower(get_field('menu_item_color', $item));
        array_push($item->classes, 'btn', $bg); 
    }
    // append icon / color class
    if( $icon!='') {
        $title_temp=$item->title;
        $item->title = '<img class="picto" src="'.$icon['url'].'" alt="'.$icon['title'].'">'.$title_temp;
    }
  } 
  return $items;
}
//add_filter('wp_nav_menu_objects', 'add_picto', 10, 2);


/*-----------------------------------------------------------------------------------*/
/* Ajouter search form a un menu
/*-----------------------------------------------------------------------------------*/

function add_search_box($items, $args) {
  $idmenu =  wp_get_nav_menu_object($args->menu);
  $listmenus = array('primary');
  if (in_array($args->theme_location, $listmenus)) {
      //if(get_field('search', $idmenu)== 1 ){
      if(knoption('recherche')){
      ob_start();
      get_search_form();
      $searchform = ob_get_contents();
      ob_end_clean();

      $items .= '<li class="search-item">' . $searchform . '</li>'; 
      }
  }
  return $items;
}
add_filter('wp_nav_menu_items','add_search_box', 10, 2);
/*-----------------------------------------------------------------------------------*/
/* Ajouter socials a un menu
/*-----------------------------------------------------------------------------------*/

function add_socials($items, $args) {
        
    $idmenu =  wp_get_nav_menu_object($args->menu);
    if( $args->theme_location == 'primary' || $args->theme_location == 'top' ) {
      if(get_field('social', $idmenu)== 1 ){
        get_template_part('builder/parts/socials', null, ['class'=>'menu__socials', 'options'=>true]);
      }
    }
    return $items;
}
add_filter('wp_nav_menu_items','add_socials', 9, 2);


?>