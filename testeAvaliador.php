<?php

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;

require 'vendor/autoload.php';


$leilao = new Leilao('Fiat 147 0km');

$maria = new Usuario('Maria');
$joao = new Usuario('João');

$leilao->recebeLance(new Lance($maria, 2000));
$leilao->recebeLance(new Lance($joao, 2500));

$leiloeiro = new Avaliador();
$leiloeiro->avaliar($leilao);

$maiorValor = $leiloeiro->getMaiorValor();


echo 'Maior valor: ' . $maiorValor . PHP_EOL;