
    @extends('layouts.app')
    
    @section('content')
    <div id="app">
        <ul class="navbar navbar-dark bg-primary nav nav-pills justify-content-around">
            <li class="nav-item dropdown">
            <a class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">People</a>
                 <div class="dropdown-menu">
                @foreach($people as $person)
                <router-link to="/people/{{$person->id}}" class="dropdown-item">{{ $person->name }}</router-link>
                
                @endforeach
                </div>  
            </li>
            <li class="nav-item">
                <router-link to="/Data" class="nav-link active" >Data</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/Software" class="nav-link active">Software</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/Publications" class="nav-link active">Publications</router-link>
            </li>
            <li class="nav-item">
                <router-link to="/Presentations" class="nav-link active" >Presentations</router-link>
            </li>
           <!--  <li class="nav-item">
                <a class="nav-link active" href="#">Events</a>
            </li> -->
        </ul> 
        <router-view></router-view>
    </div> 
@endsection 



