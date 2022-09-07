<div class="page-wrapper">
  <section class="section">
    <div class="container size-sm">
      <?php if(qtranxf_getLanguage()=='en'): ?>
        <h2 class="common-title en">Message from the President</h2>
      <?php else: ?>
        <h2 class="common-title">
          企業理念
          <p class="common-title-en">
            Top message
          </p>
        </h2>
      <?php endif; ?>
      <div class="mb60">
        <div id="js-header-video" class="p-header-video p-header-content is-active" style="position: relative; width: 100%; padding-bottom: 56.25%; overflow: hidden; background-color: #000; background-position: center center; background-repeat: no-repeat; background-size: cover;">
          <video style="position: absolute; top: 0; right: 0; bottom: 0; left: 0; width: 100%; height: auto; margin: auto;" autoplay="autoplay" loop="loop" muted="" width="300" height="150">
            <source src="<?php echo get_field('main_video', $post->ID)['url']; ?>" />
          </video>
        </div>
      </div>
      <?php
      $block_list = get_field('block_list', $post->ID);
      foreach($block_list as $block) :
      ?>
      <div class="mb60">
        <div class="tac">
          <?php if($block['en_block_name']): ?>
            <p class="company-block-entitle <?php if(qtranxf_getLanguage()=='en') {echo 'en';} ?>"><?php echo $block['en_block_name']; ?></p>
          <?php 
          endif;
          if(qtranxf_getLanguage()=='ja' && $block['write_title']): 
          ?>
            <p class="company-block-writetitle"><?php echo $block['write_title']; ?></p>
          <?php 
          endif; 
          if($block['title']): 
          ?>
            <p class="company-block-title <?php if(qtranxf_getLanguage()=='en') {echo 'en';} ?>"><?php echo $block['title']; ?></p>
          <?php 
          endif;
          if($block['sub_title']): 
          ?>
            <p class="company-block-subtitle <?php if(qtranxf_getLanguage()=='en') {echo 'en';} ?>"><?php echo $block['sub_title']; ?></p>
          <?php endif; ?>
        </div>
        <?php 
        foreach($block['block_content'] as $block_content) :
        ?>
          <?php if($block_content['type'] == 'text'): ?>
            <div class="company-block-message"><?php echo html_paragraph($block_content['text']); ?></div>
          <?php elseif($block_content['type'] == 'image'): ?>
            <?php if(qtranxf_getLanguage()=='en' && $block_content['image_en']): ?>
            <div class="mb60 tac"><img src="<?php echo $block_content['image_en']['url']; ?>" width="515" /></div>
            <?php else: ?>
            <div class="mb60 tac"><img src="<?php echo $block_content['image']['url']; ?>" width="515" /></div>
            <?php endif; ?>
          <?php endif; ?>
        <?php 
        endforeach; 
        if($block['author']): 
        ?>
          <div<?php if(qtranxf_getLanguage()=='ja') {echo ' class="tar"';} ?>><?php echo html_paragraph($block['author']); ?></div>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <?php if(qtranxf_getLanguage()=='en'): ?>
        <h3 class="company-h3 en">Company profile</h3>
      <?php else: ?>
        <h3 class="company-h3">企業情報</h3>
      <?php endif; ?>
    <div class="col2">
      <div class="cell">
        <div class="mhauto">
          <table>
            <tbody>
              <tr>
                <th class="company-table-left">
                  <?php if(qtranxf_getLanguage()=='en'): ?>
                    Company name
                  <?php else: ?>
                    社名
                  <?php endif; ?>
                </th>
                <td class="company-table-right"><?php echo get_field('company_name', $post->ID); ?></td>
              </tr>
              <tr>
                <th class="company-table-left">
                  <?php if(qtranxf_getLanguage()=='en'): ?>
                    Date of Establishment
                  <?php else: ?>
                    創立
                  <?php endif; ?>
                </th>
                <td class="company-table-right">
                  <?php 
                  if(qtranxf_getLanguage()=='en') {
                    echo date('M j,Y' ,strtotime(get_field('establishment_date', $post->ID))); 
                  } else {
                    echo date('Y年n月j日' ,strtotime(get_field('establishment_date', $post->ID))); 
                  }
                  ?>
                </td>
              </tr>
              <?php 
              $branch_list = get_field('branch_list', $post->ID);
              foreach($branch_list as $branch) :
              ?>
              <tr>
                <th class="company-table-left"><?php echo $branch['branch_name']; ?></th>
                <td class="company-table-right"><?php echo html_paragraph($branch['branch_address']); ?></td>
              </tr>
              <?php endforeach; ?>
              <tr>
                <th class="company-table-left">
                  <?php if(qtranxf_getLanguage()=='en'): ?>
                    Business scope
                  <?php else: ?>
                    事業内容
                  <?php endif; ?>
                </th>
                <td class="company-table-right"><?php echo html_paragraph(get_field('business_scope', $post->ID)); ?></td>
              </tr>
              <tr>
                <th class="company-table-left">
                  <?php if(qtranxf_getLanguage()=='en'): ?>
                    Number of employees
                  <?php else: ?>
                    従業員数
                  <?php endif; ?>
                </th>
                <td class="company-table-right"><?php echo html_paragraph(get_field('employees', $post->ID)); ?></td>
              </tr>
              <tr>
                <th class="company-table-left">
                  <?php if(qtranxf_getLanguage()=='en'): ?>
                    Registered capital
                  <?php else: ?>
                    資本金
                  <?php endif; ?>
                </th>
                <td class="company-table-right"><?php echo number_format(get_field('registered_capital', $post->ID)); ?> <?php if(qtranxf_getLanguage()=='en'): ?>yen<?php else: ?>円<?php endif; ?></td>
              </tr>
              <tr>
                <th class="company-table-left">
                  <?php if(qtranxf_getLanguage()=='en'): ?>
                    Legal representative
                  <?php else: ?>
                    代表者
                  <?php endif; ?>
                </th>
                <td class="company-table-right"><?php echo get_field('legal_representative', $post->ID); ?></td>
              </tr>
              <tr>
                <th class="company-table-left">
                  <?php if(qtranxf_getLanguage()=='en'): ?>
                    Correspondent financial institutions
                  <?php else: ?>
                    取引先金融機関
                  <?php endif; ?>
                </th>
                <td class="company-table-right"><?php echo html_paragraph(get_field('institutions', $post->ID)); ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="cell">
        <?php 
        $branch_list = get_field('branch_list', $post->ID);
        foreach($branch_list as $branch) :
        ?>
        <div class="ggmap mb60"><iframe style="border: 0;" tabindex="0" src="<?php echo $branch['branch_url']; ?>" width="530" height="470" frameborder="0" allowfullscreen="allowfullscreen" aria-hidden="false"></iframe></div>
        <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
</div>