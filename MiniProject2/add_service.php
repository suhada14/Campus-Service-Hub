<?php
session_start();
include 'db.php';
include 'header.php';

if (isset($_POST['upload'])) {
    $title = htmlspecialchars($_POST['title']);
    $price = $_POST['price'];
    $user_id = $_SESSION['user_id'];
    
    $file = $_FILES['image'];
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    // Task 4: Server-side Validation
    if (in_array($ext, ['jpg', 'jpeg', 'png']) && $file['size'] < 2000000) {
        $newName = time() . "_" . $file['name'];
        move_uploaded_file($file['tmp_name'], "uploads/" . $newName);
        
        $stmt = $conn->prepare("INSERT INTO services (title, price, image, user_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sdsi", $title, $price, $newName, $user_id);
        $stmt->execute();
        header("Location: dashboard.php");
    } else {
        $msg = "Error: Invalid file type or size (Max 2MB).";
    }
}
?>
<div class="card p-5 shadow-sm col-md-6 mx-auto">
    <h3 class="mb-4">Create New Service</h3>
    <?php if(isset($msg)) echo "<div class='alert alert-warning'>$msg</div>"; ?>
    <form method="POST" enctype="multipart/form-data">
        <label class="form-label">Service Title</label>
        <input type="text" name="title" class="form-control mb-3" required>
        
        <label class="form-label">Price (RM)</label>
        <input type="number" step="0.01" name="price" class="form-control mb-3" required>
        
        <label class="form-label">Service Image (JPG/PNG)</label>
        <input type="file" name="image" class="form-control mb-4" required>
        
        <button type="submit" name="upload" class="btn btn-main w-100">Publish Service</button>
    </form>
</div>