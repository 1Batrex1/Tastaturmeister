<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'autoload.php';

session_start();

$config = new \App\Service\Config();

$templating = new \App\Service\Templating();
$router = new \App\Service\Router();

$userId = $_SESSION['uid'] ?? null;
if ($userId) {
    $user = \App\Model\Admin::findById($userId);
} else {
    $user = null;
}

$action = $_REQUEST['action'] ?? null;
switch ($action) {
    case 'course-index':
    case null:
        $controller = new \App\Controller\CourseController();
        $view = $controller->indexAction($templating, $router);
        break;
    case 'admin-login':
        $controller = new \App\Controller\AdminController();
        $view = $controller->loginAction($templating, $router);
        break;
    case 'admin-verify':
        $controller = new \App\Controller\AdminController();
        $controller->verifyAction($_REQUEST['username'] ?? null,$_REQUEST['password'] ?? null, $router);
        break;
    case 'admin-logout':
        $controller = new \App\Controller\AdminController();
        $view = $controller->logoutAction($templating, $router);
        break;
    case 'admin-index':
        $controller = new \App\Controller\AdminController();
        $view = $controller->indexAction($templating, $router);
        break;
    case 'admin-create':
        $controller = new \App\Controller\AdminController();
        $view = $controller->adminCreate($templating, $router);
        break;
    case 'admin-create-action':
        $controller = new \App\Controller\AdminController();
        $controller->adminCreateAction($_REQUEST['username'] ?? null,$_REQUEST['password'] ?? null, $router);
        break;
    case 'admin-edit':
        if (!$_REQUEST['id']) {
            break;
        }
        $controller = new \App\Controller\PostController();
        $view = $controller->editAction($_REQUEST['id'], $_REQUEST['post'] ?? null, $templating, $router);
        break;
    case 'admin-show':
        if (!$_REQUEST['id']) {
            break;
        }
        $controller = new \App\Controller\PostController();
        $view = $controller->showAction($_REQUEST['id'], $templating, $router);
        break;
    case 'admin-delete':
        if (!$_REQUEST['id']) {
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
if ($user) {
    echo "<pre>" . $user->getAdminId() . "</pre>";
}