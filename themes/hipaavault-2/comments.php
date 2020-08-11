<?php
// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="no-comments"><?php _e('This post is password protected. Enter the password to view comments.', 'vmracks'); ?></p>
	<?php
		return;
	}
?>
	
<?php if ( have_comments() ) : ?>

	<div class="comment_list" id="comments">
		<h3 class="left_title"><?php comments_number(__('No Comments', 'vmracks'), __('One Comment', 'vmracks'), __('% Comments', 'vmracks'));?></h3>

		<!-- Comment list -->
		<ol>
			<?php wp_list_comments('type=comment&callback=boc_comment'); ?>
		</ol>
		<!-- Comment list::END -->
		
		<div class="clearfix">
		    <div style="float: left;" class="btn-con"><?php previous_comments_link(); ?></div>
		    <div style="float: right;" class="btn-con"><?php next_comments_link(); ?></div>
		</div>
	</div>

<?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="no-comments"><?php _e('Comments are closed.', 'vmracks'); ?></p>

	<?php endif; ?>

<?php endif; ?>

<?php if ( comments_open() ) : ?>

				
	<?php

$args = array(
  'id_form'           => 'commentform',
	'class_form'           => 'form-horizontal',
  'id_submit'         => 'submit',
  'title_reply'       => '<span>'.__('Leave A Comment', 'vmracks').'</span>',
  'label_submit'      => __('Comment', 'vmracks'),
	'class_submit'      => 'btn btn-primary btn-lg col-sm-offset-2',

  'comment_field' =>  '
	<div id="comment-textarea">
		<div class="form-group">
			<label for="comment" class="col-sm-2 control-label">'.__('Comment', 'vmracks').'<span class="required">*</span></label>
			<div class="col-sm-10">				
				<textarea id="comment" rows="8" class="form-control" name="comment"></textarea>
			</div>
		</div>
	</div>',
	
  'must_log_in' => '<p>You must be <a href="'.wp_login_url( get_permalink() ).'">logged in</a> to post a comment.</p>',

  'logged_in_as' => '<p>'.__('Logged in as', 'vmracks').' <a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>. <a href="'.wp_logout_url(get_permalink()).'" title="Log out of this account">'.__('Log out &raquo;', 'vmracks').'</a></p>',

  'comment_notes_before' => '',  
  'comment_notes_after' => '',

  'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' =>
      '
			<div class="form-group">
				<label for="author" class="col-sm-2 control-label">'.__('Name', 'vmracks').'<span class="required">*</span></label>
				<div class="col-sm-10">				
					<input id="author" class="form-control" name="author" type="text" value=""/>
				</div>
			</div>
			
			',

    'email' =>
      '
			<div class="form-group">
				<label for="email" class="col-sm-2 control-label">'.__('Email', 'vmracks').'<span class="required">*</span></label>
				<div class="col-sm-10">				
					<input id="email" class="form-control" name="email" type="email" value=""/>
				</div>
			</div>
			',

    'url' =>
      '
			<div class="form-group">
				<label for="url" class="col-sm-2 control-label">'.__('Website', 'vmracks').'</label>
				<div class="col-sm-10">				
					<input id="url" class="form-control" name="url" type="text" size="30" value=""/>
				</div>
			</div>
			
			'
    )
  ),
);	
		?>		
				

				
		<!-- Comment Section -->	

		<?php comment_form($args); ?>
					
		<!-- Comment Section::END -->


<?php endif; ?>