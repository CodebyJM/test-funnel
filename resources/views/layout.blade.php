<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- No Index-->
    <meta name="robots" content="noindex">

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
    <script src="{{ url('assets/bundle.min.js') }}"></script>

    {{-- tracking code here --}}
    
</head>
<body class="antialiased min-h-screen bg-gray-100">

    <div id="app" class="flex flex-col h-screen justify-between">
        
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
            
                    <div class="flex-shrink-0 flex items-center">
                        <img class="block h-16 md:h-20 w-auto" src="https://clarityxdna.com/wp-content/uploads/2021/06/logo-design-1.svg" alt="ClarityXDNA">
                    </div>

                    <div class="flex items-center">
                        <span class="mr-2 hidden sm:block text-gray-800">Need Help?</span>
                        <a href="tel:8665131891" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none">
                            <span class="hidden sm:inline-block">Call: 866-513-1891</span> 
                            <span class="sm:hidden">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-flex items-center text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                Call Now
                            </span>
                        </a>
                    </div>

                </div>
            </div>
        </nav>
        

        <main v-cloak class="px-3 py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-2xl">

                    @yield('main')

                </div>
            </div>
        </main>


        <footer>
            <div class="max-w-7xl mx-auto py-4 px-3 overflow-hidden sm:px-6">
                <center>
                    <img class="h-10 w-auto" src="{{ url('assets/hipaa-badge.png') }}">
                </center>
            </div>
        </footer>

    </div>

    @yield('scripts')

</body>
</html>