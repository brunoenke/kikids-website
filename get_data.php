<?php

$grafico = [
    ['nome', 'score']
  ];


//crio um array auxiliar
$array_auxiliar = [];

require_once("db_conectar.php");

$sql = "SELECT employee_name, employee_salary FROM employee";
$stmt = $conexao->prepare($sql);
$stmt->execute();

//esse while irá retornar duas linhas (conforme sua foto)
while ($obj = $stmt->fetchObject()){

    //coloco o titulo para saidas (que na sua foto representa o texto)
    $array_auxiliar[0] = $obj->employee_name;
    //coloco o valor para saidas (que na sua foto representa o valor)
    $array_auxiliar[1] = (int)$obj->employee_salary;

    //adiciono em gráfico o array com os dados e o titulo saida.
    $grafico[] =  $array_auxiliar;

}

// Enviar dados na forma de JSON
echo json_encode($grafico);

?>