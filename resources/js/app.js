/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
//import './bootstrap';

import jQuery from 'jquery';
window.$ = jQuery;

$(document).ready( function(){
  
  $(document).on('click','#shout',function(e) {
  	e.preventDefault();
  	let message = $('#message').val();
  	let username = $('#username').val();
  	if(username =='' || message == '')
  	{
  		alert('please fill up');
  		return false;
  	}

  	$.ajax({
  	method:'post',
  	headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
  	url:'/message',
  	data:{username:username,message:message},
  	success:function(result) {
  	}
   });
  	
  });

});

window.Echo.channel('chat')
    .listen('.message',(e)=>{
      $('#messages').append('<div class="col-sm-12" ><div class="row  w-75 mx-auto" > <div class="ml-auto w-50 pt-1"> <div class="w-75 mx-auto">      <p ><span class="text-success" id="user">'+e.username+'</span >'+ ': ' + e.message+'</p>  </div>  </div>   </div> </div>');
        $('#message').val('');
    });