<?
//include "admin/AMframe/config.php";

unset($_SESSION['usr']);
echo "<script>location.href='$siteurl';</script>";
header("Location: $siteurl"); exit;
?>