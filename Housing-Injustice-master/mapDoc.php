
<?php
	include 'dbcon.php';
	ini_set('memory_limit', '256M');
	$search=(isset($_POST['s']) ? $_POST['s'] : 'hi');
	
	$db=mysqli_query($con, "SELECT * FROM `fulton_parcels_v1` Where Address=$search ") or die(mysqli_error($con));
	if($db->num_rows){
		$results = array();
		$i=0;
		while(($row = mysqli_fetch_array($db)) && $i!=5)
		{
			$results[$i] = array(
				'PID' => $row['PID'],
				'ParcelID' => $row['ParcelID'],
				'Address' => $row['Address'],
				'Owner'=> $row['Owner'],
				'OwnerAddr1'=> $row['OwnerAddr1'], 
				'OwnerAddr2'=> $row['OwnerAddr2'], 
				'TaxDist'=> $row['TaxDist'],
				'TotAssess'=> $row['TotAssess'],
				'LandAssess'=> $row['LandAssess'],
				'ImprAssess'=> $row['ImprAssess'],
				'TotAppr'=> $row['TotAppr'], 
				'LandAppr'=> $row['LandAppr'], 
				'ImprAppr'=> $row['ImprAppr'],
				'LUCode'=> $row['LUCode'], 
				'ClassCode'=> $row['ClassCode'], 
				'ExCode'=> $row['ExCode'], 
				'LandAcres'=> $row['LandAcres'],
				'X'=> $row['X'],
				'Y'=> $row['Y'], 
				'ZCTA5CE10'=> $row['ZCTA5CE10'], 
				'NPU'=> $row['NPU'], 
				'NAME'=> $row['NAME'], 
				'OLD_NAME'=> $row['OLD_NAME'], 
				'ATLANTA.HOMESTEAD.EXEMPTION.CODE'=> $row['ATLANTA.HOMESTEAD.EXEMPTION.CODE'],
				'FULTON.HOMESTEAD.EXEMPTION.CODE'=> $row['FULTON.HOMESTEAD.EXEMPTION.CODE'],
				'YrBlt'=> $row['YrBlt'], 
				'AreaSF'=> $row['AreaSF'], 
				'TotRooms'=> $row['TotRooms'], 
				'TotBed'=> $row['TotBed'], 
				'FixBath'=> $row['FixBath'], 
				'build_type'=> $row['FixBath'], 
				'HarbourPresent'=> $row['HarbourPresent'], 
				'HarbourPast'=> $row['HarbourPast'], 
				'Owner_Occupant'=> $row['Owner_Occupant'], 
				'Lien_present'=> $row['Lien_present']
			);
			$i++;
		}
		$json = json_encode($results);
		echo $json;
		mysqli_free_result($db);
	}
	else{
		$error="$search: The address you typed was not found. Please try again!";
		echo $error;
	}
	$_POST['s']="";
	mysqli_close($con);
	
?>