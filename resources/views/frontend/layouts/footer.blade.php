<!-- Footer Section Start -->
<div class="section footer-section" style="background-color: #fff">

    <!-- Footer Widget Start -->
    <div class="footer-widget-section py-5">
        <div class="container">

            <!-- Footer Widget Wrapper Start -->
            <div class="footer-widget-wrapper">
                <div class="row">
                    <div class="col-lg-6 col-md-10 order-md-1 order-lg-1">

                        <div class="footer-widget" data-aos="fade-up" data-aos-delay="100">
                            <a class="footer-logo" href="javascript:;">
                                <img src="{{ asset('storage/identities/' . $identity_website->logo) }}"
                                    style="height: 80px" alt="Logo">
                            </a>
                            <p>Website ini dikelola oleh {{ $identity_website->name }}</p>
                            <div class="widget-info">
                                <h6 class="title">Alamat</h6>
                                <p>{{ $identity_website->address }}</p>
                                <p><span>Telepon </span>: {{ $identity_website->no_tlp }}</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-6 order-md-3 order-lg-2">
                        <div class="footer-widget" data-aos="fade-up" data-aos-delay="200">
                            <h3 class="footer-widget-title">Link Terkait</h3>
                            <ul class="widget-link">
                                @foreach ($related_links as $item)
                                    <li><a href="{{ $item->url }}" target="_blank">{{ $item->name }}</a></li>
                                @endforeach
                                {{-- <li><a href="#layanan">PPID DPMD</a></li>
                                <li><a href="#informasi">Diskominfo Sumsel</a></li>
                                <li><a href="#informasi">PPID Sumsel</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 order-md-2 order-lg-3" data-aos="fade-up" data-aos-delay="300">
                        {{-- <iframe class="footer-widget" data-aos="fade-up" data-aos-delay="200" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15937.602290238077!2d104.74091679587255!3d-2.986204996301815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b75c192755f2d%3A0xbc3a06cf7f3abf5!2sDinas%20Sosial%20Sumatera%20Selatan!5e0!3m2!1sid!2sid!4v1686716847051!5m2!1sid!2sid" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                        {!! $identity_website->maps !!}
                        {{-- <div class="footer-widget" data-aos="fade-up" data-aos-delay="400">
                            <h3 class="footer-widget-title">Statistik Pengunjung</h3>
                            <ul class="widget-link">
                                <li><p>Hari ini : 0</p>
                                </li>
                                <li><p>Bulan ini : 0</p>
                                </li>
                                <li><p>Tahun ini : 0</p>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Widget End -->
 
    <!-- Footer Copyright End -->
    <div class="footer-copyright-section">
        <div class="container">

            <!-- Copyright Wrapper Start -->
            <div class="copyright-wrapper">

                <div class="copyright-text">
                    <p>2024.<span> Copyright </span>&copy; {{ $identity_website->name }}</p>
                </div>

                <div class="copyright-social">
                    @foreach ($social_media as $item)
                        <a href="{{ $item->url }}" onMouseOver="this.style.color='{{ $item->background }}'"
                            onMouseOut="this.style.color='#FFF'" target="_blank"><i class="{{ $item->icon }}"></i></a>
                    @endforeach
                    {{-- <a href="https://www.instagram.com/dinaspmdsumsel/" target="_blank"><i
                            class="fa fa-instagram"></i></a>
                    <a href="https://www.youtube.com/@dinaspemberdayaanmasyaraka3734" target="_blank"><i
                            class="fa fa-youtube-play"></i></a> --}}
                </div>

            </div>
            <!-- Copyright Wrapper End -->

        </div>
    </div>
    <!-- Footer Copyright End -->

</div>
<!-- Footer Section End -->
