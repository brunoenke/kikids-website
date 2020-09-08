<?php
	header("Content-type: text/html; charset=utf-8");
	
	//echo "[{\"id\":\"1\",\"name\":\"Pedro\"},{\"id\":\"2\",\"name\":\"Maria\"}]";
	
	// $sequential = array("Maria", "Pedro", "João");
	// echo json_encode($sequential);
	
	// $nonsequential = array("id"=>1, "name" => "Pedro");
	// echo json_encode($nonsequential);
	
	// $result = array(array("id"=>1, "name" => "Pedro"), array("id"=>2, "name" => "Maria"));
	// echo json_encode($result);
	
	$result = array();
	
	for ($i = 1; $i <= 20; $i++) {
		array_push($result, array("id"=>$i, "name" => "Aluno " . $i));
	}
	
	echo json_encode($result);
?>