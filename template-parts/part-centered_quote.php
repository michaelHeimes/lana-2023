<?php
$centered_quote = get_sub_field('centered_quote');
$quote_text = $centered_quote['quote_text'];
$quote_author = $centered_quote['quote_author'];
$remove_tp = $centered_quote['remove_top_padding'];
$remove_bp = $centered_quote['remove_bottom_padding'];
?>
<div class="centered-quote module-padding<?php if($remove_tp) { echo ' ntp'; }; if($remove_bp) { echo ' nbp'; };?>">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell small-12">
				<div class="inner white-bg text-center relative">
					<div class="mask grid-pattern granite"></div>
					<div class="grid-x grid-padding-x align-center">
						<div class="cell small-12 talbet-10 large-8 xlarge-6">
							<div class="relative">
								<?php if( !empty( $quote_text ) ) {
									echo '<p class="quote-text">' . $quote_text . '</p>';
								};?>
								<?php if( !empty( $quote_author ) ) {
									echo '<p class="quote-author arrow-link mb-0">' . $quote_author . '</p>';
								};?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>