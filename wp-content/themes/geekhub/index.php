<?php get_header(); ?>

<div id="content">
        <div class="home">
			<?php if(have_posts()): ?>
				<h2>ДЕТАЛІ КУРСІВ ТА РЕЄСТРАЦІЯ</h2>
				<ul class="types">
					<?php $i = 0; ?>
					<?php while(have_posts()): the_post(); $i++; ?>
						<li<?php if($i == 1): ?> class="left-col"<?php endif;?>>
							<?php the_post_thumbnail(); ?>
							<a class="title" href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
							<p><?php the_field('description'); ?></p>
							<a href="<?php the_permalink(); ?>">Докладніше + реєстрація</a>
						</li>
						<?php if($i == 3) $i = 0;?>
					<?php endwhile; ?>
					<li></li>
				</ul>
			<?php else: ?>
				<p>Извините, но в этом году регистрации больше не будет. Проходите в следующем</p>
			<?php endif; ?>
           
            <ul class="social_share">
                <li id="vk">
					<div id="vk_groups"></div>
					<script type="text/javascript">
					VK.Widgets.Group("vk_groups", {mode: 0, width: "276", height: "240", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 30111409);
					</script>
                </li>
                <li class="sertificates_list">
                	<h4><a href="http://homework-3.local/?page_id=72">Сертифiкованi професiонали</a></h4>
                </li>
                <li>
                    <h4>Наші Спонсори</h4>
                    <ul>
                        <li class="de"><a href="javascript:if(confirm(%27http://povnahata.com/  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://povnahata.com/%27" tppabs="http://povnahata.com/">Дім Євангелія</a></li>
                        <li class="moc"><a href="javascript:if(confirm(%27http://masterofcode.com/  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://masterofcode.com/%27" tppabs="http://masterofcode.com/">Masterofcode LTD</a></li>
                        <li class="sergium"><a href="javascript:if(confirm(%27http://sergium.net/  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://sergium.net/%27" tppabs="http://sergium.net/">SerGium.net</a></li>
                        <li class="clear left stuff"><a href="javascript:if(confirm(%27http://val.co.ua/  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://val.co.ua/%27" tppabs="http://val.co.ua/">val.co.ua/</a></li>
                        <li class="youthog"><a href="javascript:if(confirm(%27http://yothog.com/  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://yothog.com/%27" tppabs="http://yothog.com/">Youthog.com</a></li>
                        <li class="jetbrains"><a href="javascript:if(confirm(%27http://jetbrains.com/  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://jetbrains.com/%27" tppabs="http://jetbrains.com/">JetBrains.com</a></li>
                        <li class="ucoz"><a href="javascript:if(confirm(%27http://rabota.ucoz.ua/  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://rabota.ucoz.ua/%27" tppabs="http://rabota.ucoz.ua/">ucoz.ua</a></li>
                        <li class="spd-ukraine"><a href="javascript:if(confirm(%27http://spd-ukraine.com/  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://spd-ukraine.com/%27" tppabs="http://spd-ukraine.com/">SPD-Ukraine.com</a></li>
                        <li class="ekreative"><a href="javascript:if(confirm(%27http://www.ekreative.com/  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://www.ekreative.com/%27" tppabs="http://www.ekreative.com/">Ekreative.com</a></li>
                        <li class="n3wnormal"><a href="javascript:if(confirm(%27http://n3wnormal.com/  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://n3wnormal.com/%27" tppabs="http://n3wnormal.com/">n3wnormal.ua</a></li>
                        <li class="in-ck-ua"><a href="javascript:if(confirm(%27http://in.ck.ua/  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://in.ck.ua/%27" tppabs="http://in.ck.ua/">in.ck.ua</a></li>
                    </ul>
                </li>
            </ul>
        </div>
	</div><!-- content -->

<?php get_footer(); ?>