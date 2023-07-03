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
$createProfissao = $conn->prepare("INSERT INTO profissao(nome) VALUES (?)");
$createProfissao->bind_param("s", $dadosProfissao['nome']);
// $createProfissao->execute();

echo "<h1>Nova profissão</h1>";
// var_dump($createProfissao);

/**
 * Obtendo o ID dessa nova profissão
 */
$profssaoConsulta = $conn->query("SELECT * FROM profissao");
$idProfissaoArray = $profssaoConsulta->fetch_assoc();
$idProfissao = $idProfissaoArray['idProfissao'];

/**
 * Dados para se criar um novo usuário
 */
$dadosUsuario = [
    "nome" => "Wendson",
    "dataNascimento" => "2023-07-03",
    "profissao" => $createProfissao->insert_id

];

/**
 * Inserindo um novo usuário no banco de dados
 * Usuario possui uma relação com profissão, uma de suas colunas é o ID de uma profissão
 * encontrada na tabela profissão, então temos que passar o ID de uma profissão que exista no banco como parâmetro aqui no create
 * 
 * Fazemos isso criando uma profissão e depois pegando o ID dela para usar aqui
 */
$create = $conn->prepare("INSERT INTO usuario(nome, dataNascimento, idProfissao) VALUES (?,?,?)");
$create->bind_param("ssi", $dadosUsuario['nome'], $dadosUsuario['dataNascimento'], $dadosUsuario['profissao']);
// $create->execute();

echo "<h1>Novo usuário</h1>";
// var_dump($create);


/**
 * Passando por todas as linhas e mostrando todos os resultados gerados
 */
if ($profssaoConsulta->num_rows > 0) {
    while($row = $profssaoConsulta->fetch_assoc()) {
        echo "ID: " . $row["idProfissao"] . " - Nome: " . $row["nome"] . "<br>";
    }
} else {
    echo "Nenhum resultado encontrado.";
}