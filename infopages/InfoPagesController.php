<?php
/**
 * Created by PhpStorm.
 * User: kostyantynvakhrushev
 * Date: 21.04.17
 * Time: 13:16
 */

namespace InfoPages;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class InfoPagesController
{
    public function faqAction(Request $request, Application $app ){



        exit('hello, I am faq');


    }
}