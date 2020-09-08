<?php
	header("Content-type: text/html; charset=utf-8");
  $result = array();
  include_once("../db_conectar.php");
  
  $sql = "SELECT * FROM `perguntas`";
  
  $stmt = $conexao->prepare($sql);
  // $stmt->bindValue(':qtd', 10, PDO::PARAM_INT);
  // $stmt->bindValue(':ini', 0, PDO::PARAM_INT);
  if($stmt->execute()) {
      $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ($resultado as $campo) {
          // echo $campo['id'] . " - " . $campo['nome']." ". $campo ['pontuacao'] . '<br>';
          
          array_push($result, array("id"=> $campo['id'], "pergunta"=>$campo['pergunta'], "resposta_certa" => $campo['resposta_certa'], "resposta_errada" => $campo['resposta_errada'], "feedback_certo" => $campo['feedback_certo'], "feedback_errado" => $campo['feedback_errado']));
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
