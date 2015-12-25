<?php get_header(); ?>

<div id="content" >

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="post" id="post-<?php the_ID(); ?>">
<div class="title">
<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка на запись <?php the_title(); ?>"><?php the_title(); ?></a></h2> 
</div>



<div class="entry">
<!-- НачалоУсловияШордкода-->
<?php 
$shortCode = get_post_meta($post->ID, 'wtf_sliderShortCode', true);
    if (strlen($shortCode)<>0) { 
   echo do_shortcode($shortCode);
} else { ?>

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
	<a href="<?php the_permalink() ?>"><img class="propsimg" src="<?php bloginfo('stylesheet_directory'); ?>/timthumb.php?src=<?php get_image_url(); ?>&amp;h=300&amp;w=650&amp;zc=1" alt=""/></a>
		<?php } else { ?>
	<a href="<?php the_permalink() ?>"><img class="propsimg" src="<?php bloginfo('template_directory'); ?>/images/dummy.jpg" alt="" /></a>
<?php } ?>
</div>

<?php } ?> <!-- КонецУсловияШордкода-->

<div class="propsmeta clearfix">
  <div class="propslist"><span>Цена - </span> <span class="propval"><?php 
      $price=get_post_meta($post->ID, 'wtf_price', true); 
      $pricemax=get_post_meta($post->ID, 'wtf_pricemax', true);
      $suffix=get_post_meta($post->ID, 'wtf_suffix', true);
      if (iconv_strlen ($pricemax) != 0 ){
        $str = "от {$price} руб.";
      }else{
        $str = "{$price} руб.";
        }

       if (iconv_strlen ($suffix) != 0 )
      {
          echo "{$str} {$suffix}";   
      } else{
          echo $str; 
      }

      ?></span></div>
  <div class="propslist"><span>Местоположение - </span> <span class="propval"> <?php echo get_the_term_list( $post->ID, 'location', '', ' ', '' ); ?></span></div>
  <div class="propslist"><span>Недвижимость - </span> <span class="propval">
        <?php 
            $propertys=get_the_terms($post->ID,'property'); 
            $property = $propertys[0];
            echo '<a href="'. get_term_link( (int)$property->term_id, $property->taxonomy ) .'">'. $property->name .'</a>';
        ?>
    </span></div>
  <div class="propslist">
        <?php
         $bath=get_post_meta($post->ID, 'wtf_bath', true); 
           if (iconv_strlen ($bath) != 0 )
             {
                echo "<span>Ванная - </span> <span class=\"propval\">{$bath}</span></div>";   
            } else{
                $ep=get_post_meta($post->ID, 'wtf_electricPower', true); 
                echo "<span>Эл.мощьность - </span> <span class=\"propval\">{$ep}</span></div>"; 
            } 

         ?>
    
    <div class="propslist"><span>Комнаты - </span> <span class="propval">
     <?php 
            $bedrooms = get_the_term_list( $post->ID, 'bedrooms', '', ',', '' );
            echo $bedrooms;   
    ?>
    </span></div>
  <div class="propslist"><span>Гараж - </span> <span class="propval"> <?php $garage=get_post_meta($post->ID, 'wtf_garage', true); echo $garage; ?></span></div>
</div>
<!-- <div class="wrap clearfix">
        <h4 class="title"></h4>
        <h5 class="price">
            <span class="status-label">
                Продажа            
            </span>
            <span>
                8 200 000 PУБ <small> - Главная, Новостройки, Элит</small>
            </span>
        </h5>
</div>-->

<?php the_content('Читать полностью &raquo;'); ?>

