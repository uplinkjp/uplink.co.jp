<?php
//管理バーを消す
add_filter( 'show_admin_bar', '__return_false' );

//サムネ有効化
add_theme_support( 'post-thumbnails' );


//カスタム投稿タイプでaddquicktagを使う
add_filter( 'addquicktag_post_types', 'my_addquicktag_post_types' );
/**
 * Return array $post_types with custom post types
 * 
 * @param   $post_type Array
 * @return  $post_type Array
 */
function my_addquicktag_post_types( $post_types ) {
array_push($post_types, 'event', 'movie' , 'movie', 'gallery', 'market', 'news', 'film', 'webshop');
return $post_types;
}

//投稿一覧画面に項目を追加
function manage_date_columns ($columns) {
    $columns['schedule_2'] = '日程（タイトル下の赤字）';
    return $columns;
}
function add_date_column ($column, $post_id) {
    if ($column == 'schedule_2') {
        echo attribute_escape(get_post_meta($post_id, 'schedule_2', true));
    }
}
add_filter('manage_edit-event_columns', 'manage_date_columns');
add_filter('manage_edit-movie_columns', 'manage_date_columns');
add_filter('manage_edit-gallery_columns', 'manage_date_columns');
add_filter('manage_edit-market_columns', 'manage_date_columns');
add_action('manage_posts_custom_column', 'add_date_column', 10, 2);


//カスタム投稿タイプ お知らせ
function news_postype() {
	$labels = array(
		'name' => 'お知らせ',
		'singular_name' => 'お知らせ',
		'add_new' => '新規追加',
		'add_new_item' => '新規お知らせを追加',
		'edit_item' => 'お知らせを編集',
		'new_item' => '新規お知らせ',
		'view_item' => 'お知らせを表示',
		'search_items' => 'お知らせを検索',
		'not_found' =>  '投稿されたお知らせはありません',
		'not_found_in_trash' => 'ゴミ箱にお知らせはありません。',
		'parent_item_colon' => '',
	);
	$args = array(
		'label' => __('news'),
		'labels' => $labels,
		'public' => true,
		'menu_position' => 5,
		'supports'=> array('title', 'thumbnail', 'excerpt', 'editor') ,
		'has_archive' => 'news'
	);
	register_post_type( 'news', $args);
}
add_action( 'init', 'news_postype' );

//カスタム投稿タイプ 上映
function movie_postype() {
	$labels = array(
		'name' => '上映',
		'singular_name' => '上映',
		'add_new' => '新規追加',
		'add_new_item' => '新規上映を追加',
		'edit_item' => '上映を編集',
		'new_item' => '新規上映',
		'view_item' => '上映を表示',
		'search_items' => '上映を検索',
		'not_found' =>  '投稿された上映はありません',
		'not_found_in_trash' => 'ゴミ箱に上映はありません。',
		'parent_item_colon' => '',
	);
	$args = array(
		'label' => __('movie'),
		'labels' => $labels,
		'public' => true,
		'menu_position' => 5,
		'supports'=> array('title', 'thumbnail', 'excerpt', 'editor') ,
		'has_archive' => 'movie'
	);
	register_post_type( 'movie', $args);
}
add_action( 'init', 'movie_postype' );

//カスタム投稿タイプ イベント
function event_postype() {
	$labels = array(
		'name' => 'イベント',
		'singular_name' => 'イベント',
		'add_new' => '新規追加',
		'add_new_item' => '新規イベントを追加',
		'edit_item' => 'イベントを編集',
		'new_item' => '新規イベント',
		'view_item' => 'イベントを表示',
		'search_items' => 'イベントを検索',
		'not_found' =>  '投稿されたイベントはありません',
		'not_found_in_trash' => 'ゴミ箱にイベントはありません。',
		'parent_item_colon' => '',
	);
	$args = array(
		'label' => __('event'),
		'labels' => $labels,
		'public' => true,
		'menu_position' => 5,
		'supports'=> array('title', 'thumbnail', 'excerpt', 'editor') ,
		'has_archive' => 'event'
	);
	register_post_type( 'event', $args);
}
add_action( 'init', 'event_postype' );

