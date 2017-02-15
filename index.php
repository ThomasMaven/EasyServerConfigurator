<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <div id="header">
        <a id="logout_button" href="logout.php">Wyloguj</a>
        <a id="passwd_button" href="index.php?service=password">Zmień hasło</a>
        
    </div>
    <div id="page_content">
        <div id="leftmenu">
            <h3>Dostępne usługi</h3>
            <a href="?service=apache">Apache2</a>
            <a href="?service=mysql">MySQL</a>
            <a href="?service=postgres">PostgreSQL</a>
            <a href="?service=vsftpd">Very Secure FTP Server</a>
            <a href="?service=dhcp">ISC DHCP server</a>

        </div>
        <div id="content_box">
            <body>
                <?php
                if( isset($_REQUEST['service']) ) {
                    include 'Templates/' . $_REQUEST['service'] . $_REQUEST['mode'] . '.php';
                    if ($_REQUEST['action'] == "install") {
                        if ($_REQUEST['service'] == "mysql")
                            mysqlInstall();
                        else if ($_REQUEST['service'] == "apache")
                            apacheInstall();
                        else if ($_REQUEST['service'] == "vsftpd")
                            vsftpdInstall();
                        else if ($_REQUEST['service'] == "postgres")
                            postgresInstall();
                        else if ($_REQUEST['service'] == "dhcp")
                            dhcpInstall();
                    } else if ($_REQUEST['action'] == "uninstall") {
                        if ($_REQUEST['service'] == "mysql")
                            mysqlUninstall();
                        else if ($_REQUEST['service'] == "apache")
                            apacheUninstall();
                        else if ($_REQUEST['service'] == "vsftpd")
                            vsftpdUninstall();
                        else if ($_REQUEST['service'] == "postgres")
                            postgresUninstall();
                        else if ($_REQUEST['service'] == "dhcp")
                            dhcpUninstall();
                    } 
                }
                ?>

            </body>
        </div>
    </div>

</html>
<?php
require_once("session.php");
if (!checkSession()) {
    header("Location: /login.php");
    die();
}

function mysqlInstall() {
    //system("sudo ./scripts/mysql.sh datadir port max_connections query_cache_limit query_cache_size bind-address max_allowed_packet key_buffer_size thread_stack thread_cache_size log_error");
    system("sudo ./scripts/mysql.sh " . $_REQUEST['datadir'] . " " . $_REQUEST['port']
            . " " . $_REQUEST['max_connections'] . " " . $_REQUEST['query_cache_limit'] . " " .
            $_REQUEST['query_cache_size'] . " " . $_REQUEST['bind-address'] . " " .
            $_REQUEST['max_allowed_packet'] . " " .
            $_REQUEST['key_buffer_size'] . " " . $_REQUEST['thread_stack'] . " " .
            $_REQUEST['thread_cache_size'] . " " . $_REQUEST['log_error']);
}
function vsftpdInstall() {
    //system("sudo ./scripts/mysql.sh listen listen_ipv6 anonymous_enable write_enable local_umask anon_upload_enable anon_mkdir_write_enable dirmessage_enable use_localtime xferlog_enable");
    system("sudo ./scripts/vsftpd.sh ".$_REQUEST['listen']." ".$_REQUEST['listen_ipv6']." ".$_REQUEST['anonymous_enable']." ".$_REQUEST['write_enable']." ".$_REQUEST['local_umask']." ".$_REQUEST['anon_upload_enable']." ".$_REQUEST['anon_mkdir_write_enable']." ".$_REQUEST['dirmessage_enable']." ".$_REQUEST['use_localtime']." ".$_REQUEST['xferlog_enable']);
}

function mysqlUninstall() {

    print_r("mysql uninstall");
    system("sudo ./scripts/mysql_uninstall.sh");
}

