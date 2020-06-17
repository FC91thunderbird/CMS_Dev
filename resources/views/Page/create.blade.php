@extends('layouts.main')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
 <ul>
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif

<div align="right">
 <a href="{{ route('user') }}" class="btn btn-default">Back</a>
</div>

@endsection