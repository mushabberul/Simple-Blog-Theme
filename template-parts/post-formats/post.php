<article class="col-block">
  <div class="item-entry" data-aos="zoom-in">
    <div class="item-entry__thumb">
      <a href="<?php the_permalink(); ?>" class="item-entry__thumb-link">
        <?php the_post_thumbnail('simple-post-image');?>
      </a>
    </div>
    <div class="item-entry__text">
      <div class="item-entry__cat">
        <a href="<?php echo esc_url(get_category_link(get_the_ID())); ?>"><?php the_category(' ');?></a>
      </div>
      <h1 class="item-entry__title">
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
  </h1>
      <div class="item-entry__date">
        <a href="single-standard.html"><?php echo esc_html(get_the_date());?></a>
      </div>
    </div>
  </div>
</article>