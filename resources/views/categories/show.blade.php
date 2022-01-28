@extends('layouts.user-backend')

@section("page_title","Category - ".$category->name)

@section('content')

<livewire:show-blogs-in-categories :category_id="$category->id">

@endsection
