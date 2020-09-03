@extends('layouts.app')

@section('content')
    <section class="pt-20 md:pt-32">
        <img class="hidden md:block max-w-lg mx-auto mb-4" src="https://placehold.co/512x321" alt="Banner title">
        <h1 class="text-gray-900 text-lg md:text-3xl text-center tracking-wide leading-10 font-bold">Discover the best email jobs</h1>
    </section>

    <search-jobs></search-jobs>
    <job-categories></job-categories>

    <section class="pt-4 md:pt-10">

        <div class="block md:flex space-x-4">

            <all-jobs></all-jobs>

            <div class="w-full md:w-3/12">
                <div class="py-4 px-4 bg-indigo-100 rounded-lg border shadow border-gray-200">
                    <h4 class="text-center text-gray-900 text-base font-semibold mb-6">Get the latest email jobs.</h4>
                    <p class="text-center font-normal text-gray-600 text-xs mb-4">Weekly job updates and content delivered to your inbox</p>
                    <label for="newsletter" class="hidden">Subscribe to newsletter</label>
                    <input type="text" name="newsletter" class="transition-colors duration-100 ease-in-out focus:outline-0 border border-transparent focus:bg-white focus:border-gray-300 placeholder-gray-600 text-sm rounded-lg bg-white sm:shadow md:rounded-lg py-2 pr-4 pl-4 block w-full appearance-none leading-normal" placeholder="john.doe@email.com">
                </div>
                <div class="mt-4 p-4 bg-white rounded-lg">
                    <h3 class="text-center text-gray-900 text-base font-semibold mb-2">Latest email resources</h3>
                    <div class="border-b border-gray-300 py-4">
                        <h4 class="leading-tight font-medium text-gray-800 text-sm mb-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit..</h4>
                    </div>
                    <div class="border-b border-gray-300 py-4">
                        <h4 class="leading-tight font-medium text-gray-800 text-sm mb-2">Dolor sit amet, consectetur adipisicing elit...</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
