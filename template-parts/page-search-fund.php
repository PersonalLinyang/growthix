<?php
$language_class="";
if(qtranxf_getLanguage()=='en'){
  $language_class="en";
}
?>

<div class="page-wrapper page search-fund">
  <section class="section">
    <div class="container size-sm">
      <?php if(qtranxf_getLanguage()=='en'): ?>
        <h2 class="common-title en">Features of Growthix's <br class="sp_only" />M&A business</h2>
      <?php else: ?>
        <h2 class="common-title">
          グロウシックスの<br class="sp_only" />M&Aの特徴
          <div class="common-title-en">
            search fund
          </div>
        </h2>
      <?php endif; ?>
      <?php foreach(get_field('top_block', $post->ID) as $top_block) :?>
        <div class="pc_only search-fund-bluetitle <?php echo $language_class; ?>"><?php echo str_replace(PHP_EOL, "", $top_block['title']); ?></div>
        <div class="sp_only search-fund-bluetitle <?php echo $language_class; ?>"><?php echo nl2br($top_block['title']); ?></div>
        <div class="mb60 sp_mb40">
          <img class="mhauto" src="<?php echo $top_block['image']['url']; ?>" />
        </div>
        <p class="mb60 sp_mb40"><?php echo html_paragraph($top_block['text']); ?></p>
      <?php endforeach; ?>
    </div>
  </section>
  <?php
  $block_list = get_field('block_list', $post->ID);
  foreach($block_list as $block) :
  ?>
  <section class="section<?php if($block['grey']) {echo ' bg-gray';} ?>" <?php if($block['block_id']) {echo 'id="' . $block['block_id'] . '"';} ?>>
    <div class="container size-sm">
      <?php 
      foreach($block['block_content'] as $block_content) :
      ?>
        <?php if($block_content['type'] == 'title'): ?>
          <h3 class="search-fund-title <?php echo $language_class; ?>">
            <?php if($block_content['blue_title']): ?>
              <div class="pc_only search-fund-bluetitle <?php echo $language_class; ?>"><?php echo str_replace(PHP_EOL, "", $block_content['blue_title']); ?></div>
              <div class="sp_only search-fund-bluetitle <?php echo $language_class; ?>"><?php echo nl2br($block_content['blue_title']); ?></div>
            <?php endif; ?>
            <?php if($block_content['sub_title']): ?>
              <div class="pc_only search-fund-subtitle <?php echo $language_class; ?>"><?php echo str_replace(PHP_EOL, "", $block_content['sub_title']); ?></div>
              <div class="sp_only search-fund-subtitle <?php echo $language_class; ?>"><?php echo nl2br($block_content['sub_title']); ?></div>
            <?php endif; ?>
            <?php if($block_content['main_title']): ?>
              <div class="pc_only"><?php echo str_replace(PHP_EOL, "", $block_content['main_title']); ?></div>
              <div class="sp_only"><?php echo nl2br($block_content['main_title']); ?></div>
            <?php endif; ?>
          </h3>
        <?php elseif($block_content['type'] == 'text'): ?>
          <p class="original-content mb30"><?php echo nl2br($block_content['text']); ?></p>
        <?php elseif($block_content['type'] == 'image'): ?>
          <div class="mb60 sp_mb40">
            <?php if(qtranxf_getLanguage()=='en' && $block_content['image_en']): ?>
              <img class="mhauto" src="<?php echo $block_content['image_en']['url']; ?>">
            <?php else: ?>
              <img class="mhauto" src="<?php echo $block_content['image']['url']; ?>">
            <?php endif; ?>
          </div>
        <?php elseif($block_content['type'] == 'slider'): ?>
          <div class="container size-sm">
            <div class="border-box">
              <h4 class="pc_only js-toggle-btn" data-target="#content"><?php echo str_replace(PHP_EOL, "", $block_content['slider_title']); ?></h4>
              <h4 class="sp_only js-toggle-btn" data-target="#content"><?php echo nl2br($block_content['slider_title']); ?></h4>
              <div id="content" class="">
                <p><?php echo nl2br($block_content['slider_text']); ?></p>
              </div> 
            </div>
          </div>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </section>
  <?php endforeach; ?>
</div>