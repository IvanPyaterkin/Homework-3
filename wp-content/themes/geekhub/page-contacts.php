<?php
/*
Template Name: Контакты
*/
?>

<?php get_header(); ?>

	<div id="content">
        <?php if(have_posts()): ?>
			<?php while(have_posts()): the_post(); ?>
				<div class="contacts">
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
		<?php else: ?>
			<p>Извините, но в этом году регистрации уже не будет</p>
		<?php endif; ?>
	</div><!-- content -->

<?php get_footer(); ?>