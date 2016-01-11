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

<!--        /* Here I declared the Variable $randColor to become a random color.-->
<!--        */-->

        <table border="1">
            <?php for ($tr = 1; $tr <= 10; $tr++): ?>
                <tr>         
                    <?php for ($td = 1; $td <= 10; $td++): ?>

<!--                        // this forms the table 10 * 10-->

                        <?php
                        $randColor = '#' . strtoupper(dechex(rand(0x000000, 0xFFFFFF)));
                        ?>
<!--                        // This applies the random color to apply-->

                        <td style="background-color:<?php echo $randColor; ?>"><?php echo $randColor; ?> <span style="color:white;"><?php echo $randColor; ?></span></td>
<!--                        // using td this will apply a random color to each cells background within the loop -->
                        <?php endfor; ?>                
                </tr>
            <?php endfor; ?>
        </table>

    </body>
</html>
