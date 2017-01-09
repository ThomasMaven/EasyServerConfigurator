<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <h2>Konfiguracja Very Secure FTP server - tryb podstawowy</h2>
        <form action="index.php" method="get">
            <input name="service" value="vsftpd" type="hidden">
            <input name="mode" value="advanced" type="hidden">
            <input type="submit" value="Tryb zaawansowany">


        </form>
        
        <form action="index.php" method="post">
            <input type="submit" value="Zainstaluj vpftpd">
            <input name="service" value="vsftpd" type="hidden">
            <input name="action" value="install" type="hidden">

            <input name="listen" value="NO" type="hidden">
            <input name="listen_ipv6" value="YES" type="hidden">
            <input name="anonymous_enable" value="NO" type="hidden">
            <input name="write_enable" value="YES" type="hidden">
            <input name="local_umask" value="077" type="hidden">
            <input name="anon_upload_enable" value="NO" type="hidden">
            <input name="anon_mkdir_write_enable" value="NO" type="hidden">
            <input name="dirmessage_enable" value="YES" type="hidden">
            <input name="use_localtime" value="YES" type="hidden">
            <input name="xferlog_enable" value="YES" type="hidden">

        </form>
        
        <form action="index.php" method="post">
            <input type="submit" value="Odinstaluj vsftpd">
            <input name="service" value="vsftpd" type="hidden">
            <input name="action" value="uninstall" type="hidden">

        </form>

    </body>
</html>
