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
        <h2>Konfiguracja PostgreSQL - tryb podstawowy</h2>
        <form action="index.php" method="get">
            <input name="service" value="postgres" type="hidden">
            <input name="mode" value="advanced" type="hidden">
            <input type="submit" value="Tryb zaawansowany">


        </form>
        
        <form action="index.php" method="post">
            <input type="submit" value="Zainstaluj postgres">
            <input name="service" value="postgres" type="hidden">
            <input name="action" value="install" type="hidden">

            <input name="port" value="5432" type="hidden">
            <input name="max_connections" value="150" type="hidden">
            <input name="ssl" value="true" type="hidden">
            <input name="shared_buffers" value="128M" type="hidden">
            <input name="temp_buffers" value="16M" type="hidden">
            <input name="work_mem" value="8M" type="hidden">
            <input name="maintenance_work_mem" value="64M" type="hidden">
            <input name="dynamic_shared_memory_type" value="posix" type="hidden">
            <input name="max_files_per_process" value="200" type="hidden">
            <input name="max_worker_processes" value="8" type="hidden">

        </form>
        
        <form action="index.php" method="post">
            <input type="submit" value="Odinstaluj postgres">
            <input name="service" value="postgres" type="hidden">
            <input name="action" value="uninstall" type="hidden">

        </form>

    </body>
</html>
