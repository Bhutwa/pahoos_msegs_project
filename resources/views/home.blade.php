@extends('layouts.app')
{{-- {{dd($bookingdetails)}} --}}
@section('content')
    @include('layouts.usersidebar')
    <!--Container Main start-->
    
    <div class="height-50 bg-light">           
        <div class="container">
            <div class="marquee">
                <div>
                  <span>Welcome to Pahoos Parking Booking System , Book a Parking slot for your Vehical.</span>
                  <span>Welcome to Pahoos Parking Booking System , Book a Parking slot for your Vehical.</span>
                </div>
              </div>            
            <div class="table-wrapper" style="height: 300px">
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
            </div>
        </div>
        <div class="clearfix" style="padding-left: 1110px">
            <div class="hint-text">Showing <b>{{$count}}</b> entries</div>
            <ul class="pagination">
                <li class="page-item "><a href="#"class="page-link">Previous</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
            </ul>
        </div>
    </div>
    
    <div class="footer">       
        <img src="image/park.png" style="width:100%;height:200px;">
        <div class="container" style="text-align:center">
            <p>© 2021 Msegs</p>
            </div>   
    </div>
    {{-- <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>User <b>Management</b></h2>
                        </div>
                        <div class="col-sm-7">
                            <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
                            <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i> <span>Export to Excel</span></a>						
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>						
                            <th>Date Created</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><a href="#"><img src="/examples/images/avatar/1.jpg" class="avatar" alt="Avatar"> Michael Holz</a></td>
                            <td>04/10/2013</td>                        
                            <td>Admin</td>
                            <td><span class="status text-success">&bull;</span> Active</td>
                            <td>
                                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><a href="#"><img src="/examples/images/avatar/2.jpg" class="avatar" alt="Avatar"> Paula Wilson</a></td>
                            <td>05/08/2014</td>                       
                            <td>Publisher</td>
                            <td><span class="status text-success">&bull;</span> Active</td>
                            <td>
                                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><a href="#"><img src="/examples/images/avatar/3.jpg" class="avatar" alt="Avatar"> Antonio Moreno</a></td>
                            <td>11/05/2015</td>
                            <td>Publisher</td>
                            <td><span class="status text-danger">&bull;</span> Suspended</td>                        
                            <td>
                                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                            </td>                        
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><a href="#"><img src="/examples/images/avatar/4.jpg" class="avatar" alt="Avatar"> Mary Saveley</a></td>
                            <td>06/09/2016</td>
                            <td>Reviewer</td>
                            <td><span class="status text-success">&bull;</span> Active</td>
                            <td>
                                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><a href="#"><img src="/examples/images/avatar/5.jpg" class="avatar" alt="Avatar"> Martin Sommer</a></td>
                            <td>12/08/2017</td>                        
                            <td>Moderator</td>
                            <td><span class="status text-warning">&bull;</span> Inactive</td>
                            <td>
                                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i class="material-icons">&#xE8B8;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE5C9;</i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
     --}}
    <!--Container Main end-->
    
@endsection

