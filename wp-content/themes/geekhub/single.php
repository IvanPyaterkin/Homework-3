<?php get_header(); ?>

<div id="content">
        <?php get_sidebar(); ?>
        <div class="details">
            <ul>
                <li>
					<?php if(have_posts()): ?>
						<?php while(have_posts()): the_post(); ?>
							<?php the_post_thumbnail(); ?>
							<h2><?php the_title(); ?></h2>
							<?php the_content(); ?>
						<?php endwhile; ?>
					<?php else: ?>
						<p>Извините, но в этом году регистрации не будет</p>
					<?php endif; ?>
                </li>
            </ul>
        </div>
	</div><!-- content -->

<?php get_footer(); ?>