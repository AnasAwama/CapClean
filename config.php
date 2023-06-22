<!--- config.php-->

<?php

session_start();

    defined('LOCALHOST')?null:define('LOCALHOST','localhost');
    defined('USERNAME')?null:define('USERNAME','root');
    defined('PASSWORD')?null:define('PASSWORD','');
    defined('DBNAME')?null:define('DBNAME','capic');

    $conn = mysqli_connect(LOCALHOST,USERNAME,PASSWORD,DBNAME) or die("Couldn't connect to");



    function query($q) {
    global $conn;
    return mysqli_query($conn, $q);
    }

    function getServies($i){
    global $conn;
    return query("select * from item where item_id = $i ",$conn);
    }


    function getItem(){

    global $conn;
    return query('select * from item AND item_quant>0',$conn);
    }

    function getServiesbycat($i){
        global $conn;
        return query("select * from item where item_cat_id = $i AND item_quant>0",$conn);
        }

    function getcategories(){

        global $conn;
        return query('select * from categories ',$conn);
        }
    
    function deleteCategories($i){
        global $conn;
        return query("DELETE FROM categories WHERE cat_id=$i",$conn);

    }

        function addcategories($i, $n, $x)
        {
            global $conn;
            $sql = "INSERT INTO categories (cat_name, cat_desc, cat_image) VALUES ('$i', '$n', '$x')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "Category added successfully.";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }

        function addproduct($i, $n, $x, $y, $z)
        {
            global $conn;
            $ser_short = substr($n,0,200);
            $sql = "INSERT INTO item (item_name, item_desc, item_short_desc, item_price, item_cat_id, item_quant) 
                    VALUES ('$i', '$n', '$ser_short', '$x',  '$y', $z)";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "Service added successfully.";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
        
        function ChangeAcces($i,$d)
        {
            global $conn;
            $sql = "UPDATE users SET access = '$i' where userid =$d";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "Access changed successfully.";
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }

    function userLogin(){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    
    $result = query(  "select * from users where username = '{$user}' and password = '{$pass}'");
    
    if(mysqli_num_rows($result) == 0){
        setMessage("Username or password incorrect");
    }
    else{
        $row =  mysqli_fetch_array($result);
        $_SESSION['username'] = $user;
        $_SESSION['email'] = $row[4];
        if ($row[5]=='admin')
        { 
            $_SESSION['access']='admin';
        }
        header("Location:index.php");
    }
    }

    
    function setMessage($msg){
    $_SESSION['message'] = $msg ;
    }

    

    function showMessage(){
        if(isset ($_SESSION['message'])){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        
        }
    }

    function sendMail($to, $subject, $msg){
     
        return mail($to, $subject, $msg);
        
        }
?>

function sum(x,y){
    int z
    z=x+y
    return z
}

int main(){
    sum(4,5)
}