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

    <link rel="stylesheet" href="../../public/assets/bundle.min.css">
    <script src="{{ url('assets/bundle.min.js') }}"></script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-159755893-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-159755893-2');
    </script>

    <!-- Hotjar Tracking Code for https://form.clarityxdna.com -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:2571754,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>

    <!-- Taboola Pixel Code -->
    <script type='text/javascript'>
      window._tfa = window._tfa || [];
      window._tfa.push({notify: 'event', name: 'page_view', id: 1388801});
      !function (t, f, a, x) {
             if (!document.getElementById(x)) {
                t.async = 1;t.src = a;t.id=x;f.parentNode.insertBefore(t, f);
             }
      }(document.createElement('script'),
      document.getElementsByTagName('script')[0],
      '//cdn.taboola.com/libtrc/unip/1388801/tfa.js',
      'tb_tfa_script');
    </script>
    <!-- End of Taboola Pixel Code -->

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MKPTN5J');</script>
    <!-- End Google Tag Manager -->

</head>
<body class="antialiased min-h-screen bg-gray-100">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MKPTN5J" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

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
                    <img class="h-10 w-auto" src="../../public/assets/hipaa-badge.png">
                </center>
            </div>
        </footer>

    </div>

    @yield('scripts')

</body>
</html>