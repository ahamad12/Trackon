<?php
  function getTable($query,$conn)
  {
      $result = mysqli_query($conn,$query);
      $arr = array();
      if ($result) {
          while ($row = mysqli_fetch_array($result,MYSQLI_NUM)) {
              array_push($arr, $row);
          }
          
      } else {
          die("Error ".mysqli_error($conn));
      }
  
      return $arr;
  }


  function PrintTable($arr){
    echo "<div class='table-responsive'>"; // Add responsive wrapper
    echo "<table id='inventoryDetails' class='table table-bordered table-striped'>";
    echo "<thead class='table-header'><tr>";
    echo "<th scope='col'>#</th>";
    echo "<th scope='col'>Item/Code</th>" ;
    echo "<th scope='col'>Item Name</th>" ;
    echo "<th scope='col'>Brand</th> ";
    echo "<th scope='col'>Item Type</th>";                                
    echo "<th scope='col'>Quantity</th>";
    echo "<th scope='col'>Inventory Type</th>" ;    
    echo "<th scope='col'>Start Date</th>";
    echo "<th scope='col'>Description</th>";
    echo "<th scope='col'>Action</th>";            
    echo "</tr></thead>" ;
    echo "<tbody>"; 

    foreach ($arr as $key => $row) {
        echo "<tr>";
        echo "<td>" . ($key + 1) . "</td>"; 
        echo "<td>" . (isset($row[0]) ? htmlspecialchars($row[0]) : 'N/A') . "</td>"; 
        echo "<td>" . (isset($row[1]) ? htmlspecialchars($row[1]) : 'N/A') . "</td>";
        echo "<td>" . (isset($row[2]) ? htmlspecialchars($row[2]) : 'N/A') . "</td>";
        echo "<td>" . (isset($row[3]) ? htmlspecialchars($row[3]) : 'N/A') . "</td>";
        echo "<td>" . (isset($row[4]) ? htmlspecialchars($row[4]) : 'N/A') . "</td>";
        echo "<td>" . (isset($row[5]) ? htmlspecialchars($row[5]) : 'N/A') . "</td>";
        echo "<td>" . (isset($row[6]) ? htmlspecialchars($row[6]) : 'N/A') . "</td>";
        echo "<td>" . (isset($row[7]) ? htmlspecialchars($row[7]) : 'N/A') . "</td>";

        $itemId = isset($row[0]) ? htmlspecialchars($row[0]) : ''; 

        echo "<td class='action-buttons'>";
        echo "<form action='conf.php' method='post' class='entry-form' style='display: inline;'>";
        echo "<button class='btn btn-outline-dark' type='submit' name='delete-inventory' value='$itemId'>";
        echo "<i class='bi bi-x-lg'></i> Delete";
        echo "</button>";
        echo "</form>";
        
        echo "<button class='btn btn-outline-dark' type='submit' data-bs-toggle='modal' data-bs-target='#updateForm' onclick='setItemIdAndOpenModal(\"$itemId\")' name='update-inventory' value='$itemId' style='margin-left: 10px;'>";
        echo "<i class='bi bi-pencil-square'></i> Update";
        echo "</button>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</tbody>" ;
    echo "</table>";
    echo "</div>";
}

function  PrintUserTable($arr){
    echo "<table id='inventoryDetails' class='table table-bordered table-striped'>";
    echo "<thead><tr>";
    echo " <th>#</th>";
    echo "<th>User Id</th>" ;
    echo "<th>User Name</th>" ;
    echo "<th>User Password</th> ";
    echo "<th>User Role</th>";								
    echo "<th>Faculty ID</th>";
    echo "<th>Action</th>";			
    echo "</tr></thead>" ;
    echo "<tbody>"; 

    foreach ($arr as $key => $row) {
        echo "<tr>";
        echo "<td>" . ($key + 1) . "</td>"; 
        echo "<td>" . (isset($row[0]) ? $row[0] : 'N/A') . "</td>"; 
        echo "<td>" . (isset($row[1]) ? $row[1] : 'N/A') . "</td>";
        echo "<td>" . (isset($row[2]) ? $row[2] : 'N/A') . "</td>";
        echo "<td>" . (isset($row[3]) ? $row[3] : 'N/A') . "</td>";
        echo "<td>" . (isset($row[4]) ? $row[4] : 'N/A') . "</td>";
    

        $userId = isset($row[0]) ? $row[0] : ''; 

        echo "<td>";
        echo "<form action='conf.php' method='post' class='entry-form' style='display: inline;'>";
        echo "<button class='btn btn-outline-dark' type='submit' name='delete-user' value='$userId'>";
        echo "<i class='bi bi-x-lg'></i> Delete";
        echo "</button>";

      
        echo "</button>";
        
        echo "</form>";
        echo "<button class='btn btn-outline-dark' type='submit' data-bs-toggle='modal' data-bs-target='#updatemodal' name='update-user' onclick='setItemIdAndOpenModal(\"$userId\")'  value='$userId' style='margin-left: 10px;'>";
        echo "<i class='bi bi-pencil-square'></i> Update";
        
        echo "</td>";

        echo "</tr>";
    }

    echo "</tbody>" ;
    echo "</table>";
}
function  PrintFacultyTable($arr){
    echo "<table id='inventoryDetails' class='table table-bordered table-striped'>";
    echo "<thead><tr>";
    echo " <th>#</th>";
    echo "<th>Faculty Id</th>" ;
    echo "<th>Faculty Name</th>" ;
    echo "<th>Action</th>";			
    echo "</tr></thead>" ;
    echo "<tbody>"; 

    foreach ($arr as $key => $row) {
        echo "<tr>";
        echo "<td>" . ($key + 1) . "</td>"; 
        echo "<td>" . (isset($row[0]) ? $row[0] : 'N/A') . "</td>"; 
        echo "<td>" . (isset($row[1]) ? $row[1] : 'N/A') . "</td>";
    

        $facultyId = isset($row[0]) ? $row[0] : ''; 

        echo "<td>";
        echo "<form action='conf.php' method='post' class='entry-form' style='display: inline;'>";
        echo "<button class='btn btn-outline-dark' type='submit' name='delete-faculty' >";
        echo "<i class='bi bi-x-lg'></i> Delete";
        echo "</button>";

      
        echo "</button>";
        
        echo "</form>";
        echo "<button class='btn btn-outline-dark' type='submit' data-bs-toggle='modal' data-bs-target='#updatemodal' name='update-faculty' onclick='setItemIdAndOpenModal(\"$facultyId\")' value='$facultyId' style='margin-left: 10px;'>";
        echo "<i class='bi bi-pencil-square'></i> Update";
        echo "</td>";

        echo "</tr>";
    }

    echo "</tbody>" ;
    echo "</table>";
}

function PrintTableMessage($arr){


    echo "<table id='inventoryDetails' class='table table-bordered table-striped'>";

    echo "<tbody>"; 

    foreach ($arr as $key => $row) {
        echo "<tr>";
        echo "<td>" . (isset($row[1]) ? $row[1] : 'N/A') . "</td>";
        echo "<td>" . (isset($row[2]) ? $row[2] : 'N/A') . "</td>";
        echo "<td>" . (isset($row[3]) ? $row[3] : 'N/A') . "</td>";
        echo "<td>" . (isset($row[4]) ? $row[4] : 'N/A') . "</td>";
        
        $requestId = isset($row[0]) ? $row[0] : ''; 

        echo "<td>";
        
        echo "<a href='conf.php?fac=$row[1]&item=$row[2]&quantity=$row[3]&messge=$row[4]'>";
        echo "<button class='btn btn-outline-dark' type='submit' name='loan-inventory-accept' value='$requestId'>";
        echo "<i class='bi bi-check-lg'></i> ";
        echo "</button>";
        echo "</a>";

     
        echo "<form action='conf.php' method='POST' class='entry-form' style='display: inline;'>";
        echo "<button class='btn btn-outline-dark' type='submit' name='delete-message' value='$requestId' style='margin-left: 10px;'>";
        echo "<i class='bi bi-x-lg'></i>";
        echo "</button>";
        echo "</form>";
    
        echo "</td>";

        echo "</tr>";
    }

    echo "</tbody>" ;
    echo "</table>";
}

function PrintTableLoan($arr){


    echo "<table id='inventoryDetails' class='table table-bordered table-striped'>";
    echo "<thead><tr>";
    echo " <th>#</th>";
    echo "<th>Request Id</th>" ;
    echo "<th>Requested Faculty Name</th>" ;
    echo "<th>Item Name</th>";	
    echo "<th>Quantity/th>";	
    echo "<th>Request message</th>";
    echo "<th>Lending Faculty</th>";
    echo "<th>Action</th>";
    echo "</tr></thead>" ;

    echo "<tbody>"; 

    foreach ($arr as $key => $row) {
        echo "<tr>";
        echo "<td>" . ($key + 1) . "</td>"; 
        echo "<td>" . (isset($row[0]) ? $row[0] : 'N/A') . "</td>";
        echo "<td>" . (isset($row[1]) ? $row[1] : 'N/A') . "</td>";
        echo "<td>" . (isset($row[2]) ? $row[2] : 'N/A') . "</td>";
        echo "<td>" . (isset($row[3]) ? $row[3] : 'N/A') . "</td>";
        echo "<td>" . (isset($row[4]) ? $row[4] : 'N/A') . "</td>";
        echo "<td>" . (isset($row[5]) ? $row[5] : 'N/A') . "</td>";
        
        $requestId = isset($row[0]) ? $row[0] : ''; 

        echo "<td>";
        
        echo "<a href='conf.php?fac=$row[1]&item=$row[2]&quantity=$row[3]&messge=$row[4]'>";
        echo "<button class='btn btn-outline-dark' type='submit' name='loan-inventory-accept' value='$requestId'>";
        echo "<i class='bi bi-check-lg'></i> ";
        echo "</button>";
        echo "</a>";

     
        echo "<form action='conf.php' method='POST' class='entry-form' style='display: inline;'>";
        echo "<button class='btn btn-outline-dark' type='submit' name='delete-message' value='$requestId' style='margin-left: 10px;'>";
        echo "<i class='bi bi-x-lg'></i>";
        echo "</button>";
        echo "</form>";
    
        echo "</td>";

        echo "</tr>";
    }

    echo "</tbody>" ;
    echo "</table>";
}

?>