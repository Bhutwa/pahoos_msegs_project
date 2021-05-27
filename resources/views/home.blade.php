@extends('layouts.app')
{{-- {{dd($bookingdetails)}} --}}
@section('content')   
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="/" class="nav_logo"> <i class='bx bxs-car-garage nav_logo-icon'></i> <span class="nav_logo-name">PahooS</span> </a>
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
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">           
        <div class="container">
            <div class="container">
                <img src="image/park.png" style="width:100%;height:200px;padding-top:30px;">
            </div> 
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Booking <b>Status/Details</b></h2>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Booking ID</th>
                            <th>Location</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookingdetails as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>PAH000{{$user->id}}</td>
                            <td>{{$user->location}}</td>
                            {{-- <td>{{strtotime($user->start)->format("H:i A")}}</td> --}}
                            <td>{{date('h:i A', strtotime($user->start))}}</td>
                            <td>{{date('h:i A', strtotime($user->end))}}</td>
                            <td>
                                <a href="#editBooking" class="editBooking"  data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                <a href="#deleteBooking" class="deleteBooking"  data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
                <div class="clearfix fixed-bottom" style="padding-left: 1300px">
                    <div class="hint-text">Showing <b>{{$count}}</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item "><a href="#"class="page-link">Previous</a></li>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
       
        <div id="editBooking" class="modal fade">
            <div class="col-6 modal-dialog">
                <div class="modal-content">
                    <form action="{{route('bookings.edit',2)}}" method="get">
                        <div class="modal-header">						
                            <h4 class="modal-title">Edit Booking Details</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">					
                            <div class="form-group" style="text-allign:center">
                                <label for="start" style="padding-left: 200px" >Location</label>
                                <select name="slot_location" id="slot_location"class="form-control" style="text-align-last:center; width:155px;">
                                    <option value="" >Select Location</option>
                                    @foreach ($slots as $location)
                                    <option value="{{ $location->location }}" >{{$location->location}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" style="text-allign:center">
                                <label for="start" style="padding-left: 200px" >From:</label>
                                <input id="start" type="time" class="col-4 form-control" name="start" value="00:00:00" ] >
                            </div>
                            <div class="form-group" style="text-allign:center">
                                <label for="end" style="padding-left: 200px" >To:</label>
                                <input id="end" type="time" class="col-4 form-control" name="end" value="01:00:00"  >        
                            </div>	
                            <input id="id" type="text" class="form-control" name="id" value="id" hidden  >				
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-info" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Delete Modal HTML -->
        <div id="deleteBooking" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('bookings.destroy',2)}}" method="get">
                        <div class="modal-header">						
                            <h4 class="modal-title">Delete Employee</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">					
                            <p>Are you sure you want to delete these Records?</p>
                            <p class="text-warning"><small>This action cannot be undone.</small></p>
                        </div>
                        <div class="modal-footer">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <input type="submit" class="btn btn-danger" value="Delete">
                        </div>
                    </form>
                </div>
            </div>
        </div>                              
    </div>
    
    <!--Container Main end-->
@endsection

