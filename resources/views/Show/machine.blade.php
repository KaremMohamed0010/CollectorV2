@extends(backpack_view('blank'))

@php
  $defaultBreadcrumbs = [
    trans('backpack::crud.admin') => url(config('backpack.base.route_prefix'), 'dashboard'),
    $crud->entity_name_plural => url($crud->route),
    trans('backpack::crud.preview') => false,
  ];

  // if breadcrumbs aren't defined in the CrudController, use the default breadcrumbs
  $breadcrumbs = $breadcrumbs ?? $defaultBreadcrumbs;
@endphp

@section('header')
	<section class="container-fluid d-print-none">
    	<a href="javascript: window.print();" class="btn float-right"><i class="la la-print"></i></a>
		<h2>
	        <span class="text-capitalize">{!! $crud->getHeading() ?? $crud->entity_name_plural !!}</span>
	        <small>{!! $crud->getSubheading() ?? mb_ucfirst(trans('backpack::crud.preview')).' '.$crud->entity_name !!}.</small>
	        @if ($crud->hasAccess('list'))
	          <small class=""><a href="{{ url($crud->route) }}" class="font-sm"><i class="la la-angle-double-left"></i> {{ trans('backpack::crud.back_to_all') }} <span>{{ $crud->entity_name_plural }}</span></a></small>
	        @endif
	    </h2>
    </section>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        


<h4>Machine details</h4>
<hr>

<dl class="row mt-4">
<dd class="col">
<dl class="row">
<dt class="col-sm-4">Number</dt>
<dd class="col-sm-8">233142</dd>
</dl>

<dl class="row">
<dt class="col-sm-4">Type</dt>
<dd class="col-sm-8">ابلكيشن</dd>
</dl>

<dl class="row">
<dt class="col-sm-4">Ownership</dt>
<dd class="col-sm-8">مجاني</dd>
</dl>

<dl class="row">
<dt class="col-sm-4">Target</dt>
<dd class="col-sm-8">0</dd>
</dl>

<dl class="row">
<dt class="col-sm-4">Customer</dt>
<dd class="col-sm-8">
        <a href="http://liokiast.net/collector/customer/64">
محمد حسني
</a>
    </dd>
</dl>

<dl class="row">
<dt class="col-sm-4">Balance</dt>
<dd class="col-sm-8">-250</dd>
</dl>
</dd>
</dl>









</div>



    </div>
</div>
@endsection



@section('after_styles')
	<link rel="stylesheet" href="{{ asset('packages/backpack/crud/css/crud.css') }}">
	<link rel="stylesheet" href="{{ asset('packages/backpack/crud/css/show.css') }}">
@endsection

@section('after_scripts')
	<script src="{{ asset('packages/backpack/crud/js/crud.js') }}"></script>
	<script src="{{ asset('packages/backpack/crud/js/show.js') }}"></script>
@endsection