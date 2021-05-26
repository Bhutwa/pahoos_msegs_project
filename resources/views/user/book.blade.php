
@extends('layouts.app')
@section('content')   
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo"> <i class='bx bxs-car-garage nav_logo-icon'></i> <span class="nav_logo-name">PahooS</span> </a>
                <div class="nav_list"> 
                    <a href="#" class="nav_link active"> 
                        <i class='bx bx-grid-alt nav_icon'></i> 
                        <span class="nav_name">Home</span> 
                    </a> 
                    <a href="/user/book" class="nav_link"> 
                        <i class='bx bx-key nav_icon'></i> 
                        <span class="nav_name">Book</span>
                    </a> 
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-message-square-detail nav_icon'></i> 
                        <span class="nav_name">Messages</span>
                    </a>
                    <a href="#" class="nav_link"> 
                        <i class='bx bx-bookmark nav_icon'></i> 
                        <span class="nav_name">Bookmark</span> </a>
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
    </div>
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
       
    <div class="card">
        <div class="card-header" style="text-align:center">Book Parking Slot</div>
            <div class="card-body" style="text-align:center">
                <div class="form-group">
                <label for="country" style="text-allign:center">Select Location:</label>
                    <form action="{{route('bookings.create')}}" method="get">
                        <select name="slot_location" id="slot_location"class="form-control" style="text-align-last:center; width:250px;">
                            <option value="" >Select Location</option>
                            @foreach ($slots as $location)
                            <option value="{{ $location->location }}" >{{$location->location}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">            
                        <label for="start" >From:</label>
                        <input id="start" type="time" class="col-4 form-control" name="start" value="00:00:00" style="text-allign:center" >
                    </div>
                    <div class="form-group">
                        <label for="end" >To:</label>
                        <input id="end" type="time" class="col-4 form-control" name="end" value="01:00:00" style="text-allign:center" >
                    </div>    
                        <input type="submit" class="btn btn-secondary" value="Book Now ->" >                        
                    </form>  
                </div>
            </div>
        </div>
    </div>
    <!--Container Main end-->
@endsection

