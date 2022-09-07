<?php
get_header(); 

$language_class="";
if(qtranxf_getLanguage()=='en'){
  $language_class="en";
}
?>

<section class="section-mv">
  <div class="mv-first" style="background-image: url(<?php echo get_field('main_visual_1', $post->ID)['url']; ?>)">
    <div class="container">
      <div class="top-mv-first-titlearea">
        <p class="top-mv-first-title <?php echo $language_class; ?>"><?php echo get_field('main_visual_1_title', $post->ID); ?></p>
        <?php if(qtranxf_getLanguage()=='ja'): ?><p class="top-mv-first-en-title"><?php echo get_field('main_visual_1_en_title', $post->ID); ?></p><?php endif; ?>
      </div>
    </div>
  </div>
  <?php foreach(get_field('main_visual_list', $post->ID) as $main_visual): ?>
    <div class="mv-second" style="background-image: url(<?php echo $main_visual['background']['url']; ?>)">
      <div class="container">
        <div class="top-mv-second-titlearea">
          <?php foreach(explode("\n", $main_visual['title']) as $title_part): ?>
            <p class="top-mv-second-title <?php echo $language_class; ?>"><?php echo nl2br($title_part); ?></p>
          <?php endforeach; ?>
          <p class="top-mv-second-text <?php echo $language_class; ?>"><?php echo nl2br($main_visual['text']); ?></p>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</section>
<div class="mv-nav pc_only">
  <div class="container">
    <ul>
      <li class="top-nav-li">
        <a class="en" href="https://recruit.growthix.co.jp/">RECRUIT</a>
      </li>
      <?php 
      $page_work_flow = get_posts(array(
        'post_type'=>'page',
        'meta_query' => array(
          array(
            'key' => 'template_key',
            'value' => 'work-flow',
            'compare' => '=',
          )
        )
      ));
      if($page_work_flow):
      ?>
        <li class="top-nav-li">
          <?php if(qtranxf_getLanguage()=='en'): ?>
            <a class="en" href="<?php echo home_url() . '/' . $page_work_flow[0]->post_name; ?>/#section-price">M&A Process</a>
          <?php else: ?>
            <a href="<?php echo home_url() . '/' . $page_work_flow[0]->post_name; ?>/#section-price">料金体系</a>
          <?php endif; ?>
        </li>
      <?php 
      endif; 
      $page_contact = get_posts(array(
        'post_type'=>'page',
        'meta_query' => array(
          array(
            'key' => 'template_key',
            'value' => 'contact',
            'compare' => '=',
          )
        )
      ));
      if($page_contact):
      ?>
        <li class="top-nav-li">
          <?php if(qtranxf_getLanguage()=='en'): ?>
            <a class="en" href="<?php echo home_url() . '/' . $page_contact[0]->post_name; ?>/">Consultation</a>
          <?php else: ?>
            <a href="<?php echo home_url() . '/' . $page_contact[0]->post_name; ?>/">お問い合わせ</a>
          <?php endif; ?>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</div>

<?php
$post_loop = new WP_Query( array(
  'post_type' => 'post',
  'posts_per_page' => 3,
  'paged' => 0
)); ?>
<?php if ($post_loop->have_posts()): ?>
<section class="section-news">
  <div class="container size-sm">
    <h2 class="top-news-title news-section">NEWS</h2>
    <ul class="news-list">
      <?php while ( $post_loop->have_posts() ) : $post_loop->the_post();?>
      <li>
        <span class="js-open-detail" data-target="#post-<?php the_ID(); ?>">
          <span class="news-data">
            <?php the_time('Y.m.d'); ?>
          </span>
          <span class="news-title">
            <?php the_title(); ?>
          </span>
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
  <?php 
  $page_news = get_posts(array(
    'post_type'=>'page',
    'meta_query' => array(
      array(
        'key' => 'template_key',
        'value' => 'news',
        'compare' => '=',
      )
    )
  ));
  if($page_news):
  ?>
    <div class="news-more">
      <a class="top-news-more" href="<?php echo home_url(); ?>/<?php echo $page_news[0]->post_name; ?>/">more</a>
    </div> 
  <?php endif; ?>
</section>
<?php endif; wp_reset_query();?>

