<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bs.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Admin Dashboard</title>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .dashboard-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        .btn-dashboard {
            height: 150px;
            border-radius: 15px;
            font-size: 1.3rem;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
        }
        .btn-dashboard:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        .btn-faskes {
            background: linear-gradient(135deg, #11998e, #38ef7d);
            color: white;
        }
        .btn-data {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }
        .btn-logout {
            background: linear-gradient(135deg, #eb3349, #f45c43);
            color: white;
            height: 60px;
        }
        .header-title {
            color: #333;
            font-weight: 700;
            margin-bottom: 30px;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    <x-navbar />

    <main class="flex-fill d-flex align-items-center justify-content-center py-5">
        <div class="container">
            <div class="dashboard-card">
                <h2 class="text-center header-title">
                    <i class="fas fa-cog me-2"></i>Admin Dashboard
                </h2>

                <div class="row g-4">
                    <div class="col-md-6">
                        <a href="/addfaskes" class="btn btn-dashboard btn-faskes w-100 d-flex align-items-center justify-content-center">
                            <div>
                                <i class="fas fa-hospital mb-2" style="font-size: 2rem;"></i>
                                <div>Tambah Faskes</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="/index" class="btn btn-dashboard btn-data w-100 d-flex align-items-center justify-content-center">
                            <div>
                                <i class="fas fa-users mb-2" style="font-size: 2rem;"></i>
                                <div>Lihat Semua Data</div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <x-footer />
</body>
</html>
