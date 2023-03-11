<div id="content" class="row">
<?php

echo 
			'<div class="col-12 med-col-2"><img id="empImage" alt="Employee Photo" src="images/'.$users[0]->user_photo.'"></div>
			<div id="empDetails" class="col-12 med-col-10"> <span class="centerDetails"><span class="label">Name:</span> '.$users[0]->user_lname.', '.$users[0]->user_fname.'<br>
			<span class="label">Employee ID:</span> '.$users[0]->id.'<br>
			<span class="label">Position:</span> '.$users[0]->user_username.'<br></span>
			<span class="label">Role:</span> '.$users[0]->role_name.'<br></span>
			</div>'
		;
?>
<br><br>
<?php	
echo '<a href="http://localhost:8888/users/index.php?task=delete&id='.$users[0]->id.'">delete employee</a><br>';

?>

</div>