<h1>Add Contact</h1>

<form method="post" action="#" enctype="multipart/form-data">
Groups:
            <select name="address_group_id">
            <?php foreach ($groups as $row): ?>
                <option value="<?php echo $row['address_group_id']; ?>">
                    <?php echo $row['address_group']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br />
            <br />
               
    Full Name : <input name="fullname" type="text" value="" />
    <br />
    Email : <input name="email" type="text" value="" />
    <br />
    Birthday : <input name="birthday" type="date" value="" />
    <br />
    Address : <input name="address" type="text" value="" />
    <br />
    Phone Number : <input name="phone" type="text" value="" />
    <br />
    Website : <input name="website" type="text" value="" />
    <br />
    <input type="submit" value="submit" />    
</form>

