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
				
					<section id="next" class="entry-content" itemprop="text">
						
						<?php if( !empty($fields['s1_section_title']) || !empty($fields['s1_left_column_copy']) || !empty($fields['s1_right_column']) || !empty($fields['s1_service_ctas']) || !empty($fields['s1_map_background_image']) || !empty($fields['s1_facts_figures']) || !empty($fields['s1_client_logos']) ):?>
						<div class="section s1">
							<div class="grid-container">
								
								<?php if( !empty($fields['s1_section_title']) || !empty($fields['s1_left_column_copy']) || !empty($fields['s1_right_column']) ):?>
								<div class="s1-first grid-x grid-padding-x">
									<?php if( !empty($fields['s1_section_title']) ):?>
									<div class="cell small-12 medium-3 tablet-2">
										<div class="grid-x align-middle nowrap section-header">
											<?php get_template_part('template-parts/svg', 'number-one', '');?>
											<svg width="30" height="1" viewBox="0 0 30 1" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M29 0.5H1" stroke="#1B1B1B" stroke-linecap="square"/></svg>
											<h2 class="h4 mb-0">
												<?php echo esc_attr( $fields['s1_section_title'] );?>
											</h2>
										</div>
									</div>
									<?php endif;?>
									<?php if( !empty($fields['s1_left_column_copy']) || !empty($fields['s1_right_column']) || !empty($fields['s1_service_ctas']) ):?>
										<div class="columns-ctas-wrap cell small-12 medium-9 tablet-10">
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
																<a class="cta-link has-bg has-arrow-link d-block make-square color-white" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
															<?php endif;?>
																<?php if( !empty( $image ) ) {
																	$imgID = $image['ID'];
																	$img_alt = trim( strip_tags( get_post_meta( $imgID, '_wp_attachment_image_alt', true ) ) );
																	$img = wp_get_attachment_image( $imgID, 'full', false, [ "class" => "object-fit cover", "alt"=>$img_alt] );
																	echo $img;
																	echo '<div class="mask bg"></div>';
																}?>
															<?php if( $link ):
																$link_title = $link['title'];
															?> 
																	<div class="relative text-wrap">
																		<h3><?php echo esc_html( $link_title );?></h3>
																		<div class="arrow-link grid-x align-middle">
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
										<div class="inner has-bg inner has-bg grid-x align-middle align-center">
											<?php if( !empty($fields['s1_map_background_image']) ):?>
											<div class="bg" style="background-image: url(<?php echo esc_url($fields['s1_map_background_image']['url']); ?>);"></div>
											<?php endif;?>
											<?php if( !empty($fields['s1_facts_figures']) ):
												$s1_facts_figures = $fields['s1_facts_figures'];
											?>
											<div class="cell small-12 tablet-10 xlarge-9 ff-wrap white-bg br-12 relative">
												<div class="grid-x grid-padding-x">
													<?php foreach($s1_facts_figures as $s1_facts_figure):
														$figure = $s1_facts_figure['figure'];
														$label = $s1_facts_figure['label'];
													?>
													<div class="single-ff cell small-12 medium-6 tablet-3 text-center relative">
														<?php if( !empty($figure) ):?>
															<div class="figure"><?php echo esc_attr( $figure );?></div>
														<?php endif;?>
														<?php if( !empty($label) ):?>
															<div class="label h6"><?php echo esc_attr( $label );?></div>
														<?php endif;?>
														<div class="border yellow-bg"></div>
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
								<div class="clients white-bg grid-pattern granite br-12">
									<div class="section-top grid-x grid-padding-x align-middle">
										<?php if( !empty( $fields['s1_clients_heading'] ) ):?>
										<div class="cell small-12 medium-auto">
											<h4 class="m-0"><?php echo $fields['s1_clients_heading'];?></h4>
										</div>
										<?php endif;?>
										<?php if( !empty( $fields['s1_clients_arrow_link'] ) ):
											$link = $fields['s1_clients_arrow_link'];
											$link_url = $link['url'];
											$link_title = $link['title'];
											$link_target = $link['target'] ? $link['target'] : '_self';
											?>
										<div class="cell small-12 medium-shrink">
											<a class="arrow-link grid-x align-middle grid-x align-middle" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
												<span><?php echo esc_html( $link_title ); ?></span>
												<?php get_template_part('template-parts/svg', 'arrow-violet');?>
											</a>
										</div>
										<?php endif;?>

									</div>
									<div class="grid-x grid-padding-x">
										<div class="cell small-12">
											<hr class="yellow m-0">
										</div>
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
												echo '<div class="logo-wrap cell small-6 medium-4 tablet-4 xlarge-shrink text-center">';
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
							<div class="white-bg module-padding">
								<div class="grid-container">
									<div class="grid-x grid-padding-x">
										<?php if( !empty($fields['s2_section_title']) ):?>
										<div class="cell small-12 medium-3 tablet-2">
											<div class="grid-x align-middle nowrap section-header">
												<?php get_template_part('template-parts/svg', 'number-two', '');?>
												<svg width="30" height="1" viewBox="0 0 30 1" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M29 0.5H1" stroke="#1B1B1B" stroke-linecap="square"/></svg>
												<h2 class="h4 mb-0">
													<?php echo $fields['s2_section_title'];?>
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
													echo '<div class="cell small-12 tablet-6 tablet-offset-1">';
													echo '<div class="img-wrap br-12 relative">';
													echo $img;
													echo '<div class="mask grid-pattern white over-image"></div>';
													echo '</div>';
													echo '</div>';
												}?>
												<?php if( !empty( $fields['s2_copy_heading'] ) || !empty( $fields['s2_copy'] ) ):?>
													<div class="first-left cell small-12 tablet-5 xlarge-4">
													<?php if( !empty( $fields['s2_copy_heading'] ) ) {
														echo '<h2>' . esc_attr( $fields['s2_copy_heading'] ) . '</h2>';
													};?>
													<?php if( !empty( $fields['s2_copy'] ) ) {
														echo '<div>' . $fields['s2_copy'] . '</div>';
													};?>
													<?php 
													$link = $fields['s2_button_link'];
													if( $link ): 
														$link_url = $link['url'];
														$link_title = $link['title'];
														$link_target = $link['target'] ? $link['target'] : '_self';
														?>
													<div class="btn-wrap">
														<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
													</div>
													<?php endif; ?>
													</div>
												<?php endif; ?>

											</div>
										</div>
										<?php endif; ?>
									</div>
								</div>
							</div>	
							<?php endif; ?>
							<?php if( !empty( $fields['news_cta'] ) ) {
								get_template_part('template-parts/part', 'news-cta', 
									array(
										'news-cta' => $fields['news_cta'],
									)
								);
							}?>
						</div>
						<?php endif; ?>

						
						<?php if( !empty($fields['s3_section_title']) || !empty( $fields['eyebrowheading_left_copy_right'] ) || !empty( get_field('image_and_l-a-n-a', 'option') ) || !empty(get_field('img-lana_leadership_text', 'option') ) ):?>
						<div class="section s3 white-bg module-padding">
							<div class="grid-container">

								<?php if( !empty($fields['s3_section_title']) || !empty( $fields['eyebrowheading_left_copy_right'] ) || !empty(get_field('img-lana_image', 'option') ) ):?>
								<div class="grid-x grid-padding-x">
									<?php if( !empty($fields['s3_section_title']) ):?>
									<div class="cell small-12 medium-3 tablet-2">
										<div class="grid-x align-middle nowrap section-header">
											<?php get_template_part('template-parts/svg', 'number-three', '');?>
											<svg width="30" height="1" viewBox="0 0 30 1" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M29 0.5H1" stroke="#1B1B1B" stroke-linecap="square"/></svg>
											<h2 class="h4 mb-0">
												<?php echo $fields['s3_section_title'];?>
											</h2>
										</div>
									</div>
									<?php endif;?>
									<?php if( !empty($fields['s1_left_column_copy']) || !empty($fields['s1_right_column']) || !empty($fields['s1_service_ctas']) ):?>
										<div class="cell small-12 medium-9 tablet-10">
											<?php if( !empty( $fields['eyebrowheading_left_copy_right'] ) ) {
												get_template_part('template-parts/part', 'eyebrowheading_left_copy_right', 
													array(
														'eyebrowheading_left_copy_right' => $fields['eyebrowheading_left_copy_right'],
													)
												);
											};?>
										</div>
									<?php endif;?>
								</div>
								<?php endif;?>
							</div>
								
								<?php if( !empty( get_field('image_and_l-a-n-a', 'option') ) ):
									$image_and_lana = get_field('image_and_l-a-n-a', 'option');

									get_template_part('template-parts/part', 'image_and_lana',
										array(
											'image_and_lana' => $image_and_lana,
											'alignment' => 'align-right',
										)
									);

								endif;?>
								
						</div>
						<?php endif;?>
						
					</section> <!-- end article section -->
					
					<footer class="article-footer">
					</footer> <!-- end article footer -->
						
				</article>
		
			</main><!-- #main -->
				
		</div>
	</div>

<?php
get_footer();