<?php
    require "includes/db.php";
    if(isset($_GET['id'])){
    require_once "queryTableGET.php";
    return;
}
    $data = $_POST;

    //var_dump($_POST);
    if(isset($data['subProd'])){
        $errors = array();
        if($data['prodList'] == ''){
            $errors[] = 'Выберете единицу <b>продукта</b>!';
        }
        if($data['dateProdFrom'] == ''){
            $errors[] = 'Выберете период цены <b>продукта</b> "с"!';
        }
        if($data['priceProd'] == '' || $data['priceProd'] == '0'){
            $errors[] = 'Установите цену <b>продукта</b>!';
        } else if (isset($data['updProd'])){
            $data['priceProd'] = $data['newPriceProd'];
        }
        if (empty($errors)){
            $product = R::dispense('products');
            $product->unit = $data['prodList'];
            $product->dateFrom = $data['dateProdFrom'];
            $product->dateTo = $data['dateProdTo'];
            $product->price = $data['priceProd'];
            R::store($product);
        }
                if($data['updProd'] == ''){
        header('Location: index.php');
                }
    }
    if(isset($data['updProd']) && !empty($data['updProd'])){
       
        // найти запись по ид
        // если запсь найдена обновляем запись
         header('Location: index.php');
                }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
</head>
<body>
    <div class="wrapper">
    <form action="" method="post">
    <table border="1">
    <tr><td>Вид услуг</td><td>Единица</td><td>Период цены "с"</td><td>Период цены "по"</td><td>Цена, руб.</td><td>Установить цену</td></tr>
    <tr><td>Товары</td><td><input list="tov" placeholder="Введите название товара" name="tovList"></td><td><input type="date" name="dateTovFrom"></td><td><input type="date" name="dateTovTo"></td><td><input type="number" step="100" min="0" name="priceTov" value="10000"></td><td><input type="submit" value="Установить цену" name="subTov"></td></tr>
    
    <tr><td>Продукты</td><td><input list="prod" placeholder="Введите название продукта" name="prodList" value=""></td><td><input type="date" name="dateProdFrom" value=""></td><td><input type="date" name="dateProdTo"></td><td><input type="number" step="500" min="0" value="10000" name="priceProd"></td><td><input type="submit" value="Установить цену" name="subProd"></tr>
    </table>
    </form>
    <p><?php require_once "queryTable.php"; ?></p>
    <datalist id="tov">
        <option value="Товар 1">Товар 1</option>
        <option value="Товар 2">Товар 2</option>
    </datalist>
    <datalist id="prod">
        <option value="Продукт 1">Продукт 1</option>
        <option value="Школьная форма">Школьная форма</option>
        <option value="Продукт 2">Продукт 2</option>
    </datalist>
    <div>
    </div>
    </div>
</body>
<script src="js/main.js"></script>
</html>
