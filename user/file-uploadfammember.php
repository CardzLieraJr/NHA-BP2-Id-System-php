<?php
include 'database.php';

$uploadfile=$_FILES['uploadfile']['tmp_name'];

require 'PHPExcel/Classes/PHPExcel.php';
require_once 'PHPExcel/Classes/PHPExcel/IOFactory.php';

$objExcel=PHPExcel_IOFactory::load($uploadfile);
foreach($objExcel->getWorksheetIterator() as $worksheet)
{
	$highestrow=$worksheet->getHighestRow();

	for($row=0;$row<=$highestrow;$row++)
	{
		$bb2_app_id=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
		$fam_fulln=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
		$fam_age=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
		$fam_relat=$worksheet->getCellByColumnAndRow(3,$row)->getValue();


		if($bb2_app_id!='')
		{
			$insertqry="INSERT INTO `fam_members_apps` (`bb2_app_id`, `fam_fulln`, `fam_age`, `fam_relat`) 
			VALUES 
			(
				'$bb2_app_id',
				'$fam_fulln',
				'$fam_age',
				'$fam_relat'

			)";
			$insertres=mysqli_query($con,$insertqry);
		}
	}
}
header('Location: success.php');
?>




