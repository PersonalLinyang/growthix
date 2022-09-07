<?php
/**
 * WordPress 基本設定
 */

/**
 * wp_head の出力をカスタマイズ
 *
 */
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10, 0);
remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_resource_hints',2);
// emoji を無効化
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

add_image_size('650x420',650,420,true);

/**
 * jQuery をロード
 *
 */
wp_enqueue_script('jquery');

/**
 * editor-styleを有効化
 *
 */
add_editor_style('editor-style.css');

/**
 * アイキャッチを有効化
 *
 */
add_theme_support('post-thumbnails');

/**
 * 半角英数以外のスラッグを無効化
 * 例) post-1234
 *
 */
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = $post_type. '-'. $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4);

/**
 * 半角英数以外のスラッグを無効化
 * 例) post-1234
 *
 */
add_action('create_category', 'post_taxonomy_auto_slug', 10);
add_action('create_post_tag', 'post_taxonomy_auto_slug', 10);
function post_taxonomy_auto_slug( $term_id ) {
  $tax = str_replace( 'create_', '', current_filter() );
  $term = get_term( $term_id, $tax );
  if ( preg_match( '/(%[0-9a-f]{2})+/', $term->slug ) ) {
    $args = array(
      'slug' => str_replace('_', '-', $term->taxonomy) . '-' . $term->term_id
    );
    wp_update_term( $term_id, $tax, $args );
  }
}

/**
 * iframeのレスポンシブ対応
 *
 */
function wrap_iframe_in_div($the_content) {
  if ( is_singular() ) {
    $the_content = preg_replace('/(< *?iframe .*?youtube.com.*?<\/iframe>)/i', '<div class="iframe-container">$1</div>', $the_content);
  }
  return $the_content;
}
add_filter('the_content','wrap_iframe_in_div');

/**
 * iframeのレスポンシブ対応
 *
 */
function wrap_img($the_content) {
  if ( is_singular() ) {
    $the_content = preg_replace('/(<img class="alignnone.*?>)/i', '<div class="img-wrap">$1</div>', $the_content);
  }
  return $the_content;
}
add_filter('the_content','wrap_img');


//概要（抜粋）の省略文字
function custom_excerpt_more($more) {
    return '…';
}
add_filter('excerpt_more', 'custom_excerpt_more');


/**
 * 固定ページの場合、the_content出力時に自動で<p><br />を付けないように
 *
 */
function noautop($content = '') {
  // if (is_page_template('page-full.php')) remove_filter( 'the_content', 'wpautop' );
  if (is_page() && ! is_page_template('page-editor.php')) remove_filter( 'the_content', 'wpautop' );
  return $content;
}
add_filter("the_content", "noautop", 9);

