<?php
namespace AuthPages;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class AuthPagesController
{
    function __construct()
    {
    }

    public function signupAction(Request $request, Application $app ){

        require_once "admin/AMframe/config.php";

        require_once 'signup.php';

        return '';
    }

    public function sessionAction(Request $request, Application $app ){

        require_once "admin/AMframe/config.php";

        require_once 'session.php';

        return '';
    }

    public function logoutAction(Request $request, Application $app ){

        require_once "admin/AMframe/config.php";

        require_once 'logout.php';

        return '';
    }

    public function forgetpassAction(Request $request, Application $app ){

        require_once "admin/AMframe/config.php";

        require_once 'forgetpass.php';

        return '';
    }
}