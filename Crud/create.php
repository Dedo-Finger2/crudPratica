<?php 

require_once ("../Config/conexao.php"); // Requirindo o arquivo de conexão

/**
 * Dados para se criar uma profissão
 */
$dadosProfissao = [
    "nome" => "Baleiro"
];

/**
 * Inserindo uma nova profissão no banco de dados
 */
$createProfissão = $conn->prepare("INSERT INTO profissao(nome) VALUES (?)");
$createProfissão->bind_param("s", $dadosProfissao['nome']);
$createProfissão->execute();

echo "<h1>Nova profissão</h1>";
var_dump($createProfissão);

/**
 * Obtendo o ID dessa nova profissão
 */
$idProfssaoConsulta = $conn->query("SELECT idProfissao FROM profissao WHERE nome = 'Baleiro'");
$idProfssaoArray = $idProfssaoConsulta->fetch_assoc();
$idProfissao = $idProfssaoArray['idProfissao'];

/**
 * Dados para se criar um novo usuário
 */
$dadosUsuario = [
    "nome" => "Wendson",
    "dataNascimento" => "2023-07-03",
    "profissao" => $createProfissão->insert_id

];

/**
 * Inserindo um novo usuário no banco de dados
 */
$create = $conn->prepare("INSERT INTO usuario(nome, dataNascimento, idProfissao) VALUES (?,?,?)");
$create->bind_param("ssi", $dadosUsuario['nome'], $dadosUsuario['dataNascimento'], $dadosUsuario['profissao']);
$create->execute();

echo "<h1>Novo usuário</h1>";
var_dump($create);
