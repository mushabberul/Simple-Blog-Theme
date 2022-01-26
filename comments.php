<div class="comments-wrap">
	<div id="comments" class="row">
		<div class="col-full">
			<h3 class="h2">
				<?php
					$simple_comment_number = get_comments_number();
					if(1 >= $simple_comment_number){
						echo esc_html( $simple_comment_number).__(' Comment','simple');
					}else{
						echo esc_html($simple_comment_number).__(' Comments','simple');
					}
				?>
			</h3>
			<ol class="commentlist">
				<?php
				wp_list_comments( array(
					'max_depth'     => 4,
					'short_ping'    => true,
					'avatar_size'   => '50',
					'walker'        => new Bootstrap_Comment_Walker(),
				) );
				?>
			</ol>
		</div>
	</div>
	<div class="row comment-respond">
		<div id="respond" class="col-full">
			<h3 class="h2"><?php _e('Add Comment','simple') ?></h3>
			<?php
			$simple_author_placeholder = __('Your Name','simple');
			$simple_email_placeholder = __('Your Email','simple');
			$simple_website_placeholder = __('Website','simple');
			$simple_comment_placeholder = __('Your Message','simple');
			$simple_button_value = __('Add Comment','simple');

			$simple_comment_fields['author']=<<<EOD
			<div class="form-field">
				<input name="author" id="author" class="full-width" placeholder="{$simple_author_placeholder}*" value="" type="text">
		 </div>
EOD;
			$simple_comment_fields['email']=<<<EOD
			<div class="form-field">
				<input name="email" id="email" class="full-width" placeholder="{$simple_email_placeholder}*" value="" type="text">
			</div>
EOD;
			$simple_comment_fields['website']=<<<EOD
			<div class="form-field">
				<input name="website" id="website" class="full-width" placeholder="{$simple_website_placeholder}" value="" type="text">
			</div>
EOD;
			$simple_comment_field=<<<EOD
			<div class="message form-field">
				<textarea name="comment" id="comment" class="full-width" placeholder="{$simple_comment_placeholder}*"></textarea>
			</div>
EOD;
			$simple_submit_button=<<<EOD
			<input name="submit" id="submit" class="btn btn--primary btn-wide btn--large full-width"
                value="{$simple_button_value}" type="submit">
EOD;
				$simple_comment_args = array(
					'comment_notes_before'=>'',
					'title_reply'=>'',
					'fields'=>$simple_comment_fields,
					'comment_field'=>$simple_comment_field,
					'submit_button'=>$simple_submit_button,

				);
				comment_form($simple_comment_args);
			?>
		</div>
	</div>
</div>