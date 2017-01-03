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
        <h2>Konfiguracja Apache - tryb podstawowy</h2>
        <form action="index.php" method="get">
            <input name="service" value="apache" type="hidden">
            <input name="mode" value="advanced" type="hidden">
            <input type="submit" value="Tryb zaawansowany">


        </form>
        
        <form action="index.php" method="post">
            <input type="submit" value="Zainstaluj Apache2">
            <input name="service" value="apache" type="hidden">
            <input name="action" value="install" type="hidden">
            
           
            <input name="Timeout" value="300" type="hidden">
            <input name="KeepAlive" value="On" type="hidden">
            <input name="MaxKeepAliveRequest" value="100" type="hidden">
            <input name="KeepAliveTimeout" value="5" type="hidden">
            <input name="User" value="www-data" type="hidden">
            <input name="Group" value="www-data" type="hidden">
            <input name="HostnameLookups" value="Off" type="hidden">
            <input name="ErrorLog" value="/var/lib/apache2/error.log" type="hidden">
            <input name="LogLevel" value="warn" type="hidden">            
            <input name="Listen" value="80" type="hidden">

        </form>
        <form action="index.php" method="post">
            <input type="submit" value="Odinstaluj Apache2">
            <input name="service" value="apache" type="hidden">
            <input name="action" value="uninstall" type="hidden">

        </form>
    </body>
</html>
