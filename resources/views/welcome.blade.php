<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Historia Tasa BCV</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('united/bootstrap.css') }}" rel="stylesheet">
  		<link href="{{ asset('/fontawesome-5.13/css/all.css') }}" rel="stylesheet">
  		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

        <!-- Styles -->
        {{-- <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style> --}}

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-image: url("/img/City-Market.jpg") ;
                background-position: top;
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            {{-- <p class="text-end"> --}}
                @if (Route::has('login'))
                    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block text-end">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline text-end">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline text-end"> . </a>

                            {{-- @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline text-end">Register</a>
                            @endif --}}
                        @endauth
                    </div>
                @endif
            {{-- </p> --}}

<center>

            {{-- <div class="max-w-6xl mx-auto sm:px-6 lg:px-8"> --}}
                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                	<div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
                		<center>
                			<div class="card-header">TASA BCV <br>
                			<?php
                			SetLocale(LC_TIME, "spanish");
                			echo utf8_encode(strftime("%A, %d de %B de %Y"));

                			?>
                			</div>
                		</center>
				  	<div class="card-body">
				    	<h4 class="card-title"> </h4>
				    	<p class="card-text">

				    	<?php

$arrContextOptions=array(
        "ssl"=>array("verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );



$data = file_get_contents("http://www.bcv.org.ve/", false, stream_context_create($arrContextOptions));

	if ( preg_match('|<div id="euro" class="col-sm-12 col-xs-12 ">\s+<div class="field-content">\s+<div class="row recuadrotsmc">\s+<div class="col-sm-6 col-xs-6">\s+<img src="/sites/default/files/euro-04_2.png" class="icono_bss_blanco1">\s+<span> EUR </span>\t </div>\s+<div class="col-sm-6 col-xs-6 centrado"><strong>(.*?)</strong> </div>\s+</div>\s+</div>\s+</div>|is' , $data , $cap ) )

	{
		echo "EUR: " .$cap[1];
		echo nl2br(" \n \n ");

	}



	if ( preg_match('|<div id="yuan" class="col-sm-12 col-xs-12">\s+<div class="field-content">\s+<div class="row recuadrotsmc">\s+<div class="col-sm-6 col-xs-6">\s+<img src="/sites/default/files/yuan-04_2.png" class="icono_bss_blanco1">\s+<span> CNY </span>\t </div>\s+<div class="col-sm-6 col-xs-6 centrado"><strong>(.*?)</strong> </div>\s+</div>\s+</div>\s+</div>|is' , $data , $cap1 ) )

	{
		echo "CNY: " .$cap1[1];
		echo nl2br(" \n \n ");

	}


	if ( preg_match('|<div id="lira" class="col-sm-12 col-xs-12">\s+<div class="field-content">\s+<div class="row recuadrotsmc">\s+<div class="col-sm-6 col-xs-6">\s+<img src="/sites/default/files/default_images/lirat-04_0.png" class="icono_bss_blanco1">\s+<span> TRY</span>\t </div>\s+<div class="col-sm-6 col-xs-6 centrado"><strong>(.*?)</strong> </div>\s+</div>\s+</div>\s+</div>|is' , $data , $cap2 ) )

	{
		echo "TRY: " .$cap2[1];
		echo nl2br(" \n \n ");

	}

	if ( preg_match('|<div id="rublo" class="col-sm-12 col-xs-12 ">\s+<div class="field-content">\s+<div class="row recuadrotsmc">\s+<div class="col-sm-6 col-xs-6">\s+<img src="/sites/default/files/rublo-04_2.png" class="icono_bss_blanco1">\s+<span> RUB</span>\t </div>\s+<div class="col-sm-6 col-xs-6 centrado"><strong>(.*?)</strong> </div>\s+</div>\s+</div>\s+</div>|is' , $data , $cap3 ) )

	{
		echo "RUB: " .$cap3[1];
		echo nl2br(" \n \n ");

	}


	if ( preg_match('|<div id="dolar" class="col-sm-12 col-xs-12 ">\s+<div class="field-content">\s+<div class="row recuadrotsmc">\s+<div class="col-sm-6 col-xs-6">\s+<img src="/sites/default/files/dollar-04_2.png" class="icono_bss_blanco1">\s+<span> USD</span>\s+</div>\s+<div class="col-sm-6 col-xs-6 centrado"><strong>(.*?)</strong> </div>\s+</div>\s+</div>\s+</div>|is' , $data , $cap4 ) )

	{
		echo "USD: " .$cap4[1];
		echo nl2br(" \n \n ");
	}

	if ( preg_match('|<div class="pull-right dinpro center">\s+Fecha Valor: <span class="date-display-single" property="dc:date" datatype="xsd:dateTime" content="2021-11-09T00:00:00-04:00">(.*?)</span>|is' , $data , $cap5 ) )
	{
		echo $cap5[1];
	}

?>
						</p>
				  	</div>
					</div>
                </div>
</center>
                {{-- <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div> --}}
            </div>
        </div>
    </body>
</html>
