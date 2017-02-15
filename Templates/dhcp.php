<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <h2>Konfiguracja ISC DHCP - tryb podstawowy</h2>
        <form action="index.php" method="get">
            <input name="service" value="dhcp" type="hidden">
            <input name="mode" value="advanced" type="hidden">
            <input type="submit" value="Tryb zaawansowany">


        </form>
        
        <form action="index.php" method="post">
            <input type="submit" value="Zainstaluj ISC DHCP">
            <input name="service" value="dhcp" type="hidden">
            <input name="action" value="install" type="hidden">

            <input name="default-lease-time" value="3600" type="hidden">
            <input name="max-lease-time" value="86400" type="hidden">
            <input name="subnet" value="192.168.1.0" type="hidden">
            <input name="netmask" value="255.255.255.0" type="hidden">
            <input name="range_from" value="192.168.1.10" type="hidden">
            <input name="range_to" value="192.168.1.100" type="hidden">
            <input name="routers" value="192.168.1.1" type="hidden">
            <input name="domain-name-servers" value="8.8.8.8, 8.8.4.4" type="hidden">
            <input name="domain-name" value="tomaka.eu" type="hidden">

        </form>
        
        <form action="index.php" method="post">
            <input type="submit" value="Odinstaluj ISC DHCP">
            <input name="service" value="dhcp" type="hidden">
            <input name="action" value="uninstall" type="hidden">

        </form>

    </body>
</html>
