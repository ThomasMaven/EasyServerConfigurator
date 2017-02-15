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
    <h2>Konfiguracja ISC DHCP - tryb zaawansowany</h2>
    <form action="index.php" method="get">
        <input name="service" value="dhcp" type="hidden">
        <input type="submit" value="Tryb podstawowy">


    </form>
    

    <form action="index.php" method="post">
        
        <input name="service" value="dhcp" type="hidden">
        <input name="action" value="install" type="hidden">
        <div class="form_block">
            <div class="tooltip">Domyślny czas dzierżawy:
                <span class="tooltiptext">Domyślny czas dzierżawy nadanego adresu IP w sekundach.</span>
            </div>
            <input name="default-lease-time" value="3600">
        </div>
        
        <div class="form_block">
            <div class="tooltip">Maksymalny czas dierżawy
                <span class="tooltiptext">Maksymalny czas dzierżawy nadanego adresu IP w sekundach.</span>                
            </div>
            <input name="max-lease-time" value="86400">
        </div>    
        
        <div class="form_block">
            <div class="tooltip">Adres podsieci:
                <span class="tooltiptext">Adres podsieci, z której nadawane będą adresy.</span>  
            </div>
            <input name="subnet" value="192.168.1.0">
        </div>
        <div class="form_block">
            <div class="tooltip">Maska:
                <span class="tooltiptext">Maska podsieci, którą będą otrzymywały urządzenia.</span>     
            </div>
            <input name="netmask" value="255.255.255.0">
        </div>
        
        <div class="form_block">
            <div class="tooltip">Początek zakresu:
                <span class="tooltiptext">Początek zakresu przydzielanych adresów czyli pierwszy z przydzielanych przez DHCP adresów IP.</span> 
            </div>
            <input name="range_from" value="192.168.1.10">
        </div>

        <div class="form_block">
            <div class="tooltip">Koniec zakresu:
                <span class="tooltiptext">Koniec zakresu przydzielanych adresów czyli ostatni z przydzielanych przez DHCP adresów IP.</span>       
            </div>
            <input name="range_to" value="192.168.1.100">
        </div>
        
        <div class="form_block">
            <div class="tooltip">Adres bramy:
                <span class="tooltiptext">Adres IP bramy sieciowej.</span>    
            </div>
            <input name="routers" value="192.168.1.1">
        </div>

        <div class="form_block">
            <div class="tooltip">Adresy DHCP:
                <span class="tooltiptext">Adresy IP serwerów DHCP. W przypadku więcej niż jednego serwera, poszczególne adresy należy rozdzielić przecinkami.</span>                
            </div>
            <input name="domain-name-servers" value="8.8.8.8, 8.8.4.4">
        </div>

        <div class="form_block">
            <div class="tooltip">Domena:
                <span class="tooltiptext">Adres domeny.</span>                
            </div>
            <input name="domain-name" value="tomaka.eu">
        </div>


        <input type="submit" value="Zainstaluj dhcp">

    </form>
    
    <form action="index.php" method="post">
        <input type="submit" value="Odinstaluj dhcp">
        <input name="service" value="dhcp" type="hidden">
        <input name="action" value="uninstall" type="hidden">

    </form>
    
</body>
</html>
