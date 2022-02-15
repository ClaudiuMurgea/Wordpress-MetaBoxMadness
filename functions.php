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
    Adding repeatable meta boxes
===========================================================
*/

add_action('admin_init', 'gpm_add_meta_boxes', 2);

function gpm_add_meta_boxes() {
    add_meta_box( 'gpminvoice-group', 'Content vs Color-Repeatable', 'Repeatable_meta_box_display', 'page', 'normal', 'high');
    add_meta_box( 'gpminvoice-group2', 'Content vs Image-Repeatable', 'Repeatable_meta_box_image', 'page', 'normal', 'high');
}


/*
===========================================================
    Repeatable_meta_box_display()
===========================================================
*/
function Repeatable_meta_box_display() {
    global $post;
    $gpminvoice_group = get_post_meta($post->ID, 'customdata_group', true);
     wp_nonce_field( 'gpm_repeatable_meta_box_nonce', 'gpm_repeatable_meta_box_nonce' );
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function( $ ){
        $( '#add-row' ).on('click', function() {
            var row = $( '.empty-row.screen-reader-text' ).clone(true);
            row.removeClass( 'empty-row screen-reader-text' );
            row.insertBefore( '#repeatable-fieldset-one tbody>tr:last' );
            return false;
        });

        $( '.remove-row' ).on('click', function() {
            $(this).parents('tr').remove();
            return false;
        });
    });
  </script>
  <table id="repeatable-fieldset-one" width="100%">
  <tbody>
    <?php
     if ( $gpminvoice_group ) :
      foreach ( $gpminvoice_group as $field ) {
    ?>
    <tr>
      <td width="15%">
        <input type="text"  placeholder="Title" name="TitleItem[]" value="<?php if($field['TitleItem'] != '') echo esc_attr( $field['TitleItem'] ); ?>" /></td>
      <td width="15%">
        <input type="text"  placeholder="Subtitle" name="SubtitleItem[]" value="<?php if($field['SubtitleItem'] != '') echo esc_attr( $field['SubtitleItem'] ); ?>" /></td>
      <td width="35%">
      <textarea placeholder="Description" cols="55" rows="5" name="TitleDescription[]"> <?php if ($field['TitleDescription'] != '') echo esc_attr( $field['TitleDescription'] ); ?> </textarea></td>
      <td width="15%"><a class="button remove-row" href="#1">Remove</a></td>
    </tr>
    <?php
    }
    else :
    // show a blank one
    ?>
    <tr>
      <td>
        <input type="text" placeholder="Title" title="Title" name="TitleItem[]" />
      </td>
      <td>
        <input type="text" placeholder="Subtitle" title="Subtitle" name="SubtitleItem[]" />
      </td>
      <td>
          <textarea  placeholder="Description" name="TitleDescription[]" cols="55" rows="5"></textarea>
      </td>
      <td><a class="button  cmb-remove-row-button button-disabled" href="#">Remove</a></td>
    </tr>
    <?php endif; ?>

    <!-- empty hidden one for jQuery -->
    <tr class="empty-row screen-reader-text">
      <td>
        <input type="text" placeholder="Title" name="TitleItem[]"/>
      </td>
      <td>
        <input type="text" placeholder="Subtitle" name="SubtitleItem[]"/>
      </td>
      <td>
          <textarea placeholder="Description" cols="55" rows="5" name="TitleDescription[]"></textarea>
      </td>
      <td><a class="button remove-row" href="#">Remove</a></td>
    </tr>
  </tbody>
</table>
<p><a id="add-row" class="button" href="#">Add another</a></p>
 <?php
}
add_action('save_post', 'custom_repeatable_meta_box_display_save');
function custom_repeatable_meta_box_display_save($post_id) {
    if ( ! isset( $_POST['gpm_repeatable_meta_box_nonce'] ) ||
    ! wp_verify_nonce( $_POST['gpm_repeatable_meta_box_nonce'], 'gpm_repeatable_meta_box_nonce' ) )
        return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    $old = get_post_meta($post_id, 'customdata_group', true);
    $new = array();
    $invoiceItems = $_POST['TitleItem'];
    $invoiceSubitems = $_POST['SubtitleItem'];
    $prices = $_POST['TitleDescription'];

    $count = count( $invoiceItems );

     for ( $i = 0; $i < $count; $i++ ) {
        if ( $invoiceItems[$i] != '' ) :
            $new[$i]['TitleItem'] = stripslashes( strip_tags( $invoiceItems[$i] ) ); // and however you want to sanitize
              $new[$i]['SubtitleItem'] = stripslashes( $invoiceSubitems[$i] );
                $new[$i]['TitleDescription'] = stripslashes( $prices[$i] );
        endif;
    }
    if ( !empty( $new ) && $new != $old )
        update_post_meta( $post_id, 'customdata_group', $new );
    elseif ( empty($new) && $old )
        delete_post_meta( $post_id, 'customdata_group', $old );
}

