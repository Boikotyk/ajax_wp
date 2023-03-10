<?php
/* Template Name:  Portfolio Page */ ?>

<?php get_header();
global $wp_query; ?>

<main>
    <section class="news">
        <div class="container">
            <div class="search_bar">
                <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" autocomplete="off" id="search_news">
                    <input type="text" name="s" placeholder="Search.." id="keyword" class="input_search">
                </form>
                <div class="search_result" id="datafetch">
                </div>
            </div>
            <div class="category_list">

                <form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
                    <?php
                    echo '<label class="car_label" for="news_all">Всі</label>';
                    echo '<input name="news[]" type="radio" id="news_all" value="news_all" checked="checked"/>';
                    if ($terms = get_terms(array('taxonomy' => 'category_news', 'orderby' => 'name'))) {

                        foreach ($terms as $term) {
                            echo '<label class="car_label" for="' . $term->slug . '">' . $term->name . '</label>';
                            echo '<input name="news[]" type="radio" id="' . $term->slug . '" value="' . $term->term_id . '"/>';
                        }
                    }

                    echo '<input type="hidden" name="action" value="myfilter">';

                    ?>
                </form>

            </div>
            <div id="response">

                <?php get_template_part('templates/news', 'list');
                ?>

            </div>

        </div>
        </div>

    </section>
</main>
<?php get_footer(); ?>