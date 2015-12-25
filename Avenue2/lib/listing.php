<!--<div id="browselist" class="clearfix">
<h3 class="sidetitle">Параметры поиска</h3>
<p class="listin"><span>Местоположение</span><br/><?php the_dropdown_taxonomy('location'); ?></p>
<p class="listir"><span>Тип недвижимости</span><br/><?php the_dropdown_taxonomy('property'); ?></p>
<p class="listin"><span>Площадь в м2</span><br/><?php the_dropdown_taxonomy('area'); ?></p>
<p class="listir"><span>Спальни</span><br/><?php the_dropdown_taxonomy('bedrooms'); ?></p>
<p class="listin"><span>Тип списка</span><br/><?php the_dropdown_taxonomy('type'); ?></p>
<p class="listir"><span>Ценовой диапазон</span><br/><?php the_dropdown_taxonomy('range'); ?></p>
</div>-->

<?php get_template_part( 'filtr'); ?>
<form action="/" method="get">
<div id="browselist" class="clearfix">
<h3 class="sidetitle">Поиск недвижимости</h3>
<p class="listin"><span>Местоположение</span><br/><?php the_dropdown_taxonomy('location'); ?></p>
<p class="listir"><span>Тип недвижимости</span><br/><?php the_dropdown_taxonomy('property'); ?></p>
<p class="listin"><span>Комнаты</span><br/><?php the_dropdown_taxonomy('bedrooms'); ?></p>
<p class="listir"><span>Статус</span><br/><?php the_dropdown_taxonomy('range'); ?></p>
<p class="listin"><span>Цена</span><br/><?php the_dropdown_metadata('minprice'); ?></p>
<p class="listir"><span>.</span><br/><?php the_dropdown_metadata('maxprice'); ?></p>
<p class="listin"><span>Площадь</span><br/><?php the_dropdown_metadata('minsquare'); ?></p>
<p class="listir"><span>.</span><br/><?php the_dropdown_metadata('maxsquare'); ?></p>
<button class="df_btn_spinner btn-pallid btn-lg-pallid btn-primary" id="submit-search-button" title="Поиск">
    <span class="df_spinnerText">
        Поиск
    </span>
 <i class="fa fa-lg fa-spinner fa-pulse df_spinner"></i>
</button>

</div>
</form>