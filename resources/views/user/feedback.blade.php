@extends('layouts.app')
@section('content')   
<div class="l-navbar" id="nav-bar">
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
</div>

<div class="col-12 card border-primary mb-3" >
    <div class="card-body" style="align: center">
        <div class="card-header" style="text-align:center">FEEDBACK</div>    
 <!-- Modal Body-->
<div class="text-center"> <i class="far fa-file-alt fa-4x mb-3 animated rotateIn icon1"></i>
    <h3>Your opinion matters</h3>
    <h5>Help us improve our product? <strong>Give us your feedback.</strong></h5>
    <hr>
    <h6>Your Rating</h6>
</div> 
<!-- Radio Buttons for Rating-->
<div class="form-check mb-4"> <input name="feedback" type="radio"> <label class="ml-3">Very good</label> </div>
<div class="form-check mb-4"> <input name="feedback" type="radio"> <label class="ml-3">Good</label> </div>
<div class="form-check mb-4"> <input name="feedback" type="radio"> <label class="ml-3">Mediocre</label> </div>
<div class="form-check mb-4"> <input name="feedback" type="radio"> <label class="ml-3">Bad</label> </div>
<div class="form-check mb-4"> <input name="feedback" type="radio"> <label class="ml-3">Very Bad</label> </div>
<!--Text Message-->
<div class="text-center">
    <h4>What could we improve?</h4>
</div><textarea style="padding: 10px;line-height: 1.5;border-radius: 5px;border: 1px solid #ccc;box-shadow: 1px 1px 1px #999;"  
type="textarea" placeholder="Please Mention Booking ID if you have complains, Thank You ..." rows="3" cols="150" ></textarea> 

<!-- Modal Footer-->
<div class="footer"> <a href="" class="btn btn-primary">Send <i class="fa fa-paper-plane"></i> </a> <a href="" class="btn btn-outline-primary" data-dismiss="modal">Cancel</a> </div>
</div>
</div>
@endsection