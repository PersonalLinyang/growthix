<?php
$language_class="";
if(qtranxf_getLanguage()=='en'){
  $language_class="en";
}
?>

<div class="page-wrapper page work-flow">
  <section class="section">
    <div class="container size-sm">
      <?php if(qtranxf_getLanguage()=='en'): ?>
        <h2 class="common-title en">M&A process</h2>
      <?php else: ?>
        <h2 class="common-title">
          M&Aの進め方
          <div class="common-title-en">
            work flow
          </div>
        </h2>
      <?php endif; ?>
      <p class="mb60 sp_mb40">
        <img class="pc_only mhauto" src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" width="800">
        <img class="sp_only mhauto" src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" width="350">
      </p>
      <div>
        <?php if(qtranxf_getLanguage()=='en'): ?>
          <h3>Growthix's M&A process</h3>
        <?php else: ?>
          <h3>グロウシックスのM&Aの進め方</h3>
        <?php endif; ?>
        <div class="workflow-process">
          <?php foreach(get_field('process_list', $post->ID) as $key => $process): ?>
            <div class="workflow-process-item">
              <p class="workflow-process-no <?php echo $language_class; ?>"><?php echo str_pad(($key + 1), 2, 0, STR_PAD_LEFT); ?></p>
              <p class="workflow-process-process <?php echo $language_class; ?>"><?php echo nl2br($process['process']); ?></p>
              <?php if($process['text']): ?>
                <p class="workflow-process-text <?php echo $language_class; ?>"><?php echo $process['text']; ?></p>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <section id="section-price" class="section">
    <div class="container size-sm">
      <div class="mb40">
        <?php if(qtranxf_getLanguage()=='en'): ?>
          <p class="workflow-price-title en">M&A commission charge</p>
          <p class="workflow-price-subtitle en">M&A commission charge<br class="sp_only" /> in the form of Lehman</p>
        <?php else: ?>
          <p class="workflow-price-title">M&Aの手数料</p>
          <p class="workflow-price-subtitle">レーマン方式のM&A手数料率を採用</p>
        <?php endif; ?>
      </div>
      <div class="mb40 tac">
        <div class="workflow-price">
          <?php 
          $price_list = get_field('price_list', $post->ID);
          foreach($price_list as $key => $price): 
          ?>
            <div class="workflow-price-item <?php if($key == count($price_list) - 1) { echo 'last'; } ?>" style="background: <?php echo $price['background']; ?>">
              <div class="workflow-price-content">
                <p class="workflow-price-percent"><?php echo $price['percent']; ?><span class="small">%</span></p>
                <?php if(qtranxf_getLanguage()=='en'): ?>
                  <p class="workflow-price-text en">Acquisition<br>price</p>
                <?php else: ?>
                  <p class="workflow-price-text">売買価格</p>
                <?php endif; ?>
                <p class="workflow-price-price <?php echo $language_class; ?>"><?php echo nl2br(preg_replace('/\d+/', '<span class="number">${0}</span>', $price['price'])); ?></p>
              </div>
          <?php endforeach; ?>
          <?php foreach(get_field('price_list', $post->ID) as $price): ?>
            </div>
          <?php endforeach; ?>
          <?php if(qtranxf_getLanguage()=='en'): ?>
            <div class="workflow-price-least">Minimum commission charge：<?php echo get_field('least_price', $post->ID); ?></div>
          <?php else: ?>
            <div class="workflow-price-least">※最低手数料：<?php echo get_field('least_price', $post->ID); ?></div>
          <?php endif; ?>
        </div>
      </div>
      <div class="mb40">
        <div class="workflow-example <?php echo $language_class; ?>">
          <div class="workflow-example-top">
            <?php if(qtranxf_getLanguage()=='en'): ?>
              <p class="workflow-example-exampletext en">Example</p>
            <?php else: ?>
              <p class="workflow-example-exampletext">例</p>
            <?php endif; ?>
            <p class="workflow-example-title <?php echo $language_class; ?>"><?php echo get_field('example_text', $post->ID); ?></p>
          </div>
          <div class="workflow-example-content">
            <?php foreach(get_field('example_list', $post->ID) as $key => $example): ?>
              <div class="workflow-example-item <?php echo $language_class; ?>">
                <p class="workflow-example-normal workflow-example-key <?php echo $language_class; ?>"><?php echo chr(65+$key);?></p>
                <p class="workflow-example-normal workflow-example-price <?php echo $language_class; ?>"><?php echo $example['price'];?></p>
                <p class="workflow-example-normal workflow-example-mark">×</p>
                <p class="workflow-example-normal workflow-example-calc <?php echo $language_class; ?>"><?php echo $example['percent'];?>%</p>
                <p class="workflow-example-normal workflow-example-mark">=</p>
                <p class="workflow-example-normal workflow-example-calc <?php echo $language_class; ?>"><?php echo $example['total'];?></p>
              </div>
            <?php endforeach; ?>
          </div>
          <div class="workflow-example-result <?php echo $language_class; ?>">
            <p class="workflow-example-normal workflow-example-key">A</p>
            <?php foreach(get_field('example_list', $post->ID) as $key => $example): ?>
              <?php if($key == 0) { continue; } ?>
              <p class="workflow-example-normal workflow-example-mark">＋</p>
              <p class="workflow-example-normal workflow-example-key"><?php echo chr(65+$key);?></p>
            <?php endforeach; ?>
            <p class="workflow-example-normal workflow-example-mark">=</p>
            <p class="workflow-example-normal"><?php echo get_field('example_total', $post->ID); ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>