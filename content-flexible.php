<?php
/**
 * CONTENU FLEXIBLE
 */

if(isset($archiveId)) {
  $post = get_post($archiveId);
} 
 
if(has_flexible('bloc')):
	the_flexible('bloc');
endif;
