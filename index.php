<html>
    <body>
        <form action="index.php" method="get">
            <input type="submit" name="service" value="apache">
            <input type="submit" name="service" value="mysql">
            <input type="submit" name="service" value="php">
			<br>
            <input type="submit" name="service" value="apache_uninstall">
            <input type="submit" name="service" value="mysql_uninstall">
            <input type="submit" name="service" value="php_uninstall">
        </form>
    </body>
</html>
<?php



    if(isset($_GET['service'])) {
        echo "Installing ".$_GET['service'];
		$output = system("sudo ./scripts/".$_GET['service'].".sh");
		//$output = shell_exec("pwd");
		print_r("<br>".$output);
    }


?>
