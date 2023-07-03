<?php 

$conn = new mysqli("localhost", "root", "", "crudTeste");

if ($conn->connect_error) {
	die("Conexão falhou:". $conn->connect_error);
}

echo "A conexão deu certo!";
