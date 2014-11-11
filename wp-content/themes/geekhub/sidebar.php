		<div class="sidebar">
            <h3>НАШІ КУРСИ</h3>
            <ul>
				<?php query_posts('showpossts=100'); ?>
				<?php while(have_posts()): the_post(); ?>
					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; ?>
				<?php wp_reset_query(); ?>
            </ul>
        </div>