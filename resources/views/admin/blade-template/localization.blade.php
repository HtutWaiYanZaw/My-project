@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')    
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Localization')

@section('content')  
    <form action="{{ url('/admin/blade-template/change-localization') }}" method="post">
        @csrf
        <div class="mb-3">
            <label>@lang('localization.change-language')</label>
            <select class="form-select" name="language">            
                <option value="en">@lang('localization.english')</option>
                <option value="mm">@lang('localization.myanmar')</option>            
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">@lang('localization.change')</button>
        </div>
    </form>

    <hr>
    <h1 class="text-center">@lang('localization.greeting')</h1>
    <h3 class="text-center">{{ session()->has('language')? session()->get('language') : 'en' }}</h3>

    
    
@endsection

@section('script')
@endsection
