<?php
/**
 * 独自の管理画面ページ
 *
 * @package WordPress
 */


/**
 * 固定ページはビジュアルリッチエディタを無効
 */
// function disable_visual_editor_in_page() {
//   global $typenow;
//   if( $typenow == 'page' ){
//     add_filter('user_can_richedit', 'disable_visual_editor_filter');
//   }
// }
// function disable_visual_editor_filter(){
//   return false;
// }
// add_action('load-post.php', 'disable_visual_editor_in_page');
// add_action('load-post-new.php', 'disable_visual_editor_in_page');