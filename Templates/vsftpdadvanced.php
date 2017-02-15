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
    <h2>Konfiguracja VSFTPD - tryb zaawansowany</h2>
    <form action="index.php" method="get">
        <input name="service" value="vsftpd" type="hidden">
        <input type="submit" value="Tryb podstawowy">


    </form>
    

    <form action="index.php" method="post">
        
        <input name="service" value="vsftpd" type="hidden">
        <input name="action" value="install" type="hidden">
        <div class="form_block">
            <div class="tooltip">Parametr listen:
                    <span class="tooltiptext">Wartość parametru określa tryb działania serwera. Ustawienie wartości YES powoduje, że serwer będzie działał w trybie standalone, a NO że serwer będzie działał inetd. UWAGA: W przypadku wybrania wartości YES dla tego parametru wartość parametru listen_ipv6 musi być ustawiona na NO!</span>
                </div>
                <input name="listen" value="NO" >
        </div>
        <div class="form_block">
            <div class="tooltip">Parametr listen_ipv6:
                    <span class="tooltiptext">Działa analogicznie do parametru listen, z tą różnicą że w przypadku listen_ipv6 możliwe jest połączenie zarówno za pomocą IPv4 jak i IPv6. UWAGA: W przypadku wybrania wartości YES dla tego parametru wartość parametru listen musi być ustawiona na NO!</span>
                </div>
                <input name="listen_ipv6" value="YES" >
        </div>
        <div class="form_block">
            <div class="tooltip">Parametr anonymous_enable:
                    <span class="tooltiptext">Parametr decyduje o tym czy możliwe jest połączenie "anonimowe" (bez użycia hasła).</span>
                </div>
                <input name="anonymous_enable" value="NO" >
       </div>
        <div class="form_block">
            <div class="tooltip">Parametr write_enable:
                    <span class="tooltiptext">Parametr określa czy możliwe jest zapisywanie nowych plików oraz edycja zapisanych już na serwerze.</span>
                </div>
                <input name="write_enable" value="YES" >
        </div>
        <div class="form_block">
            <div class="tooltip">Parametr local_umask:
                    <span class="tooltiptext">Parametr określa standardową wartość umask dla nowo tworzonych plików. Wartość 077 oznacza, ze nowo tworzone pliki będą miały prawa 700.</span>
                </div>
                <input name="local_umask" value="077" >
        </div>
        <div class="form_block">
            <div class="tooltip">Parametr anon_upload_enable:
                    <span class="tooltiptext">Parametr decyduje o tym czy anonimowi użytkownicy będą mieli uprawnienia do dodawania plików. Aby to było możliwe dodatkowo opcja write_enable musi mieć wartość YES i anonimowy użytkownik ftp musi mieć uprawnienia do zapisu w danej lokalizacji.</span>
                </div>
                <input name="anon_upload_enable" value="NO" >
        </div>
        <div class="form_block">
            <div class="tooltip">Parametr anon_mkdir_write_enable:
                    <span class="tooltiptext">Parametr decyduje o tym czy anonimowi użytkownicy będą mieli uprawnienia do tworzenia folderów. Aby to było możliwe dodatkowo opcja write_enable musi mieć wartość YES i anonimowy użytkownik ftp musi mieć uprawnienia do zapisu w danej lokalizacji.</span>
                </div>
                <input name="anon_mkdir_write_enable" value="NO" >
        </div>
        <div class="form_block">
            <div class="tooltip">Parametr dirmessage_enable:
                    <span class="tooltiptext">Włączenie tej opcji pozwala na wyświetlanie użytkownikom komunikatu podczas pierwszego wejścia do nowego folderu. Domyślnie w folderze poszukiwany jest plik o nazwie .message i użytkownikowi wyświetlana jest jego treść.</span>
                </div>
                <input name="dirmessage_enable" value="YES" >
        </div>
        <div class="form_block">
            <div class="tooltip">Parametr use_localtime:
                    <span class="tooltiptext">Wartość parametru definiuje czy przy wyświetlaniu zawartości folderów powinna być wykorzystywana strefa czasowa użytkownika (daty utworzenia i modyfikacji plików). W przypadku wybrania opcji NO, daty wyświetlane będą z wykorzystaniem czasu GTM.</span>
                </div>
                <input name="use_localtime" value="YES" >
        </div>
        <div class="form_block">
            <div class="tooltip">Parametr xferlog_enable:
                    <span class="tooltiptext">Parametr definiuje czy akcje użytkowników takie jak ściąganie i tworzenie plików powinny być logowane.</span>
                </div>
                <input name="xferlog_enable" value="YES" >
        </div>
        


        <input type="submit" value="Zainstaluj vsftpd">

    </form>
    
    <form action="index.php" method="post">
        <input type="submit" value="Odinstaluj vsftpd">
        <input name="service" value="vsftpd" type="hidden">
        <input name="action" value="uninstall" type="hidden">

    </form>
    
</body>
</html>
