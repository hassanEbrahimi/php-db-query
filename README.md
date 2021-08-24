# php-db-query
Connect to MySQL DB and SELECT, INSERT, UPDATE, DELETE easily  with Query() function


# Manage Database easily!
$users=Query("SELECT * FROM users ",$count);

echo " $count users exist."; <br> 
 
foreach($users as $userVal){<br> 
 &nbsp; &nbsp;   echo $userVal['user_username'];<br> 
}
