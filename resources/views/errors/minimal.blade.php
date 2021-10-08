<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Find The Right Medication Based on your DNA</title>

    <meta name="description" content="The ClarityX DNA test helps you understand how your DNA can affect your medications. Take the first step with an easy in-home saliva test." />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Find the Right Medication Based on your DNA" />
    <meta property="og:description" content="The ClarityX DNA test helps you understand how your DNA can affect your medications. Take the first step with an easy in-home saliva test." />
    <meta property="og:url" content="https://form.clarityxdna.com/" />
    <meta property="og:site_name" content="ClarityX DNA" />
    <meta property="og:image" content="https://clarityxdna.com/wp-content/uploads/2021/03/clarity-home-hero.jpeg" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="801" />

    <link rel="icon" href="{{ url('assets/favicon.png') }}" sizes="32x32" />
    <link rel="stylesheet" href="{{ url('assets/bundle.min.css') }}">

</head>

<div class="min-h-screen pt-16 pb-12 flex flex-col bg-white animate-page-transition">
    <main class="flex-grow flex flex-col justify-center max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex-shrink-0 flex justify-center">
            <a href="/" class="inline-flex">
                <img class="h-28 w-auto" src="https://clarityxdna.com/wp-content/uploads/2021/06/logo-design-1.svg" alt="ClarityXDNA">
            </a>
        </div>

        <div class="py-20">
            <div class="text-center">
                <p class="text-lg font-semibold text-gray-700 uppercase tracking-wide">@yield('code') error</p>
                <h1 class="mt-2 text-4xl font-extrabold text-gray-800 tracking-tight">@yield('title')</h1>
                <p class="mt-2 text-base text-gray-500">@yield('message')</p>
                
                <div class="mt-6">
                    <a href="/" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Go back home &nbsp;<span aria-hidden="true">&rarr;</span></a>
                </div>
            </div>
        </div>

    </main>
</div>

</body>
</html>