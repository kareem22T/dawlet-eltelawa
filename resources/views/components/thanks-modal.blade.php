<div class="thanks-modal-overlay" id="thanksModal">
    <div class="thanks-modal-container">
        <!-- Success Icon with Glow Effect -->
        <div class="thanks-icon-wrapper">
            <div class="thanks-icon">
                <svg width="64" height="64" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="32" cy="32" r="28" stroke="#D68E26" stroke-width="3" />
                    <path d="M20 32L28 40L44 24" stroke="#D68E26" stroke-width="4" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </div>
        </div>

        <!-- Main Title -->
        <h2 class="thanks-title">شكراً لتصويتك!</h2>

        <!-- Thank You Badge -->
        <div class="thanks-badge" id="thanksBadge">
            لقد صوت لـ محمد كامل!
        </div>

        <!-- Success Message -->
        <p class="thanks-message">
            شكراً لمشاركتك في هذا الحدث المتميز. صوتك يساهم في دعم الموهبة والتميز.
        </p>

        <!-- Action Buttons -->
        <div class="thanks-actions">
            <a href="{{ route('results') }}" class="thanks-button thanks-button-primary">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2.5 2.5V15.8333C2.5 16.2754 2.67559 16.6993 2.98816 17.0118C3.30072 17.3244 3.72464 17.5 4.16667 17.5H17.5"
                        stroke="black" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M15 14.1667V7.5" stroke="black" stroke-width="1.66667" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M10.8335 14.1667V4.16669" stroke="black" stroke-width="1.66667" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M6.6665 14.1667V11.6667" stroke="black" stroke-width="1.66667" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                مشاهدة النتائج المباشرة
            </a>
            <button class="thanks-button thanks-button-secondary" id="returnHome">
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M12.5 17.5V10.8333C12.5 10.6123 12.4122 10.4004 12.2559 10.2441C12.0996 10.0878 11.8877 10 11.6667 10H8.33333C8.11232 10 7.90036 10.0878 7.74408 10.2441C7.5878 10.4004 7.5 10.6123 7.5 10.8333V17.5"
                        stroke="white" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M2.5 8.33335C2.49994 8.0909 2.55278 7.85137 2.65482 7.63144C2.75687 7.41152 2.90566 7.21651 3.09083 7.06001L8.92417 2.06085C9.22499 1.8066 9.60613 1.66711 10 1.66711C10.3939 1.66711 10.775 1.8066 11.0758 2.06085L16.9092 7.06001C17.0943 7.21651 17.2431 7.41152 17.3452 7.63144C17.4472 7.85137 17.5001 8.0909 17.5 8.33335V15.8333C17.5 16.2754 17.3244 16.6993 17.0118 17.0119C16.6993 17.3244 16.2754 17.5 15.8333 17.5H4.16667C3.72464 17.5 3.30072 17.3244 2.98816 17.0119C2.67559 16.6993 2.5 16.2754 2.5 15.8333V8.33335Z"
                        stroke="white" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                العودة للرئيسية
            </button>
        </div>

        <!-- Share Section -->
        <div class="thanks-share">
            <p class="thanks-share-label">شارك السعد مع أصدقائك</p>
            <div class="thanks-social">
                <button class="thanks-social-button" aria-label="Share on WhatsApp" onclick="shareOnWhatsApp()">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"
                            fill="currentColor" />
                    </svg>
                </button>
                <button class="thanks-social-button" aria-label="Share on Facebook" onclick="shareOnFacebook()">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <button class="thanks-social-button" aria-label="Share on Twitter" onclick="shareOnTwitter()">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"
                            fill="currentColor" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
