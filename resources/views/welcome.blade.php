<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sistem Informasi Pemeliharaan Alat Elektronik - FT UNIB</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            background: #f0f4f8;
            background-color:#2b6cb0;
            color: #1a202c;
            scroll-behavior: smooth;
        }

        header .logo {
            font-weight: 700;
            font-size: 1.5rem;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 2rem;
            margin: 0;
            padding: 0;
            align-items: center;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 0;
            border-bottom: 2px solid transparent;
            transition: border-color 0.3s ease, opacity 0.3s ease;
        }
        nav ul li a:hover,
        nav ul li a:focus {
            opacity: 0.9;
            border-color: #f53003;
        }
        nav .login-btn {
            background-color: white;
            color: #2b6cb0;
            padding: 0.5rem 1.25rem;
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 2px 6px rgba(43,108,176,0.3);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        nav .login-btn:hover,
        nav .login-btn:focus {
            background-color: #f53003;
            color: white;
            box-shadow: 0 4px 12px rgba(245,48,3,0.6);
        }
        section {
            max-width: 1200px;
            margin: 3rem auto;
            padding: 0 1rem;
        }
        .hero {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        .hero-text {
            flex: 1 1 400px;
        }
        .hero-text h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
            color: #2b6cb0;
        }
        .hero-text p {
            font-size: 1.25rem;
            line-height: 1.5;
            margin-bottom: 2rem;
            color: #4a5568;
        }
        .hero-text a {
            display: inline-block;
            background-color: #2b6cb0;
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 9999px;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(43,108,176,0.4);
            transition: background-color 0.3s ease;
        }
        .hero-text a:hover {
            background-color: #1a4e8c;
        }
        .hero-image {
            flex: 1 1 400px;
            text-align: center;
        }
        .hero-image img {
            max-width: 100%;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit,minmax(280px,1fr));
            gap: 2rem;
            margin-top: 4rem;
        }
        .feature-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            text-align: center;
            transition: transform 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.1);
        }
        .feature-icon {
            font-size: 3rem;
            color: #2b6cb0;
            margin-bottom: 1rem;
        }
        .feature-title {
            font-weight: 600;
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }
        .feature-desc {
            color: #555;
            font-size: 1rem;
            line-height: 1.4;
        }
        footer {
            text-align: center;
            padding: 2rem 1rem;
            color: #888;
            font-size: 0.875rem;
            margin-top: 6rem;
        }
        @media (max-width: 768px) {
            .hero {
                flex-direction: column;
            }
            .hero-text, .hero-image {
                flex: 1 1 100%;
            }
            .hero-text h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
<header>
    <nav style="background-color: #2b6cb0; color: white; padding: 1rem 2rem; display: flex; align-items: center; justify-content: space-between;">
        <div style="font-weight: 700; font-size: 1.5rem;">SI Pemeliharaan Alat FT UNIB</div>
        <div style="display: flex; align-items: center; gap: 2rem; margin-left: auto;">
            <ul style="list-style: none; display: flex; gap: 1.5rem; margin: 0; padding: 0; align-items: center;">
                <li><a href="#beranda" style="color: white; text-decoration: none; font-weight: 600;">Beranda</a></li>
                <li><a href="#tentang-kami" style="color: white; text-decoration: none; font-weight: 600;">Tentang Kami</a></li>
                <li><a href="#contact" style="color: white; text-decoration: none; font-weight: 600;">Contact</a></li>
            </ul>
            <a href="{{ url('/admin') }}" style="background-color: white; color: #2b6cb0; padding: 0.5rem 1rem; border-radius: 6px; font-weight: 600; text-decoration: none;">Login</a>
        </div>
    </nav>
</header>

<section id="beranda" class="hero" role="banner" aria-label="Halaman Beranda">
    <div class="hero-text">
        <h1>Selamat Datang di Sistem Informasi Pemeliharaan Alat</h1>
        <p>Kelola dan pantau pemeliharaan alat elektronik dengan mudah dan efisien menggunakan sistem kami yang modern dan responsif.</p>
        <a href="{{ url('/dashboard') }}">Lihat Daftar Alat</a>
    </div>
    <div class="hero-image">
        <img src="https://images.unsplash.com/photo-1581093588401-1a1a1a1a1a1a?auto=format&fit=crop&w=800&q=80" alt="Ilustrasi pemeliharaan alat elektronik" />
    </div>
</section>

<section id="tentang-kami" class="features" aria-label="Fitur Sistem">
    <article class="feature-card" role="region" aria-labelledby="feature1-title">
        <div class="feature-icon" aria-hidden="true">🔧</div>
        <h3 id="feature1-title" class="feature-title">Manajemen Alat</h3>
        <p class="feature-desc">Simpan data alat lengkap dengan riwayat pemeliharaan dan lokasi alat.</p>
    </article>
    <article class="feature-card" role="region" aria-labelledby="feature2-title">
        <div class="feature-icon" aria-hidden="true">📅</div>
        <h3 id="feature2-title" class="feature-title">Jadwal Pemeliharaan</h3>
        <p class="feature-desc">Atur jadwal pemeliharaan secara otomatis dan dapatkan notifikasi pengingat.</p>
    </article>
    <article class="feature-card" role="region" aria-labelledby="feature3-title">
        <div class="feature-icon" aria-hidden="true">📊</div>
        <h3 id="feature3-title" class="feature-title">Laporan & Statistik</h3>
        <p class="feature-desc">Lihat laporan lengkap dan statistik pemeliharaan untuk analisis yang lebih baik.</p>
    </article>
</section>

<section id="contact" style="max-width: 1200px; margin: 3rem auto; padding: 0 1rem;">
    <h2 style="text-align: center; font-size: 2rem; font-weight: 700; margin-bottom: 1rem;">Contact</h2>
    <p style="text-align: center; max-width: 600px; margin: 0 auto 2rem auto; color: #4a5568;">Hubungi kami untuk informasi lebih lanjut atau bantuan.</p>
    <form style="max-width: 600px; margin: 0 auto; display: flex; flex-direction: column; gap: 1rem;">
        <input type="text" placeholder="Nama" style="padding: 0.75rem; border-radius: 6px; border: 1px solid #cbd5e0; font-size: 1rem;" required />
        <input type="email" placeholder="Email" style="padding: 0.75rem; border-radius: 6px; border: 1px solid #cbd5e0; font-size: 1rem;" required />
        <textarea placeholder="Pesan" rows="4" style="padding: 0.75rem; border-radius: 6px; border: 1px solid #cbd5e0; font-size: 1rem;" required></textarea>
        <button type="submit" style="background-color: #2b6cb0; color: white; padding: 0.75rem; border-radius: 6px; font-weight: 600; cursor: pointer; border: none; transition: background-color 0.3s ease;">Kirim Pesan</button>
    </form>
</section>

<footer>
    &copy; {{ date('Y') }} Fakultas Teknik Universitas Bengkulu. Sistem Pemeliharaan Alat Elektronik.
</footer>
</body>
</html>
