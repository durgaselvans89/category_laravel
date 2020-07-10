<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    </head>
    <body>
<div class="content">
                <div class="topnav" id="myTopnav">
                @forelse ($categories as $key => $value)
                
                    @if(isset($categories[$key]['menu']) && (count($categories[$key]['menu']) > 0))
                        <div class="dropdown">
                            <button class="dropbtn">{{$categories[$key]['name']}}
                              <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="dropdown-content">
                                @foreach($categories[$key]['menu'] as $key1 => $value1)

                                        @if(isset($categories[$key]['menu'][$key1]['submenu']) && (count($categories[$key]['menu'][$key1]['submenu']) > 0))
                                            <div class="subdropdown">
                                                <button class="subdropbtn">{{$categories[$key]['menu'][$key1]['name']}}
                                                  <i class="fa fa-caret-right"></i>
                                                </button>
                                                <div class="subdropdown-content">
                                                    @foreach($categories[$key]['menu'][$key1]['submenu'] as $key2 => $value2)
                                                            <a href="#">{{$categories[$key]['menu'][$key1]['submenu'][$key2]['name']}}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @else
                                            <a href="#">{{$categories[$key]['menu'][$key1]['name']}}</a>    
                                        @endif
                                @endforeach
                            </div>
                        </div>
                    @else
                        <a href="#">{{$categories[$key]['name']}}</a>    
                    @endif    
                @empty
                        <p>No data found</p>
                @endforelse
                </div>
            
            
        </div>
    </body>
</html>
