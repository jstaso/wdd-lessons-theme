<?php
add_action('after_setup_theme', 'blankslate_setup');
function blankslate_setup()
{
    load_theme_textdomain('blankslate', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form'));
    global $content_width;
    if (!isset($content_width)) {
        $content_width = 1920;
    }
    register_nav_menus(array('main-menu' => esc_html__('Main Menu', 'blankslate')));
}
add_action('wp_enqueue_scripts', 'blankslate_load_scripts');



function typed_init()
{
    echo "<script>
	jQuery(function($){  
            if($('body').hasClass('single')){ 

                //create index 
                const titles = document.querySelectorAll('h2');                            
                let indexList = document.createElement('ol');                
                $.each(titles, function(index, title){
                    let indexLink = document.createElement('li');                    
                    $(indexLink)
                        .append('<a href=\"\">'+$(title).html()+'</a>')
                        .click(function(e){
                            e.preventDefault();
                            changeModule(index);
                        })                        
                    $(indexList)
                        .append(indexLink)
                        .addClass('index-list');                        
                });            
                
                
                //fix the try-it-out sections
                $('h4').each(function(index, heading){
                    if($(heading).html() == 'Try it Out'){
                        $(heading).next('ol').addClass('try-it-out');
                    }
                });

                
                const content = $('.entry-content').html().split('<h2>')
                content.shift();
                $('.entry-content').html('')
            
            function createButtons(id, place){
                let btnWrapper = document.createElement('div');
                
                //prevBtn				
                let prevBtn = document.createElement('button');
                
                if (id >= 1){                    
                    $(prevBtn).html('Back')
                        .addClass('btn btn-primary-outline')
                }else{
                    let link = $('.category-name-breadcrumb').attr('href');
                    prevBtn = document.createElement('a');
                    $(prevBtn).html('Index')
                        .attr('href', link)
                        .addClass('btn btn-done')
                }
                $(prevBtn).click(function(){
                    changeModule(id-1)
                })				
				
                let nextBtn = document.createElement('button');                
                if(id+1 >= content.length){
                    nextBtn = document.createElement('a');
                    let link = $('.category-name-breadcrumb').attr('href');
                    $(nextBtn).html('Index')
                        .attr('href', link)
                        .addClass('btn btn-done');                    
                }else{                    
                    $(nextBtn).html('Next') 
                        .addClass('btn btn-primary-outline') 
                        .click(function(){
                            changeModule(id+1)
                        })                 
                }

                if (place == 'append'){
                    let progressBar = document.createElement('div');
                    let innerBar = document.createElement('div');  
                    let progressPercent = document.createElement('span');
                    
                    let percent = Math.floor(((id+1) / content.length) * 100);

                    $(btnWrapper).addClass('btn-wrapper after')
                    .append([ 
                           prevBtn,
                           $(progressBar).addClass('progress-bar')
                            .append([
                                $(innerBar).addClass('progress-bar-inner')
                                    .css('width', percent + '%'),
                                $(progressPercent).addClass('progress-bar-percent')
                                    .html(percent + '%')
                            ]),
                           nextBtn
                    ])                    
                    $('.entry-content').append(btnWrapper);

                }else{
                    let lessonName = $('.lesson-name').html();                    
                    $('.lesson-name').remove()
                    $(btnWrapper).addClass('btn-wrapper').addClass('before')                    
                    .append([
                        $(btnWrapper).append(prevBtn),
                        $(btnWrapper).append(`<h2 class='lesson-name'>`+lessonName+`</h2>`),
                        $(btnWrapper).append(nextBtn)
                    ])  
                    $('.entry-content').prepend(btnWrapper);
                }
            }
			
			function changeModule(id){
                if (id >= content.length || id < 0){

                }else{
                    $('.entry-content').html('<h2 class=\"lesson-name\">' + content[id])
                    
                    let lessonName = $('.lesson-name').html()
                    $('.lesson-name-breadcrumb').html(lessonName + ` (` + (id+1) + `/` + content.length + `)`);   


                    createButtons(id, 'append');
                    createButtons(id, 'prepend');
                }
			}
            changeModule(0);            
            //$('.entry-content').html(indexList);

            $('.module-name-breadcrumb').click(function(e){
                e.preventDefault();
                $('.lesson-name-breadcrumb').html('');
                $('.entry-content').html(indexList);
                $(indexList).before('<h2>'+$('.module-name-breadcrumb').html()+'</h2>');
            })            

        }

       




	});
    </script>";
}
add_action('wp_footer', 'typed_init');


function blankslate_load_scripts()
{
    wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900|Source+Code+Pro&display=swap', false);
    wp_enqueue_style('blankslate-style', get_stylesheet_uri());
    wp_enqueue_style('main-style', '/wp-content/themes/blankslate/main.css');
    wp_enqueue_script('jquery');
}
add_action('wp_footer', 'blankslate_footer_scripts');
function blankslate_footer_scripts()
{
    ?>
    <script>
        jQuery(document).ready(function($) {
            var deviceAgent = navigator.userAgent.toLowerCase();
            if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
                $("html").addClass("ios");
                $("html").addClass("mobile");
            }
            if (navigator.userAgent.search("MSIE") >= 0) {
                $("html").addClass("ie");
            } else if (navigator.userAgent.search("Chrome") >= 0) {
                $("html").addClass("chrome");
            } else if (navigator.userAgent.search("Firefox") >= 0) {
                $("html").addClass("firefox");
            } else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
                $("html").addClass("safari");
            } else if (navigator.userAgent.search("Opera") >= 0) {
                $("html").addClass("opera");
            }
        });
    </script>
<?php
}
add_filter('document_title_separator', 'blankslate_document_title_separator');
function blankslate_document_title_separator($sep)
{
    $sep = '|';
    return $sep;
}
add_filter('the_title', 'blankslate_title');
function blankslate_title($title)
{
    if ($title == '') {
        return '...';
    } else {
        return $title;
    }
}
add_filter('the_content_more_link', 'blankslate_read_more_link');
function blankslate_read_more_link()
{
    if (!is_admin()) {
        return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">...</a>';
    }
}
add_filter('excerpt_more', 'blankslate_excerpt_read_more_link');
function blankslate_excerpt_read_more_link($more)
{
    if (!is_admin()) {
        global $post;
        return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">...</a>';
    }
}
add_filter('intermediate_image_sizes_advanced', 'blankslate_image_insert_override');
function blankslate_image_insert_override($sizes)
{
    unset($sizes['medium_large']);
    return $sizes;
}
add_action('widgets_init', 'blankslate_widgets_init');
function blankslate_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar Widget Area', 'blankslate'),
        'id' => 'primary-widget-area',
        'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));
}
add_action('wp_head', 'blankslate_pingback_header');
function blankslate_pingback_header()
{
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
    }
}
add_action('comment_form_before', 'blankslate_enqueue_comment_reply_script');
function blankslate_enqueue_comment_reply_script()
{
    if (get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
function blankslate_custom_pings($comment)
{
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}
add_filter('get_comments_number', 'blankslate_comment_count', 0);
function blankslate_comment_count($count)
{
    if (!is_admin()) {
        global $id;
        $get_comments = get_comments('status=approve&post_id=' . $id);
        $comments_by_type = separate_comments($get_comments);
        return count($comments_by_type['comment']);
    } else {
        return $count;
    }
}

@ini_set('upload_max_size', '64M');
@ini_set('post_max_size', '64M');
@ini_set('max_execution_time', '300');
