<?php
namespace InfoPages;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class InfoPagesController
{
    public function faqAction(Request $request, Application $app ){

        require_once 'faq.php';

        return '';

    }
}