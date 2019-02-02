<?php
$sdd_db_host='localhost'; // ваш хост
$sdd_db_name='forgrant_test_db'; // ваша бд
$sdd_db_user='root'; // пользователь бд
$sdd_db_pass=''; // пароль к бд
@mysql_connect($sdd_db_host,$sdd_db_user,$sdd_db_pass); // коннект с сервером бд
@mysql_select_db($sdd_db_name); // выбор бд
$result=mysql_query('SELECT * FROM `products`'); // запрос на выборку
while($row=mysql_fetch_array($result))
{
echo '<p>Единица= '.$row['unit'].'. Период цены с: '.$row['date_from'].'. Период цены по: '.$row['date_to'].'. Цена: '.$row['price'].' рублей.</p> <input id="id'.$row['id'].'" type="number" step="500" min="0" value="10000" name="newPriceProd"><input  type="submit" value="Изменить цену AJAX" onClick="send('.$row['id'].');" name="updProd">  <br/><br/><br/>'.$row['id'];// выводим данные 
}

$str = <<<EOD
Пример  строки,
охватывающей несколько строк,
с использованием heredoc-синтаксиса.
EOD;
?>
