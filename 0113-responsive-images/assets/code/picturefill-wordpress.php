<?php 

/**
*
* Add image sizes 
* ( this goes in theme's functions.php or appropriate place )
*
*/
	add_image_size( 'thumb-300x300-f', 300, 300, false );
	add_image_size( 'thumb-480x480-f', 480, 480, false );
	add_image_size( 'thumb-640x640-f', 640, 640, false );
	add_image_size( 'thumb-800x800-f', 800, 800, false );

/**
*
* Set variables for the different sizes of the post featured image
* ( this goes on the page with the picturefill code where the images will be shown )
*
*/

	$thumb_300 = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumb-300x300-f' );
	$thumb_480 = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumb-480x480-f' );
	$thumb_640 = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumb-640x640-f' );
	$thumb_800 = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumb-800x800-f' );
	$full = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full' ); 

?>

<!-- 
* Picturefill Code
*
* Echo fetured image size variables for the Picturefill image source values.
* wp_get_attachment_image_src() returns an array, so [0] after the variable will get the image urls.
*
-->

<div data-picture data-alt="Picturefill!">
    <div data-src="<?php echo $thumb_300[0]; ?>"></div>
    <div data-src="<?php echo $thumb_480[0]; ?>" data-media="(min-width: 400px)"></div>
    <div data-src="<?php echo $thumb_640[0]; ?>" data-media="(min-width: 600px)"></div>
    <div data-src="<?php echo $thumb_800[0]; ?>" data-media="(min-width: 800px)"></div>
    <div data-src="<?php echo $full[0]; ?>" data-media="(min-width: 1000px)"></div>

    <!-- Fallback content for non-JS browsers. -->
    <noscript>
        <img src="<?php echo $thumb_640[0]; ?>" alt="Picturefill!">
    </noscript>
</div>
