<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") //Sercurity Purposes
{
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "codesinquries";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // upload image

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    // if(isset($_POST["submit"])) {
    //     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    //     if($check !== false) {
    //         echo "File is an image - " . $check["mime"] . ".";
    //         $uploadOk = 1;
    //     } else {
    //         echo "File is not an image.";
    //         $uploadOk = 0;
    //     }
    // }
    // Check if file already exists

    if (empty($target_file)) {
        $target_file = "uploads/avatar.png";
    }
    
    // if (file_exists($target_file)) {
    //     echo "Sorry, file already exists.";
    //     $uploadOk = 0;
    //     $target_file = "uploads/avatar.png";
    // }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 900000) {
        echo "Sorry, your file is too large.";
        // $uploadOk = 0;
        $target_file = "uploads/avatar.png";
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        // $uploadOk = 0;
        $target_file = "uploads/avatar.png";
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



    //Var

    $fname   = test_input($_POST["txtfname"]);
    $company = test_input($_POST["txtcompany"]);
    $email   = test_input($_POST["txtemail"]);
    $contact = test_input($_POST["txtcontact"]);
    $inq     = test_input($_POST["txtinquiries"]);
    
    $sql = "INSERT INTO clientinquired (inqName, inqCompany, inqEmail, inqContact, inqMessage, image_profile)
    VALUES ('$fname', '$company', ' $email', '$contact', '$inq', '$target_file')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script> alert('INQUIRIES WAS SUCCESSFULLY SENT...THANK YOU!');</script>";
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
    Name: <input type="text" name="txtfname">
    Company: <input type="text" name="txtcompany">
    Email: <input type="text" name="txtemail">
    Contact: <input type="text" name="txtcontact">
    Inquiries: <input type="text" name="txtinquiries">

    <br/><br/>
    <input type="file" name="fileToUpload" id="fileToUpload">

    <input type="submit" name="submit">
    </form>

</body>
</html>