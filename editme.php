<html>
    <head>
    <title>Edit Student</title>
        <style type="text/css">
            #editing{
                width: 70%;
                margin-left: 30px; 
                font-family: monospace;
                font-size: 25px;
            }
    header{
                background-image: url(imgs/background-canvas-close-up-1020320.jpg);
	background-repeat: no-repeat;
	background-size: cover;
	width: 100%;
	height: 100vh;
	background-position: center center;
	position: relative;
            }
        </style>
    </head>
<body>
     
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js" ></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
    <?php
           include_once("documents/conn.php");
    $requestid=$_GET["roll_no"];
    $error="";
      $sql="select * from student_data where rollno=$requestid";
        $result = $conn->query($sql) or die($conn->error);
      $row = $result->fetch_assoc();
    
    $SEMESTER=$row["Semester"];
    $BRANCH=$row["Branch"];
    $SNAME=$row["Sname"];
    $SFNAME=$row["Sfather"];
    $SPHN=$row["Sphn"];
    $ADDRESS=$row["address"];
    if(isset($_POST["submit"])){
    $sem=$_POST["input_sem"];
    $name=$_POST["input_name"];
    $branch=$_POST["input_branch"];
    $fathername=$_POST["input_fathername"];
    $address=$_POST["input_address"];
    $phn=$_POST["input_phn"];
    $sql="UPDATE student_data  SET  Semester=".mysqli_real_escape_string($conn,$sem).",Branch='".mysqli_real_escape_string($conn,$branch)."',Sname='".mysqli_real_escape_string($conn,$name)."',
    address='".mysqli_real_escape_string($conn,$address)."',Sfather='".mysqli_real_escape_string($conn,$fathername)."',Sphn=".mysqli_real_escape_string($conn,$phn)." WHERE rollno=$requestid";
    
    if(!$conn->query($sql)){
        $error="not edited";
    }
    else{
        echo "<script>window.close();</script>";
    }
    }
        
    ?>
 <header>
    <div id="editing">
        <form  onsubmit="goto();"method="post">
      <div class="form-group row">
        <label for="input_rollno" class="col" >Roll No</label>
                <h2 id="input_rollno"><? echo $requestid; ?></h2>
            </div>

            <div class="form-group row">
            <label for="input_name" class="col" >Student Name</label>
                <input type="text" class="form-control col" name="input_name" value="<? echo $SNAME; ?>">
            </div>
                  <div class="form-group row">
        <label for="input_branch" class="col" > Branch</label>
        <select class="form-control col" name="input_branch">
           <option value="<? echo "$BRANCH"; ?>"><? echo "$BRANCH"; ?></option>
            <option value="Cse">Cse</option>
          <option value="Mechanical">Mechanical</option>
          <option value="Cs(it)">Cs(it)</option>
          <option value="Electrical">Electrical</option>
          <option value="Civil">Civil</option>
        </select>
      </div>
      <div class="form-group row">
        <label for="input_sem" class="col" >Semester</label>
        <select class="form-control col" name="input_sem">
            <option value="<? echo $SEMESTER; ?>"><? echo $SEMESTER; ?></option>
            <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          </select>
      </div>
            <div class="form-group row">
            
            <label for="input_address" class="col">Address</label>
                <input type="text" class="form-control col" name="input_address" value="<? echo $ADDRESS; ?>"> 
            </div>
            <div class="form-group row">
            <label for="input_fathername" class="col"  style="float:left;">Father's Name</label>
                            <input type="text" class="form-control col" name="input_fathername" value="<? echo $SFNAME; ?>">
            </div>
            <div class="form-group row">
            <label class="col" for="input_phn" >Phn no.</label>
                <input type="tel" class="form-control col" name="input_phn" value="<? echo $SPHN; ?>">
            </div>
            <input type="submit" name="submit" value="Submit">
        </form>
        
        <?php echo "<br><h2>$error</h2>".mysqli_error($conn);  ?>
    </div>

    </header>
<script>
    function goto(){
        
        document.location.href="second.php";
    }
    
    </script>
    
    </body>
</html>
  