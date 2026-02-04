@extends('layouts.admin')

@section('title', 'إضافة متسابق جديد')

@section('content')
    <div class="page-header">
        <h1 class="page-title">إضافة متسابق جديد</h1>
        <p class="page-subtitle">قم بملء البيانات لإضافة متسابق جديد للمسابقة</p>
    </div>

    <div class="card" style="max-width: 800px;">
        <form action="{{ route('admin.contestants.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label class="form-label">الاسم الكامل *</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                @error('name')
                    <span style="color: #DC2626; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="form-group">
                    <label class="form-label">العمر *</label>
                    <input type="number" name="age" class="form-control" value="{{ old('age') }}" min="1"
                        max="150" required>
                    @error('age')
                        <span
                            style="color: #DC2626; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">المدينة *</label>
                    <input type="text" name="city" class="form-control" value="{{ old('city') }}" required>
                    @error('city')
                        <span
                            style="color: #DC2626; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">صورة المتسابق</label>
                <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                <div id="imagePreview" style="margin-top: 12px;"></div>
                @error('image')
                    <span style="color: #DC2626; font-size: 14px; margin-top: 4px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                    <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                        style="width: 20px; height: 20px; cursor: pointer;">
                    <span class="form-label" style="margin: 0;">متسابق نشط</span>
                </label>
            </div>

            <div style="display: flex; gap: 12px; margin-top: 30px;">
                <button type="submit" class="btn btn-primary">إضافة المتسابق</button>
                <a href="{{ route('admin.contestants.index') }}" class="btn btn-secondary">إلغاء</a>
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            function previewImage(event) {
                const preview = document.getElementById('imagePreview');
                const file = event.target.files[0];

                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        preview.innerHTML = `
                <img src="${e.target.result}"
                     style="max-width: 200px; max-height: 200px; border-radius: 12px; object-fit: cover; border: 2px solid rgba(214, 142, 38, 0.3);">
            `;
                    }
                    reader.readAsDataURL(file);
                } else {
                    preview.innerHTML = '';
                }
            }
        </script>
    @endpush
@endsection
