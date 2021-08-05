<?php
/**
 *  Arrange Act Assert
 *  GivenWhenthen
 */
use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Model\Usuario;
use Alura\Leilao\Service\Avaliador;

require 'vendor/autoload.php';

// Organizo o codigo para executar o teste
$leilao = new Leilao('Fiat 147 0km');

$maria = new Usuario('Maria');
$joao = new Usuario('João');

$leilao->recebeLance(new Lance($maria, 2000));
$leilao->recebeLance(new Lance($joao, 2500));

// Executo o código a ser testado
$leiloeiro = new Avaliador();
$leiloeiro->avaliar($leilao);

$maiorValor = $leiloeiro->getMaiorValor();

// Verifico se a saida está correta
$valorEsperado = 2500;

if($maiorValor != $valorEsperado){
    echo 'Teste falhou: ' . PHP_EOL;
    exit;
}

echo 'Maior valor: ' . $maiorValor . PHP_EOL;