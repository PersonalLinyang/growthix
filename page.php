<?php
the_post();

$thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

$template_key = get_field("template_key");

if(!$template_key) {
  header( "location: " . home_url() );
}

get_header(); 

get_template_part( 'template-parts/page-' . $template_key ); 

get_footer(); 

?>