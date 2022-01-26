<?php
// require_once get_theme_file_path( 'inc/widgets/social-widget/social-widget.php' );
require_once get_theme_file_path( 'inc/comment-walker/class-wp-bootstrap-comment-walker.php' );
require_once get_theme_file_path( 'inc/meta-boxs/contact-form-metabox.php' );
function simple_theme_setup() {
	load_theme_textdomain( 'simple', get_theme_file_path( 'languages' ) );
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'post-formats', array( 'image', 'video', 'quote', 'link', 'gallery', 'audio' ) );
	add_theme_support( 'custom-logo' );
	add_editor_style( 'css/editor-style.css' );

	add_image_size( 'simple-post-image', 400, 400, true );

	register_nav_menu( 'primary', __( 'Main Menu', 'simple' ) );
	register_nav_menus( array( 'footer_categoris_menu' => __( 'Footer Categories', 'simple' ) ) );
	register_nav_menus( array( 'footer_sitelink_menu' => __( 'Footer Site Link', 'simple' ) ) );
}
add_action( 'after_setup_theme', 'simple_theme_setup' );

function simple_assets() {
	wp_enqueue_style( 'google-font-css', '//fonts.googleapis.com/css?family=Libre+Baskerville:400,400i,700|Nunito+Sans:300,400,400i,600,600i,700,700i,800', null, '1.0' );
	wp_enqueue_style( 'font-awesome-css', get_theme_file_uri( 'assets/font-awesome/css/fontawesome-all.css' ), null, '1.0' );
	wp_enqueue_style( 'base-css', get_theme_file_uri( 'assets/css/base.css%2bvendor.css%2bmain.css.pagespeed.cc.MKPH2sr9my.css' ), null, '1.0' );
	wp_enqueue_style( 'simple-css', get_stylesheet_uri(), null, time() );

	wp_enqueue_script( 'modernizr-js', get_theme_file_uri( 'assets/js/modernizr.js' ), null, '1.0' );
	wp_enqueue_script( 'plugins-js', get_theme_file_uri( 'assets/js/plugins.js' ), array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'main-js', get_theme_file_uri( 'assets/js/main.js' ), array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'simple_assets' );

function simple_pagination() {
	global $wp_query;
	$link = paginate_links( array(
		'current'  => max( 1, get_query_var( 'paged' ) ),
		'total'    => $wp_query->max_num_pages,
		'type'     => 'list',
		'mid_size' => 3,
	) );
	$link = str_replace( 'page-numbers', 'pgn__num', $link );
	$link = str_replace( '<ul class=\'pgn__num\'>', '<ul>', $link );
	$link = str_replace( 'next pgn__num', 'pgn__next', $link );
	$link = str_replace( 'prev pgn__num', 'pgn__prev', $link );
	echo wp_kses_post( $link );
}

function simple_sidebar_register() {
	register_sidebar(
		array(
			'id'            => 'footer_aboutus',
			'name'          => __( 'Footer About Simple Widget', 'simple' ),
			'description'   => __( 'Add footer about simple widget', 'simple' ),
			'before_widget' => '<div id="%1s" class="col-six tab-full s-footer__about %2s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'footer_newsletter',
			'name'          => __( 'Footer Newsletter Simple Widget', 'simple' ),
			'description'   => __( 'Add footer newsletter simple widget', 'simple' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'footer_copyright',
			'name'          => __( 'Footer Copyright Simple Widget', 'simple' ),
			'description'   => __( 'Add footer copyright simple widget', 'simple' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'footer_social_icon',
			'name'          => __( 'Footer Social Icon Simple Widget', 'simple' ),
			'description'   => __( 'Add footer social icon simple widget', 'simple' ),
			'before_widget' => '<ul class="footer-social">',
			'after_widget'  => '</ul>',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
	register_sidebar(
		array(
			'id'            => 'about_page_item',
			'name'          => __( 'About Page Item', 'simple' ),
			'description'   => __( 'Add about page item widget', 'simple' ),
			'before_widget' => ' <div class="col-block">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="quarter-top-margin">',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'contact_page_info',
			'name'          => __( 'Contact Page Info', 'simple' ),
			'description'   => __( 'Add contact page Info widgets', 'simple' ),
			'before_widget' => '<div class="col-six tab-full">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>',
		)
	);
	register_sidebar(
		array(
			'id'            => 'google_map',
			'name'          => __( 'Contact Page Google Map', 'simple' ),
			'description'   => __( 'Add contact page google map widgets', 'simple' ),
			'before_widget' => '<div class="">',
			'after_widget'  => '</div>',
		)
	);
}
add_action( 'widgets_init', 'simple_sidebar_register' );

function simple_comment_form_fields_redesign( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['cookies'] );
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'simple_comment_form_fields_redesign' );

function add_class_cat_description( $des ) {
	return strip_tags( $des );
}
add_filter( 'category_description', 'add_class_cat_description' );

remove_filter( 'the_content', 'wpautop' );
