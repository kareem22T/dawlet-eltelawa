@extends('layouts.admin')

@section('title', 'لوحة التحكم - الإحصائيات')

@section('content')
<div class="page-header">
    <h1 class="page-title">لوحة التحكم</h1>
    <p class="page-subtitle">مرحباً بك في لوحة تحكم المتأهلون الـ 32</p>
</div>

<!-- Stats Grid -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#D68E26" stroke-width="2">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
            </svg>
        </div>
        <div class="stat-value">{{ $stats['total_contestants'] }}</div>
        <div class="stat-label">إجمالي المتسابقين</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#D68E26" stroke-width="2">
                <circle cx="12" cy="12" r="10"/>
                <path d="M12 6v6l4 2"/>
            </svg>
        </div>
        <div class="stat-value">{{ $stats['active_contestants'] }}</div>
        <div class="stat-label">المتسابقون النشطون</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#D68E26" stroke-width="2">
                <path d="M9 12l2 2 4-4"/>
                <path d="M5 7c0-1.1.9-2 2-2h10a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V7z"/>
                <path d="M22 19H2"/>
            </svg>
        </div>
        <div class="stat-value">{{ $stats['total_votes'] }}</div>
        <div class="stat-label">إجمالي الأصوات</div>
    </div>

    <div class="stat-card">
        <div class="stat-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#D68E26" stroke-width="2">
                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
            </svg>
        </div>
        <div class="stat-value">{{ $stats['total_votes'] > 0 ? number_format($stats['total_votes'] / max($stats['active_contestants'], 1), 1) : 0 }}</div>
        <div class="stat-label">متوسط الأصوات لكل متسابق</div>
    </div>
</div>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;">
    <!-- Top Contestants -->
    <div class="card">
        <h2 class="card-title">أعلى المتسابقين</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>الترتيب</th>
                        <th>الاسم</th>
                        <th>عدد الأصوات</th>
                        <th>النسبة</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stats['top_contestants'] as $index => $contestant)
                    <tr>
                        <td>
                            @if($index === 0)
                                <span style="color: #FFD700;">🥇</span>
                            @elseif($index === 1)
                                <span style="color: #C0C0C0;">🥈</span>
                            @elseif($index === 2)
                                <span style="color: #CD7F32;">🥉</span>
                            @else
                                {{ $index + 1 }}
                            @endif
                        </td>
                        <td>{{ $contestant->name }}</td>
                        <td><strong style="color: #D68E26;">{{ $contestant->votes_count }}</strong></td>
                        <td>{{ $stats['total_votes'] > 0 ? number_format(($contestant->votes_count / $stats['total_votes']) * 100, 1) : 0 }}%</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="text-align: center; color: rgba(255, 255, 255, 0.5);">لا توجد بيانات</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div style="margin-top: 16px;">
            <a href="{{ route('results') }}" class="btn btn-secondary btn-sm" target="_blank">عرض كل النتائج</a>
        </div>
    </div>

    <!-- Recent Votes -->
    <div class="card">
        <h2 class="card-title">آخر الأصوات</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>المصوت</th>
                        <th>المتسابق</th>
                        <th>الوقت</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stats['recent_votes'] as $vote)
                    <tr>
                        <td>{{ $vote->voter_name }}</td>
                        <td><strong style="color: #D68E26;">{{ $vote->contestant->name }}</strong></td>
                        <td>{{ $vote->voted_at->diffForHumans() }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" style="text-align: center; color: rgba(255, 255, 255, 0.5);">لا توجد أصوات بعد</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div style="margin-top: 16px;">
            <a href="{{ route('admin.votes') }}" class="btn btn-secondary btn-sm">عرض كل الأصوات</a>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="card" style="margin-top: 24px;">
    <h2 class="card-title">إجراءات سريعة</h2>
    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
        <a href="{{ route('admin.contestants.create') }}" class="btn btn-primary">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" style="display: inline; vertical-align: middle; margin-left: 8px;">
                <line x1="12" y1="5" x2="12" y2="19"/>
                <line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            إضافة متسابق جديد
        </a>
        <a href="{{ route('admin.votes') }}" class="btn btn-secondary">عرض كل الأصوات</a>
        <a href="{{ route('home') }}" class="btn btn-secondary" target="_blank">عرض الموقع</a>
    </div>
</div>
@endsection
