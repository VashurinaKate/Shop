<?php
spl_autoload_register(function($name){
    // $dirs = ['controller'];
    // $file = $name.".class.php";
    // $check = false;
    // foreach() {
    //     if(is_file($file)) {
            include_once("controller/$name.class.php");
    //     }
    // }
});

$action = 'action_';
$action .=(isset($_GET['action'])) ? $_GET['action'] : 'index';

switch ($_GET['controller'])
{
	case 'page':
		$controller = new Page();
        break;
    case 'goods':
        $controller = new Catalog();
        break;
	case 'user':
		$controller = new User();
		break;
	default:
		$controller = new Page();
}

$controller->Request($action);

