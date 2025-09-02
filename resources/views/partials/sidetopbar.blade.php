<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMS Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* General Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", sans-serif;
        }

        body {
            display: flex;
            min-height: 100vh;
            background: #f5f6fa;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background: #002540;
            color: #fff;
            padding: 20px;
            flex-shrink: 0;
        }

        .sidebar .logo {
            font-size: 22px;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .sidebar .logo span {
            color: #00aaff;
        }

        .sidebar nav a {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff;
            padding: 10px 0;
            text-decoration: none;
            transition: 0.2s;
            font-size: 15px;
        }

        .sidebar nav a i {
            width: 18px;
        }

        .sidebar nav a:hover {
            color: #00aaff;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            /* everything goes to right */
            height: 50px;
            padding: 0 20px;
            position: fixed;
            top: 3;
            right: 50px;
        }

        .user {
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 8px;
            margin-left: auto;
        }
    </style>

</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <h2 class="logo">inven<span>traX</span></h2>
        <nav>
            <a href="#"><i class="fa-solid fa-table-columns"></i> Dashboard</a>
            <a href="#"><i class="fa-solid fa-user"></i> Customer</a>
            <a href="#"><i class="fa-solid fa-table-cells-large"></i> Category</a>
            <a href="#"><i class="fa-solid fa-truck"></i> Supplier</a>
            <a href="#"><i class="fa-solid fa-box"></i> Product</a>
            <a href="#"><i class="fa-solid fa-credit-card"></i> Purchase</a>
            <a href="#"><i class="fa-solid fa-receipt"></i> Order</a>
        </nav>
    </aside>

    <main>
        <header class="topbar">
            <!-- SEARCH BAR stretches till user info (Added flex 1) -->

            <span class="user"><i class="fa-solid fa-user"></i> Hello, User</span>
        </header>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="dashboard.js"></script>
</body>

</html>