//カスタム投稿タイプ ギャラリー
function gallery_postype() {
	$labels = array(
		'name' => 'ギャラリー',
		'singular_name' => 'ギャラリー',
		'add_new' => '新規追加',
		'add_new_item' => '新規ギャラリーを追加',
		'edit_item' => 'ギャラリーを編集',
		'new_item' => '新規ギャラリー',
		'view_item' => 'ギャラリーを表示',
		'search_items' => 'ギャラリーを検索',
		'not_found' =>  '投稿されたギャラリーはありません',
		'not_found_in_trash' => 'ゴミ箱にギャラリーはありません。',
		'parent_item_colon' => '',
	);
	$args = array(
		'label' => __('gallery'),
		'labels' => $labels,
		'public' => true,
		'menu_position' => 5,
		'supports'=> array('title', 'thumbnail', 'excerpt', 'editor') ,
		'has_archive' => 'gallery'
	);
	register_post_type( 'gallery', $args);
}
add_action( 'init', 'gallery_postype' );

//カスタム投稿タイプ マーケット
function market_postype() {
	$labels = array(
		'name' => 'マーケット',
		'singular_name' => 'マーケット',
		'add_new' => '新規追加',
		'add_new_item' => '新規マーケットを追加',
		'edit_item' => 'マーケットを編集',
		'new_item' => '新規マーケット',
		'view_item' => 'マーケットを表示',
		'search_items' => 'マーケットを検索',
		'not_found' =>  '投稿されたマーケットはありません',
		'not_found_in_trash' => 'ゴミ箱にマーケットはありません。',
		'parent_item_colon' => '',
	);
	$args = array(
		'label' => __('market'),
		'labels' => $labels,
		'public' => true,
		'menu_position' => 5,
		'supports'=> array('title', 'thumbnail', 'excerpt', 'editor') ,
		'has_archive' => 'market'
	);
	register_post_type( 'market', $args);
}
add_action( 'init', 'market_postype' );


//カスタム投稿タイプ 配給作品
function film_postype() {
	$labels = array(
		'name' => '配給作品',
		'singular_name' => '配給作品',
		'add_new' => '新規追加',
		'add_new_item' => '新規配給作品を追加',
		'edit_item' => '配給作品を編集',
		'new_item' => '新規配給作品',
		'view_item' => '配給作品を表示',
		'search_items' => '配給作品を検索',
		'not_found' =>  '投稿された配給作品はありません',
		'not_found_in_trash' => 'ゴミ箱に配給作品はありません。',
		'parent_item_colon' => '',
	);
	$args = array(
		'label' => __('film'),
		'labels' => $labels,
		'public' => true,
		'menu_position' => 5,
		'supports'=> array('title', 'thumbnail', 'excerpt', 'editor') ,
		'has_archive' => 'film'
	);
	register_post_type( 'film', $args);
}
add_action( 'init', 'film_postype' );


//カスタム投稿タイプ WEBSHOP
function webshop_postype() {
	$labels = array(
		'name' => 'WEBSHOP',
		'singular_name' => 'WEBSHOP',
		'add_new' => '新規追加',
		'add_new_item' => '新規WEBSHOPを追加',
		'edit_item' => 'WEBSHOPを編集',
		'new_item' => '新規WEBSHOP',
		'view_item' => 'WEBSHOPを表示',
		'search_items' => 'WEBSHOPを検索',
		'not_found' =>  '投稿されたWEBSHOPはありません',
		'not_found_in_trash' => 'ゴミ箱にWEBSHOPはありません。',
		'parent_item_colon' => '',
	);
	$args = array(
		'label' => __('webshop'),
		'labels' => $labels,
		'public' => true,
		'menu_position' => 5,
		'supports'=> array('title', 'thumbnail', 'excerpt', 'editor') ,
		'has_archive' => 'webshop'
	);
	register_post_type( 'webshop', $args);
}
add_action( 'init', 'webshop_postype' );


//管理画面のアイキャッチ部分に説明文を表示
add_filter( 'admin_post_thumbnail_html', 'add_featured_image_instruction');
function add_featured_image_instruction( $content ) {
    return $content .= '
<p><strong>アイキャッチ画像は、幅の最大700px、縦の最大600pxに自動リサイズされます。</strong><br />
自動リサイズですが、印刷用の馬鹿でかい画像をそのままUPしないこと！下記を守ってください。</p>

<p>
【ファイル名】　英数、ハイフン、アンダバーでリネイム。　（<span style="color:#F00; font-weight:800;">つまりスペース、日本語、全角文字はNG！</span>）<br />
【ファイル形式】　RGBのjpg、gif、png　（つまりCMYKだったり、psd、eps、pdfはNG！）<br />
【画像のサイズ】　長編1500px以内、重さ1MB以内
</p>

<div id="eye01" style="display:none">
	<div class="tut_inner">
		<p>この中身がLightboxです。画像でも動画でも好きなコンテンツを入れてください</p>
	</div>
</div>
';
}

