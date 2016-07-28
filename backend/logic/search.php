<?php

if(isset($_GET['request'])){
  $request = $_GET['request'];
  // $request = strtolower($request);
  //$id = $request;

  // if (filter_var($request, FILTER_VALIDATE_EMAIL)) {
  //   $id = get_purchases_by_email($request);
  //   $purchases = get_purchases_from_user($id);
  //   echo 'TEST2';
  // }

  // $id = get_userid_by_email($request);
  // print_r($id);
  // $id2 = $id['id'];
  // print_r($id2);
  // $purchases = get_purchases_from_user($id2);

  if(is_numeric($request)){
    $id = $request;
    $purchases = get_purchases_from_user($id);
    $users = get_user_by_id($id);
    $user = $users[0]['email'];
    $user_name = $users[0]['fullname'];

    if($user != ''){
      $sugg_name = $user;
      $sugg_name2 = $user_name;
    }
      //print_r($purchases);
     echo 'IM NUM REQUEST';
     if(count($purchases) == -1){
       $sugg_name = 'No Result!';
     }
  } elseif($request != ''){
    echo 'IM STRING REQUEST';
    $id = get_userid_by_email($request);
    print_r($id);

    $sugg_name = $id[0]['email'];
    if($sugg_name != ''){
      $sugg_name = $id[0]['email'];
    } else {
      $sugg_name = 'No Result!';
    }
    $id2 = $id[0]['id'];


    $purchases = get_purchases_from_user($id2);
  } else {
    // NOTHING
  }

} else {
  // $purchases = get_purchases_from_user(1);
  // $id = 1;
  echo 'OTHER';
}





 ?>
