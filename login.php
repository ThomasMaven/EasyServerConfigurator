<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<div id="header">
</div>
<form id="loginform" action="login.php" method="post" >
    <fieldset class="loginbox">
        <input type="hidden" class="loginelement" name="submitted" id="submitted" value="1"/>
        <label for="password" class="loginelement" >Podaj hasło:</label>
        <input type="password" class="loginelement" name="password" id="password" maxlength="50" />
        <input type="submit" class="submit loginelement" value="Zaloguj" />
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

