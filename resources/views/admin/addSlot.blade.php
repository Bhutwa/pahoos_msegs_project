@extends('layouts.adminlayout')

@section('content') 
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
<div class="col-xl-12">
                            <div class="card spur-card">
                                <div class="card-header">
                                    <div class="spur-card-icon">
                                        <i class="fas fa-chart-bar"></i>
                                    </div>
                                    <div class="spur-card-title"> Add New Paking Location </div>
                                </div>
                                <div class="card-body ">
                                    <form  action="{{route('slots.create')}}" method="get">
                                        <div class="form-group">
                                            <label for="location">Location</label>
                                            <input type="text" class="form-control" name="location" id="location" placeholder="Parking building location..">
                                        </div>
                                        <div class="form-group">
                                            <label for="space">No of Space</label>
                                            <input type="text" class="form-control" name="space" id="space" placeholder="No of vehical accomodation..">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endsection