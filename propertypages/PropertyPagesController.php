<?php
namespace PropertyPages;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class PropertyPagesController
{
    function __construct()
    {
        //if($_SERVER['REQUEST_URI'] != '/contact'){
        //}
    }

    public function frontAction(Request $request, Application $app ){
        require_once 'header.php';
        require_once 'mapapi.php';

        $result = $GLOBALS['db']->get_all_with_images();
        require_once 'frontpage.php';

        return '';
    }

    public function propListAction(Request $request, Application $app ){
        require_once 'header.php';
        require_once 'mapapi.php';

        //to avoid errors in ide
        $queryTypes = '';
        $queryParams = [];
        require_once "pagination.php";
        $perpage=12;
        $limit=limitation($perpage);
        //$que="select * from listings where post_sts=1 ";
        $que = $GLOBALS['db']->getAllPropertySql();

        //require_once "srch_algorithm.php";
        if(!isset($_GET['quicksrch1']) || !isset($_GET['advsrch'])) { // Quicksearch1 homepage
            $keyword = $_GET['keyword']??null;
            $city = $_GET['city']??null;
            $covered_area = $_GET['covered_area']??null;
            $budgetmin = $_GET['tbudmin']??null;
            $budgetmax = $_GET['tbudmax']??null;
            $cat = $categ = $_GET['categ']??null;
            $pfor = $_GET['pfor']??null;
            $bed = $_GET['bed']??null;
            $bath = $_GET['bath']??null;

            $formname = $quicksrch1??$advsrch??null;

            //Save research
            $set = "category=?,";
            $set .= "location=?,";
            $set .= "pfor=?,";
            $set .= "tbudmin=?,";
            $set .= "tbudmax=?,";
            $set .= "form='$formname'";
            $insertTypes = 'sssdd';
            $insertParams = [$insertTypes, $cat, $city, $pfor, $budgetmin, $budgetmax];

            $save = "insert into research set $set";

            $GLOBALS['db']->insertIdPreparedStatement($save, $insertParams);

            if(!empty($keyword)) {
                $que.="and (prop_title like ? or location like ? or address like ?) ";
                $queryParams[] = "%$keyword%";
                $queryTypes.='s';
                $queryParams[] = "%$keyword%";
                $queryTypes.='s';
                $queryParams[] = "%$keyword%";
                $queryTypes.='s';
            }
            if(!empty($city)) {
                $que.=" and location like ? or address like ? ";
                $queryParams[] = "%$city%";
                $queryTypes.='s';
                $queryParams[] = "%$city%";
                $queryTypes.='s';
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
                $queryParams[] = (int)$covered_area;
                $queryTypes.='d';
            }
            if(!empty($budgetmin)) {
                $que .= "and exp_price>=? ";
                $queryParams[] = (int)$budgetmin;
                $queryTypes.='d';
            }
            if(!empty($budgetmax)) {
                $que .= "and exp_price<=? ";
                $queryParams[] = (int)$budgetmax;
                $queryTypes.='d';
            }
            if(!empty($bed)) {
                $que.="and bedroom=? ";
                $queryParams[] = (int)$bed;
                $queryTypes.='d';
            }
            if(!empty($bath)) {
                $que.="and bathroom=? ";
                $queryParams[] = (int)$bath;
                $queryTypes.='d';
            }

            /*
            var_dump($queryParams);
            exit($que);*/
        }
        $que .= " order by id desc";

        $result = $GLOBALS['db']->getAllinsertIdPreparedStatement($que, $queryTypes, $queryParams);

        require_once 'property-list.php';

        return '';
    }

    public function categoryAction(Request $request, Application $app ){
        require_once 'header.php';
        require_once 'mapapi.php';

        //to avoid errors in ide
        $queryTypes = $queryParams = null;
        require_once "pagination.php";
        $perpage=12;
        $limit=limitation($perpage);
        //require_once "srch_algorithm.php";
        /*$queryParams[] = $types;
        $queryTypes.='s';*/

        $output = $GLOBALS['db']->getAllPropertyByCategory('s', [$request->get('cat')]);
        $result = $output['result'];
        $que = $output['que'];
        $queryParams = [$request->get('cat')];
        $queryTypes = 's';

        require_once 'property-list.php';

        return '';
    }

    public function typeAction(Request $request, Application $app ){
        require_once 'header.php';
        require_once 'mapapi.php';

        //to avoid errors in ide
        $queryTypes = $queryParams = null;
        require_once "pagination.php";
        $perpage=12;
        $limit=limitation($perpage);

        $output = $GLOBALS['db']->getAllPropertyByType('s', [$request->get('types')]);
        $result = $output['result'];
        $que = $output['que'];
        $queryParams = [$request->get('types')];
        $queryTypes = 's';

        require_once 'property-list.php';

        return '';
    }

    public function propertyDetailAction(Request $request, Application $app ){
        $prop = $request->get('prop');
        require_once 'header.php';

        $pid=trim(addslashes($prop));
        if($pid=='') {
            echo "<script>location.href='/manage-your-list';</script>";
            header("Location: /manage-your-list"); exit;
        }
        $prop = $GLOBALS['db']->singlerec(
             "select l.*,
              lim.image as limimage, lim.id as limid,
              
              r.randuniq as rranduniq, r.fullname as rfullname, r.mobile as rmobile, r.email as remail,
              r.prof_image as rprof_image
              
              from listings l 
              left join listing_images lim on lim.pid = l.id
              left join register r on r.email = l.email
              where l.randuniq='$pid' limit 1");

        //var_dump(array_keys($prop));exit;

        if($prop['id']=='') {
            echo "<script>location.href='/manage-your-list';</script>";
            header("Location: /manage-your-list");
        }

        //$agent = $GLOBALS['db']->singlerec("select * from register where email='".$prop['email']."'");
        //$im = $GLOBALS['db']->singlerec("select * from listing_images where pid='".$prop['id']."' order by id limit 1");
        $agency = $GLOBALS['GetSite'];

        require_once 'property-detail.php';

        return '';
    }
}