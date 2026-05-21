<?php

	//Sercurity Purposes
	function update_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
    
	include("../php/db_procedural.php"); 

	$id = $_GET["id"];
	$sql = "SELECT * FROM members_status WHERE bb2_app_id = '$id'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) 
		{
			// output data of each row
			while($row = mysqli_fetch_assoc($result))
				{

					$bb2_membersphoto_print  			    = $row["bb2_membersphoto"];
          $bb2_app_id_print 			          = $row["bb2_app_id"];
					$bb2_desprov_print 			          = $row["bb2_desprov"];
          $bb2_desmunic_print 			        = $row["bb2_desmunic"];
          $bb2_prostreetadd_print 			    = $row["bb2_prostreetadd"];
          $bb2_batch_print 			            = $row["bb2_batch"];
          $bb2_fn_print 			              = $row["bb2_fn"];
          $bb2_mn_print 			              = $row["bb2_mn"];
          $bb2_ln_print 			              = $row["bb2_ln"];
          $bb2_sfx_print 			              = $row["bb2_sfx"];
          $bb2_cn_print 			              = $row["bb2_cn"];
          $bb2_datebirthm_print 			      = $row["bb2_datebirthm"];
          $bb2_datebirthd_print 			      = $row["bb2_datebirthd"];
          $bb2_datebirthy_print 			      = $row["bb2_datebirthy"];
          $bb2_age_print 			              = $row["bb2_age"];
          $bb2_sex_print 			              = $row["bb2_sex"];
          $bb2_civil_print 			            = $row["bb2_civil"];
          $bb2_blood_print 			            = $row["bb2_blood"];
          $bb2_ethn_print 			            = $row["bb2_ethn"];
          $bb2_add_print 			              = $row["bb2_add"];
          $bb2_techskill_print 			        = $row["bb2_techskill"];
          $bb2_othernewskill_print 			    = $row["bb2_othernewskill"];
          $bb2_newkillspursue_print 		    = $row["bb2_newkillspursue"];
          $bb2_othernewskillpursue_print 		= $row["bb2_othernewskillpursue"];
          $bb2_financiallysupport_print 		= $row["bb2_financiallysupport"];
          $bb2_plcstay_print 		            = $row["bb2_plcstay"];
          $bb2_lndown_print 		            = $row["bb2_lndown"];
          $bb2_workpro_print 		            = $row["bb2_workpro"];
          $bb2_busspro_print 		            = $row["bb2_busspro"];
          $bb2_willnewskills_print 		      = $row["bb2_willnewskills"];
          $bb2_travel_print 		            = $row["bb2_travel"];
          $bb2_cper_print 		              = $row["bb2_cper"];
          $bb2_cpernum_print 		            = $row["bb2_cpernum"];
          $bb2_appstatus_print 		          = $row["bb2_appstatus"];
          $bb2_departdate_print 		        = $row["bb2_departdate"];

          
				}

		} 
	else 
		{
			echo "0 results";
		}

	
  $id = $_GET["id"];
	$sql = "SELECT COUNT(bb2_app_id) FROM fam_members_apps WHERE bb2_app_id = '$id'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) 
		{
			// output data of each row
			while($row = mysqli_fetch_assoc($result))
				{
          $bb2_id_print  = $row["COUNT(bb2_app_id)"];
				}

		} 
	else 
		{
			echo "0 results";
		}

    


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>BALIK PROBINSYA, BAGONG PAG-ASA APPLICANT PROFILE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    * 
      {
        font-family: my_font6;
      }


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
        text-transform: uppercase;;
       
      }
      
      body
      {
        margin: 25mm 25mm 25mm 25mm;
      }

  }

</style>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

</head>
<body>

