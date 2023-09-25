  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

          <a href="index.html" class="logo d-flex align-items-center">
              <!-- Uncomment the line below if you also wish to use an image logo -->
              <!-- <img src="assets/img/logo.png" alt=""> -->
              <h1>{{ session('config')->name }}</h1>
          </a>

          <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
          <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
          <nav id="navbar" class="navbar">
              <ul>
                  <li><a href="/" class="active">Beranda</a></li>
                  <li class="dropdown"><a href="#"><span>Layanan</span> <i
                              class="bi bi-chevron-down dropdown-indicator"></i></a>
                      <ul>
                          <li><a href="/service/haki">Penguasa HAKI</a></li>
                          <li><a href="/service/penelitian">Konversi Hasil Penelitian</a></li>
                          <li><a href="/service/kolaborasi">Menulis Kolaborasi</a></li>
                          <li><a href="/service/pelatihan">Pelatihan</a></li>
                          <li><a href="/service/konversi">Konversi KTI</a></li>
                          <li><a href="/service/editing">Editing Naskah</a></li>
                          <li><a href="/service/design">Design Cover</a></li>
                          <li><a href="/service/layout">Layout</a></li>
                      </ul>
                  </li>
                  <li class="dropdown"><a href="/naskah"><span>Kirim Naskah</span> <i
                              class="bi bi-chevron-down dropdown-indicator"></i></a>
                      <ul>
                          <li><a href="/naskah">Download</a></li>
                      </ul>
                  </li>
                  <li class="dropdown"><a href="/blog/all"><span>Artikel</span> <i
                              class="bi bi-chevron-down dropdown-indicator"></i></a>
                      <ul>
                          <li><a href="/blog/dosen">Dunia Dosen</a></li>
                      </ul>
                  </li>
                  <li><a href="/team">Editorial Team</a></li>
                 <li>
  <?php if (empty(session('link_jurnal'))) : ?>
    <a href="#">Jurnal</a>
  <?php else : ?>
    <a href="{{ session('link_jurnal') }}" target="_blank">Jurnal</a>
  <?php endif; ?>
</li>
                  <li class="dropdown"><a href="#"><span>Katalog Buku</span> <i
                              class="bi bi-chevron-down dropdown-indicator"></i></a>
                      <ul>
                         <li>
  <?php if (empty(session('link_katalog'))) : ?>
    <a href="#">Katalog</a>
  <?php else : ?>
    <a href="{{ session('link_katalog') }}" target="_blank">Katalog</a>
  <?php endif; ?>
</li>
                          <li><a href="/katalog">Book Store</a></li>
                      </ul>
                  </li>
                  <li><a href="/katalog">Big Promo</a></li>
                  <li><a href="/contact">Kontak</a></li>

                  {{-- <li><a class="get-a-quote" href="get-a-quote.html">Get a Quote</a></li> --}}
              </ul>
          </nav><!-- .navbar -->

      </div>
  </header>
