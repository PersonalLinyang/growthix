<div class="page-wrapper">
    <section class="section">
      <div class="container size-sm">
        <?php if(qtranxf_getLanguage()=='en'): ?>
          <h2 class="common-title en">Consultation</h2>
        <?php else: ?>
          <h2 class="common-title">
            お問い合わせ
            <p class="common-title-en">
              ConTacT
            </p>
          </h2>
        <?php endif; ?>
        <?php the_content(); ?>
      </div>
    </section>
  </div>
</div>

<div id="policy-detail" class="modal-content policy-detail">
  <div class="modal-bg js-close-detail"></div>
  <div class="inner">
    <?php if(qtranxf_getLanguage()=='en'): ?>
      <h3>Privacy Policy</h3>
    <?php else: ?>
      <h3>プライバシーポリシー</h3>
    <?php endif; ?>
    <?php foreach(get_field('block_list', $post->ID) as $block): ?>
      <?php 
      if(($block['display_rule']=='ja' && qtranxf_getLanguage()=='en') || ($block['display_rule']=='en' && qtranxf_getLanguage()=='ja')) {
        continue;
      }
      if($block['title']): 
      ?>
        <h4><?php echo nl2br($block['title']); ?></h4>
      <?php 
      endif;
      if($block['text']): 
      ?>
        <div class="mb40 sp_mb30"><p><?php echo nl2br($block['text']); ?></p></div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
  <div class="colse-btn js-close-detail">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icn_close.svg" alt="close" width="50">
  </div>
</div>