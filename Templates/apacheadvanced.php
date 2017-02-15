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
            <input type="submit" value="Tryb podstawowy">


        </form>
        
        <form action="index.php" method="post">

            <div class="form_block">
                <div class="tooltip">Parametr Timeout:
                    <span class="tooltiptext">Ilość sekund po której serwer odpowie timeoutem. Sugerowane wartości pomiędzy 30 a 600.</span>
                </div>               
                <input name="Timeout" value="300">
            </div>    

            <div class="form_block">
                <div class="tooltip">Parametr KeepAlive:
                    <span class="tooltiptext">Parametr określa czy możliwe jest nawiazywanie "stałych" połączeń. Możliwe wartości: On i Off. Uwaga na wielkość liter!</span>
                </div>              
                <input name="KeepAlive" value="On">
            </div>

            <div class="form_block">
                <div class="tooltip">Parametr MaxKeepAliveRequest:
                    <span class="tooltiptext">Maksymalna ilość zapytań podczas "trwałego" połączenia. Ze względu na wydajność warto ustawić dużą wartość. Wartość 0 oznacza brak limitu.</span>
                </div>              
                <input name="MaxKeepAliveRequest" value="100">
            </div>

            <div class="form_block">
                <div class="tooltip">Parametr KeepAliveTimeout:
                    <span class="tooltiptext">Parametr określa ilość czasu (w sekundach) oczekiwania na kolejne zapytanie od tego samego klienta, przed zamknięciem połączenia.</span>
                </div>              
                <input name="KeepAliveTimeout" value="5">
            </div>

            <div class="form_block">
                <div class="tooltip">Użytkownik:
                    <span class="tooltiptext">Użytkownik Apache</span>
                </div>              
                <input name="User" value="www-data">
            </div>

            <div class="form_block">
                <div class="tooltip">Grupa:
                    <span class="tooltiptext">Grupa Apache</span>
                </div>              
                <input name="Group" value="www-data">
            </div> 


            <div class="form_block">
                <div class="tooltip">Parametr HostnameLookups:
                    <span class="tooltiptext">Określa czy logowane są adresy IP klientów (opcja Off) czy ich nazwy Hostów (opcja On). Ze względu na wydajność warto stosować opcję Off.</span>
                </div>              
                <input name="HostnameLookups" value="Off">
            </div>    


            <div class="form_block">
                <div class="tooltip">ErrorLog:
                    <span class="tooltiptext">Ścieżka do pliku, w którym będą zapisywane logi błędów serwera.</span>
                </div>              
                <input name="ErrorLog" value="/var/lib/apache2/error.log">
            </div>    

            <div class="form_block">
                <div class="tooltip">Parametr LogLevel:
                    <span class="tooltiptext">Parametr określa minimalny poziom zdarzeń, ktore są zapisywane w logach. Możliwe opcje to: traceX (X to liczba całkowita od 1 do 8), debug, info, notice, warn,error, crit, alert, emerg.</span>
                </div>              
                <input name="LogLevel" value="warn">          
            </div> 

            <div class="form_block">
                <div class="tooltip">Parametr Listen:
                    <span class="tooltiptext">Określa na jakim porcie nasłuchuje Apache.</span>
                </div>              
                <input name="Listen" value="80">
            </div>  
            <div class="form_block">

                
                <?php
                    echo "<br>Moduły apache: <br>";
                    $allModules;
                    exec("ls /etc/apache2/mods-available | grep .conf", $avalibleModules);
                    foreach ($avalibleModules as $mod) {
                        $allModules[substr($mod, 0, strpos($mod, '.'))] = 0;
                    }

                    exec("ls /etc/apache2/mods-enabled | grep .conf", $enabledModules);

                    foreach ($enabledModules as $mod) {
                        $allModules[substr($mod, 0, strpos($mod, '.'))] = 1;
                    }

                    foreach ($allModules as $key => $value) {
                        if($value == 0){

                        echo '<div class="form_block">';
                            echo '<div class="tooltip">';
                                echo '<span class="tooltiptext">?</span>';
                            echo '</div>';              

                            echo   '<br> '.$key.' <input type="checkbox" name="'.$key.'">';
                        echo '</div>';    
                        } elseif ($value == 1) {
                            echo '<div class="form_block">';
                                echo '<div class="tooltip">';
                                    echo '<span class="tooltiptext">?</span>';
                                echo '</div>';              

                                echo   '<br> '.$key.' <input type="checkbox" name="'.$key.'" checked>';
                            echo '</div>'; 
                        }
                    }


                    //print_r($allModules);
                ?>
            </div>
            <input type="submit" value="Zainstaluj Apache2">
            <input name="service" value="apache" type="hidden">
            <input name="mode" value="advanced" type="hidden">
            <input name="action" value="install" type="hidden">

        </form>
        <form action="index.php" method="post">
            <input type="submit" value="Odinstaluj Apache2">
            <input name="service" value="apache" type="hidden">
            <input name="action" value="uninstall" type="hidden">

        </form>
        
    </body>
</html>
