<!DOCTYPE html>
<html>
    <head>
        
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        $name = 'Jim';
        $what = 'geek';
        $level = 10;
        echo 'Hi, my name is '.$name,'. and I am a level '.$level.'
        '.$what;
        $hoursworked = $_GET['hours'];
        $rate = 12;
        if ($hoursworked > 40) {
        $total = $hoursworked * $rate * 1.5;
        } else {
        $total = $hoursworked * $rate;
        }
        echo ($total > 0) ? 'You owe me '.$total : 'Youre welcome';

        ?>
    </body>
</html>
