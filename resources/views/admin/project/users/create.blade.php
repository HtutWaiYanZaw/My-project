@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Create User')

@section('content')
    <a href="{{ url('/admin/users') }}" class="btn btn-primary">Go To Back</a>
    <hr>
    <form action="{{ url('admin/users') }}" method="post" novalidate>
        @csrf()
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name"
            value="{{ old('name') }}">
            @if($errors->has('name'))
                <p class="text-danger mt-1">{{ $errors->first('name')}}</p>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            @if($errors->has('email'))
                <p class="text-danger mt-1">{{ $errors->first('email')}}</p>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
            @if($errors->has('password'))
                <p class="text-danger mt-1">{{ $errors->first('password')}}</p>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
@endsection

@section('script')
    <script>
        $(document).ready(()=>{
            $('[name="name"]').focus();
        });
    </script>

@endsection
