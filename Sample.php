<?php
include("php-db-query.php");//You can include this in template page


# Insert --------------------------------------
$reurn_id=Query("INSERT INTO users
    SET
user_username='hsn92eb' ");
#----------------------------------------------


# UPDATE --------------------------------------
$reurn_id=Query("UPDATE users
    SET
    user_username='hsn92ebrahimi'
    WHERE
    user_id='$reurn_id' ");
#----------------------------------------------



# SELECT ALL USERS ----------------------------
$users=Query("SELECT * FROM users ",$count);

echo " $count users exist. <br>";

// in loop echo all user's usernames
foreach($users as $userVal){
    echo $userVal['user_username'];
}
#----------------------------------------------



# SELECT ONE USERS ----------------------------
$user_row=Query("SELECT * FROM users
    WHERE
    user_id='$reurn_id' ");
$user_row=$user_row[0];
echo $user_row['user_username']; // echo hsn92ebrahimi
#----------------------------------------------



# DELETE --------------------------------------
$reurn_id=Query("DELETE FROM users
    WHERE
    user_id='$reurn_id' ");
#----------------------------------------------
