<?php
session_start();
require_once '../Configuration/conf.php'; 

if(!isset($_SESSION['userId'])){
    header("Location: Login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catalog</title>
  
  <script type="text/javascript" src="../Scripts/app.js" defer></script>
  <script type="text/javascript" src="../Scripts/themes.js" defer></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../Styles/styles.css">
</head>
<body>
  <?php
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
                                <h3 class="card-title">Catalog</h3>
                                <hr>
                            </div>	
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                                <div class="d-flex justify-content-between">
                                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="search-form">
                                        <div class="input-group">
                                            <input type="text" class="form-control me-2 input-box" type="search" placeholder="Search" aria-label="Search" name="search-input">
                                            <button class="btn btn-outline-success" type="submit" name="search">Search</button>
                                        </div>
                                    </form>
                                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="entry-form" name="entry">
                                        <div class="input-group">
                                            <button class="btn btn-outline-dark" type="submit">
                                                <i class="bi bi-journal-text"></i> Entries
                                            </button>
                                            <input type="number" class="form-control ms-2" name="num-entries" placeholder="10" min="10" max="40" step="10">
                                        </div>
                                    </form>
                                </div>
                            </th>		
                            </div>							
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="modal fade" id="updateForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeModalBtn"></button>

                                <script>
                                    document.getElementById('closeModalBtn').addEventListener('click', function() {
                                       
                                        window.location.href = 'catalog.php';
                                    });
                                </script>
                                </div>
                                <div class="modal-body">
                                <form method="post" action="conf.php">
                                <div class="row row g-3">
                                    <div class="form-group col">
                                        <label for="item-name">Item Name</label>
                                        <input type="text" class="form-control" id="item-name" name="update-item-name" style="width: 200px; height: 30px;">
                                    </div>
                                    <div class="form-group col">
                                        <label for="item-name">Start Date</label>
                                        <input type="date" class="form-control" id="item-date" name="update-item-date" style="width: 200px; height: 30px;">
                                    </div>
                                </div>
                                <div class="row row g-3">
                                    <div class="form-group col">
                                        <label for="product-code">Product/Code</label>
                                        <input type="text" class="form-control" id="product-code" name="update-product-code" style="width: 200px; height: 30px;">
                                      </div>
                                      <div class="form-group col">
                                        <label for="category">Category</label>
                                        <select class="form-control" id="category" name="update-category" style="width: 200px; height: 40px; margin-bottom: 10px;">
                                            <option value="Furniture">Furniture</option>
                                            <option value="Computer">Computer</option>
                                        </select>
                                     </div>  
                                </div>
                                <div class="row row g-3">
                                    <div class="form-group col">
                                        <label for="brand">Brand</label>
                                        <input type="text" class="form-control" id="brand" name="update-brand" style="width: 200px; height: 30px;">
                                    </div>

                                    <div class="form-group col">
                                        <label for="inventory-type">Inventory Type</label>
                                        <select class="form-control" id="inventory-type" name="update-inventory-type" style="width: 200px; height: 40px; ">
                                            <option value="Primary">Primary</option>
                                            <option value="Perishable">Perishable</option>
                                        </select>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                  <label for="quantity">Quantity</label>
                                  <input type="text" class="form-control" id="quantity" name="update-quantity"  pattern="[0-9]+" style="width: 75px; height: 30px;">
                                </div>
                                <div class="mb-3 loan-Desc">
                                    <label for="item-description" class="form-label">Description</label>
                                    <textarea class="form-control" id="item-description" rows="3" name="update-item-description"></textarea>
                                </div>
                                <script> function setItemIdAndOpenModal(itemId) {
                                   
                                    document.getElementById('hidden-item-id').value = itemId;

                                  
                                    var myModal = new bootstrap.Modal(document.getElementById('updateForm'));
                                    myModal.show();
                                }</script>
                                <div class="input-group justify-content-center">
                                <input type="hidden" name="update-inventory" id="hidden-item-id" value="">

                                    <button class="btn btn-outline-dark" type="submit" style="margin-top: 10px;">
                                        <i class="bi bi-plus"></i> Update
                                    </button>
                                    
                                </div>
                              </form>
                                
                                </div>

                                 </div>
                                </div>
                            </div>
                        <div class="row"><div class="col-sm-12 table-responsive">
                            <?php
                                require_once '../Configuration/conf.php';
                                require_once '../Functions/Tables.php';
                                require_once '../Functions/Pagination.php';

                                if (isset($_SESSION['userId'])) {
                                    $userId = $_SESSION['userId'];
                                    $conn = mysqli_connect('localhost', 'root', '', 'inventorydb') or die("Connection Failed" . mysqli_connect_error());

                                    // Get inventory ID
                                    $sql = "SELECT inventory.inventoryId 
                                            FROM user 
                                            INNER JOIN faculty ON user.facultyId = faculty.facultyId 
                                            INNER JOIN inventory ON faculty.facultyId = inventory.facultyId 
                                            WHERE user.userId = ?";
                                    $stmt = mysqli_prepare($conn, $sql);
                                    mysqli_stmt_bind_param($stmt, "s", $userId);
                                    mysqli_stmt_execute($stmt);
                                    $inventoryId = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt))['inventoryId'];

                                    // Initialize pagination
                                    $pagination = new Pagination($conn, $inventoryId);
                                    // Get the data
                                    $result = $pagination->getData();
                                    if ($result) {
                                        $data = [];
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $data[] = [
                                                $row['itemId'],
                                                $row['itemName'],
                                                $row['itemBrand'],
                                                $row['itemCatagory'],
                                                $row['itemQuantity'],
                                                $row['isPerishable'],
                                                $row['startDate'],
                                                $row['iteminfo']
                                            ];
                                        }

                                        PrintTable($data);
                                        echo $pagination->createLinks();
                                    } else {
                                        echo "No results found";
                                    }
                                } else {
                                    echo "User not logged in properly";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </main>
</body>
</html>