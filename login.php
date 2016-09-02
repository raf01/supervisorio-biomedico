<?php

session_start();
$login = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;

// connection to db
$servername = "localhost";
$username = "root";
$password = "root";

//Conexão mysql
$conexao = mysql_connect($servername, $username, $password);

// Check connection
if ($conexao->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

//Seleciona o banco de dados
$selecionabd = mysql_select_db($database,$conexao)
            or die ("Banco de dados inexistente.");

// Verifica no cadastro de médicos
$sql = "SELECT *
FROM Medico
WHERE email = '$login'
AND senha = '$password'";

$resultado = mysql_query($sql,$conexao) or die ("Erro na seleção da tabela.");

if (mysql_num_rows ($resultado) == 0) {
  // Verifica no cadastro de pacientes
  $sql = "SELECT *
  FROM Paciente
  WHERE email = '$login'
  AND senha = '$password'";
  $resultado = mysql_query($sql,$conexao) or die ("Erro na seleção da tabela.");
}

//Caso consiga logar cria a sessão
if (mysql_num_rows ($resultado) > 0) {
    // session_start inicia a sessão
    session_start();

    $_SESSION['login'] = $login;
    $_SESSION['password'] = $password;
}

//Caso contrário redireciona para a página de autenticação
else {
    //Destrói
    session_destroy();

    //Limpa
    unset ($_SESSION['login']);
    unset ($_SESSION['password']);

    //Redireciona para a página de autenticação
    header('location:login.php');

}

?>
