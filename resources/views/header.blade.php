<!DOCTYPE html>
    <head>
        <style>
            <?php include public_path('css/header.css') ?>
        </style>
    </head>
<body>
    <div class="header">
    <ul>
  <li><a href="/">Home</a></li>
  <li><a href="{{ route('person.index') }}">Persons</a></li> 
  <li><a href="{{ route('asset.index') }}">Assets</a></li> 
  <li><a href="{{ route('owner.index') }}">Ownership</a></li> 
    
@if (Route::has('login'))
                    @auth
                        <li>   
                            <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Edit Profile') }}
                            </x-responsive-nav-link>
                        </li> 
                        <li style="float:right">
                            <div style="display:flex;"><span style="margin-right:20px;color:white;margin-top:15px;"> Welcome, {{ Auth::user()->name }}
                            </span>
                            {{-- <a href="{{ route('logout') }}">Logout</a> --}}
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
            
                                <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </div></li>
                        
@else
            <li style="float:right">
                <div style="display:flex;">
                    <span style="margin-right:20px;color:white;">
                        <a href="{{ route('login') }}" style="color:white;margin-right:5px;">Log in</a>
                    </span>
                    <span style="margin-right:20px;color:white;">
                        @if (Route::has('register'))
                        <a href="{{ route('register') }}" style="color:white;">Register</a>
                    @endif
                    </span>
                    @endauth
                </div>
            </li>

@endif
   </ul>
</div>
</body>
</html>   