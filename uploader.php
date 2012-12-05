<?php print '<?xml version="1.0" encoding="UTF-8" ?>'?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title></title>
<style type="text/css">
	body, form {
		padding:0;
		margin:0;
		background-color:transparent;
	}
</style>
</head>
<body>
	<form enctype="multipart/form-data" id="iframe_uploader" method="post" action="/wp-admin/admin-ajax.php">
		<input type="hidden" name="action" value="isys_visitor_plugin"/>
		<input type="hidden" name="do" value="iframe-upload-pdf"/>
		<input type="file" name="file_upload" id="attachmentFiles"/>
	</form>
	<script src="/wp-includes/js/jquery/jquery.js?ver=1.7.2" type="text/javascript"></script>
	<script type="text/javascript">
		jQuery(document).ready(function(){
			var isys_uploads = <?php print isset($isys_uploads) ? json_encode($isys_uploads) : '{}'?>;
			var attachments = jQuery('.attachments .field', window.parent.document);
			for(i in isys_uploads){
				var attachment = isys_uploads[i];
				attachments.prepend('<span style="width:100%;"><input type="hidden" name="attachments['+attachment.ID+']" value="'+attachment.name+'"/>'+attachment.name+' <a href="javascript:isys_public_uploader.removeUpload('+attachment.ID+')">remove</a></span>');
			}
			var checkFiles = false;
			var uploadForm = jQuery('#iframe_uploader');
			jQuery('#attachmentFiles').click(function(){
				var subject = jQuery(this);
				checkFiles = setInterval(function(){
					if(subject.val().length == 0) return;
					clearInterval(checkFiles);
					setTimeout(function(){
						uploadForm.submit();
					}, 500);
				}, 500);
			});
			uploadForm.submit(function(){
				window.parent.isys_public_uploader.poorProgressIndicator();
			});
		});
	</script>
</body>
</html>