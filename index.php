<?php include 'config.php'; ?>
<html>

<head>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, shrink-to-fit=no, user-scalable=0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.20.2/bootstrap-table.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php INCLUDE_PATH; ?>assets/css/style.css">
 
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-gray-padrao">
    <div class="container-fluid">
      <a class="navbar-brand" style="height: 54px;" href="#"></a>
    </div>
  </nav>
  <div class="sidenav bg-gray-padrao">
 
    <div class="img-user">
    </div>
    <div class="info-user"></div>
    <div class="info-user"></div>
    <div class="menu-sidenav">
      <nav class="sidebar">
        <div id="accordion">
          <div class="card ">
            <a href="<?php echo INCLUDE_PATH; ?>home" class="btn btn-default dashboard">DASHBOARD</a>
          </div>
          <div class="card ">
            <a href="<?php echo INCLUDE_PATH; ?>produto" class="btn btn-default">PRODUTO</a>
          </div>
          <div class="card ">
            <a href="<?php echo INCLUDE_PATH; ?>cor" class="btn btn-default">COR</a>
          </div>
        </div>
      </nav>
    </div>
  </div>

  <?php
  $url = isset($_GET['url']) ? $_GET['url'] : 'home';

  if (file_exists('views/home/' . $url . '.php')) {

    include('views/home/' . $url . '.php');
  } else if (file_exists('views/produto/' . $url . '.php')) {

    include('views/produto/' . $url . '.php');
  } else if (file_exists('views/cor/' . $url . '.php')) {

    include('views/cor/' . $url . '.php');
  } else {
    include('views/404.php');
  }
  ?>

</body>
<footer>

</footer>

</html>