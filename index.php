<?php
get_header();
?>
  <section class="s-featured">
    <div class="row">
      <div class="col-full">
        <div class="featured-slider featured" data-aos="zoom-in">
          <?php
            $args = array(
              'meta_key'=>'meta_data',
              'meta_value'=>1,
            );
            $the_query = new WP_Query($args);
            while($the_query->have_posts()):
              $the_query->the_post();
              $post_thumbnail_link = get_the_post_thumbnail_url();
          ?>
          <div class="featured__slide">
            <div class="entry">
              <div class="entry__background"
                style="background-image:url('<?php echo esc_url( $post_thumbnail_link) ?>');"></div>
              <div class="entry__content">
                <span class="entry__category">
                  <a href="<?php echo esc_url( get_category_link(get_the_ID())); ?>"><?php the_category(' ');?></a>
                </span>
                <h1><a href="<?php the_permalink(); ?>" title=""><?php the_title();?></a></h1>
                <div class="entry__info">
                  <a href="<?php echo esc_url( get_author_posts_url(get_the_author_meta('ID'))); ?>" class="entry__profile-pic">
                  <?php echo get_avatar(get_the_author_meta('ID')); ?>                  </a>
                  <ul class="entry__meta">
                    <li><a href="<?php echo esc_url( get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author() ?></a></li>
                    <li><?php echo esc_html(get_the_date()); ?></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

            <?php
            endwhile;
            wp_reset_query();
            ?>
        </div>
      </div>
    </div>
  </section>
  <section class="s-content">
    <div class="row entries-wrap wide">
      <div class="entries">
        <?php
        while(have_posts()){
          the_post();
          get_template_part('template-parts/post-formats/post',get_post_format());
        }
        ?>
      </div>
    </div>
    <div class="row pagination-wrap">
      <div class="col-full">
        <nav class="pgn" data-aos="fade-up">
          <?php
            simple_pagination();
          ?>
        </nav>
      </div>
    </div>
  </section>
  <?php
 get_footer();
  ?>