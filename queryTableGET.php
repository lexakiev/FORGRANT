<?php
$id = $_GET['id'];
$price = $_GET['price'];
$sdd_db_host='localhost'; // ваш хост
$sdd_db_name='forgrant_test_db'; // ваша бд
$sdd_db_user='root'; // пользователь бд
$sdd_db_pass=''; // пароль к бд
@mysql_connect($sdd_db_host,$sdd_db_user,$sdd_db_pass); // коннект с сервером бд
@mysql_select_db($sdd_db_name); // выбор бд
$result=mysql_query("SELECT id FROM products WHERE id=$id"); // запрос на выборку
while($row=mysql_fetch_array($result))
{
    if($row['id'] === $id) {
        if(price !== "") {
            $response = (mysql_query("UPDATE products SET price=$price WHERE id=$id")) ? 'true' : 'false';
        } else {
            $response = true;
        }
        echo $response;
       
    }
    //echo $_GET['id'];
}
?>
