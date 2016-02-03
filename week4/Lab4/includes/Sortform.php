<form action="#" method="get">
    <fieldset>
        <legend>Form Order Preference</legend>
        
        <label>Descending</label>  
        <input type="radio" name="DSC" value="Descending" />
        

        <label>Ascending</label>  
        <input type="radio" name="ASC" value="Ascending" />
        
        <select name="sort">
            <option value="<?php echo $owner; ?>">Owner</option>
            <option value="<?php echo $zipcode; ?>">Zip Code</option>
        </select>
        <input type="hidden" name="action" value="Sort" />
        <input type="submit" value="Sort" />
    </fieldset>    
    <br>
    <br>
    
    
</form>