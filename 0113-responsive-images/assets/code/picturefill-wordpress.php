

<?php $thumb_300 = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumb-300x300_f' ); ?>
<?php $thumb_480 = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumb-480x480_f' ); ?>
<?php $thumb_640 = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumb-640x640_f' ); ?>
<?php $thumb_800 = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumb-800x800_f' ); ?>
<?php $full = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full' ); ?>

<h2>Picturefill.js Test</h2>
<div data-picture data-alt="Picturefill!">
    <div data-src="<?php echo $thumb_300[0]; ?>"></div>
    <div data-src="<?php echo $thumb_480[0]; ?>" data-media="(min-width: 400px)"></div>
    <div data-src="<?php echo $thumb_640[0]; ?>" data-media="(min-width: 600px)"></div>
    <div data-src="<?php echo $thumb_800[0]; ?>" data-media="(min-width: 800px)"></div>
    <div data-src="<?php echo $full[0]; ?>" data-media="(min-width: 1000px)"></div>

    <!-- Fallback content for non-JS browsers. Same img src as the initial, unqualified source element. -->
    <noscript>
        <img src="<?php echo $thumb_640[0]; ?>" alt="Picturefill!">
    </noscript>
</div>