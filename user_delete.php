<?
  session_start();

  if((!isset ($_SESSION['email']) == true) and (!isset ($_SESSION['password']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    header('location:sign.php?message="Please, enter again."');
  }
  
  $logged = $_SESSION['email'];

  require('includes/conn.php');
  $sql = "SELECT * FROM `alunos`";
  $result = $conn->query($sql);
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Gabriel Augusto - GabrielAugusto.me">
  <title>PHP Login System</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/dist/css/custom.css" rel="stylesheet">
</head>

<body>
  <? require('includes/header.php'); ?>
  <div class="container-fluid">
    <div class="row">
      <? require('includes/menu.php'); ?>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Delete</h1>
          
        </div>

        <?
          if ($result->num_rows > 0) {
                
          echo '<table class="table">';
          echo '<thead>';
          echo '  <tr>';
          echo '    <th scope="col">#</th>';
          echo '    <th scope="col">Nome</th>';
          echo '    <th scope="col">Data de Nascimento</th>';
          echo '    <th scope="col">#</th>';      
          echo '  </tr>';
          echo '</thead> ';
          while($row = $result->fetch_assoc()) {
              echo "<tr><td> " . $row["id"]. " </td><td> " . $row["nome"]. " </td><td>  " . $row["data_nascimento"]. "</td><td><a class='btn btn-primary btn-md' href='home.php?action=delete&id=" . $row["id"]. "'>Apagar</a></td></tr>";
          }
            echo '</table>';
          } else {
            echo "Nenhum resultado. Por favor, faça a busca novamente.";
          }
        ?>
      </main>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script>
    window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')
  </script>
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <script src="assets/dist/js/dashboard.js"></script>
</body>


</html>