@extends('layouts.manage')

@section('content')
<div>
  <header class="bg-white shadow mt-16">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold leading-tight text-gray-900">
        Dashboard
      </h1>
    </div>
  </header>
  <main>
    <div class="max-w-7xl mx-2 my-6 sm:mx-4 lg:mx-6 h-screen">
      <div class="flex flex-wrap -mx-1 overflow-hidden sm:-mx-1 md:-mx-2 lg:-mx-3 xl:-mx-4">

        <div class="my-1 px-1 w-full overflow-hidden sm:my-1 sm:px-1 sm:w-full md:my-2 md:px-2 md:w-full lg:my-3 lg:px-3 lg:w-1/3 xl:my-4 xl:px-4 xl:w-1/4">
          <!-- Column Content -->
          <div class="p-2">
            <div class="flex flex-col bg-white rounded-lg shadow border border-gray-100">
              <div class="flex items-center p-6">
                <div class="flex w-13 h-13 bg-indigo-600 p-2 mr-4 rounded-lg justify-center items-center">
                    <svg class="text-white w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                  <span class="text-gray-600 text-sm leading-tight">Total approved jobs</span>
                  <h2 class="flex items-baseline text-gray-900 text-3xl font-semibold leading-none">{{\App\Job::active()->approved()->count()}} @if(\App\Job::active()->unapproved()->count())<span class="text-green-600 text-xs font-semibold leading-none ml-2">{{\App\Job::active()->unapproved()->count()}} pending approval</span>@endif</h2>
                </div>
              </div>
              <div class="bg-gray-100 px-6 py-4 rounded-b-lg">
                <a class="text-sm text-indigo-500 hover:text-indigo-600 font-semibold" href="{{route('manage.jobs.index')}}">View all</a>
              </div>
            </div>
          </div>
        </div>

        <div class="my-1 px-1 w-full overflow-hidden sm:my-1 sm:px-1 sm:w-full md:my-2 md:px-2 md:w-full lg:my-3 lg:px-3 lg:w-1/3 xl:my-4 xl:px-4 xl:w-1/4">
          <!-- Column Content -->
          <div class="p-2">
            <div class="flex flex-col bg-white rounded-lg shadow border border-gray-100">
              <div class="flex items-center p-6">
                <div class="flex w-13 h-13 bg-green-600 p-2 mr-4 rounded-lg justify-center items-center">
                    <svg class="text-white w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path></svg>
                </div>
                <div>
                  <span class="text-gray-600 text-sm leading-tight">Published categories</span>
                  <h2 class="text-gray-900 text-3xl font-semibold leading-none">{{\App\Category::count()}}</h2>
                </div>
              </div>
              <div class="bg-gray-100 px-6 py-4 rounded-b-lg">
                <a class="text-sm text-indigo-500 hover:text-indigo-600 font-semibold" href="{{route('manage.categories.index')}}">View all</a>
              </div>
            </div>
          </div>
        </div>

        <div class="my-1 px-1 w-full overflow-hidden sm:my-1 sm:px-1 sm:w-full md:my-2 md:px-2 md:w-full lg:my-3 lg:px-3 lg:w-1/3 xl:my-4 xl:px-4 xl:w-1/4">
          <!-- Column Content -->
          <div class="p-2">
            <div class="flex flex-col bg-white rounded-lg shadow border border-gray-100">
              <div class="flex items-center p-6">
                <div class="flex w-13 h-13 bg-yellow-600 p-2 mr-4 rounded-lg justify-center items-center">
                    <svg class="text-white w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                </div>
                <div>
                  <span class="text-gray-600 text-sm leading-tight">Published blog posts</span>
                  <h2 class="text-gray-900 text-3xl font-semibold leading-none">15</h2>
                </div>
              </div>
              <div class="bg-gray-100 px-6 py-4 rounded-b-lg">
                <a class="text-sm text-indigo-500 hover:text-indigo-600 font-semibold" href="">View all</a>
              </div>
            </div>
          </div>
        </div>

        <div class="my-1 px-1 w-full overflow-hidden sm:my-1 sm:px-1 sm:w-full md:my-2 md:px-2 md:w-full lg:my-3 lg:px-3 lg:w-1/3 xl:my-4 xl:px-4 xl:w-1/4">
          <!-- Column Content -->
          <div class="p-2">
            <div class="flex flex-col bg-white rounded-lg shadow border border-gray-100">
              <div class="flex items-center p-6">
                <div class="flex w-13 h-13 bg-red-600 p-2 mr-4 rounded-lg justify-center items-center">
                    <svg class="text-white w-6 h-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path></svg>
                </div>
                <div>
                  <span class="text-gray-600 text-sm leading-tight">Submitted enquiries</span>
                  <h2 class="text-gray-900 text-3xl font-semibold leading-none">2</h2>
                </div>
              </div>
              <div class="bg-gray-100 px-6 py-4 rounded-b-lg">
                <a class="text-sm text-indigo-500 hover:text-indigo-600 font-semibold" href="">View all</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </main>
</div>

@endsection
