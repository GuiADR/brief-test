<?php

namespace App\Models;

class Member
{

  private $data = array(
    'ID'       => NULL,
    'name'     => NULL,
    'email'    => NULL,
    'birthday' => NULL,
    'gender'   => NULL,
  );


  function __construct($name, $email, $birthday, $gender, $id = '')
  {
    $this->data['ID']       = intval(sanitize_text_field($id));
    $this->data['name']     = sanitize_text_field($name);
    $this->data['email']    = sanitize_text_field($email);
    if ($birthday) {
      $this->data['birthday'] = date("Y-m-d", strtotime(sanitize_text_field($birthday)));
    }
    $this->data['gender']   = sanitize_text_field($gender);
  }

  static public function create($name, $email, $birthday, $gender)
  {
    global $wpdb;
    $table = $wpdb->prefix . 'members';
    $member  = new self($name, $email, $birthday, $gender);
    $wpdb->insert($table, array(
      "name" => $member->data['name'],
      "email" => $member->data['email'],
      "birthday" => $member->data['birthday'],
      "gender" => $member->data['gender'],
    ));
    $member->data['ID'] = $wpdb->insert_id;
    return $member->data;
  }

  static public function list()
  {
    global $wpdb;
    $table = $wpdb->prefix . 'members';
    return $wpdb->get_results("SELECT * FROM $table");
  }

  static public function delete($id)
  {
    global $wpdb;
    $table = $wpdb->prefix . 'members';
    $id = intval(sanitize_text_field($id));
    $wpdb->delete($table, array('ID' => $id));
    return;
  }

  static public function update($name, $email, $birthday, $gender, $id)
  {
    global $wpdb;
    $table = $wpdb->prefix . 'members';
    $member  = new self($name, $email, $birthday, $gender, $id);
    $wpdb->update($table, $member->data, array('ID' => $member->data['ID']));
    return $member->data;
  }

  static public function view($id)
  {
    global $wpdb;
    $table = $wpdb->prefix . 'members';
    $id = intval(sanitize_text_field($id));
    return $wpdb->get_row("SELECT * FROM $table WHERE $id = ID");
  }
}
