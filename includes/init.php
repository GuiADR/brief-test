<?php
function bt_members_init()
{
  $labels = array(
    'name' => 'Team members',
    'singular_name' => 'Team member',
    'menu_name' => 'Team Members',
    'name_admin_bar' => 'Team Members',
    'add_new' => 'add new',
    'add_new_item' => 'add new member',
    'new_item' => 'New Member',
    'view_item' => 'Edit Member',
    'all_items' => 'All members',
    'search_items' => 'Search Members',
    'parent_item_colon' => 'Related Members',
    'not_found' => 'No Members Found',
    'not_found_in_trash' => 'No Members found in the Trash'
  );

  $array = array(
    'labels' => $labels,
    'description' => 'Team Members',
    'public' => true,
    'publicly_queryable' => true,
    'query_var' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'rewrite' => array('slug' => 'members'),
    'capability_type' => 'post',
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => 2,
    'supports' => false
  );
  register_post_type('members', $array);
}
