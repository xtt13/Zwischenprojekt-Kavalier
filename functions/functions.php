<?php


function redirect_to($location, $message = "") {
  $_SESSION["flash"] = $message;
  header("location: $location");
  exit();
}

function is_post_request() {
  return (strtolower($_SERVER["REQUEST_METHOD"]) == "post" && !empty($_POST));
}

function display_pagination($site, $current_page, $total_pages) {
  $start = max($current_page-2, 1);
  $end = min($current_page+2, $total_pages);

  // wenn page-2 negativ ist, soll for-schleife bei 1 anfangen

  /*
  if($current_page-2 < 1) {
  $start = 1;
  } else {
  $start = $current_page-2;
  }
  */

  if($total_pages > 0) {
    if($current_page != 1) {
      include("views/pagination/pagination_first_link.php");
    }

    for ($i=$start; $i <= $end; $i++) {
      include("views/pagination/pagination_link.php");
    }


    if($current_page != $total_pages) {
      include("views/pagination/pagination_last_link.php");
    }
  }

}

?>
