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
    <h2>Konfiguracja PostrgreSQL - tryb zaawansowany</h2>
    <form action="index.php" method="get">
        <input name="service" value="postgres" type="hidden">
        <input type="submit" value="Tryb podstawowy">


    </form>
    

    <form action="index.php" method="post">
        
        <input name="service" value="postgres" type="hidden">
        <input name="action" value="install" type="hidden">

        <div class="form_block">
            <div class="tooltip">Port:
                <span class="tooltiptext">Należy określić na jakim porcie serwer PostgreSQL będzie nasłuchiwał połączeń. Standardowy port to 5432.</span>  
            </div>
            <input name="port" value="5432">
        </div>
        <div class="form_block">
            <div class="tooltip">Parametr max_connections:
                <span class="tooltiptext">Maksymalna ilość jednoczesnych połączeń do bazy danych. Zalecane wartości od 10 do 1000.</span>     
            </div>
            <input name="max_connections" value="150">
        </div>
        
        <div class="form_block">
            <div class="tooltip">Parametr ssl:
                <span class="tooltiptext">Parametr przyjmuje wartość logiczną (true lub false). Określa czy możliwe jest połączenie do serwera za pomocą SSL.</span> 
            </div>
            <input name="ssl" value="true">
        </div>

        <div class="form_block">
            <div class="tooltip">Parametr shared_buffers:
                <span class="tooltiptext">Ilość pamięci, którą baza danych przezacna na dzielony pomiędzy wszystkie bazy danych bufor. Minimalna wartość jaką można zastosować to 128K. Dla baz większych od 1GB zalecane jest ustawienie tego parametru na 25-40% ilości pamięci RAM w systemie.</span>       
            </div>
            <input name="shared_buffers" value="128M">
        </div>
        
        <div class="form_block">
            <div class="tooltip">Parametr temp_buffers:
                <span class="tooltiptext">Maksymalny rozmiar tymczasowego buforu dla każdej sesji bazy danych. Zalecane wartości od 8M do 24M.</span>    
            </div>
            <input name="temp_buffers" value="16M">
        </div>

        <div class="form_block">
            <div class="tooltip">Parametr work_mem:
                <span class="tooltiptext">Parametr definiuje ilość pamięci, która może być wykorzystana do operacji wewnętrznego sortowania (np. ORDER_BY). W przypadku jeżeli operacja wymaga więcej pamięci, zostanie wykorzystany plik tymczasowy na dysku twardym. </span>                
            </div>
            <input name="work_mem" value="8M">
        </div>

        <div class="form_block">
            <div class="tooltip">Parametr maintenance_work_mem:
                <span class="tooltiptext">Parametr określa maksymalną ilość pamięci, która może być wykorzystnana do przeprowadzania wewnętrznych operacji serwisowych takich jak VACUUM, CREATE INDEX oraz ALTER TABLE ADD FOREIGN KEY.</span>                
            </div>
            <input name="maintenance_work_mem" value="64M">
        </div>

        <div class="form_block">
            <div class="tooltip">Par dynamic_shared_memory_type:
                <span class="tooltiptext">Określa jaki rodzaj implementacji dzielonej pamięci powinien wykorzystywać serwer. Możliwe wartości to: posix, sysv, windows, mmap lub none w przypadku, kiedy użytkownik chce zrezygnować z korzystania z dynamicznej dzielonej pamięci.</span>                
            </div>
            <input name="dynamic_shared_memory_type" value="posix">
        </div>

        <div class="form_block">
            <div class="tooltip">Parametr max_worker_processes:
                <span class="tooltiptext">Maksymalna ilość procesów działających w tle. Zalecane wartości pomiędzy 4 a 32.</span>                
            </div>
            <input name="max_worker_processes" value="8">
        </div>

        <div class="form_block">
            <div class="tooltip">Parametr max_files_per_process:
                <span class="tooltiptext">Maksymalna ilość jednocześnie otwartych plików przez jeden subproces. Zalecane są wartośc od 100 do 2000.</span>                
            </div>
            <input name="max_files_per_process" value="500">
        </div>

        <input type="submit" value="Zainstaluj postgres">

    </form>
    
    <form action="index.php" method="post">
        <input type="submit" value="Odinstaluj postgres">
        <input name="service" value="postgres" type="hidden">
        <input name="action" value="uninstall" type="hidden">

    </form>
    
</body>
</html>
