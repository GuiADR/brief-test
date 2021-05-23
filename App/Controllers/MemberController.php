<?php

namespace App\Controllers;

use App\Models\Member;

class MemberController
{

  static public function create($request)
  {
    $response = array();
    if (!$request['name'] || !$request['email'] || !$request['birthday'] || !$request['gender']) {
      return $response = array(
        'data' => array('error' => 'All inputs are mandatory'),
        'status' => 400
      );
    }
    $response['data'] = Member::create($request['name'], $request['email'], $request['birthday'], $request['gender']);
    $response['status'] = 200;
    return $response;
  }
  static public function list()
  {
    $response['data'] = Member::list();
    $response['status'] = 200;
    if (empty($response) || $response['data'] === null) {
      $response['data'] = array("message" => "There are no members registered");
    }
    return $response;
  }
  static public function delete($id)
  {
    Member::delete($id);
    $response['data'] = array("message" => "Deleted member");
    $response['status'] = 200;
    return $response;
  }
  static public function update($request)
  {
    $response = array();
    if (!$request['name'] || !$request['email'] || !$request['birthday'] || !$request['gender']) {
      return $response = array(
        'data' => array('error' => 'All inputs are mandatory'),
        'status' => 400
      );
    }
    $response['data'] = Member::update($request['name'], $request['email'], $request['birthday'], $request['gender'], $request['id']);
    $response['status'] = 200;
    return $response;
  }
  static public function view($request)
  {
    $response['data'] = Member::view($request['id']);
    $response['status'] = 200;
    if (empty($response) || $response['data'] === null) {
      $response['data'] = array("message" => "There are no registered members with this ID");
    }
    return $response;
  }
}
