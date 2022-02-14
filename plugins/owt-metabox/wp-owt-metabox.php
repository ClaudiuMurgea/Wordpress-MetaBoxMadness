<?php 
/*
    Plugin Name: WP OWT Metabox
    Descriptin: This is a simple plugin for purpose of learning
    Version: 1.0
    Author:Clau
*/

function wpl_owt_custom_init_cpt() {
    $args = array(
        "public"    => true,
        "label"     => "Books",
        "supports"  => array("title", "editor", "author", "thumbnail", "excerpt", "comments")
    );
    register_post_type("book", $args);
}

add_action("init", "wpl_owt_custom_init_cpt");

function wpl_owt_register_metabox() {
    //page
    add_meta_box("owt-page-id", "OWT Page Metabox", "wpl_owt_page_function", "page", "normal", "high");
    //post
    add_meta_box("owt-post-id", "OWT Post Metabox", "wpl_owt_post_function", "post", "side", "high");
}
add_action("add_meta_boxes", "wpl_owt_register_metabox");


function wpl_owt_register_metabox_book() {
    //custom post type
    add_meta_box("owt-cpt-id", "OWT Book Metabox", "wpl_owt_book_function", "book", "side", "high");
}
add_action("add_meta_boxes_book", "wpl_owt_register_metabox_book");


function wpl_owt_register_metabox_dashboard() {
    add_meta_box("owt-dashboard-id", "OWT Dashboard Metabox", "wpl_owt_dashboard_function", "dashboard", "normal", "high");
    remove_meta_box("dashboard_quick_press", "dashboard","side");
    remove_meta_box("dashboard_activity", "dashboard", "side");
}

add_action("add_meta_boxes_book", "wpl_owt_register_metabox_dashboard");

// add_action('wp_dashboard_setup', 'wpdocs_remove_dashboard_widgets');
 
/**
 * Remove all dashboard widgets
 */
// function wpdocs_remove_dashboard_widgets(){
//     remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // Right Now
//     remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // Recent Comments
//     remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  // Incoming Links
//     remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   // Plugins
//     remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  // Quick Press
//     remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');  // Recent Drafts
//     remove_meta_box('dashboard_primary', 'dashboard', 'side');   // WordPress blog
//     remove_meta_box('dashboard_secondary', 'dashboard', 'side');   // Other WordPress News
//     // use 'dashboard-network' as the second parameter to remove widgets from a network dashboard.
// }

//page
function wpl_owt_book_function($post) {
    // wp_nonce_filled(basename(__FILE__), "wp_owt_cpt_nonce");
    ?>
        <!-- <p>This is custom owt metabox for pages </p>
        <p><a href="https://github.com/owthub/wp-owt-metabox" target="_blank">wpl_owt_page_function</a></p> -->
        <div>Publisher name</div>
        <label for="book_publisher_name">Publisher Name</label>
        <?php $publisher_name = get_post_meta($post->ID, "book_publisher_name", true); ?>
        <input type="text" name="book_publisher_name" value="<?php echo $publisher_name; ?>" placeholder="Publisher name"/>
    <?php
}

add_action("save_post", "wpl_owt_save_metabox_data", 10,2);

function wpl_owt_save_metabox_data($post_id, $post) {
    $pub_name = "";
    if (isset($_POST['book_publisher_name'])) {
        $pub_name = sanitize_text_field($_POST['book_publisher_name']);
    } else {
        $pub_name = "";
        update_post_meta($post_id, "book_publisher_name", $pub_name);
    }
}