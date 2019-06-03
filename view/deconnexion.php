<?php 

unset($_SESSION['acces']);
unset($_SESSION['acces+']);
unset($_COOKIE['rememberme']);
setcookie("rememberme","0",time()-1);
var_dump($_COOKIE);



header('Location: index.php?id=1');
