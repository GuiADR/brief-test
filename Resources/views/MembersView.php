<?php

namespace Resources\views;

class MembersView
{

  static public function render_item($member)
  {
    $item = '<tr>
              <td>' . $member->ID . '</td>
              <td>' . $member->name . '</td>
              <td>' . $member->email . '</td>
              <td>' . $member->birthday . '</td>
              <td>' . $member->gender . '</td>
            </tr>';
    return $item;
  }

  static public function render($members)
  {
    $html = '<table>
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>E-mail</th>
                  <th>Birthday</th>
                  <th>Gender</th>
                </tr>
              </thead>
              <tbody>';
    foreach ($members as $member) {
      $html .= self::render_item($member);
    }
    $html .=  '</tbody>
            </table>';
    return $html;
  }
}
