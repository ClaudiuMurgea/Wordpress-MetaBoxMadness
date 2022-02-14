<?php 

/* 
    ===========================================================
    Adding styles
    ===========================================================
*/
    function doyenne_files() {
        wp_enqueue_script('main-doyenne-js', get_theme_file_uri('/build/index.js'), NULL, '1.0', true);
        wp_enqueue_style('font-roboto', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
        wp_enqueue_style('font-wesome', "//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
        wp_enqueue_style('doyenne_main_styles',  get_stylesheet_uri());
    }

    add_action('wp_enqueue_scripts', 'doyenne_files');

    function doyenne_features() {
        add_theme_support('title-tag');
    }

    add_action('after_setup_theme', 'doyenne_features');

/* 
    ===========================================================
    Adding menu to appearence
    ===========================================================
*/
    
    function menus() {

        $locations = array(
            'primary' => "Desktop Primary Left Sidebar",
            'footer' => "Footer Menu Items"
        );
        register_nav_menus($locations);

    }

    add_action('init', 'menus');

/* 
===========================================================
    Adding menu to thumbnails to posts
===========================================================
*/
    add_theme_support( 'post-thumbnails' ); 


/* 
===========================================================
    Adding widgets to appearence
===========================================================
*/   
    register_sidebar(array(
        'name'          => __( 'Intro Widget', 'theme_text_domain' ),
        'id'            => 'intro-widget',
        'before_widget' => '<div class=intro-widget">',
        'after_widget'  => '</div>',
        ));
        
    
    function intro_widget() {
        if ( is_post_type_archive() && is_active_sidebar( 'intro-widget' ) ) { 
            dynamic_sidebar('intro-widget', array(
            'before' => '<div class="intro-widget">',
            'after' => '</div>',
            ) );
        }
    }
    add_action( 'loop_start', 'intro_widget' );


/* 
===========================================================
    Adding widgets to appearence
===========================================================
*/ 

    function create_posttype() {
        register_post_type( 'wpll_product',
            array(
            'labels' => array(
                'name' => __( 'Products' ),
                'singular_name' => __( 'Product' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'products'),
            )
        );
        }
    add_action( 'init', 'create_posttype' );

/* 
===========================================================
    Adding CTP to sidebar
===========================================================
*/ 

// function awesome_custom_post_type (){
//     $labelss = array(
//         'name' => 'Portofolio',
//         'singular_name' => 'Portofolio',
//         'add_new' => 'Add Item',
//         'all_items' => 'All Items',
//         'add_new_item' => 'Add Item',
//         'edit_item' => 'Edit Item',
//         'new_item' => 'New Item',
//         'view_item' => 'View Item',
//         'search_item' => 'Search Portofolio',
//         'not_found' => 'No items found',
//         'not_found_in_trash' => 'No items found in trash',
//         'parent_item_colon' => 'Parent Item'
//     ); 
//     $args = array(
//         'labels' => $labels,
//         'public' => true,
//         'has_archive' => true,
//         'publicly_queryable' => true,
//         'query_var' => true,
//         'rewrite' => true,
//         'capability_type' => 'post',
//         'hierarchical' => false,
//         'support' => array(
//             'title',
//             'editor',
//             'excerpt',
//             'thumbnail',
//             'revisions',
//         ),
//         'menu_position' => 5,
//         'exclude_from_search' => false,
//     );
//     register_post_type('portofolio', $args);
// }

// add_action('init', 'awesome_custom_post_type');


/* 
===========================================================
    Adding sidebar
===========================================================
*/ 

add_action( 'widgets_init', 'my_awesome_sidebar' );
function my_awesome_sidebar() {
  $args = array(
    'name'          => 'Contact Form',
    'id'            => 'contact-form',
    'description'   => 'The Awesome Sidebar is shown on the left hand side of blog pages in this theme',
    'class'         => '',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>' 
  );

  register_sidebar( $args );

}

/* 
===========================================================
    Adding pages metaboxes , page templates
===========================================================
*/ 

    add_filter( 'rwmb_meta_boxes', function ( $meta_boxes ) {


        // $meta_boxes[] = array(
        //     'title' => 'Company Branches',
        //     'post_types' => 'page',
        //     'fields' => array(
        //         array(
        //             'id'            => 'g1',
        //             'name'          => 'Branches',
        //             'type'          => 'group',
        //             'clone'         => 'true',
        //             'sort_clone'    => 'true',
        //             'group_title'   => array('field' => 'name'),
        //             'fields' => array(
        //                 array(
        //                     'name' => 'Name',
        //                     'id' => 'name',
        //                     'type' => 'text',
        //                 ),
        //                 array(
        //                     'name' => 'Address',
        //                     'id' => 'address',
        //                     'type' => 'text',
        //                 ),
        //             ),
        //         ),
        //     ),
        // );


        $meta_boxes[] = array(
            'title'      => 'First Hero Section',
            'post_types' => 'page',
            'fields'     => array(
                array(
                    'id'   => 'first_hero_title',
                    'name' => 'Title',
                    'type' => 'text',
                    'placeholder' => 'Max 100char',
                ),
                array(
                    'id'      => 'first_hero_desc',
                    'name'    => 'Description',
                    'type'    => 'wysiwyg',
                    'options' => array(
                        'teeny'         => true,
                        'media_buttons' => false,
                        'quicktags'     => false,
                    ),
                ),
                array(
                    'name'          => 'Description & Border Color',
                    'id'            => 'first_hero_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' )
                    ),
                ),
                array(
                    'name'          => 'Background Color',
                    'id'            => 'first_hero_background_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' ),
                    ),
                ),
                array(
                    'name'          => 'Button Color',
                    'id'            => 'first_hero_button_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' ),
                    ),
                ),
                array(
                    'id'   => 'first_hero_button_link',
                    'name' => 'Button Link',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'first_hero_button_text',
                    'name' => 'Button Text',
                    'type' => 'text',
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'      => 'Second Hero Section',
            'post_types' => 'page',
            'fields'     => array(
                array(
                    'id'   => 'second_hero_first_title',
                    'name' => 'Title',
                    'type' => 'text',
                ),
                array(
                    'id'      => 'second_hero_first_desc',
                    'name'    => 'Description',
                    'type'    => 'wysiwyg',
                    'options' => array(
                        'teeny'         => true,
                        'media_buttons' => false,
                        'quicktags'     => false,
                    ),
                ),
                array(
                    'id'   => 'second_hero_second_title',
                    'name' => 'Title',
                    'type' => 'text',
                ),
                array(
                    'id'      => 'second_hero_second_desc',
                    'name'    => 'Description',
                    'type'    => 'wysiwyg',
                    'options' => array(
                        'teeny'         => true,
                        'media_buttons' => false,
                        'quicktags'     => false,
                    ),
                ),
                array(
                    'id'   => 'second_hero_third_title',
                    'name' => 'Title',
                    'type' => 'text',
                ),
                array(
                    'id'      => 'second_hero_third_desc',
                    'name'    => 'Description',
                    'type'    => 'wysiwyg',
                    'options' => array(
                        'teeny'         => true,
                        'media_buttons' => false,
                        'quicktags'     => false,
                    ),
                ),
                array(
                    'name'          => 'Background Color',
                    'id'            => 'second_hero_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' )
                    ),
                ),
            ),
        );
    
        $meta_boxes[] = array(
            'title'      => 'First Section',
            'post_types' => 'page',
            'fields'     => array(
                array(
                    'id'   => 'first_section_title',
                    'name' => 'Title',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'first_section_subtitle',
                    'name' => 'Subtitle',
                    'type' => 'text',
                ),
                array(
                    'id'      => 'first_section_desc',
                    'name'    => 'Description',
                    'type'    => 'wysiwyg',
                    'options' => array(
                        'teeny'         => true,
                        'media_buttons' => false,
                        'quicktags'     => false,
                    ),
                ),
                array(
                    'name'          => 'Subtitle Color',
                    'id'            => 'first_section_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' )
                    ),
                ),
                array(
                    'name'          => 'Button Color',
                    'id'            => 'first_section_button_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' ),
                    ),
                ),
                array(
                    'id'   => 'first_section_button_link',
                    'name' => 'Button Link',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'first_section_button_text',
                    'name' => 'Button Text',
                    'type' => 'text',
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'      => 'Second Section',
            'post_types' => 'page',
            'fields'     => array(
                array(
                    'id'   => 'second_section_title',
                    'name' => 'Title',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'second_section_subtitle',
                    'name' => 'Subtitle',
                    'type' => 'text',
                ),
                array(
                    'id'      => 'second_section_desc',
                    'name'    => 'Description',
                    'type'    => 'wysiwyg',
                    'options' => array(
                        'teeny'         => true,
                        'media_buttons' => false,
                        'quicktags'     => false,
                    ),
                ),
                array(
                    'type'  => 'single_image',
                    'name'  => 'Section Image',
                    'id'    => 'second_section_image',
                ),
                array(
                    'name'          => 'Background Color',
                    'id'            => 'second_section_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' )
                    ),
                ),
                array(
                    'name'          => 'Button Color',
                    'id'            => 'second_section_button_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' ),
                    ),
                ),
                array(
                    'id'   => 'second_section_button_link',
                    'name' => 'Button Link',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'second_section_button_text',
                    'name' => 'Button Text',
                    'type' => 'text',
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'      => 'Third Section',
            'post_types' => 'page',
            'fields'     => array(
                array(
                    'id'   => 'third_section_description',
                    'name' => 'Description',
                    'type' => 'text',
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'      => 'Fourth Section',
            'post_types' => 'page',
            'fields'     => array(
                array(
                    'id'   => 'fourth_section_title',
                    'name' => 'Title',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'fourth_section_description',
                    'name' => 'Description',
                    'type' => 'text',
                ),
                array(
                    'name'          => 'Background Color',
                    'id'            => 'fourth_section_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' )
                    ),
                ),
                array(
                    'name'          => 'Button Color',
                    'id'            => 'fourth_section_button_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' ),
                    ),
                ),
                array(
                    'id'   => 'fourth_section_button_link',
                    'name' => 'Button Link',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'fourth_section_button_text',
                    'name' => 'Button Text',
                    'type' => 'text',
                ),
          
            ),
        );

        $meta_boxes[] = array(
            'title'      => 'Fifth Section',
            'post_types' => 'page',
            'fields'     => array(
                array(
                    'id'   => 'fifth_section_title',
                    'name' => 'Title',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'fifth_section_first_subtitle',
                    'name' => 'First Subtitle',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'fifth_section_second_subtitle',
                    'name' => 'Second Subtitle',
                    'type' => 'text',
                ),
                array(
                    'id'      => 'fifth_section_desc',
                    'name'    => 'Description',
                    'type'    => 'wysiwyg',
                    'options' => array(
                        'teeny'         => true,
                        'media_buttons' => false,
                        'quicktags'     => false,
                    ),
                ),
                array(
                    'name'          => 'Background Color',
                    'id'            => 'fifth_section_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' )
                    ),
                ),
                array(
                    'type'  => 'single_image',
                    'name'  => 'Section Image',
                    'id'    => 'fifth_section_image',
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'      => 'Sixth Section',
            'post_types' => 'page',
            'fields'     => array(
                array(
                    'id'   => 'sixth_section_title',
                    'name' => 'Title',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'sixth_section_subtitle',
                    'name' => 'Subtitle',
                    'type' => 'text',
                ),
                array(
                    'id'      => 'sixth_section_items',
                    'name'    => 'List Items',
                    'type'    => 'wysiwyg',
                    'clone'   => true,
                    'options' => array(
                        'teeny'         => true,
                        'media_buttons' => false,
                        'quicktags'     => false,
                    ),
                ),
                array(
                    'type'  => 'single_image',
                    'name'  => 'Section Image',
                    'id'    => 'sixth_section_image',
                ),
                array(
                    'name'          => 'Background Color',
                    'id'            => 'sixth_section_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' )
                    ),
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'      => 'Seventh Section',
            'post_types' => 'page',
            'fields'     => array(
                array(
                    'id'   => 'seventh_section_title',
                    'name' => 'Title',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'seventh_section_subtitle',
                    'name' => 'Subtitle',
                    'type' => 'text',
                ),
                array(
                    'id'      => 'seventh_section_items',
                    'name'    => 'List Items',
                    'type'    => 'wysiwyg',
                    'clone'   => true,
                    'options' => array(
                        'teeny'         => true,
                        'media_buttons' => false,
                        'quicktags'     => false,
                    ),
                ),
                array(
                    'name'          => 'Background Color',
                    'id'            => 'seventh_section_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' )
                    ),
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'      => 'Eighth Section',
            'post_types' => 'page',
            'fields'     => array(
                array(
                    'id'   => 'eighth_section_desc',
                    'name' => 'Description',
                    'type'    => 'wysiwyg',
                    'options' => array(
                        'teeny'         => true,
                        'media_buttons' => false,
                        'quicktags'     => false,
                    ),
                ),
                array(
                    'name'          => 'Background Color',
                    'id'            => 'eighth_section_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' )
                    ),
                ),
                array(
                    'name'          => 'Button Color',
                    'id'            => 'eighth_section_button_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' ),
                    ),
                ),
                array(
                    'id'   => 'eighth_section_button_link',
                    'name' => 'Button Link',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'eighth_section_button_text',
                    'name' => 'Button Text',
                    'type' => 'text',
                ),
          
            ),
        );

        $meta_boxes[] = array(
            'title'      => 'Ninth Section',
            'post_types' => 'page',
            'fields'     => array(
                array(
                    'id'   => 'ninth_section_outer_title',
                    'name' => 'Outer Title',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'ninth_section_inner_first_title',
                    'name' => 'Inner First Title',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'ninth_section_inner_first_subtitle',
                    'name' => 'Inner First Subtitle',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'ninth_section_inner_second_subtitle',
                    'name' => 'Inner Second Subtitle',
                    'type' => 'text',
                ),
                array(
                    'id'      => 'ninth_section_short_desc',
                    'name'    => 'Short Description',
                    'type'    => 'wysiwyg',
                    'options' => array(
                        'teeny'         => true,
                        'media_buttons' => false,
                        'quicktags'     => false,
                    ),
                ),
                array(
                    'id'   => 'ninth_section_inner_second_title',
                    'name' => 'Inner Second Title',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'ninth_section_inner_price',
                    'name' => 'Price Subtitle',
                    'type' => 'text',
                ),
                array(
                    'id'      => 'ninth_section_information',
                    'name'    => 'Information',
                    'type'    => 'wysiwyg',
                    'options' => array(
                        'teeny'         => true,
                        'media_buttons' => false,
                        'quicktags'     => false,
                    ),
                ),
                array(
                    'id'      => 'ninth_section_main_desc',
                    'name'    => 'Main Description',
                    'type'    => 'wysiwyg',
                    'options' => array(
                        'teeny'         => true,
                        'media_buttons' => false,
                        'quicktags'     => false,
                    ),
                ),
                array(
                    'name'          => 'Background & Price Color',
                    'id'            => 'ninth_section_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' )
                    ),
                ),
                array(
                    'name'          => 'Button Color',
                    'id'            => 'ninth_section_button_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' ),
                    ),
                ),
                array(
                    'id'   => 'ninth_section_button_link',
                    'name' => 'Button Link',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'ninth_section_button_text',
                    'name' => 'Button Text',
                    'type' => 'text',
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'      => 'Tenth Section',
            'post_types' => 'page',
            'clone' => true,
            
            'fields'     => array(
                array(
                    'id'   => 'tenth_section_items',
                    'name' => 'Description',
                    'type'    => 'wysiwyg',
                    'clone'   => true,
                    'options' => array(
                        'teeny'         => true,
                        'media_buttons' => false,
                        'quicktags'     => false,
                    ),
                ),
                array(
                    'name'          => 'Text Color',
                    'id'            => 'field_id',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' )
                    ),
                ),
                array(
                    'name'          => 'Button Color',
                    'id'            => 'tenth_section_button_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' ),
                    ),
                ),
                array(
                    'id'   => 'tenth_section_button_link',
                    'name' => 'Button Link',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'tenth_section_button_text',
                    'name' => 'Button Text',
                    'type' => 'text',
                ),
          
            ),
        );

        $meta_boxes[] = array(
            'title'      => 'Eleventh Section',
            'post_types' => 'page',
            'fields'     => array(
                array(
                    'id'   => 'eleventh_section_title',
                    'name' => 'Title',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'eleventh_section_first_subtitle',
                    'name' => 'First Subtitle',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'eleventh_section_second_subtitle',
                    'name' => 'Second Subtitle',
                    'type' => 'text',
                ),
                array(
                    'id'      => 'eleventh_section_desc',
                    'name'    => 'Description',
                    'type'    => 'wysiwyg',
                    'options' => array(
                        'teeny'         => true,
                        'media_buttons' => false,
                        'quicktags'     => false,
                    ),
                ),
                array(
                    'type'  => 'single_image',
                    'name'  => 'Section Image',
                    'id'    => 'eleventh_section_image',
                ),
                array(
                    'name'          => 'Background Color',
                    'id'            => 'eleventh_section_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' )
                    ),
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'      => 'Twelfth Section',
            'post_types' => 'page',
            'fields'     => array(
                array(
                    'id'   => 'twelfth_section_title',
                    'name' => 'Title',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'twelfth_section_first_subtitle',
                    'name' => 'First Subtitle',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'twelfth_section_second_subtitle',
                    'name' => 'Second Subtitle',
                    'type' => 'text',
                ),
                array(
                    'id'      => 'twelfth_section_desc',
                    'name'    => 'Description',
                    'type'    => 'wysiwyg',
                    'options' => array(
                        'teeny'         => true,
                        'media_buttons' => false,
                        'quicktags'     => false,
                    ),
                ),
                array(
                    'type'  => 'single_image',
                    'name'  => 'Section Image',
                    'id'    => 'twelfth_section_image',
                ),
                array(
                    'name'          => 'Background Color',
                    'id'            => 'twelfth_section_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' )
                    ),
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'      => 'Thirteenth Section',
            'post_types' => 'page',
            'fields'     => array(
                array(
                    'id'   => 'thirteenth_section_title',
                    'name' => 'Title',
                    'type' => 'text',
                ),
                array(
                    'id'      => 'thirteenth_section_desc',
                    'name'    => 'Description',
                    'type'    => 'wysiwyg',
                    'options' => array(
                        'teeny'         => true,
                        'media_buttons' => false,
                        'quicktags'     => false,
                    ),
                ),
            ),
        );

        
        $meta_boxes[] = array(
            'title'      => 'Fourteenth Section',
            'post_types' => 'page',
            'fields'     => array(
                array(
                    'id'   => 'fourteenth_section_title',
                    'name' => 'Encouragement Title',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'fourteenth_section_image',
                    'name' => 'Thumbnail Image / Signature Image',
                    'type' => 'single_image'
                ),
                array(
                    'id'   => 'fourteenth_section_button_link',
                    'name' => 'Button Link',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'fourteenth_section_button_text',
                    'name' => 'Button Text',
                    'type' => 'text',
                ),
                array(
                    'name'          => 'Background Color',
                    'id'            => 'fourteenth_section_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' )
                    ),
                ),
            ),
        );

        $meta_boxes[] = array(
            'title'      => 'Contact Form Section',
            'post_types' => 'page',
            'fields'     => array(
                array(
                    'id'   => 'contact_form_title',
                    'name' => 'Title',
                    'type' => 'text',
                ),
                array(
                    'id'   => 'contact_form_subtitle',
                    'name' => 'Subtitle',
                    'type' => 'text',
                ),
                array(
                    'id'      => 'contact_form_desc',
                    'name'    => 'Description',
                    'type'    => 'wysiwyg',
                    'options' => array(
                        'teeny'         => true,
                        'media_buttons' => false,
                        'quicktags'     => false,
                    ),
                ),
                array(
                    'name'          => 'Background Color',
                    'id'            => 'contact_form_color',
                    'type'          => 'color',
                    'alpha_channel' => false,
                    'js_options'    => array(
                        'palettes' => array( '#6a5acd', '#0000ff', '#ee82ee', '#ff0000', '#ffa500', '#3cb371' )
                    ),
                ),
            ),
        );

        return $meta_boxes;
    } );