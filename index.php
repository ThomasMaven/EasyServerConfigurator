<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <div id="header">
    </div>
    <div id="page_content">
        <div id="leftmenu">            
dsafasdffasd
        </div>
        <div id="content_box">
            <body>
                <form action="index.php" method="get">
                    <input type="submit" name="service" value="apache">
                    <input type="submit" name="service" value="mysql">
                    <input type="submit" name="service" value="php">
                                <br>
                    <input type="submit" name="service" value="apache_uninstall">
                    <input type="submit" name="service" value="mysql_uninstall">
                    <input type="submit" name="service" value="php_uninstall">
                </form>
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

if(isset($_GET['service'])) {
    echo "Installing ".$_GET['service'];
            $output = system("sudo ./scripts/".$_GET['service'].".sh");
            //$output = shell_exec("pwd");
            print_r("<br>".$output);
}

?>
