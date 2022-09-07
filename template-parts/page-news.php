<div class="page-wrapper">
  <?php 
  $post_loop = new WP_Query( array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'paged' => 0
  ));
  if ($post_loop->have_posts()): 
  ?>
    <section class="section-news-list">
      <div class="container size-sm">
        <h2 class="common-title">NEWS</h2>
        <ul class="news-list">
          <?php while ( $post_loop->have_posts() ) : $post_loop->the_post();?>
            <li>
              <span class="js-open-detail" data-target="#post-<?php the_ID(); ?>">
                <div class="news-link">
                  <?php $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
                  <div class="img_box">
                    <img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>">
                  </div>
                  <div class="text_box">
                    <span class="news-data">
                      <?php the_time('Y.m.d'); ?>
                    </span>
                    <span class="news-title">
                      <?php the_title(); ?>
                    </span>
                  </div>
                </div>
              </span>
              <div id="post-<?php the_ID(); ?>" class="modal-content news-detaile">
                <div class="modal-bg js-close-detail"></div>
                <div class="inner">
                  <h3 class="news-detail-title">NEWS</h3>
                  <div class="news-data"><?php the_time('Y.m.d'); ?></div>
                  <h4 class="news-title"><?php the_title(); ?></h4>
                  <div class="news-content">
                    <?php $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
                    <img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>">
                    <?php the_content(); ?>
                  </div>
                </div>
                <div class="colse-btn js-close-detail">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icn_close.svg" alt="close" width="50">
                </div>
              </div>
            </li>
          <?php endwhile ?>
        </ul>
      </div> 
    </section>
  <?php 
  endif; 
  wp_reset_query();
  ?>
</div>