@extends('templates.owner.layout')

@section('content')
<div class="">

  <div class="row">
    <div class="col-md-12" style="padding: 0;">
      <div class="x_panel">
      <div class="chat_container">
         <div class="col-sm-3 chat_sidebar">
       <div class="row">
            <div id="custom-search-input">
               <div class="input-group col-md-12">
                <i class="fa fa-plus-square-o" aria-hidden="true"></i> All Conversation
               </div>
            </div>
            
            <div class="member_list">

               <ul class="list-unstyled col-md-12" style="padding: 0;">
                @if(count($lists))
                  @foreach($lists as $list)
                  <li class="left clearfix col-md-12" style="display: block;" onclick="getChat('{{$list->fr_user_id}}','{{$list->avatar}}','{{$list->name}}');">
                  <span class="chat-img pull-left">
                     <img src="{{ asset('') }}images/{{$list->avatar or 'user.png'}}" alt="img" class="img-circle">
                     </span>
                     <div class="chat-body clearfix">
                       
                        <div class="header_sec">
                           <strong class="primary-font">{{$list->name}}</strong>
                        </div>
                        <div class="contact_sec">
                           <strong class="primary-font">{{$list->phone}}</strong> <!-- <span class="badge pull-right">3</span> -->
                        </div>
                     </div>
                  </li>
                  @endforeach
                @endif
            </div>
          </div>
         </div>
         <!--chat_sidebar-->
     
     
         <div class="col-sm-7 message_section">
           <div class="row">
           <div class="new_message_head">
             <div class="pull-left" id="judul"></div><div class="pull-right">
               
             </div>
             </div><!--new_message_head-->
           
           <div class="chat_area" id="doggo">
           <ul class="list-unstyled" id="loadData">
           <!-- Isi list -->
           </ul>
           </div><!--chat_area-->
                <div class="message_write">
                <form id="dataku" name="dataku" class="form form-vertical" method="POST" enctype="multipart/form-data">
             <textarea class="form-control" placeholder="type a message" id="pesanChat" name="pesanChat"></textarea>
             <input type="hidden" id="untuk" name="untuk">
             <input type="hidden" id="img" name="img">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
           <div class="clearfix"></div>
           <div class="chat_bottom">
           <div class="row">

             <div class="col-sm-8"> <input type="file" name="images" id="images" style="padding:0;"></div>
             
             <div class="col-sm-4"><button class="pull-right btn btn-success" type="submit">
             Send</button></div>
           </div>
          </form>
             
             </div>
             
           </div>
           </div>
         </div> 
      </div>
    </div>
  </div>
</div>
@stop

