<?
session_save_path('/home/sakthi/tmp');
ini_set('session.gc_probability', 1);
session_start();
setcookie("HmAcc","",0,"/");
@session_destroy();
echo "<script>location.href='login'</script>";
header("Location: login");
?>