<div class="page-wrapper">
  <section class="section">
    <p class="original-content mb30">
      <img class="pc_only mhauto" src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" width="800">
      <img class="sp_only mhauto" src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" width="350">
    </p>
    <?php
    $block_list = get_field('block_list', $post->ID);
    foreach($block_list as $block) :
    ?>
    <div class="container size-sm mb60">
      <?php if($block['title']): ?>
      <h2 class="searchfund-title<?php if(qtranxf_getLanguage()=='en') { echo ' en';} ?>"><?php echo nl2br($block['title']); ?></h2>
      <?php 
      endif;
      foreach($block['block_content'] as $block_content) :
      ?>
        <?php if($block_content['type'] == 'subtitle'): ?>
          <h3 class="searchfund-subtitle"><?php echo nl2br($block_content['subtitle']); ?></h3>
        <?php elseif($block_content['type'] == 'text'): ?>
          <?php if($block_content['text_strong']): ?>
            <p class="original-content mb30"><strong><?php echo nl2br($block_content['text']); ?></strong></p>
          <?php else: ?>
            <p class="original-content mb30"><?php echo nl2br($block_content['text']); ?></p>
          <?php endif; ?>
        <?php elseif($block_content['type'] == 'image'): ?>
          <p class="original-content mb30">
            <?php if(qtranxf_getLanguage()=='en' && $block_content['image_en']): ?>
              <img class="pc_only mhauto" src="<?php echo $block_content['image_en']['url']; ?>" width="750">
              <img class="sp_only mhauto" src="<?php echo $block_content['image_en']['url']; ?>" width="350">
            <?php else: ?>
              <img class="pc_only mhauto" src="<?php echo $block_content['image']['url']; ?>" width="750">
              <img class="sp_only mhauto" src="<?php echo $block_content['image']['url']; ?>" width="350">
            <?php endif; ?>
          </p>
        <?php elseif($block_content['type'] == 'link'): ?>
          <p class="original-content">【関連】<a href="<?php echo $block_content['link_url']; ?>"><?php echo $block_content['link_text']; ?></a></p>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
  </section><!-- page-wrapper -->
</div>