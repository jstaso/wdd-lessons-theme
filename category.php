<?php get_header(); ?>
<main id="content">
    <div class='container'>
        
        <h1 class="category-title"><?php single_term_title(); ?></h1>
        <?php
        $category = single_term_title("", false);
        $args = array('category_name' => $category, 'orderby'=> array('menu_order'=>'ASC'));
        $the_query = new WP_Query($args);
        if ($the_query->have_posts()) {
            echo '<ol class="module-links">';
            while ($the_query->have_posts()) {
                $the_query->the_post();
                $title = get_the_title();                
                echo '<li><a href="' . get_the_permalink() . '">' . $title . '</a></li>';
            }
            echo '</ol>';
        /*
        $tags = ['week-1', 'week-2', 'week-3', 'week-4', 'week-5'];
        $category = single_term_title("", false);

        foreach ($tags as $i => $post_tag) {
            $args = array('category_name' => $category, 'tag' => $post_tag, 'orderby'=>array('title'=>'ASC'));
            $the_query = new WP_Query($args);

            echo "<h2>Week " . (++$i) . "</h2>";
            echo "<div class='week-wrapper'>";
            if ($the_query->have_posts()) {
                echo '<ol class="module-links">';
                while ($the_query->have_posts()) {
                    $the_query->the_post();
                    $title = get_the_title();
                    $title = explode("#", $title); 
                    echo '<li><a href="' . get_the_permalink() . '">' . $title[1] . '</a></li>';
                }
                echo '</ul>';
            } else {
                // no posts found
            }
            echo "</div>";            
            wp_reset_postdata();
            */
        }
        ?>


    </div>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>