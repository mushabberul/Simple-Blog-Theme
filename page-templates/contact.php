<?php
/**
 * Template Name: Contact
 */
get_header();
?>
<section class="s-content s-content--top-padding s-content--narrow">
    <div class="row narrow">
      <div class="col-full s-content__header">
        <h1 class="display-1 display-1--with-line-sep"><?php the_title(); ?></h1>
        <p> <?php the_post_thumbnail('large');?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-full s-content__main">
        <p class="lead">
          <?php the_content();?>
        </p>

          <div id="map-wrap">
            <?php
              if(is_active_sidebar('google_map')){
                dynamic_sidebar('google_map');
              }
            ?>
          </div>
          <div class="row">
            <?php
              if(is_active_sidebar('contact_page_info')){
                dynamic_sidebar('contact_page_info');
              }
            ?>

          </div>

          <h4><?php _e('Get In Touch','simple'); ?></h4>
          <?php
             $simple_contact_form = get_post_meta(get_the_ID(),'metabox_name',true);
             echo do_shortcode($simple_contact_form);

          ?>
      </div>
    </div>
  </section>
<?php get_footer();?>