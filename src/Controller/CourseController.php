<?php

namespace App\Controller;
use App\Model\Admin;
use App\Service\Router;
use App\Service\Templating;
use App\Model\Course;

class CourseController
{

//    public function indexAction(Templating $templating, Router $router): ?string
//    {
//        $html = $templating->render('admin/index.html.php', [
//            'router' => $router,
//        ]);
//        return $html;
//    }

    public function indexAction(Templating $templating, Router $router): ?string
    {
//        /** @var $user Admin */
//global $user;
//die("My name is {$user->getAdminId()}");
        $html = $templating->render('test/test.html.php', [

            'router' => $router,
        ]);
        return $html;
    }
}