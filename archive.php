<?php get_header(); ?>
<main id="content">
    <header class="header">
        <h1 class="entry-title"><?php post_type_archive_title(); ?></h1>
        <div class="archive-meta"><?php if ('' != the_archive_description()) {
                                        echo esc_html(the_archive_description());
                                    } ?></div>
    </header>
    <div class='container entry-content'>
       <h2><?php post_type_archive_title(); ?></h2>

        
        <?php 
        $post_type = post_type_archive_title('', false);
        $post_type = explode(' ', $post_type);
        $post_type = strtolower($post_type[0]);

        $args = array('post_type' => $post_type, 'orderby' => array('menu_order' => 'ASC'));

        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) {
            echo '<ol class="module-links">';
            while ($the_query->have_posts()) {
                $the_query->the_post();
                $title = get_the_title();
                echo '<li><a href="' . get_the_permalink() . '">' . $title . '</a></li>';
            }
            echo '</ol>';
        }
        ?>

        <!--<?php get_template_part('nav', 'below'); ?>-->
    </div>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>