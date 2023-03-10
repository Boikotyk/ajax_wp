<?php
require_once("assets/inc/scripts-and-styles.php");
require_once('assets/inc/post-types.php');

function theme_setup()
{
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    register_nav_menus(array(
        'top'    => 'Top Menu',
    ));
}
add_action('after_setup_theme', 'theme_setup');


add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init()
{

    if (function_exists('acf_add_options_page')) {

        $option_page = acf_add_options_page(array(
            'page_title'    => __('Header and Footer Settings'),
            'menu_title'    => __('Header and Footer'),
            'menu_slug'     => 'general-theme-settings',
            'capability'    => 'edit_posts',
            'redirect'      => false,
            'position' => '15',
            'parent_slug'   => ''
        ));
    }
}

function add_menu_link_class($atts, $item, $args)
{
    if (property_exists($args, 'link_class')) {
        $atts['class'] = $args->link_class;
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_menu_link_class', 1, 3);


function disable_content_editor()
{
    if (isset($_GET['post'])) {
        $post_ID = $_GET['post'];
    } else if (isset($_POST['post_ID'])) {
        $post_ID = $_POST['post_ID'];
    }

    if (!isset($post_ID) || empty($post_ID)) {
        return;
    }
    $page_template = get_post_meta($post_ID, '_wp_page_template', true);
    if ($page_template == 'template-home.php') {
        remove_post_type_support('page', 'editor');
    }
}
add_action('admin_init', 'disable_content_editor');


function my_deregister_scripts()
{
    wp_deregister_script('wp-embed');
}

/*
 ==================
 Ajax Post Type
======================	 
*/

add_action('wp_ajax_myfilter', 'true_filter_function');
add_action('wp_ajax_nopriv_myfilter', 'true_filter_function');

function true_filter_function()
{

    get_template_part('templates/news', 'list');
    die();
}
/*
 ==================
 Ajax Search
======================	 
*/

add_action('wp_ajax_data_fetch', 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch', 'data_fetch');
function data_fetch()
{
    $args = array(
        'posts_per_page' => -1,
        's' => esc_attr($_POST['keyword']),
        'post_type' => array('news')
    );

    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        echo '<ul class="search_list">';
        while ($the_query->have_posts()) {
            $the_query->the_post();
            echo ' <a href="' . esc_url(post_permalink()) . '">';
            echo ' <li class="search_list_item">' . get_the_title() . '</li>';
            echo ' </a>';
        }
        echo '</ul>';
        wp_reset_postdata();
    };
    die();
}

/*
 ==================
 Ajax Loadmore
======================	 
*/
function news_loadmore_ajax_handler()
{

    $args = json_decode(stripslashes($_POST['query']), true);
    $args['paged'] = $_POST['page'] + 1;
    $args['post_status'] = 'publish';
    $args['post_type'] = 'news';

    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) { ?>
        <div class="news_wrapper">
            <?php while ($the_query->have_posts()) {
                $the_query->the_post(); ?>
                <div class="news_item">
                    <a href="<?php echo get_permalink(); ?>">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php the_title(); ?>" class="news_img">
                        <div class="text_box">
                            <div class="news_title"><?php the_title(); ?></div>
                            <div class="news_cat">
                                <?php
                                $terms = get_the_terms($post->ID, 'category_news');
                                foreach ($terms as $term) {
                                    echo $term->name;
                                }
                                ?>
                            </div>
                        </div>

                    </a>
                </div>
            <?php }

            wp_reset_postdata();

            ?>
        </div>
<?php  } else {
    }
    die;
}



add_action('wp_ajax_loadmore', 'news_loadmore_ajax_handler');
add_action('wp_ajax_nopriv_loadmore', 'news_loadmore_ajax_handler');
