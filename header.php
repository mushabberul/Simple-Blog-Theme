<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <?php
  wp_head();
  ?>
</head>

<body id="top" <?php body_class();?>>
  <div id="preloader">
    <div id="loader" class="dots-fade">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <header class="s-header header">
    <div class="header__logo">
		<?php if(has_custom_logo()):?>
      	<a class="logo" href="<?php echo home_url('/'); ?>">
        		<?php the_custom_logo();?>
      	</a>
		<?php else:?>
			<h2>
				<a class="logo" href="<?php echo home_url('/'); ?>">
					<?php bloginfo('name');?>
				</a>
			</h2>
		<?php endif;?>
    </div>
    <a class="header__search-trigger" href="#0"></a>
    <div class="header__search">
      <?php
		get_search_form();
		?>
      <a href="#0" title="Close Search" class="header__overlay-close"><?php _e('Close','simple');?></a>
    </div>
    <?php
    get_template_part('template-parts/common/navigation');
    ?>
  </header>