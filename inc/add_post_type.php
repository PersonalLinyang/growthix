<?php
/**
 * カスタム投稿タイプの追加
 *
 * @package WordPress
 */


/*-------------------------------------------*/
/* 実績一覧
/*-------------------------------------------*/
add_action('init', 'works_custom_init');
function works_custom_init()
{
  $labels = array(
      'name' => _x('実績一覧', 'post type general name')
  );
  $args = array(
      'labels' => $labels,
      'public' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'has_archive' => false,
      'query_var' => false,
      'rewrite' => array(
        'slug' => 'works',
        'with_front' => false
      ),
      'menu_position' => 5,
      'menu_icon'   => 'dashicons-info',
      'supports' => array('title','editor','thumbnail'),
      'show_in_rest' => true,
  );
  register_post_type('works',$args);
}


/*-------------------------------------------*/
/* メンバー一覧
/*-------------------------------------------*/
add_action('init', 'member_custom_init');
function member_custom_init()
{
  $labels = array(
      'name' => _x('メンバー一覧', 'post type general name')
  );
  $args = array(
      'labels' => $labels,
      'public' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'has_archive' => false,
      'query_var' => false,
      'rewrite' => array(
        'slug' => 'member',
        'with_front' => false
      ),
      'menu_position' => 6,
      'menu_icon'   => 'dashicons-admin-users',
      'supports' => array('title','editor','thumbnail'),
  );
  register_post_type('member',$args);
}


/*-------------------------------------------*/
/* メニュー
/*-------------------------------------------*/
add_action('init', 'menu_custom_init');
function menu_custom_init()
{
  $labels = array(
      'name' => _x('メニュー', 'post type general name')
  );
  $args = array(
      'labels' => $labels,
      'public' => true,
      'show_ui' => true,
      'capability_type' => 'post',
      'has_archive' => false,
      'query_var' => false,
      'rewrite' => array(
        'slug' => 'nav_menu',
        'with_front' => false
      ),
      'menu_position' => 7,
      'menu_icon'   => 'dashicons-admin-tools',
      'supports' => array('title'),
  );
  register_post_type('nav_menu',$args);
}