/*
===========================================================
    Repeatable_meta_box_image()
===========================================================
*/

function Repeatable_meta_box_image() {
    global $post;
    $gpminvoice_group2 = get_post_meta($post->ID, 'customdata_group2', true);
     wp_nonce_field( 'gpm_repeatable_meta_box_nonce', 'gpm_repeatable_meta_box_nonce' );
    ?>
    <script type="text/javascript">
    jQuery(document).ready(function( $ ){
        $( '#add-row2' ).on('click', function() {
            var row = $( '.empty-row2.screen-reader-text2' ).clone(true);
            row.removeClass( 'empty-row2 screen-reader-text2' );
            row.insertBefore( '#repeatable-fieldset-two tbody>tr:last' );
            return false;
        });

        $( '.remove-row2' ).on('click', function() {
            $(this).parents('tr').remove();
            return false;
        });
    });
  </script>
  <table id="repeatable-fieldset-two" width="100%">
  <tbody>
    <?php
     if ( $gpminvoice_group2 ) :
      foreach ( $gpminvoice_group2 as $field ) {
    ?>
    <tr>
      <td width="15%">
        <input type="text"  placeholder="Title" name="TitleItem2[]" value="<?php if($field['TitleItem2'] != '') echo esc_attr( $field['TitleItem2'] ); ?>" /></td>
      <td width="15%">
        <input type="text"  placeholder="Subtitle" name="SubtitleItem2[]" value="<?php if($field['SubtitleItem2'] != '') echo esc_attr( $field['SubtitleItem2'] ); ?>" /></td>
      <td width="20%">
      <textarea placeholder="Description" cols="55" rows="5" name="TitleDescription2[]"> <?php if ($field['TitleDescription2'] != '') echo esc_attr( $field['TitleDescription2'] ); ?> </textarea></td>
      <td width="15%">
        <input type="file" name="ChooseFile[]"/></td>
      <td width="15%"><a class="button remove-row2" href="#1">Remove</a></td>
    </tr>
    <?php
    }
    else :
    // show a blank one
    ?>
    <tr>
      <td>
        <input type="text" placeholder="Title" title="Title" name="TitleItem2[]" />
      </td>
      <td>
        <input type="text" placeholder="Subtitle" title="Subtitle" name="SubtitleItem2[]" />
      </td>
      <td>
          <textarea  placeholder="Description" name="TitleDescription2[]" cols="55" rows="5"></textarea>
      </td>
      <td>
        <input type="file" name="ChooseFile[]"/>
      </td>
      <td><a class="button cmb-remove-row-button" href="#">Remove</a></td>
    </tr>
    <?php endif; ?>

    <!-- empty hidden one for jQuery -->
    <tr class="empty-row2 screen-reader-text2">
      <td>
        <input type="text" placeholder="Title" name="TitleItem2[]"/>
      </td>
      <td>
        <input type="text" placeholder="Subtitle" name="SubtitleItem2[]"/>
      </td>
      <td>
          <textarea placeholder="Description" cols="55" rows="5" name="TitleDescription2[]"></textarea>
      </td>
      <td>
        <input type="file" name="ChooseFile[]"/>
      </td>
      <td><a class="button remove-row2" href="#">Remove</a></td>
    </tr>
  </tbody>
</table>
<p><a id="add-row2" class="button" href="#">Add another</a></p>
 <?php
}
add_action('save_post', 'custom_repeatable_meta_box_image_save');
function custom_repeatable_meta_box_image_save($post_id) {
    if ( ! isset( $_POST['gpm_repeatable_meta_box_nonce'] ) ||
    ! wp_verify_nonce( $_POST['gpm_repeatable_meta_box_nonce'], 'gpm_repeatable_meta_box_nonce' ) )
        return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    $old = get_post_meta($post_id, 'customdata_group2', true);
    $new = array();
    $invoiceItems = $_POST['TitleItem2'];
    $invoiceSubitems = $_POST['SubtitleItem2'];
    $prices = $_POST['TitleDescription2'];
    $images = $_FILES['ChooseFile']['name'];

    $count = count( $invoiceItems );

     for ( $i = 0; $i < $count; $i++ ) {
        if ( $invoiceItems[$i] != '' ) :
            $new[$i]['TitleItem2'] = stripslashes( strip_tags( $invoiceItems[$i] ) ); // and however you want to sanitize
              $new[$i]['SubtitleItem2'] = stripslashes( $invoiceSubitems[$i] );
                $new[$i]['TitleDescription2'] = stripslashes( $prices[$i] );
                  $new[$i]['ChooseFile'] = $images[$i];
        endif;
    }
    if ( !empty( $new ) && $new != $old )
        update_post_meta( $post_id, 'customdata_group', $new );
    elseif ( empty($new) && $old )
        delete_post_meta( $post_id, 'customdata_group', $old );
}

