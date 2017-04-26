<?

if(__FILE__ == $_SERVER['SCRIPT_FILENAME'])
{
    exit('Accesso non consentito') ;
}
//@tobe removed as non secure
foreach ($_REQUEST as $key=>$value) {
    $$key=$value;
}
//array of params for query
$queryParams = [];
$queryTypes = '';

/*if(isset($cat) && empty($loc)) { // URL category property
    $cat=trim(addslashes($cat));
    $que="select * from listings where post_sts=1 ";
    if(!empty($cat)) {
        if($cat=="estero") {
            $que.="and location not like '%Italia%' ";
        }
        else {
            $que.="and category=? ";
            $queryParams[] = $cat;
            $queryTypes.='s';
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
            $que.="and types=? ";
            $queryParams[] = $types;
            $queryTypes.='s';
        }
    }
    else {
        echo "<script>location.href='$siteurl';</script>";
        header("Location: $siteurl"); exit;
    }
}
else */
if(isset($loc) && empty($cat) && empty($types)) { // URL ?loc= filter
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
    $set = "category=?,";
    $set .= "location=?,";
    $set .= "pfor=?,";
    $set .= "tbudmin=?,";
    $set .= "tbudmax=?,";
    $set .= "form='quicksrch1'";
    $insertTypes = 'sssdd';
    $insertParams = [$insertTypes, $cat, $city, $pfor, $tbudmin, $tbudmax];

    $save = "insert into research set $set";

    $GLOBALS['db']->insertIdPreparedStatement($save, $insertParams);

    if(!empty($city)) {
        $que.="and location like ? or address like ? ";
        $queryParams[] = "'%$city%'";
        $queryTypes.='s';
        $queryParams[] = "'%$city%'";
        $queryTypes.='s';
        if(!empty($cat)) {
            $que .= "and category=? ";
            $queryParams[] = $cat;
            $queryTypes.='s';
        }
        if(!empty($pfor)) {
            $que.="and prop_for=? ";
            $queryParams[] = $pfor;
            $queryTypes.='s';
        }
        if(!empty($covered_area)) {
            $que.="and covered_area>=? ";
            $queryParams[] = $covered_area;
            $queryTypes.='d';
        }
        if(!empty($budgetmin) && !empty($budgetmax)) {
            $que .= "and exp_price between $budgetmin and $budgetmax ";
            $queryParams[] = $budgetmin;
            $queryParams[] = $budgetmax;
            $queryTypes.='d';
            $queryTypes.='d';
        }
        else if(!empty($budgetmin) && empty($budgetmax)) {
            $que .= "and exp_price>=?";
            $queryParams[] = $budgetmin;
            $queryTypes.='d';
        }
        else if(empty($budgetmin) && !empty($budgetmax)) {
            $que .= "and exp_price<=?";
            $queryParams[] = $budgetmax;
            $queryTypes.='d';
        }
    }
    else if(empty($city)&&!empty($covered_area)) {
        $que.="and covered_area>=? ";
        if(!empty($cat)) {
            $que .= "and category=? ";
            $queryParams[] = $cat;
            $queryTypes.='s';
        }
        if(!empty($pfor)) {
            $que.="and prop_for=? ";
            $queryParams[] = $pfor;
            $queryTypes.='s';
        }
        if(!empty($covered_area)) {
            $que.="and covered_area>=? ";
            $queryParams[] = $covered_area;
            $queryTypes.='d';
        }
        if(!empty($budgetmin) && !empty($budgetmax)) {
            $que .= "and exp_price between ? and ? ";
            $queryParams[] = $budgetmin;
            $queryParams[] = $budgetmax;
            $queryTypes.='d';
            $queryTypes.='d';
        }
        else if(!empty($budgetmin) && empty($budgetmax)) {
            $que .= "and exp_price>=?";
            $queryParams[] = $budgetmin;
            $queryTypes.='d';
        }
        else if(empty($budgetmin) && !empty($budgetmax)) {
            $que .= "and exp_price<=?";
            $queryParams[] = $budgetmax;
            $queryTypes.='d';
        }
    }
    else if(empty($city)&&!empty($budgetmin) || !empty($budgetmax)) {
        if(!empty($budgetmin) && !empty($budgetmax)) {
            $que .= "and exp_price between ? and ? ";
            $queryParams[] = $budgetmin;
            $queryParams[] = $budgetmax;
            $queryTypes.='d';
            $queryTypes.='d';
        }
        else if(!empty($budgetmin) && empty($budgetmax)) {
            $que .= "and exp_price>=?";
            $queryParams[] = $budgetmin;
            $queryTypes.='d';
        }
        else if(empty($budgetmin) && !empty($budgetmax)) {
            $que .= "and exp_price<=?";
            $queryParams[] = $budgetmax;
            $queryTypes.='d';
        }
        if(!empty($cat)) {
            $que .= "and category=? ";
            $queryParams[] = $cat;
            $queryTypes.='s';
        }
        if(!empty($pfor)) {
            $que.="and prop_for=? ";
            $queryParams[] = $pfor;
            $queryTypes.='s';
        }
        if(!empty($covered_area)) {
            $que.="and covered_area>=? ";
            $queryParams[] = $covered_area;
            $queryTypes.='d';
        }
    }
    else if(empty($city)&&!empty($cat)) {
        $que.="and category=? ";
        $queryParams[] = $cat;
        $queryTypes.='s';
        if(!empty($pfor)) {
            $que.="and prop_for=? ";
            $queryParams[] = $pfor;
            $queryTypes.='s';
        }
        if(!empty($covered_area)) {
            $que.="and covered_area>=? ";
            $queryParams[] = $covered_area;
            $queryTypes.='d';
        }
        if(!empty($budgetmin) && !empty($budgetmax)) {
            $que .= "and exp_price between ? and ? ";
            $queryParams[] = $budgetmin;
            $queryParams[] = $budgetmax;
            $queryTypes.='d';
            $queryTypes.='d';
        }
        else if(!empty($budgetmin) && empty($budgetmax)) {
            $que .= "and exp_price>=?";
            $queryParams[] = $budgetmin;
            $queryTypes.='d';
        }
        else if(empty($budgetmin) && !empty($budgetmax)) {
            $que .= "and exp_price<=?";
            $queryParams[] = $budgetmax;
            $queryTypes.='d';
        }
    }
    else if(empty($city)&&!empty($pfor)) {
        $que.="and prop_for=? ";
        $queryParams[] = $pfor;
        $queryTypes.='s';
        if(!empty($cat)) {
            $que .= "and category=? ";
            $queryParams[] = $cat;
            $queryTypes.='s';
        }
        if(!empty($covered_area)) {
            $que.="and covered_area>=? ";
            $queryParams[] = $covered_area;
            $queryTypes.='d';
        }
        if(!empty($budgetmin) && !empty($budgetmax)) {
            $que .= "and exp_price between ? and ? ";
            $queryParams[] = $budgetmin;
            $queryParams[] = $budgetmax;
            $queryTypes.='d';
            $queryTypes.='d';
        }
        else if(!empty($budgetmin) && empty($budgetmax)) {
            $que .= "and exp_price>=?";
            $queryParams[] = $budgetmin;
            $queryTypes.='d';
        }
        else if(empty($budgetmin) && !empty($budgetmax)) {
            $que .= "and exp_price<=?";
            $queryParams[] = $budgetmax;
            $queryTypes.='d';
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
    $set = "category=?,";
    $set .= "location=?,";
    $set .= "pfor=?,";
    $set .= "tbudmin=?,";
    $set .= "tbudmax=?,";
    $set .= "form='advsrch'";
    $insertTypes = 'sssdd';
    $insertParams = [$insertTypes, $cat, $city, $pfor, $tbudmin, $tbudmax];

    $save = "insert into research set $set";

    $GLOBALS['db']->insertIdPreparedStatement($save, $insertParams);

    if(!empty($keyword)) {
        $que.="and (prop_title like ? or location like ? or address like ?) ";
        $queryParams[] = "'%$keyword%'";
        $queryTypes.='s';
        $queryParams[] = "'%$keyword%'";
        $queryTypes.='s';
        $queryParams[] = "'%$keyword%'";
        $queryTypes.='s';

        if(!empty($cat)) {
            $que.="and category=? ";
            $queryParams[] = $cat;
            $queryTypes.='s';
        }
        if(!empty($pfor)) {
            $que.="and prop_for=? ";
            $queryParams[] = $pfor;
            $queryTypes.='s';
        }
        if(!empty($bed)) {
            $que.="and bedroom=? ";
            $queryParams[] = $bed;
            $queryTypes.='s';
        }
        if(!empty($bath)) {
            $que.="and bathroom=? ";
            $queryParams[] = $bath;
            $queryTypes.='s';
        }
        if(!empty($min) && !empty($max)) {
            $que .= "and exp_price between ? and ? ";
            $queryParams[] = $min;
            $queryParams[] = $max;
            $queryTypes.='d';
            $queryTypes.='d';
        }
        if(!empty($min) && empty($max)) {
            $que.="and exp_price>=$min ";
            $queryParams[] = $min;
            $queryTypes.='d';
        }
        if(empty($min) && !empty($max)) {
            $que.="and exp_price<=$max ";
            $queryParams[] = $max;
            $queryTypes.='d';
        }
    }
    else if(empty($keyword)&&!empty($cat)) {
        $que.="and category=? ";
        $queryParams[] = $cat;
        $queryTypes.='s';
        if(!empty($pfor)) {
            $que.="and prop_for=? ";
            $queryParams[] = $pfor;
            $queryTypes.='s';
        }
        if(!empty($bed)) {
            $que.="and bedroom=? ";
            $queryParams[] = $bed;
            $queryTypes.='s';
        }
        if(!empty($bath)) {
            $que.="and bathroom=? ";
            $queryParams[] = $bath;
            $queryTypes.='s';
        }
        if(!empty($min) && !empty($max)) {
            $que .= "and exp_price between ? and ? ";
            $queryParams[] = $min;
            $queryParams[] = $max;
            $queryTypes.='d';
            $queryTypes.='d';
        }
        if(!empty($min) && empty($max)) {
            $que.="and exp_price>=? ";
            $queryParams[] = $min;
            $queryTypes.='d';
        }
        if(empty($min) && !empty($max)) {
            $que.="and exp_price<=? ";
            $queryParams[] = $max;
            $queryTypes.='d';
        }
    }
    else if(empty($keyword)&&empty($cat)&&!empty($pfor)) {
        $que.="and prop_for=? ";
        if(!empty($bed)) {
            $que.="and bedroom=? ";
            $queryParams[] = $bed;
            $queryTypes.='s';
        }
        if(!empty($bath)) {
            $que.="and bathroom=? ";
            $queryParams[] = $bath;
            $queryTypes.='s';
        }
        if(!empty($min) && !empty($max)) {
            $que .= "and exp_price between ? and ? ";
            $queryParams[] = $min;
            $queryParams[] = $max;
            $queryTypes.='d';
            $queryTypes.='d';
        }
        if(!empty($min) && empty($max)) {
            $que.="and exp_price>=? ";
            $queryParams[] = $min;
            $queryTypes.='d';
        }
        if(empty($min) && !empty($max)) {
            $que.="and exp_price<=? ";
            $queryParams[] = $max;
            $queryTypes.='d';
        }
    }
    else if(empty($keyword)&&empty($cat)&&empty($pfor)&&!empty($bed)) {
        $que.="and bedroom=? ";
        $queryParams[] = $bed;
        $queryTypes.='s';
        if(!empty($bath)) {
            $que.="and bathroom=? ";
            $queryParams[] = $bath;
            $queryTypes.='s';
        }
        if(!empty($min) && !empty($max)) {
            $que .= "and exp_price between ? and ? ";
            $queryParams[] = $min;
            $queryParams[] = $max;
            $queryTypes.='d';
            $queryTypes.='d';
        }
        if(!empty($min) && empty($max)) {
            $que.="and exp_price>=? ";
            $queryParams[] = $min;
            $queryTypes.='d';
        }
        if(empty($min) && !empty($max)) {
            $que.="and exp_price<=? ";
            $queryParams[] = $max;
            $queryTypes.='d';
        }
    }
    else if(empty($keyword)&&empty($cat)&&empty($pfor)&&empty($bed)&&!empty($bath)) {
        $que.="and bathroom=? ";
        $queryParams[] = $bath;
        $queryTypes.='s';
        if(!empty($min) && !empty($max)) {
            $que .= "and exp_price between ? and ? ";
            $queryParams[] = $min;
            $queryParams[] = $max;
            $queryTypes.='d';
            $queryTypes.='d';
        }
        if(!empty($min) && empty($max)) {
            $que.="and exp_price>=? ";
            $queryParams[] = $min;
            $queryTypes.='d';
        }
        if(empty($min) && !empty($max)) {
            $que.="and exp_price<=? ";
            $queryParams[] = $max;
            $queryTypes.='d';
        }
    }
    else if(empty($keyword)&&empty($cat)&&empty($pfor)&&empty($bed)&&empty($bath)&&!empty($min) || !empty($max)) {
        if(!empty($min) && !empty($max)) {
            $que .= "and exp_price between ? and ? ";
            $queryParams[] = $min;
            $queryParams[] = $max;
            $queryTypes.='d';
            $queryTypes.='d';
        }
        if(!empty($min) && empty($max)) {
            $que.="and exp_price>=? ";
            $queryParams[] = $min;
            $queryTypes.='d';
        }
        if(empty($min) && !empty($max)) {
            $que.="and exp_price<=? ";
            $queryParams[] = $max;
            $queryTypes.='d';
        }
    }
}
else {
    $que="select * from listings where post_sts=1 ";
}

if(isset($_SESSION['types'])){ //Check types variable in URL
    $types = $_SESSION['types'];
    unset($_SESSION['types']);
    $que.="and types=? ";
    $queryParams[] = $types;
    $queryTypes.='s';
}
if(isset($_SESSION['cat'])){ //Check category variable in URL
    $cat = $_SESSION['cat'];
    unset($_SESSION['cat']);
    $que.="and category=? ";
    $queryParams[] = $cat;
    $queryTypes.='s';
}
if(isset($_GET['pfor'])){ //Check pfor variable in URL
    $propfor = trim(addslashes($_GET['pfor']));
    if($propfor == 'vendita' || $propfor == 'affitto') {
        $que .= "and prop_for=? ";
        $queryParams[] = $propfor;
        $queryTypes.='s';
    } else { $propfor = null; }
}
if(isset($_SESSION['loc'])){ //Check loc variable in URL
    $loc = $_SESSION['loc'];
    unset($_SESSION['loc']);
    $que.="and location like ?";
    $queryParams[] = '%'.$loc.'%';
    $queryTypes.='s';
}
if(isset($_SESSION['propfor'])){ //Check loc variable in URL
    $propfor = $_SESSION['propfor'];
    unset($_SESSION['propfor']);
    if($propfor == 'vendita' || $propfor == 'affitto') {
        $que .= "and prop_for=? ";
        $queryParams[] = $propfor;
        $queryTypes.='s';
    } else { $propfor = null; }
}
$que.="order by id desc";
?>