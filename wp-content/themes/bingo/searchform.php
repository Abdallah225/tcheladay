<form  method="get" id="searchform" action="<?php echo esc_url(home_url('/')) ?>">
	<div class="ruby-search">
		<span class="search-input"><input type="text" id="s" placeholder="<?php esc_html_e('Recherchez puis tappez sur  entrée&hellip;', 'bingo') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php esc_attr_e('Search for:', 'bingo') ?>"/></span>
		<span class="search-submit"><input type="submit" value="" /><i class="fa fa-search"></i></span>
	</div>
</form>

