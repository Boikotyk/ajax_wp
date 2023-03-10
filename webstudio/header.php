<!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <?php wp_head(); ?>

</head>

<body>
    <header class="main__header">
        <div class="container">
            <div class="header__content">
                <?php $custom_logo_url = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full'); ?>
                <div class="logo">
                    <a href="<?php echo home_url('/'); ?>" class="logo_link">
                        <img src="<?php echo $custom_logo_url[0]; ?>" alt="company logo" class="logo_img">
                    </a>
                </div>
                <nav class="main__nav">
                    <div class="menu__box">
                        <div class="main__nav_overlay"></div>
                        <div class="menu__box__inner">
                            <div class="main__nav_inner_top">
                                <?php
                                wp_nav_menu(array(
                                    'menu_class' => 'main__menu',
                                    'menu'            => 'top',
                                    'container'       => 'ul',
                                    'theme_location'  => 'top',
                                    'link_class'   => 'menu__item',
                                ));
                                ?>
                            </div>
                            <div class="contact_info mob">
                                <?php if (!empty(get_field('email', 'option'))) { ?>
                                    <a href="mailto:<?php the_field('email', 'option'); ?>" class="info_mail"><?php the_field('email', 'option'); ?></a>
                                <?php } ?>
                                <?php if (!empty(get_field('tel', 'option'))) { ?>
                                    <a href="tel:<?php trim(str_replace(" ", "", the_field('tel', 'option')));; ?>" class="info_mail"> <?php the_field('tel', 'option'); ?></a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </nav>
                <?php if (have_rows('contact_info', 'option')) : ?>
                    <?php while (have_rows('contact_info', 'option')) : the_row(); ?>
                        <?php the_sub_field('link'); ?>
                    <?php endwhile; ?>
                <?php else : ?>
                    <?php // no rows found 
                    ?>
                <?php endif; ?>
                <div class="contact_info desctop">
                    <?php if (!empty(get_field('email', 'option'))) { ?>
                        <a href="mailto:<?php the_field('email', 'option'); ?>" class="info_mail"><?php the_field('email', 'option'); ?></a>
                    <?php } ?>
                    <?php if (!empty(get_field('tel', 'option'))) { ?>
                        <a href="tel:<?php trim(str_replace(" ", "", the_field('tel', 'option')));; ?>" class="info_mail"> <?php the_field('tel', 'option'); ?></a>
                    <?php } ?>
                </div>

                <div class="hamburger">
                    <div class="hamburger__inner">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
    </header>