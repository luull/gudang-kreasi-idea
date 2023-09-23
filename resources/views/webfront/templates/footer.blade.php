<footer id="footer" class="footer">

    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-info">
                <a href="index.html" class="logo d-flex align-items-center">
                    <span>{{ session('config')->name }}</span>
                </a>
                <p>{!! session('config')->subtitle_header !!}</p>
                <div class="social-links d-flex mt-4">
                    <a target="_blank" href="{{ session('config')->twitter }}" class="twitter"><i
                            class="bi bi-twitter"></i></a>
                    <a target="_blank" href="{{ session('config')->fb }}" class="facebook"><i
                            class="bi bi-facebook"></i></a>
                    <a target="_blank" href="{{ session('config')->ig }}" class="instagram"><i
                            class="bi bi-instagram"></i></a>
                </div>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="#">Beranda</a></li>
                    <li><a href="#">Layanan</a></li>
                    <li><a href="#">Kirim Naskah</a></li>
                    <li><a href="#">Artikel</a></li>
                    <li><a href="#">Editorial Team</a></li>
                </ul>
            </div>

            <div class="col-lg-2 col-6 footer-links">
                <h4>Our Services</h4>
                <ul>
                    <li><a href="#">Penguasa Haki</a></li>
                    <li><a href="#">Konversi Hasil Penelitian</a></li>
                    <li><a href="#">Menulis Kolaborasi</a></li>
                    <li><a href="#">Jurnal</a></li>
                    <li><a href="#">Katalog Buku</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
                <h4>Contact Us</h4>
                <p>
                    {{ session('config')->address }}
                    <strong>Phone:</strong> {{ session('config')->phone }}<br>
                    <strong>Email:</strong>{{ session('config')->email }}<br>
                </p>

            </div>

        </div>
    </div>

    <div class="container mt-4">
        <div class="copyright">
            &copy; Copyright <strong><span>{{ session('config')->name }}</span></strong>. All Rights Reserved
        </div>

    </div>

</footer><!-- End Footer -->
