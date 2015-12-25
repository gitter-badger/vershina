<?php 

/* Property Listings*/

function post_type_listings() {
register_post_type(
                    'listings', 
                    array( 'public' => true,
					 		'publicly_queryable' => true,
							'has_archive' => true, 
							'hierarchical' => false,
							'menu_icon' => get_stylesheet_directory_uri() . '/images/listing.png',
                    		'labels'=>array(
    									'name' => _x('Списки', 'post type general name'),
    									'singular_name' => _x('Список', 'post type singular name'),
    									'add_new' => _x('Добавить новый', 'listing'),
    									'add_new_item' => __('Добавить новый список'),
    									'edit_item' => __('Редактировать список'),
    									'new_item' => __('Новый список'),
    									'view_item' => __('Просмотреть список'),
    									'search_items' => __('Искать списки'),
    									'not_found' =>  __('Списки не найдены'),
    									'not_found_in_trash' => __('Списки не найдены в Корзине'), 
    									'parent_item_colon' => ''
  										),							 
                            'show_ui' => true,
							'menu_position'=>5,
							'query_var' => true,
							'rewrite' => TRUE,
							'rewrite' => array( 'slug' => 'listing', 'with_front' => FALSE,),
							'register_meta_box_cb' => 'mytheme_add_box',
							'supports' => array(
							 			'title',
										'thumbnail',
										'comments',
										'editor'
										)
							) 
					);
				} 
add_action('init', 'post_type_listings');

/* Price range taxonomy */

function create_range_taxonomy() 
{
$labels = array(
	  						  'name' => _x( 'Статусы', 'taxonomy general name' ),
    						  'singular_name' => _x( 'Статусы', 'taxonomy singular name' ),
    						  'search_items' =>  __( 'Искать статусы' ),
   							  'all_items' => __( 'Все статусы' ),
    						  'parent_item' => __( 'Родительский статусы' ),
   					   		  'parent_item_colon' => __( 'Родительский статусы:' ),
   							  'edit_item' => __( 'Редактировать статусы' ), 
  							  'update_item' => __( 'Обновить статусы' ),
  							  'add_new_item' => __( 'Добавить новый статус' ),
  							  'new_item_name' => __( 'Имя нового статуса' ),
); 	
register_taxonomy('range',array('listings'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'range' ),
  ));
}

/* Location Taxonomy */

function create_location_taxonomy() 
{
$labels = array(
	  						  'name' => _x( 'Местоположение', 'taxonomy general name' ),
    						  'singular_name' => _x( 'Местоположение', 'taxonomy singular name' ),
    						  'search_items' =>  __( 'Искать местоположение' ),
   							  'all_items' => __( 'Все местоположения' ),
    						  'parent_item' => __( 'Родительское местоположение' ),
   					   		  'parent_item_colon' => __( 'Родительское местоположение:' ),
   							  'edit_item' => __( 'Редактировать местоположение' ), 
  							  'update_item' => __( 'Обновить местоположение' ),
  							  'add_new_item' => __( 'Добавить новое местоположение' ),
  							  'new_item_name' => __( 'Имя нового местоположения' ),
); 	
register_taxonomy('location',array('listings'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'location' ),
  ));

}

/* Type of property Taxonomy */

function create_property_taxonomy() 
{
$labels = array(
	  						  'name' => _x( 'Тип недвижимости', 'taxonomy general name' ),
    						  'singular_name' => _x( 'Тип недвижимости', 'taxonomy singular name' ),
    						  'search_items' =>  __( 'Искать тип недвижимости' ),
   							  'all_items' => __( 'Все типы недвижимости' ),
    						  'parent_item' => __( 'Родительский тип недвижимости' ),
   					   		  'parent_item_colon' => __( 'Родительский тип недвижимости:' ),
   							  'edit_item' => __( 'Редактировать тип недвижимости' ), 
  							  'update_item' => __( 'Обновить тип недвижимости' ),
  							  'add_new_item' => __( 'Добавить тип недвижимости' ),
  							  'new_item_name' => __( 'Новый тип недвижимости' ),
); 	
register_taxonomy('property',array('listings'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'property' ),
  ));

}

