
<?php
	//include connection file 
	include_once("connection.php");
	
	$db = new dbObj();
	$connString =  $db->getConnstring();

	$params = $_REQUEST;
	
	$action = isset($params['action']) != '' ? $params['action'] : '';
	$empCls = new Pergunta($connString);

	switch($action) {
	 case 'add':
		$empCls->insertPergunta($params);
	 break;
	 case 'edit':
		$empCls->updatePergunta($params);
	 break;
	 case 'delete':
		$empCls->deletePergunta($params);
	 break;
	 default:
	 $empCls->getPerguntas($params);
	 return;
	}
	
	class Pergunta {
	protected $conn;
	protected $data = array();
	function __construct($connString) {
		$this->conn = $connString;
	}
	
	public function getPerguntas($params) {
		
		$this->data = $this->getRecords($params);
		
		echo json_encode($this->data);
	}
	function insertPergunta($params) {
		$data = array();;
		// $sql = "INSERT INTO `employee` (employee_name, employee_salary, employee_age) VALUES('" . $params["name"] . "', '" . $params["salary"] . "','" . $params["age"] . "');  ";
    $sql = "INSERT INTO `perguntas` (pergunta, resposta_certa, resposta_errada, feedback_certo, feedback_errado) VALUES('" . $params["nova_pergunta"] . "', '" . $params["nova_resposta_certa"] . "','" . $params["nova_resposta_errada"] . "', '" . $params["novo_feedback_certo"] . "', '" . $params["novo_feedback_errado"] . "');  ";

		echo $result = mysqli_query($this->conn, $sql) or die("Erro ao inserir ou editar as perguntas");
		
	}
	
	
	function getRecords($params) {
		$rp = isset($params['rowCount']) ? $params['rowCount'] : 10;
		
		if (isset($params['current'])) { $page  = $params['current']; } else { $page=1; };  
        $start_from = ($page-1) * $rp;
		
		$sql = $sqlRec = $sqlTot = $where = '';
		
		if( !empty($params['searchPhrase']) ) {   
			$where .=" WHERE ";
			$where .=" ( pergunta LIKE '".$params['searchPhrase']."%' ";    
			$where .=" OR resposta_certa LIKE '".$params['searchPhrase']."%' ";
			$where .=" OR resposta_errada LIKE '".$params['searchPhrase']."%' )";
			$where .=" OR feedback_certo LIKE '".$params['searchPhrase']."%' )";
			$where .=" OR feedback_errado LIKE '".$params['searchPhrase']."%' )";
	   }
	   if( !empty($params['sort']) ) {  
			$where .=" ORDER By ".key($params['sort']) .' '.current($params['sort'])." ";
		}
	   // getting total number records without any search
		$sql = "SELECT * FROM `perguntas` ";
		$sqlTot .= $sql;
		$sqlRec .= $sql;
		
		//concatenate search sql if value exist
		if(isset($where) && $where != '') {

			$sqlTot .= $where;
			$sqlRec .= $where;
		}
		if ($rp!=-1)
		$sqlRec .= " LIMIT ". $start_from .",".$rp;
		
		
		$qtot = mysqli_query($this->conn, $sqlTot) or die("error to fetch tot pergunta data");
		$queryRecords = mysqli_query($this->conn, $sqlRec) or die("error to fetch pergunta data");
		
		while( $row = mysqli_fetch_assoc($queryRecords) ) { 
			$data[] = $row;
		}

		$json_data = array(
			"current"            => intval($params['current']), 
			"rowCount"            => 10, 			
			"total"    => intval($qtot->num_rows),
			"rows"            => $data   // total data array
			);
		
		return $json_data;
	}
	function updatePergunta($params) {
		$data = array();
    //print_R($_POST);die;
		$sql = "Update `perguntas` set pergunta = '" . $params["editar_pergunta"] . "', resposta_certa='" . $params["editar_resposta_certa"]."', resposta_errada='" . $params["editar_resposta_errada"]."', feedback_certo='" . $params["editar_feedback_certo"] . "', feedback_errado='" . $params["editar_feedback_errado"] . "' WHERE id='".$_POST["editar_id"]."'";
		
		echo $result = mysqli_query($this->conn, $sql) or die("error to update Pergunta data");
	}
	
	function deletePergunta($params) {
		$data = array();
		//print_R($_POST);die;
		$sql = "delete from `perguntas` WHERE id='".$params["id"]."'";
		
		echo $result = mysqli_query($this->conn, $sql) or die("Erro ao deletar a pergunta");
	}
}
?>
	