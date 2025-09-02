@include('partials.sidetopbar')

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



        /* Main content */
        .main {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }



        /* Stats cards */
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            /* <-- CHANGED: dynamic columns */
            gap: 15px;
            margin-bottom: 30px;
        }

        .card {
            background: #fff;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-size: 16px;
        }

        /* Nav Cards */
        .nav-cards {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* <-- CHANGED: dynamic columns */
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

        /* Charts */
        .charts {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            /* <-- CHANGED: responsive */
            gap: 20px;
        }

        .chart-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            /* <-- CHANGED */
            height: 350px;
        }

        /* RESPONSIVE ADJUSTMENTS */
        @media (max-width: 1024px) {
            .charts {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
                text-align: center;
            }

            .sidebar nav a {
                justify-content: center;
            }

            .topbar {
                flex-direction: column;
                align-items: stretch;
            }

            .cards,
            .nav-cards {
                grid-template-columns: 1fr;
            }

            .search {
                width: 100%;
                /* fills space on mobile */
                margin-right: 0;
            }
        }
    </style>
</head>

<body>

    <!-- Main Content -->
    <main class="main">
        <!-- Topbar -->


        <!-- Stats Cards -->
        <section class="cards">
            <div class="card">Total Customers: <b>120</b></div>
            <div class="card">Total Products: <b>350</b></div>
            <div class="card">Low Stock Items: <b>8</b></div>
            <div class="card">Orders: <b>56</b></div>
        </section>

        <!-- Navigation Cards -->
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
                        fill: true,
                        tension: 0.3
                    },
                    {
                        label: 'Sales',
                        data: [40, 60, 55, 85, 75, 95],
                        borderColor: '#007bff',
                        fill: true,
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
