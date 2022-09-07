<?php
/**
 * テーマの設定
 */

/**
 * 基本設定
 *
 */
get_template_part('inc/setting');

/**
 * 追加関数
 *
 */
get_template_part('inc/add_functions');

/**
 * カスタム投稿タイプ
 *
 */
get_template_part('inc/add_post_type');


/**
 * 追加設定 メニュー
 *
 */
get_template_part('inc/menu');

/**
 * 管理画面のカスタマイズ
 *
 */
get_template_part('inc/admin');


/**
 * 追加ショートコード
 *
 */
get_template_part('inc/add_shortcode');
