<?php
include_once('config.php');
include_once('head.php');
$itemCount = 0;
$itemSum=0;

if (isset($_GET['id'])){
    addToCart($_GET['id']);
}

function printSessions() {
global $itemCount;
global $itemSum;
$itemCounter = 1;

foreach($_SESSION as $key => $value){

$itemid=substr($key,4);
$result = query("select * from item where item_id={$itemid}");
$row = mysqli_fetch_array($result);

$totalItem = $row['item_price'] * $value; 
$itemCount += $value;
$itemSum += $totalItem;
$names = $row['item_name'];
$price = $row['item_price'];
    $item=<<<DELIMITER
            <tr>
                <td>$row[item_name]</td>
                <td>$row[item_price]</td>
                <td>$value</td>
                <td>$totalItem</td>
                <td>
                <a href="checkout.php?minimize=1&iid={$key}"> 
                <button type="button" class="btn btn-warning glyphicon glyphicon-minus "></button>
                </a>
                <a href="checkout.php?increase=1&iid={$key}"> 
                <button type="button" class="btn btn-success glyphicon glyphicon-plus"></button>
                </a>
                <a href="checkout.php?delete=1&iid={$key}"> 
                <button type="button" class="btn btn-danger glyphicon glyphicon-remove"></button>
                </a>
                </td>
            </tr>
            <input type="hidden" name="item_name_{$itemCounter}" value="{$names}"> 
            <input type="hidden" name="item_number_{$itemCounter}" value="{$itemid}"> 
            <input type="hidden" name="amount_{$itemCounter}" value="{$price}"> 
            <input type="hidden" name="quantity_{$itemCounter}" value="{$value}"> 

            DELIMITER;
            echo $item;

}
}

function printSessions2() {
    global $itemCount;
    global $itemSum;

    
    foreach($_SESSION as $key => $value){
    
    $itemid=substr($key,4);
    $result = query("select * from item where item_id={$itemid}");
    $row = mysqli_fetch_array($result);
    //print_r($row);
    $totalItem = $row['item_price'] * $value; 
    $itemCount += $value;
    $itemSum += $totalItem;
    
        $item=<<<DELIMITER
                <tr>
                    <td>$row[item_name]</td>
                    <td>$row[item_price]</td>
                    <td>$value</td>
                    <td>$totalItem</td>
                </tr>
                DELIMITER;
                echo $item;
    
    }
    }


function addToCart($id){
    if(isset($_SESSION['prod'.$id])){
        $_SESSION['prod'.$id] ++;
    }
    else{
        $_SESSION['prod'.$id] = 1;
    }
    header('Location:services.php');
}


?>