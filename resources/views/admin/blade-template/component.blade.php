@extends('admin.layouts.app')

@section('style')

@endsection

@section('topbar')    
    @parent
@endsection

@section('sidebar')
    @parent
@endsection

@section('page-title','Component')

@section('content')   
    <pre>
        creating component
        ******************
        php artisan make:component Alert

        laravel component
        *****************
        1) Component UI >>> (resources/view/components/...)
        2) Component Controller (Business Logic) >>> (app/view/components/...)

        Component Attribute Databinding
        *******************************
        When you databind in the component attribute,
        There are two way ->
        1) if you bind the value to the attribute, you can bind directly like the following example
            example > type="success"
        2) if you bind the variable to the attribute, you can bind like the following example
            example > :type="$success"
    </pre>


    <hr>

    <x-alert type="success" header="Success Alert" message="This is success message."></x-alert>
    <x-alert type="danger" header="Danger Alert" message="This is danger message."></x-alert>
    <x-alert type="info" header="Info Alert" message="This is info message."></x-alert>

    <hr>

    @foreach($alerts as $alert)
        <x-alert :type="$alert['type']" :header="$alert['header']" :message="$alert['message']"></x-alert>
    @endforeach
@endsection

@section('script')
@endsection
