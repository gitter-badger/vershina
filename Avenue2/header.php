<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/listing.css" media="screen" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
 <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/stylefeedback.css" media="screen" />
<!-- 	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/bootstrap/css/bootstrap.min.css" media="screen" />  -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>	
<link href='https://fonts.googleapis.com/css?family=Fira+Sans' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link rel="alternate" type="application/rss+xml" title="RSS-лента <?php bloginfo('name'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<!--[NotForDEV]-->
<!--<meta name="mailru-verification" content="295abfb33e20dfcb"/>
<meta name="mailru-domain" content="o10v9tGmuTjQ3Emm"/>
<meta name='yandex-verification' content='6a88e4a24bf95d8c'/>
<meta name='yandex-verification' content='7aa99d85014a1875'/>-->
<!--[NotForDEV]-->

<?php 
wp_enqueue_script('jquery');
wp_enqueue_script('bxslider', get_stylesheet_directory_uri() .'/js/jquery.bxslider.min.js');
wp_enqueue_script('superfish', get_stylesheet_directory_uri() .'/js/superfish.js');
wp_enqueue_script('effects', get_stylesheet_directory_uri() .'/js/effects.js');
?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/js/jquery.bxslider.css" media="screen" />

<?php wp_get_archives('type=monthly&format=link'); ?>
<?php //comments_popup_script(); // off by default ?>

<?php 
if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
wp_head(); 
?>

<!--<?php do_action('wpcallback_button'); ?>-->
<script type="text/javascript">
$(document).ready(function() {	
	$("#menu-novoeverxneemenyu").children().first().css("border-top-left-radius", "20px");
	$("#menu-novoeverxneemenyu").children().first().css("border-bottom-left-radius", "20px");
	$("#menu-novoeverxneemenyu").children().last().css("border-top-right-radius", "20px");
	$("#menu-novoeverxneemenyu").children().last().css("border-bottom-right-radius", "20px");
});

$('document').ready(function() {
    resizewin();

    $(window).resize(function() {
        resizewin();
    });
    window.onorientationchange = function() {
        resizewin();
    };
    function resizewin() {
        var browserMinWidth = $(document).width();

        if (browserMinWidth > 1300) {
            $("#menu-novoeverxneemenyu").children().last().children().first().css("padding-top","1em");
			$("#menu-novoeverxneemenyu").children().last().children().first().css("padding-right","0px");
        } else {
        	$("#menu-novoeverxneemenyu").children().last().children().first().css("padding-top","0.3em");
			$("#menu-novoeverxneemenyu").children().last().children().first().css("padding-right","0px");
        }
    }
});
</script>

</head>
<body>



<div id="masthead">

<div id="head">

<div id="top" class="clearfix"> 
	<div id="blogname">
		<!-- 	<h1><a href="<?php bloginfo('siteurl');?>/" title="<?php bloginfo('name');?>"><?php bloginfo('name');?></a></h1>-->
		<a href="<?php bloginfo('siteurl');?>/" title="<?php bloginfo('name');?>">
			<img style="width: 400px; height:140px; margin-top: 17px; margin-left: -12px;" src="<?php bloginfo('template_directory'); ?>/images/logo.png" width="400" height="80" alt="<?php bloginfo('name');?>">
		</a>
	</div>
	
	<div id="contactlist">


		<div class="rphone">
		<!-- 	<i id="phonehead" class="pallid_fa_center fa fa-phone fa-3x"></i>	 -->
		
		<div class="pallid_telephons">
		<div class="header_addres">	
		<span style="font-family: 'Magistral Black', sans-serif; font-size: 17px;">Офис в Сочи:</span><br>
		<span>ул.Воровского, 41</span>
		</div>

		<a class="headcont" href="tel:<?php $my_phone =get_option('aven_my_phone'); echo $my_phone ?>">
		<span>Тел.: </span><span class="headcont" itemprop="telephone"><?php $my_phone =get_option('aven_my_phone'); echo $my_phone ?></span>
		</a>
		<a class="headcont" href="tel:<?php $my_phone =get_option('aven_my_phone'); echo $my_phone ?>">
		<span class="headcont" itemprop="telephone"><?php $my_phone =get_option('aven_my_phone2'); echo $my_phone ?></span>
		</a>
		<a class="headcont" href="tel:<?php $my_phone =get_option('aven_my_phone'); echo $my_phone ?>">
		<span class="headcont" itemprop="telephone"><?php $my_phone =get_option('aven_my_phone3'); echo $my_phone ?></span>
		</a>
		</div>
		</div>
		<div class="rmail">
		<a class="headcont" href="mailto:<?php $my_mail =get_option('aven_my_email'); echo $my_mail ?>">
		<!-- <i class="pallid_fa_center fa fa-envelope-o fa-3x"></i>	 -->
		<span style="font-family: 'Magistral Black', sans-serif; font-size: 17px;">Наш e-mail:</span><br/>
		<span class="headcont" itemprop="email"><?php $my_mail =get_option('aven_my_email'); echo $my_mail ?></span>
		</a>
		</div>
	</div>

</div>


	
</div>

</div><!--end masthead-->

<div id= "topmenu">
		<ul id="listtopmenu">
			<li>
				<a href="<?php bloginfo('siteurl');?>/property/arenda/" title="Аренда">
					<img src="<?php bloginfo('template_directory'); ?>/images/rent.png" width="100" height="100" alt="lorem" alt="Аренда">
				</a>
			</li>
			<li>
				<a href="<?php bloginfo('siteurl');?>/property/commercial/" title="Комерческая недвижимость">
					<img src="<?php bloginfo('template_directory'); ?>/images/commercial.png" width="100" height="100" alt="Комерческая недвижимость">
				</a>
			</li>
			<li>
				<a href="<?php bloginfo('siteurl');?>/property/newbuildings/" title="Новостройки">
					<img src="<?php bloginfo('template_directory'); ?>/images/newbuildings.png" width="100" height="100" alt="Новостройки">
				</a>
			</li>
			<li>
				<a href="<?php bloginfo('siteurl');?>/property/apartment/" title="Квартиры">
					<img src="<?php bloginfo('template_directory'); ?>/images/apartment.png" width="100" height="100" alt="Квартиры">
				</a>
			</li>
			<li>
				<a href="<?php bloginfo('siteurl');?>/property/homes/" title="Дома">
					<img src="<?php bloginfo('template_directory'); ?>/images/homes.png" width="100" height="100" alt="Дома">
				</a>
			</li>
			<li>
				<a href="<?php bloginfo('siteurl');?>/property/homestead/" title="Участки">
					<img src="<?php bloginfo('template_directory'); ?>/images/homestead.png " width="100" height="100" alt="Участки">
				</a>
			</li>
		</ul>	
	</div>

<div id="botmenu">
	<?php wp_nav_menu( array( 'container_id' => 'submenu', 'theme_location' => 'primary','menu_class'=>'sfmenu','fallback_cb'=> 'fallbackmenu' ) ); ?>
	<?php include (TEMPLATEPATH . '/searchform.php'); ?>	
</div><!-- END botmenu -->

<?php 
if (is_home()){
	include (TEMPLATEPATH . '/lib/slider.php'); 
}
?> 
 

<div id="wrapper"> 
<div id="casing">
