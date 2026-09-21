<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Mukir Logistics</title>
    
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body style="background: var(--bg-darker); display: flex; align-items: center; justify-content: center; min-height: 100vh; font-family: 'Inter', sans-serif;">
    <div style="width: 100%; max-width: 420px; padding: 1.5rem;">
        <div class="booking-card" style="padding: 2.5rem; text-align: center; border-radius: 20px;">
            <a href="{{ route('home') }}" class="logo" style="justify-content: center; margin-bottom: 2rem;">
                <span class="logo-icon">❅</span> Mukir Logistics
            </a>
            
            <h2 style="font-family: 'Outfit', sans-serif; font-size: 1.6rem; color: white; margin-bottom: 0.5rem;">Panel Admin</h2>
            <p style="color: var(--text-muted); font-size: 0.9rem; margin-bottom: 2rem;">Masukkan email dan password admin Anda.</p>

            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.4); padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; color: #fca5a5; text-align: left; font-size: 0.85rem;">
                    <ul style="list-style: inside;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="booking-form" action="{{ route('admin.login.submit') }}" method="POST" style="text-align: left;">
                @csrf
                
                <div class="form-group" style="margin-bottom: 1.25rem;">
                    <label for="email" style="font-size: 0.85rem;">Alamat Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required placeholder="admin@mukirlogistics.com" style="padding: 0.85rem; font-size: 0.95rem;" />
                </div>
                
                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label for="password" style="font-size: 0.85rem;">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Masukkan password" style="padding: 0.85rem; font-size: 0.95rem;" />
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; font-size: 0.85rem; color: var(--text-muted);">
                    <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
                        <input type="checkbox" name="remember" id="remember" style="width: auto; height: auto; accent-color: var(--secondary);" />
                        Ingat Saya
                    </label>
                </div>
                
                <button type="submit" class="btn btn-accent btn-wide" style="padding: 0.85rem; font-size: 1rem;">Masuk</button>
            </form>

            <div style="margin-top: 1.5rem; font-size: 0.85rem;">
                <a href="{{ route('home') }}" style="color: var(--text-muted); text-decoration: none;">
                    &larr; Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</body>
</html>
