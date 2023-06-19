<?php

include('db.php');
$query_one = 'SELECT * FROM test ORDER BY id DESC ';
$run_one = mysqli_query($conn ,$query_one);
while($row=mysqli_fetch_array($run_one)){
    $name = $row['first_name'].' '.$row['last_name'];
    $text = $row['msg_text'];
    $date = $row['date'];
?>
<div class="messages">
    <section>
    <font class="user-name"><?php if ($text > 0) {echo $name.':' ;}else{$error[] = '';} ?></font>
        <font class="message-text"><?php if ($text > 0) {echo $text;}else{$error[] = '';} ?></font>
        <font class='message-date' style='font-weight: 1000;'><?php if ($text > 0) {echo $date;}else{$error[] = '';} ?></font>
    </section>
</div>
<?php } ?>