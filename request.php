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
$Registration = new Registration();  
$store1 = $Registration->userRequest();
//echo sizeof($store1);
if(isset($_REQUEST["Aid"]))
{
    $id = $_REQUEST["Aid"];
    $Registration->access($_REQUEST["Aid"]);
    header('Location: request.php');
}

if(isset($_REQUEST["Did"]))
{
    $id = $_REQUEST["Did"];
    $Registration->denied($id);
    header('Location: request.php');
}

if(isset($_POST['username'])) {
    $store1 = $Registration-> userRequest_sortByName();
}

if(isset($_POST['Downid'])) {
    $store1 = $Registration-> userRequest_sortByDscend();
}

if(isset($_POST['Downdate'])) {
    $store1 = $Registration-> userRequest_sortByDateDESC();
}
if(isset($_POST['date'])) {
    $store1 = $Registration-> userRequest_sortByDate();
}

if(isset($_POST['filter'])) {
	$Fname = isset($_POST['Fname'])?$_POST['Fname']:'';
	if($Fname == "")
	{
		$store1 = $Registration->userRequest();
	}else{
	$store1 = $Registration-> user_filterByName($Fname);}
}
?>
	<html>

	<head>
		<title>CedCab</title>
		<link type="text/css" rel="stylesheet" href="style2.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	</head>
	<body style="background-color:white;">
		<h1 class="header">User Request List</h1><br/>
		<form method="post">
			<table id="exam_data_table" class="table table-bordered table-striped table-hover">
				<thead>
					<tr><!--
						<th>
							<input type="submit" name="id" value="Id" class="input"/> 
							<input type="submit" name="username" value="UserName" class="input"/>
							<input type="submit" name="date" value="Date" class="input" />
						</th>-->
					</tr>
					<tr>
						<th> <?php if (!isset($_POST['filter'])) {?>
                            <form method="post">
							<input type="text" name="Fname" id="s1"/>
  							<input type="submit" name="filter" value="Filter"/>
							  </form>
                            <?php } else {?>
                                <button><a href="request.php">Clear</a></button>
                            <?php } ?>
						</th>
					</tr>
					<tr>
						<th>User Id</th>
						<form method="post">
						<th>UserName<button type="submit" name="username" value="Id" class="input"><i class="fa fa-angle-up" aria-hidden="true"></i></button>
						<button type="submit" name="Downid" value="Id" class="input"><i class="fa fa-angle-down" aria-hidden="true"></i></button></th>
						</form>
						<th>Name</th>
						<form method="post">
						<th>Date<button type="submit" name="date" value="Id" class="input"><i class="fa fa-angle-up" aria-hidden="true"></i></button>
							<button type="submit" name="Downdate" value="Id" class="input"><i class="fa fa-angle-down" aria-hidden="true"></i></button>
						</th></form>
						<th>Mobile</th>
						<th>Status</th>
						<th>Action</th>
						
					</tr>
				</thead>
				<?php  foreach($store1 as $key=> $value){
                			if($value['isAdmin'] == 0){ ?>
							<tr>
								<td><?php echo $value['Uid'] ?></td>
								<td><?php echo $value['Uname']; ?></td>
								<td><?php echo $value['name']; ?></td>
								<?php $date = $value['Sdate'];
									  $createDate = new DateTime($date);
									  $strip = $createDate->format('Y-m-d');?>
								<td><?php echo $value['Sdate']; ?></td>
								<td><?php echo $value['mobile']; ?></td>
								
								<?php if ($value['Isblock'] == "1") { ?>
									<td>Blocked</td>
								<?php } else 
											{ ?>
								<td>Unblocked</td>
								
								<?php } ?>
								
								<td><a href="deleteAccess.php?action=access&id=<?php echo $value['Uid'];?>" onClick="return confirm('Are you sure you want to delete?')" class="del_btn">Delete</a> </td>
								<?php } ?>
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