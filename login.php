<head>
    <link rel="stylesheet" type="text/css" href="style.css">
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
    print_r($_POST[password]);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

