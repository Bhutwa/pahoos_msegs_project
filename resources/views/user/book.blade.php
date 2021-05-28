
@extends('layouts.app')
@section('content')   
{{-- <div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div> <a href="/home" class="nav_logo"> <i class='bx bxs-car-garage nav_logo-icon'></i> <span class="nav_logo-name">PahooS</span> </a>
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
       
    <div class="row justify-content-center">
        <div class="col-md-6">
        @if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
       
    <div class="card  border-primary mb-3">
        <div class="card-header" style="text-align:center">Book Parking Slot</div>
            <div class="card-body" >
                <div class="form-group" style="display:flex;flex-wrap: wrap;align-items: center; ">            
                    <label for="start" >From_:</label>
                    <input id="start" type="time" class="col-4 form-control" name="start" value="00:00:00" style="text-allign:center" >
                </div>
                <div class="form-group" style="display:flex;flex-wrap: wrap;align-items: center; ">
                    <label for="end" >To____:</label>
                    <input id="end" type="time" class="col-4 form-control" name="end" value="01:00:00" style="text-allign:center" >
                </div>
                <div class="form-group"style="display:flex;flex-wrap: wrap;align-items: center;" >
                <label for="country" style="display : inline; padding-right : 4px;">Select Location:</label>
                    <form action="{{route('bookings.create')}}" method="get">
                        <select name="slot_location" id="slot_location"class="form-control" style="text-align-last:center; width:225px;margin-left :130px;">
                            <option value="" >Select Location</option>
                            @foreach ($slots as $location)
                            <option value="{{ $location->location }}" >{{$location->location}}</option>
                            @endforeach
                        </select>
                </div>
                        
                        <input type="submit" class="btn btn-secondary" value="Book Now ->" >                        
                    </form>  
                </div>
            </div>
        </div>
    </div>
    <!--Container Main end-->
@endsection

