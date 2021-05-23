<?php

use Resources\views\MembersView;

function bt_team_members_template()
{
  global $wpdb;
  $table = $wpdb->prefix . 'members';
  $members = $wpdb->get_results("SELECT * FROM $table");
  return MembersView::render($members);
  // print_r($members);
  // return 'aqui';
}
