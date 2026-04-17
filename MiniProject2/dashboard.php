<?php
session_start();
if(!isset($_SESSION['user_id'])) header("Location: login.php");
include 'db.php';
include 'header.php';
?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Explore Services</h2>
    <span class="badge bg-white text-dark p-2 shadow-sm">Logged in as: <?php echo $_SESSION['role']; ?></span>
</div>

<div class="row">
    <?php
    // Task 6: JOIN Query to show who posted the service
    $sql = "SELECT services.*, users.username FROM services JOIN users ON services.user_id = users.id ORDER BY services.id DESC";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()) { ?>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <img src="uploads/<?php echo $row['image']; ?>" class="card-img-top" style="height:200px; object-fit:cover; border-radius: 15px 15px 0 0;">
                <div class="card-body">
                    <h5 class="fw-bold"><?php echo htmlspecialchars($row['title']); ?></h5>
                    <p class="text-primary fw-bold">RM <?php echo number_format($row['price'], 2); ?></p>
                    <hr>
                    <p class="small text-muted mb-0">Posted by: <strong><?php echo $row['username']; ?></strong></p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
<?php include 'footer.php'; ?>