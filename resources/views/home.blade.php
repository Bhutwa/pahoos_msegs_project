@extends('layouts.app')
{{-- {{dd($bookingdetails)}} --}}
@section('content')
    @include('layouts.usersidebar')
    <!--Container Main start-->
    
    <div class="height-100 bg-light">           
        <div class="container">
            <div class="marquee">
                <div>
                  <span>Welcome to Pahoos Parking Booking System , Book a Parking slot for your Vehical.</span>
                  <span>Welcome to Pahoos Parking Booking System , Book a Parking slot for your Vehical.</span>
                </div>
              </div>
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
                                <a href="#" data-target="#myEditModal{{ $user->id }}"class="editBooking"  data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                <a href="#" data-target="#myDeleteModal{{ $user->id }}" class="deleteBooking"  data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>

                        <!-- Delete Modal HTML -->
                        <div id="myDeleteModal{{$user->id}}" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{route('bookings.destroy',$user->id)}}" method="POST">
                                        <input type="hidden" name="_method" value="DELETE" />
                                        @csrf
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
                                        </form>
                                        </div>
                                    
                                </div>
                            </div>
                        </div>

                        {{-- ---------- Edit Modal ---------- --}}
                        <div id="myEditModal{{ $user->id }}" class="modal fade">
                            <div class="col-6 modal-dialog">
                                <div class="modal-content">
                                    <form action="{{route('bookings.edit',$user->id)}}" method="GET">
                                        @csrf
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Booking Details</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group"style="display:flex;flex-wrap: wrap;align-items: center;" >
                                                <label for="country" style="display : inline; padding-right : 4px;">Select Location:</label>
                                                        <select name="slot_location" id="slot_location"class="form-control" style="text-align-last:center; width:145px;margin-left :54px;">
                                                            <option value="" >Select Location</option>
                                                            @foreach ($slots as $location)
                                                            <option value="{{$location->location }}">{{$location->location}}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                            <div class="form-group" style="display:flex;flex-wrap: wrap;align-items: center; ">            
                                                <label for="start" >From_:</label>
                                                <input id="start" type="time" class="col-4 form-control" name="start" value="00:00:00" style="text-allign:center" >
                                            </div>
                                            <div class="form-group" style="display:flex;flex-wrap: wrap;align-items: center; ">
                                                <label for="end" >To____:</label>
                                                <input id="end" type="time" class="col-4 form-control" name="end" value="01:00:00" style="text-allign:center" >
                                            </div>                   
                                            <div class="modal-footer">
                                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                                <input type="submit" class="btn btn-info" value="Save">
                                            </div>                                                           
                                    </form>
                                </div>
                            </div>
                        </div>

                        
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
       
       
                                      
    </div>
    
    <!--Container Main end-->
@endsection

