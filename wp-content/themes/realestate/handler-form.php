<?php
define('WP_USE_THEMES', false);

require( $_SERVER['DOCUMENT_ROOT'] .'/wp-blog-header.php');

if (isset($_POST['send']) && isset($_POST['input_title']) && isset($_POST['input_description'])) {
	
$input_title =  wp_strip_all_tags( $_POST['input_title'], 0 );
$input_description = wp_strip_all_tags( $_POST['input_description'], 0 ); 
$input_type = wp_strip_all_tags( $_POST['input_type'], 0 ); 
$input_p = wp_strip_all_tags( $_POST['input_p'], 0 ); 
$input_s = wp_strip_all_tags( $_POST['input_s'], 0 ); 
$input_a = wp_strip_all_tags( $_POST['input_a'], 0 ); 
$input_g = wp_strip_all_tags( $_POST['input_g'], 0 ); 
$input_e = wp_strip_all_tags( $_POST['input_e'], 0 ); 
$input_city = (int)$_POST['input_city'];

$new_post = array(
 'ID' => '',
 'post_author' => $user->ID,
 'post_type' => 'property',
 'post_content' => $input_description,
 'post_title' => $input_title,
 'post_status' => 'publish',
);

$post_id = wp_insert_post($new_post);

wp_set_object_terms( $post_id, $input_type, 'type_property' );
    
update_post_meta($post_id, 'площадь', $input_p);
update_post_meta($post_id, 'стоимость', $input_s);
update_post_meta($post_id, 'адрес', $input_a);
update_post_meta($post_id, 'жилая_площадь', $input_g);
update_post_meta($post_id, 'этаж', $input_e);
update_post_meta($post_id, 'город', $input_city);


if (isset($_FILES["input_image"])) {

    $wordpress_upload_dir = wp_upload_dir();
    $i = 1;
     
    $input_image = $_FILES['input_image'];
    $new_file_path = $wordpress_upload_dir['path'] . '/' . $input_image['name'];
    $new_file_mime = mime_content_type( $input_image['tmp_name'] );
     
    if( empty( $input_image ) )
        die( 'File is not selected.' );
     
    if( $input_image['error'] )
        die( $input_image['error'] );
     
    if( $input_image['size'] > wp_max_upload_size() )
        die( 'It is too large than expected.' );
     
    if( !in_array( $new_file_mime, get_allowed_mime_types() ) )
        die( 'WordPress doesn\'t allow this type of uploads.' );
     
    while( file_exists( $new_file_path ) ) {
        $i++;
        $new_file_path = $wordpress_upload_dir['path'] . '/' . $i . '_' . $input_image['name'];
    }

    if( move_uploaded_file( $input_image['tmp_name'], $new_file_path ) ) {    
     
        $upload_id = wp_insert_attachment( array(
            'guid'           => $new_file_path, 
            'post_mime_type' => $new_file_mime,
            'post_title'     => preg_replace( '/\.[^.]+$/', '', $input_image['name'] ),
            'post_content'   => '',
            'post_status'    => 'inherit'
        ), $new_file_path );     

        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        wp_update_attachment_metadata( $upload_id, wp_generate_attachment_metadata( $upload_id, $new_file_path ) );
        set_post_thumbnail( $post_id, $upload_id );
    }

}

if ($post_id) echo "Недвижимость добавлена";

} else {
    echo 'Ошибка заполнения полей';
}


?>