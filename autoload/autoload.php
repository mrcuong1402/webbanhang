<?php     
	session_start();
	require_once __DIR__. "/../library/database.php";
    require_once __DIR__. "/../library/function.php";
    $db = new Database;
    define("ROOT",$_SERVER['DOCUMENT_ROOT']."/web_ban_giay/public/uploads/");
    $category = $db -> fetchAll("category");

    $sqlNew = "SELECT * FROM product WHERE 1 ORDER BY id DESC LIMIT 4";
    $productNew = $db -> fetchsql($sqlNew);

    $sqlHot = "SELECT * FROM product WHERE 1 ORDER BY hot DESC LIMIT 4";
    $productHot = $db -> fetchsql($sqlHot);
?>