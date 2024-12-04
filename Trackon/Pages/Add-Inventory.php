<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Inventory</title>
  <script type="text/javascript" src="../Scripts/app.js" defer></script>
  <script type="text/javascript" src="../Scripts/themes.js" defer></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../Styles/styles.css">
</head>
<body>
  <?php
    include '../Configuration/conf.php';
    include BASE_PATH . '/includes/sidebar.php';
  ?>
  <main>
  <div class="container-box move">		  
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex  justify-content-center">
                    <div class="card card-default rounded-0 shadow w-50">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-6">
                                <h3 class="card-title">Add Inventory</h3>
                                <hr>
                            </div>				
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form method="post" action="conf.php">
                                <div class="row row g-3">
                                    <div class="form-group col">
                                        <label for="item-name">Item Name</label>
                                        <input type="text" class="form-control" id="item-name" name="item-name" style="width: 200px; height: 30px;">
                                    </div>
                                    <div class="form-group col">
                                        <label for="item-name">Start Date</label>
                                        <input type="date" class="form-control" id="item-date" name="item-date" style="width: 200px; height: 30px;">
                                    </div>
                                </div>
                                <div class="row row g-3">
                                    <div class="form-group col">
                                        <label for="product-code">Product/Code</label>
                                        <input type="text" class="form-control" id="product-code" name="product-code" required style="width: 200px; height: 30px;">
                                      </div>
                                      <div class="form-group col">
                                        <label for="category">Category</label>
                                        <select class="form-control" id="category" name="category" style="width: 200px; height: 40px; margin-bottom: 10px;">
                                            <option value="Furniture">Furniture</option>
                                            <option value="Computer">Computer</option>
                                        </select>
                                     </div>  
                                </div>
                                <div class="row row g-3">
                                    <div class="form-group col">
                                        <label for="brand">Brand</label>
                                        <input type="text" class="form-control" id="brand" name="brand" style="width: 200px; height: 30px;">
                                    </div>

                                    <div class="form-group col">
                                        <label for="inventory-type">Inventory Type</label>
                                        <select class="form-control" id="inventory-type" name="inventory-type" style="width: 200px; height: 40px; ">
                                            <option value="Primary">Primary</option>
                                            <option value="Perishable">Perishable</option>
                                        </select>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group">
                                  <label for="quantity">Quantity</label>
                                  <input type="text" class="form-control" id="quantity" name="quantity"  pattern="[0-9]+" style="width: 75px; height: 30px;" required>
                                </div>
                                <div class="mb-3 loan-Desc">
                                    <label for="item-description" class="form-label">Description</label>
                                    <textarea class="form-control" id="item-description" rows="3" name="item-description"></textarea>
                                </div>
                                <div class="input-group justify-content-center">
                                    <button class="btn btn-outline-dark" type="submit" name="add-inventory" style="margin-top: 10px;">
                                        <i class="bi bi-plus"></i> Add Inventory
                                    </button>
                                </div>
                              </form>
                              
                            
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