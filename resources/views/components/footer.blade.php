<footer class="footer">
    <div class="footer-container">
        <div class="footer-grid">
            <!-- Footer Column 1 - Logo and Description -->
            <div class="footer-col">
                <div class="footer-logo">
                    <img src="{{ asset('assets/imgs/logo.png') }}" alt="Logo" class="footer-logo-image">
                </div>
                <p class="footer-description">منصة مبنية على العدالة والشفافية والاحترام. كل صوت مهم، كل رأي له قيمة.</p>
                <div class="footer-social">
                    <a href="#" class="social-link" aria-label="Twitter">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"
                                fill="currentColor" />
                        </svg>
                    </a>
                    <a href="#" class="social-link" aria-label="Instagram">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="2" y="2" width="20" height="20" rx="5" stroke="currentColor"
                                stroke-width="2" />
                            <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="2" />
                            <circle cx="18" cy="6" r="1" fill="currentColor" />
                        </svg>
                    </a>
                    <a href="#" class="social-link" aria-label="Facebook">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Footer Column 2 - Quick Links -->
            <div class="footer-col">
                <h3 class="footer-title">روابط سريعة</h3>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}" class="footer-link">الرئيسية</a></li>
                    <li><a href="#contestants" class="footer-link">المتسابقون</a></li>
                    <li><a href="{{ route('results') }}" class="footer-link">النتائج المباشرة</a></li>
                </ul>
            </div>

            <!-- Footer Column 3 - About -->
            <div class="footer-col">
                <h3 class="footer-title">عن المسابقة</h3>
                <p class="footer-text">هذه المسابقة هدفها التنافس والانتشار. لتعرف معنى الاعتماد على كل صوت معنى.</p>
            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p class="footer-copyright">© {{ date('Y') }} جميع الحقوق محفوظة. صُنعت من <span
                    class="text-primary">Click</span></p>
        </div>
    </div>
</footer>
