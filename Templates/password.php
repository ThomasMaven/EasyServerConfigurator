<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <h2>Zmiana hasła:</h2>
    <form action="index.php" method="post">
        <input name="action" value="changePassword" type="hidden">
        <input name="service" value="password" type="hidden">
        <div class="form_block">
            Aktualne hasło: <input name="oldpwd" type="password">
        </div>    
        <div class="form_block">
            Nowe hasło: <input name="new1" type="password">
        </div>
        <div class="form_block">    
            Powtórz nowe hasło: <input name="new2" type="password">
        </div>    
        <div class="form_block">
            <input type="submit" value="Zmień hasło">
        </div>    
    </form>
    <?php
        require_once("session.php");
        if ($_POST['action'] == "changePassword") {
            if ( $_POST['new1'] != $_POST['new2'] ) {
                echo "Hasła nie są indentyczne. Spróbuj ponownie.";

            } else if (checkPasswd($_POST['oldpwd'])){

                setNewPassword($_POST['new1']);
                echo "Hasło zostało zmienione.";
            } else {
                echo "Podane aktualne hasło jest niepoprawne. Spróbuj ponownie.";
            }
        }