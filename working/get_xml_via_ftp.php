<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$config["username"] = "ynhatnet";
$config["password"] = "y1net2O12";
$config["host"] = "ynhat.net";
$config["port"] = 21;
$config["host_file_path"] = "/public_html/demo/ParsingXML/";
$config["save_file_path"] = dirname(__FILE__) . "/xml/";
$config["filename"] = "AffiliateWindow_ProductList.xml";
$connection = ftp_connect($config["host"], $config["port"]) or die("Couldn't connect to {$config["host"]}");

if (@ftp_login($connection, $config["username"], $config["password"])) {
    echo "Connected as {$config["username"]}@{$config["host"]}\n";
    echo "Now download file";
    ftp_get($connection, $config["save_file_path"] . $config["filename"], $config["host_file_path"] . $config["filename"], FTP_ASCII);
    echo "file is downloaded";
} else {
    echo "Couldn't connect as {$config["username"]}\n";
}
?>
