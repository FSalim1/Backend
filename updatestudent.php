<html>

<head> <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>School Management System</title></head>

        <style>
        body {
          font-family: Arial, Helvetica, sans-serif;
        }

        .navbar {
          overflow: hidden;
          background-color: #333;
        }

        .navbar a {
          float: left;
          font-size: 16px;
          color: white;
          text-align: center;
          padding: 14px 16px;
          text-decoration: none;
        }

        .dropdown {
          float: left;
          overflow: hidden;
        }

        .dropdown .dropbtn {
          font-size: 16px;
          border: none;
          outline: none;
          color: white;
          padding: 14px 16px;
          background-color: inherit;
          font-family: inherit;
          margin: 0;
        }

        .navbar a:hover, .dropdown:hover .dropbtn {
          background-color: red;
        }

        .dropdown-content {
          display: none;
          position: absolute;
          background-color: #f9f9f9;
          min-width: 160px;
          box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
          z-index: 1;
        }

        .dropdown-content a {
          float: none;
          color: black;
          padding: 12px 16px;
          text-decoration: none;
          display: block;
          text-align: left;
        }

        .dropdown-content a:hover {
          background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
          display: block;
        }
        </style>
    </head>

	<body>
		
    <div class="navbar">
            <a href="index.php">Home</a>
            <div class="dropdown">
                <button class="dropbtn">View
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="seestudent.php">Student</a>
                    <a href="seeparent.php">Parent</a>
                    <a href="viewteacher.php">Teacher</a>
                    <a href="viewclass.php">Class</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Add
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <a href="addstudent.php">Student</a>
                    <a href="addparent.php">Parent</a>
                    <a href="addteacher.php">Teacher</a>
                    <a href="addclass.php">Class</a>
                </div>
            </div>
			<div class="dropdown">
              <button class="dropbtn">Delete
                  <i class="fa fa-caret-down"></i>
              </button>
              <div class="dropdown-content">
                  <a href="deletestudent.php">Student</a>
                  <a href="deleteparent.php">Parent</a>
                  <a href="deleteteacher.php">Teacher</a>
                  <a href="deleteclass.php">Class</a>
              </div>
          </div>
          <div class="dropdown">
            <button class="dropbtn">Update
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="updatestudent.php">Student</a>
                <a href="updateparent.php">Parent</a>
                <a href="updateteacher.php">Teacher</a>
                <a href="updateclass.php">Class</a>
            </div>
        </div>
            <a href="parentspupils.php">Parents/Students</a>
        </div>

		<h2>Welcome to our School Management System</h2>
		
		
        
	
		<?php
        //mysqli_connect() function establishes a connection with MySQL server and returns the connection as an object.
		
		$link = mysqli_connect("localhost", "root", "", "school");
		// Check connection
		if ($link === false) {
			die("Connection failed: ");
		}
		?>
	
		<hr>
		
		<h3>Update student</h3>
	
		<form method="post" action="updatestudent.php">
		
			<label>Student Name:</label>
			<input type="text" name="StudentName">
			
			<br>
            <label>Student address:</label>
			<input type="text" name="Stud_address">
			
			<br><label>Student Medical Info:</label>
			<input type="text" name="Medical_Info">
			
			
			
			<br>
			
			<label>Select Student:</label>
			<select name="StudentID">
				<?php
				$sql = mysqli_query($link, "SELECT StudentID, StudentName FROM student");
				while ($row = $sql->fetch_assoc()){
				echo "<option value='{$row['StudentID']}'>{$row['StudentName']}</option>";
				}
				?>
			</select>
			
			<br>
			
			<input type="submit" name="submit">
		
		</form>
		
		<?php
		/*
The isset() function checks whether a variable
 is set, which means that it has to be declared 
 and is not NULL. 
 This function returns true if the variable
  exists and is not NULL, 
  otherwise it returns false.
*/
		if (isset($_POST['submit'])) {
		
			$StudentName = $_POST['StudentName'];
			$StudentID = $_POST['StudentID'];
            $Stud_address = $_POST['Stud_address'];
            $Medical_Info = $_POST['Medical_Info'];
           
			/*
					mysqli_query() function accepts a string value
					representing a query as one of the parameters
					and, executes/performs the given query 
					on the database
					*/
			$sql = "UPDATE student SET StudentName = '$StudentName', Stud_address= '$Stud_address',Medical_info= '$Medical_Info' WHERE StudentID='$StudentID'";
			if (mysqli_query($link, $sql)) {
			  echo " record updated successfully";
			} else {
			  echo "Error updating record ";
			}
		
		}
		
		$link->close();
		?>
	
		<hr>
		

	
	</body>

</html>