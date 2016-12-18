<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<form id="login" action="login.php" method="post" >
    <fieldset >
        <input type="hidden" name="submitted" id="submitted" value="1"/>
        <label for="password" >Podaj hasło:</label>
        <input type="password" name="password" id="password" maxlength="50" />
        <input type="submit" class="submit" value="Zaloguj" />
    </fieldset>
</form>

<?php
require_once("session.php");

if(checkSession()){
    header("Location: /index.php");
} else if (! empty($_POST['password']) ) {
    $password = trim($_POST['password']);
    $passwdOk = createSession($password);
    if($passwdOk){
        header("Location: /index.php");
    } else {
        print_r("wrong passwd");
    }
}


return true;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

