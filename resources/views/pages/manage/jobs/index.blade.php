@extends('layouts.manage')
@section('content')
<div>
  <header class="bg-white shadow mt-16 mb-16">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold leading-tight text-gray-900">
        Jobs
      </h1>
    </div>
  </header>

  <main class="bg-gray-100">
    <div class="max-w-7xl mx-4 my-6 sm:mx-6 lg:mx-8">
        <div>
            <div class="pb-4 mb-4 sm:flex sm:items-baseline sm:justify-between border-b border-gray-300">
                <h2 class="text-2xl leading-8 font-semibold tracking-tight font-display text-gray-900 sm:text-2xl sm:leading-9">
                    Unapproved
                </h2>
            </div>
        </div>
        @foreach($unapproved_jobs as $job)
            <div class="lg:flex lg:items-center lg:justify-between mb-8 opacity-75">
                <div class="flex-1 min-w-0">
                    <h2 class="relative text-md font-bold leading-7 text-gray-900 sm:text-xl sm:leading-9 sm:truncate">
                        {{$job->title}}
                        <span class="text-tiny sm:text-xs text-white bg-gray-600 px-1 sm:px-2 py-px rounded-lg">Pending approval</span>
                        @if($job->approved == true)
                            <span class="text-tiny sm:text-xs text-green-700 bg-green-200 px-1 sm:px-2 py-px rounded-lg">Approved</span>
                        @endif
                    </h2>
                    <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">
                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6">
                          <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                          {{$job->company}}
                        </div>
                        @if($job->salary)
                            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 hover:text-indigo-600 cursor-pointer sm:mr-6">
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 9a2 2 0 10-4 0v5a2 2 0 01-2 2h6m-6-4h4m8 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{$job->salary}}
                            </div>
                        @endif
                        <a href="{{$job->link_to_apply}}" target="_blank" class="mt-2 flex items-center text-sm leading-5 text-gray-500 hover:text-indigo-600 cursor-pointer sm:mr-6">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                            {{parse_url($job->link_to_apply)['host']}}
                        </a>
                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6">
                          <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                          Created {{$job->created_at->diffForHumans()}}
                        </div>
                    </div>
                </div>
                <div class="mt-5 flex lg:mt-0 lg:ml-4">
                    <manage-job-status :job-object="{{$job}}" inline-template>
                        <span class="hidden sm:block shadow-sm rounded-md">
                            <button
                                @click="changeStatus"
                                class="inline-flex items-center px-4 py-2 border border-green-300 text-sm leading-5 font-medium rounded-md text-green-700 bg-white hover:text-green-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-green-800 active:bg-green-50 transition duration-150 ease-in-out">

                                <svg class="-ml-1 mr-2 h-5 w-5 text-green-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5"></path></svg>
                                Approve
                            </button>
                            <flash-success v-if="showSuccessMessage" :message="message" header="Success!"></flash-success>
                        </span>
                    </manage-job-status>

                    <span class="hidden sm:block ml-3 shadow-sm rounded-md">
                        <a
                            href="{{route('manage.jobs.edit', $job->slug)}}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                          <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                          </svg>
                          Edit
                        </a>
                    </span>

                    <span class="hidden sm:block ml-3 shadow-sm rounded-md">
                        <a
                            href="{{route('jobs.show', [$job->category->slug, $job->slug])}}"
                            target="_blank"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
                            </svg>
                            View
                        </a>
                    </span>
                    <manage-job-delete :job-object="{{$job}}" inline-template>
                        <span class="sm:ml-3 shadow-sm rounded-md">
                            <button
                                @click="deleteJob"
                                type="button"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:shadow-outline-red focus:border-red-700 active:bg-red-700 transition duration-150 ease-in-out">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                Delete
                            </button>
                            <flash-success v-if="showSuccessMessage" :message="message" header="Success!"></flash-success>
                        </span>
                    </manage-job-delete>

                    <!-- Dropdown -->
                    <span class="ml-3 relative shadow-sm rounded-md sm:hidden">
                        <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:shadow-outline focus:border-blue-300 transition duration-150 ease-in-out" id="mobile-menu" aria-haspopup="true">
                          More
                            <svg class="-mr-1 ml-2 h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!--
                          Dropdown panel, show/hide based on dropdown state.

                          Entering: "transition ease-out duration-200"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                          Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                        <div class="origin-top-right absolute right-0 mt-2 -mr-1 w-48 rounded-md shadow-lg" aria-labelledby="mobile-menu" role="menu">
                            <div class="py-1 rounded-md bg-white shadow-xs">
                                <a href="{{route('manage.jobs.edit', $job->slug)}}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">Edit</a>
                                <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">View</a>
                            </div>
                        </div>
                    </span>
                </div>
            </div>
        @endforeach

        <div>
            <div class="mt-16 pb-4 mb-4 sm:flex sm:items-baseline sm:justify-between border-b border-gray-300">
                <h2 class="text-2xl leading-8 font-semibold tracking-tight font-display text-gray-900 sm:text-2xl sm:leading-9">
                    Active
                </h2>
            </div>
        </div>
        @foreach($approved_active_jobs as $job)
            <div class="lg:flex lg:items-center lg:justify-between mb-8">
                <div class="flex-1 min-w-0">
                    <h2 class="relative text-md font-bold leading-7 text-gray-900 sm:text-xl sm:leading-9 sm:truncate">
                        {{$job->title}}
                        @if($job->approved == true)
                            <span class="text-tiny sm:text-xs text-green-700 bg-green-200 px-1 sm:px-2 py-px rounded-lg">Approved</span>
                        @endif
                        @if($job->expired($job))
                        <span class="text-tiny sm:text-xs text-red-700 bg-red-200 px-1 sm:px-2 py-px rounded-lg">Expired</span>
                        @endif
                    </h2>
                    <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">
                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6">
                          <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                          {{$job->company}}
                        </div>
                        @if($job->salary)
                            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 hover:text-indigo-600 cursor-pointer sm:mr-6">
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 9a2 2 0 10-4 0v5a2 2 0 01-2 2h6m-6-4h4m8 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{$job->salary}}
                            </div>
                        @endif
                        <a href="{{$job->link_to_apply}}" target="_blank" class="mt-2 flex items-center text-sm leading-5 text-gray-500 hover:text-indigo-600 cursor-pointer sm:mr-6">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                            {{parse_url($job->link_to_apply)['host']}}
                        </a>
                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                            Closing on {{$job->expirationDate($job)}}
                        </div>
                    </div>
                </div>
                <div class="mt-5 flex lg:mt-0 lg:ml-4">
                    <manage-job-status :job-object="{{$job}}" inline-template>
                        <span class="hidden sm:block shadow-sm rounded-md">
                            <button
                                @click="changeStatus"
                                class="inline-flex items-center px-4 py-2 border border-red-300 text-sm leading-5 font-medium rounded-md text-red-700 bg-white hover:text-red-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-red-800 active:bg-red-50 transition duration-150 ease-in-out">

                                <svg class="-ml-1 mr-2 h-5 w-5 text-red-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M10 14H5.236a2 2 0 01-1.789-2.894l3.5-7A2 2 0 018.736 3h4.018a2 2 0 01.485.06l3.76.94m-7 10v5a2 2 0 002 2h.096c.5 0 .905-.405.905-.904 0-.715.211-1.413.608-2.008L17 13V4m-7 10h2m5-10h2a2 2 0 012 2v6a2 2 0 01-2 2h-2.5"></path></svg>
                                Disapprove
                            </button>
                        <flash-success v-if="showSuccessMessage" :message="message" header="Success!"></flash-success>
                        </span>
                    </manage-job-status>

                    <span class="hidden sm:block ml-3 shadow-sm rounded-md">
                        <a
                            href="{{route('manage.jobs.edit', $job->slug)}}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            Edit
                        </a>
                    </span>

                    <span class="hidden sm:block ml-3 shadow-sm rounded-md">
                        <a
                            href="{{route('jobs.show', [$job->category->slug, $job->slug])}}"
                            target="_blank"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
                            </svg>
                            View
                        </a>
                    </span>
                    <manage-job-delete :job-object="{{$job}}" inline-template>
                        <span class="sm:ml-3 shadow-sm rounded-md">
                            <button
                                @click="deleteJob"
                                type="button"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:shadow-outline-red focus:border-red-700 active:bg-red-700 transition duration-150 ease-in-out">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                Delete
                            </button>
                            <flash-success v-if="showSuccessMessage" :message="message" header="Success!"></flash-success>
                        </span>
                    </manage-job-delete>

                    <!-- Dropdown -->
                    <span class="ml-3 relative shadow-sm rounded-md sm:hidden">
                        <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:shadow-outline focus:border-blue-300 transition duration-150 ease-in-out" id="mobile-menu" aria-haspopup="true">
                          More
                            <svg class="-mr-1 ml-2 h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!--
                          Dropdown panel, show/hide based on dropdown state.

                          Entering: "transition ease-out duration-200"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                          Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                        <div class="origin-top-right absolute right-0 mt-2 -mr-1 w-48 rounded-md shadow-lg" aria-labelledby="mobile-menu" role="menu">
                            <div class="py-1 rounded-md bg-white shadow-xs">
                                <a href="{{route('manage.jobs.edit', $job->slug)}}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">Edit</a>
                                <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">View</a>
                            </div>
                        </div>
                    </span>
                </div>
            </div>
        @endforeach

        <div>
            <div class="mt-16 pb-4 mb-4 sm:flex sm:items-baseline sm:justify-between border-b border-gray-300">
                <h2 class="text-2xl leading-8 font-semibold tracking-tight font-display text-gray-900 sm:text-2xl sm:leading-9">
                    Expired
                </h2>
            </div>
        </div>
        @foreach($approved_expired_jobs as $job)
            <div class="lg:flex lg:items-center lg:justify-between mb-8 opacity-75">
                <div class="flex-1 min-w-0">
                    <h2 class="relative text-md font-bold leading-7 text-gray-900 sm:text-xl sm:leading-9 sm:truncate">
                        {{$job->title}}
                        @if($job->expired($job))
                        <span class="text-tiny sm:text-xs text-red-700 bg-red-200 px-1 sm:px-2 py-px rounded-lg">Expired</span>
                        @endif
                    </h2>
                    <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">
                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6">
                          <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                          {{$job->company}}
                        </div>
                        @if($job->salary)
                            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 hover:text-indigo-600 cursor-pointer sm:mr-6">
                                <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 9a2 2 0 10-4 0v5a2 2 0 01-2 2h6m-6-4h4m8 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                {{$job->salary}}
                            </div>
                        @endif
                        <a href="{{$job->link_to_apply}}" target="_blank" class="mt-2 flex items-center text-sm leading-5 text-gray-500 hover:text-indigo-600 cursor-pointer sm:mr-6">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                            {{parse_url($job->link_to_apply)['host']}}
                        </a>
                        <div class="mt-2 flex items-center text-sm leading-5 text-gray-500">
                            <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                              <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                            Expired on {{$job->expirationDate($job)}}
                        </div>
                    </div>
                </div>
                <div class="mt-5 flex lg:mt-0 lg:ml-4">
                    <span class="hidden sm:block shadow-sm rounded-md">
                        <button
                            class="inline-flex items-center px-4 py-2 border border-green-300 text-sm leading-5 font-medium rounded-md text-green-700 bg-white hover:text-green-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-green-800 active:bg-green-50 transition duration-150 ease-in-out">

                            <svg class="-ml-1 mr-2 h-5 w-5 text-green-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>

                            Reactivate
                        </button>
                    </span>

                    <span class="hidden sm:block ml-3 shadow-sm rounded-md">
                        <a
                            href="{{route('manage.jobs.edit', $job->slug)}}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 transition duration-150 ease-in-out">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            Edit
                        </a>
                    </span>

                    <span class="hidden sm:block ml-3 shadow-sm rounded-md">
                        <a
                            href="{{route('jobs.show', [$job->category->slug, $job->slug])}}"
                            target="_blank"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:text-gray-800 active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.586 4.586a2 2 0 112.828 2.828l-3 3a2 2 0 01-2.828 0 1 1 0 00-1.414 1.414 4 4 0 005.656 0l3-3a4 4 0 00-5.656-5.656l-1.5 1.5a1 1 0 101.414 1.414l1.5-1.5zm-5 5a2 2 0 012.828 0 1 1 0 101.414-1.414 4 4 0 00-5.656 0l-3 3a4 4 0 105.656 5.656l1.5-1.5a1 1 0 10-1.414-1.414l-1.5 1.5a2 2 0 11-2.828-2.828l3-3z" clip-rule="evenodd" />
                            </svg>
                            View
                        </a>
                    </span>

                    <manage-job-delete :job-object="{{$job}}" inline-template>
                        <span class="sm:ml-3 shadow-sm rounded-md">
                            <button
                                @click="deleteJob"
                                type="button"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 hover:bg-red-500 focus:outline-none focus:shadow-outline-red focus:border-red-700 active:bg-red-700 transition duration-150 ease-in-out">
                                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                Delete
                            </button>
                            <flash-success v-if="showSuccessMessage" :message="message" header="Success!"></flash-success>
                        </span>
                    </manage-job-delete>

                    <!-- Dropdown -->
                    <span class="ml-3 relative shadow-sm rounded-md sm:hidden">
                        <button type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm leading-5 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:shadow-outline focus:border-blue-300 transition duration-150 ease-in-out" id="mobile-menu" aria-haspopup="true">
                          More
                            <svg class="-mr-1 ml-2 h-5 w-5 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!--
                          Dropdown panel, show/hide based on dropdown state.

                          Entering: "transition ease-out duration-200"
                            From: "transform opacity-0 scale-95"
                            To: "transform opacity-100 scale-100"
                          Leaving: "transition ease-in duration-75"
                            From: "transform opacity-100 scale-100"
                            To: "transform opacity-0 scale-95"
                        -->
                        <div class="origin-top-right absolute right-0 mt-2 -mr-1 w-48 rounded-md shadow-lg" aria-labelledby="mobile-menu" role="menu">
                            <div class="py-1 rounded-md bg-white shadow-xs">
                                <a href="{{route('manage.jobs.edit', $job->slug)}}" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">Edit</a>
                                <a href="#" class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out" role="menuitem">View</a>
                            </div>
                        </div>
                    </span>
                </div>
            </div>
        @endforeach
    </div>
  </main>
</div>

@endsection
