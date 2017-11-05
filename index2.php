<!-- <script>console.log('index2.php')</script> -->
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
include_once 'path.php';
//including the common file
include_once COMMON.'/class.common.php';
include_once COMMON.'/class.common.user.php';

//current template path
$template_link= TEMPLATE.'/basic/';



ob_start(); //converts php output to a buffer and later publish it

// start session always
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

define('DR',$dr = $_SERVER['DOCUMENT_ROOT'].'/medical/');
$_URI = $_SERVER['REQUEST_URI'];
// echo $_URI;
//finding the page
$page = unparse_url(parse_url($_URI));
// echo $page;
//echo "Page = ".$page;
if(isset($page)){
    //TODO: check whether middleware application is active
    //apply middleware
    $page = apply_middleware($page);
}

//if does not match with the stored one then this is a new page
if(isset($_SESSION['globalPage'])&&strcasecmp($_SESSION['globalPage'],$page)!=0){
    $_SESSION['previousPage']=$_SESSION['globalPage'];
}

//store current page in the session
 $_SESSION['globalPage']=$page;

// adding menu code here
include_once $template_link.'menu.php';
// echo $template_link.'menu.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Page</title>
        <link rel="stylesheet" href="resources/css/bootstrap.css">
        <link rel="stylesheet" href="resources/css/style.css" type="text/css" />
        <link rel="stylesheet" href="resources/css/jquery-ui.css" type="text/css" />
        <script src="resources/js/jquery.min.js"></script>
        <script src="resources/js/bootstrap.min.js"></script>
        <script src="resources/js/jquery-3.2.1.min.js"></script>
        <script src="resources/js/jquery-1.12.4.js"></script>
        <script src="resources/js/jquery-ui.js"></script>
        <script src="resources/js/myscript.js"></script>
        <script src="resources/js/question_js_2.js" rel="script"></script>
        
    </head>

<body>

<div class="container-fluid" >
        <div id="menu" style="background-color:LightSteelBlue">
            <?php
                //do not show the menu for login page
                if(strcasecmp($page, PageUtil::$LOGIN)!=0 && strcasecmp($page, PageUtil::$USER_NEW)!=0
                    && strcasecmp($page, PageUtil::$USER_FORGOT_PASSWORD)!=0)
                    echo print_top_menu($globalMenu,$logoutMenu);


            ?>
        </div>
        <div id="header">
            <?php

                //do not show the header for login page
                if(strcasecmp($page, PageUtil::$LOGIN)!=0 && strcasecmp($page, PageUtil::$USER_NEW)!=0
                    && strcasecmp($page, PageUtil::$USER_FORGOT_PASSWORD)!=0)
                    include $template_link.'header.php';

            ?>
        </div>

        <div id="body" style="background-color:AliceBlue">
            <?php
                include $template_link.'body.php';

            ?>
        </div>

        <div id="footer" style="background-color:LightSteelBlue">

        	<?php
        		include $template_link.'footer.php';

        	?>
        </div>
</div>
<script src="resources/js/kabjhab.js"></script>
</body>
</html>