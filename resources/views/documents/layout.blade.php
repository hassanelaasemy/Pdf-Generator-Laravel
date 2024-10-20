<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            min-height: 100vh;
            display: flex;
        }
        #sidebar {
            width: 250px;
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
            transition: all 0.3s;
        }
        #sidebar.collapsed {
            margin-left: -250px;
        }
        #content {
            flex-grow: 1;
            overflow-y: auto;
            transition: all 0.3s;
        }
        .sidebar-link {
            color: #495057;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            transition: all 0.3s;
        }
        .sidebar-link:hover {
            background-color: #e9ecef;
            color: #007bff;
        }
        .sidebar-link.active {
            background-color: #007bff;
            color: white;
        }
        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }
            #sidebar.active {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div id="sidebar">
        <div class="p-4">
            <h3 class="text-center mb-4">PDF System</h3>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('documents.index') }}" class="sidebar-link {{ request()->routeIs('documents.index') ? 'active' : '' }}">
                        <i class="fas fa-file-pdf me-2"></i> Documents
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('documents.create') }}" class="sidebar-link {{ request()->routeIs('documents.create') ? 'active' : '' }}">
                        <i class="fas fa-plus-circle me-2"></i> New Document
                    </a>
                </li>
                <!-- Add more sidebar items here if needed -->
            </ul>
        </div>
    </div>

    <div id="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <button id="sidebarToggle" class="btn btn-outline-secondary">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </nav>

        <div class="container-fluid mt-4">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.getElementById('sidebar');
            const content = document.getElementById('content');

            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');
                content.classList.toggle('expanded');
            });
        });
    </script>
    @stack('scripts')
</body>
</html>