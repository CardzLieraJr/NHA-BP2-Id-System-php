<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel= "stylesheet" href="datatables.min.css">

    <script type="text/javascript" src="./assets/js/datatables.min.js"> </script>

    <script>
        $(document).ready(function(){

            $('#table').DataTable({
                select: true,
                dom: 'lasdaBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'print', 'pdf', 'colvis'
                
                ]
            });

        });
    </script>
    
    <title>Individual Profile of bp2 applicant</title>
</head>
<body>

<h1 style="text-align:center">Balik Probinsya, Bagong Pag-asa (BP2) </h1>
    
<table id="table" style="width:100%;" border="1">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Batch</th>
            <th>Application Id</th>
            <th>Fullname</th>
            <th>Address</th>
            <th>Contact Number</th>
            <th>Destination</th>
            <th>Family Members</th>
            <th>Application Status</th>
            <th>Remarks</th>
            <th>Action</th> 
        </tr>
    </thead>

        <tbody>

        <!-- form select php  -->
            
            <?php
           include("../php/db_procedural.php"); 
          
            
            $sql = "SELECT * FROM members_status";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {

                    $avatar = $row["bb2_membersphoto"];	

                    echo "<tr>";
                        echo "<td> <img src='$avatar' onerror=this.src='../camera/avatar.webp' width='50' height='30'> </td>";
                        echo "<td>" .$row["bb2_batch"]. "</td>";
                        echo "<td>" .$row["bb2_app_id"]. "</td>";
                        echo "<td> ".$row["bb2_fn"]." ".$row ["bb2_mn"]."  " .$row["bb2_ln"]." ".$row["bb2_sfx"]." </td>";
                        echo "<td> ".$row["bb2_city"]." </td>";
                        echo "<td>" .$row["bb2_cn"]. "</td>";
                        echo "<td>" .$row["bb2_desmunic"].", ".$row["bb2_desprov"]."</td>";
                        echo "<td>" .$row["bb2_fam_count"]. "</td>";
                        echo "<td>" .$row["bb2_appstatus"]. "</td>";
                        echo "<td>" .$row["bb2_remarks"]. "</td>";
                        echo "<td><a href='pid.php?id=".$row["bb2_id"]."'>ID</a> | <a href='camera.php?id=".$row["bb2_id"]."'>CAMERA</a> | <a href='bp2_indi_data.php?id=".$row["bb2_app_id"]."'>VIEW</a> | <a href='update.php?id=".$row["bb2_id"]."'>NOTE</a> | <a href='update.php?id=".$row["bb2_id"]."'>UPDATE</a> | <a href='javascript:void(0)' onClick='deleteThis(".$row['bb2_id'].")'>DELETE</a> </td>";
                    echo "</tr>";
                    echo "<script>
                            function deleteThis(delid)
                            {
                                if(confirm('Do you want to delete this Record?'))
                                {
                                    window.location.href='delete.php?del=' +delid+'';
                                    return true;
                                }
                            }
                            </script>
                    
                    ";
                }
            } else {
                echo "0 results";
            }

            mysqli_close($conn);
            ?>

        </tbody>        
</table>



<?php
include("../php/db_procedural.php"); 
?>


<div>
        <h1>Import Database</h1>
        <form method="post" action="file-uploadmember.php" enctype="multipart/form-data">
            <input type="file" name="uploadfile">
            <input type="submit" name="submit" >
        </form>

</div>

</body>
</html>