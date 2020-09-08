<?php
	header("Content-type: text/html; charset=utf-8");
  $result = array();
  include_once("../db_conectar.php");
  
//   $sql = "SELECT * FROM `jogadores` order by pontuacao DESC LIMIT 50";
  $sql = "SELECT * FROM `jogadores` LIMIT 100";
  
  $stmt = $conexao->prepare($sql);
  // $stmt->bindValue(':qtd', 10, PDO::PARAM_INT);
  // $stmt->bindValue(':ini', 0, PDO::PARAM_INT);
  if($stmt->execute()) {
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ($resultado as $campo) {
          // echo $campo['id'] . " - " . $campo['nome']." ". $campo ['pontuacao'] . '<br>';
          
          array_push($result, array("id"=> $campo['id'], "score"=>$campo['pontuacao'], "name" => $campo['nome']));
      }    
  } else {
      echo "Erro na consulta: " . $stmt->errorCode();
  }
  echo json_encode($result);

  $conexao=null; // fechar conexão;
  $stmt=null;
  $resultado=null; 

  // echo json_encode($this->data);
  ?>

