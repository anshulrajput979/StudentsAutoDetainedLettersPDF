<?php
    @ob_start();
    session_start();
?>
<html>
<head><title>Validation</title>
    <style type="text/css">
        #container{
            background-color: #414141;
            min-height:1000px;
        }
        #footer{
            height:200px;
            width:100%;
        }
        #studentaddbtn: hover{
            color: white;
        }
       
        #table-container{
            width:100%;
            
        }
        #searchlabel{
            padding-top: 10px;
            font-family: fantasy ;
            font-size: 30px;
            font-stretch: semi-expanded;
            color: snow;
            padding-left: 150px;
            text-decoration: underline;
        }
        #myinput{
            border-radius: 7px;
            
        }
        table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
            table-layout: fixed;
            width:80%;
            background-color:blanchedalmond;
		}
        
		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}
		
		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			padding: 0px 50px 0px 50px;
		}

		.data-table th, 
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}
		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
            
		}
       
        @media screen and (max-width: 880px) /*if <  wide */
            {
                #phnhead,#rowphn {
                    display: none;
                }
            }
          @media screen and (max-width:700px) /* < 400px wide */
            {
                #phnhead,#addresshead,#rowaddress {
                    display: none;
                }   
            }
		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}
		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}
		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;
		}

		/* Table Footer */
		.data-table tfoot th {
			background-color: #e5f5ff;
			text-align: right;
		}
		.data-table tfoot th:first-child {
			text-align: left;
		}
		.data-table tbody td:empty
		{
			background-color: #ffcccc;
		}
    </style>
    <body>
           <script type="text/javascript" src="fpdf/fpdf.php"></script>
         <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.3.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <nav class="navbar navbar-expand-md bg-light navbar-dark">
            
  <a  class="navbar-brand" href="" style="color:black;font-weight:bold;font-size:30px;">Student Details</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"  style="color:'black';"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
         <a href="javascript:add()">Add Student</a>   <br>
        </div> 
