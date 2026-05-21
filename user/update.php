<?php
// update
if ($_SERVER["REQUEST_METHOD"] == "POST") //Sercurity Purposes
{
include("../php/db_procedural.php"); 



// img update
$target_dir = "camera/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
        $target_file = $_POST["clone_input"];
    }
}
// Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    $target_file = $_POST["clone_input"];
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    $target_file = $_POST["clone_input"];
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

// Details update

$id      = $_POST["id"];
$sql = "UPDATE members_status SET  bb2_membersphoto='$target_file' WHERE bb2_id=$id";

if (mysqli_query($conn, $sql)) {
    // echo "Record updated successfully";
    header("location: success.php");
} else {
    echo "Error updating record: " . mysqli_error($conn);
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



//   select

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

 <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data"> 
   <!-- Clone Input Value -->
    <input name="id" type="hidden" value="<?php echo $id; ?>">
    <input name="clone_input" type="hidden" value="<?php echo $bb2_membersphotoupdate; ?>">

 
    <br/>Image 

    <br/><br/>
    Change Profile:
    
    <input type="file" name="fileToUpload">

    <input type="submit" name="submit">
    </form>
    
</body>
</html>