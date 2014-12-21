<?php
/**
 * Widget Name: widget_for_plugin
 * Plugin URI: 
 * Description: A brief description of the widget.
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

// Создаем виджет 
class widget_for_plugin extends WP_Widget {

function __construct() {
parent::__construct(
// Выбираем ID для своего виджета
'widget_for_plugin', 

// Название виджета, показано в консоли
__('arzamath_17th Widget', 'widget_for_plugin_domain'), 

// Описание виджета
array( 'description' => __( 'Виджет для вывода постов из плагина arzamath_17th', 'widget_for_plugin_domain' ), ) 
);
}

// Создаем код для виджета - 
// сначала небольшая идентификация
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// до и после идентификации переменных темой
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// Именно здесь записываем весь код и вывод данных

// Запрос. $args - параметры запроса
query_posts( 'post_type=video' );

// Цикл WordPress
if( have_posts() ){ ?>


	<div class="widget-videos">
		<?php while( have_posts() ) { the_post(); ?>
			<div class="widget-videos-item">
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
				<h3><a class="btn btn-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p><?php echo get_post_meta(get_the_ID(), 'myplugin_new_field1', true); ?></p>
			</div>
		<?php } ?>
	</div>
<?php }

wp_reset_query();

echo $args['after_widget'];
}
		
// Закрываем код виджета
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'Посты Video', 'widget_for_plugin_domain' );
}
// Для административной консоли
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Обновление виджета
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Закрываем класс widget_for_plugin

// Регистрируем и запускаем виджет
function widget_for_plugin_load() {
	register_widget( 'widget_for_plugin' );
}
add_action( 'widgets_init', 'widget_for_plugin_load' );
