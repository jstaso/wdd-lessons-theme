<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header>
    <?php if ( is_singular() ) {
        echo '<h1 class="entry-title sr-only">' . get_the_title() . '</h1>';
    ?>
        <div class='breadcrumbs container'>
            <?php            
            $categoryName = get_post_type($post_id);
            $categoryLink = get_bloginfo('url') . '/' . $categoryName;
            $moduleName = get_the_title();            

            echo "<a class='category-name-breadcrumb' href='$categoryLink'>".strtoupper($categoryName)."</a> > <a class='module-name-breadcrumb' href='#'>$moduleName</a> > <span class='lesson-name-breadcrumb'></span>";
            
            ?>
        </div>
    <?php
    } else {
        echo '<h2 class="entry-title sr-only">' . get_the_title() . '</h2>';
    } 
    ?>
    </header>

    
<?php get_template_part( 'entry', ( is_front_page() || is_home() || is_front_page() && is_home() || is_archive() || is_search() ? 'summary' : 'content' ) ); ?>
<?php if ( is_singular() ) { get_template_part( 'entry-footer' ); } ?>
</article>