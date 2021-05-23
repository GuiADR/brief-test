<?php

use App\Controllers\MemberController;

function bt_create_routes()
{
  //crete member route
  register_rest_route('api', 'member', array(
    'methods' => 'POST',
    'permission_callback' => '__return_true',
    'callback' => function (WP_REST_Request $request) {
      $member = MemberController::create($request);
      $response = new WP_REST_Response();
      $response->set_data($member['data']);
      $response->set_status($member['status']);
      return $response;
    },
  ));
  //list members route
  register_rest_route('api', 'member', array(
    'methods' => 'GET',
    'permission_callback' => '__return_true',
    'callback' => function () {
      $member = MemberController::list();
      $response = new WP_REST_Response();
      $response->set_data($member['data']);
      $response->set_status($member['status']);
      return $response;
    },
  ));
  //Delete member route
  register_rest_route('api', 'member/(?P<id>\d+)', array(
    'methods' => 'DELETE',
    'permission_callback' => '__return_true',
    'callback' => function (WP_REST_Request $request) {
      $member = MemberController::delete($request['id']);
      $response = new WP_REST_Response();
      $response->set_data($member['data']);
      $response->set_status($member['status']);
      return $response;
    },
  ));
  //Update member route
  register_rest_route('api', 'member/(?P<id>\d+)', array(
    'methods' => 'PUT',
    'permission_callback' => '__return_true',
    'callback' => function (WP_REST_Request $request) {
      $member = MemberController::update($request);
      $response = new WP_REST_Response();
      $response->set_data($member['data']);
      $response->set_status($member['status']);
      return $response;
    },
  ));
  //View member route
  register_rest_route('api', 'member/(?P<id>\d+)', array(
    'methods' => 'GET',
    'permission_callback' => '__return_true',
    'callback' => function (WP_REST_Request $request) {
      $member = MemberController::view($request);
      $response = new WP_REST_Response();
      $response->set_data($member['data']);
      $response->set_status($member['status']);
      return $response;
    },
  ));
}
