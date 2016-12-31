<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <div id="header">
        <a id="logout_button" href="logout.php">Wyloguj</a>
    </div>
    <div id="page_content">
        <div id="leftmenu">
            <h3>Dostępne usługi</h3>
            <a href="?service=apache">Apache2</a>
            <a href="?service=mysql">MySQL</a>
            <a href="?service=X">X</a>

        </div>
        <div id="content_box">
            <body>
                <?php
                    include 'Templates/'.$_REQUEST['service'].$_REQUEST['mode'].'.php';
                    if($_REQUEST['action'] == "install"){
                        mysqlInstall($_REQUEST);
                    }
                ?>
<!--                <form action="index.php" method="get">
                    <input type="submit" name="service" value="apache">
                    <input type="submit" name="service" value="mysql">
                    <input type="submit" name="service" value="php">
                                <br>
                    <input type="submit" name="service" value="apache_uninstall">
                    <input type="submit" name="service" value="mysql_uninstall">
                    <input type="submit" name="service" value="php_uninstall">
                </form>-->
            </body>
        </div>
    </div>

</html>
<?php
require_once("session.php");
if(!checkSession()){
    header("Location: /login.php");
    die();
}
function mysqlInstall($request){
    print_r($_REQUEST);
    //system("sudo ./scripts/mysql.sh datadir port max_connections query_cache_limit query_cache_size bind-address max_allowed_packet key_buffer_size thread_stack thread_cache_size log_error");
    system("sudo ./scripts/mysql.sh ". $_REQUEST['datadir'] . " " . $_REQUEST['port'] 
            . " " . $_REQUEST['max_connections'] . " " . $_REQUEST['query_cache_limit'] . " " . 
            $_REQUEST['query_cache_size'] . " " . $_REQUEST['bind-address']. " " . 
            $_REQUEST['max_allowed_packet'] . " " . 
            $_REQUEST['key_buffer_size'] . " " . $_REQUEST['thread_stack'] . " " . 
            $_REQUEST['thread_cache_size'] . " " . $_REQUEST['log_error']);
    
}
//
//if(isset($_GET['service'])) {
//    echo "Installing ".$_GET['service'];
//            $output = system("sudo ./scripts/".$_GET['service'].".sh");
//            $output = shell_exec("pwd");
//            print_r("<br>".$output);
//}

?>
