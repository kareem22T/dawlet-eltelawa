@extends('layouts.admin')

@section('title', 'أصوات ' . $contestant->name)

@section('content')
    <div class="page-header">
        <h1 class="page-title">أصوات {{ $contestant->name }}</h1>
        <p class="page-subtitle">عرض جميع الأصوات لهذا المتسابق</p>
    </div>

    <div class="stats-grid" style="margin-bottom: 30px;">
        <div class="stat-card">
            <div class="stat-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#D68E26" stroke-width="2">
                    <path d="M9 12l2 2 4-4" />
                    <path d="M5 7c0-1.1.9-2 2-2h10a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V7z" />
                </svg>
            </div>
            <div class="stat-value">{{ $contestant->votes_count }}</div>
            <div class="stat-label">إجمالي الأصوات</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#D68E26" stroke-width="2">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                </svg>
            </div>
            <div class="stat-value">{{ $contestant->age }}</div>
            <div class="stat-label">العمر</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#D68E26" stroke-width="2">
                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                    <circle cx="12" cy="10" r="3" />
                </svg>
            </div>
            <div class="stat-value" style="font-size: 20px;">{{ $contestant->city }}</div>
            <div class="stat-label">المدينة</div>
        </div>
    </div>

    <div class="card">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 class="card-title" style="margin: 0;">قائمة الأصوات</h2>
            <a href="{{ route('admin.contestants.index') }}" class="btn btn-secondary btn-sm">العودة للمتسابقين</a>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم المصوت</th>
                        <th>البريد الإلكتروني</th>
                        <th>رقم الهاتف</th>
                        <th>عنوان IP</th>
                        <th>وقت التصويت</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($votes as $index => $vote)
                        <tr>
                            <td>{{ $votes->firstItem() + $index }}</td>
                            <td><strong>{{ $vote->voter_name }}</strong></td>
                            <td>{{ $vote->voter_email }}</td>
                            <td>{{ $vote->voter_phone }}</td>
                            <td><code
                                    style="background: rgba(214, 142, 38, 0.1); padding: 4px 8px; border-radius: 4px; color: #D68E26;">{{ $vote->ip_address }}</code>
                            </td>
                            <td>
                                <div>{{ $vote->voted_at->format('Y-m-d') }}</div>
                                <small
                                    style="color: rgba(255, 255, 255, 0.5);">{{ $vote->voted_at->format('h:i A') }}</small>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; padding: 40px; color: rgba(255, 255, 255, 0.5);">
                                لا توجد أصوات لهذا المتسابق بعد
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($votes->hasPages())
            <div style="margin-top: 20px;">
                {{ $votes->links() }}
            </div>
        @endif
    </div>
@endsection
