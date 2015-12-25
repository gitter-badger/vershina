<?php get_header(); ?>

<div id="content">
<h1 class="pagetitle">		
<?php
	$mySearch =& new WP_Query("s=$s & showposts=-1");
	$num = $mySearch->post_count;
	echo $num.' результатов поиска для '; the_search_query();
	?> in <?php  get_num_queries(); ?> <?php timer_stop(1); ?> seconds.
</h1>

<?php if (have_posts()) : ?>
<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>	

<div class="post spost" id="post-<?php the_ID(); ?>">

<div class="title">
		<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка на запись <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>

<div class="entry">
	<?php wpe_excerpt('wpe_excerptlength_archive', ''); ?>
	
</div>

</div>

<?php endwhile; ?>

<?php getpagenavi(); ?>

<?php else : ?>

<div class="title">
		<h2>Ваш поисковый запрос - <?php the_search_query();?> - не дал результатов.</h2>
</div>


<div class="entry">
<p>Рекомендации:</p>
<ul>
   <li>  Убедитесь, что вы правильно написали искомое слово.</li>
   <li>  Попробуйте другое ключевое слово.</li>
   <li>  Попробуйте расширить ваш запрос.</li>
</ul>
</div>

<?php endif; ?>


   
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>