<?php
// --------------------
// GET POST TYPE FROM TAXONOMY
// --------------------
function my_get_post_types_by_taxonomy( $tax = 'category' )
{
    global $wp_taxonomies;
    return ( isset( $wp_taxonomies[$tax] ) ) ? $wp_taxonomies[$tax]->object_type : array();
}
// --------------------
// BLOC ACTUALITÉS
// --------------------
function cpt_list($type = 'post', $tax = '', $slug = '', $showcat = false, $pagination = true, $nombre_posts = '-1', $exclude = 0) {
  $tax_query = '';
  $paged = get_query_var('paged') ? get_query_var('paged') : 1;
  if(!empty($tax) && !empty($slug)) {
    $tax_query= [[
                  'taxonomy' => $tax,
                  'field'    => 'slug',
                  'terms'    => $slug,
                ]];
  }

	$args = array(
		'post_type'    => $type,
    'paged'        => $paged,
		'orderby'      => 'date',
		'order'        => 'DESC',
    'post__not_in' => [$exclude],
    'showposts'    => $nombre_posts,
    'tax_query'    => $tax_query,
	);

  $the_query = new WP_Query( $args );

  $teaser_args = array('type' => 'cpt');
  if($showcat) {
    $teaser_args['showcat'] = true;
    $teaser_args['tax'] = $tax;
  }

  if ($the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post();
      get_template_part('templates/parts/content-teaser', null, $teaser_args);
    endwhile;
    
    if($pagination == true) :
      wp_pagenavi( array( 'query' => $the_query ) );
    endif;
  else:
    echo '<h2 class="notfound">Aucun article trouvé</h2>';
  endif; 
  wp_reset_postdata();
}



// --------------------
// filtres
// --------------------
function tax_menu($tax){
    
    $taxonomies = get_terms( array(
            'taxonomy' => $tax,
            'hide_empty' => true
        ) );
 
        if ( !empty($taxonomies) ) {
            $output = '<div class="marge container"><ul class="tax-menu menu"><li data-tax="all-posts">Tout</li>';
            foreach( $taxonomies as $category ) {
                   
                    $output.= '<li data-tax="'.esc_attr( $category->slug ).'">'. esc_attr( $category->name ) .'</li>';
                    
                }
            $output.='</ul></div>';
            echo $output;
        };
    
    
}


// --------------------
// AGENDA 
// --------------------
function events($time = '', $slug = null, $tax = 'eventtype', $pagination = true,  $nombre_posts='-1'){

    $date_now = date('Y-m-d G:i:s');
    $paged = get_query_var('paged') ? get_query_var('paged') : 1;

    $tax_args = '';
    if( $tax != null && $slug != null ){
      $tax_args = [[
                    'taxonomy' => $tax,
                    'field'    => 'slug',
                    'terms'    => array( $slug )
                    ]];
    }

    $meta_compare = '>';
    $meta_query = '';
    if($time == 'actual') {
      $meta_compare = '';
      $meta_query = array(
                      'relation'	=> 'AND',
                    
                      array(
                      'key'		=> 'start_date',
                      'compare'	=> '<=',
                      'value'		=> $date_now,
                      ),
                    
                      array(
                      'key'		=> 'end_date',
                      'compare'	=> '>=',
                      'value'		=> $date_now,
                      )
                    );
    }
    if($time == 'past') {
      $meta_compare = '<';
    }
   
    $args = array(
              'post_type'     => 'events',
              'paged'         => $paged,
              'meta_key'      => 'start_date',
              'meta_value'    => $date_now,
              'meta_query'    => $meta_query,
              'meta_compare'  => $meta_compare,
              'orderby'	      => 'meta_value_num',
              'order'		      => 'DESC',
              'posts_per_page'=> $nombre_posts,
              'tax_query'     => $tax_args,
            );

	  $the_query = new WP_Query( $args );

    if ($the_query->have_posts() ) :
      while ( $the_query->have_posts() ) : $the_query->the_post();
			  get_template_part('templates/parts/content-teaser', null, array('type' => 'events'));
      endwhile;
      
      if($pagination == true) { 
        wp_pagenavi( array( 'query' => $the_query ) );
      }
    endif; 
    wp_reset_postdata();
    
}

/**********GET TERM LIST ****/
function term_list($postId,$tax,$link = false){

     $output ='';
     $term_obj_list = get_the_terms( $postId, $tax );
     if(!empty( $term_obj_list)){ 
         $output = '<div class="terms-link-list">';
            foreach($term_obj_list as $term){
                $output .= ($link)? '<a href="'.get_term_link($term->id).'" class="term">': '';
                $output .= '<span class="term">'.$term->name.'</span>';
                $output .= ($link)? '</a>': '';
            }
        $output .= '</div>';
    }
    return $output;
}
