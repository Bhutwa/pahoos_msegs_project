<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome!</div>
                  <div class="card-body">
                   @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           {{ __('A fresh mail has been sent to your email address.') }}
                       </div>
                   @endif
                   <p><b>PAHOOS PARKING BOOKING SYSTEM</b></p>
                   <p>{{$emails['subject']}}
                    <p>{{ $emails['content'] }}.</p>
               </div>
           </div>
       </div>
   </div>
</div>