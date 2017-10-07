<?php include './partials/header.php';?>
		
<div class="jumbotron">
  <h1 class="display-3">Howdy!</h1>
  <hr class="my-4">
  <h3>Welcome to Course Selection System in Texas A&M University.</h3>
  <br>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="#" role="button">Get started!</a>
  </p>
</div>

<div class="row">
    <div style="width: 50%; margin: 30px auto;">
    	<h1 style="text-align: center">SELECT</h1>
		<form Method = "Post" Action = "select.php"">
			<div>
				Review personal information, please enter Student ID:
			</div>
			<div class="form-group">
		        <input class="form-control" type="text" name="id1" placeholder="ID e.g. 234">
		    </div>
		    <div class="form-group">
		        <button class="btn btn-md btn-primary btn-block">Submit</button>
		    </div>
			
			<div>
				Review all courses of one student's, please enter Student ID:
			</div>
			<div class="form-group">
		        <input class="form-control" type="text" name="id2" placeholder="ID e.g. 34">
		    </div>
		    <div class="form-group">
		        <button class="btn btn-md btn-primary btn-block">Select</button>
		    </div>
		    
		    <div>
		    	Look for all students in a course:
		    </div>
		    <div class="form-group">
		    	<select class="form-control" name="department">
					<option value="CSCE">CSCE</option>
					<option value="ECEN">ECEN</option>
				</select>
		    </div>
		    <div class="form-group">
		        <input class="form-control" type="text" name="number" placeholder="Course Number e.g. 608">
		    </div>
		    <div class="form-group">
		        <button class="btn btn-md btn-primary btn-block">Select</button>
		    </div>
		</form>

	<div class="progress" style="height: 1px;">
		<div class="progress-bar" role="progressbar" style="width: 25%; height: 1px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
	
	

    <h1 style="text-align: center">UPDATE</h1>
		<?php
			$temp = "";
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				if (empty($_POST["name"])) {
					$nameEr = "Name is required";
				} else {
					$temp = $_POST["name"];
					if (!preg_match('/^[0-9]*$/', $temp)) {
						echo "Only number from 1 to 500";
					}
				}
			} 
		?>

		<form Method = "Post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
			<div>
				Your old information:
			</div>
			<div class="form-group">
		        <input class="form-control" type="text" name="name" value="<?php echo $temp; ?>" placeholder="ID">
		    </div>
		    <div class="form-group">
		        <button class="btn btn-md btn-primary btn-block">Submit</button>
		    </div>
		</form>
		
	
	
    <?php
        if ($temp == "") {
            // empty input
        } else {
            $query = "SELECT * FROM students WHERE id = $temp";
            $result = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <table class="table table-striped">
			<thead>
				<th></th>
                <td>ID</td>
				<td>Name</td>
				<td>Gender</td>
				<td>Age</td>
				<td>Email</td>
		  	</thead>
		  	<tbody>
				<tr>
					<th></th>
                	<td><?php echo $row["id"] ?></td>
                	<td><?php echo $row["name"] ?></td>
                	<td><?php echo $row["gender"] ?></td>
                	<td><?php echo $row["age"] ?></td>
                	<td><?php echo $row["email"] ?></td>
				</tr>
			</tbody>
		</table>
    <?php
            }
        }
    ?>
    
	<form Method = "Post" Action = "update.php"">
		<div>
			To review personal information, please enter ID (1-500):
		</div>
		<div class="form-group">
	        <input class="form-control" type="text" name="id" placeholder="ID">
	    </div>
	    <div class="form-group">
	        <input class="form-control" type="text" name="name" placeholder="Name">
	    </div>
	    <div class="form-group">
	        <input class="form-control" type="text" name="gender" placeholder="Gender">
	    </div>
	    <div class="form-group">
	        <input class="form-control" type="text" name="age" placeholder="Age">
	    </div>
	    <div class="form-group">
	        <input class="form-control" type="text" name="email" placeholder="Email">
	    </div>
	    <div class="form-group">
	        <button class="btn btn-md btn-primary btn-block">Update</button>
	    </div>
	</form>

	
	<div class="progress" style="height: 1px;">
		<div class="progress-bar" role="progressbar" style="width: 50%; height: 1px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
	
	
	<h1 style="text-align: center">INSERT</h1>
	<form Method = "Post" Action = "insert.php"">
		<div>
			To review personal information, please enter ID (1-500):
		</div>
		<div class="form-group">
	        <input class="form-control" type="text" name="record" placeholder="Record">
	    </div>
	    <div class="form-group">
	        <input class="form-control" type="text" name="std_id" placeholder="Student ID">
	    </div>
	    <div class="form-group">
		    <select class="form-control" name="department">
	    		<option value="CSCE">CSCE</option>
	    		<option value="ECEN">ECEN</option>
	    	</select>
	    </div>
	    <div class="form-group">
	        <input class="form-control" type="text" name="number" placeholder="Number">
	    </div>
	    <div class="form-group">
	        <input class="form-control" type="text" name="course" placeholder="Course">
	    </div>
	    <div class="form-group">
	        <button class="btn btn-md btn-primary btn-block">Insert</button>
	    </div>
	</form>
    

	<div class="progress" style="height: 1px;">
		<div class="progress-bar" role="progressbar" style="width: 75%; height: 1px;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
	
	<h1 style="text-align: center">DELETE</h1>
	<form Method = "Post" Action = "delete.php">
		<br>
    		Warning: Your course record will be removed.
    	<br>
	    <div class="form-group">
	        <input class="form-control" type="text" name="record" placeholder="Record">
	    </div>
	    <div class="form-group">
	        <button class="btn btn-md btn-primary btn-block">Delete</button>
	    </div>
	    <div class="form-group">
	        <input class="form-control" type="text" name="std_id" placeholder="Student ID">
	    </div>
	    <div class="form-group">
	        <button class="btn btn-md btn-primary btn-block">Delete</button>
	    </div>
	</form>
    
	<div class="progress" style="height: 1px;">
		<div class="progress-bar" role="progressbar" style="width: 100%; height: 1px;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
	</div>
    
</div>
    
<?php include './partials/footer.php';?>