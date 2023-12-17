<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

$config = new \App\Service\Config();

$templating = new \App\Service\Templating();
$router = new \App\Service\Router();

$action = $_REQUEST['action'] ?? null;
switch ($action) {
    case 'admin-index':
    case null:
        $controller = new \App\Controller\AdminController();
        $view = $controller->indexAction($templating, $router);
        break;
    case 'admin-create':
        $controller = new \App\Controller\AdminController();
        $view = $controller->createAction($_REQUEST['test'] ?? null, $templating, $router);
        break;
    case 'admin-edit':
        if (! $_REQUEST['id']) {
            break;
        }
        $controller = new \App\Controller\PostController();
        $view = $controller->editAction($_REQUEST['id'], $_REQUEST['test'] ?? null, $templating, $router);
        break;
    case 'admin-show':
        if (! $_REQUEST['id']) {
            break;
        }
        $controller = new \App\Controller\PostController();
        $view = $controller->showAction($_REQUEST['id'], $templating, $router);
        break;
    case 'admin-delete':
        if (! $_REQUEST['id']) {
            break;
        }
        $controller = new \App\Controller\PostController();
        $view = $controller->deleteAction($_REQUEST['id'], $router);
        break;
    case 'info':
        $controller = new \App\Controller\InfoController();
        $view = $controller->infoAction();
        break;
    default:
        $view = 'Not found';
        break;
    case 'course-index':
        $controller = new \App\Controller\CourseController();
        $view = $controller->indexAction($templating, $router);
        break;
}

if ($view) {
    echo $view;
}
