<?php
# Your Database Host Address
$db_host='localhost';

# Your Database Username
$db_user='root';

# Your Database Password
$db_pass='ppppppp';

# Your Database Name
$db_dbname='workfatemp';

$dbConnection=mysqli_connect($db_host,$db_user,$db_pass) or die('Error In DataBase Connection: ' . mysqli_error());
mysqli_select_db($dbConnection,$db_dbname);

mysqli_query($dbConnection,"SET NAMES utf8");// Optional

function Query($sql,&$count=0,$debug=0) {
    global $dbConnection;
    $qur=mysqli_query($dbConnection,$sql);
    $err=mysqli_error($dbConnection);

    if($err){
        //You can send or log error with below details for website admin:
        $address = 'Address: http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'] . "?" . $_SERVER['QUERY_STRING'];;
        $error4save='There is an error in : '.$address.'  Error:'.str_replace("'",'*',$err);
        echo  "<b> $error4save </b>";

        return false;
    }

    $type=trim(strtolower(substr($sql,0,6)));

    if($type=='select'){
        $count=mysqli_num_rows($qur);
        $tanb=array();
        $ii=-1;
        while($array = mysqli_fetch_assoc($qur)){
            $tanb[]=$array;
        }
        return $tanb;

    }else{// insert-update-delete
        return ($type=='insert')?mysqli_insert_id ( $dbConnection ):mysqli_affected_rows( $dbConnection );
    }
}