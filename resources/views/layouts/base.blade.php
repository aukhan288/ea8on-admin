<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @foreach ($styles as $style)
          <link rel="stylesheet" href="{{ $style }}">
        @endforeach
        @foreach ($script as $scrip)
          <script src="{{ $scrip }}"></script>
        @endforeach
      
    
    </head>
    <body>
    <x-header />
    @yield('page')
    <x-Footer />

   
    <script>
    $(document).ready(function() {
    $(window).on('scroll', function() {
      if ($(this).scrollTop() > 50) {
        $('#header_section').css({'background':'#000'})
      }else{
        $('#header_section').css({'background':'#0007'})
      }
    });
  });
  </script>
    </body>
</html>