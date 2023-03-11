<form method="post" action="<?php echo 'index.php?task=update&level=admin&id='.$users[0]->id?>">
<label for="first_name">First Name:</label><br>
<input type="text" name="first_name"><br>
<label for="last_name">Last Name:</label><br>
<input type="text" name="last_name"><br>
<label for="username">Username:</label><br>
<input type="text" name="username"><br>
<label for="password">Password: </label><br>
<input type="text" name="password"><br>
<label for="role">Role:</label><br>
<select type="text" name="role">
        <?php
        for($i = 1; $i <= 2 ; $i++){
            echo "<option value=\"$i\">$i</option>";
            }
        ?>
    </select>
<br>
<label for="photo">Photo:</label><br>
<input type="text" name="photo"><br>
<input type="submit" name="submit">
</form>
</div>