@section('css')
  <style type="text/css">
    .side_contact{
        max-height: 550px;
        overflow-y: scroll;
    }
    #custom-search-input {
  background: #e8e6e7 none repeat scroll 0 0;
  margin: 0;
  padding: 10px;
}
   #custom-search-input .search-query {
   background: #fff none repeat scroll 0 0 !important;
   border-radius: 4px;
   height: 33px;
   margin-bottom: 0;
   padding-left: 7px;
   padding-right: 7px;
   }
   #custom-search-input button {
   background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
   border: 0 none;
   border-radius: 3px;
   color: #666666;
   left: auto;
   margin-bottom: 0;
   margin-top: 7px;
   padding: 2px 5px;
   position: absolute;
   right: 0;
   z-index: 9999;
   }
   .search-query:focus + button {
   z-index: 3;   
   }
   .all_conversation button {
   background: #f5f3f3 none repeat scroll 0 0;
   border: 1px solid #dddddd;
   height: 38px;
   text-align: left;
   width: 100%;
   }
   .all_conversation i {
   background: #e9e7e8 none repeat scroll 0 0;
   border-radius: 100px;
   color: #636363;
   font-size: 17px;
   height: 30px;
   line-height: 30px;
   text-align: center;
   width: 30px;
   }
   .all_conversation .caret {
   bottom: 0;
   margin: auto;
   position: absolute;
   right: 15px;
   top: 0;
   }
   .all_conversation .dropdown-menu {
   background: #f5f3f3 none repeat scroll 0 0;
   border-radius: 0;
   margin-top: 0;
   padding: 0;
   width: 100%;
   }
   .all_conversation ul li {
   border-bottom: 1px solid #dddddd;
   line-height: normal;
   width: 100%;
   }
   .all_conversation ul li a:hover {
   background: #dddddd none repeat scroll 0 0;
   color:#333;
   }
   .all_conversation ul li a {
  color: #333;
  line-height: 30px;
  padding: 3px 20px;
}
   .member_list .chat-body {
   margin-left: 47px;
   margin-top: 0;
   }
   .top_nav {
   overflow: visible;
   }
   .member_list .contact_sec {
   margin-top: 3px;
   }
   .member_list li {
   padding: 6px;
   }
   .member_list ul {
   border: 1px solid #dddddd;
   }
   .chat-img img {
   height: 34px;
   width: 34px;
   }
   .member_list li {
   border-bottom: 1px solid #dddddd;
   padding: 6px;
   }
   .member_list li:last-child {
   border-bottom:none;
   }
   .member_list {
   height: 380px;
   overflow-x: hidden;
   overflow-y: auto;
   }
   .sub_menu_ {
  background: #e8e6e7 none repeat scroll 0 0;
  left: 100%;
  max-width: 233px;
  position: absolute;
  width: 100%;
}
.sub_menu_ {
  background: #f5f3f3 none repeat scroll 0 0;
  border: 1px solid rgba(0, 0, 0, 0.15);
  display: none;
  left: 100%;
  margin-left: 0;
  max-width: 233px;
  position: absolute;
  top: 0;
  width: 100%;
}
.all_conversation ul li:hover .sub_menu_ {
  display: block;
}
.new_message_head button {
  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
  border: medium none;
}
.new_message_head {
  background: #f5f3f3 none repeat scroll 0 0;
  float: left;
  font-size: 13px;
  font-weight: 600;
  padding: 18px 10px;
  width: 100%;
}
.message_section {
  border: 1px solid #dddddd;
}
.chat_area {
  float: left;
  height: 300px;
  overflow-x: hidden;
  overflow-y: auto;
  width: 100%;
}
.chat_area li {
  padding: 14px 14px 0;
  width: 100%;
}
.chat_area li .chat-img1 img {
  height: 40px;
  width: 40px;
}
.chat_area .chat-body1 {
  margin-left: 50px;
}
.chat-body1 p {
  background: #fbf9fa none repeat scroll 0 0;
  padding: 10px;
}
.chat_area .admin_chat .chat-body1 {
  margin-left: 0;
  margin-right: 50px;
}
.chat_area li:last-child {
  padding-bottom: 10px;
}
.message_write {
  background: #f5f3f3 none repeat scroll 0 0;
  float: left;
  padding: 15px;
  width: 100%;
}

.message_write textarea.form-control {
  height: 70px;
  padding: 10px;
}
.chat_bottom {
  float: left;
  margin-top: 13px;
  width: 100%;
}
.upload_btn {
  color: #777777;
}
.sub_menu_ > li a, .sub_menu_ > li {
  float: left;
  width:100%;
}
.member_list li:hover {
  background: #428bca none repeat scroll 0 0;
  color: #fff;
  cursor:pointer;
}
  </style>
      <script src="{{ asset('') }}assets/js/jquery.min.js" type="text/javascript"></script>

 <script src="{{ asset('') }}assets/js/jquery-1.12.4.js" type="text/javascript"></script>
@stop

@section('js')
<script>
function getChat(dt,img,judul){
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
   console.log(dt);
   $.ajax({
    type: 'GET',
    url: '/listChat?untuk='+dt+'&img='+img,

    data: {'idUser':'a', 'kafe':'b'},
    success: function( data ) {
      $('#judulku').remove();
      $('#judul').append('<button id="judulku"><i class="fa fa-plus-square-o" aria-hidden="true"  ></i> '+judul+'</button>');
      $('#loadData').html(data);
        $('#untuk').val(dt);
        $('#img').val(img);
    }
   });
} 
$(document).ready(function() {

  $("#dataku").submit(function(e) {
    //alert("data");
      e.preventDefault(); // prevent page refresh

     $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      var formdata = new FormData(this);  
       $.ajax({
        type: 'POST',
        url: '/message?status=0',
        data :formdata, 
        contentType: false,
        cache: false,
        processData: false,
        success: function( data ) {
          $("#pesanChat").val("");
          document.getElementById("images").value = "";
          $('#loadData').html(data);
        }
       });
  });
});
</script>
@stop