//投稿画面
add_action( 'admin_init', 'my_admin_init' );
function my_admin_init() {
	add_meta_box( 'my_meta_box_post', '投稿画面使い方のコツ', 'my_meta_box', 'movie' , 'side' );
	add_meta_box( 'my_meta_box_post', '投稿画面使い方のコツ', 'my_meta_box', 'event' , 'side' );
	add_meta_box( 'my_meta_box_post', '投稿画面使い方のコツ', 'my_meta_box', 'gallery' , 'side' );
	add_meta_box( 'my_meta_box_post', '投稿画面使い方のコツ', 'my_meta_box', 'market' , 'side' );
	add_meta_box( 'my_meta_box_post', '投稿画面使い方のコツ', 'my_meta_box', 'news' , 'side' );
}
function my_meta_box() {
	echo '<p><strong style="color:#F00;">■本文以外の箇所でHTML、改行は不可</strong><br />
	テキストエリア以外のフォームにデータベースとしてHTMLが入るのは好ましくありません。<br />
	改行は丁度いいところで改行したつもりでも回覧者の環境（ブラウザ・OS）によって異なります。</p>
	
	<hr>
	
	<p><strong>■YOUTUBE、ニコニコ動画、VimeoはURLを書くだけでプレイヤーが表示されます</strong><br />
http://www.youtube.com/＊＊＊<br />
http://www.nicovideo.jp/watch/＊＊＊<br />
http://vimeo.com/＊＊＊</p>

<hr>

<p><strong>■社外の人に下書き状態の記事を確認してもらいたい時</strong><br />
記事を下書きの状態にして、「Public Post Preview」の＜Enable public preview＞にチェックを入れると確認用URLが発行されます。（記事を公開するとそのURLは無効となりますので、間違ってリンクされたりしないように！）
</p>

<hr>

<p><strong>■本文中の画像は横600px、中央寄せがちょうど良いです</strong><br />
「アップロード/挿入」＞サイズ 中（長辺600px）
</p>

<hr>

<p><strong>■インライン要素の中にブロックレベル要素を書いてはいけません。</strong></p>

<p>→インライン要素：strong、em、span、a、img<br>
→ブロックレベル要素：div、h2、h3、blockquote</p>

<p>誤）&lt;a href=&quot;#&quot;&gt;&lt;h2&gt;これは h2 見出しです！&lt;/h2&gt;&lt;/a&gt;<br>
正）&lt;h2&gt;&lt;a href=&quot;#&quot;&gt;これは h2 見出しです&lt;/a&gt;&lt;/h2&gt;</p>

<p>もっと知りたい人はこちら<br>
<a href="http://www.tagindex.com/html_tag/basic/block_inline.html" target="_blank">http://www.tagindex.com/...</a></p>
';
}


// 管理画面の投稿ボックスの表示非表示
function remove_default_post_screen_metaboxes() {
	remove_meta_box( 'postexcerpt','post','normal' );       // 抜粋
	remove_meta_box( 'trackbacksdiv','post','normal' );     // トラックバック送信
	remove_meta_box( 'postcustom','post','normal' );        // カスタムフィールド
	remove_meta_box( 'commentstatusdiv','post','normal' );  // ディスカッション
	remove_meta_box( 'commentsdiv','post','normal' );       // コメント
	remove_meta_box( 'slugdiv','post','normal' );           // スラッグ
	remove_meta_box( 'authordiv','post','normal' );         // 作成者
	remove_meta_box( 'revisionsdiv','post','normal' );      // リビジョン
	remove_meta_box( 'formatdiv','post','normal' );         // フォーマット
	remove_meta_box( 'tagsdiv-post_tag','post','normal' );  // タグ
}
add_action('admin_menu','remove_default_post_screen_metaboxes');

//ダッシュボードの表示非表示
function example_remove_dashboard_widgets() {
    global $wp_meta_boxes;
    //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // 現在の状況
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // 最近のコメント
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // 被リンク
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // プラグイン
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // クイック投稿
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // 最近の下書き
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPressブログ
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // WordPressフォーラム
}
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');


//管理画面の更新のお知らせ非表示

add_filter('pre_site_transient_update_core', '__return_zero');
remove_action('wp_version_check', 'wp_version_check');
remove_action('admin_init', '_maybe_update_core');


add_action('admin_menu', 'remove_counts');
function remove_counts(){
  global $menu,$submenu;
  $menu[65][0] = 'プラグイン';
  $submenu['index.php'][10][0] = '更新';
}

add_action( 'wp_before_admin_bar_render', 'hide_before_admin_bar_render' );
function hide_before_admin_bar_render() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu( 'updates' );
}


//フッターを変更
function custom_admin_footer() {
    echo 'UPLINK 2012';
}
add_filter('admin_footer_text', 'custom_admin_footer');


