<?php
/**
 * 独自の追加関数
 */

/**
 * 抜粋の文字数を日本語でも正常に動作するように対応
 *
 */
function get_the_excerpt_ex($width = 80, $post = false, $attr = '…') {
  if (! $post) global $post;
  if ($post->post_excerpt) {
    // 抜粋が直接入力されている場合はそのまま出力
    return $post->post_excerpt;
  } else {
    $content = $post->post_content;
    $content = str_replace('<!--nextpage-->', '', $content);
    $content = preg_replace('/<style.*?<\/style>/s', '', $content);
    $content = strip_tags($content);
    $content = str_replace(array('&nbsp;', ' ', "\n"), '', $content);
    $content = trim($content);
    $add = $attr;
    if (mb_strlen($content) <= $width*2) $add = '';
    $content = mb_substr($content, 0, $width). $add;
    return $content;
  }
}

/**
 * get_the_excerpt_ex をそのまま出力
 *
 */
function the_excerpt_ex($width = 80, $post = false, $attr = '…') {
  echo get_the_excerpt_ex($width, $post, $attr);
}

/**
 * ページネーション
 *
 */
if ( ! function_exists('wp_pagination') ) {
  function wp_pagination($mid_size = 3, $prev_text = '« 前へ', $next_text = '次へ »') {
    global $wp_query;
    $total = $wp_query->max_num_pages;
    $big = 999999999;
    var_dump($total);
    if( $total > 1 )  {
       if(! $current_page = get_query_var('paged')) $current_page = 1;
       if(get_option('permalink_structure')) {
         $format = 'page/%#%/';
       } else {
         $format = '&paged=%#%';
       }
       echo '<div class="pager">';
      echo paginate_links(array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => $format,
        'current' => max( 1, get_query_var('paged') ),
        'total' => $total,
        'mid_size' => $mid_size,
        'type' => 'list',
        'prev_text' => $prev_text,
        'next_text' => $next_text,
       ));
      echo '</div>';
    }
  }
}

/**
 * echo 結果を変数に格納
 *
 */
function get_include_result($file, $data = array()){
  extract($data);
  ob_start();
  require($file);
  $html = ob_get_contents();
  ob_end_clean();
  return $html;
}

/**
 * echo 結果を変数に格納
 *
 */
function is_sp(){
  $ua = $_SERVER['HTTP_USER_AGENT'];
  if((strpos($ua,'iPhone')!==false)||(strpos($ua,'iPod')!==false)||(strpos($ua,'iPad')!==false)||(strpos($ua,'Android')!==false)) {
    return true;
  }
  return false;
}


/**
 * theme_url
 *
 */
function theme_url() {
  return get_stylesheet_directory_uri();
}

add_filter( 'body_class', 'my_class_names' );
function my_class_names( $classes ) {
  $post_obj =  $GLOBALS['wp_the_query']->get_queried_object();
  $slug = '';
  if(is_front_page()) {
    $slug = 'home';
    if(is_page() && get_post( get_the_ID() )->post_name) {
      $slug = 'page-' . $post_obj->post_name;
    }
  } elseif (is_category()) {
    $slug = 'cat ' . $post_obj->category_nicename;
  } elseif (is_tag()) {
    $slug = 'tag ' . $post_obj->slug;
  } elseif ( is_singular() ) {
    $slug = $post_obj->post_type . ' ' . $post_obj->post_name;
  } elseif (is_search()) {
    $slug  = $GLOBALS['wp_the_query']->posts ? 'search-results' : 'search-no-results';
  } elseif ( is_404() ) {
    $slug = 'error404';
  } 
  if(qtranxf_getLanguage()=='en'){
    $classes[] = $slug . ' language_en';
  }else{
    $classes[] = $slug;
  }
  return $classes;
}

/*【出力カスタマイズ】固定ページのパーマリンクの拡張子を .html にする 
add_action( 'init', 'mytheme_init' );
  if ( ! function_exists( 'mytheme_init' ) ) {
    function mytheme_init() {
    global $wp_rewrite;
    $wp_rewrite->use_trailing_slashes = false;
    $wp_rewrite->page_structure = $wp_rewrite->root . '%pagename%.html';
    // flush_rewrite_rules( false );
  }
}
*/

add_action( 'wp_footer', 'mycustom_wp_footer' );
  
function mycustom_wp_footer() {
?>
<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
    location = '<?php echo home_url(); ?>/contact/thanks';
}, false );
</script>
<?php
}


/*
 * 二つの改行をpタグに変換、一つの改行をbrタグに変換
 */
function html_paragraph($str, $xhtml=true){
    $arr = preg_split("/\R\R+/", $str, -1, PREG_SPLIT_NO_EMPTY);
    $result = "";
    foreach($arr as $value){
        $value = htmlspecialchars($value, ENT_QUOTES);
        $result .= '<p>' . nl2br($value, $xhtml) . "</p>\n";
    }
    return $result;
}
