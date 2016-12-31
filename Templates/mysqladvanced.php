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
    <h2>Konfiguracja MySQL - tryb zaawansowany</h2>
    <form action="index.php" method="get">
        <input name="service" value="mysql" type="hidden">
        <input type="submit" value="Tryb podstawowy">


    </form>
    
    <form action="index.php" method="get">
        <input type="submit" name="service" value="mysql_uninstall">



    </form>

    <form action="index.php" method="post">
        
        <input name="service" value="mysql" type="hidden">
        <input name="action" value="install" type="hidden">
        <div class="form_block">
            <div class="tooltip">Miesce przechowywania danych:
                <span class="tooltiptext">Nalezy podać bezwzględną sciężkę do folederu na dysku, w którym będą przechowywane dane zapisane w bazie danych.</span>
            </div>
            <input name="datadir" value="/var/lib/mysql" >
        </div>
        
        <div class="form_block">
            <div class="tooltip">Miesce zapisywania logów błędów
                <span class="tooltiptext">Nalezy podać bezwzględną sciężkę do pliki na dysku, w którym będą zapisywane błędy serwera MySQL.</span>                
            </div>
            <input name="log_error" value="/var/log/mysql/error.log" >
        </div>    
        
        <div class="form_block">
            <div class="tooltip">Port:
                <span class="tooltiptext">Nalezy określić na jakim porcie serwer mysql będzie nasłuchiwał połączeń. Standardowy port to 3306</span>  
            </div>
            <input name="port" value="3306" >
        </div>
        <div class="form_block">
            <div class="tooltip">Parametr bind-address:
                <span class="tooltiptext">Adres IP, z którego będzie możliwe połączenie do bazy danych. Wartość 0.0.0.0 oznacza możliwość połączenia z dowlnego adresu IP.</span>     
            </div>
            <input name="bind-address" value="0.0.0.0" >
        </div>
        
        <div class="form_block">
            <div class="tooltip">Parametr max_connections:
                <span class="tooltiptext">Maksymalna ilość jednoczesnych połączeń do bazy danych. Zalecane wartości od 10 do 1000</span> 
            </div>
            <input name="max_connections" value="150" >
        </div>

        <div class="form_block">
            <div class="tooltip">Parametr query_cache_size:
                <span class="tooltiptext">Maksymalna ilość danych przechowywanych w cache. Zalecane wartości od 50M do 200M</span>       
            </div>
            <input name="query_cache_size" value="128M" >
        </div>
        
        <div class="form_block">
            <div class="tooltip">Parametr query_cache_limit:
                <span class="tooltiptext">Maksymalny rozmiar pojednyczego rezultatu zapisanego w cache. Zelecane wartości od 128K do 8M</span>    
            </div>
            <input name="query_cache_limit" value="4M" >
        </div>

        <div class="form_block">
            <div class="tooltip">Parametr max_allowed_packet:
                <span class="tooltiptext">Parametr określa maksymalny rozmiar jednego pakietu. Jeżeli baza przetwarza duże zapytania (np. duże bloby), nażey odpowiednio zwiększyć wartość parametru. Zalecane wartości od 8M do 512M</span>                
            </div>
            <input name="max_allowed_packet" value="64M" >
        </div>

        <div class="form_block">
            <div class="tooltip">Parametr key_buffer_size:
                <span class="tooltiptext">Parametr określa ilość pamięci cache przeznaczonej na przechowywanie indeksów w pamięci. Zaleca wartość to ok. 10-25% pamięci RAM.</span>                
            </div>
            <input name="key_buffer_size" value="64M" >
        </div>

        <div class="form_block">
            <div class="tooltip">Parametr thread_stack:
                <span class="tooltiptext">Wielkość stostu dla każdego z wątków. Zalecane warości od 192K (dla systemów 32 bitowych) do 256K (dla systemów 64 bitowych).</span>                
            </div>
            <input name="thread_stack" value="256K" >
        </div>

        <div class="form_block">
            <div class="tooltip">Parametr thread_cahce_size:
                <span class="tooltiptext">Ilość wątków, które serwer zachowuje w pamięci cache do ponownego użycia. Zalecane wartości od 0 do 32.</span>                
            </div>
            <input name="thread_cache_size" value="4" >
        </div>

        <input type="submit" value="Zainstaluj mysql">



    </form>
</body>
</html>
