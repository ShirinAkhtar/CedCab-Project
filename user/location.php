<?php
/**
 * Template File Doc Comment
 * 
 * PHP version 7
 *
 * @category Template_Class
 * @package  Template_Class
 * @author   Author <author@domain.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     http://localhost/
 */
require 'header2.php';
require 'class.php';
if(isset($_SESSION['userdata']) && ($_SESSION['userdata']['isAdmin'] == 1)) 
{
	$Location = new Location();  
	$lo = $Location->location_avilable();
	//print_r($lo);
	if(isset($_REQUEST["Aid"]))
	{
		$id = $_REQUEST["Aid"];
		$Location->access($_REQUEST["Aid"]);
		header('Location: location.php');
	}
	if(isset($_REQUEST["Did"]))
	{
		$id = $_REQUEST["Did"];
		$Location->denied($id);
		header('Location: location.php');
	}
	if(isset($_POST['name'])) {
		$lo = $Location-> location_sortByName();
	}
	if(isset($_POST['Dname'])) {
		$lo = $Location-> location_sortByNameDESC();
	}
?>
<html>
<head>
	<title>Location List</title>
	<link type="text/css" rel="stylesheet" href="style2.css">
</head>
<body style="background-color:white;">
	<h1><center>Available Locations</center></h1><br/>
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
				<form method="post">
					<table id="exam_data_table" class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>Location Id</th>
								<th>Location Name
								<button type="submit" name="name" value="Name" class="input"><i class="fa fa-angle-up" aria-hidden="true"></i></button>
								<button type="submit" name="Dname" value="Name" class="input"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
								</th>
								<th>Location Distance</th>
								<th>Location Available</th>
								<th>Action</th>
							</tr>
						</thead>
						<?php  foreach($lo as $key=> $value) { ?>
							<tr>
								<td><?php echo $value['Lid'] ?></td>
								<td><?php echo $value['Lname']; ?></td>
								<td><?php echo $value['Ldis']; ?> km</td>
								<td><?php if ($value['Lavilable'] == 0)
								{
									echo "Available";}
									else
									{
										echo "UnAvailable";
									}
								 ?></td>
								<?php if ($value['Lavilable'] == "0") { ?>
									<td><a href="location.php?action=access&Aid=<?php echo $value['Lid'];?>" class="edit_btn" name="access_granted">Available</a> </td>
									<?php } else { ?>
										<td><a href="location.php?action=access&Did=<?php echo $value['Lid'];?>" class="edit_btn1" name="access_granted">UnAvailable</a> </td>
									<?php } ?>
								<td><a href="updatelocation.php?action=edit&id=<?php echo $value['Lid'];?>" class="edit_btn">Edit</a> </td>
								<td><a href="deleteLocation.php?action=delete&id=<?php echo $value['Lid'];?>" onClick="return confirm('Are you sure you want to delete?')" class="del_btn">Delete</a> </td>
							</tr>
							<?php } ?>
					</table>
				</form>
				</div>
			</div>
		</div>
	</body>
	<?php require 'footer.php' ?>
</html>
<?php } else
{
	header('Location:login.php');
}?>