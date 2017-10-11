<?php

try  {
  $handler = new PDO('mysql:host=localhost;dbname=enter_db_name_here', 'db_user', 'db_user_password');
  $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}  catch(PDOException $e)  {
  echo $e->getMessage();
  die();
}

if(isset($_GET['time']))  {
  $query = $handler->query('SELECT id FROM messages ORDER BY id DESC LIMIT 1');
  $max_arr = $query->fetch(PDO::FETCH_ASSOC);
  $max = $max_arr['id'];
  $val = mt_rand(1, $max);
  $query_val = $handler->query("SELECT msg FROM messages WHERE id = '$val'");
  $validation_message_arr = $query_val->fetch(PDO::FETCH_ASSOC);
  $validation_message = $validation_message_arr['msg'];
  echo '<h2 class="msg">' . $validation_message . '</h2>';
}

?>
