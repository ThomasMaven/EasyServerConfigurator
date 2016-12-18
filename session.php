<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//global $passwdHash;
$passwdHash = "40bd001563085fc35165329ea1ff5c5ecbdbbeef";

function createSession($password) {
    
    if(checkPasswd($password)){
        global $passwdHash;
        session_start();
        $_SESSION["hash"] = $passwdHash; 
        return true;
    }
    return false;
}

function checkPasswd($passwd) {
    global $passwdHash;
    session_start();
    if(sha1($passwd)==$passwdHash){
       return true;
    }
    return false;
}

function checkSession() {
    global $passwdHash;
    session_start();
    if($_SESSION["hash"]==$passwdHash) {
        return true;
    }
    return false;
}
