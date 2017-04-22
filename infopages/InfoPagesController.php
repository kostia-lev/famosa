<?php
namespace InfoPages;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class InfoPagesController
{
    function __construct()
    {
        if($_SERVER['REQUEST_URI'] != '/contact'){
            require_once 'header.php';
        }
    }

    public function faqAction(Request $request, Application $app ){

        $faq = $GLOBALS['db']->get_all("select * from faq where status=1 order by id");

        require_once 'faq.php';

        return '';
    }

    public function termsConditionAction(Request $request, Application $app ){

        $cms = $GLOBALS['db']->singlerec("select * from cms where active_status=1");

        require_once 'terms-condition.php';

        return '';
    }

    public function privacyPolicyAction(Request $request, Application $app ){

        $cms = $GLOBALS['db']->singlerec("select * from cms where active_status=1");

        require_once 'privacy-policy.php';

        return '';
    }

    public function contattiAction(Request $request, Application $app ){

        $agency = $GLOBALS['db']->singlerec("select * from general_setting where id='1'");
        require_once 'contatti.php';

        return '';
    }

    public function contactAction(Request $request, Application $app ){

        require_once 'contact.php';

        return '';
    }

    public function lavoraconnoiAction(Request $request, Application $app ){
        $cms = $GLOBALS['db']->singlerec("select * from cms where active_status=1");
        require_once 'lavora-con-noi.php';

        return '';
    }

    public function chisiamoAction(Request $request, Application $app ){
        $cms = $GLOBALS['db']->singlerec("select * from cms where active_status=1");

        $que = "select * from register where active=1";
        $result = $GLOBALS['db']->get_all($que);
        require_once 'chi-siamo.php';

        return '';
    }
}