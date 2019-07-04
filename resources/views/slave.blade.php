@extends('master')

@section('content')
<h2>*SM 예제*</h2>
  <ul>
  @foreach($items as $item)
  <li>{{ $item }}</li>
  @endforeach
  </ul>
  
<h3> 아이템 개수 </h3>
@if($itemCount = count($items))
<p>There are {{ $itemCount }} items !</p>
@else
<p>There is no item !</p>
@endif

<h3>아이템 종류</h3>
@forelse($items as $item)
<p>The item is {{ $item }}</p>
@empty
<p>There is no item !</p>
@endforelse

@stop