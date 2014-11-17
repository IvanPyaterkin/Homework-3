<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(); ?></title>
	
	<link href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/flipclock.css" />

    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.6.4.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/prefixfree.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/flipclock.min.js"></script>
	<script type="text/javascript" src="http://vk.com/js/api/openapi.js?115"></script>
    <script type="text/javascript">
        $(function(){

            var t1 = new Date("September 17, 2014 00:00:00");
            var t2 = new Date();
            var seconds = (t1.getTime() - t2.getTime()) / 1000;

            var Seconds_Between_Dates = Math.abs(seconds);

            var clock = $('.countdown').FlipClock(Seconds_Between_Dates,{clockFace:'DailyCounter',countdown:true,	showSeconds: false});


            function isEmailValid(email){
                var pass = /^[a-z0-9._%+-]+@[a-z0-9._-]+\.[a-z]{2,6}$/i;
                if(!pass.test(email)){
                    return false;
                }
                return true;
            }

            $('#header form').submit(function(){
                var email = $(this).find('.email');
                var loader = $(this).find('span');
                var val = email.val();

                if (!isEmailValid(val)) {
                    email.addClass('error');
                    email.focus();
                    return false;
                }
                email.removeClass('error');
                email.attr('disabled',true);
                loader.fadeIn(300);

                var data = { email: val };

                $.post('notify.php.htm'/*tpa=http://geekhub.ck.ua/notify.php*/, data, function(){
                    loader.fadeOut(300);
                    email.attr('disabled',false);
                    email.val('');
                    alert('Готово');
                });

                return false;
            });
        });
    </script>

	<?php wp_head(); ?>
	
</head>
<body<?php if(!is_home()):?> class="inner"<?php endif; ?>>
<div id="wrap">
	<div id="header">
		<h1><a href="/">GeekHub</a></h1>
		
		<?php wp_nav_menu(
			array(
				'container' => '',
				'menu_class' => 'nav'
			)
		); ?>

        <ul class="links">
            <li class="fb"><a href="javascript:if(confirm(%27http://www.facebook.com/pages/GeekHub/158983477520070  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://www.facebook.com/pages/GeekHub/158983477520070%27" tppabs="http://www.facebook.com/pages/GeekHub/158983477520070">facebook</a></li>
            <li class="vk"><a href="javascript:if(confirm(%27http://vkontakte.ru/geekhub  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://vkontakte.ru/geekhub%27" tppabs="http://vkontakte.ru/geekhub">Вконтакте</a></li>
            <li class="tw"><a href="javascript:if(confirm(%27http://twitter.com/  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://twitter.com/#!/geek_hub%27" tppabs="http://twitter.com/#!/geek_hub">twitter</a></li>
            <li class="yb"><a href="javascript:if(confirm(%27http://www.youtube.com/user/GeekHubchannel  \n\nThis file was not retrieved by Teleport Pro, because it is addressed on a domain or path outside the boundaries set for its Starting Address.  \n\nDo you want to open it from the server?%27))window.location=%27http://www.youtube.com/user/GeekHubchannel%27" tppabs="http://www.youtube.com/user/GeekHubchannel">youtube</a></li>
        </ul>
		<?php if(is_home()):?>
        <span class="line"></span>

        <h4 class="registration">Реєстрацію на 4й сезон закрито</h4>
        <p class="note">*залиште нам ваш емейл і ми повідомимо вас про початок реєстрації</p>
        <form action="#">
            <fieldset>
                <span></span>
                <input type="text" class="email" placeholder="Ваш email" />
                <input type="submit" value="Відіслати" />
            </fieldset>

        </form>
        <img src="<?php bloginfo('template_url'); ?>/images/splash.png" alt="splash" />
		<?php endif; ?>
	</div><!-- header -->