/*
===========================================================
    Media Field meta box
===========================================================
*/

add_action( 'add_meta_boxes', 'multi_media_uploader_meta_box' );

function multi_media_uploader_meta_box() {
	add_meta_box( 'my-post-box', 'Media Field', 'multi_media_uploader_meta_box_func', 'page', 'normal', 'high' );
}

function multi_media_uploader_meta_box_func($post) {
	$banner_img = get_post_meta($post->ID,'page_banner_img',true);
	?>
	<style type="text/css">
		.multi-upload-medias ul li .delete-img { position: absolute; right: 3px; top: 2px; background: aliceblue; border-radius: 50%; cursor: pointer; font-size: 14px; line-height: 20px; color: red; }
		.multi-upload-medias ul li { width: 120px; display: inline-block; vertical-align: middle; margin: 5px; position: relative; }
		.multi-upload-medias ul li img { width: 100%; }
	</style>

	<table cellspacing="10" cellpadding="10">
		<tr>
			<td>Banner Image</td>
			<td>
				<?php echo multi_media_uploader_field( 'page_banner_img', $banner_img ); ?>
			</td>
		</tr>
	</table>

	<script type="text/javascript">
		jQuery(function($) {

			$('body').on('click', '.wc_multi_upload_image_button', function(e) {
				e.preventDefault();

				var button = $(this),
				custom_uploader = wp.media({
					title: 'Insert image',
					button: { text: 'Use this image' },
					multiple: true
				}).on('select', function() {
					var attech_ids = '';
					attachments
					var attachments = custom_uploader.state().get('selection'),
					attachment_ids = new Array(),
					i = 0;
					attachments.each(function(attachment) {
						attachment_ids[i] = attachment['id'];
						attech_ids += ',' + attachment['id'];
						if (attachment.attributes.type == 'image') {
							$(button).siblings('ul').append('<li data-attechment-id="' + attachment['id'] + '"><a href="' + attachment.attributes.url + '" target="_blank"><img class="true_pre_image" src="' + attachment.attributes.url + '" /></a><i class=" dashicons dashicons-no delete-img"></i></li>');
						} else {
							$(button).siblings('ul').append('<li data-attechment-id="' + attachment['id'] + '"><a href="' + attachment.attributes.url + '" target="_blank"><img class="true_pre_image" src="' + attachment.attributes.icon + '" /></a><i class=" dashicons dashicons-no delete-img"></i></li>');
						}

						i++;
					});

					var ids = $(button).siblings('.attechments-ids').attr('value');
					if (ids) {
						var ids = ids + attech_ids;
						$(button).siblings('.attechments-ids').attr('value', ids);
					} else {
						$(button).siblings('.attechments-ids').attr('value', attachment_ids);
					}
					$(button).siblings('.wc_multi_remove_image_button').show();
				})
				.open();
			});

			$('body').on('click', '.wc_multi_remove_image_button', function() {
				$(this).hide().prev().val('').prev().addClass('button').html('Add Media');
				$(this).parent().find('ul').empty();
				return false;
			});

		});

		jQuery(document).ready(function() {
			jQuery(document).on('click', '.multi-upload-medias ul li i.delete-img', function() {
				var ids = [];
				var this_c = jQuery(this);
				jQuery(this).parent().remove();
				jQuery('.multi-upload-medias ul li').each(function() {
					ids.push(jQuery(this).attr('data-attechment-id'));
				});
				jQuery('.multi-upload-medias').find('input[type="hidden"]').attr('value', ids);
			});
		})
	</script>

	<?php
}


