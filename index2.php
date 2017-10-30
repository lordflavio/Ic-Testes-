<?php
require_once'MultiLayerPerceptron.php';

$client = new SoapClient("https://www3.bcb.gov.br/sgspub/JSP/sgsgeral/FachadaWSSGS.wsdl",
array('soap_version'=>SOAP_1_1,'location'=>'https://www3.bcb.gov.br/wssgs/services/FachadaWSSGS')
);



$array[0] = 1;

$value = $client->getValoresSeriesVO($array, "01/04/2017", "01/07/2017");

$data = array(); 
$cambio = array();

 for ($i = 0; $i < count($value[0]->valores); $i++) {
 
 		$data[$i] = $value[0]->valores[$i]->dia . "/". $value[0]->valores[$i]->mes. "/". $value[0]->valores[$i]->ano;
 		$cambio[$i] = $value[0]->valores[$i]->valor;
 }
 
 $json_data = json_encode($data, JSON_PRETTY_PRINT);
 $json_cambio = json_encode($cambio, JSON_PRETTY_PRINT);
 
 //$json_str = json_encode($value[0], JSON_PRETTY_PRINT);

?>

<html>
<head>
<title> Teste </title>

<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>

<script type="text/javascript" src="echarts.js"></script>

<script type="text/javascript">

$(document).ready(function(){
    
var myChart = echarts.init(document.getElementById('main'));

var date = <?php echo $json_data; ?>;
var data = <?php echo $json_cambio; ?>;

var option = {
    tooltip: {
        trigger: 'axis',
        position: function (pt) {
            return [pt[0], '2%'];
        }
    },
    title: {
        left: 'center',
        text: 'Titulo do Grafico',
    }, /*
    toolbox: {
        feature: {
            dataZoom: {
                yAxisIndex: 'none'
            },
            restore: {},
            saveAsImage: {}
        }
    },  */
    xAxis: {
        type: 'category',
        boundaryGap: false,
        data: date
    },
    yAxis: {
        type: 'value',
        boundaryGap: [5, '100%']
    },
    dataZoom: [{
        type: 'inside',
        start: 0,
        end: 10
    }, {
        start: 0,
        end: 10,
        handleIcon: 'M10.7,11.9v-1.3H9.3v1.3c-4.9,0.3-8.8,4.4-8.8,9.4c0,5,3.9,9.1,8.8,9.4v1.3h1.3v-1.3c4.9-0.3,8.8-4.4,8.8-9.4C19.5,16.3,15.6,12.2,10.7,11.9z M13.3,24.4H6.7V23h6.6V24.4z M13.3,19.6H6.7v-1.4h6.6V19.6z',
        handleSize: '80%',
        handleStyle: {
            color: '#fff',
            shadowBlur: 3,
            shadowColor: 'rgba(0, 0, 0, 0.6)',
            shadowOffsetX: 2,
            shadowOffsetY: 2
        }
    }],
    series: [
        {
            name:'valor em reais do dollar:',
            type:'line',
            smooth:true,
            symbol: 'none',
            sampling: 'average',
            itemStyle: {
                normal: {
                    color: 'rgb(255, 70, 131)'
                }
            },
            areaStyle: {
                normal: {
                    color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
                        offset: 0,
                        color: 'rgb(255, 158, 68)'
                    }, {
                        offset: 1,
                        color: 'rgb(255, 70, 131)'
                    }])
                }
            },
            data: data
        }
    ]
};

// use configuration item and data specified to show chart
myChart.setOption(option);

});

</script>

</head> 
<body>

 <div id="main" style="width: 700px;height:300px;"></div>

</body> 
</html> 

<?php
include "./vendor/autoload.php";
//require_once'MultiLayerPerceptron.php';

require_once"Adaline.php";

