<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <meta name="description" content="This website is used for registration of student for a new course" >
</head>
<style>
    table{
        background-image: linear-gradient(150deg, cyan 0%, pink 75%);
        margin-left: auto;
        margin-right: auto;
        margin-top:1em;
        padding:1em;
	border-radius: 10px;
        box-shadow: 0 4px 10px 0 rgba(0,0,0,0.2), 0 4px 20px 0 rgba(0,0,0,0.19);
    }
    tr,td,th{
        padding:1em;
        text-align: left;
    }
    .center th{
        text-align: center;
    }
    h2{
        text-align: center;
        margin-top: 2em;
        background-image: linear-gradient(90deg, cyan 0%, pink 75%);
    }
    input, select {
	padding: 5px 10px;
	width: 300px;
	border-radius: 10px;
	border: 2px solid #000000;
	background: transparent;
	outline: none;
    }
    .submit-button {
	width: 150px;
	font-weight: 600;
    }
</style>
<body>
    <h2>Student Registration Form</h2>
    <form name="form" action="#" method="POST">
         <table>
             <tr>
                <th>Name of Student</th>
                <td><input type="text" name="fname" placeholder="Enter your Name"></td>
            </tr>
            <tr>
                <th>Date of Birth</th>
                <td><input type="date" name="dob"></td>
            </tr>
            <tr>
                <th>Course</th>
                <td>
		     <select name="course">
			<option value="sub">--Select Course--</option>
			<option value="bca">BCA</option>
			<option value="b.sc">B.Sc Computer Science</option>
			<option value="b.tech">B.Tech Computer Science</option>
			<option value="mca">MCA</option>
			<option value="m.sc">M.Sc Computer Science</option>
			<option value="m.tech">M.Tech Computer Science</option>
		     </select>
		</td>
            </tr>
            <tr>
		<th>Mobile No.</th>
		<td><input type="text" name="mob" placeholder="Enter your Mobile Number"></td>
	    </tr>
            <tr>
		<th>Email</th>
		<td><input type="email name="email" placeholder="Enter your Email"></td>
	    </tr>
            <tr>
		<th>Name of Guardian</th>
		<td><input type="text" name="guardian" placeholder="Enter your Guardian Name"></td>
	    </tr>
            <tr class="center">
                <th colspan="2"><input type="submit" value="Submit" class="submit-button"></th>
            </tr>
         </table>
    </form>

<?php
     	$con = Mysqli_Connect("localhost", "");

	 if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $dob = $_POST['dob'];
	$course = $_POST['course'];
        $email = $_POST['email'];  
        $mobile = $_POST['mob'];           
        $guardian = $_POST['guardian'];
        
	if($_POST['fname'] == ""){
            echo "<script>alert('Enter Name !!')</script>";
        }
        else if(!preg_match("/^[a-zA-Z ]*$/",$name)){
            echo "<script>alert('Enter Your  Name !!')</script>";
        }
        else if($_POST['dob'] == ""){
            echo "<script>alert('Enter Date of Birth !!')</script>";
        }
        else if($_POST['course'])){
            echo "<script>alert('Enter Course !!')</script>";
        }
        else if(!preg_match('/^[0-9]{10}+$/', $_POST['mob'])){
            echo "<script>alert('Enter Valid Mobile Number !!')</script>";
        }
	else if($_POST['email'] == ""){
            echo "<script>alert('Enter Email !!')</script>";
        }       
        else if($_POST['guardian'] == ""){
            echo "<script>alert('Enter Name of Guardian !!')</script>";
        }
        else{

            $query = "insert into form values('$name','$dob','$course','$email','$mobile','$guardian')";
            if(mysqli_query($con,$query)){
                echo "success";
            }
            else{
                echo "error".$query.mysqli_error($con);
            }
    }
    }
?>
</body>
</html>
