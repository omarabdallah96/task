<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
    <?php

    include('db.php');

    $sql = " SELECT * FROM quotes ORDER BY id DESC ";
    $result = $mysqli->query($sql);
    $mysqli->close();
    ?>
</head>

<body>
    <form action="task_data.php" method="post">


        <fieldset>
            <legend>What is Your Favorite Pet?</legend>

            <?php
            // LOOP TILL END OF DATA

            while ($rows = $result->fetch_assoc()) {
            ?>
                <input type="checkbox" name="quotes_id[]" value="<?php echo $rows['id'] ?> "><?php echo $rows['name'] ?><br>

            <?php
            }
            ?>
        </fieldset>

        <input type="submit" />
    </form>
</body>

</html>