//endereço: https://portalcursos-lordflavioo.c9users.io/uis/
/*
$client = new Zend\Soap\Client(
	"https://www3.bcb.gov.br/sgspub/JSP/sgsgeral/FachadaWSSGS.wsdl",
	array("soap_version"=>SOAP_1_1,'location'=>'https://www3.bcb.gov.br/wssgs/services/FachadaWSSGS')
);

//$client = new SoapClient("https://www3.bcb.gov.br/sgspub/JSP/sgsgeral/FachadaWSSGS.wsdl",
//array('soap_version'=>SOAP_1_1,'location'=>'https://www3.bcb.gov.br/wssgs/services/FachadaWSSGS')
//);

// var_dump($client);

//echo "<pre>";
//print_r(
//$client->getFunctions()
//);

//print_r(
//	$client->getUltimoValorVO(1)->ultimoValor->valor
//);

//$array[0] = 1;
//$array[1] = 21619;
//$array[2] = 21623;



//$value = $client->getValoresSeriesVO($array, "01/04/2017", "31/07/2017");

//$value2 = $client->getValoresSeriesVO($array, "31/07/2017", "23/08/2017");

//$size = count($value[0]->valores);
//$input;
//$output;
/*

 for ($i = 0; $i < $size - 3; $i++) {
    for ($j = 0; $j < 2; $j++) {
       
        $input[$i][$j] = round($value[0]->valores[$i+$j]->valor, 3);
       
     //  print(round($value[0]->valores[$i]->valor, 3).'<br>');
    }
       $output[$i] = round($value[0]->valores[$i+3]->valor, 3);
 }
 
 /*
 
 $input2;
 $output2;
 
 for ($i = 0; $i < count($value2[0]); $i++) {
   for ($j = 0; $j < 2; $j++) {
      $input2[$i][$j] = round($value2[0]->valores[$i+$j]->valor, 3);
   }
 }
 

 
 
 /*
    $data; 
    $cambio;

 for ($i = 0; $i < count($value[0]->valores); $i++) {
 
 		$data[$i] = $value[0]->valores[$i]->dia . "/". $value[0]->valores[$i]->mes;
 		$cambio[$i] = $value[0]->valores[$i]->valor;
 }
 
 $json_data = json_encode($data);
 $json_cambio = json_encode($cambio);
 
 //echo "<pre>";
 //echo $json_data;
 //echo "</pre>";
 
    $k[0] = 1;
    $k[1] = 0;
  /*$k[2] = 1;
    $k[3] = 0;
    $k[4] = 1;
    $k[5] = 0;*/
    
    
/*   
 $input[0][0] = 0;
 $input[0][1] = 0.1;

 $input[1][0] = 0.1;
 $input[1][1] = 0.1;

 $input[2][0] = 0.2;
 $input[2][1] = 0.1;

 $input[3][0] = 0.3;
 $input[3][1] = 0.1;
 

 
 $output[0] = 0.01;
 $output[1] = 0.04;
 $output[2] = 0.09;
 $output[3] = 0.016;

 
  $in[0][0] = 0.1;
 $in[0][1] = 0.1;
 
 $in[1][0] = 0.1;
 $in[1][1] = 0.2;
 
 $in[2][0] = 0.1;
 $in[2][1] = 0.3;
 
 $in[3][0] = 0.1;
 $in[3][1] = 0.4;
 
 $ou[0] = 0.3;
 
 $ou[1] = 0.4;
 
 $ou[2] = 0.5;
 
 $ou[3] = 0.6;

 
 //echo count($output);
 

// echo '<b>Adaline Linear<b><br>';
// echo 'Entradas <br>';
/*
echo
  $in[0][0].' '
 .$in[0][1].'<br>'
 
 .$in[1][0].' '
 .$in[1][1].'<br>'
   
 .$in[2][0].' '
 .$in[2][1].'<br>'
 
 .$in[3][0].' '
 .$in[3][1].'<br>'
 
 ;

 
 echo 'Saidas <br>';
 
 echo 
 
  $ou[0].'<br>' 
 
 .$ou[1].'<br>' 
 
 .$ou[2].'<br>' 
 
 .$ou[3].'<br>' 
 
 ; */ 

// echo 'Treino: o valor do erro só aparecera 10 casas decimais <br>';

// $adl = new \Adaline();
 
// $adl->trainLinear($input,$output,50);
 
// $adl->useAdaline($input2);

//echo ' Linha Tempo '. count($input)."<br>";

/*

$mod ="";

for ($i = 0; $i < count($input); $i++) {
  for ($j = 0; $j < count($input[0]); $j++) {
   $mod .= $input[$i][$j].' | ';
  }
  
   echo 'Entrada => '. $mod .'  Sainda => '. $output[$i] .'<br>'; 
  
   $mod = "";

}
 
    
 //$mlp = new  MultiLayerPerceptron($input,$output,2,0);
 
 //$mlp->train(20);

 
?>