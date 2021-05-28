@extends('layouts.app')
{{-- {{dd($bookingdetails)}} --}}
{!! $map['js'] !!}
@section('content')   
    {{-- <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bxs-car-garage nav_logo-icon'></i> <span class="nav_logo-name">PahooS</span> </a>
                <div class="nav_list"> 
                    <a href="/home" class="nav_link active"> 
                        <i class='bx bx-grid-alt nav_icon'></i> 
                        <span class="nav_name">Home</span> 
                    </a> 
                    <a href="{{route('slots.index')}}" class="nav_link"> 
                        <i class='bx bx-key nav_icon'></i> 
                        <span class="nav_name">Book</span>
                    </a> 
                    <a href="/googlemap" class="nav_link"> 
                        <i class='bx bx-map nav_icon'></i> 
                        <span class="nav_name">Slots</span>
                    </a>
                    <a href="/feedback" class="nav_link"> 
                        <i class='bx bx-bookmark nav_icon'></i> 
                        <span class="nav_name">Feedback</span> </a>
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-folder nav_icon'></i> 
                        <span class="nav_name">Files</span> </a> 
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
                        <span class="nav_name">Stats</span> 
                    </a>
                </div>
            </div> 
                                              
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav_link"> 
                <i class='bx bx-log-out nav_icon'></i> 
                <span class="nav_name">SignOut</span> 
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
            </form>
            
        </nav>
    </div> --}}
    @include('layouts.usersidebar')
    <!--Container Main start-->
    <div class="container">
        {!! $map['html'] !!}
</div>
    <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-cE1bO24hAFSmGEB0x3cy6OywtD-7SNk">
</script>
    <!--Container Main end-->
@endsection