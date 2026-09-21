<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard - Mukir Logistics')</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <style>
        /* Admin specific custom overrides */
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
            background: var(--bg-darker);
        }
        
        .sidebar {
            width: 260px;
            background: var(--bg-dark);
            border-right: 1px solid var(--glass-border);
            padding: 2rem 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 2rem;
            flex-shrink: 0;
        }
        
        .sidebar-brand {
            font-family: 'Outfit', sans-serif;
            font-size: 1.5rem;
            font-weight: 800;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .sidebar-menu {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }
        
        .sidebar-menu a {
            display: block;
            padding: 0.75rem 1rem;
            color: var(--text-muted);
            text-decoration: none;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .sidebar-menu a:hover,
        .sidebar-menu a.active {
            color: var(--secondary);
            background: rgba(0, 224, 255, 0.05);
            font-weight: 600;
        }
        
        .admin-content {
            flex: 1;
            padding: 3rem;
            overflow-y: auto;
        }
        
        .admin-card {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }
        
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            color: var(--text-main);
        }
        
        .admin-table th {
            padding: 1rem;
            border-bottom: 2px solid var(--glass-border);
            color: white;
            font-family: 'Outfit', sans-serif;
            font-weight: 600;
        }
        
        .admin-table td {
            padding: 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.05);
            font-size: 0.95rem;
        }
        
        .admin-table tr:hover {
            background: rgba(255,255,255,0.02);
        }
        
        .badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .badge-pending { background: rgba(234,179,8,0.15); border: 1px solid #eab308; color: #fef08a; }
        .badge-approved { background: rgba(59,130,246,0.15); border: 1px solid #3b82f6; color: #bfdbfe; }
        .badge-transit { background: rgba(6,182,212,0.15); border: 1px solid #06b6d4; color: #cffafe; }
        .badge-completed { background: rgba(16,185,129,0.15); border: 1px solid #10b981; color: #a7f3d0; }
        .badge-cancelled { background: rgba(239,68,68,0.15); border: 1px solid #ef4444; color: #fecaca; }
        
        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }
        
        .stat-card {
            background: var(--glass-bg);
            border: 1px solid var(--glass-border);
            padding: 1.5rem;
            border-radius: 12px;
            text-align: center;
        }
        
        .stat-card h4 {
            font-size: 0.85rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
        }
        
        .stat-card .value {
            font-family: 'Outfit', sans-serif;
            font-size: 2.5rem;
            font-weight: 800;
            color: white;
        }
        
        .alert-success {
            background: rgba(16,185,129,0.1);
            border: 1px solid rgba(16,185,129,0.4);
            color: #a7f3d0;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            font-size: 0.95rem;
        }
        
        @media (max-width: 768px) {
            .admin-wrapper {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid var(--glass-border);
            }
            .admin-content {
                padding: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="admin-wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
                <span style="color: var(--secondary);">❅</span> Admin Portal
            </a>
            
            <ul class="sidebar-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="{{ Route::currentRouteName() == 'admin.dashboard' ? 'active' : '' }}">
                        📊 Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.bookings.index') }}" class="{{ str_starts_with(Route::currentRouteName(), 'admin.bookings.') ? 'active' : '' }}">
                        📦 Kelola Pemesanan
                    </a>
                </li>
                <li>
                    <a href="{{ route('home') }}" target="_blank">
                        🌐 Lihat Website
                    </a>
                </li>
            </ul>
            
            <div style="margin-top: auto; padding-top: 1rem; border-top: 1px solid var(--glass-border);">
                <div style="color: white; font-size: 0.85rem; margin-bottom: 1rem; padding: 0 1rem;">
                    Login sebagai:<br>
                    <strong style="color: var(--secondary);">{{ Auth::user()->name }}</strong>
                </div>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline" style="width: 100%; font-size: 0.85rem; padding: 0.5rem 1rem; border-radius: 8px; cursor: pointer;">
                        🚪 Keluar (Logout)
                    </button>
                </form>
            </div>
        </aside>

        <!-- Main Content area -->
        <main class="admin-content">
            @if(session('success'))
                <div class="alert-success">
                    ✓ {{ session('success') }}
                </div>
            @endif

            @yield('admin_content')
        </main>
    </div>
</body>
</html>
