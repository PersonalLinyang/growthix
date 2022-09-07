<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width">
  <meta name="format-detection" content="telephone=no" />
  <meta name="google-site-verification" content="3McluBsF9EMOtGUdcwd4BAkJlV48i5PFzs6iiBOo2tE" />
  <meta name="Keywords" content="サーチファンド,M&A,中島光夫,河島和真" />
  <title>グロウシックスキャピタル株式会社（Growthix Capital株式会社）</title>
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP|Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Vollkorn" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css" rel="stylesheet" >
  <link href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css?v=3.0.2" rel="stylesheet" type="text/css" />
  <script src="https://kit.fontawesome.com/8dcd7dcb24.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/scripts.js"></script>
  <?php wp_head(); ?>
<body id="pagetop" <?php body_class(); ?>>
  <header id="header">
    <nav class="gnav pc_only <?php if ( is_home() || is_front_page() ){echo "home";} ?>">
      <div>
        <div class="nav-logo">
          <?php if (is_home() || is_front_page()): ?>
          <h1><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/img_logo.svg" alt="グロウシックスキャピタル株式会社（GrowthixCapital株式会社）" width="170"></a></h1>
          <?php else: ?>
          <h1><a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/img_logo_b.svg" alt="グロウシックスキャピタル株式会社（GrowthixCapital株式会社）" width="170"></a></h1>
          <?php endif; ?>
        </div>
      </div>
      <?php 
      $pc_header_menu_qs = get_posts(array('post_type'=>'nav_menu', 'name'=>'pc_header')); 
      if($pc_header_menu_qs):
        $pc_header_menu_list = get_field('menu_list', $pc_header_menu_qs[0]->ID);
      ?>
      <div class="gnav-list-wrapper">
        <div class="container">
          <ul class="gnav-list">
            <?php foreach($pc_header_menu_list as $menu): ?>
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
          <?php
            $current_url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
          ?>
          <div class="btn-language">
            <?php if(qtranxf_getLanguage()=='en'): ?>
              <a href="<?php echo qtranxf_convertURL($current_url, 'ja', '', true);?>">
                <img class="<?php if ( is_home() || is_front_page() ){echo "is_home";} ?>" src="<?php echo get_template_directory_uri(); ?>/assets/img/btn_language_jp.svg" alt="JP" width="22">
                <img class="no_home" src="<?php echo get_template_directory_uri(); ?>/assets/img/btn_language_jp_b.svg" alt="EN" width="22">
              </a>
            <?php else: ?>
              <a href="<?php echo qtranxf_convertURL($current_url, 'en','',  true);?>">
                <img class="<?php if ( is_home() || is_front_page() ){echo "is_home";} ?>" src="<?php echo get_template_directory_uri(); ?>/assets/img/btn_language_en.svg" alt="EN" width="22">
                <img class="no_home" src="<?php echo get_template_directory_uri(); ?>/assets/img/btn_language_en_b.svg" alt="EN" width="22">
              </a>
            <?php endif; ?>
          </div>
        </div>
        <?php 
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
        <div class="contact-link top-header-contact-link">
          <a href="<?php echo home_url(); ?>/<?php echo $page_contact[0]->post_name; ?>/">
            <?php if(qtranxf_getLanguage()=='en'): ?>
              Contact
            <?php else: ?>
              お問い合わせ
            <?php endif; ?>
          </a>
        </div>
        <?php endif; ?>
      </div>
      <?php endif; ?>
    </nav>
    <nav class="spheader sp_only <?php if ( is_home() || is_front_page() ){echo "is_home";} ?>">
      <div class="nav-logo">
        <h1><a href="<?php echo home_url(); ?>">
          <img class="white" src="<?php echo get_template_directory_uri(); ?>/assets/img/img_logo.svg" alt="" width="160">
          <img class="black" src="<?php echo get_template_directory_uri(); ?>/assets/img/img_logo_b.svg" alt="" width="160">
        </a></h1>
      </div>
      <div class="btn-language">
        <?php if(qtranxf_getLanguage()=='en'): ?>
          <a href="<?php echo qtranxf_convertURL($current_url, 'ja', '', true);?>">
            <img class="white" src="<?php echo get_template_directory_uri(); ?>/assets/img/btn_language_jp.svg" alt="jp" width="21">
            <img class="black" src="<?php echo get_template_directory_uri(); ?>/assets/img/btn_language_jp_b.svg" alt="jp" width="21">
          </a>
        <?php else: ?>
          <a href="<?php echo qtranxf_convertURL($current_url, 'en','',  true);?>">
            <img class="white" src="<?php echo get_template_directory_uri(); ?>/assets/img/btn_language_en.svg" alt="EN" width="21">
            <img class="black" src="<?php echo get_template_directory_uri(); ?>/assets/img/btn_language_en_b.svg" alt="EN" width="21">
          </a>
        <?php endif; ?>
      </div>
      <div class="menu-trigger">
        <img class="white" src="<?php echo get_template_directory_uri(); ?>/assets/img/sp_nav_open.svg" alt="" width="21">
        <img class="black" src="<?php echo get_template_directory_uri(); ?>/assets/img/sp_nav_open_b.svg" alt="" width="21">
      </div>
      <div class="js-nav-close">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icn_close.svg" alt="close" width="22">
      </div>
      <?php 
      $sp_header_menu_qs = get_posts(array('post_type'=>'nav_menu', 'name'=>'sp_header')); 
      if($sp_header_menu_qs):
        $sp_header_menu_list = get_field('menu_list', $sp_header_menu_qs[0]->ID);
      ?>
        <div class="spnav">
          <ul class="spnav-list">
            <?php foreach($sp_header_menu_list as $menu): ?>
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
      <?php endif; ?>
    </nav>
  </header>
<main>
