<?php
  $title = get_sub_field('titre');
	$custom_title = '';
	$moreclasses = '';
	if($title){
		if(get_sub_field('alignement_titre') == "center") $moreclasses .= " text-center";
		if(get_sub_field('alignement_titre') == "right") $moreclasses .= " text-end";
		if(get_sub_field('position_titre_secondaire')) $moreclasses .= " flex-column-reverse";

		$custom_title .= '<div class="section__title'.$moreclasses.'">';
			if($title) $custom_title .= '<h2>'.$title.'</h2>';
			if(get_sub_field('titre_secondaire')) $custom_title .= '<h3 class="title_s">'.get_sub_field('titre_secondaire').'</h3>';
		$custom_title .= '</div>';
	}
  