<?php /*== Flexible Contenu de paragraphes ==*/ ?>

  <div class="container">
		<?= $custom_title; ?>
    
    <?php if(have_rows('paragraphs_group')){ ?>
      <?php while(have_rows('paragraphs_group')){ the_row() ; ?>
        <div class="paragraphs_row">
          <?php
            $disposition = get_sub_field('paragraphs_disposition');
            $getList = get_sub_field('paragraphs_list');
            $count = count($getList);

            $i = 0;
            $respGrid = '';

            switch ($disposition) {
              case 'grid-1':
                $respGrid = ' row-cols-1';
                $columnA = '';
                $columnB = '';
                break;

              case 'grid-2':
                $respGrid = ' row-cols-1 row-cols-sm-2';
                $columnA = '';
                $columnB = '';
                break;
                
              case 'grid-3':
                $respGrid = ' row-cols-1 row-cols-sm-2 row-cols-md-3';
                $columnA = '';
                $columnB = '';
                break;
              
              case 'grid-4':
                $respGrid = ' row-cols-1 row-cols-sm-2 row-cols-lg-4';
                $columnA = '';
                $columnB = '';
                break;
                
              case 'grid-2-1':
                $columnA = '-md-8';
                $columnB = '-md-4';
                break;
                
              case 'grid-1-2':
                $columnA = '-md-4';
                $columnB = '-md-8';
                break;
                
              case 'grid-3-1':
                $columnA = '-md-8 col-lg-9';
                $columnB = '-md-4 col-lg-3';
                break;
                
              case 'grid-1-3':
                $columnA = '-md-4 col-lg-3';
                $columnB = '-md-8 col-lg-9';
                break;
              
              default:
                $respGrid = ' col-12';
                $columns = '';
                break;
            }
            
            if(have_rows('paragraphs_list')){
          ?>
          <div class="para-wrapper row<?php echo $respGrid; ?>">
            <?php while(have_rows('paragraphs_list')){ the_row(); ?>
            <div class="para col<?php echo (($i % 2) == 0)? $columnA : $columnB; ?>">
                <?php the_sub_field('paragraphs_list_paragraph') ?>
            </div>
            <?php $i++;} ?>
          </div>
        <?php } ?>
        </div>
      <?php } ?>
    <?php } ?>
        
  </div>
  