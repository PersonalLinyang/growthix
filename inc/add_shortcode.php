<?php
/**
 * ショートコードの追加
 */

/*-------------------------------------------*/
/* [home_url]
/*-------------------------------------------*/
function sc_home_url($atts, $content = null) {
  extract(shortcode_atts(array('arg' => ''), $atts));
  return home_url($arg);
}
add_shortcode('home_url', 'sc_home_url');

/*-------------------------------------------*/
/* [theme_url]
/* 小テーマのurlを取得
/*-------------------------------------------*/
function sc_theme_url() {
  return get_stylesheet_directory_uri();
}
add_shortcode('theme_url', 'sc_theme_url');



/*-------------------------------------------*/
/* [wp_menu]
/* メニューを表示
/*-------------------------------------------*/
function sc_wp_menu($atts) {
  extract(shortcode_atts(array('menu' => ''), $atts));
  wp_nav_menu(array('menu' => $menu));
}
add_shortcode('wp_menu', 'sc_wp_menu');



/*-------------------------------------------*/
/* [wp_breadcrumb]
/* パンくずを表示
/*-------------------------------------------*/
function sc_wp_breadcrumb() {
  if (! function_exists('yoast_breadcrumb')) return false;
  return yoast_breadcrumb('<nav class="breadcrumbs"><div class="container">','</div></nav>', false);
}
add_shortcode('wp_breadcrumb', 'sc_wp_breadcrumb');


/*-------------------------------------------*/
/* [template_part file="xxxxxxxx"]
/* テンプレート読み込み
/*-------------------------------------------*/
function sc_template_part($atts) {
  extract(shortcode_atts(array('file' => ''), $atts));
  ob_start();
  get_template_part($file);
  $html = ob_get_contents();
  ob_end_clean();
  return $html;
}
add_shortcode('template_part', 'sc_template_part');

/*-------------------------------------------*/
/* [lodo_contactform]
/* 問い合わせフォーム読み込み
/*-------------------------------------------*/
function sc_lodo_contactform($atts) {
ob_start();
  if(qtrans_getLanguage() == "en") {
    echo do_shortcode( '[contact-form-7 id="130" title="contactform_en"]' );
  }else{    
    echo do_shortcode( '[contact-form-7 id="79" title="お問合せフォーム"]' );
  }
return ob_get_clean();
}
add_shortcode('lodo_contactform', 'sc_lodo_contactform');