function apacheInstall() {
    print_r($_REQUEST);
    //TODO: Check listen param
    //system("sudo ./scripts/apache.sh Timeout KeepAlive MaxKeepAliveRequest KeepAliveTimeout User Group HostnameLookups ErrorLog LogLevel Listen");
    system("sudo ./scripts/apache.sh " . $_REQUEST['Timeout'] . " " . $_REQUEST['KeepAlive']
            . " " . $_REQUEST['MaxKeepAliveRequest'] . " " . $_REQUEST['KeepAliveTimeout'] . " " .
            $_REQUEST['User'] . " " . $_REQUEST['Group'] . " " .
            $_REQUEST['HostnameLookups'] . " " .
            $_REQUEST['ErrorLog'] . " " . $_REQUEST['LogLevel'] . " " .
            $_REQUEST['Listen']);

    //make sure some mpm module is set
    if (isset($_REQUEST['mpm_prefork']) ^ isset($_REQUEST['mpm_worker']) ^ isset($_REQUEST['mpm_event']) && !(isset($_REQUEST['mpm_prefork']) && isset($_REQUEST['mpm_worker']) && isset($_REQUEST['mpm_event']))) {
        if ($_REQUEST['mode'] == "advanced") {
            //manage modules         
            echo "<br>Moduły apache: <br>";
            //disable mpm modules first
            system("a2dismod -f mpm_event");
            system("a2dismod -f mpm_prefork");
            system("a2dismod -f mpm_worker");
            $allModules;
            exec("ls /etc/apache2/mods-available | grep .conf", $avalibleModules);
            foreach ($avalibleModules as $mod) {
                $allModules[$mod] = 0;
            }

            exec("ls /etc/apache2/mods-enabled | grep .conf", $enabledModules);

            foreach ($enabledModules as $mod) {
                $allModules[$mod] = 1;
            }

            foreach ($allModules as $key => $value) {
                $key = substr($key, 0, strpos($key, '.'));
                if (isset($_REQUEST[$key])) {
                    print_r("a2enmod -f " . $key);
                    echo "<br>";
                    //if changed prefork mode restart apache
                    if (substr( $key, 0, 4 ) === "mpm_"){
                        //and than enable
                        system("a2enmod -f " . $key);
                        system("service apache2 restart");
                    } else system("a2enmod -f " . $key);

                } else {
                    print_r("a2dismod -f " . $key);
                    echo "<br>";
                    system("a2dismod -f " . $key);
                    //if changed prefork mode restart apache
                    if (substr( $key, 0, 4 ) === "mpm_"){
                        system("service apache2 restart");
                    }
                }
            }
            //restart apache
            system("service apache2 restart");
        }
    } else {
        echo "INFO: Pominięto konfiguracje modułów, ponieważ musi być wybrany dokładnie jeden moduł mpm_*";
    }
}

function apacheUninstall() {

    print_r("apache uninstall");
    system("sudo ./scripts/apache_uninstall.sh");
}

function vsftpdUninstall() {

    print_r("vsftpd uninstall");
    system("sudo ./scripts/vsftpd_uninstall.sh");
}

function postgresInstall() {
    //system("sudo ./scripts/postgres.sh port max_connections ssl shared_buffers temp_buffers work_mem maintenance_work_mem dynamic_shared_memory_type max_files_per_process max_worker_processes");
    system("sudo ./scripts/postgres.sh ".$_REQUEST['port']." ".$_REQUEST['max_connections']." ".$_REQUEST['ssl']." ".$_REQUEST['shared_buffers']." ".$_REQUEST['temp_buffers']." ".$_REQUEST['work_mem']." ".$_REQUEST['maintenance_work_mem']." ".$_REQUEST['dynamic_shared_memory_type']." ".$_REQUEST['max_files_per_process']." ".$_REQUEST['max_worker_processes']);
}

function dhcpInstall() {
    //system("sudo ./scripts/dhcp.sh default-lease-time subnet range_from range_to routers domain-name-servers domain-name");
    system("sudo ./scripts/dhcp.sh ".$_REQUEST['default-lease-time']." ".$_REQUEST['max-lease-time']." ".$_REQUEST['subnet']." ".$_REQUEST['netmask']." ".$_REQUEST['range_from']." ".$_REQUEST['range_to']." ".$_REQUEST['routers']." ".$_REQUEST['domain-name-servers']." ".$_REQUEST['domain-name']);
}

function dhcpUninstall() {

    print_r("dhcp uninstall");
    system("sudo ./scripts/dhcp_uninstall.sh");
}

function postgresUninstall() {

    print_r("Postges uninstall");
    system("sudo ./scripts/postgres_uninstall.sh");
}

?>