function multi_media_uploader_field($name, $value = '') {
	$image = '">Add Media';
	$image_str = '';
	$image_size = 'full';
	$display = 'none';
	$value = explode(',', $value);

	if (!empty($value)) {
		foreach ($value as $values) {
			if ($image_attributes = wp_get_attachment_image_src($values, $image_size)) {
				$image_str .= '<li data-attechment-id=' . $values . '><a href="' . $image_attributes[0] . '" target="_blank"><img src="' . $image_attributes[0] . '" /></a><i class="dashicons dashicons-no delete-img"></i></li>';
			}
		}

	}

	if($image_str){
		$display = 'inline-block';
	}

	return '<div class="multi-upload-medias"><ul>' . $image_str . '</ul><a href="#" class="wc_multi_upload_image_button button' . $image . '</a><input type="hidden" class="attechments-ids ' . $name . '" name="' . $name . '" id="' . $name . '" value="' . esc_attr(implode(',', $value)) . '" /><a href="#" class="wc_multi_remove_image_button button" style="display:inline-block;display:' . $display . '">Remove media</a></div>';
}

// Save Meta Box values.
add_action( 'save_post', 'wc_meta_box_save' );

function wc_meta_box_save( $post_id ) {
	if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	if( !current_user_can( 'edit_post' ) ){
		return;
	}

	if( isset( $_POST['page_banner_img'] ) ){
		update_post_meta( $post_id, 'post_banner_img', $_POST['page_banner_img'] );
	}
}

/*
===========================================================
    Color Picker meta box
===========================================================
*/


//
  //END
//


add_action( 'admin_enqueue_scripts', 'mytheme_backend_scripts');

if ( ! function_exists( 'mytheme_backend_scripts' ) ){
	function mytheme_backend_scripts($hook) {
		wp_enqueue_media();
		wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_script( 'wp-color-picker');
	}
}

add_action( 'add_meta_boxes', 'mytheme_add_meta_box' );

if ( ! function_exists( 'mytheme_add_meta_box' ) ){
	function mytheme_add_meta_box(){
		add_meta_box( 'header-page-metabox-options', esc_html__('Header Color', 'mytheme' ), 'mytheme_header_meta_box', 'page', 'normal', 'high');
	}
}

if ( ! function_exists( 'mytheme_header_meta_box' ) ){
	function mytheme_header_meta_box( $post ){
		$custom = get_post_custom( $post->ID );
		$header_color = (isset($custom["header_color"][0])) ? $custom["header_color"][0] : '';
		wp_nonce_field( 'mytheme_header_meta_box', 'mytheme_header_meta_box_nonce' );
		?>
		<script>
		jQuery(document).ready(function($){
			$('.color_field').each(function(){
        		$(this).wpColorPicker();
    		});
		});
		</script>
		<div class="pagebox">
			<p><?php esc_attr_e('Choosse a color for your post header.', 'mytheme' ); ?></p>
			<input class="color_field" type="hidden" name="header_color" value="<?php esc_attr_e($header_color); ?>"/>
		</div>
		<?php
	}
}

if ( ! function_exists( 'mytheme_save_header_meta_box' ) ){
	function mytheme_save_header_meta_box( $post_id ){
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}
		if( !current_user_can( 'edit_pages' ) ) {
			return;
		}
		if ( !isset( $_POST['header_color'] ) || !wp_verify_nonce( $_POST['mytheme_header_meta_box_nonce'], 'mytheme_header_meta_box' ) ) {
			return;
		}
		$header_color = (isset($_POST["header_color"]) && $_POST["header_color"]!='') ? $_POST["header_color"] : '';
		update_post_meta($post_id, "header_color", $header_color);
	}
}

add_action( 'save_post', 'mytheme_save_header_meta_box' );

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
