<?php
namespace AuthPages;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class AuthPagesController
{
    function __construct()
    {
        //if($_SERVER['REQUEST_URI'] != '/contact'){
        //}
    }

    public function signupAction(Request $request, Application $app ){

        require_once "admin/AMframe/config.php";



        require_once 'signup.php';

        return '';
    }
}