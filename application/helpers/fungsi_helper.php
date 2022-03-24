<?php 
if(!function_exists('notif')) {
    function notif($type, $pesan) {
      return '<div class="alert alert-'.$type.'" role="alert">
      '.$pesan.'
    </div>';
    }
  }
?>