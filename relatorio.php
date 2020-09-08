<?php

$grafico = [
    ['nome', 'pontuacao']
  ];


//crio um array auxiliar
$array_auxiliar = [];

require_once("db_conectar.php");

$sql = "SELECT nome, pontuacao FROM jogadores order by pontuacao DESC LIMIT 10";
$stmt = $conexao->prepare($sql);
$stmt->execute();

//esse while irá retornar duas linhas (conforme sua foto)
while ($obj = $stmt->fetchObject()){

    //coloco o titulo para saidas (que na sua foto representa o texto)
    $array_auxiliar[0] = $obj->nome;
    //coloco o valor para saidas (que na sua foto representa o valor)
    $array_auxiliar[1] = (int)$obj->pontuacao;

    //adiciono em gráfico o array com os dados e o titulo saida.
    $grafico[] =  $array_auxiliar;

}

// Enviar dados na forma de JSON
// echo 
json_encode($grafico);

?>
<html>
  <head>
  <meta charset="UTF-8"/>
    <title>Placar de líderes</title>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable(<?php echo json_encode($grafico) ?>);

        var options = {
          title: 'Placar de líderes',
          // is3D: true,
          // 'width':900,
          // 'height':300,

        };

        var chart = new google.visualization.PieChart(document.getElementById('area_grafico'));

        chart.draw(data, options);
      }
    </script>
    
  </head>

  <?php include("cabecalho.php");?>
  <body>
  <div id="area_grafico" style="width: 800px; height: 500px;"></div>

  </body>
</html>
<?php include("rodape.php"); ?>