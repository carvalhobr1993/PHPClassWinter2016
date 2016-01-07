<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php
        $randColor = '#' . strtoupper(dechex(rand(0x000000, 0xFFFFFF)));
        ?>

        <table border="1">
        <?php for ($tr = 1; $tr <= 10; $tr++): ?>
        <tr> 
            <?php for ($td = 1; $td <= 10; $td++): ?>

            <?php
            $randColor = '#' . strtoupper(dechex(rand(0x000000, 0xFFFFFF)));
            ?>

        <td style="background-color:<?php echo $randColor; ?>"><?php echo $randColor; ?> <span style="color:white;"><?php echo $randColor; ?></span></td>

    <?php endfor; ?>                
                </tr>
                <?php endfor; ?>
        </table>

    </body>
</html>
