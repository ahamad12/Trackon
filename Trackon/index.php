<?php
    session_start();
    if(!isset( $_SESSION['userId'])){
        header("Location: Pages/Login.php");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <script type="text/javascript" src="./Scripts/app.js" defer></script>
  <script type="text/javascript" src="./Scripts/themes.js" defer></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="./Styles/styles.css">
</head>
<body>
  <?php 
   include 'Configuration/conf.php';
   include BASE_PATH . '/includes/sidebar.php';
  ?>
  <main>
  <div class="container-box move">		  
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-default rounded-0 shadow w-100">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                                <h3 class="card-title">Inventory</h3>
                                <hr>
                            </div>	
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                                <div class="d-flex justify-content-between">
                                    <form action="" method="get" class="search-form">
                                        <div class="input-group">
                                            <input type="text" class="form-control me-2 input-box" type="search" placeholder="Search" aria-label="Search">
                                            <button class="btn btn-outline-success" type="submit">Search</button>
                                        </div>
                                    </form>
                                    <form action="/display-entries" method="get" class="entry-form">
                                        <div class="input-group">
                                            <button class="btn btn-outline-dark" type="submit">
                                                <i class="bi bi-journal-text"></i> Entries
                                            </button>
                                            <input type="number" class="form-control ms-2" name="num-entries" placeholder="10" min="10" max="40" step="10">
                                        </div>
                                    </form>
                                </div>
                            </div>							
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                                <table id="inventoryDetails" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>      
                                            <th>Product/Code</th>      
                                            <th>Starting Inventory</th> 
                                            <th>Inventory Recieved</th> 									
                                            <th>Inventory Loaned</th>
                                            <th>Inventory on Hand</th>	
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </main>
</body>
</html>