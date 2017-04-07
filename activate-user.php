<?
include 'header.php';
include 'profile_header.php';

if(isset($_GET['randuniq']) && $_GET['active'] == 0 || $_GET['active'] == 1) {

    $user_uniq = trim(addslashes($_GET['randuniq']));
    $active_value = trim(addslashes($_GET['active']));

    if ($user_uniq == '') {
        echo "<script>location.href='$siteurl/manage-users';</script>";
        header("Location: $siteurl/manage-your-list");
        exit;
    }

    $usr = $_SESSION['usr'];

    $user = $db->singlerec("select * from register where randuniq='$user_uniq' limit 1");
    if ($user['id'] == '') {
        echo "<script>location.href='$siteurl/manage-users';</script>";
        header("Location: $siteurl/manage-your-list");
        exit;
    }

    if ($usr != $user['email'] && $row['role'] != 'broker') {
        echo "<script>location.href='$siteurl/manage-users';</script>";
        header("Location: $siteurl/manage-your-list");
        exit;
    }

    $db->insertrec("update register set active='$active_value' where randuniq='$user_uniq' limit 1");

    $user_email = $user['email'];

    if($active_value == 1) {
        $db->insertrec("update listings set post_sts=1 where email='$user_email'");
        $_SESSION['usrenabled'] = true;
    }else if ($active_value == 0){
        $db->insertrec("update listings set post_sts=0 where email='$user_email'");
        $_SESSION['usrdisabled'] = true;
    }
    echo "<script>location.href='$siteurl/manage-users';</script>";
    header("Location: $siteurl/manage-users");
    exit;
}else{
    echo "<script>location.href='$siteurl/manage-users';</script>";
    header("Location: $siteurl/manage-users");
    exit;
}
?>