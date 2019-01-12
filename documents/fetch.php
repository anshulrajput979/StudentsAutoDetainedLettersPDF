<?php
include("conn.php");

 $sql = "SELECT * FROM student_data";
            $result = $conn->query($sql);
		while ($row = $result->fetch_assoc())
		{
			?><tr>
					<td><input style="font-size:24px margin-left:10px;" type="checkbox" id="mycheckbox"></td>
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
?>