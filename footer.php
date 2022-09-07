  </main>
  <footer id="footer" class="footer">
    <?php 
    $footer_menu_qs = get_posts(array('post_type'=>'nav_menu', 'name'=>'footer')); 
    if($footer_menu_qs):
      $footer_menu_list = get_field('menu_list', $footer_menu_qs[0]->ID);
    ?>
      <div class="footer-link">
        <div class="container size-sm">
          <ul>
            <?php foreach($footer_menu_list as $menu): ?>
              <li>
                <?php 
                if($menu['type'] == 'page'): 
                  $page = get_post($menu['page']);
                  $line_page_id = '';
                  if($menu['page_id']) {
                    $line_page_id = '#' . $menu['page_id'];
                  }
                ?>
                  <a href="<?php echo home_url() . '/' . $page->post_name . '/' . $line_page_id; ?>">
                <?php else: ?>
                  <a href="<?php echo $menu['url']; ?>">
                <?php 
                endif; 
                echo nl2br($menu['text']);
                ?>
                </a>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
    <?php endif; ?>
    <div class="footer-main">
      <div class="container size-sm">
        <a class="pagetop" href="#">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icn_aroow_top.svg" alt="" width="47">
        </a>
        <div class="sns-link">
          <a href="https://www.facebook.com/Growthix/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icn_facebook.svg" alt="グロウシックスキャピタル株式会社 公式Facebook" width="46"></a>
          <a href="https://www.youtube.com/watch?v=PmsLb6zil58&feature=emb_logo" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icn_youtube.svg" alt="公式Youtube Growthixちゃんねる" width="63"></a>
          <a href="https://nextpreneur.jp/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icn_nextpreneur.png" alt="ネクストプレナー協会" width="73"></a>
          <a href="https://sustaina-assoc.jp/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/icn_sustaina.png" alt="サステナ社団" width="50"></a>
          <a href="https://growthix-investment.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/img_growthixfund-1.png" alt="グローシックスインベストメント" width="80"></a>
        </div>
      </div>
      <p class="copy">Copyright © Growthix Capital株式会社（グロウシックスキャピタル） All Rights</p>
    </div>
  </footer>
  <?php wp_footer(); ?>
</body>

</html>