<?php foreach(get_field('block_list', $post->ID) as $block): ?>

  <?php if($block['block_type'] == 'message'): ?>
    <section class="section section-message">
      <div class="container size-sm">
        <?php if(qtranxf_getLanguage()=='en'): ?>
          <h2 class="common-title en"><?php echo $block['title']; ?></h2>
        <?php else: ?>
          <h2 class="common-title">
            <?php echo $block['title']; ?>
            <p class="common-title-en">
              <?php echo $block['title_written']; ?>
            </p>
          </h2>
        <?php endif; ?>
        <?php if($block['image']): ?>
          <div class="mb60">
            <img src="<?php echo $block['image']['url']; ?>">
          </div>
        <?php endif; ?>
        <?php foreach($block['sub_block_list_message'] as $sub_block): ?>
          <div class="tac mb60">
            <?php if($sub_block['block_name']): ?>
              <p class="company-block-entitle <?php if(qtranxf_getLanguage()=='en') {echo 'en';} ?>"><?php echo $sub_block['block_name']; ?></p>
            <?php 
            endif;
            if(qtranxf_getLanguage()=='ja' && $sub_block['title_written']): 
            ?>
              <p class="company-block-writetitle"><?php echo $sub_block['title_written']; ?></p>
            <?php 
            endif; 
            if($sub_block['title']): 
            ?>
              <p class="company-block-title <?php if(qtranxf_getLanguage()=='en') {echo 'en';} ?>"><?php echo $sub_block['title']; ?></p>
            <?php 
            endif;
            if($sub_block['subtitle']): 
            ?>
              <p class="company-block-subtitle <?php if(qtranxf_getLanguage()=='en') {echo 'en';} ?>"><?php echo $sub_block['subtitle']; ?></p>
            <?php endif; ?>
          </div>
          <?php if($sub_block['text_sp']): ?>
            <div class="top-message-subblock-text pc_only <?php echo $language_class; ?>"><?php echo html_paragraph($sub_block['text']); ?></div>
            <div class="top-message-subblock-text sp_only <?php echo $language_class; ?>"><?php echo html_paragraph($sub_block['text_sp']); ?></div>
          <?php else: ?>
            <div class="top-message-subblock-text"><?php echo html_paragraph($sub_block['text']); ?></div>
          <?php endif; ?>
        <?php endforeach; ?>
        <?php 
        if($block['more_link_page']) : 
          $more_link_id = '';
          if($block['more_link_id']) {
            $more_link_id = '#' . $block['more_link_id'];
          }
        ?>
          <div class="more-link top-more-link">
            <a href="<?php echo home_url() . '/' . $block['more_link_page']->post_name. '/' . $more_link_id; ?>">more</a>
          </div>
        <?php endif; ?>
      </div>
    </section>

  <?php elseif($block['block_type'] == 'news'): ?>
    <section class="section-news">
      <div class="container size-sm mb30">
        <?php if($block['special_title']): ?>
          <h2 class="top-news-title pc_only"><?php echo nl2br($block['title']); ?></h2>
          <h2 class="top-news-title sp_only"><?php echo nl2br($block['title_sp']); ?></h2>
        <?php else: ?>
          <h2 class="top-news-title"><?php echo nl2br($block['title']); ?></h2>
        <?php endif; ?>
        <?php if($block['subtitle']): ?>
          <h3 class="top-news-subtitle"><?php echo nl2br($block['subtitle']); ?></h3>
        <?php endif; ?>
      </div>
      <?php if($block['image']): ?>
        <div class="container size-sm">
          <img class="pc_only mhauto" src="<?php echo $block['image']['url']; ?>" width="800"><br>
          <img class="sp_only mhauto" src="<?php echo $block['image']['url']; ?>"><br>
        </div>
      <?php endif; ?>
      <div class="container size-sm mb30">
        <p class="original-content">
          <font color="#ffffff">
            <?php echo nl2br($block['text']); ?>
          </font>
        </p>
      </div>
      <?php 
      if($block['more_link_page']) : 
        $more_link_id = '';
        if($block['more_link_id']) {
          $more_link_id = '#' . $block['more_link_id'];
        }
      ?>
        <div class="news-more">
          <a class="top-news-more" href="<?php echo home_url() . '/' . $block['more_link_page']->post_name. '/' . $more_link_id; ?>">more</a>
        </div> 
      <?php endif; ?>
    </section>

  <?php elseif($block['block_type'] == 'search_fund'): ?>
    <section class="section section-search_fund">
      <div class="container size-sm">
        <?php if(qtranxf_getLanguage()=='en'): ?>
          <h2 class="common-title en"><?php echo $block['title']; ?></h2>
        <?php else: ?>
          <h2 class="common-title">
            <?php echo $block['title']; ?>
            <p class="common-title-en">
              <?php echo $block['title_written']; ?>
            </p>
          </h2>
        <?php endif; ?>
        <?php if($block['subtitle']): ?>
          <h3 class="pc_only top-search_fund-subtitle <?php echo $language_class; ?>"><?php echo str_replace(PHP_EOL, "", $block['subtitle']); ?></h3>
          <h3 class="sp_only top-search_fund-subtitle <?php echo $language_class; ?>"><?php echo nl2br($block['subtitle']); ?></h3>
        <?php endif; ?>
        <?php if($block['image']): ?>
          <div class="mb60">
            <img class="mhauto" src="<?php echo $block['image']['url']; ?>">
          </div>
        <?php endif; ?>
        <?php if($block['image']): ?>
          <p class="original-content"><?php echo $block['text']; ?></p>
        <?php endif; ?>
        <?php 
        if($block['more_link_page']) : 
          $more_link_id = '';
          if($block['more_link_id']) {
            $more_link_id = '#' . $block['more_link_id'];
          }
        ?>
          <div class="more-link top-more-link mb70">
            <a href="<?php echo home_url() . '/' . $block['more_link_page']->post_name. '/' . $more_link_id; ?>">more</a>
          </div>
        <?php endif; ?>
        <?php foreach($block['sub_block_list_search_fund'] as $sub_block): ?>
          <?php if($sub_block['title']): ?>
            <h3 class="top-search_fund-subblock-title mb30 <?php echo $language_class; ?>">
              <?php echo nl2br($sub_block['title']); ?>
              <?php if($sub_block['subtitle'] && qtranxf_getLanguage()=='en'): ?>
                <p class="top-search_fund-subblock-subtitle"><?php echo nl2br($sub_block['subtitle']); ?></p>
              <?php endif; ?>
            </h3>
          <?php endif; ?>
          <?php if($sub_block['image']): ?>
            <div class="mb60">
              <img src="<?php echo $sub_block['image']['url']; ?>">
            </div>
          <?php endif; ?>
          <?php if($sub_block['text']): ?>
            <p class="original-content"><?php echo $sub_block['text']; ?></p>
          <?php endif; ?>
          <?php 
          if($sub_block['more_link_page']) : 
            $more_link_id = '';
            if($sub_block['more_link_id']) {
              $more_link_id = '#' . $sub_block['more_link_id'];
            }
          ?>
            <div class="more-link top-more-link">
              <a href="<?php echo home_url() . '/' . $sub_block['more_link_page']->post_name. '/' . $more_link_id; ?>">more</a>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>
    </section>

  <?php elseif($block['block_type'] == 'toplink'): ?>
    <section class="section section-toplink">
      <div class="container size-sm">
        <?php if(qtranxf_getLanguage()=='en'): ?>
          <h2 class="common-title en"><?php echo $block['title']; ?></h2>
        <?php else: ?>
          <h2 class="common-title">
            <?php echo $block['title']; ?>
            <p class="common-title-en">
              <?php echo $block['title_written']; ?>
            </p>
          </h2>
        <?php endif; ?>
        <?php if($block['image']): ?>
          <div>
            <img class="mhauto" src="<?php echo $block['image']['url']; ?>">
          </div>
        <?php endif; ?>
        <?php 
        if($block['more_link_page']) : 
          $more_link_id = '';
          if($block['more_link_id']) {
            $more_link_id = '#' . $block['more_link_id'];
          }
        ?>
          <div class="more-link top-more-link">
            <a href="<?php echo home_url() . '/' . $block['more_link_page']->post_name. '/' . $more_link_id; ?>">more</a>
          </div>
        <?php endif; ?>
      </div>
    </section>

  <?php endif; ?>

<?php endforeach; ?>

<?php get_footer(); ?>