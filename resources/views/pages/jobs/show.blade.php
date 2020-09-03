@extends('layouts.app')

@section('css')
    <style>
        h2 {
            font-size: 1.4rem;
            line-height: 2rem;
            padding-bottom: 5px;
            color:#1a202c;
        }
        .content p {
            padding-bottom: 1rem;
        }
        .content p, strong, del, em, blockquote, ul, ol {
            font-size: 1rem;
            color: #2d3748;
        }
        .content a {
            text-decoration: underline;
            color: #667eea;
            font-weight: bold;
        }
        .content a:hover {
            color: #5a67d8;
        }
        .content blockquote {
            color: #718096;
            padding: 10px;
            font-style: italic;
        }
        .content blockquote::before, .content blockquote::after {
            content: '"';
        }
        .content ul {
            list-style: disc;
        }
        .content ol {
            list-style: decimal;
        }
        .content ul li, .content ol li {
            padding-bottom: 5px;
        }
        @media only screen and (max-width: 640px) {
            h2 {
                font-size: 1.2rem;
                line-height: 1.4rem;
            }
        }
    </style>
@endsection

@section('content')
    <section class="py-16 md:py-32 pb-4">
        <div class="flex inline-flex text-gray-400 text-xs md:text-sm items-center my-2">
            <a class="text-gray-500 hover:text-gray-600" href="/">All jobs</a>

            <svg class="block w-4 mx-1" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"></path></svg>

            <a class="text-gray-500 hover:text-gray-600" href="{{route('jobs.category.index', $category)}}">{{$category->name}}</a>

            <svg class="block w-4 mx-1" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 5l7 7-7 7"></path></svg>

            <a class="text-gray-600 cursor-default">{{$job->title}}</a>
        </div>
        <div class="shadow rounded-lg">
            <div class="bg-indigo-100 rounded-t-lg border-t border-b-0 border-gray-200 p-8 md:p-16">
                <!-- <div class="w-auto h-auto mb-4">
                    <img class="block w-10 md:w-16 mx-auto rounded-full" src="https://www.staralliance.com/documents/20184/442914180/Round+the+World.png?v=latest" alt="Company logo">
                </div> -->
                <span class="flex justify-center text-sm md:text-base text-gray-500 mb-4 md:mb-6">Acme Ltd.</span>
                <h1 class="text-gray-900 text-lg md:text-3xl text-center tracking-wide leading-10 font-bold mb-2 md:mb-4">{{$job->title}}</h1>
                <div class="relative flex justify-center">
                    <a href="{{$job->link_to_apply}}"
                        target="_blank"
                        class="md:hidden w-full absolute bottom-0 -mb-13 rounded-md shadow-sm mx-auto whitespace-no-wrap inline-flex items-center justify-center px-4 py-2 md:px-6 md:py-4 border border-transparent text-base md:text-lg leading-6 font-medium rounded-md text-white focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 btn-hover color-indigo">
                        Apply for this role
                    </a>

                    <a
                        href="{{$job->link_to_apply}}"
                        target="_blank"
                        class="hidden md:block absolute bottom-0 -mb-22 rounded-md shadow-sm mx-auto whitespace-no-wrap inline-flex items-center justify-center px-4 py-2 md:px-6 md:py-4 border border-transparent text-base md:text-lg leading-6 font-medium rounded-md text-white focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 btn-hover color-indigo">
                        Apply for this role
                    </a>
                    <span class="hidden md:block absolute bottom-0 -mb-28 text-xs text-gray-500">redirects to {{parse_url($job->link_to_apply, PHP_URL_HOST)}}</span>
                    <span class="block md:hidden absolute bottom-0 -mb-18 text-tiny text-gray-500">redirects to {{parse_url($job->link_to_apply, PHP_URL_HOST)}}</span>
                </div>
            </div>
            <div class="bg-white rounded-b-lg border-b border-t-0 border-gray-200 p-8 md:p-24 md:pb-16">
                <div class="flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">
                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-600 sm:mr-6">
                        <svg class="flex-shrink-0 mr-1 h-5 w-5 text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        {{$job->category->name}}
                    </div>
                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-600 sm:mr-6">
                        <svg class="flex-shrink-0 mr-1 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/>
                          <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/>
                        </svg>
                        {{$job->type}}
                    </div>
                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-600 sm:mr-6">
                        <svg class="flex-shrink-0 mr-1 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                        </svg>
                        {{$job->location}}
                    </div>
                    @if($job->salary)
                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-600 sm:mr-6">
                        <svg class="flex-shrink-0 mr-1 h-5 w-5 text-gray-500" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        {{$job->salary}}
                    </div>
                    @endif
                    <div class="mt-2 flex items-center text-sm leading-5 text-gray-600">
                        <svg class="flex-shrink-0 mr-1 h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                        </svg>
                        Closing on January 9, 2020
                    </div>
                </div>
                <div class="w-24 border-2 border-indigo-100 my-6 md:my-12 rounded-lg"></div>
                <div class="text-gray-900 text-sm md:text-base mb-4 leading-relaxed content">
                    {!! $job->description !!}
                </div>
                <div class="w-24 border-2 border-indigo-100 my-6 md:my-12 rounded-lg"></div>
                <div class="flex justify-center mt-6 md:mt-12">
                    <a href="#" class="rounded-md w-full md:w-auto shadow-sm mx-auto whitespace-no-wrap inline-flex items-center justify-center px-4 py-2 md:px-6 md:py-4 border border-transparent text-base md:text-lg leading-6 font-medium rounded-md text-white focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150 btn-hover color-indigo">
                        Apply for this role
                    </a>
                </div>
                <span class="text-tiny md:text-xs text-gray-500 text-center mx-auto block mt-2">redirects to www.domain.com</span>
            </div>
        </div>
        <div class="mt-2 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap">
            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6 cursor-pointer group hover:text-indigo-600">
                <svg class="flex-shrink-0 mr-1 h-4 w-4 text-gray-400 group-hover:text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.07C24 5.41 18.63 0 12 0S0 5.4 0 12.07C0 18.1 4.39 23.1 10.13 24v-8.44H7.08v-3.49h3.04V9.41c0-3.02 1.8-4.7 4.54-4.7 1.31 0 2.68.24 2.68.24v2.97h-1.5c-1.5 0-1.96.93-1.96 1.89v2.26h3.32l-.53 3.5h-2.8V24C19.62 23.1 24 18.1 24 12.07"/></svg>
                Share on Facebook
            </div>
            <div class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6 cursor-pointer group hover:text-indigo-600">
                <svg class="flex-shrink-0 mr-1 h-4 w-4 text-gray-400 group-hover:text-indigo-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M24 4.37a9.6 9.6 0 0 1-2.83.8 5.04 5.04 0 0 0 2.17-2.8c-.95.58-2 1-3.13 1.22A4.86 4.86 0 0 0 16.61 2a4.99 4.99 0 0 0-4.79 6.2A13.87 13.87 0 0 1 1.67 2.92 5.12 5.12 0 0 0 3.2 9.67a4.82 4.82 0 0 1-2.23-.64v.07c0 2.44 1.7 4.48 3.95 4.95a4.84 4.84 0 0 1-2.22.08c.63 2.01 2.45 3.47 4.6 3.51A9.72 9.72 0 0 1 0 19.74 13.68 13.68 0 0 0 7.55 22c9.06 0 14-7.7 14-14.37v-.65c.96-.71 1.79-1.6 2.45-2.61z"/></svg>
                Share on Twitter
            </div>
            <a href="" class="mt-2 flex items-center text-sm leading-5 text-gray-500 sm:mr-6 cursor-pointer group hover:text-indigo-600">
                <svg class="flex-shrink-0 mr-1 h-4 w-4 text-gray-400 group-hover:text-indigo-600" xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 24" fill="currentColor"><path d="M22.23 0H1.77C.8 0 0 .77 0 1.72v20.56C0 23.23.8 24 1.77 24h20.46c.98 0 1.77-.77 1.77-1.72V1.72C24 .77 23.2 0 22.23 0zM7.27 20.1H3.65V9.24h3.62V20.1zM5.47 7.76h-.03c-1.22 0-2-.83-2-1.87 0-1.06.8-1.87 2.05-1.87 1.24 0 2 .8 2.02 1.87 0 1.04-.78 1.87-2.05 1.87zM20.34 20.1h-3.63v-5.8c0-1.45-.52-2.45-1.83-2.45-1 0-1.6.67-1.87 1.32-.1.23-.11.55-.11.88v6.05H9.28s.05-9.82 0-10.84h3.63v1.54a3.6 3.6 0 0 1 3.26-1.8c2.39 0 4.18 1.56 4.18 4.89v6.21z"/></svg>
                Share on LinkedIn
            </a>
        </div>
    </section>
@endsection
