<?php
/**
 * Template Name: About
 */
get_header();
?>
<section class="s-content s-content--top-padding s-content--narrow">
    <div class="row narrow">
      <div class="col-full s-content__header">
        <h1 class="display-1 display-1--with-line-sep"><?php the_title(); ?></h1>
		  <p>
          <?php the_post_thumbnail('large');?>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="col-full s-content__main">
		<p class="lead"><?php the_content();?></p>
          <div class="row block-1-2 block-tab-full">
            <?php
					if(is_active_sidebar('about_page_item')){
						dynamic_sidebar('about_page_item');
					}
				?>
          </div>
      </div>
    </div>
  </section>
<?php get_footer();?>