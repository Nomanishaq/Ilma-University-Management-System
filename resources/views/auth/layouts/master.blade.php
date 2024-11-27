<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        
         @include('admin.layouts.common.header_script')

         <style type="text/css" media="screen">
             h3 {
                font-size: 18px;
             }
             .auth-logo {
                position: absolute;
                left: 40px;
                top: 10px;
                overflow: hidden;
             }
             .auth-logo img {
                max-height: 100px;
                max-width: 100px;
             }

             @media screen and (max-width: 767px) {
                .auth-logo img {
                    max-height: 70px;
                }
             }
         </style>

    </head>
    <body>

        <div class="auth-wrapper">            
            <div class="auth-content">
               

                <!-- Start Content-->
                @yield('content')
                <!-- End Content-->
                
            </div>
        </div>

        @include('admin.layouts.common.footer_script')
    </body>
</html>