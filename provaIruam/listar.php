<?php 

//ATENÇÃO AONDE ESTÁ NOMEATRIBUTOAQUI , SUBSTITUA PELO NOME DO ATRIBUTO CRIADO 
//AONDE ESTÁ NOMETABELAAQUI SUBSTITUA PELO NOME DA TABELA CRIADO NO BANCO DE DADOS

include_once('conexao.php');

$busca = '%' .$_GET['busca']. '%';

$query = $pdo->query("SELECT * from navios where navio LIKE '$busca'");

 $res = $query->fetchAll(PDO::FETCH_ASSOC);

 	for ($i=0; $i < count($res); $i++) { 
      foreach ($res[$i] as $key => $value) {
      }
 		$dados[] = array(
 			'id' => $res[$i]['id'],
 			'navio' => $res[$i]['navio'],                              
 		);

 		}

        if(count($res) > 0){
                $result = json_encode(array('success'=>true, 'result'=>$dados));

            }else{
                $result = json_encode(array('success'=>false, 'result'=>'0'));

            }
            echo $result;

 ?>