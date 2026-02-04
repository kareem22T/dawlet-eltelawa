@extends('layouts.admin')

@section('title', 'جميع الأصوات')

@section('content')
    <div class="page-header">
        <h1 class="page-title">جميع الأصوات</h1>
        <p class="page-subtitle">عرض جميع الأصوات المسجلة في المسابقة</p>
    </div>

    <div class="card">
        <div style="margin-bottom: 20px; padding: 16px; background: rgba(214, 142, 38, 0.1); border-radius: 8px;">
            <strong style="color: #D68E26; font-size: 18px;">إجمالي الأصوات:</strong>
            <span style="font-size: 24px; font-weight: bold; color: #fff; margin-right: 10px;">{{ $votes->total() }}</span>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>اسم المصوت</th>
                        <th>المتسابق</th>
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
                            <td>
                                <a href="{{ route('admin.contestants.votes', $vote->contestant) }}"
                                    style="color: #D68E26; text-decoration: none; font-weight: 600;">
                                    {{ $vote->contestant->name }}
                                </a>
                            </td>
                            <td>{{ $vote->voter_email }}</td>
                            <td>{{ $vote->voter_phone }}</td>
                            <td>
                                <code
                                    style="background: rgba(214, 142, 38, 0.1); padding: 4px 8px; border-radius: 4px; color: #D68E26; font-size: 12px;">
                                    {{ $vote->ip_address }}
                                </code>
                            </td>
                            <td>
                                <div>{{ $vote->voted_at->format('Y-m-d') }}</div>
                                <small
                                    style="color: rgba(255, 255, 255, 0.5);">{{ $vote->voted_at->format('h:i A') }}</small>
                                <div style="font-size: 11px; color: rgba(255, 255, 255, 0.4); margin-top: 2px;">
                                    {{ $vote->voted_at->diffForHumans() }}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 40px; color: rgba(255, 255, 255, 0.5);">
                                لا توجد أصوات مسجلة بعد
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


    @push('scripts')
        <script>
            function exportToCSV() {
                // This is a basic implementation - you may want to implement server-side export
                alert('ميزة التصدير قيد التطوير');
            }
        </script>
    @endpush
@endsection
