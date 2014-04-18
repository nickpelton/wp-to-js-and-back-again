<?php

// Function to insert default thumbnail is none exists
function fpo_the_post_thumbnail($post_id, $size, $attr = ''){

	if($thumb = get_the_post_thumbnail( $post_id, $size, $attr)){

		echo $thumb;

	}else{

		// Get the thumbnail size and create a FPO image
		global $_wp_additional_image_sizes;
		
		$image_size = array(
			'width'=>$_wp_additional_image_sizes[$size]['width'],
			'height'=>$_wp_additional_image_sizes[$size]['height'],
		);

		// control in crazy sizes
		if($image_size['height'] > 600){
			$image_size['height'] = intval($image_size['width'] / 2);
		}

		echo "<img src='http://fpoimg.com/".$image_size['width']."x".$image_size['height']."?text=For Placement Only' alt='For Placement Only' title='For Placement Only'/>";

	}

} // end FPO