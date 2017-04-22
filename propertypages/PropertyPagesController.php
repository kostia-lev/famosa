<?php
namespace PropertyPages;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class PropertyPagesController
{
    function __construct()
    {
        //if($_SERVER['REQUEST_URI'] != '/contact'){
        require_once 'header.php';
        require_once 'mapapi.php';
        //}
    }

    public function frontAction(Request $request, Application $app ){

        $result = $GLOBALS['db']->get_all_with_images();
        require_once 'frontpage.php';

        return '';
    }

    public function propListAction(Request $request, Application $app ){

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
}