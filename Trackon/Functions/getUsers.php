<?php
  function getUserRoles($conn) {
    $roles = array();
    $query = "SELECT DISTINCT userRole FROM user";
    $result = mysqli_query($conn, $query);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $roles[] = $row['userRole'];
        }
        mysqli_free_result($result);
    }
    return $roles;
}
?>
