<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Campus Service Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #F9F5F2; color: #4A3728; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar { background-color: #DCAE96 !important; padding: 15px; }
        .navbar-brand, .nav-link { color: #ffffff !important; font-weight: 600; }
        .nav-link:hover { color: #4A3728 !important; }
        .card { border: none; border-radius: 15px; transition: 0.3s; }
        .card:hover { transform: translateY(-5px); }
        .btn-main { background-color: #DCAE96; color: white; border: none; font-weight: bold; padding: 10px 20px; border-radius: 8px; }
        .btn-main:hover { background-color: #c89a82; color: white; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg shadow-sm mb-5">
    <div class="container">
        <a class="navbar-brand" href="dashboard.php">CAMPUS HUB</a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="dashboard.php">Home</a>
            <a class="nav-link" href="add_service.php">Add Service</a>
            <a class="nav-link" href="search.php">Search</a>
            <a class="nav-link text-dark" href="logout.php">Logout</a>
        </div>
    </div>
</nav>
<div class="container">