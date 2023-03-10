<?php get_header(); ?>
<div id="sub__main" class="fireside" data-barba="container" data-barba-namespace="case-bridgeport" data-page="case">
	<?php if ( have_rows( 'flexibel_section' ) ): ?>
        <?php while ( have_rows( 'flexibel_section' ) ) : the_row(); ?>
        	<?php if ( get_row_layout() == 'case_intro' ) : ?>
				<section class="case__intro case__intro__lvl2  fullview dark <?php if ( get_sub_field( 'title_black_color' ) == 1 ) { ?> text__black <?php } ?>">
					<div class="color__trigger"></div>
					<div class="case__intro_overlay fullview__overlay" style="background-image: url('<?php the_sub_field( 'bg_image' ); ?>');"></div>
					<div class="case__intro_content fullview__content container">
						<div class="case__intro_content__wrapper">
							<div class="logo__wrapper">
                                <?php if ( get_sub_field( 'logo_image' ) ) { ?>
                                    <img src="<?php echo esc_url(get_sub_field( 'logo_image' )['url']); ?>" alt="<?php echo esc_attr(get_sub_field( 'logo_image' )['alt']); ?>" class="logo__img"/>
                                <?php } ?>
							</div>
							<h1 class="section__title blend"><?php echo the_title(); ?></h1>
							<h6 class="section__subtitle"><?php the_sub_field( 'subtitle' ); ?></h6>
						</div>
                        <?php if(!empty(get_sub_field( 'bg_video' ))){?>
                            <div class="button__wrapper">
                                <a href="#case" class="modal__open video__btn" data-video-name="<?php the_sub_field( 'bg_video' ); ?>"><?php _e('Watch Video');?></a>
                            </div>
                        <?php } ?>
					</div>
				</section>
			<?php elseif ( get_row_layout() == 'case_reviews' ) : ?>
				<section class="case__reviews fullview curtain"  data-pinspacing="0">
					<div class="container">
						<div class="case__reviews_inner">
							<div class="case__reviews_inner__row">
								<div class="case__reviews_info_col">
									<?php if ( have_rows( 'case__reviews_info_item' ) ) : ?>
                                        <?php while ( have_rows( 'case__reviews_info_item' ) ) : the_row(); ?>  
											<div class="case__reviews_info_item">
												<h6 class="case__reviews_info_item_title"><?php the_sub_field( 'title' ); ?></h6>
												<p><?php the_sub_field( 'value' ); ?></p>
											</div>
										<?php endwhile; ?>
                                    <?php endif; ?>
								</div>
								<div class="case__reviews_text_col">
                                    <?php the_sub_field( 'description' ); ?>
                                    <?php $link = get_sub_field( 'link' ); ?>
                                    <?php if (!empty($link) ) { ?>
                                        <a target="_blank" href="<?php echo $link['url']; ?>" class="go" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?><img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-right.svg" alt="icon"></a>
                                    <?php } ?>
                                </div>
							</div>
					</div>
				</section>
			<?php elseif ( get_row_layout() == 'product' ) : ?>
				<section class="product dark color__trigger">
					<div class="product__overlay" style="background-image: url('<?php the_sub_field( 'bg_image' ); ?>');"></div>
					<div class="product__video">
						<div class="container">
							<div class="product__video__inner">
								<div class="product__video__wrapper" <?php if ( get_sub_field( 'video' ) ) { ?> style="background-image: url('<?php the_sub_field( 'video' ); ?>');"<?php } ?>>
                                    <?php if (empty(get_sub_field( 'video_url' ))  ) { ?>
									   <div class="product__video__img"  style="background-image: url('<?php the_sub_field( 'video_image' ); ?>');" ></div>
                                    <?php } else{ ?>
                                        <video data-v-30e74b47="" autoplay="autoplay" loop="loop" muted="muted" playsinline class="video">
                                            <source data-v-30e74b47="" src="<?php the_sub_field( 'video_url' ); ?>" type="video/mp4">
                                        </video>
                                    <?php } ?>
									
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php elseif ( get_row_layout() == 'section_image' ) : ?>
				<section class="section__img">
					<div class="container">
						<div class="section__img__inner">
							<?php $gallery_images = get_sub_field( 'gallery_image' ); ?>
							<?php if ( $gallery_images ) :  ?>
								<?php foreach ( $gallery_images as $gallery_img ): ?>
									<div class="section__img__item">
										<img src="<?php echo $gallery_img['sizes']['large']; ?>" alt="<?php echo $gallery_img['alt']; ?>" />
									</div>
								<?php endforeach; ?>
							<?php endif; ?>
						</div>
					</div>
				</section>
            <?php elseif ( get_row_layout() == 'section_text_items' ) : ?>
                <section class="section__img__lvl2">
                    <div class="container">
                        <div class="section__img__inner">
                            <?php if ( have_rows( 'items' ) ): ?>
                                <?php while ( have_rows( 'items' ) ) : the_row(); ?>
                                    <?php if ( get_row_layout() == 'list' ) : ?>
                                        <div class="section__img__item ">
                                            <div class="section__img__item__top">
                                                <div class="left">
                                                    <?php if(!empty(get_sub_field( 'title' ))){?>
                                                        <h4><?php the_sub_field( 'title' ); ?></h4>
                                                    <?php } ?>
                                                    <ol>
                                                        <?php if ( have_rows( 'list_name' ) ) : ?>
                                                            <?php while ( have_rows( 'list_name' ) ) : the_row(); ?>
                                                                <li><?php the_sub_field( 'name' ); ?></li>
                                                                
                                                            <?php endwhile; ?>
                                                        <?php else : ?>
                                                            <?php // no rows found ?>
                                                        <?php endif; ?>
                                                    </ol>
                                                </div>
                                            </div>
                                            <div class="section__img__item__bottom">
                                            <?php $gallary_image_images_list = get_sub_field( 'gallary_image_list' ); ?>
                                            <?php if ( $gallary_image_images_list ) :  ?>
                                                <?php foreach ( $gallary_image_images_list as $gallary_image_image_list ): ?>
                                                        <img src="<?php echo $gallary_image_image_list['sizes']['thumbnail']; ?>" alt="<?php echo $gallary_image_image_list['alt']; ?>" />
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php elseif ( get_row_layout() == 'right' ) : ?>
                                        <div class="section__img__item col2">
                                            <div class="section__img__item__top">
                                                <div class="left">
                                                    <?php if(!empty(get_sub_field( 'title' ))){?>
                                                        <h4><?php the_sub_field( 'title' ); ?></h4>
                                                    <?php } ?>
                                                    <?php if(!empty(get_sub_field( 'text_left' ))){?>
                                                        <p><?php the_sub_field( 'text_left' ); ?></p>
                                                    <?php } ?>
                                                </div>
                                                <div class="right">
                                                <?php if ( have_rows( 'text' ) ) : ?>
                                                    <?php while ( have_rows( 'text' ) ) : the_row(); ?>
                                                        <div class="item">
                                                            <h6><?php the_sub_field( 'title' ); ?></h6>
                                                            <p><?php the_sub_field( 'text' ); ?></p>
                                                        </div>
                                                    <?php endwhile; ?>
                                                <?php else : ?>
                                                    <?php // no rows found ?>
                                                <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="section__img__item__bottom">
                                            <?php $gallary_image_images_right = get_sub_field( 'gallary_image_right' ); ?>
                                            <?php if ( $gallary_image_images_right ) :  ?>
                                                <?php foreach ( $gallary_image_images_right as $gallary_image_image_right ): ?>
                                                        <img src="<?php echo $gallary_image_image_right['sizes']['thumbnail']; ?>" alt="<?php echo $gallary_image_image_right['alt']; ?>" />
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php elseif ( get_row_layout() == 'text' ) : ?>
                                        <div class="section__img__item <?php if ( get_sub_field( 'title-text_right' ) == 1 ) { 
                                            ?>text__right<?php 
                                            } else { 
                                        
                                            } ?>">
                                            <div class="section__img__item__top">
                                                <div class="left">
                                                    <?php if(!empty(get_sub_field( 'title' ))){?>
                                                        <h4><?php the_sub_field( 'title' ); ?></h4>
                                                    <?php } ?>
                                                    <?php if(!empty(get_sub_field( 'text' ))){?>
                                                        <p><?php the_sub_field( 'text' ); ?></p>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="section__img__item__bottom">
                                            <?php $gallary_image_images_text = get_sub_field( 'gallary_image_text' ); ?>
                                            <?php if ( $gallary_image_images_text ) :  ?>
                                                <?php foreach ( $gallary_image_images_text as $gallary_image_image_text ): ?>
                                                        <img src="<?php echo $gallary_image_image_text['sizes']['thumbnail']; ?>" alt="<?php echo $gallary_image_image_text['alt']; ?>" />
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <?php // no layouts found ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php elseif ( get_row_layout() == 'block_gallery_phone' ) : ?>
                <section class="section__phone__lvl3">
                    <div class="container">
                        <div class="section__img__inner">
                            <?php $gallery_block_images = get_sub_field( 'gallery_block' ); ?>
                            <?php if ( $gallery_block_images ) :  ?>
                                <?php foreach ( $gallery_block_images as $gallery_block_image ): ?>
                                        <div class="section__img__item">
                                            <img src="<?php echo $gallery_block_image['sizes']['large']; ?>" alt="<?php echo $gallery_block_image['alt']; ?>" />
                                        </div> 
                                <?php endforeach; ?>
                            <?php endif; ?>                                                      
                        </div>
                    </div>
                </section>  
			<?php elseif ( get_row_layout() == 'section_phone_image' ) : ?>
				<section class="section__phone dark color__trigger">
					<div class="container">
						<div class="section__phone__inner">
							<div class="section__phone__items">
								<?php $gallery_images_phone = get_sub_field( 'gallery_phone' ); ?>
								<?php if ( $gallery_images_phone ) :  ?>
									<?php foreach ( $gallery_images_phone as $gallery_image_phone ): ?>
										<div class="section__phone__item">
											<div class="section__phone__img">
												<img src="<?php echo $gallery_image_phone['sizes']['large']; ?>" alt="<?php echo $gallery_image_phone['alt']; ?>" />
											</div>
										</div>
									<?php endforeach; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</section>
            <?php elseif ( get_row_layout() == 'section_phone' ) : ?>
                <section class="section__phonelvl2 dark color__trigger">
                    <div class="container">
                        <div class="section__phone__inner">
                            <div class="section__phone__items">
                                <?php if ( have_rows( 'items' ) ) : ?>
                                    <?php while ( have_rows( 'items' ) ) : the_row(); ?>
                                        <div class="section__phone__item">
                                            <div class="section__phone__item__box">
                                                <div class="media-box__device">
                                                    <div class="media-box__device-frame">
                                                        <?php if ( get_sub_field( 'image_frame' ) ) { ?>
                                                            <img src="<?php echo esc_url(get_sub_field( 'image_frame' )['url']); ?>" alt="<?php echo esc_attr(get_sub_field( 'image_frame' )['alt']); ?>" />
                                                        <?php } ?>
                                                    </div>
                                                    <div class="media-box__device-content">
                                                        <video playsinline="" autoplay="" muted="" loop="" poster="">
                                                            <source src="<?php the_sub_field( 'video' ); ?>" type="video/mp4;">
                                                        </video>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php else : ?>
                                    <?php // no rows found ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>


	        <?php elseif ( get_row_layout() == 'fullview' ) : ?>
                <section class="fullview zoom__out zoom__out__lvl2  dark color__trigger">
                    <div class="zoom__out_content container">
                        <div class="zoom__out_content_header">
                            <h2 class="section__title"><?php the_sub_field( 'title' ); ?></h2>
                            <!-- <img src="img/zoom-text.svg" alt="title" class="section__title"> -->
                        </div>
                        <div class="zoom__out_content_body">
                            <div class="zoom__out_content_body_left">
                                <div class="zoom__out_content_info">
                                    <h5 class="zoom__out_content_info_title"><?php the_sub_field( 'info_title' ); ?></h5>
                                    <ul class="items__list">
                                    <?php if ( have_rows( 'info_list' ) ) : ?>
                                        <?php while ( have_rows( 'info_list' ) ) : the_row(); ?>
                                            <li>
                                                <?php if ( get_sub_field( 'image' ) ) { ?>
                                                    <img src="<?php echo esc_url(get_sub_field( 'image' )['url']); ?>" alt="<?php echo esc_attr(get_sub_field( 'image' )['alt']); ?>" />
                                                <?php } ?>
                                                 <span><?php the_sub_field( 'name' ); ?></span>
                                            </li>
                                        <?php endwhile; ?>
                                    <?php else : ?>
                                        <?php // no rows found ?>
                                    <?php endif; ?>                                     
                                    </ul>
                                </div>
                            </div>
                            <div class="zoom__out_content_body_right">
                                <div class="zoom__out_content_info">
                                    <h5 class="zoom__out_content_info_title"><?php the_sub_field( 'content_info_title' ); ?></h5>
                                    <p><?php the_sub_field( 'content_info_description' ); ?></p>
                                </div>
                                <?php if ( have_rows( 'content_info_list' ) ) : ?>
                                    <?php while ( have_rows( 'content_info_list' ) ) : the_row(); ?>
                                        <div class="zoom__out_content_info stats">
                                            <h5 class="zoom__out_content_info_title"><?php the_sub_field( 'title' ); ?></h5>
                                        <?php if ( have_rows( 'stat' ) ) : ?>
                                            <?php while ( have_rows( 'stat' ) ) : the_row(); ?>
                                                <div class="stat__item">
                                                    <span class="stat__item_title"><?php the_sub_field( 'value' ); ?></span>
                                                    <span class="stat__item_divider"></span>
                                                    <span class="stat__item_description"><?php the_sub_field( 'name' ); ?></span>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php else : ?>
                                            <?php // no rows found ?>
                                        <?php endif; ?>
                                            
                                        </div>
                                    <?php endwhile; ?>
                                <?php else : ?>
                                <?php // no rows found ?>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>
            <?php elseif ( get_row_layout() == 'next' ) : ?>
                <?php get_template_part('templates/next', 'post');?>
            <?php elseif ( get_row_layout() == 'curtain' ) : ?>
                <section class="cta fullview curtain">
                    <div class="cta__content">
                        <div class="content__side left">
                            <div class="content__inner">
                                <h2 class="section__title">
                                    <?php the_sub_field( 'title' ); ?>
                                    <span class="clipped"><?php the_sub_field( 'clipped' ); ?></span>
                                </h2>
                            </div>
                        </div>
                        <div class="content__side right">
                            <div class="content__inner">

                                <div class="list__line">
                                    <h6 class="list__line_title"><?php the_sub_field( 'list_line_title' ); ?></h6>
                                    <ul class="contact__list tile__list">
                                        <?php get_template_part('templates/social', 'page');?>
                                    </ul>
                                </div>

                                <div class="divider"> <span><?php _e('or'); ?></span> </div>

                                <div class="action__line">
                                    <a href="javascript:void(0);" class="btn btn__motion brief__open">
                                        <span class="text"><?php the_sub_field( 'brief' ); ?></span>
                                        <span class="overlays">
                                            <i></i>
                                            <i></i>
                                            <i></i>
                                        </span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
                
            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>
    
</div>
<?php get_footer(); ?>