</nav>
        <div id="container">
        <label id="searchlabel" for="myInput">Search Student by Roll no or Name</label>
        <input type="search" class="" id="myInput" onkeyup="mysearch()" placeholder="Search for" >
        <form   id="table-container" method="post">
         
            <table class="data-table" id="myTable" style="overflow-x:auto;">
		<caption class="title">Students</caption>
		<thead>
			<tr>
                
                <th>Select</th>
                <th>Delete/Edit</th>
				<th>Rollno</th>
                <th> <select name="input_sem" id="sem" onchange="myfilter()">
            <option value="">sem</option>
            <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          </select>
                </th>
                <th><select name="course" id="course"  onchange="myfilter()">
                <option value="">All Branch</option>
                <option value="Cse" >Cse</option>
                <option value="Cs(it)" >Cs(it)</option> 
                 <option value="Mechanical" >Mechanical</option>
                <option value="Electrical" >Electrical</option>
                <option  value="Civil" >Civil</option>
                </select></th>
				<th>Student Name</th>
				<th id="addresshead">Address</th>
				<th >Father's Name</th>
				<th id="phnhead">Phone No.</th>
			</tr>
		</thead>
                
		<tbody>
            
                   <tr>
                   <?php
                      
                    include("documents/conn.php");             
                       $sql = "SELECT * FROM student_data";
                         $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc())
                                        {
               ?>
					<td><input style="font-size:24px margin-left:10px;" type="checkbox" id="mycheckbox[<? echo $row['rollno'] ?>]"></td>
                    <td><input type="button"  onclick="editrow(<?php echo $row['rollno']; ?>)" id="edit" value="edit" style=" color:#420; font-weight: bold; ">
            <input type="button"  onclick="deleterow(<?php echo $row['rollno']; ?>)" id="deleteicon" value="delete" style=" color: #900; font-weight: bold; ">
            
            </td>
					<td><?php echo $row['rollno']; ?></td>
                    <td><?php echo $row['Semester']; ?></td>
                    <td><?php echo $row['Branch']; ?></td>
					<td><?php echo $row['Sname']; ?></td>
					<td ><?php echo $row['address']; ?></td>
					<td ><?php echo $row['Sfather']; ?></td>
                    <td ><?php echo $row['Sphn']; ?></td>
				</tr>
            <?php  }
            
            ?>
		</tbody>
	</table> 
            <input type="submit" id="Ist" value="First Sessionals" onclick="rowselector(this.id)" >
                        <input type="submit" id="IInd" value="Second Sessionals" onclick="rowselector(this.id)" >

                        <input type="submit" id="IIIrd" value="Third Sessionals" onclick="rowselector(this.id)" >

            <input type="reset" value="reset">
        </form>
        <div id="footer">
            
        </div>
        </div>
        
    
        <script>
            $(document).ready(function(){
            function fetch_data(){
                var dataTable=$('#myTable').DataTable({
                    "processing":true,
                "serverSide"    :true,
                   ' order':[],
                    "ajax":{
                        url:"documents/fetch.php",
                        type:"POST"
                    }
                    
                });
            }
                });
            function mysearch() {
  // Declare variables 
                  var input, filter, table, tr, td5, i,td2;
                  input = document.getElementById("myInput");
                  filter = input.value.toUpperCase();
                  table = document.getElementById("myTable");
                  tr = table.getElementsByTagName("tr");

                  // Loop through all table rows, and hide those who don't match the search query
                  for (i = 0; i < tr.length; i++) {
                    td5 = tr[i].getElementsByTagName("td")[5];
                    td2=tr[i].getElementsByTagName("td")[2];
                    if (td5||td2) {
                      if (td2.innerHTML.toUpperCase().indexOf(filter) > -1||td5.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                      } else {
                        tr[i].style.display = "none";
                          }
                        } 
                      }
                }
          
                  // Loop through all table rows, and hide those who don't match the search query
                  
                var popupWindow=null;
                
                function add()
                        {
                            popupWindow = window.open('addstudent.php','addstudent',"width=800,height=500,left=200,top=200");
                        }
            function edit()
                    {
                        popupWindow = window.open('editstudent.php','name','width=200,height=200');
                    }
                

                        function myfilter() {
                  var input,input1, filter,filter1, table, tr, td2, i,td4,td3;
                    input1 = document.getElementById("course");
                
                filter1 = input1.value.toUpperCase();                    
                  // Loop through all table rows, and hide those who don't match the search query
               
                  input = document.getElementById("sem");
                    
                filter = input.value.toUpperCase();
                    
                  table = document.getElementById("myTable");
                  tr = table.getElementsByTagName("tr");
                    
                  // Loop through all table rows, and hide those who don't match the search query
                  for (i = 0; i < tr.length; i++) {
                    td3 = tr[i].getElementsByTagName("td")[3];
                    td4 = tr[i].getElementsByTagName("td")[4];

                    if (td3) {
                      if (td3.innerHTML.toUpperCase().indexOf(filter) > -1 && td4.innerHTML.toUpperCase().indexOf(filter1) > -1) {
                            tr[i].style.display = "";
                      }
                        else {
                        tr[i].style.display = "none";
                          }
                        }
                    }
                    
                        }
            
            function deleterow(delid){
                if(confirm("Do you really want to delete this row????")){
                    window.location.href="deleteme.php?del_id="+delid+"";
                    return true;
                }
            }
            function editrow(editid){
             window.location.href="editme.php?roll_no="+editid+"";
                return true;
            }
            
            function rowselector(sessionals){
                var rollno=[];
                var url=new URL("http://studentsdetainedlist-com.stackstaging.com/makepdf.php?");
          <?php 
                include("documents/conn.php");             
                $sql = "SELECT * FROM student_data";
                         $result = $conn->query($sql);
                   while ($row = $result->fetch_assoc()){     
                    
                ?>
            
                if(document.getElementById("mycheckbox[<? echo $row['rollno']; ?>]").checked==true){
                    rollno.push(<? echo $row['rollno']; ?>);
                        }
                                    <?    } ?>
                var json=JSON.stringify(rollno);
                url.searchParams.set("roll_id",json);
                url.searchParams.set("sessionals",sessionals);
                window.open(url);
                       }
                
        </script>
   
    </body>    
</head>
</html>        
