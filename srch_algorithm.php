<?

if(__FILE__ == $_SERVER['SCRIPT_FILENAME'])
{
    exit('Accesso non consentito') ;
}

if(isset($cat) && empty($loc)) { // URL category property
    $cat=trim(addslashes($cat));
    $que="select * from listings where post_sts=1 ";
    if(!empty($cat)) {
        if($cat=="estero") {
            $que.="and location not like '%Italia%' ";
        }
        else {
            $que.="and category='$cat' ";
        }
    }
    else {
        echo "<script>location.href='$siteurl';</script>";
        header("Location: $siteurl"); exit;
    }
}
else if(isset($types) && empty($loc)) { // URL type property
    $types=trim(addslashes($types));
    $que="select * from listings where post_sts=1 ";
    if(!empty($types)) {
        if($types=="tutto-il-mondo") {
            $que.="and location not like '%Italia%' ";
        }
        else {
            $que.="and types='$types' ";
        }
    }
    else {
        echo "<script>location.href='$siteurl';</script>";
        header("Location: $siteurl"); exit;
    }
}
else if(isset($loc) && empty($cat) && empty($types)) { // URL ?loc= filter
    $_SESSION['loc']=trim(addslashes($loc));
    $_SESSION['loc'] = str_replace("-", " ", $_SESSION['loc']);

    $curpage = $_SERVER['PHP_SELF'];
    echo "<script>location.href='$curpage';</script>";
    header("Location: $curpage"); exit;
}
else if(isset($_GET['types']) && isset($_GET['loc'])) { // URL types property combined with location
    $_SESSION['types']=trim(addslashes($_GET['types']));
    $_SESSION['loc']=trim(addslashes($_GET['loc']));
    $_SESSION['loc'] = str_replace("-", " ", $_SESSION['loc']);

    $curpage = $_SERVER['PHP_SELF'];
    echo "<script>location.href='$curpage';</script>";
    header("Location: $curpage"); exit;
}
else if(isset($_GET['cat']) && isset($_GET['loc'])) { // URL category property combined with location
    $_SESSION['cat']=trim(addslashes($_GET['cat']));
    $_SESSION['loc']=trim(addslashes($_GET['loc']));
    $_SESSION['loc'] = str_replace("-", " ", $_SESSION['loc']);

    $curpage = $_SERVER['PHP_SELF'];
    echo "<script>location.href='$curpage';</script>";
    header("Location: $curpage"); exit;
}
else if(isset($quicksrch1)) { // Quicksearch1 homepage
    $city=trim(addslashes($city));
    $covered_area=trim(addslashes($covered_area));
    $budgetmin=trim(addslashes($tbudmin));
    $budgetmax=trim(addslashes($tbudmax));
    $cat=trim(addslashes($categ));
    $pfor=trim(addslashes($pfor));
    $que="select * from listings where post_sts=1 ";

    //Save research
    $set = "category='$cat',";
    $set .= "location='$city',";
    $set .= "pfor='$pfor',";
    $set .= "tbudmin='$tbudmin',";
    $set .= "tbudmax='$tbudmax',";
    $set .= "form='quicksrch1'";
    $save = "insert into research set $set";
    $db->insertid($save);

    if(!empty($city)) {
        $que.="and location like '%$city%' or address like '%$city%' ";
        if(!empty($cat)) {
            $que .= "and category='$cat' ";
        }
        if(!empty($pfor)) {
            $que.="and prop_for='$pfor' ";
        }
        if(!empty($covered_area)) {
            $que.="and covered_area>='$covered_area' ";
        }
        if(!empty($budgetmin) && !empty($budgetmax)) {
            $que .= "and exp_price between $budgetmin and $budgetmax ";
        }
        else if(!empty($budgetmin) && empty($budgetmax)) {
            $que .= "and exp_price>='$budgetmin'";
        }
        else if(empty($budgetmin) && !empty($budgetmax)) {
            $que .= "and exp_price<='$budgetmax'";
        }
    }
    else if(empty($city)&&!empty($covered_area)) {
        $que.="and covered_area>='$covered_area' ";
        if(!empty($cat)) {
            $que .= "and category='$cat' ";
        }
        if(!empty($pfor)) {
            $que.="and prop_for='$pfor' ";
        }
        if(!empty($covered_area)) {
            $que.="and covered_area>='$covered_area' ";
        }
        if(!empty($budgetmin) && !empty($budgetmax)) {
            $que .= "and exp_price between $budgetmin and $budgetmax ";
        }
        else if(!empty($budgetmin) && empty($budgetmax)) {
            $que .= "and exp_price>='$budgetmin'";
        }
        else if(empty($budgetmin) && !empty($budgetmax)) {
            $que .= "and exp_price<='$budgetmax'";
        }
    }
    else if(empty($city)&&!empty($budgetmin) || !empty($budgetmax)) {
        if(!empty($budgetmin) && !empty($budgetmax)) {
            $que .= "and exp_price between $budgetmin and $budgetmax ";
        }
        else if(!empty($budgetmin) && empty($budgetmax)) {
            $que .= "and exp_price>='$budgetmin'";
        }
        else if(empty($budgetmin) && !empty($budgetmax)) {
            $que .= "and exp_price<='$budgetmax'";
        }
        if(!empty($cat)) {
            $que .= "and category='$cat' ";
        }
        if(!empty($pfor)) {
            $que.="and prop_for='$pfor' ";
        }
        if(!empty($covered_area)) {
            $que.="and covered_area>='$covered_area' ";
        }
    }
    else if(empty($city)&&!empty($cat)) {
        $que.="and category='$cat' ";
        if(!empty($pfor)) {
            $que.="and prop_for='$pfor' ";
        }
        if(!empty($covered_area)) {
            $que.="and covered_area>='$covered_area' ";
        }
        if(!empty($budgetmin) && !empty($budgetmax)) {
            $que .= "and exp_price between $budgetmin and $budgetmax ";
        }
        else if(!empty($budgetmin) && empty($budgetmax)) {
            $que .= "and exp_price>='$budgetmin'";
        }
        else if(empty($budgetmin) && !empty($budgetmax)) {
            $que .= "and exp_price<='$budgetmax'";
        }
    }
    else if(empty($city)&&!empty($pfor)) {
        $que.="and prop_for='$pfor' ";
        if(!empty($cat)) {
            $que .= "and category='$cat' ";
        }
        if(!empty($covered_area)) {
            $que.="and covered_area>='$covered_area' ";
        }
        if(!empty($budgetmin) && !empty($budgetmax)) {
            $que .= "and exp_price between $budgetmin and $budgetmax ";
        }
        else if(!empty($budgetmin) && empty($budgetmax)) {
            $que .= "and exp_price>='$budgetmin'";
        }
        else if(empty($budgetmin) && !empty($budgetmax)) {
            $que .= "and exp_price<='$budgetmax'";
        }
    }

}
else if(isset($advsrch)) { // Advsrch widget sidebar
    $keyword=trim(addslashes($keyword));
    $cat=trim(addslashes($categ));
    $pfor=trim(addslashes($pfor));
    $bed=trim(addslashes($bed));
    $bath=trim(addslashes($bath));
    $min=trim(addslashes($minp));
    $max=trim(addslashes($maxp));
    $que="select * from listings where post_sts=1 ";

    //Save research
    $set = "category='$cat',";
    $set .= "location='$keyword',";
    $set .= "pfor='$pfor',";
    $set .= "tbudmin='$min',";
    $set .= "tbudmax='$max',";
    $set .= "form='advsrch'";
    $save = "insert into research set $set";
    $db->insertid($save);

    if(!empty($keyword)) {
        $que.="and (prop_title like '%$keyword%' or location like '%$keyword%' or address like '%$keyword%') ";
        if(!empty($cat)) {
            $que.="and category='$cat' ";
        }
        if(!empty($pfor)) {
            $que.="and prop_for='$pfor' ";
        }
        if(!empty($bed)) {
            $que.="and bedroom='$bed' ";
        }
        if(!empty($bath)) {
            $que.="and bathroom='$bath' ";
        }
        if(!empty($min) && !empty($max)) {
            $que .= "and exp_price between $min and $max ";
        }
        if(!empty($min) && empty($max)) {
            $que.="and exp_price>=$min ";
        }
        if(empty($min) && !empty($max)) {
            $que.="and exp_price<=$max ";
        }
    }
    else if(empty($keyword)&&!empty($cat)) {
        $que.="and category='$cat' ";
        if(!empty($pfor)) {
            $que.="and prop_for='$pfor' ";
        }
        if(!empty($bed)) {
            $que.="and bedroom='$bed' ";
        }
        if(!empty($bath)) {
            $que.="and bathroom='$bath' ";
        }
        if(!empty($min) && !empty($max)) {
            $que .= "and exp_price between $min and $max ";
        }
        if(!empty($min) && empty($max)) {
            $que.="and exp_price>=$min ";
        }
        if(empty($min) && !empty($max)) {
            $que.="and exp_price<=$max ";
        }
    }
    else if(empty($keyword)&&empty($cat)&&!empty($pfor)) {
        $que.="and prop_for='$pfor' ";
        if(!empty($bed)) {
            $que.="and bedroom='$bed' ";
        }
        if(!empty($bath)) {
            $que.="and bathroom='$bath' ";
        }
        if(!empty($min) && !empty($max)) {
            $que .= "and exp_price between $min and $max ";
        }
        if(!empty($min) && empty($max)) {
            $que.="and exp_price>=$min ";
        }
        if(empty($min) && !empty($max)) {
            $que.="and exp_price<=$max ";
        }
    }
    else if(empty($keyword)&&empty($cat)&&empty($pfor)&&!empty($bed)) {
        $que.="and bedroom='$bed' ";
        if(!empty($bath)) {
            $que.="and bathroom='$bath' ";
        }
        if(!empty($min) && !empty($max)) {
            $que .= "and exp_price between $min and $max ";
        }
        if(!empty($min) && empty($max)) {
            $que.="and exp_price>=$min ";
        }
        if(empty($min) && !empty($max)) {
            $que.="and exp_price<=$max ";
        }
    }
    else if(empty($keyword)&&empty($cat)&&empty($pfor)&&empty($bed)&&!empty($bath)) {
        $que.="and bathroom='$bath' ";
        if(!empty($min) && !empty($max)) {
            $que .= "and exp_price between $min and $max ";
        }
        if(!empty($min) && empty($max)) {
            $que.="and exp_price>=$min ";
        }
        if(empty($min) && !empty($max)) {
            $que.="and exp_price<=$max ";
        }
    }
    else if(empty($keyword)&&empty($cat)&&empty($pfor)&&empty($bed)&&empty($bath)&&!empty($min) || !empty($max)) {
        if(!empty($min) && !empty($max)) {
            $que .= "and exp_price between $min and $max ";
        }
        if(!empty($min) && empty($max)) {
            $que.="and exp_price>=$min ";
        }
        if(empty($min) && !empty($max)) {
            $que.="and exp_price<=$max ";
        }
    }
}
else {
    $que="select * from listings where post_sts=1 ";
}

if(isset($_SESSION['types'])){ //Check types variable in URL
    $types = $_SESSION['types'];
    unset($_SESSION['types']);
    $que.="and types='$types' ";
}
if(isset($_SESSION['cat'])){ //Check category variable in URL
    $cat = $_SESSION['cat'];
    unset($_SESSION['cat']);
    $que.="and category='$cat' ";
}
if(isset($_GET['pfor'])){ //Check pfor variable in URL
    $propfor = trim(addslashes($_GET['pfor']));
    if($propfor == 'vendita' || $propfor == 'affitto') {
        $que .= "and prop_for='$propfor' ";
    } else { $propfor = null; }
}
if(isset($_SESSION['loc'])){ //Check loc variable in URL
    $loc = $_SESSION['loc'];
    unset($_SESSION['loc']);
    $que.="and location like '%$loc%'";
}
if(isset($_SESSION['propfor'])){ //Check loc variable in URL
    $propfor = $_SESSION['propfor'];
    unset($_SESSION['propfor']);
    if($propfor == 'vendita' || $propfor == 'affitto') {
        $que .= "and prop_for='$propfor' ";
    } else { $propfor = null; }
}
$que.="order by id desc";
?>