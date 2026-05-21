<?php 

  function update_input($data) 
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
  
  include("../php/db_procedural.php"); 

  $id = $_GET["id"];
  $sql = "SELECT * FROM members_status WHERE bb2_id = $id";
  $result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) 
  {
    // output data of each row
    while($row = mysqli_fetch_assoc($result))
      {

        $bb2_membersphoto_view 		= $row["bb2_membersphoto"];
        $bb2_fn_view  			      = $row["bb2_fn"];
        $bb2_mn_view 			        = $row["bb2_mn"];
        $bb2_ln_view 			        = $row["bb2_ln"];
        $bb2_sfx_view 			      = $row["bb2_sfx"];
        $bb2_app_id_view	        = $row["bb2_app_id"];
        $bb2_desmunic_view		    = $row["bb2_desmunic"];
        $bb2_desprov_view			    = $row["bb2_desprov"];
        $bb2_datebirthm_view		  = $row["bb2_datebirthm"];
        $bb2_datebirthd_view		  = $row["bb2_datebirthd"];
        $bb2_datebirthy_view  		= $row["bb2_datebirthy"];
        $bb2_cn_view			        = $row["bb2_cn"];
        $bb2_blood_view 			    = $row["bb2_blood"];
        $bb2_civil_view 			    = $row["bb2_civil"];
        $bb2_cper_view  			    = $row["bb2_cper"];
        $bb2_cpernum_view			    = $row["bb2_cpernum"];
    		
      }

  } 
else 
  {
    echo "0 results";
  }

mysqli_close($conn);
?>




<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style>

            @font-face {
            font-family: my_font1;
            src: url(fonts/Roboto-Italic.ttf);
            }

            @font-face {
            font-family: my_font2;
            src: url(fonts/Roboto-Light.ttf);
            }

            @font-face {
            font-family: my_font3;
            src: url(fonts/Roboto-LightItalic.ttf);
            }

            @font-face {
            font-family: my_font4;
            src: url(fonts/Roboto-Medium.ttf);
            }

            @font-face {
            font-family: my_font5;
            src: url(fonts/Roboto-MediumItalic.ttf);
            }

            @font-face {
            font-family: my_font6;
            src: url(fonts/Roboto-Regular.ttf);
            }

            @font-face {
            font-family: my_font7;
            src: url(fonts/Roboto-Thin.ttf);
            }

            @font-face {
            font-family: my_font8;
            src: url(fonts/Roboto-ThinItalic.ttf);
            }

            @font-face {
            font-family: my_font9;
            src: url(fonts/Roboto-Bold.ttf);
            }

            @font-face {
            font-family: my_font10;
            src: url(fonts/Roboto-BoldItalic.ttf);
            }

            @font-face {
            font-family: my_font11;
            src: url(fonts/Roboto-white.ttf);
            }

            @font-face {
            font-family: my_font12;
            src: url(fonts/Roboto-white.ttf);
            }


            *
            {
              font-family: my_font9;
             
            }
            
            body
            {
              margin: 25mm 25mm 25mm 25mm;
            }


  </style>


  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid" style="width:114px;">


    <div class="row">
      <div class="col-sm-8" style="margin-top: 52px;
    margin-left: -19px;">
        <img onerror="this.src='../camera/avatar.webp'" src="<?php echo $bb2_membersphoto_view; ?>" width="120" height="120" style="     position: relative;
    top: 145px;
    left: -304px;
    margin-bottom: -197px;
    width: 205px;
    height: 210px;">

        <div style="position: relative;top: -325px;left: 215px;">

            <h1 style="    position: relative;
    top: 742px;
    left: -588px;
    margin-bottom: -96px;
    font-size: 16px;
    text-align: center;
    width: 302px;

    "><?php echo $bb2_fn_view.' '. $bb2_mn_view.' '.$bb2_ln_view.' '.$bb2_sfx_view; ?></h1>


<h1 style="    position: relative;
    top: 854px;
    left: -588px;
    margin-bottom: -43px;
    font-size: 16px;
    width: 301px;
    text-align: center;

"><?php echo $bb2_app_id_view;?></h1>

<h1 style="position: relative;
    top: 911px;
    left: -588px;
    width: 338px;
    margin-bottom: -33px;
    font-size: 16px;
    text-align: center;

"><?php echo $bb2_desmunic_view.' '.$bb2_desprov_view	?></h1>



<h1 style="position: relative;
    top: 949px;
    left: -588px;
    width: 300px;
    margin-bottom: -14px;
    font-size: 16px;
    margin-top: 10px;
    text-align: center;



"><?php echo $bb2_datebirthm_view.' '.$bb2_datebirthd_view.' '.$bb2_datebirthy_view;	?></h1>



<h1 style="    position: relative;
    top: 963px;
    left: -588px;
    width: 301px;

    font-size: 16px;
    margin-top: 16px;
    text-align: center;


"><?php echo $bb2_cn_view; ?>		</h1>

</div>

  <img src="img/front_final.webp" style="float: right; width: 500px;">
            
            
</div>


      <div class="col-sm-8" style="    position: relative;
    margin-top: -674px;
    margin-left: 30px;
    
">
<div style="position: relative;
    top: -89px;
    left: -99px;">

      <h1 style=" position: relative;
    top: 270px;
    left: 225px;
    width: 243px;
    margin-bottom: -58px;
    color: white;
    font-size: 16px;
    text-align: center;

"><?php echo $bb2_blood_view; ?></h1>


<h1 style="

position: relative;
    top: 342px;
    left: 224px;
    width: 244px;
    margin-bottom: -25px;
    color: white;
    font-size: 16px;
    text-align: center;


"><?php echo $bb2_civil_view;?></h1>

<h1 style="    position: relative;
    top: 383px;
    left: 224px;
    width: 245px;
    margin-bottom: -43px;
    color: white;
    font-size: 16px;
    text-align: center;
};


"><?php echo $bb2_cper_view; ?></h1>

<h1 style="     position: relative;
    top: 441px;
    left: 224px;
    width: 245px;

    color: white;
    font-size: 16px;
    text-align: center;
"><?php echo   $bb2_cpernum_view	?></h1>


</div>
            <img src="img/back_final.webp" style="float: left;    width: 500px;" > 
      </div>
    </div>
    <br>
    

</div>

</body>
</html>
