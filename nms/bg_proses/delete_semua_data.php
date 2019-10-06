<?php

  require_once("../koneksi/koneksi.php");
  $deleteresource="DELETE FROM resources";
  $db->query($deleteresource);

  require_once("../koneksi/koneksi.php");
  $deletehealth="DELETE FROM health";
  $db->query($deletehealth);

  require_once("../koneksi/koneksi.php");
  $deleteinterfaces="DELETE FROM interfaces";
  $db->query($deleteinterfaces);

  require_once("../koneksi/koneksi.php");
  $deleteintlog="DELETE FROM log_int";
  $db->query($deleteintlog);

?>
