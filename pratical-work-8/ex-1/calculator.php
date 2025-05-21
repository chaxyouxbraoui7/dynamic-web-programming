<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Calculator | PHP</title>
</head>

<body style="text-align: center; font-size: 25px;">

    <hr>
    
            <?php
        
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                    $number_1 = $_POST['1st_num'];
                    $number_2 = $_POST['2nd_num'];
                    $opt = $_POST['opt'];
                
                    switch ($opt) {
                
                        case 'add' : echo $number_1 . ' + ' . $number_2 . ' = ' . ($number_1 + $number_2); 
                            break;
                
                        case 'sub' : echo $number_1 . ' - ' . $number_2 . ' = ' . ($number_1 - $number_2); 
                            break;
                
                        case 'mul' : echo $number_1 . ' * ' . $number_2 . ' = ' . ($number_1 * $number_2); 
                            break;
                
                        case 'div' : 
                            if ($number_2 == 0) {echo "Cannot divide by zero!";} 
                                else {echo $number_1 . ' ÷ ' . $number_2 . ' = ' . ($number_1 / $number_2);}
                            break;
                
                        case 'mod' : 
                            if ($number_2 == 0) {echo "Cannot modulo by zero!";}
                                else {echo $number_1 . ' % ' . $number_2 . ' = ' . ($number_1 % $number_2);}
                            break;
                
                    }
                }
        
            ?>

    <hr>
    

</body>

</html>