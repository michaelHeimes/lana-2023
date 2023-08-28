<?php
$centered_quote = get_sub_field('centered_quote');
$quote_text = $centered_quote['quote_text'];
$quote_author = $centered_quote['quote_author'];
?>
<div class="centered-quote">
	<div class="grid-container">
		<div class="cell small-12">
			<div class="white-bg text-center relative">
				<div class="mask grid-pattern granite"></div>
				<div class="relative">
					<?php if( !empty( $quote_text ) ) {
						echo '<p class="quote-text">' . $quote_text . '</p>';
					};?>
					<?php if( !empty( $quote_author ) ) {
						echo '<p class="quote-author">' . $quote_author . '</p>';
					};?>
				</div>
			</div>
		</div>
	</div>
</div>