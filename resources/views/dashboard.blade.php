<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMS Dashboard</title>
    <!-- Icons -->
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
            /* Match wireframe */
            color: #fff;
            padding: 20px;
        }

        .sidebar .logo {
            font-size: 22px;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .sidebar .logo span {
            color: #00aaff;
            /* Light blue like wireframe */
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

        /* Main */
        .main {
            flex: 1;
            padding: 20px;
        }

        /* Topbar */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .search {
            padding: 8px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 20px;
        }

        .user {
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Cards */
        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 30px;

            top: 15%;

        }

        .card {
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-size: 16px;
        }

        /* Charts */
        .charts {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .chart-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            height: 350px;
            width: 40rem;
        }

        /* --- Nav Cards (wireframe style) --- */
        .nav-cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .nav-card {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fff;
            padding: 15px 20px;
            border-radius: 8px;
            text-decoration: none;
            color: #000;
            font-size: 16px;
            font-weight: 500;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            border-left: 5px solid transparent;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .nav-card i {
            font-size: 18px;
        }

        .nav-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .nav-card.red {
            border-left-color: #e74c3c;
        }

        .nav-card.blue {
            border-left-color: #00aaff;
        }

        .nav-card.yellow {
            border-left-color: #f1c40f;
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

    <!-- Main Content -->
    <main class="main">
        <header class="topbar">
            <input type="text" placeholder="Search..." class="search">
            <span class="user"><i class="fa-solid fa-user"></i> Hello, User</span>
        </header>

        <!-- Navigation Cards (from wireframe) -->


        <!-- Stats Cards -->
        <section class="cards">
            <div class="card">Total Customers: <b>120</b></div>
            <div class="card">Total Products: <b>350</b></div>
            <div class="card">Low Stock Items: <b>8</b></div>
            <div class="card">Orders: <b>56</b></div>
        </section>

        <!--Search Bar-->
        <section class="nav-cards" id="navCards">
            <a href="#" class="nav-card red" data-name="customer"><span>Customer</span><i
                    class="fa-solid fa-user"></i></a>
            <a href="#" class="nav-card blue" data-name="category"><span>Category</span><i
                    class="fa-solid fa-table-cells-large"></i></a>
            <a href="#" class="nav-card yellow" data-name="supplier"><span>Supplier</span><i
                    class="fa-solid fa-truck"></i></a>
            <a href="#" class="nav-card red" data-name="product"><span>Product</span><i
                    class="fa-solid fa-box"></i></a>
            <a href="#" class="nav-card blue" data-name="purchase"><span>Purchase</span><i
                    class="fa-solid fa-credit-card"></i></a>
            <a href="#" class="nav-card yellow" data-name="order"><span>Order</span><i
                    class="fa-solid fa-receipt"></i></a>
        </section>

        <!-- Charts -->
        <section class="charts">
            <div class="chart-container">
                <canvas id="stockChart"></canvas>
            </div>
            <div class="chart-container">
                <canvas id="salesChart"></canvas>
            </div>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Stock by Category (Bar Chart)
        var ctx1 = document.getElementById('stockChart').getContext('2d');
        var stockChart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['Electronics', 'Furniture', 'Accessories', 'Stationery'],
                datasets: [{
                    label: 'Stock Quantity',
                    data: [120, 80, 45, 60], // Replace with DB values
                    backgroundColor: ['#007bff', '#28a745', '#ffc107', '#e74c3c']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Stock Overview'
                    }
                }
            }
        });

        // Search Functionality
        const searchInput = document.querySelector('.search');
        const navCards = document.querySelectorAll('.nav-card');

        searchInput.addEventListener('keyup', function() {
            const query = this.value.toLowerCase();

            navCards.forEach(card => {
                const name = card.dataset.name.toLowerCase();
                if (name.includes(query)) {
                    card.style.display = 'flex'; // show
                } else {
                    card.style.display = 'none'; // hide
                }
            });
        });

        // Purchases vs Sales (Line Chart)
        var ctx2 = document.getElementById('salesChart').getContext('2d');
        var salesChart = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                        label: 'Purchases',
                        data: [50, 70, 60, 90, 80, 100],
                        borderColor: '#28a745',
                        fill: false,
                        tension: 0.3
                    },
                    {
                        label: 'Sales',
                        data: [40, 60, 55, 85, 75, 95],
                        borderColor: '#007bff',
                        fill: false,
                        tension: 0.3
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Purchases vs Sales'
                    }
                }
            }
        });
    </script>
</body>

</html>
