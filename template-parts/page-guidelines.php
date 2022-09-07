<div class="page-wrapper">
  <section class="section">
    <h2 class="guidelines-title pc_only"><?php echo str_replace(PHP_EOL, "", get_field('main_title', $post->ID)); ?></h2>
    <h2 class="guidelines-title sp_only"><?php echo nl2br(get_field('main_title', $post->ID)); ?></h2>
    <div class="container size-sm mb30">
      <p class="original-content"><?php echo nl2br(get_field('main_text', $post->ID)); ?></p>
    </div>
    <?php foreach(get_field('block_list', $post->ID) as $block): ?>
      <h2 class="common-title pc_only"><?php echo $block['title']; ?></h2>
      <h2 class="guidelines-subtitle sp_only"><?php echo $block['title']; ?></h2>
      <div class="container size-sm mb30">
        <p class="original-content"><?php echo nl2br($block['text']); ?></p>
      </div>
      <?php foreach($block['block_content'] as $block_content): ?>
        <div class="container size-sm mb30">
          <div class="original-content">
            <p class="mb30"><strong><?php echo $block_content['title']; ?></strong></p>
            <?php echo nl2br($block_content['text']); ?>
          </div>
        </div>
      <?php endforeach; ?>
    <?php endforeach; ?>
  </section>
</div>