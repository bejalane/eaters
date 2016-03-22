<?php wp_list_comments();?>


<?php $comments_args = array(
	// change the title of send button 
	'label_submit'=>'שלח',
	// change the title of the reply section
	'title_reply'=>'Leave a reply',
	// remove "Text or HTML to be displayed after the set of comment fields"
	'comment_notes_after' => '',
	// redefine your own textarea (the comment body)
	'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
); 

$args = array(
	'fields' => apply_filters(
		'comment_form_default_fields', array(
			'author' =>'<p class="comment-form-author">' . '<input id="author" placeholder="שם מלא" name="author" type="text" value="' .
				esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' />'.
				'<label for="author">' . __( '' ) . '</label> ' .
				( $req ? '<span class="required">*</span>' : '' )  .
				'</p>'
		)
	),
	// change the title of send button 
	'label_submit'=>'שלח',
	// change the title of the reply section
	'title_reply'=>'Leave a reply',
	// remove "Text or HTML to be displayed after the set of comment fields"
	'comment_field' => '<p class="comment-form-comment">' .
		'<label for="comment">' . __( '' ) . '</label>' .
		'<textarea id="comment" name="comment" placeholder="חוות הדעת שלי:" cols="45" rows="8" aria-required="true"></textarea>' .
		'</p>',
    'comment_notes_after' => '',
    'title_reply' => '<div class="crunchify-text"> <h5>הוסיפו חוות דעת:</h5></div>'
);


comment_form( $args  );

?>