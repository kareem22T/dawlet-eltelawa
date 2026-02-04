@extends('layouts.app')

@section('title', 'المتأهلون الـ 32 - الرئيسية')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <div class="hero-img-wrapper">
                <img src="{{ asset('assets/imgs/hero-icon.png') }}" class="hero-img">
            </div>
            <h1 class="hero-title">المتأهلون الـ 32</h1>
            <p class="hero-subtitle">انضم للآلاف في اختيار البطل القادم. صوتك مهم، تصويتك يحدث فرقاً.</p>
            <button class="hero-button" onclick="document.getElementById('contestants').scrollIntoView({behavior: 'smooth'})">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 12L11 14L15 10" stroke="black" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path
                        d="M5 7C5 5.9 5.9 5 7 5H17C17.5304 5 18.0391 5.21071 18.4142 5.58579C18.7893 5.96086 19 6.46957 19 7V19H5V7Z"
                        stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M22 19H2" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                ابدأ التصويت
            </button>
            <div class="hero-stats">
                <div class="stat-item">
                    <div class="stat-number">{{ $contestants->count() }}</div>
                    <div class="stat-label">متأهل</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">1</div>
                    <div class="stat-label">صوت لكل مستخدم</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">مباشر</div>
                    <div class="stat-label">النتائج</div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section" id="about">
        <div class="about-container">
            <h2 class="about-title">عن المنصة</h2>
            <p class="about-description">
                منصة مصرية حيث يلتقي الابتكار بالفرصة. مسابقة الثلاثة 32 تجمع أفضل المتسابقين في جولة اللعبة، وصوتك يحدد من
                يصل للقمة.
            </p>

            <div class="about-features">
                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="{{ asset('assets/imgs/vote-icon.png') }}" alt="">
                    </div>
                    <h3 class="feature-title">تصويت عادل</h3>
                    <p class="feature-description">خوارزميات متقدمة تضمن احتساب كل صوت بدقة وشفافية.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="{{ asset('assets/imgs/results-icon.png') }}" alt="">
                    </div>
                    <h3 class="feature-title">نتائج فورية</h3>
                    <p class="feature-description">شاهد المنافسة تنكشف مع تحديثات مباشرة وإحصاءات فورية.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="{{ asset('assets/imgs/security-icon.png') }}" alt="">
                    </div>
                    <h3 class="feature-title">نظام آمن</h3>
                    <p class="feature-description">أمان مستوى البنوك يحمي تصويتك ويحافظ على نزاهة العملية.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <img src="{{ asset('assets/imgs/competitors-icon.png') }}" alt="">
                    </div>
                    <h3 class="feature-title">متسابقون موثوقون</h3>
                    <p class="feature-description">جميع المتأهلين تم تحكيمهم بعناية لضمان الأصالة والمصداقية.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contestants Section -->
    <section class="contestants-section" id="contestants">
        <div class="contestants-container">
            <h2 class="contestants-title">تعرف على <span>المتأهلين</span></h2>
            <p class="contestants-subtitle">اختر المتسابق المفضل لك من بين المتأهلين، ثم صوت لتساعده للوصول إلى القمة.</p>

            <div class="contestants-grid">
                @foreach ($contestants as $contestant)
                    <div class="contestant-card">
                        <div class="contestant-image-wrapper">
                            <img src="{{ $contestant->image_url }}" alt="{{ $contestant->name }}" class="contestant-image">
                        </div>
                        <div class="contestant-info">
                            <h3 class="contestant-name">{{ $contestant->name }}</h3>
                            <div class="contestant-stats">
                                <span class="contestant-age">{{ $contestant->votes_count }}</span>
                                <span class="contestant-votes">إجمالي الأصوات</span>
                            </div>
                            <button class="vote-button" data-contestant="{{ $contestant->name }}"
                                data-contestant-id="{{ $contestant->id }}" data-age="{{ $contestant->age }}"
                                data-city="{{ $contestant->city }}" data-image="{{ $contestant->image_url }}"
                                @if ($hasVoted) disabled style="opacity: 0.5; cursor: not-allowed;" @endif>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9 12L11 14L15 10" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M5 7C5 5.9 5.9 5 7 5H17C17.5304 5 18.0391 5.21071 18.4142 5.58579C18.7893 5.96086 19 6.46957 19 7V19H5V7Z"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M22 19H2" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg>
                                {{ $hasVoted ? 'تم التصويت' : 'صوت الآن' }}
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Voting Rules Section -->
    <section class="voting-rules-section">
        <div class="voting-rules-container">
            <div class="section-header">
                <span class="section-label">مهم</span>
                <h2 class="section-title">قواعد <span class="text-white">التصويت</span></h2>
                <p class="section-description">يُرجى قراءة هذه القواعد بعناية قبل إرسال تصويتك.</p>
            </div>

            <div class="rules-grid">
                <div class="rule-card">
                    <div class="rule-icon">
                        <img src="{{ asset('assets/imgs/rule-img-1.png') }}" alt="Rule 1">
                    </div>
                    <div class="rule-content">
                        <h3 class="rule-title">صوت واحد لكل شخص</h3>
                        <p class="rule-description">يحتفظ لكل مستخدم للإدلاء بتصويت واحد فقط لضمان العدالة ومنع الإلعاب
                            عبر.</p>
                    </div>
                </div>

                <div class="rule-card">
                    <div class="rule-icon">
                        <img src="{{ asset('assets/imgs/rule-2.png') }}" alt="Rule 2">
                    </div>
                    <div class="rule-content">
                        <h3 class="rule-title">تصويت آمن</h3>
                        <p class="rule-description">تصويتك مشفر ومحمي بشكل كامل. لن نحفظ خصوصيتك وإحترامك.</p>
                    </div>
                </div>

                <div class="rule-card">
                    <div class="rule-icon">
                        <img src="{{ asset('assets/imgs/rule-3.png') }}" alt="Rule 3">
                    </div>
                    <div class="rule-content">
                        <h3 class="rule-title">لا تعديلات</h3>
                        <p class="rule-description">تحذر الإرسال: لكون الأصوات نهائية ولا يمكن تعديلها للحفاظ على التواتن.
                        </p>
                    </div>
                </div>

                <div class="rule-card">
                    <div class="rule-icon">
                        <img src="{{ asset('assets/imgs/rule-4.png') }}" alt="Rule 4">
                    </div>
                    <div class="rule-content">
                        <h3 class="rule-title">نتائج موثقة</h3>
                        <p class="rule-description">جميع الأصوات يتم التحقق منها وتعدادها في الوقت الفعلي، بشفافية تامة.
                        </p>
                    </div>
                </div>
            </div>

            <div class="important-notice">
                <div class="notice-icon">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                            stroke="#D68E26" stroke-width="2" />
                        <path d="M12 16V12" stroke="#D68E26" stroke-width="2" stroke-linecap="round" />
                        <circle cx="12" cy="8" r="1" fill="#D68E26" />
                    </svg>
                </div>
                <div class="notice-content">
                    <h4 class="notice-title">ملاحظة هامة</h4>
                    <p class="notice-text">بمشاركتك في عملية التصويت، توافق على اتباع هذه القواعد وتعترف على أن جميع
                        الأصوات حي نهائية. يتم تصميم نظامنا للحفاظ على النزاهة ومنع أي شكل من أشكال التلاعب.</p>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/voting.js') }}"></script>
@endpush
