<?php

get_header();

$parts = explode("/", $_SERVER['REQUEST_URI']);
$category_id = str_replace('?', '', $parts[(count($parts) - 1)]);

?>

	<div id="container" class="isys_visitor_posts">
			
			<a href="/<?php print isys_visitor_posts::$landing_page_slug?>" class="isys-black-link"><?php echo isys_visitor_posts::translate('back-main-page')?></a>
			<br/><br/>
			<h1 class="page-title"></h1>
			<form method="POST" id="isys_visitor_post_form">
				<input type="hidden" name="action" value="isys_visitor_plugin"/>
				<input type="hidden" name="do" value="create-post"/>
				<input type="hidden" name="category" value="<?php print $category_id?>"/>
				<label>
					<span><?php print isys_visitor_posts::translate('title')?></span>
					<input type="text" name="title" placeholder="<?php print isys_visitor_posts::translate('enter-title')?>"/>
				</label>				
				<div id="postdivrich" class="postarea" style="float:left;width:100%;display:inline-block;padding:10px 0;">
					<?php wp_editor('', 'description', array('media_buttons' => false, 'textarea_name' => 'description', 'textarea_rows' => 10))?>
				</div>
				<label>
					<span><?php print isys_visitor_posts::translate('name')?></span>
					<input type="text" name="author_name" placeholder="<?php print isys_visitor_posts::translate('enter-name')?>"/>
				</label>
				<label>
					<span><?php print isys_visitor_posts::translate('your-email')?></span>
					<input type="text" name="author_email" placeholder="<?php print isys_visitor_posts::translate('email-sample')?>"/>
				</label>
				<?php
				$companies = isys_visitor_posts::get_companies();
				?>
				<label class="attachments">
					<span><?php print isys_visitor_posts::translate('added-files')?></span>
					<span class="field">
						<span class="errorBox"></span>
						<input type="file" name="file_upload" style="float:left;width:100%;margin:5px 0;"/>
						<span class="progress"></span>
					</span>
				</label>
				<label>
					<span><?php print isys_visitor_posts::translate('username')?></span>
					<input type="text" name="author_username" placeholder="<?php print isys_visitor_posts::translate('enter-username')?>" maxlength="255"/>
				</label>
				<label>
					<span><?php print isys_visitor_posts::translate('password')?></span>
					<input type="password" name="author_password" placeholder="<?php print isys_visitor_posts::translate('enter-password')?>" maxlength="255"/>
				</label>
				<div class="label">
					<input type="submit" name="submit" class="button" value="<?php print isys_visitor_posts::translate('post')?>"/> <input type="reset" name="cancel" class="button" value="<?php print isys_visitor_posts::translate('cancel')?>"/>
				</div>
			</form>
			<?php $category_term = get_term_by('id', $category_id, 'blog-indlaeg-kategori')?>
			<input type="hidden" name="category_name" id="category_name" value="<?php echo $category_term->name?>"/>
	</div>

<?php

//get_sidebar();

get_footer();

?>