<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div> <a style="text-decoration:none" href="/" class="nav_logo"> <i class='bx bxs-car-garage nav_logo-icon'></i> <span class="nav_logo-name">PahooS</span> </a>
            <div class="nav_list"> 
                <a style="text-decoration:none" href="/home" class="nav_link active"> 
                    <i class='bx bx-grid-alt nav_icon'></i> 
                    <span class="nav_name">Home</span> 
                </a> 
                <a style="text-decoration:none" href="{{route('slots.index')}}" class="nav_link"> 
                    <i class='bx bx-receipt nav_icon'></i> 
                    <span class="nav_name">Book</span>
                </a> 
                <a style="text-decoration:none" href="/googlemap" class="nav_link"> 
                    <i class='bx bx-map nav_icon'></i> 
                    <span class="nav_name">Slots</span>
                </a>
                <a style="text-decoration:none" href="/feedback" class="nav_link"> 
                    <i class='bx bx-message-alt-edit nav_icon'></i> 
                    <span class="nav_name">Feedback</span> </a>
                {{-- <a href="#" class="nav_link"> 
                    <i class='bx bx-folder nav_icon'></i> 
                    <span class="nav_name">Files</span> </a> 
                <a href="#" class="nav_link"> 
                    <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
                    <span class="nav_name">Stats</span>  --}}
                </a>
            </div>
        </div> 
                                          
        <a style="text-decoration:none" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav_link"> 
            <i class='bx bx-log-out nav_icon'></i> 
            <span class="nav_name">SignOut</span> 
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        </form>
        
    </nav>
</div>