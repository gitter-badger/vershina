<?php get_header(); ?>

<div id="content">
<!--ПишемТутуЗапрос-->
<!--ПишемТутуЗапрос-->
<!--ПишемТутуЗапрос-->
<!--ПишемТутуЗапрос-->
<!--ПишемТутуЗапрос-->

<?php if (have_posts()) : ?>
<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>	

<div class="post propbox <?php echo "lastbox"; ?> clearfix" id="post-<?php the_ID(); ?>">
<div class="title">
    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка на запись <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>
<div class="archimg">

<?php  if( has_term( 'featured', 'type', $post->ID ) ) { ?>
<span class="featspan">Лучшее</span>
<?php } else if ( has_term( 'sold', 'type', $post->ID ) ){ ?>
<span class="soldspan">Проданное</span>
<?php } else if ( has_term( 'reduced', 'type', $post->ID ) ){ ?>
<span class="redspan">Уцененное</span>
<?php } else if ( has_term( 'New', 'type', $post->ID ) ){ ?>
<span class="newspan">Новое</span>
<?php } else if ( has_term( 'Stock', 'type', $post->ID ) ){ ?>
<span class="stockspan">Акция</span>
<?php } ?>

<?php
	if ( has_post_thumbnail() ) { ?>
	<a href="<?php the_permalink() ?>"><img class="propimg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=180&amp;w=310&amp;zc=1" alt=""/></a>
		<?php } else { ?>
	<a href="<?php the_permalink() ?>"><img class="propimg" src="<?php bloginfo('template_directory'); ?>/images/dummy.jpg" alt="" /></a>
<?php } ?>
</div>


<div class="propmeta">
	<div class="proplist"><span>Цена</span> <span class="propval" style="color: #0486CA;font-size: 15px;font-weight: 900;"> 
    <?php 
      $price=get_post_meta($post->ID, 'wtf_price', true); 
      $pricemax=get_post_meta($post->ID, 'wtf_pricemax', true);
      $suffix=get_post_meta($post->ID, 'wtf_suffix', true);
      if (iconv_strlen ($pricemax) != 0 ){
        $str = "от {$price} до {$pricemax} руб.";
      }else{
        $str = "{$price} руб.";
        }

      if (iconv_strlen ($suffix) != 0 )
      {     
          if (iconv_strlen ("{$str} {$suffix}") > 43 )
          {   
            if ($suffix == 'за квартиру'){
              $suffix = 'за кв';
            }
            echo "{$str} {$suffix}"; 
          }else{
            echo "{$str} {$suffix}"; 
          }  
      } else{
          echo $str; 
      }
      ?>
  </span></div>
	<div class="proplist"><span>Местоположение</span> <span class="propval"> <?php echo get_the_term_list( $post->ID, 'location', '', ' ', '' ); ?></span></div>
	<div class="proplist"><span>Тип недвижимости</span> <span class="propval"><?php echo get_the_term_list( $post->ID, 'property', '', ', ', '' ); ?></span></div>
	<div class="proplist"><span>Площадь</span> <span class="propval">
   <?php 
      $space=get_post_meta($post->ID, 'wtf_space', true); 
      $spacemax=get_post_meta($post->ID, 'wtf_spacemax', true);
      if (iconv_strlen ($spacemax) != 0 ){
        $str = "от {$space} до {$spacemax} кв.м";
      }else{
        $str = "{$space} кв.м";
        }
      echo $str; ?>
  </span></div>
	</div>
	<!-- <div class="entry">
		<?php wpe_excerpt('wpe_excerptlength_archive', ''); ?>
		<a class="morer" href="<?php the_permalink() ?>">Подробней</a>
		<div class="clear"></div>
	</div> -->

</div>

<?php endwhile; ?>

<?php getpagenavi(); ?>

<?php else : ?>

	<h1 class="title">Не найдено</h1>
	<p>Извините, ничего не нашлось. Воспользуйтесь навигацией или поиском, чтобы найти необходимую вам информацию.</p>

<?php endif; ?>


   
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
