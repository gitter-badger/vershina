<script type="text/javascript">

 jQuery(document).ready(function(){
    jQuery('#bxslider').bxSlider({
	   auto: true
  	//autoControls: true
	});
  });

</script>


<div id="pcover">
	<?php $slide_count =get_option('aven_slide_count'); ?>
	<?php $slide_cat = 'featured';?>
	<?php $slide_type ='listings';?>

<div id="pbox">
	<div id="bxslider">
	<?php 
		$my_query = new WP_Query('post_type='.$slide_type.'&type='.$slide_cat.'&showposts='.$slide_count.'');
		while ($my_query->have_posts()) : $my_query->the_post();
	?>
<div class="spanel">	

<div class="inpanel">

	<div class="spropmeta">
<h3><?php the_title(); ?></h3>
	<div class="sproplist"><span>Местоположение</span> <span class="propval"> <?php echo get_the_term_list( $post->ID, 'location', '', ' ', '' ); ?></span></div>
	<div class="sproplist"><span>Тип недвижимости</span> <span class="propval pallid_propval">
		<?php 
			//echo get_the_term_list( $post->ID, 'property', '', ' ', '' ); 
            $propertys=get_the_terms($post->ID,'property'); 
            $property = $propertys[0];
            echo '<a href="'. get_term_link( (int)$property->term_id, $property->taxonomy ) .'">'. $property->name .'</a>';
		?>
	</span></div>
	<div class="sproplist"><span>Площадь</span> <span class="propval">
		<?php 
			$space=get_post_meta($post->ID, 'wtf_space', true); 
			$spacemax=get_post_meta($post->ID, 'wtf_spacemax', true);
			if (iconv_strlen ($spacemax) != 0 ){
				$str = "от {$space} до {$spacemax} кв.м";
			}else{
				$str = "{$space} кв.м";
				}
			echo $str; ?>
		</span>
	</div>
	<div class="sproplist"><span>Комнаты</span> <span class="propval"> <?php echo get_the_term_list( $post->ID, 'bedrooms', '', ',', '' ); ?></span></div>
	<div class="sproplist"><span>Ванная</span> <span class="propval"> <?php $bath=get_post_meta($post->ID, 'wtf_bath', true); echo $bath; ?></span></div>
	<div class="sproplist"><span>Гараж</span> <span class="propval"> <?php $garage=get_post_meta($post->ID, 'wtf_garage', true); echo $garage; ?></span></div>
			
	</div>

<div class="inpabox">
<!-- 	&#8381; //Символ рубля-->
<span class="sprice"><?php $price=get_post_meta($post->ID, 'wtf_price', true); echo $price; ?> р.</span><span class="sint" style="border: 1px solid #4ABFFA;border-radius: 2px;background-color: #49BEF9;"><a style="font-family: 'Magistral Bold',sans-serif;color:white" href="<?php the_permalink() ?>">Посмотреть</a></span>

</div>
</div>
<a href="<?php the_permalink() ?>"><img class="slideimg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php echo get_image_url()?>&amp;h=480&amp;w=1500&amp;zc=1" title=""/></a>
</div>
<?php endwhile; ?>

</div><!-- Slider -->

</div><!-- pbox -->

</div> <!-- pcover -->
