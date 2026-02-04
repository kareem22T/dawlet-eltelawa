@extends('layouts.admin')

@section('title', 'إدارة المتسابقين')

@section('content')
    <div class="page-header" style="display: flex; justify-content: space-between; align-items: center;">
        <div>
            <h1 class="page-title">إدارة المتسابقين</h1>
            <p class="page-subtitle">عرض وإدارة جميع المتسابقين</p>
        </div>
        <a href="{{ route('admin.contestants.create') }}" class="btn btn-primary">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                style="display: inline; vertical-align: middle; margin-left: 8px;">
                <line x1="12" y1="5" x2="12" y2="19" />
                <line x1="5" y1="12" x2="19" y2="12" />
            </svg>
            إضافة متسابق جديد
        </a>
    </div>

    <div class="card">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>الصورة</th>
                        <th>الاسم</th>
                        <th>العمر</th>
                        <th>المدينة</th>
                        <th>عدد الأصوات</th>
                        <th>الحالة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contestants as $contestant)
                        <tr>
                            <td>
                                <img src="{{ $contestant->image_url }}" alt="{{ $contestant->name }}"
                                    style="width: 50px; height: 50px; object-fit: cover; border-radius: 8px;">
                            </td>
                            <td><strong>{{ $contestant->name }}</strong></td>
                            <td>{{ $contestant->age }} سنة</td>
                            <td>{{ $contestant->city }}</td>
                            <td>
                                <strong style="color: #D68E26; font-size: 18px;">{{ $contestant->votes_count }}</strong>
                            </td>
                            <td>
                                @if ($contestant->is_active)
                                    <span
                                        style="background: rgba(34, 197, 94, 0.1); color: #22C55E; padding: 4px 12px; border-radius: 6px; font-size: 12px;">نشط</span>
                                @else
                                    <span
                                        style="background: rgba(153, 161, 175, 0.1); color: #99A1AF; padding: 4px 12px; border-radius: 6px; font-size: 12px;">غير
                                        نشط</span>
                                @endif
                            </td>
                            <td>
                                <div style="display: flex; gap: 8px;">
                                    <a href="{{ route('admin.contestants.votes', $contestant) }}"
                                        class="btn btn-secondary btn-sm">الأصوات</a>
                                    <a href="{{ route('admin.contestants.edit', $contestant) }}"
                                        class="btn btn-secondary btn-sm">تعديل</a>
                                    <form action="{{ route('admin.contestants.destroy', $contestant) }}" method="POST"
                                        style="display: inline;"
                                        onsubmit="return confirm('هل أنت متأكد من حذف هذا المتسابق؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; padding: 40px; color: rgba(255, 255, 255, 0.5);">
                                لا يوجد متسابقون بعد. <a href="{{ route('admin.contestants.create') }}"
                                    style="color: #D68E26;">أضف متسابق جديد</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($contestants->hasPages())
            <div style="margin-top: 20px;">
                {{ $contestants->links() }}
            </div>
        @endif
    </div>
@endsection
