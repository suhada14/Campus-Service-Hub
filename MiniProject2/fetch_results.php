<?php
include 'db.php';
if (isset($_GET['q'])) {
    $q = "%" . $_GET['q'] . "%";
    $stmt = $conn->prepare("SELECT * FROM services WHERE title LIKE ?");
    $stmt->bind_param("s", $q);
    $stmt->execute();
    $res = $stmt->get_result();

    while($row = $res->fetch_assoc()) {
        echo "
        <div class='col-md-3 mb-3'>
            <div class='card p-3 shadow-sm border-0'>
                <h6 class='fw-bold mb-1'>" . htmlspecialchars($row['title']) . "</h6>
                <p class='text-muted small'>RM " . $row['price'] . "</p>
            </div>
        </div>";
    }
}
?>