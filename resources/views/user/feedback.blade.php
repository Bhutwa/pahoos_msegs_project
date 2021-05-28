@extends('layouts.app')
@section('content') 
@include('layouts.usersidebar')

<div class="col-10 card h-100 border-primary mb-3"   >
    <div class="card-body" style="align: center">
        <h5 class="card-header" style="text-align:center">FEEDBACK
        </h5>    
    <!-- Modal Body-->
    <div class="text-center"> <i class="far fa-file-alt fa-4x mb-3 animated rotateIn icon1"></i>
        <h3>Your opinion matters</h3>
        <h5>Help us improve our product? <strong>Give us your feedback.</strong></h5>
        <hr>
        <h6>Your Rating</h6>
    </div> 
        <form action="{{route('add-feedback')}}" method="get">
        <!-- Radio Buttons for Rating-->
        <div class="form-check mb-4"> <input name="rating" value="1" id="rating" type="radio"> <label class="ml-3">Very good</label> </div>
        <div class="form-check mb-4"> <input name="rating" value="2" id="rating" type="radio"> <label class="ml-3">Good</label> </div>
        <div class="form-check mb-4"> <input name="rating" value="3" id="rating" type="radio"> <label class="ml-3">Mediocre</label> </div>
        <div class="form-check mb-4"> <input name="rating" value="4" id="rating" type="radio"> <label class="ml-3">Bad</label> </div>
        <div class="form-check mb-4"> <input name="rating" value="5" id="rating" type="radio"> <label class="ml-3">Very Bad</label> </div>
        <!--Text Message-->
        <div class="text-center">
            <h4>What could we improve?</h4>
        </div><textarea style="padding: 10px;line-height: 1.5;border-radius: 5px;border: 1px solid #ccc;box-shadow: 1px 1px 1px #999;"  
        type="textarea" placeholder="Please Mention Booking ID if you have complains, Thank You ..." rows="3" name="feedback_message" id="feedback_message" cols="150" ></textarea> 

        <!-- Modal Footer-->
        <div class="footer"> 
                <input type="submit" class="btn btn-primary" value="Send">
        </div>
        </form>
    </div>
</div>
@endsection