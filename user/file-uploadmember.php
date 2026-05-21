<?php include 'database.php';

$uploadfile=$_FILES['uploadfile']['tmp_name'];

require 'phpexcel/Classes/PHPExcel.php';
require_once 'phpexcel/Classes/PHPExcel/IOFactory.php';
$objExcel=PHPExcel_IOFactory::load($uploadfile);
foreach($objExcel->getWorksheetIterator() as $worksheet)
{
	$highestrow=$worksheet->getHighestRow();

	for($row=2;$row<=$highestrow;$row++)
	{
		$bb2_batch=$worksheet->getCellByColumnAndRow(0,$row)->getValue();
		$bb2_app_id=$worksheet->getCellByColumnAndRow(1,$row)->getValue();
		$bb2_ln=$worksheet->getCellByColumnAndRow(2,$row)->getValue();
		$bb2_fn=$worksheet->getCellByColumnAndRow(3,$row)->getValue();
		$bb2_mn=$worksheet->getCellByColumnAndRow(4,$row)->getValue();
		$bb2_sfx=$worksheet->getCellByColumnAndRow(5,$row)->getValue();
		$bb2_cn=$worksheet->getCellByColumnAndRow(6,$row)->getValue();
		$bb2_desprov=$worksheet->getCellByColumnAndRow(7,$row)->getValue();
		$bb2_desmunic=$worksheet->getCellByColumnAndRow(8,$row)->getValue();
		$bb2_datebirthm=$worksheet->getCellByColumnAndRow(9,$row)->getValue();
		$bb2_datebirthd=$worksheet->getCellByColumnAndRow(10,$row)->getValue();
		$bb2_datebirthy=$worksheet->getCellByColumnAndRow(11,$row)->getValue();
		$bb2_blood=$worksheet->getCellByColumnAndRow(12,$row)->getValue();
		$bb2_civil=$worksheet->getCellByColumnAndRow(13,$row)->getValue();
		$bb2_cper=$worksheet->getCellByColumnAndRow(14,$row)->getValue();
		$bb2_cpernum=$worksheet->getCellByColumnAndRow(15,$row)->getValue();

		if($bb2_batch!='')
		{
			
			$insertqry="INSERT INTO `members_status` 
			(
			`bb2_batch`, 
			`bb2_app_id`, 
			`bb2_ln`, 
			`bb2_fn`, 
			`bb2_mn`,
			`bb2_sfx`, 
			`bb2_cn`, 
			`bb2_desprov`, 
			`bb2_desmunic`,
			`bb2_datebirthm`, 
			`bb2_datebirthd`, 
			`bb2_datebirthy`, 
			`bb2_blood`, 
			`bb2_civil`, 
			`bb2_cper`, 
			`bb2_cpernum`
			) 
			
			VALUES 
			(
				'$bb2_batch',
				'$bb2_app_id',
				'$bb2_ln',
				'$bb2_fn',
				'$bb2_mn',
				'$bb2_sfx',
				'$bb2_cn',
				'$bb2_desprov',
				'$bb2_desmunic',
				'$bb2_datebirthm',
				'$bb2_datebirthd',
				'$bb2_datebirthy',
				'$bb2_blood',
				'$bb2_civil',
				'$bb2_cper',
				'$bb2_cpernum'

		
			
			)";
			
			$insertres=mysqli_query($con,$insertqry);
		}
	}
}
header('Location: success.php');
?>




