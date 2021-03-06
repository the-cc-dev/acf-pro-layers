<?php
/*
Template Name: APL Gallery
*/

// layer fields
$images = $layer['images'];
$layout = ( isset( $layer['layout'] ) ) ? $layer['layout'] : 'grid';
$columns = $layer['columns'];
$size = ( in_array( $layer['size'], get_intermediate_image_sizes() ) || $layer['size'] == 'full' ) ? $layer['size'] : 'thumbnail';
$show_titles = $layer['show_titles'];
$show_captions = $layer['show_captions'];
$link_to = $layer['link_to'];
$image_classes = ( isset( $layer['image_classes'] ) ) ? $layer['image_classes'] : null;
$css_classes = ( isset( $layer['css_classes'] ) ) ? $layer['css_classes'] : null;
$css_classes.= ' gallery gallery-columns-' . $columns;
$container = ( isset( $layer['container'] ) && !is_array( $layer['container'] ) ) ? $layer['container'] : 'container';
$attributes = ( isset( $layer['attributes'] ) ) ? $layer['attributes'] : null;
// default media container
$media_container = 'a';

// default media classes
$media_classes = null;

if( $args['include_wrapper'] ) {
	apl_open_layer( $layer_name, $apl_unique_id, $css_classes, $attributes, $container );
}

switch( $layout ) {
	case 'carousel':
	case 'grid':
	case 'slider':
		include( 'layout/' . $layout . '.php' );
	break;

	case 'slider-carousel':
		include( 'layout/slider.php' );
		include( 'layout/carousel.php' );
	break;

	case 'slider-grid':
		include( 'layout/slider.php' );
		include( 'layout/grid.php' );
	break;

	// catch all in case an invalid layout is requested
	default:
		include( 'layout/grid.php' );
	break;
}

if( $args['include_wrapper'] ) {
	apl_close_layer();
}
