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
        $que = $queryTypes = $queryParams = null;
        require_once "pagination.php";
        $perpage=12;
        $limit=limitation($perpage);
        require_once "srch_algorithm.php";

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
}