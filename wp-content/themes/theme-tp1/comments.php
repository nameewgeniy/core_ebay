	<div id="feedback-list" class="">
		<?php
			echo "<ul>";
			wp_list_comments( 'type=comment&callback=theme_list_comment&reverse_top_level=ASC' );
			echo "</ul>";
		?>
	</div>
	<div id="feedback-form">
		<?php theme_comment_form();?>
	</div>