<?php
	the_post();
	get_header();
?>
	<section class="s-content s-content--top-padding s-content--narrow">
		<article class="row entry format-standard">
			<div class="entry__media col-full">
				<div class="entry__post-thumb">
					<?php the_post_thumbnail('large');?>
				</div>
			</div>
			<div class="entry__header col-full">
				<h1 class="entry__header-title display-1">
					<?php the_title();?>
				</h1>
				<ul class="entry__header-meta">
					<li class="date"><?php echo esc_html(get_the_date());?></li>
					<li class="byline"><?php _e('By ','simple');?>
						<a href="<?php echo esc_url( get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a>
					</li>
				</ul>
			</div>
			<div class="col-full entry__main">
				<?php the_content();?>
					<div class="entry__taxonomies">
						<div class="entry__cat">
							<h5><?php _e('Posted In:','simple'); ?></h5>
							<span class="entry__tax-list">
								<?php the_category(' ');?>

							</span>
						</div>
						<div class="entry__tags">
							<h5><?php _e('Tags:','simple'); ?> </h5>
							<span class="entry__tax-list entry__tax-list--pill">
								<?php the_tags('','','');?>
							</span>
						</div>
					</div>
					<div class="entry__author">
						<?php
						echo wp_kses_post( get_avatar(get_the_author_meta('ID')));
						?>
						<div class="entry__author-about">
							<h5 class="entry__author-name">
								<span><?php _e('Posted by','simple'); ?></span>
								<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author();?></a>
							</h5>
							<div class="entry__author-desc">
								<?php echo esc_html(get_the_author_meta('description'));?>
							</div>
						</div>
					</div>
			</div>
		</article>
		<div class="s-content__entry-nav">
			<div class="row s-content__nav">
				<?php
					$simple_prev_post = get_next_post();
					if($simple_prev_post):
				?>
					<div class="col-six s-content__prev">
						<a href="<?php  echo esc_url(get_the_permalink($simple_prev_post)); ?> " rel="prev">
							<span><?php _e('Previous Post','simple') ?></span> <?php  echo esc_html(get_the_title($simple_prev_post)); ?> </a>
					</div>
				<?php endif;?>
				<?php
					$simple_next_post = get_previous_post();
					if($simple_next_post):
				?>
					<div class="col-six s-content__next">
						<a href="<?php  echo esc_url(get_the_permalink($simple_next_post)); ?> " rel="next">
							<span><?php _e('Next Post','simple') ?></span> <?php  echo esc_html(get_the_title($simple_next_post)); ?>
						</a>
					</div>
				<?php endif;?>
			</div>
		</div>
		<?php
		if(comments_open()){
			comments_template();
		}
		?>
	</section>
<?php
	get_footer();
?>
