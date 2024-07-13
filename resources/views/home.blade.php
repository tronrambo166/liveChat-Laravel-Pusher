@extends('layout') 
@section('page') 




<div class="container  w-75 shadow border">
  <div class="row top">
  
    <span class="border border-dark shadow text-dark h6 py-2 bg-light d-inline-block mr-auto ml-5 px-4 my-4">Logged in: <input type="text" id="username" value="{{$name}}" name="username"> </span>

  
  <a href="logout.php" class="border border-dark shadow h6 text-dark nav-link bg-primary rounded d-inline-block ml-auto mr-5 px-4 my-4">Logout</a>
    
    
    
  </div>


<div class="row">

  
</div>
</div>


<div class="row">
  <div class="col-sm-3 ">
  </div> 
  <div class="col-sm-1"></div>
  @foreach($message as $m)

  <div class="col-sm-12"> 

@if($m->user_id == Auth::id())
<div class="row " > 
  <div class="col-sm-6 pt-1">
  </div>
<div class="col-sm-6 pt-1">
  <div class="row my-2">    
    <div class="col-sm-6"> 
      <div class="w-75 mx-auto" id="messages">
        <p ><span class="text-success" id="user">user - {{$m->user_id}}</span >: {{$m->message}} </p>
    </div>  
  </div>
  
  </div>
  </div>
  </div>

  @else
  
<div class="row" >  
<div class="col-sm-6 pt-1">
  <div class="row my-2"> 
  <div class="col-6 "></div>    
    <div class="col-6">    
    <div class="w-75 mx-auto" id="messages">
        <p ><span class="text-success" id="user">user - {{$m->user_id}}</span >: {{$m->message}} </p>
    </div> 
    
    </div>
  </div>
  </div>

  <div class="col-sm-6 pt-1">
  </div>

  </div>
  @endif

</div>
@endforeach

<a name="bottomOfPage"></a>


</div>
</div>

 
 
  <form class="w-100" action="#" method="post"> @csrf
  <div class="row w-75 mx-auto">
  <div class="col-sm-9">
  <textarea required="" name="message" id="message" type="text" cols="30" rows="1" class="form-control" placeholder="Write a message..."></textarea>
  <small class="text-danger font-italic"></small>
 </div>

 <div class="col-sm-3 pb-4"> 
 <button type="submit" class=" px-2 border border-dark  font-weight-bold  mt-2  text-dark"name="shout" id="shout">SHOUT</button>
 </div>
 </div>
</form>
 
  


          @endsection
        
       

