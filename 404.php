<?php
get_header();
?>
<div class="block-404">
		<div class="container">
			<div class="block-404__wrap">

				<div class="block-404__code" id="animated-404"
				data-path="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/models/404_appear.json"
				data-path-second="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/models/404_cycle.json"
				></div>

				<div class="block-404__text">
                    Oops! It seems Dollet has misplaced this link in the vast digital universe. Our sincerest apologies<br>for the inconvenience. Return to the main page with Dollet and continue your seamless crypto<br>adventure!
				</div>
				<div class="block-404__button">
					<a href="/" class="button button-simple with-arrow sticky-cursor">
						<span>Go to Homepage</span>
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="icon">
							<use xlink:href="<?= DOLLET_TEMPLATE_DIRECTORY_URI ?>/build/img/_set.svg#icon-arrow"></use>
						</svg>
					</a>
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();