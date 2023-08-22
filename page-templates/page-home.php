<?php
/**
 * Template name: Home Page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package lana
 */

get_header();
$fields = get_fields();
?>
	<div class="content">
		<div class="inner-content">

			<main id="primary" class="site-main">
		
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<?php if( !empty( $fields['hero_banner'] ) ) {
						$hero_banner = $fields['hero_banner'];
						get_template_part('template-parts/part', 'hero-banner', 
							array(
								'hero-banner' => $fields['hero_banner'],
							)
						);
					}?>
				
					<section class="entry-content" itemprop="text">
						
						<?php if( !empty($fields['s1_section_title']) || !empty($fields['s1_left_column_copy']) || !empty($fields['s1_right_column']) || !empty($fields['s1_service_ctas']) || !empty($fields['s1_map_background_image']) || !empty($fields['s1_facts_figures']) || !empty($fields['s1_client_logos']) ):?>
						<div class="section s1">
							<div class="grid-container">
								
								<?php if( !empty($fields['s1_section_title']) || !empty($fields['s1_left_column_copy']) || !empty($fields['s1_right_column']) ):?>
								<div class="grid-x grid-padding-x">
									<?php if( !empty($fields['s1_section_title']) ):?>
									<div class="cell small-12 medium-3 tablet-2">
										<div class="grid-x align-middle">
											<?php get_template_part('template-parts/svg', 'number-one', '');?>
											<svg width="30" height="1" viewBox="0 0 30 1" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M29 0.5H1" stroke="#1B1B1B" stroke-linecap="square"/></svg>
											<h2 class="h5">
												<?php echo esc_attr( $fields['s1_section_title'] );?>
											</h2>
										</div>
									</div>
									<?php endif;?>
									<?php if( !empty($fields['s1_left_column_copy']) || !empty($fields['s1_right_column']) || !empty($fields['s1_service_ctas']) ):?>
										<div class="cell small-12 medium-9 tablet-10">
											<div class="grid-x grid-padding-x">
												<div class="cell small-12 tablet-6">
													<?php echo $fields['s1_left_column_copy'];?>
												</div>
												<?php if( !empty($fields['s1_right_column_copy']) ):?>
													<div class="cell small-12 tablet-6">
														<?php echo $fields['s1_right_column_copy'];?>
													</div>
												<?php endif;?>
												<?php if( !empty($fields['s1_service_ctas']) ):
													$s1_service_ctas = $fields['s1_service_ctas'];
													foreach($s1_service_ctas as $s1_service_cta):
														$link = $s1_service_cta['service_page'];
														$image = $s1_service_cta['image'];
												?>
													<div class="cell small-12 tablet-4">
														<div class="inner br-12 has-object-fit">
															<?php if( $link ): 
															$link_url = $link['url'];
															$link_target = $link['target'] ? $link['target'] : '_self';
															?>
																<a class="color-white" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
															<?php endif;?>
																<?php if( !empty( $image ) ) {
																	$imgID = $image['ID'];
																	$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
																	$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "object-fit cover", "alt"=>$img_alt] );
																	echo $img;
																}?>
															<?php if( $link ):
																$link_title = $link['title'];
															?> 
																	<div class="relative text-wrap">
																		<h3><?php echo esc_html( $link_title );?></h3>
																		<div class="arrow-link">
																			<span>Read More</span>
																			<?php get_template_part('template-parts/svg', 'arrow-white');?>
																		</div>
																	</div>
																</a>
															<?php endif;?>
														</div>
													</div>
												<?php endforeach; endif;?>
											</div>
										</div>
									<?php endif;?>
								</div>
								<?php endif;?>
								
								<?php if( !empty($fields['s1_map_background_image']) || !empty($fields['s1_facts_figures']) ):?>
								<div class="facts-figures-wrap grid-x grid-padding-x">
									<div class="cell small-12">
										<div class="inner has-bg">
											<?php if( !empty($fields['s1_map_background_image']) ):?>
											<div class="bg" style="background-image: url(<?php echo esc_url($fields['s1_map_background_image']['url']); ?>);"></div>
											<?php endif;?>
											<?php if( !empty($fields['s1_facts_figures']) ):
												$s1_facts_figures = $fields['s1_facts_figures'];
											?>
											<div class="ff-wrap white-bg br-12 relative">
												<div class="grid-x grid-padding-x">
													<?php foreach($s1_facts_figures as $s1_facts_figure):
														$figure = $s1_facts_figure['figure'];
														$label = $s1_facts_figure['label'];
													?>
													<div class="cell small-12 medium-6 tablet-3 text-center">
														<?php if( !empty($figure) ):?>
															<div class="figure"><?php echo esc_attr( $figure );?></div>
														<?php endif;?>
														<?php if( !empty($label) ):?>
															<div class="label h6"><?php echo esc_attr( $label );?></div>
														<?php endif;?>
													</div>
													<?php endforeach;?>
												</div>
											</div>
											<?php endif;?>
										</div>
									</div>
								</div>
								<?php endif;?>
								
								<?php if( !empty( $fields['s1_clients_heading'] ) || !empty( $fields['s1_clients_arrow_link'] ) ):?>
								<div class="white-bg grid-pattern br-12">
									<div class="section-top grid-x grid-padding-x align-middle">
										<?php if( !empty( $fields['s1_clients_heading'] ) ):?>
										<div class="cell small-12 medium-auto">
											<h4><?php echo esc_html( $fields['s1_clients_heading'] );?></h4>
										</div>
										<?php endif;?>
										<?php if( !empty( $fields['s1_clients_arrow_link'] ) ):
											$link = $fields['s1_clients_arrow_link'];
											$link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';
											?>
										<div class="cell small-12 medium-shrink">
											<a class="arrow-link grid-x align-middle" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
												<span><?php echo esc_html( $link_title ); ?></span>
												<?php get_template_part('template-parts/svg', 'arrow-violet');?>
											</a>
										</div>
										<?php endif;?>
										<hr>
									</div>
									<?php 
									$logos = $fields['s1_client_logos'];
									if( $logos ): ?>
									<div class="logos grid-x grid-padding-x align-spaced">
										<?php foreach( $logos as $logo ) {
											$imgID = $logo['logo']['ID'];
											$label = $logo['label'];										
											if( !empty( $logo ) ) {
												$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
												$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
												echo '<div class="logo-wrap cell small-6 tablet-shrink text-center">';
												echo $img;
												echo '<div class="label">' . $label . '</div>';
												echo '</div>';
											}
										};?>
									</div>
									<?php endif; ?>
								</div>
								<?php endif; ?>
							</div>
						</div>
						<?php endif; ?>
						
						<?php if( !empty( $fields['s2_section_title'] ) || !empty( $fields['s2_copy_heading'] ) || !empty( $fields['s2_copy'] ) || !empty( $fields['s2_image'] ) || !empty( $fields['s2_student_success_heading'] ) || !empty( $fields['s2_student_success_copy'] ) ):?>
						<div class="section s2">
							<?php if( !empty( $fields['s2_section_title'] ) || !empty( $fields['s2_copy_heading'] ) || !empty( $fields['s2_copy'] ) || !empty( $fields['s2_image'] ) ):?>
							<div class="white-bg">
								<div class="grid-container">
									<div class="grid-x grid-padding-x">
										<?php if( !empty($fields['s2_section_title']) ):?>
										<div class="cell small-12 medium-3 tablet-2">
											<div class="grid-x align-middle">
												<?php get_template_part('template-parts/svg', 'number-two', '');?>
												<svg width="30" height="1" viewBox="0 0 30 1" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M29 0.5H1" stroke="#1B1B1B" stroke-linecap="square"/></svg>
												<h2 class="h5">
													<?php echo esc_attr( $fields['s2_section_title'] );?>
												</h2>
											</div>
										</div>
										<?php endif; ?>
										<?php if( !empty( $fields['s2_copy_heading'] ) || !empty( $fields['s2_copy'] ) || !empty( $fields['s2_image'] ) ):?>
										<div class="cell small-12 medium-9 tablet-10">
											<div class="copy-image grid-x grid-padding-x tablet-flex-dir-row-reverse align-right">
												<?php if( !empty( $fields['s2_image'] ) ) {
													$imgID = $fields['s2_image']['ID'];
													$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
													$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "", "alt"=>$img_alt] );
													echo '<div class="cell small-12 tablet-6 tablet-offset-1 img-wrap">';
													echo $img;
													echo '</div>';
												}?>
												<?php if( !empty( $fields['s2_copy_heading'] ) || !empty( $fields['s2_copy'] ) ):?>
													<div class="cell small-12 tablet-5 xlarge-4">
													<?php if( !empty( $fields['s2_copy_heading'] ) ) {
														echo '<h2>' . esc_attr( $fields['s2_copy_heading'] ) . '</h2>';
													};?>
													<?php if( !empty( $fields['s2_copy'] ) ) {
														echo '<div>' . $fields['s2_copy'] . '</div>';
													};?>
													</div>
												<?php endif; ?>
											</div>
										</div>
										<?php endif; ?>
									</div>
								</div>
							</div>	
							<?php endif; ?>
							<div class="grid-container">
								
							</div>
						</div>
						<?php endif; ?>
					</section> <!-- end article section -->
					
					<footer class="article-footer">
					</footer> <!-- end article footer -->
						
				</article><!-- #post-<?php the_ID(); ?> -->
		
			</main><!-- #main -->
				
		</div>
	</div>

<?php
get_footer();