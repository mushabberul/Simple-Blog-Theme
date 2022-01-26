<?php
get_header();
?>
  <section class="s-content s-content--top-padding">
  <div class="row narrow">
      <div class="col-full s-content__header" data-aos="fade-up">
        <h1 class="display-1 display-1--with-line-sep">Category: <?php single_cat_title(); ?></h1>
        <p class="lead"><?php echo category_description(); ?></p>
      </div>
    </div>
    <div class="row entries-wrap add-top-padding wide">
      <div class="entries">
        <?php
        while(have_posts()){
          the_post();
          get_template_part('template-parts/post-formats/post',get_post_format());
        }
        if(!have_posts()){
          echo '<h3 style="margin: auto;" class=\'text-center\'>Sorry, There aren\'t post.</h3>';
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