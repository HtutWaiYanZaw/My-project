@extends('pos.layout.app')

@section('style')
@endsection

@section('navbar')
    @parent
@endsection




@section('content')
<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <form action="{{ url('pos/login') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                @if ($errors->has('email'))
                    <p class="text-danger mt-1">{{ $errors->first('email') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                @if ($errors->has('password'))
                    <p class="text-danger mt-1">{{ $errors->first('password') }}</p>
                @endif
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </div>
        </form>
    </div>
    <div class="col-md-4"></div>
</div>

@endsection

@section('script')
@endsection
