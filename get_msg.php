<?php
session_start();
include 'config.php';

$msgs=new App();
$msg=$msgs->getMessage();
foreach ($msg as $row):
    ?>
    <img src="img/<?php echo $row['image']; ?>" style="width: 40px; height: 40px"> <?php echo $row['name'] ?> : <?php echo $row['message'] ?>
    <?php if($_SESSION['user_id']==$row['s_id']) { ?><button id="btnDelMsg" idd="<?php echo $row['id']; ?>" type="button" class="btn btn-xs btn-danger pull-right">&times;</button> <?php } ?>  <br> <span class="pull-right" style="opacity: 0.3"> <?php echo date('D h:i:s A', strtotime($row['created_at'])) ?></span>
    <hr>

    <?php

    endforeach;