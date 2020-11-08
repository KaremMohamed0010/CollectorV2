@extends(backpack_view('blank'))



@section('content')

<div class="card">

    <div class="card-body">
    <h4>Receive money from {{$user->name}}</h4>
<hr>

<form method="post" action="/admin/Pay" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group row">
        <label for="amount" class="col-sm-3 col-form-label">Amount</label>
        <div class="col-sm-9">
        <input type="hidden" id="custId" name="user_id" value="{{$user->id}}">

            <input name="amount" type="text" class="form-control" 
                   placeholder="Amount">
        </div>
    </div>
    <div class="form-group row">
        <div class="offset-sm-3 col-sm-9">
            <button type="submit" class="btn btn-primary">Submit Game</button>
        </div>
    </div>
</form>
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

