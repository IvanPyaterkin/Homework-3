<?php
/**
 * Plugin Name: arzamath_17th
 * Plugin URI: 
 * Description: A brief description of the plugin.
 * Version: 1.0.0
 * Author: Vitaliy Andriyets
 * Author URI: 
 * License: GNU
 */
 
/*  Copyright 2014  Andriyets Vitaliy  (email : ___)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

defined('ABSPATH') or die("No script kiddies please!");

// create custom plugin settings menu
add_action('admin_menu', 'arzamath_create_menu'); //непонятны параметры

function arzamath_create_menu() {

	//create new top-level menu
	add_menu_page('Страница для настройки плагина', 'Настройки arzamath', 'administrator', 'arzamath-settings', 'arzamath_settings_page','dashicons-tagcloud', 66);
//как задавать несколько прав//
	//call register settings function
	add_action( 'admin_init', 'register_mysettings' );
}


function register_mysettings() {
	//register our settings
	register_setting( 'arzamath-settings-group', 'custom_post_type_name' );
	register_setting( 'arzamath-settings-group', 'select' );
}

function arzamath_settings_page() {
?>
<div class="wrap">
<h2>Настройки плагина</h2>

<form method="post" action="options.php">
    <?php settings_fields( 'arzamath-settings-group' ); ?>
    <?php do_settings_sections( 'arzamath-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">New Option Name</th>
        <td><input type="text" name="custom_post_type_name" value="<?php echo esc_attr( get_option('custom_post_type_name') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Some Other Option</th>
        <td>
			<select name='select'>
				<option <?php if(get_option('select') == "Значение 1"): ?>selected <?php endif; ?>value='Значение 1'>Значение 1</option>
				<option <?php if(get_option('select') == "Значение 2"): ?>selected <?php endif; ?>value='Значение 2'>Значение 2</option>
				<option <?php if(get_option('select') == "Значение 3"): ?>selected <?php endif; ?>value='Значение 3'>Значение 3</option>
				<option <?php if(get_option('select') == "Значение 4"): ?>selected <?php endif; ?>value='Значение 4'>Значение 4</option>
			</select>
		</td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } 
add_action('init', 'custom_post_type');
function custom_post_type(){
	$labels = array(
		 'name' => get_option('custom_post_type_name') // основное название для типа записи
		,'singular_name' => 'Видео' // название для одной записи этого типа
		,'add_new' => 'Добовить новое' // для добавления новой записи
		,'add_new_item' => 'Добавить новое видео' // заголовка у вновь создаваемой записи в админ-панели.
		,'edit_item' => 'Редактировать' // для редактирования типа записи
		,'new_item' => 'Новое видео' // текст новой записи
		,'view_item' => 'Просмотр видео' // для просмотра записи этого типа.
		,'search_items' => 'Искать видео' // для поиска по этим типам записи
		,'not_found' => 'Не найдено видео' // если в результате поиска ничего не было найдень
		,'not_found_in_trash' => 'Нет видео в корзине' // если не было найдено в корзине
		,'menu_name' => get_option('custom_post_type_name') // название меню
	);
	$args = array(
		 'label' => null 
		,'labels' => $labels 
		,'description' => '' 
		,'public' => true 
		,'exclude_from_search' => false
		,'show_ui' => true
		,'show_in_menu' => true 
		,'menu_position' => 11 
		,'menu_icon' => 'dashicons-video-alt2' 
		,'capability_type' => 'post' 
		,'hierarchical' => false
		,'supports' => array('title','editor')
		,'query_var' => true
		,'show_in_nav_menus' => true
	);
	register_post_type( 'video', $args );
} 



/* Добавляем блоки в основную колонку на страницах постов и пост. страниц */
function arzamath_add_custom_box() {
	add_meta_box( 'myplugin_sectionid', 'Поля настройки', 'myplugin_meta_box_callback', 'video' );
}
add_action('add_meta_boxes', 'arzamath_add_custom_box');
$post = $wp_query->post;
/* HTML код блока */
function myplugin_meta_box_callback($post) {
	// Используем nonce для верификации
	wp_nonce_field( plugin_basename(__FILE__), 'myplugin_noncename' ); ?>

	<p>
		<label for="myplugin_new_field1">Текстовое поле</label>
		<input type="text" name="myplugin_new_field1" value="<?php echo @get_post_meta($post->ID, 'myplugin_new_field1', true); ?>" size="25" /> 
		
		<!--Как подтянуть значение из БД значение Value  -->
	</p>
	<p>
		<label for="myplugin_new_field2">Мультивыбор</label>
		<?php $array2 = @get_post_meta($post->ID, 'myplugin_new_field2', true); ?>
		<select name='myplugin_new_field2[]' multiple="multiple">
			<option <?php if(in_array("Значение 1", $array2)): ?>selected <?php endif; ?>value='Значение 1'>Значение 1</option>
			<option <?php if(in_array("Значение 2", $array2)): ?>selected <?php endif; ?>value='Значение 2'>Значение 2</option>
			<option <?php if(in_array("Значение 3", $array2)): ?>selected <?php endif; ?>value='Значение 3'>Значение 3</option>
			<option <?php if(in_array("Значение 4", $array2)): ?>selected <?php endif; ?>value='Значение 4'>Значение 4</option>
		</select>
	</p>
	<p>
		<label for="myplugin_new_field3">Добавить картинку</label>
		<input type="file" name="myplugin_new_field3" value="<?php echo @get_post_meta($post->ID, 'myplugin_new_field3', true); ?>" size="25" />
	</p>
<?php }

function arzamath_save_postdata( $post_id ) {
	if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );
	$uploadedfile = $_FILES['myplugin_new_field3'];
	$upload_overrides = array( 'test_form' => false );
	$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
	//print_r($movefile);
	if ( $movefile ) {
		//echo "File is valid, and was successfully uploaded.\n";
		//var_dump( $movefile);
	} else {
		//echo "Possible file upload attack!\n";
	}
	

	$setting1 = sanitize_text_field( $_POST['myplugin_new_field1'] );
	$setting2 = $_POST['myplugin_new_field2'];
	$setting3 = $uploaded_file["url"];

	update_post_meta( $post_id, 'myplugin_new_field1', $setting1 );
	update_post_meta( $post_id, 'myplugin_new_field2', $setting2 );
	update_post_meta( $post_id, 'myplugin_new_field3', $setting3 );
}
add_action( 'save_post', 'arzamath_save_postdata' );