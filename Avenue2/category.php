<?php get_header(); ?>

<div id="content" >
		<?php if (have_posts()) : ?>

		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_category()) { ?>
		<h1 class="pagetitle">Архив категории &#8216;<?php echo single_cat_title(); ?>&#8217;</h1>

 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h1 class="pagetitle">Архив за <?php the_time('j F Y'); ?></h1>

	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h1 class="pagetitle">Архив за <?php the_time('F, Y'); ?></h1>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h1 class="pagetitle">Архив <?php the_time('Y'); ?> года</h1>

	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h1 class="pagetitle">Архив автора</h1>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h1 class="pagetitle">Архив блога</h1>
		<?php } ?>




<?php while (have_posts()) : the_post(); ?>

		
<div class="post" id="post-<?php the_ID(); ?>">
<div class="title">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка на запись <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>
<div class="postmeta">
	<span class="author">Автор:  <?php the_author(); ?> </span> <span class="clock">  <?php the_time('j - M - Y'); ?></span> <span class="comm"><?php comments_popup_link('Оставить комментарий', 'Комментарии (1)', 'Комментарии (%)'); ?></span>
</div>
<div class="entry">


<?php
if ( has_post_thumbnail() ) { ?>
	<img class="postimg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=150&amp;w=200&amp;zc=1" alt="" />
<?php } else { ?>
	<img class="postimg" src="<?php bloginfo('template_directory'); ?>/images/dummy.jpg" alt="" />
<?php } ?>

<?php wpe_excerpt('wpe_excerptlength_index', ''); ?>
<div class="clear"></div>
</div>


<div class="singleinfo">
<span class="category">Категории: <?php the_category(', '); ?> </span>
</div>

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