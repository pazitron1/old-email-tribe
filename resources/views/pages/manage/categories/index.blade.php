@extends('layouts.manage')

@section('content')
<div>
  <header class="bg-white shadow mt-16 mb-16">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold leading-tight text-gray-900">
        Categories
      </h1>
    </div>
  </header>

  <main>
    <div class="max-w-7xl mx-4 my-6 sm:mx-6 lg:mx-8">
      <manage-categories></manage-categories>
    </div>
  </main>
</div>

@endsection
