<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Intel Kantin</title>
<link rel="stylesheet" href="assets/css/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@400;600;700;800&family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Google+Sans:ital,opsz,wght@0,17..18,400..700;1,17..18,400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

</head>
<body>

<nav>
  <div class="nav-logo">
    <div class="logo-icon"></div>
    <div>
      <div>Intel</div>
      <div class="sub">Kantin</div>
    </div>
  </div>
  <ul class="nav-links">
    <li><a href="#home">Home</a></li>
    <li><a href="#about">About</a></li>
    <li><a href="#gallery">Gallery</a></li>
  </ul>
  <a href="admin/login.php" class="btn-join desktop">Daftar</a>
  <button class="hamburger" id="hamburger" aria-label="Menu">
    <span></span><span></span><span></span>
  </button>
</nav>

<div class="mobile-menu" id="mobileMenu">
  <a href="#home">Beranda</a>
  <a href="#about">Tentang</a>
  <a href="#gallery">M</a>
  <a href="#" class="btn-join">Join Us</a>
</div>

<section class="hero" id="home">
  <div class="stars"></div>
  <div class="glow-ring"></div>
  <div class="geo geo-triangle"></div>
  <div class="geo geo-triangle2"></div>
  <div class="geo geo-chevron"></div>

  <div class="hero-inner">
    <div class="hero-left">
      <div class="hero-badge">Welcome to Kantin</div>
      <h1 class="hero-title">
        <span class="line1">SMKN 1</span>
        <span class="line2">SURABAYA</span>
      </h1>
      <p class="hero-desc">
        Kantin <span>Jajanan Sekolah</span> SMKN 1 SURABAYA
      </p>
      <div class="hero-buttons">
        <a href="#about" class="btn-outline">Tentang Kami ›</a>
        <a href="#gallery" class="btn-primary">"Pura-pura budek pas makan mie ayam, padahal telinga ini sudah setajam radar demi menangkap suara hatimu... dan skandalmu."</a>
      </div>
    </div>

    <div class="hero-right">
      <div class="char-frame">
        <div class="char-svg">
          <!-- <img id="heroImg" src="cara-membuat-mie-ayam-4-removebg-preview.png" alt="" style="width: 150%; height: 150%;"/> -->
        </div>
      </div>
    </div>
  </div>
</section>

<section class="intro" id="about">
  <div class="intro-inner">
    <div class="intro-tag">✦ Tentang Kami</div>
    <h2 class="intro-heading">
      Radar Intel Kantin<br>
      <span class="hl">SMKN 1 SURABAYA</span>
    </h2>

    <div class="intro-body">
      <div>
        <div class="intro-text">
          <p><strong>Intel Kantin</strong> menyediakan<strong> JAJANAN ENAK  </strong> yang berbasis aplikasi tanpa Internet</p>
          <p style="margin-top:16px">Gak cuma sekadar jualan, info stok jajanan paling update, sampai jadi temen mabar (makan bareng) yang suportif biar gak sendirian di pojokan kantin.</p>
          <p style="margin-top:16px">Kalian Baru di SMKN 1 Surabaya? Tenang aja Kami bisa bantu kamu pilih jajan di kantin sebelum datengin kantin nya!!</p>
        </div>
        <!-- <a href="#" class="intro-cta">Gabung Sekarang →</a> -->
      </div>

      <div class="intro-stats">
        <div class="stat-card featured">
          <div class="stat-num">500<span class="unit">+</span></div>
          <div class="stat-label">Total Pengguna Aktif</div>
          <div class="stat-desc">dan terus bertumbuh setiap harinya</div>
        </div>
        <div class="stat-card">
          <div class="stat-num">50+ <span class="unit">Tahun</span></div>
          <div class="stat-label">Berdiri Sejak</div>
        </div>
        <div class="stat-card">
          <div class="stat-num">13<span class="unit">+</span></div>
          <div class="stat-label">Stand Tersedia!!!</div>
        </div>
      </div>
    </div>

    <div class="catalog-search" id="gallery">
      <label for="catalogSearch" class="catalog-search-label">Cari Menu Katalog</label>
      <div class="catalog-search-wrapper">
        <img src="assets/img/search.png" alt="Search icon">
        <input type="search" id="catalogSearch" class="catalog-search-input" placeholder="Awakmu golek panganan ta ngombe?" aria-label="Cari menu katalog">
      </div>
    </div>

    <div class="intro-features" id="catalogGrid">
      <div class="feature-item" data-search="mie ayam juara katalog makanan berat rp12000 mie kenyal topping ayam manis gurih">
        <div class="feature-icon"><img src="assets/img/1.jpeg" width="90px" alt="Mie Ayam Juara"></div>
        <div class="feature-title">Mie Ayam Juara</div>
        <div class="feature-meta">Katalog Makanan Berat • Rp12.000</div>
        <div class="feature-desc">Mie kenyal dengan topping ayam manis gurih. Cocok buat isi tenaga sebelum lanjut kelas.</div>
      </div>
      <div class="feature-item" data-search="dimsum mix katalog snack rp10000 dimsum ayam udang saus sambal mayo">
        <div class="feature-icon"></div>
        <div class="feature-title">Dimsum Mix</div>
        <div class="feature-meta">Katalog Snack • Rp10.000</div>
        <div class="feature-desc">Pilihan dimsum ayam dan udang yang bisa dipadukan saus sambal atau mayo favoritmu.</div>
      </div>
      <div class="feature-item" data-search="es teh lemon katalog minuman rp5000 minuman segar lemon ringan">
        <div class="feature-icon"></div>
        <div class="feature-title">Es Teh Lemon</div>
        <div class="feature-meta">Katalog Minuman • Rp5.000</div>
        <div class="feature-desc">Minuman segar dengan aroma lemon ringan untuk teman makan siang di kantin.</div>
      </div>
    </div>
    <p class="catalog-empty" id="catalogEmpty">Menu tidak ditemukan. Coba kata kunci lain.</p>
  </div>
</section>

<script>
  const hamburger = document.getElementById('hamburger');
  const mobileMenu = document.getElementById('mobileMenu');
  hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('open');
    mobileMenu.classList.toggle('open');
  });
  mobileMenu.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
    hamburger.classList.remove('open');
    mobileMenu.classList.remove('open');
  }));

  const catalogSearch = document.getElementById('catalogSearch');
  const catalogItems = document.querySelectorAll('#catalogGrid .feature-item');
  const catalogEmpty = document.getElementById('catalogEmpty');

  catalogSearch.addEventListener('input', () => {
    const keyword = catalogSearch.value.trim().toLowerCase();
    let visibleCount = 0;

    catalogItems.forEach((item) => {
      const searchableText = item.dataset.search || item.textContent.toLowerCase();
      const isMatch = searchableText.includes(keyword);
      item.style.display = isMatch ? '' : 'none';
      if (isMatch) visibleCount += 1;
    });

    catalogEmpty.classList.toggle('show', visibleCount === 0);
  });
</script>
</body>
</html>