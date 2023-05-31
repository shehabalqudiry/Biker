@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-12">
      <h2 class="h3 mb-4 page-title">الملف الشخصي</h2>
      <div class="row mt-5 align-items-center">
        <div class="col-md-3 text-center mb-5">
          <div class="avatar avatar-xl">
            <img src="{{ auth('admin')->user()->profile_photo_url ?? asset('build/assets/avatars/user_avatar.png') }}" alt="..." class="avatar-img rounded-circle">
          </div>
        </div>
        <div class="col">
          <div class="row align-items-center">
            <div class="col-md-7">
                <form action="{{ route('admin.profile.update') }}" method="POST">
                    @csrf
                    <h4 class="mb-1">
                        <label>الاسم</label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                    </h4>
                    <h4 class="mb-1">
                        <label>اسم المستخدم / البريد الالكتروني</label>
                        <input type="text" class="form-control" name="email" value="{{ $user->email }}" required>
                    </h4>
                    <h4 class="mb-1">
                        <label>رقم الهاتف</label>
                        <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                    </h4>
                    <h4 class="mb-1">
                        <label>كلمة المرور</label>
                        <input type="password" name="password" class="form-control" placeholder="*****">
                    </h4>
                    <button class="btn btn-success mt-3">تحديث</button>
                </form>
              {{-- <p class="small mb-3"><span class="badge badge-dark">New York, USA</span></p> --}}
            </div>
          </div>
        </div>
      </div>
    </div> <!-- /.col-12 -->
  </div> <!-- .row -->
@endsection
