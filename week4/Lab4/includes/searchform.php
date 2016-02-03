<?php
        include '../db_connect.php';
        include '../functions.php';
        
        $db = dbconnect();
        
        $output = '';
        
        
        if(isset($results['search']))
        {
            $searhcq = $results['search'];
            $searchq = preg_replace("#[^0-9a-z]#i","",$searchq);
            
            $query = mysql_query("SELECT * FROM corps WHERE owner LIKE '%$searchq%' OR corp LIKE '%$searchq%'") or die("Could not Search!");
            $count = mysql_num_rows($results);
            
            if($count == 0)
            {
                $output = 'There was no results!';
                
            }
                else
                {
                while ($row = mysql_fetch_array($query)) {
                    $row['owner'];
                    $row['corp'];
                    $row['id'];
                    
                    $output .= '<div>' .$owner.' '.$corp.'</div>';
                }
                }
            
        }
?>

<form action="#" method="post">
    <fieldset>
        <legend>Search Form</legend>
        <label>Search</label>
        <input type="text" name="search" placeholder="Search...." />
        <input name="corporation" value="data2" type="hidden" />
    
         <input type="hidden" name="action" value="Submit2" />
        <input type="submit" value="Submit" />
    </fieldset>            
</form>

<?php print ("$output");?>
