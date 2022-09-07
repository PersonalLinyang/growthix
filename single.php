<?php
get_header(); ?>

<div id="post-<?php the_ID(); ?>" class="modal-content news-detaile single-content">
  <div class="single-bg"></div>
  <div class="inner">
    <h3 class="news-detail-title">NEWS</h3>
    <div class="news-data"><?php the_time('Y.m.d'); ?></div>
    <h4 class="news-title"><?php the_title(); ?></h4>
    <div class="news-content">
      <?php $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
      <img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>">
      <?php echo str_replace( ']]>', ']]&gt;', apply_filters( 'the_content', get_the_content(null, null, $post))); ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>