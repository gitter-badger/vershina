<?php get_header(); ?>

<div id="content" >

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
<div class="title">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка на запись <?php the_title(); ?>"><?php the_title(); ?></a></h2>
</div>

<div class="postmeta">
		<span class="author">Автор:  <?php the_author(); ?> </span>
		<span class="clock"> Опубликовано <?php the_time('j - M - Y'); ?></span>
		<span class="comm"><?php comments_popup_link('Оставить комментарий', 'Комментарии (1)', 'Комментарии (%)'); ?></span>
</div>


<div class="entry">
<?php the_content('Читать полностью &raquo;'); ?>

<div class="clear"></div>
<?php wp_link_pages(array('before' => '<p><strong>Страницы: </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>


<div class="singleinfo">
<span class="category">Категории: <?php the_category(', '); ?> </span>
</div>

</div>

<?php comments_template(); ?>
<?php endwhile; else: ?>

		<h1 class="title">Не найдено</h1>
		<p>Извините, ничего не нашлось. Воспользуйтесь навигацией или поиском, чтобы найти необходимую вам информацию.</p>

<?php endif; ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
