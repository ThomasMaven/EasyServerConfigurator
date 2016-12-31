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
                <div class="form_block">
                    <div class="tooltip">Miesce przechowywania danych:
                        <span class="tooltiptext">Nalezy podać bezwzględną sciężkę do folederu na dysku, w którym będą przechowywane dane zapisane w bazie danych.</span>
                    </div>
                    <input type="submit" name="service" value="apache">
                </div>

                <div class="form_block">
                    <div class="tooltip">Miesce przechowywania danych:
                        <span class="tooltiptext">Nalezy podać bezwzględną sciężkę do folederu na dysku, w którym będą przechowywane dane zapisane w bazie danych.</span>
                    </div>            
                    <input type="submit" name="service" value="apache_uninstall">
                </div>
            
                <div class="form_block">
                    <div class="tooltip">Miesce przechowywania danych:
                        <span class="tooltiptext">Nalezy podać bezwzględną sciężkę do folederu na dysku, w którym będą przechowywane dane zapisane w bazie danych.</span>
                    </div>               
                    <input name="timeout" value="300">
                </div>    
            
                <div class="form_block">
                    <div class="tooltip">Miesce przechowywania danych:
                        <span class="tooltiptext">Nalezy podać bezwzględną sciężkę do folederu na dysku, w którym będą przechowywane dane zapisane w bazie danych.</span>
                    </div>              
                    <input name="KeepAlive" value="on">
                </div>
         
                <div class="form_block">
                    <div class="tooltip">Miesce przechowywania danych:
                        <span class="tooltiptext">Nalezy podać bezwzględną sciężkę do folederu na dysku, w którym będą przechowywane dane zapisane w bazie danych.</span>
                    </div>              
                    <input name="MaxKeepAliveRequest" value="100">
                </div>
            
                <div class="form_block">
                    <div class="tooltip">Miesce przechowywania danych:
                        <span class="tooltiptext">Nalezy podać bezwzględną sciężkę do folederu na dysku, w którym będą przechowywane dane zapisane w bazie danych.</span>
                    </div>              
                    <input name="KeepAliveTimeout" value="5">
                </div>
            
                <div class="form_block">
                    <div class="tooltip">Miesce przechowywania danych:
                        <span class="tooltiptext">Nalezy podać bezwzględną sciężkę do folederu na dysku, w którym będą przechowywane dane zapisane w bazie danych.</span>
                    </div>              
                    <input name="User" value="???">
                </div>
            
                <div class="form_block">
                    <div class="tooltip">Miesce przechowywania danych:
                        <span class="tooltiptext">Nalezy podać bezwzględną sciężkę do folederu na dysku, w którym będą przechowywane dane zapisane w bazie danych.</span>
                    </div>              
                    <input name="Group" value="???">
                </div> 
            
            
                <div class="form_block">
                    <div class="tooltip">Miesce przechowywania danych:
                        <span class="tooltiptext">Nalezy podać bezwzględną sciężkę do folederu na dysku, w którym będą przechowywane dane zapisane w bazie danych.</span>
                    </div>              
                    <input name="HostnameLookups" value="Off">
                </div>    
            
            
                <div class="form_block">
                    <div class="tooltip">Miesce przechowywania danych:
                        <span class="tooltiptext">Nalezy podać bezwzględną sciężkę do folederu na dysku, w którym będą przechowywane dane zapisane w bazie danych.</span>
                    </div>              
                    <input name="ErrorLog" value="/var/lib/apache2/error.log">
                </div>    
            
                <div class="form_block">
                    <div class="tooltip">Miesce przechowywania danych:
                        <span class="tooltiptext">Nalezy podać bezwzględną sciężkę do folederu na dysku, w którym będą przechowywane dane zapisane w bazie danych.</span>
                    </div>              
                    <input name="LogLevel" value="warn">          
                </div> 
            
                <div class="form_block">
                    <div class="tooltip">Miesce przechowywania danych:
                        <span class="tooltiptext">Nalezy podać bezwzględną sciężkę do folederu na dysku, w którym będą przechowywane dane zapisane w bazie danych.</span>
                    </div>              
                    <input name="Listen" value="80">
                </div>    
            <?php
                $allModules;
                exec("ls /etc/apache2/mods-available | grep .conf", $avalibleModules);
                foreach ($avalibleModules as $mod) {
                    $allModules[$mod] = 0;
                }
                
                exec("ls /etc/apache2/mods-available | grep .conf", $enabledModules);

                foreach ($enabledModules as $mod) {
                    $allModules[$mod] = 1;
                }
                
                foreach ($allModules as $key => $value) {
                    if($value == 0){
                        echo   $key.' <input type="checkbox" name="vehicle" value="Car">';
                    } elseif ($value == 1) {
                        echo  $key.' <input type="checkbox" name="vehicle" value="Car" checked> I have a car<br>';

                    }
                }
                
                
                print_r($allModules);
            ?>
        </form>
    </body>
</html>
