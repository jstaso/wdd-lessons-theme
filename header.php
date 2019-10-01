<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="wrapper" class="hfeed">
        <header id="header">
            <div class='container'>
                <div id="branding">                    
                    <?php 
                        if( is_front_page() ){
                            echo "<h1 id='site-title'><a href=''>" . get_bloginfo('name') . '</a></h1>';                            
                        }else{
                            echo "<p id='site-title'><a href='".get_bloginfo('url')."'>" . get_bloginfo('name') . '</a></p>';                            
                        }
                    ?>
                </div>
                <nav id="menu">
                    <!--<div id="search"><?php get_search_form(); ?></div>-->
                    <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
                </nav>
                <?php echo "<a class='print-btn' href='".get_bloginfo('url')."/print.php'>Print</a>"; ?>
            </div>
        </header>
        <div id="container">