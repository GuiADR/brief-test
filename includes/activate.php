<?php
function bt_activate_plugin()
{
  if (version_compare(get_bloginfo('version'), '5.0', '<')) {
    wp_die(__('Você precisa atualizar o WordPress para usar este Pluguin', 'brief-test'));
  }

  global $wpdb;

  $sql = "CREATE TABLE " . $wpdb->prefix . "members (
    ID BIGINT(20) NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    birthday DATE NOT NULL,
    gender VARCHAR(20) NOT NULL,
    PRIMARY KEY (ID)
    )" . $wpdb->get_charset_collate();

  require_once(ABSPATH . '/wp-admin/includes/upgrade.php');
  dbDelta($sql);

  $table = $wpdb->prefix . 'posts';
  $current_user = wp_get_current_user();
  $date = date("Y-m-d H:m:s");
  $page = array(
    "post_author" => $current_user->ID,
    "post_date" => $date,
    "post_date_gmt" => $date,
    "post_content" => "<!-- wp:shortcode -->[team_members]<!-- /wp:shortcode -->",
    "post_title" => 'Team Members',
    "post_excerpt" => "",
    "post_status" => "publish",
    "comment_status" => "closed",
    "ping_status" => "closed",
    "post_password" => "",
    "post_name" => 'teams-members',
    "to_ping" => "",
    "pinged" => "",
    "post_modified" => $date,
    "post_modified_gmt" => $date,
    "post_content_filtered" => "",
    "post_parent" => 0,
    "guid" => "",
    "menu_order" => 0,
    "post_type" => "page",
    "post_mime_type" => "",
    "comment_count" => 0,
  );
  $PageExist = $wpdb->get_row("SELECT * FROM $table WHERE 'teams-members' = post_name");
  if ($PageExist) {
    $wpdb->update($table, $page, array('ID' => $PageExist->ID));
  } else {
    $wpdb->insert($table, $page);
  }
}
