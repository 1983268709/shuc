<?php
require_once("config.php");

if($link){
	$senddata = array();

	if ($_GET['newstype']) {
		$newstype = $_GET['newstype'];
		$sql = "SELECT * FROM news WHERE newstype = '{$newstype}' order by id desc";
		mysqli_query($link,"SET NAMES utf8");
		$result = mysqli_query($link,$sql);

		//循环结果集，并把值赋给$senddata
		while ($row = mysqli_fetch_assoc($result)) {
			array_push($senddata, array(
				'id' => $row['id'],
				'newstype' => $row['newstype'],
				'newstitle' => $row['newstitle'],
				'newsimg' => $row['newsimg'],
				'newstime' => $row['newstime'],
				'newssrc' => $row['newssrc'],
				'onfocus' => $row['onfocus']
				));
		}
		//判断$senddata的长度, 确定结果集中是否有值
		if (count($senddata) > 0) {
				echo json_encode($senddata);
			}else{
				echo json_encode(array('newsdata'=>'null'));
			}
	}else{
		$sql = 'SELECT * FROM news order by id desc';
		mysqli_query($link,"SET NAMES utf8");
		$result = mysqli_query($link,$sql);

		//循环结果集，并把值赋给$senddata
		while ($row = mysqli_fetch_assoc($result)) {
			array_push($senddata, array(
				'id' => $row['id'],
				'newstype' => $row['newstype'],
				'newstitle' => $row['newstitle'],
				'newsimg' => $row['newsimg'],
				'newstime' => $row['newstime'],
				'newssrc' => $row['newssrc'],
				'onfocus' => $row['onfocus']
				));
		}
		//判断$senddata的长度, 确定结果集中是否有值
		if (count($senddata) > 0) {
				echo json_encode($senddata);
			}else{
				echo json_encode(array('newsdata'=>'null'));
			}
		}

}else{
	echo json_encode(array('success'=>'link false'));
}
mysqli_close($link);
?>