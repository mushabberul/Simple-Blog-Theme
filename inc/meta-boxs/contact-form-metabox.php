<?php
function simple_contact_form_shortcode(){
	global $post;
	$pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
	if($pageTemplate == 'page-templates/contact.php' ){
		add_meta_box('simple_contact_form_shortcode',
		__('Add Contact Form Shortcode','simple'),'contact_form_shortcode','page');
	}
}
add_action('add_meta_boxes','simple_contact_form_shortcode');

function contact_form_shortcode($post){
	$simple_metabox_value = get_post_meta($post->ID,'metabox_name',true);
	?>
		<input name="metabox_name" id="metabox_id" value="<?php echo esc_attr($simple_metabox_value); ?>" class="widefat" type="text">
	<?php
}

function simple_save_metabox($post_id){
	update_post_meta( $post_id, 'metabox_name', $_POST['metabox_name'] );
}
add_action('save_post','simple_save_metabox');