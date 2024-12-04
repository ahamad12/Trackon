<?php
class Pagination {
    private $conn;
    private $inventoryId;
    private $limit;
    private $page;
    private $total;
    private $search;

    public function __construct($conn, $inventoryId) {
        $this->conn = $conn;
        $this->inventoryId = $inventoryId;
        $this->limit = isset($_POST['num-entries']) ? (int)$_POST['num-entries'] : 10;
        $this->page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $this->search = isset($_POST['search-input']) ? $_POST['search-input'] : '';
    }

    public function getTotal() {
        $search_condition = '';
        if (!empty($this->search)) {
            $search_condition = "AND (itemName LIKE ? OR itemId LIKE ?)";
        }

        $sql = "SELECT COUNT(*) as total FROM item WHERE inventoryId = ? $search_condition";
        $stmt = mysqli_prepare($this->conn, $sql);
        
        if (!empty($this->search)) {
            $search_param = "%{$this->search}%";
            mysqli_stmt_bind_param($stmt, "sss", $this->inventoryId, $search_param, $search_param);
        } else {
            mysqli_stmt_bind_param($stmt, "s", $this->inventoryId);
        }
        
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }

    public function getData() {
        $start = ($this->page - 1) * $this->limit;
        $search_condition = '';
        
        if (!empty($this->search)) {
            $search_condition = "AND (itemName LIKE ? OR itemId LIKE ?)";
        }

        $sql = "SELECT 
                    itemId,
                    itemName,
                    itemBrand,
                    itemCatagory,
                    itemQuantity,
                    isPerishable,
                    startDate,
                    iteminfo
                FROM item 
                WHERE inventoryId = ? $search_condition
                LIMIT ?, ?";

        $stmt = mysqli_prepare($this->conn, $sql);
        
        if (!empty($this->search)) {
            $search_param = "%{$this->search}%";
            mysqli_stmt_bind_param($stmt, "sssii", $this->inventoryId, $search_param, $search_param, $start, $this->limit);
        } else {
            mysqli_stmt_bind_param($stmt, "sii", $this->inventoryId, $start, $this->limit);
        }
        
        mysqli_stmt_execute($stmt);
        return mysqli_stmt_get_result($stmt);
    }

    public function createLinks() {
        $total_pages = ceil($this->getTotal() / $this->limit);
        
        $html = '<div class="col-md-12 d-flex justify-content-end">';
        $html .= '<nav aria-label="Page navigation" class="pagination-nav">';
        $html .= '<ul class="pagination" style="list-style: none; padding: 0; margin: 0;">';
        
        // Previous button
        $prev = max(1, $this->page - 1);
        $html .= '<li class="page-item ' . ($this->page <= 1 ? 'disabled' : '') . '">
                    <a class="page-link" href="?page=' . $prev . '" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                 </li>';
    
        // Calculate which page numbers to show
        $start_page = max(1, min($this->page - 1, $total_pages - 2));
        $end_page = min($total_pages, max(3, $this->page + 1));
    
        // Page numbers
        for ($i = $start_page; $i <= $end_page; $i++) {
            $html .= '<li class="page-item ' . ($this->page == $i ? 'active' : '') . '">
                        <a class="page-link" href="?page=' . $i . '">' . $i . '</a>
                     </li>';
        }
    
        // Next button
        $next = min($total_pages, $this->page + 1);
        $html .= '<li class="page-item ' . ($this->page >= $total_pages ? 'disabled' : '') . '">
                    <a class="page-link" href="?page=' . $next . '" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                 </li>';
        
        $html .= '</ul>';
        $html .= '</nav>';
        $html .= '</div>';
    
        return $html;
    }
}
?>