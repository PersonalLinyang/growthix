<?php
$members = get_posts(
  array(
    'posts_per_page' => -1,
    'post_type' => 'member',
    'post_status' => 'publish',
    'order_by' => 'menu_order',
    'order' => 'ASC',
  ),
);
?>

<div class="page-wrapper">
  <section class="section">
    <div class="container size-sm">
      <?php if(qtranxf_getLanguage()=='en'): ?>
        <h2 class="common-title en">Member</h2>
      <?php else: ?>
        <h2 class="common-title">
          メンバー
          <p class="common-title-en">
            our Team
          </p>
        </h2>
      <?php endif; ?>
      <div class="mb20"><img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="メンバー" /></div>
    </div>
  </section>
  <section class="section">
    <div class="container size-sm">
      <div class="col3 sp_col2">
        <?php 
        $counter = 0;
        foreach($members as $member): 
        ?>
          <div class="cell">
            <div class="js-open-detail" data-target="#detail-<?php echo $counter; ?>">
              <img src="<?php echo get_the_post_thumbnail_url($member->ID); ?>" alt="<?php echo $member->post_title; ?> │グロウシックスキャピタル株式会社（Growthix Capital株式会社） 取締役CFO / 一般社団法人ネクストプレナー協会 代表理事" />
              <p class="member-position"><?php echo nl2br(get_field('position', $member->ID)); ?></p>
              <p class="member-name"><?php echo $member->post_title; ?></p>
            </div>
          </div>
        <?php 
          $counter++;
        endforeach; 
        for($i = $counter; $i <= ceil(count($members) / 3) * 3; $i++):
        ?>
          <div class="cell"></div>
        <?php endfor; ?>
      </div>
    </div>
  </section>
  <?php 
  $counter = 0;
  foreach($members as $member): 
  ?>
  <div id="detail-<?php echo $counter; ?>" class="modal-content our-team-detaile">
    <div class="modal-bg js-close-detail"></div>
    <div class="inner">
      <?php if(qtranxf_getLanguage()=='en'): ?>
        <h3 class="member-detail-title en">Member</h3>
      <?php else: ?>
        <h3 class="member-detail-title">
          メンバー
          <p class="member-detail-title-en">
            our Team
          </p>
        </h3>
      <?php endif; ?>
      <div class="mb30"><img src="<?php echo get_the_post_thumbnail_url($member->ID); ?>" alt="<?php echo $member->post_title; ?>" /></div>
      <div class="text">
        <div class="title">
          <span class="name"><?php echo $member->post_title; ?></span>
          <?php if(qtranxf_getLanguage()=='en'): ?><br/><?php endif; ?>
          <span class="position"><?php echo get_field('position', $member->ID); ?></span>
        </div>
        <?php if(qtranxf_getLanguage()=='ja'){ echo $member->post_content; } ?>
      </div>
      <div class="prev-arrow js-open-detail" data-target="#detail-<?php if($counter == 0) { echo count($members) - 1; } else { echo $counter - 1; } ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icn_arrow_right_02.svg" alt="" width="26" />
      </div>
      <div class="next-arrow js-open-detail" data-target="#detail-<?php if($counter == count($members) - 1) { echo 0; } else { echo $counter + 1; } ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icn_arrow_right_02.svg" alt="" width="26" />
      </div>
    </div>
    <div class="colse-btn js-close-detail"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icn_close.svg" alt="close" width="50" /></div>
  </div>
  <?php 
    $counter++;
  endforeach; 
  ?>
</div>