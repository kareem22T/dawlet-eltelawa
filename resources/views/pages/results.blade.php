@extends('layouts.app')

@section('title', 'النتائج المباشرة - المتأهلون الـ 32')

@section('content')

    <!-- Results Section -->
    <section class="contestants-section" style="padding-top: 150px">
        <div class="contestants-container">
            <h2 class="contestants-title">ترتيب <span>المسابقة</span></h2>
            <p class="contestants-subtitle">نتائج التصويت في الوقت الفعلي. يتم تحديث الترتيب مع ورود الأصوات.</p>

            @if ($contestants->isNotEmpty())
                <!-- Top 3 Contestants -->
                <div style="margin-bottom: 60px;">
                    <h3 style="text-align: center; color: #D68E26; font-size: 28px; font-weight: bold; margin-bottom: 30px;">
                        أفضل 3 <span style="color: #fff">متصدرين</span>
                    </h3>
                    <div class="contestants-grid"
                        style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
                        @foreach ($contestants->take(3) as $index => $contestant)
                            <div class="contestant-card" style="position: relative;">
                                <div
                                    style="position: absolute; top: 10px; left: 10px; z-index: 10; width: 50px; height: 50px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 20px;
                        @if ($index === 0) background: linear-gradient(135deg, #FFD700, #FFA500); color: #000; box-shadow: 0 0 20px rgba(255, 215, 0, 0.5);
                        @elseif($index === 1) background: linear-gradient(135deg, #C0C0C0, #808080); color: #000; box-shadow: 0 0 20px rgba(192, 192, 192, 0.5);
                        @elseif($index === 2) background: linear-gradient(135deg, #CD7F32, #8B4513); color: #fff; box-shadow: 0 0 20px rgba(205, 127, 50, 0.5); @endif">
                                    {{ $index + 1 }}
                                </div>

                                <div class="contestant-image-wrapper">
                                    <img src="{{ $contestant->image_url }}" alt="{{ $contestant->name }}"
                                        class="contestant-image">
                                </div>
                                <div class="contestant-info">
                                    <h3 class="contestant-name">{{ $contestant->name }}</h3>
                                    <div class="contestant-stats">
                                        <span class="contestant-age">{{ $contestant->votes_count }}</span>
                                        <span class="contestant-votes">صوت</span>
                                    </div>
                                    <div
                                        style="margin-top: 10px; background: rgba(214, 142, 38, 0.1); border-radius: 10px; padding: 8px; text-align: center;">
                                        <div style="font-size: 12px; color: rgba(255, 255, 255, 0.6); margin-bottom: 4px;">
                                            نسبة
                                            الأصوات</div>
                                        <div style="font-size: 18px; font-weight: bold; color: #D68E26;">
                                            {{ $totalVotes > 0 ? number_format(($contestant->votes_count / $totalVotes) * 100, 1) : 0 }}%
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Remaining Contestants -->
                @if ($contestants->count() > 3)
                    <div style="margin-top: 60px;">
                        <h3
                            style="text-align: center; color: rgba(255, 255, 255, 0.9); font-size: 24px; font-weight: bold; margin-bottom: 30px; padding-bottom: 15px; border-bottom: 2px solid rgba(214, 142, 38, 0.3);">
                            باقي المتسابقين
                        </h3>
                        <div class="contestants-grid">
                            @foreach ($contestants->skip(3) as $index => $contestant)
                                <div class="contestant-card" style="position: relative;">
                                    <div
                                        style="position: absolute; top: 10px; left: 10px; z-index: 10; width: 40px; height: 40px; border-radius: 50%; background: rgba(214, 142, 38, 0.2); border: 2px solid #D68E26; display: flex; align-items: center; justify-content: center; font-weight: bold; color: #D68E26; font-size: 16px;">
                                        {{ $index + 4 }}
                                    </div>

                                    <div class="contestant-image-wrapper">
                                        <img src="{{ $contestant->image_url }}" alt="{{ $contestant->name }}"
                                            class="contestant-image">
                                    </div>
                                    <div class="contestant-info">
                                        <h3 class="contestant-name">{{ $contestant->name }}</h3>
                                        <div class="contestant-stats">
                                            <span class="contestant-age">{{ $contestant->votes_count }}</span>
                                            <span class="contestant-votes">صوت</span>
                                        </div>
                                        <div
                                            style="margin-top: 10px; background: rgba(214, 142, 38, 0.1); border-radius: 10px; padding: 8px; text-align: center;">
                                            <div
                                                style="font-size: 12px; color: rgba(255, 255, 255, 0.6); margin-bottom: 4px;">
                                                نسبة
                                                الأصوات</div>
                                            <div style="font-size: 18px; font-weight: bold; color: #D68E26;">
                                                {{ $totalVotes > 0 ? number_format(($contestant->votes_count / $totalVotes) * 100, 1) : 0 }}%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @else
                <div style="text-align: center; padding: 60px 20px;">
                    <p style="color: rgba(255, 255, 255, 0.7); font-size: 18px;">لا توجد نتائج متاحة حالياً</p>
                </div>
            @endif

            <div style="text-align: center; margin-top: 40px;">
                <a href="{{ route('home') }}" class="hero-button">
                    العودة للرئيسية
                </a>
            </div>
        </div>
    </section>

    <style>
        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }
    </style>
@endsection

@push('scripts')
    <script>
        // Auto refresh every 60 seconds
        setTimeout(function() {
            location.reload();
        }, 60000);
    </script>
@endpush
