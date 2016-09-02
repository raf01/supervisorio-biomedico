<?php
//http://www.melhorweb.com.br/artigo/18082-Sessao-session--para-login-em-PHP.htm

session_start();

$nome = $_POST['nome'] ?? null;
$login = $_POST['email'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$sexo = $_POST['sexo'] ?? null;
$altura = $_POST['altura'] ?? null;
$nascimento = $_POST['nascimento'] ?? null;
$cpf = $_POST['cpf'] ?? null;
$crm = $_POST['crm'] ?? null;

//Conexão mysql
$servername = "localhost";
$username = "root";
$password = "root";

$conexao = mysql_connect($servername, $username, $password);

// Checa conexão
if ($conexao->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

//Seleciona o banco de dados
$selecionabd = mysql_select_db($database,$conexao)
            or die ("Banco de dados inexistente.");

if($crm != NULL) {
  // É um médico
  $sql = "SELECT *
  FROM Medico
  WHERE email = '$login'
  AND senha = '$password'";
} else {
  if($cpf != NULL) {
    // É um Paciente
    $sql = "SELECT *
    FROM Paciente
    WHERE email = '$login'
    AND senha = '$password'";
  }
}

$resultado = mysql_query($sql,$conexao) or die ("Erro na seleção da tabela.");

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

/*
// COLOCAR ESTE CÓDIGO EM TODAS AS PÁGINAS QUE PRECISAM ESTAR AUTENTICADAS
<?PHP
session_start();

//Caso o usuário não esteja autenticado, limpa os dados e redireciona
if ( !isset($_SESSION['login']) and !isset($_SESSION['password']) ) {
    //Destrói
    session_destroy();

    //Limpa
    unset ($_SESSION['login']);
    unset ($_SESSION['password']);

    //Redireciona para a página de autenticação
    header('location:login.php');
}
?>

*/

?>
