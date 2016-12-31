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
        <h2>Konfiguracja MySQL - tryb podstawowy</h2>
        <form action="index.php" method="get">
            <input name="service" value="mysql" type="hidden">
            <input name="mode" value="advanced" type="hidden">
            <input type="submit" value="Tryb zaawansowany">


        </form>
        
        <form action="index.php" method="post">
            <input type="submit" value="Zainstaluj mysql">
            <input name="service" value="mysql" type="hidden">
            <input name="action" value="install" type="hidden">

            <input name="datadir" value="/var/lib/mysql" type="hidden">
            <input name="port" value="3306" type="hidden">
            <input name="max_connections" value="150" type="hidden">
            <input name="query_cache_limit" value="4M" type="hidden">
            <input name="query_cache_size" value="128M" type="hidden">
            <input name="bind-address" value="0.0.0.0" type="hidden">
            <input name="max_allowed_packet" value="64M" type="hidden">
            <input name="key_buffer_size" value="128M" type="hidden">
            <input name="thread_stack" value="512K" type="hidden">
            <input name="thread_cache_size" value="8" type="hidden">
            <input name="log_error" value="/var/log/mysql/error.log" type="hidden">

        </form>
        
        <form action="index.php" method="post">
            <input type="submit" value="Odinstaluj mysql">
            <input name="service" value="mysql" type="hidden">
            <input name="action" value="uninstall" type="hidden">

        </form>

    </body>
</html>