/* Area Taxonomy */

function create_area_taxonomy() 
{
$labels = array(
	  						  'name' => _x( 'Площадь (удал.)', 'taxonomy general name' ),
    						  'singular_name' => _x( 'Площадь (удал.)', 'taxonomy singular name' ),
    						  'search_items' =>  __( 'Искать площадь' ),
   							  'all_items' => __( 'Все площади' ),
    						  'parent_item' => __( 'Родительская площадь' ),
   					   		  'parent_item_colon' => __( 'Родительская площадь:' ),
   							  'edit_item' => __( 'Редактировать площадь' ), 
  							  'update_item' => __( 'Обновить площадь' ),
  							  'add_new_item' => __( 'Добавить площадь' ),
  							  'new_item_name' => __( 'Новая площадь' ),
); 	
register_taxonomy('area',array('listings'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'area' ),
  ));

}


/* Listing type Taxonomy */

function create_type_taxonomy() 
{
$labels = array(
	  						  'name' => _x( 'Тип списка', 'taxonomy general name' ),
    						  'singular_name' => _x( 'Тип списка', 'taxonomy singular name' ),
    						  'search_items' =>  __( 'Искать тип списка' ),
   							  'all_items' => __( 'Все типы списка' ),
    						  'parent_item' => __( 'Родительский тип списка' ),
   					   		  'parent_item_colon' => __( 'Родительский тип списка:' ),
   							  'edit_item' => __( 'Редактировать тип списка' ), 
  							  'update_item' => __( 'Обновить тип списка' ),
  							  'add_new_item' => __( 'Добавить тип списка' ),
  							  'new_item_name' => __( 'Новый тип списка' ),
); 	
register_taxonomy('type',array('listings'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => 'radio',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type' ),
  ));

}


/* Bedrooms Taxonomy */

function create_bedrooms_taxonomy() 
{
$labels = array(
	  						  'name' => _x( 'Комнаты', 'taxonomy general name' ),
    						  'singular_name' => _x( 'Комнаты', 'taxonomy singular name' ),
    						  'search_items' =>  __( 'Искать комнаты' ),
   							  'all_items' => __( 'Все комнаты' ),
    						  'parent_item' => __( 'Родительские комнаты' ),
   					   		  'parent_item_colon' => __( 'Родительские комнаты:' ),
   							  'edit_item' => __( 'Редактировать комнаты' ), 
  							  'update_item' => __( 'Обновить комнаты' ),
  							  'add_new_item' => __( 'Добавить комнаты' ),
  							  'new_item_name' => __( 'Новые комнаты' ),
); 	
register_taxonomy('bedrooms',array('listings'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'bedroom' ),
    'show_admin_column'     => false,
    'post_categories_meta_box'           => true, 
  ));

}



add_action( 'init', 'create_area_taxonomy', 0);
add_action( 'init', 'create_range_taxonomy', 0 );
add_action( 'init', 'create_location_taxonomy', 0 );
add_action( 'init', 'create_property_taxonomy', 0 );
add_action( 'init', 'create_type_taxonomy', 0 );
add_action( 'init', 'create_bedrooms_taxonomy', 0 ); 




/* PRE-DEFINE TERMS */

##Featured##
function add_range_term_featured() {
if(!is_term('Featured', 'type')){
  wp_insert_term('Featured', 'type');
}
}

##Reduced#
function add_range_term_reduced() {
if(!is_term('Reduced', 'type')){
  wp_insert_term('Reduced', 'type');
}
}

##Sold#
function add_range_term_sold() {
if(!is_term('Sold', 'type')){
  wp_insert_term('Sold', 'type');
}
}

##New#
function add_range_term_new() {
if(!is_term('New', 'type')){
  wp_insert_term('New', 'type');
}
}

##Stock#
function add_range_term_stock() {
if(!is_term('Stock', 'type')){
  wp_insert_term('Stock', 'type');
}
}



add_action( 'init', 'add_range_term_featured' );
add_action( 'init', 'add_range_term_reduced' );
add_action( 'init', 'add_range_term_sold' );
add_action( 'init', 'add_range_term_new' );
add_action( 'init', 'add_range_term_stock' );





?>
