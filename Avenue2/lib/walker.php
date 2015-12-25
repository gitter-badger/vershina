<?php
if (!class_exists('Walker_Category_RadioList')):
class Walker_Category_RadioList extends Walker {
	var $tree_type = 'category';
	var $db_fields = array ('parent' => 'parent', 'id' => 'term_id'); //TODO: decouple this

	function start_lvl(&$output, $depth, $args) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent<ul class='children'>\n";
	}

	function end_lvl(&$output, $depth, $args) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}

	function start_el(&$output, $category, $depth, $args) {
		extract($args);
		if ( empty($taxonomy) )
			$taxonomy = 'category';

		if ( $taxonomy == 'category' )
			$name = 'post_category';
		else
			$name = 'tax_input['.$taxonomy.']';

		$class = in_array( $category->term_id, $popular_cats ) ? ' class="popular-category"' : '';

		//ТутМеняемСРадиоНаЧекбоксЕслиНадо
		//or ($category == 'bedrooms')   (($taxonomy =='property') or ($category == 'bedrooms')) 
		if (($taxonomy =='property') or ($taxonomy == 'bedrooms')) {
		 	$radioORcheckbox = 'checkbox';
		}else{
			$radioORcheckbox = 'radio';
		 }

		if ($taxonomy =='type')  {
		 	if ($category->name=='Featured'){
		 		$rusTypeName = 'Лучшее';
		 	}elseif ($category->name=='New') {
				$rusTypeName = 'Новое';
		 	}elseif ($category->name=='Reduced') {
				$rusTypeName = 'Уцененное';
		 	}elseif ($category->name=='Sold') {
				$rusTypeName = 'Проданное';
		 	}elseif ($category->name=='Stock') {
				$rusTypeName = 'Акция';
		 	}
		}else{
			$rusTypeName  = esc_html( apply_filters('the_category', $category->name )) ;
		}

		$output .= "\n<li id='{$taxonomy}-{$category->term_id}'$class>" . '<label class="selectit"><input value="' . $category->term_id . '" type="'.$radioORcheckbox.'" name="'.$name.'[]" id="in-'.$taxonomy.'-' . $category->term_id . '"' . checked( in_array( $category->term_id, $selected_cats ), true, false ) . disabled( empty( $args['disabled'] ), false, false ) . ' /> ' . $rusTypeName. '</label>';
	}

	function end_el(&$output, $category, $depth, $args) {
		$output .= "</li>\n";
	}
}
endif;
?>