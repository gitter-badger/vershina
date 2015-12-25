<?php if (!empty($_GET["mark"])) { $mark = $_GET['mark']; } ?>
<?php if (!empty($_GET["minprice"])) { $price1 = $_GET['minprice']; } else { $minprice = '0';} ?>
<?php if (!empty($_GET["maxprice"])) { $price2 = $_GET['maxprice']; } else { $maxprice = '999999999';} ?>

<?php if (!empty($_GET["model"])) { $model = $_GET['model']; } ?>
<?php if (!empty($_GET["type_moto"])) { $type_moto = $_GET['type_moto']; } ?>
<?php if (!empty($_GET["year_moto"])) { $year_moto = $_GET['year_moto']; } ?>
<?php if (!empty($_GET["km_moto"])) { $km_moto = $_GET['km_moto']; } ?>
<?php if (!empty($_GET["v3_moto"])) { $v3_moto = $_GET['v3_moto']; } ?>

<?php if (!empty($_GET["v_moto_ot"])) { $v_moto_ot = $_GET['v_moto_ot']; } else { $v_moto_ot = '0';} ?>
<?php if (!empty($_GET["v_moto_do"])) { $v_moto_do = $_GET['v_moto_do']; } else { $v_moto_do = '999999999';} ?>
<?php if (!empty($_GET["year_moto_ot"])) { $year_moto_ot = $_GET['year_moto_ot']; } else { $year_moto_ot = '0';} ?>
<?php if (!empty($_GET["year_moto_do"])) { $year_moto_do = $_GET['year_moto_do']; } else { $year_moto_do = '999999999';} ?>
<?php if (!empty($_GET["km_moto"])) { $km_moto = $_GET['km_moto']; } else { $km_moto = '999999999';} ?>

<?php

if ($minprice or $maxprice or $mark or $model or $type_moto or $year_moto or $km_moto or $v3_moto or $v_moto_ot or $v_moto_do or $year_moto_ot or $year_moto_do or $s) {
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args=array(
'category_name' => $mark,
'paged'=>$paged,
's'=>$s,
'meta_query' => array(
array(
'key' => 'wft_price',
'value' => array( $minprice, $maxprice ),
'type' => 'numeric',
'compare' => 'BETWEEN'
),

array(
'key' => 'wpcf-type_moto',
'value' => $type_moto
),

array(
'key' => 'wpcf-year_moto',
'value' => array( $year_moto_ot, $year_moto_do ),
'type' => 'numeric',
'compare' => 'BETWEEN'
),

array(
'key' => 'wpcf-km_moto',
'value' => array( 0, $km_moto ),
'type' => 'numeric',
'compare' => 'BETWEEN'
),

array(
'key' => 'wpcf-v3_moto',
'value' => array( $v_moto_ot, $v_moto_do ),
'type' => 'numeric',
'compare' => 'BETWEEN'
),
)

);

query_posts($args);

} else {
echo '';
} ?>