<?php get_header(); ?>
<main>
    <?php if (have_rows('home')) : ?>
        <?php while (have_rows('home')) : the_row(); ?>
            <?php if (get_row_layout() == 'hero') : ?>
                <section class="hero">
                    <div class="container">
                        <div class="hero_title">
                            <h1><?php the_sub_field('title'); ?></h1>
                            <?php $button = get_sub_field('button'); ?>
                            <?php if ($button) { ?>
                                <a href="<?php echo $button['url']; ?>" target="<?php echo $button['target']; ?>" class="hero_btn"><?php echo $button['title']; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                </section>
            <?php elseif (get_row_layout() == 'about_us') : ?>
                <section class="about_us">
                    <div class="container">
                        <div class="about_wrapper">
                            <?php if (have_rows('list')) : ?>
                                <?php while (have_rows('list')) : the_row(); ?>
                                    <div class="about_wrapper_list">
                                        <div class="list_title">
                                            <?php the_sub_field('title'); ?>
                                        </div>
                                        <div class="list_descr">
                                            <?php the_sub_field('description'); ?>
                                        </div>

                                    </div>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <?php // no rows found 
                                ?>
                            <?php endif; ?>
                        </div>
                        <h2 class="about_subtitle"><?php the_sub_field('subtitle'); ?></h2>
                        <div class="gallery_work">
                            <?php $gallery_work_images = get_sub_field('gallery_work'); ?>
                            <?php if ($gallery_work_images) :  ?>
                                <?php foreach ($gallery_work_images as $gallery_work_image) : ?>
                                    <img src="<?php echo $gallery_work_image['sizes']['large']; ?>" alt="<?php echo $gallery_work_image['alt']; ?>" />
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>
            <?php elseif (get_row_layout() == 'team') : ?>
                <section class="team">
                    <div class="container">
                        <h2><?php the_sub_field('title'); ?></h2>
                        <div class="team_wrapper">
                            <?php if (have_rows('team_iteams')) : ?>
                                <?php while (have_rows('team_iteams')) : the_row(); ?>
                                    <div class="team_items">
                                        <?php if (get_sub_field('image')) { ?>
                                            <img src="<?php the_sub_field('image'); ?>" />
                                        <?php } ?>
                                        <div class="personal_info">
                                            <div class="name"><?php the_sub_field('name'); ?></div>
                                            <div class="position"><?php the_sub_field('position'); ?></div>
                                        </div>

                                    </div>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <?php // no rows found 
                                ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </section>


            <?php endif; ?>
        <?php endwhile; ?>
    <?php else : ?>
        <?php // no layouts found 
        ?>
    <?php endif; ?>
</main>
<?php get_footer(); ?>