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

{{-- @php

dd($crud->entry->Machines);

@endphp --}}

<div class="row justify-content-center">
    <div class="col">
        
        <div class="card">
<div class="card-body">
                


<h4>Customer details</h4>
<hr>

<dl class="row mt-4">
<dt class="col-sm-3">Personal info</dt>
<dd class="col-sm-9">
<dl class="row">
<dt class="col-sm-4">Name</dt>
<dd class="col-sm-8">{{$crud->entry->name}}</dd>
</dl>

<dl class="row">
<dt class="col-sm-4">National ID</dt>
<dd class="col-sm-8">{{$crud->entry->national_id}}</dd>
</dl>

<dl class="row">
<dt class="col-sm-4">Mobile 1</dt>
<dd class="col-sm-8">{{$crud->entry->mobile_one}}</dd>
</dl>

<dl class="row">
<dt class="col-sm-4">Mobile 2</dt>
<dd class="col-sm-8">{{$crud->entry->mobile_two}}</dd>
</dl>
</dd>
</dl>

<dl class="row">
<dt class="col-sm-3">Work info</dt>
<dd class="col-sm-9">
<dl class="row">
<dt class="col-sm-4">District</dt>
<dd class="col-sm-8">{{$crud->entry->district}}</dd>
</dl>

<dl class="row">
<dt class="col-sm-4">Address</dt>
<dd class="col-sm-8">{{$crud->entry->address}}</dd>
</dl>

<dl class="row">
<dt class="col-sm-4">Trademark</dt>
<dd class="col-sm-8">{{$crud->entry->trademark}}</dd>
</dl>
</dd>
</dl>









{{-- <h4 class="mt-5 mb-4" id="customer_machines_list">Customer machines list</h4> --}}
<div class="row">



<div class="col-lg-8 mb-5">
<div class="table-responsive">
<table class="table table-striped table-sm">
{{-- <thead>
    <tr>
        <th scope="col">#</th>

        <th scope="col">Number</th>

        <th scope="col">Type</th>

        <th scope="col">Ownership</th>

        <th scope="col">Target</th>

        <th scope="col">Balance</th>

        <th scope="col" class="text-center">Actions</th>
    </tr>
</thead> --}}
{{-- @foreach ($crud->entry->Machines as $Machines)
<tbody>
  <tr>
<th scope="row">1</th>

<td>{{$Machines->number}}</td>

<td>{{$Machines->type}}</td>

<td>{{$Machines->ownership}}</td>

<td>{{$Machines->target}}</td>

<td>{{$Machines->balance}}</td>

<td class="text-right">
<div class="btn-group">
<a href="http://www.liokiast.net/collector/machine/105" class="btn btn-secondary btn-sm">Details</a>

<a href="http://www.liokiast.net/collector/machine/105/edit" class="btn btn-warning btn-sm">Edit</a>

</div>

</td>
</tr>
</tbody>
@endforeach --}}

</table>


</div>
</div>








</div>
















{{-- <h4 class="mt-5 mb-4" id="machines_accounts">Machines accounts</h4>
<div class="row">



<div class="col-lg-8 mb-5">
<div class="table-responsive">
<table class="table table-striped table-sm">
<thead>
    <tr>
        <th scope="col">#</th>

        <th scope="col">Machine</th>

        <th scope="col">Credit</th>

        <th scope="col">Debit</th>

        <th scope="col">Created</th>

        <th scope="col">Updated</th>

        <th scope="col">Collector</th>

        <th scope="col" class="text-center">Actions</th>
    </tr>
</thead>
<tbody>
                        <tr>
        <th scope="row">
             1

        </th>

        <td>956726</td>

        <td>500</td>

        <td></td>

        <td>2 weeks ago</td>

        <td>-</td>

        <td>Elngar</td>

        <td class="text-right">
             <div class="btn-group">

<a href="http://www.liokiast.net/collector/account/2825/edit" class="btn btn-warning btn-sm">Edit</a>

<form action="http://www.liokiast.net/collector/account/2825" method="post" id="deleteForm-2825">
<input type="hidden" name="_token" value="yEH13aOC7pLs748jIeTGrIEvEIqf15BE3C7q5AGR">        <input type="hidden" name="_method" value="delete">    </form>

<a class="btn btn-danger btn-sm" onclick="alerts.confirm('deleteForm-' + 2825);">Delete</a>
</div>

        </td>
    </tr>
                        <tr>
        <th scope="row">
             2

        </th>

        <td>956726</td>

        <td></td>

        <td>500</td>

        <td>2 weeks ago</td>

        <td>-</td>

        <td>Admin</td>

        <td class="text-right">
             <div class="btn-group">

<a href="http://www.liokiast.net/collector/account/2821/edit" class="btn btn-warning btn-sm">Edit</a>

<form action="http://www.liokiast.net/collector/account/2821" method="post" id="deleteForm-2821">
<input type="hidden" name="_token" value="yEH13aOC7pLs748jIeTGrIEvEIqf15BE3C7q5AGR">        <input type="hidden" name="_method" value="delete">    </form>

<a class="btn btn-danger btn-sm" onclick="alerts.confirm('deleteForm-' + 2821);">Delete</a>
</div>

        </td>
    </tr>
                    </tbody>
</table>


</div>
</div>

 --}}

<div class="row">
    <div class="col-md-6">
        <div class="card-header bg-transparent">Target</div>
        <div class="card-body">
        <h1 class="text-center">{{$crud->entry->target}}</h1>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card-header bg-transparent">Balance</div>
        <div class="card-body">
        <h1 class="text-center">{{$crud->entry->balance}}</h1>
        </div>
    </div>


</div>




</div>



            </div>
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