//feedに画像を挿入
function diw_post_thumbnail_feeds($content) {
	global $post;
	if(has_post_thumbnail($post->ID)) {
		$content = '<div>' . get_the_post_thumbnail($post->ID) . '</div>' . $content;
	}
	return $content;
}
add_filter('the_excerpt_rss', 'diw_post_thumbnail_feeds');
add_filter('the_content_feed', 'diw_post_thumbnail_feeds');

//rssをテンプレート化
remove_filter('do_feed_rss2', 'do_feed_rss2', 10);
function custom_feed_rss2(){
    $template_file = '/feed-rss2.php';
    load_template(get_template_directory() . $template_file);
}
add_action('do_feed_rss2', 'custom_feed_rss2', 10);


//サブページかどうか判別
function is_subpage() {
    global $post;                                 // $post には現在の固定ページの情報があります
        if ( is_page() && $post->post_parent ) {      // 現在の固定ページが親ページを持つかどうかをチェックします
               $parentID = $post->post_parent;        // 親ページの ID を取得します
               return $parentID;                      // 親ページの ID を返します
        } else {                                      // 親ページを持たないので...
               return false;                          // ...false を返します
        };
};

//ニコニコ動画
function wp_embed_handler_nicovideo( $matches, $attr, $url, $rawattr ) {
    $vid = esc_attr($matches[1]);
    $width = 485;
    $height = 385;
    $embed = sprintf(
        '<div id="nicovideo-%3$s"><iframe width="%1$d" height="%2$d" src="http://www.nicovideo.jp/thumb/%3$s" scrolling="no" style="border:solid 1px #CCC;" frameborder="0"><a href="%4$s">%4$s</a></iframe></div>',
        (int) $width,
        (int) $height,
        $vid,
        esc_attr($matches[0])
        );
 
    $embed .= "<script type=\"text/javascript\">
jQuery(function(){
    var output = [];
    document._write = document.write;
    document.write = function(v){ output.push(v); }
    jQuery.getScript('http://ext.nicovideo.jp/thumb_watch/{$vid}', function(){
        jQuery('#nicovideo-{$vid}').html(output.join(''));
        output = [];
        document.write = document._write;
    });
})
</script>";
    return apply_filters( 'embed_pdf', $embed, $matches, $attr, $url, $rawattr );
}
wp_embed_register_handler( 'nicovideo', '/https?:\/\/www\.nicovideo\.jp\/watch\/(sm[\d]+)([\?])?([-_\.!~*\'()a-zA-Z0-9;\/:\@=+\$,%#]+)?/i', 'wp_embed_handler_nicovideo' );
wp_enqueue_script('jquery');


//ウィジェット
if ( function_exists('register_sidebar') ) {
     register_sidebar(array(
    'name' => 'single',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
    ));
}

//タイムゾーン設定
date_default_timezone_set( 'Asia/Tokyo' );

//jquery重複回避
function load_cdn() {
	if ( !is_admin() ) {
	wp_deregister_script('jquery');
	}
}
add_action('init', 'load_cdn');

//wp_head調整
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra',3,0);
remove_action('wp_head','parent_post_rel_link',10);
remove_action('wp_head','start_post_rel_link',10);
remove_action('wp_head','adjacent_posts_rel_link_wp_head',10);

// Get the featured image URL - singleページ用 facebook OGP用
function get_featured_image_url() { 
    $image_id = get_post_thumbnail_id();
    $image_url = wp_get_attachment_image_src($image_id,'large', true); 
    echo $image_url[0]; 
}

//リダイレクト阻止　filmディレクトリ静的ページ共存
remove_filter('template_redirect', 'redirect_canonical');


// アーカイブ表記に「年」を追加
function my_archives_link($html){
if(preg_match('/[0-9]+?<\/a>/', $html))
$html = preg_replace('/([0-9]+?)<\/a>/', '$1年</a>', $html);
if(preg_match('/title=[\'\"][0-9]+?[\'\"]/', $html))
$html = preg_replace('/(title=[\'\"][0-9]+?)([\'\"])/', '$1年$2', $html);
return $html;
}
add_filter('get_archives_link', 'my_archives_link', 10);


//特定のカスタムポストタイプ（例：event）の予約投稿（future）があったら、問答無用で公開（publish）にする
function my_immediately_publish($id)
{
	global $wpdb;
	$q = "UPDATE " . $wpdb->posts . " SET post_status = 'publish' WHERE ID = " . (int)$id;
	$wpdb->get_results($q);
}
add_action('future_film', 'my_immediately_publish');



?>
