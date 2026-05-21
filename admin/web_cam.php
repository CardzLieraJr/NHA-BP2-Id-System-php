<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") //Sercurity Purposes
{
    include("../php/db_procedural.php"); 

    if(isset($_POST["mydata"])) {
        define('UPLOAD_DIR', '');
        $encoded_data = $_POST['mydata'];
        $img          = str_replace('data:image/jpeg;base64,', '', $encoded_data );
        $data         = base64_decode($img);
        $file_name    = 'camera/image_' .date('Y-m-d-H-i-s', time()) . '.png' ; // You can change it to anything
        $file         = UPLOAD_DIR . $file_name ;
        $success      = file_put_contents($file, $data);
    }


        $id      = $_POST["id"];
     
        $sql = "UPDATE members_status SET  bb2_membersphoto='$file_name' WHERE bb2_id=$id";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script> alert('SNAPSHOT WAS SUCCESSFULLY SAVE...THANK YOU!');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($conn);
    }

    // Sercurity Purposes
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }





include("../php/db_procedural.php"); 

$id = $_GET["id"];
$sql = "SELECT * FROM members_status WHERE bb2_id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {


$bb2_membersphotoupdate = $row["bb2_membersphoto"];

    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/69a21b7f83.js" crossorigin="anonymous"></script>

    <style>
        video {
            width: 1920px!important;
            height: 800px!important;
        }

    </style>
</head>


<body>

<a style="    text-align: center;
    font-size: 3rem;
    margin-left: 48%;
    text-decoration: none;
" href="index.php">Main</a>

<div style="max-width: 1920px; margin:auto;">




<div id="my_camera"></div>
<div id="results"></div>

<!-- First, include the Webcam.js JavaScript Library -->
<script type="text/javascript" src="js/webcam.min.js"></script>

<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 205,
        height: 210,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach('#my_camera');
</script>

<!-- A button for taking snaps -->

    <button type=button  onClick="take_snapshot()" style="    position: relative;
    top: 616px;
    left: 884px;width:100px;height:100px;"> SHOT</button>


    <form id="myform" method="post" action="" enctype="multipart/form-data">
        <input id="mydata" type="hidden" name="mydata" value=""/>

        <input name="id" type="hidden" value="<?php echo $id; ?>">
        <input name="clone_input" type="hidden" value="<?php echo $bb2_membersphotoupdate; ?>">
    </form>

    </div>

    <!-- Code to handle taking the snapshot and displaying it locally -->
    <script language="JavaScript">
        function take_snapshot() {
            // take snapshot and get image data
            Webcam.snap( function(data_uri) {
                // display results in page
                document.getElementById('results').innerHTML = 
                    '<h2>Here is your image:</h2>' + 
                    '<img src="'+data_uri+'"/>';

                    var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');

                    document.getElementById('mydata').value = raw_image_data;
                    document.getElementById('myform').submit();
            } 
            
            );
        }
    </script>


</body>
</html>