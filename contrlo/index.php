<?php
session_start();
if (isset($_SESSION['user'])) {
	include '../connDB.php';
	echo 'User : '.$_SESSION['user'].'<br>';
	echo '<a href="logout.php"> logut</a><br>';
	echo '<a href="edituser.php">edit</a>';
	$allVaideo=$conn->query("SELECT * FROM video ");


	?>
	<table style="width:100% ; text-align: left">
		<tr>
		    <th>ID</th>
		    <th>Title Video </th>
		    <th>Description Video</th>
		    <th>Show</th>
		    <th>accept</th>
		 </tr>
		<?php
			foreach ($allVaideo as $video) {
				echo '
				<tr>
				    <td>'.$video['id'].'</td>
				    <td>'.$video['vid_title'].'</td>
				    <td>'.$video['vid_desc'].'</td>
				    <td><a href="show.php?id='.$video['id'].'">show</a></td>;
				 	<td>'.$video['accept'].'</td>
				 </tr>
				 

				';
			}
		?>
	</table>
	<?php
}else{
	header('location:login.php');
}
