<section class="s-extra">
    <div class="row">
      <div class="col-seven md-six tab-full popular">
        <h3><?php _e('Popular Posts','simple');?></h3>
        <div class="block-1-2 block-m-full popular__posts">
          <?php
          $args = array(
            'orderby'=>'comment_count',
            'posts_per_page'=>6
          );
          $wp_query = new WP_Query($args);
          while($wp_query->have_posts()):
            the_post();
          ?>
          <article class="col-block popular__post">
            <a href="<?php the_permalink();?>" class="popular__thumb">
              <?php the_post_thumbnail();?>
            </a>
            <h5><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h5>
            <section class="popular__meta">
              <span class="popular__author"><span><?php _e('By','simple');?></span> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author();?></a></span>
              <span class="popular__date"><span><?php _e('on','simple');?></span> <time datetime="2018-06-14"><?php echo esc_html(get_the_date());?></time></span>
            </section>
          </article>
          <?php
          endwhile;
          wp_reset_query();
          ?>
        </div>
      </div>
      <div class="col-four md-six tab-full end">
        <div class="row">
          <div class="col-six md-six mob-full categories">
            <h3><?php _e('Categories','simple');?></h3>
            <?php
              wp_nav_menu(array(
                'theme_location'=>'footer_categoris_menu',
                'menu_class'=>'linklist'
              ));
            ?>
          </div>
          <div class="col-six md-six mob-full sitelinks">
            <h3><?php _e('Site Links','simple');?></h3>
            <?php
              wp_nav_menu(array(
                'theme_location'=>'footer_sitelink_menu',
                'menu_class'=>'linklist'
              ));
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="s-footer">
    <div class="s-footer__main">
      <div class="row">
        <?php
          if(is_active_sidebar('footer_aboutus')){
            dynamic_sidebar('footer_aboutus');
          }
        ?>
        <div class="col-six tab-full s-footer__subscribe">
        <?php
          if(is_active_sidebar('footer_newsletter')){
            dynamic_sidebar('footer_newsletter');
          }
        ?>
          <div class="subscribe-form">
            <form id="mc-form" class="group" novalidate>
              <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address"
                required>
              <input type="submit" name="subscribe" value="Send">
              <label for="mc-email" class="subscribe-message"></label>
            </form>
          </div>

          <!-- <div class="subscribe-form">
          <?php
            //echo do_shortcode('[mc4wp_form id="116" html_id="mc-form"]');
          ?>
          </div> -->

        </div>
      </div>
    </div>
    <div class="s-footer__bottom">
      <div class="row">
        <div class="col-six">
          <?php
          if(is_active_sidebar('footer_social_icon')){
            dynamic_sidebar('footer_social_icon');
          }
          ?>
        </div>
        <div class="col-six">
          <div class="s-footer__copyright">
            <span> Copyright &copy; <script>
                document.write(new Date().getFullYear());
              </script>
              <?php
                if(is_active_sidebar('footer_copyright')){
                  dynamic_sidebar('footer_copyright');
                }
              ?>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="go-top">
      <a class="smoothscroll" title="<?php _e('Back to Top') ?>" href="#top"></a>
    </div>
  </footer>
 <?php
 wp_footer();
 ?>
</body>

</html>