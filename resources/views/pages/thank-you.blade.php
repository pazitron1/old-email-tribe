@extends('layouts.app')

@section('content')
    <div>
        <div class="py-16 md:py-32 h-screen">
            <h1 class="text-indigo-600 text-lg md:text-3xl text-center tracking-wide leading-10 font-bold pt-24">Thank you for creating a listing!</h1>
            <h2 class="text-gray-800 text-base md:text-xl text-center leading-10 font-normal pt-12">We'll review your listing to make sure it is perfect and get back to you within 24 hours with a confirmation</h2>
            <div class="w-full flex items-center justify-center py-6">
                <a href="/" class="whitespace-no-wrap text-center border border-solid border-indigo-600 hover:border-indigo-400 px-4 py-2 border border-transparent text-sm leading-6 font-medium rounded-md text-white focus:outline-none text-indigo-600 bg-white hover:text-indigo-400 transition ease-in-out duration-150">
                Back home
            </a>
            </div>

        </div>
    </div>
@endsection
