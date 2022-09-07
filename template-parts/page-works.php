<div class="container">
  <div class="works-info">
    <?php if(qtranxf_getLanguage()=='en'): ?>
      <h2 class="common-title en">Transaction Result</h2>
    <?php else: ?>
      <h2 class="common-title">
        成約実績
        <p class="common-title-en">
          works
        </p>
      </h2>
    <?php endif; ?>
  </div>
</div>

<?php 
$args = array(
'post_type' => 'works',
'order'=> 'DESC',
'paged'=> $paged,
'orderby'=> 'date'
);
$the_query = new WP_Query( $args ); 
if ($the_query->have_posts()):
  while ($the_query->have_posts()) : 
    $the_query->the_post();
?>
<section class="section works-section">
  <div class="container">
    <div class="works-item">
      <?php $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
      <h3 class="works-title">
        <?php echo get_field('company_1_name'); ?><br class="sp_only" />×<br class="sp_only" /><?php echo get_field('company_2_name'); ?>
      </h3>
      <?php 
      $works_property_list = get_field('works_property_list');
      if($works_property_list) : 
      ?>
      <div class="works-property">
        <?php foreach($works_property_list as $works_property): ?>
          <div class="works-property-item">
            <p class="works-property-key"><?php echo $works_property['key']; ?></p>
            <p class="works-property-value"><?php echo $works_property['value']; ?></p>
          </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
      <div class="works-content">
        <div class="works-image">
          <?php if(qtranxf_getLanguage()=='en'): ?>
            <?php if(get_field('thumbnail_en')): ?>
              <img src="<?php the_field('thumbnail_en'); ?>" alt="<?php the_title(); ?>" />
            <?php else: ?>
              <img class="no-image" src="<?php echo get_template_directory_uri(); ?>/assets/img/works-company-image.png" alt="<?php the_title(); ?>" />
            <?php endif; ?>
          <?php else:?>
            <?php if($thumbnail): ?>
              <img src="<?php echo $thumbnail[0]; ?>" alt="<?php the_title(); ?>" />
            <?php else: ?>
              <img class="no-image" src="<?php echo get_template_directory_uri(); ?>/assets/img/works-company-image.png" alt="<?php the_title(); ?>" />
            <?php endif; ?>
          <?php endif;?>
        </div>
        <div class="works-company">
          <div class="works-company-item">
            <p class="works-company-type"><?php echo get_field('company_1_type'); ?></p>
            <p class="works-company-name"><?php echo get_field('company_1_name'); ?></p>
            <?php
            $company_property_list = get_field('company_1_property');
            if($company_property_list) : 
            ?>
              <div class="works-company-property">
                <?php foreach($company_property_list as $company_property): ?>
                  <div class="works-company-property-item">
                    <p class="works-company-property-key"><<?php echo $company_property['key']; ?>></p>
                    <p class="works-company-property-value"><?php echo nl2br($company_property['value']); ?></p>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
          <div class="works-company-mark"></div>
          <div class="works-company-item">
            <p class="works-company-type"><?php echo get_field('company_2_type'); ?></p>
            <p class="works-company-name"><?php echo get_field('company_2_name'); ?></p>
            <?php
            $company_property_list = get_field('company_2_property');
            if($company_property_list) : 
            ?>
              <div class="works-company-property">
                <?php foreach($company_property_list as $company_property): ?>
                  <div class="works-company-property-item">
                    <p class="works-company-property-key"><<?php echo $company_property['key']; ?>></p>
                    <p class="works-company-property-value"><?php echo nl2br($company_property['value']); ?></p>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <?php if($post->post_content): ?>
      <div class="works-slider">
        <div class="works-slider-handle">インタビューを見る</div>
        <div class="works-slider-inner">
          <?php the_content(); ?>
        </div>
      </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php 
  endwhile;
endif; 
?>