<div class="container-fluid">



    <div class="row">
      <div class="col-sm-12" style="background-color: #357485;
      color: white;
      text-transform: uppercase;
      height: 46px;
      line-height: 43px;;">Profile</div>
    </div>

    <br>

    <img src="img/1200px-Balik_Probinsya_program_logo.webp" style="position: absolute;">


    <div class="container-fluid" >
      <div class="row" >
        <div class="col-sm-4">Applicant</div>
        <div class="col-sm-4" ><?php echo  $bb2_app_id_print; ?></div>
        <div class="col-sm-4"><img onerror="this.src='../camera/avatar.webp'" style="    margin-bottom: -175px;
    position: relative;
    left: 50px;
    width: 281px;
    height: 209px;" src="<?php echo $bb2_membersphoto_print; ?>" ></div>
        <input type="hidden"  id="content" value="<?php echo  $bb2_app_id_print; ?>" placeholder="Enter content">
      </div>
    </div>
    <div class="container-fluid" >
      <div class="row" >
        <div class="col-sm-4">Province</div>
        <div class="col-sm-4"><?php echo  $bb2_desprov_print; ?></div>
        <div class="col-sm-4"><img style="margin-bottom: -290px;position: relative;left: 50px;top: 155px;width: 280px;margin-top: 30px;" class="qr-code" src="https://chart.googleapis.com/chart?cht=qr&chl=Balik+Probinsya&chs=160x160&chld=L|0" ></div>
      </div>
    </div>  
    <div class="container-fluid" >
      <div class="row" >
        <div class="col-sm-4">Municipality</div>
        <div class="col-sm-4"><?php echo  $bb2_desmunic_print; ?></div>
      </div>
    </div>  
    <div class="container-fluid" >
      <div class="row" >    
        <div class="col-sm-4">BRGY/VILLAGE/ZONE</div>
        <div class="col-sm-4"><?php echo $bb2_prostreetadd_print; ?></div>
      </div>
    </div>  
    <div class="container-fluid" >
      <div class="row" >
        <div class="col-sm-4">Batch</div>
        <div class="col-sm-4"><?php echo $bb2_batch_print; ?></div>
      </div>
    </div>
      <br>

      <div class="row">
        <div class="col-sm-8" style="    background-color: #357485;
        text-transform: uppercase;
        color: white;
        text-align: center;">Basic Infomation</div>
      </div>
      <br>


      <div class="container-fluid" >
        <div class="row" >
          <div class="col-sm-4">First Name</div>
          <div class="col-sm-4"><?php echo $bb2_fn_print.' '. $bb2_sfx_print; ?></div>
        </div>
      </div>
      <div class="container-fluid" >
        <div class="row" >
          <div class="col-sm-4">Middle Name</div>
          <div class="col-sm-4"><?php echo $bb2_mn_print;  ?></div>
        </div>
      </div>  
      <div class="container-fluid" >
        <div class="row" >
          <div class="col-sm-4">Last Name</div>
          <div class="col-sm-4"><?php echo $bb2_ln_print; ?></div>
        </div>
      </div>  
      <div class="container-fluid" >
        <div class="row" >    
          <div class="col-sm-4">Contact Number</div>
          <div class="col-sm-4"><?php echo $bb2_cn_print; ?></div>
        </div>
      </div>  
      <div class="container-fluid" >
        <div class="row" >
          <div class="col-sm-4">Birth Date</div>
          <div class="col-sm-4"> <?php echo $bb2_datebirthm_print .' '. $bb2_datebirthd_print .', '. $bb2_datebirthy_print ;  ?> </div>
        </div>
      </div>
      <div class="container-fluid" >
        <div class="row" >
          <div class="col-sm-4">Age</div>
          <div class="col-sm-4"><?php echo $bb2_age_print; ?></div>
        </div>
      </div>
      <div class="container-fluid" >
        <div class="row" >
          <div class="col-sm-4">Sex</div>
          <div class="col-sm-4"><?php echo $bb2_sex_print; ?></div>
        </div>
      </div>
      <div class="container-fluid" >
        <div class="row" >
          <div class="col-sm-4">Civil Status</div>
          <div class="col-sm-4"><?php echo  $bb2_civil_print; ?></div>
        </div>
      </div>
      <div class="container-fluid" >
        <div class="row" >
          <div class="col-sm-4">Blood Type</div>
          <div class="col-sm-4"><?php echo  $bb2_blood_print; ?></div>
        </div>
      </div>
      <div class="container-fluid" >
        <div class="row" >
          <div class="col-sm-4">Ethnicity</div>
          <div class="col-sm-4"><?php echo  $bb2_ethn_print; ?></div>
        </div>
      </div>
      <div class="container-fluid" >
        <div class="row" >
          <div class="col-sm-4">Present Address</div>
          <div class="col-sm-4"><?php echo $bb2_add_print; ?></div>
        </div>
      </div>

        <br>

        <div class="row">
          <div class="col-sm-8" style="    background-color: #357485;
    text-transform: uppercase;
    color: white;
    text-align: center;">Skills and Assessments</div>
        </div>
        <br>

        <div class="container-fluid" >
          <div class="row" >
            <div class="col-sm-4">Technical skills</div>
            <div class="col-sm-4"><?php echo $bb2_techskill_print; ?></div>
          </div>
        </div>
        <div class="container-fluid" >
          <div class="row" >
            <div class="col-sm-4">Other Technical skills</div>
            <div class="col-sm-4"><?php echo $bb2_othernewskill_print; ?></div>
          </div>
        </div>  
        <div class="container-fluid" >
          <div class="row" >
            <div class="col-sm-4">New skills to pursue</div>
            <div class="col-sm-4"><?php echo $bb2_newkillspursue_print; ?></div>
          </div>
        </div>  
        <div class="container-fluid" >
          <div class="row" >    
            <div class="col-sm-4">Other skills to pursue</div>
            <div class="col-sm-4"><?php echo $bb2_othernewskillpursue_print; ?></div>
          </div>
        </div>  
        <div class="container-fluid" >
          <div class="row" >
            <div class="col-sm-4">What they intend to do in the province to financially support their family</div>
            <div class="col-sm-4"><?php echo $bb2_financiallysupport_print; ?></div>
          </div>
        </div>
        <div class="container-fluid" >
          <div class="row" >
            <div class="col-sm-4">With place to stay in the province</div>
            <div class="col-sm-4"><?php echo $bb2_plcstay_print; ?></div>
          </div>
        </div>
        <div class="container-fluid" >
          <div class="row" >
            <div class="col-sm-4">With work in the province</div>
            <div class="col-sm-4"><?php echo  $bb2_workpro_print; ?></div>
          </div>
        </div>
        <div class="container-fluid" >
          <div class="row" >
            <div class="col-sm-4">With bussiness in the province</div>
            <div class="col-sm-4"><?php echo  $bb2_busspro_print; ?></div>
          </div>
        </div>
        <div class="container-fluid" >
          <div class="row" >
            <div class="col-sm-4">Willing to be trained</div>
            <div class="col-sm-4"><?php echo $bb2_willnewskills_print;?></div>
          </div>
        </div>
          <br>
          <div class="row">
            <div class="col-sm-8" style="    background-color: #357485;
    text-transform: uppercase;
    color: white;
    text-align: center;">Other Information /To Travel</div>
          </div>
          <br>
          <div class="container-fluid" >
            <div class="row" >
              <div class="col-sm-4">To travel</div>
              <div class="col-sm-4"><?php echo $bb2_travel_print; ?></div>
            </div>
          </div>
          <div class="container-fluid" >
            <div class="row" >
              <div class="col-sm-4">Family member/s</div>
              <div class="col-sm-4"><?php echo  $bb2_id_print; ?></div>
            </div>
          </div>
          <div class="container-fluid" >
            <div class="row" >
              <div class="col-sm-4">Contact Person</div>
              <div class="col-sm-4"><?php echo $bb2_cper_print; ?></div>
            </div>
          </div>
          <div class="container-fluid" >
            <div class="row" >
              <div class="col-sm-4">Contact Person's Number</div>
              <div class="col-sm-4"><?php echo $bb2_cpernum_print;  ?></div>
            </div>
          </div>
          <div class="container-fluid" >
            <div class="row" >
              <div class="col-sm-4">Status</div>
              <div class="col-sm-4"><?php echo $bb2_appstatus_print; ?></div>
            </div>
          </div>
          <div class="container-fluid" >
            <div class="row" >
              <div class="col-sm-4">Departure Date</div>
              <div class="col-sm-4"><?php echo $bb2_departdate_print ; ?></div>
            </div>
          </div>
          <br>

          <div class="row">
            <div class="col-sm-8" style="    background-color: #357485;
    text-transform: uppercase;
    color: white;
    text-align: center;">Family Members</div>
          </div>

          <div class="container-fluid" >

            <div class="row" >
              <div class="col-sm-4">Full Name</div>
              <div class="col-sm-1">Age</div>
              <div class="col-sm-3">Relationship</div>
            </div>
            
          </div>


          <?php

          $sql = "SELECT * FROM fam_members_apps WHERE bb2_app_id = '$id'";
          $results = mysqli_query($conn, $sql);

          if (mysqli_num_rows($results) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($results)) {

                    echo "<div class='container-fluid'>";
                      echo "<div class='row' >";
                        echo "<div class='col-sm-4'>" .$row["fam_fulln"]. "</div>";
                        echo "<div class='col-sm-1'>" .$row["fam_age"]. "</div>";
                        echo "<div class='col-sm-3'>" .$row["fam_relat"]. "</div>";
                        echo "</div>";
                      echo "</div>";
                        
                    
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
                echo "N/A";
            }

            ?>


       
            <?php include('footer.php') ?>
       

   
  </div>
</div>

<script>

function htmlEncode (value){
  return $('<div/>').text(value).html();
}

$(function() {
  $(document).ready(function() {
    $(".qr-code").attr("src", "https://chart.googleapis.com/chart?cht=qr&chl=" + htmlEncode($("#content").val()) + "&chs=160x160&chld=L|0");
  });
});

</script>

</body>
</html>