<div class="clear"></div>
<?php wp_link_pages(array('before' => '<p><strong>Страницы: </strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
</div>

<div class="intlink clearfix">
	<span class="intext"> Вас заинтересовал лот - <?php $pid=get_post_meta($post->ID, 'wtf_pid', true); echo $pid; ?> ? </span>
<!-- 	<span class="intbutt"> <a href="mailto:<?php echo the_author_meta('user_email'); ?>?Subject=<?php the_title(); ?> [<?php $pid=get_post_meta($post->ID, 'wtf_pid', true); echo $pid; ?>] ">Свяжитесь с нами</a> </span> -->
<span class="intbutt"><a class="whiteText" onclick="sample_click(this)">Свяжитесь с нами</a></span>
<script>
function sample_click() {
  var a = document.getElementById('name')
  a.focus();
}
</script>
</div>


<div class="hidden-print df_panel">
                        <div id="contactAgentBottom">
    
    <form id="feedback-form"  form method="POST" class="df_listingForm" novalidate="novalidate">
        <input data-val="true" data-val-number="The field ListingId must be a number." data-val-required="The ListingId field is required." id="ListingId" name="ListingId" type="hidden" value=<?php $pid=get_post_meta($post->ID, 'wtf_pid', true); echo $pid; ?> >
        <div class="pull-left">
            <div class="form-group">
                <input class="form-control" required id="name" name="UserFullName" placeholder="Ваше имя" type="text" style="cursor: pointer; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABHklEQVQ4EaVTO26DQBD1ohQWaS2lg9JybZ+AK7hNwx2oIoVf4UPQ0Lj1FdKktevIpel8AKNUkDcWMxpgSaIEaTVv3sx7uztiTdu2s/98DywOw3Dued4Who/M2aIx5lZV1aEsy0+qiwHELyi+Ytl0PQ69SxAxkWIA4RMRTdNsKE59juMcuZd6xIAFeZ6fGCdJ8kY4y7KAuTRNGd7jyEBXsdOPE3a0QGPsniOnnYMO67LgSQN9T41F2QGrQRRFCwyzoIF2qyBuKKbcOgPXdVeY9rMWgNsjf9ccYesJhk3f5dYT1HX9gR0LLQR30TnjkUEcx2uIuS4RnI+aj6sJR0AM8AaumPaM/rRehyWhXqbFAA9kh3/8/NvHxAYGAsZ/il8IalkCLBfNVAAAAABJRU5ErkJggg==); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;">
            </div>
            <div class="form-group">
                <input class="form-control" required  id="email" name="UserEmailAddress" placeholder="Ваш e-mail" type="text">
            </div>
            <div class="form-group df_last">
                <input class="form-control" id="phone" name="UserMobileNumber" placeholder="Ваш телефон" type="text">
             </div>
        </div>
        <div class="pull-right">
            <div class="form-group df_last">
                <textarea class="form-control" cols="20" data-val="true" data-val-length="Длина сообщения: минимум 6 знаков, максимум ― 250 знаков" data-val-length-max="250" data-val-length-min="6" data-val-required="Введите текст сообщения" id="MessageText" name="MessageText" placeholder="Меня заинтересовал этот объект, пожалуйста, расскажите о нем более подробней." rows="4">Меня заинтересовал этот объект, пожалуйста, расскажите о нем более подробней.</textarea>                
             </div>
        </div>
        <!-- <div class="clearfix"></div>
        <div class="form-group df_last">
            <div class="checkbox">
                <label>
                    <input checked="checked" data-val="true" data-val-required="The AlertOptIn field is required." id="AlertOptIn" name="AlertOptIn" type="checkbox" value="true"><input name="AlertOptIn" type="hidden" value="false">
                    Я хочу получать на почту похожие объявления от Domofond.ru
                </label>
            </div>
        </div> -->
        <div class="clearfix"></div>
        <div class="text-center">
            <button class="df_btn_spinner btn btn-lg btn-primary" id="submit-request-button" title="Отправить">    <span class="df_spinnerText">
        Отправить
    </span>
    <i class="fa fa-lg fa-spinner fa-pulse df_spinner"></i></button>
            <div class="clearfix"></div>
             <!-- <p>Отправляя это&nbsp;сообщение, вы принимаете условия&nbsp;<a href="/polzovatelskoe-soglashenie" class = "sertext" target="_blank">Пользовательского соглашения</a></p> -->
            <?php feedback(); ?>
        </div>
    </form>
</div>
</div>


</div>
<?php get_related_posts_thumbnails(); ?> 

<?php comments_template(); ?>
<?php endwhile; else: ?>

		<h1 class="title">Не найдено</h1>
		<p>Извините, ничего не нашлось. Воспользуйтесь навигацией или поиском, чтобы найти необходимую вам информацию.</p>

<?php endif; ?>


</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
