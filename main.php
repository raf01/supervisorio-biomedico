<?PHP
  session_start();
  //Caso o usuário não esteja autenticado, limpa os dados e redireciona
  if (!isset($_SESSION['login'])) {
    var_dump("lelee");
    //Destrói
    session_destroy();

    //Limpa
    unset ($_SESSION['login']);

    //Redireciona para a página de autenticação
    header('Location: http://localhost:8080/aula/supervisorio-biomedico/login.html');
  }

  //Conexão mysql
  $servername = "localhost";
  $username = "root";
  $password = "abc123";
  $dbname = "BANCOSUPERVISORIO";
  $portnumber = "3306";

  $conexao = new mysqli($servername, $username, $password, $dbname , $portnumber) or die("Erro de conexão.");

  // Checa conexão
  if ($conexao->connect_error) {
      die("Connection failed: " . $conexao->connect_error);
  }

  $email = $_SESSION['login'];

  $sql = "SELECT * FROM Paciente WHERE email = '$email'";
  $resultado = mysqli_query($conexao, $sql);
  $row = mysqli_fetch_array($resultado);

  $nome = $row['nome'];
  $peso = $row['peso'];
  $altura = $row['altura'];

  $sql = "SELECT ROUND(DATEDIFF(NOW(), pa.datanasc)/365) AS idade FROM Paciente AS pa WHERE email = '$email'";
  $resultado = mysqli_query($conexao, $sql);
  $row = mysqli_fetch_array($resultado);
  var_dump($resultado);
  var_dump($row);
  $idade = $row['idade'];

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Monitor Remoto</title>

  <!--Import Google Icon Font-->
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
  <link type="text/css" rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css"  media="screen,projection"/>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <style media="screen">
  </style>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">

    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChartPressure);
    google.charts.setOnLoadCallback(drawChartFrequency);
    google.charts.setOnLoadCallback(updatePersonalData);

    function updatePersonalData(){
      var pesoField = document.getElementById('peso');
      var alturaField = document.getElementById("altura");
      var nomeField = document.getElementById("nome");
      var idadeField = document.getElementById("idade");

      pesoField.innerHTML += <?php echo $peso;?> + " kg";
      alturaField.innerHTML += "<?php echo $altura;?> cm";
      nomeField.innerHTML = "Dados de <?php echo $nome;?>";
      idadeField.innerHTML += " <?php echo $idade;?> anos";
    }

    function drawChartPressure() {

      var dataPressure = new google.visualization.DataTable();
      var chartPressure = new google.visualization.LineChart(document.getElementById('chart1'));
      var optionsPressure = {
          title: 'Pressão Arterial',
          subtitle: '20/11/1993',
          curveType: 'function',
          legend: { position: 'bottom' },
          width: '100%',
          height: '300',
        };

      var rowsPressure = [
        ['1', 136, 93],
        ['2', 115, 87],
        ['3', 135, 103],
        ['4', 142, 96],
        ['5', 121, 109],
        ['6', 127, 72],
        ['7', 109, 100],
        ['8', 126, 73],
      ];

      dataPressure.addColumn('string', 'Element');
      dataPressure.addColumn('number', 'Sístole');
      dataPressure.addColumn('number', 'Diástole');
      dataPressure.addRows(rowsPressure);

      chartPressure.draw(dataPressure, optionsPressure);
    }

    function drawChartFrequency() {

      var dataFrequency = new google.visualization.DataTable();
      var chartFrequency = new google.visualization.LineChart(document.getElementById('chart2'));
      var optionsFrequency = {
        title: 'Frequência Cardíaca',
        subtitle: '20/11/1993',
        curveType: 'function',
        legend: { position: 'bottom' },
        width: '100%',
        height: '300',
      };

      var rowsFrequency = [
        ['1', 136],
        ['2', 115],
        ['3', 135],
        ['4', 142],
        ['5', 121],
        ['6', 127],
        ['7', 109],
        ['8', 126],
      ];

      dataFrequency.addColumn('string', 'Element');
      dataFrequency.addColumn('number', 'BPM');
      dataFrequency.addRows(rowsFrequency);

      chartFrequency.draw(dataFrequency, optionsFrequency);
    }
  </script>
</head>

<body>

  <nav>
    <div class="nav-wrapper">
      <a href="#!" class="center brand-logo"><i class="fa fa-heart-o" aria-hidden="true"></i>heart bit</a>
      <ul class="left">
        <li><a href=""><i class="material-icons">view_headline</i></a></li>
      </ul>
      <ul class="right">
        <li><a href="logout.php">Sair</a></li>
      </ul>
    </div>
  </nav>

  <div class="row">
    <div id="card-col" class="col s6 m3 l3">
      <div class="card">
        <div class="card-content">
          <span class="card-title" id="nome">Dados Pessoais</span>
            <p id="peso">Peso: </p>
            <p id="altura">Altura: </p>
            <p id="idade">Idade: </p>
          </div>
      </div>
      <div class="card">
        <div class="card-content">
          <span class="card-title">Pressão Arterial</span>
            <p>Máxima: </p>
            <p>Mínima: </p>
          </div>
          <div class="card-action">
            <a href="#" class="red-text darken-2-text">Data</a>
        </div>
      </div>
      <div class="card">
        <div class="card-content">
          <span class="card-title">Frequência Cardíaca</span>
            <p>Máxima: </p>
            <p>Mínima: </p>
          </div>
          <div class="card-action">
            <a href="#" class="red-text darken-2-text">Data</a>
        </div>
      </div>
    </div>

    <div class="col s6 m9 l9">
      <div id="chart1" class="row"></div>
      <div id="chart2" class="row"></div>
    </div>
  </div>

  <footer class="page-footer white">
    <div class="footer-copyright">
      <div class="container grey-text text-darken-2">
        <div class="row">
          <div class="col m12" style="display:flex;align-content:center;align-items:center;justify-content:center">
            <span class="copy-left">©</span> 2016
            , &nbsp;<i class="fa fa-code" aria-hidden="true"></i> &nbsp; com&nbsp;
            <i class="fa fa-heart-o" aria-hidden="true"></i> &nbsp; por &nbsp;
            <a class="grey-text text-darken-2" href="https://github.com/raf01">
              @raf01
            </a>
            &nbsp; e &nbsp;
            <a class="grey-text text-darken-2" href="https://github.com/rychardguedes">
              @rychardguedes
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!--Import jQuery before materialize.js-->
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script type="text/javascript" src="js/bin/materialize.js"></script>

</body>
</html>
