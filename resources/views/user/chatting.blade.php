@extends('layouts.userLayout')

@section('css')
<style type="text/css">
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
@endsection

@section('menu')

     <li class=""><a  href="{{url('user/profile')}}"><i class="fa fa-user"></i> Profile</a></li>
     <li class="active"><a  href="{{url('user/chatiing')}}"><i class="fa fa-user"></i> Chatting</a></li>
    <li ><a href="{{url('user/bookingList')}}"><i class="fa fa-envelope-o"></i> Booking Histories</a></li>
    <li ><a href="{{url('user/bookmarks')}}"><i class="fa fa-bars"></i> Bookmarks</a></li>
    <li ><a href="{{url('user/review')}}"><i class="fa fa-bars"></i> Review</a></li>
    <li ><a href="{{url('user/setting')}}"><i class="fa fa-pencil"></i> Setting</a></li>
    <li><a href="{{url('logout')}}"  onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a></li>

@endsection
@section('content')
    <div class="col-sm-8 col-lg-9">
        <div class="content">
            <div class="page-title">
              <h1> Chatting List</h1>
            </div><!-- /.page-title -->
            <div class="background-white p20 mb30" >
              <div class="main_section">
   <div class="container">
      <div class="chat_container">
         <div class="col-sm-3 chat_sidebar">
       <div class="row">
            <div id="custom-search-input">
               <div class="input-group col-md-12">
                <i class="fa fa-plus-square-o" aria-hidden="true"></i> All Conversation
               </div>
            </div>
            
            <div class="member_list">
               <ul class="list-unstyled">
                @if(count($lists))
                  @foreach($lists as $list)
                  <li class="left clearfix">
                     <div class="chat-body clearfix">
                        <div class="header_sec">
                           <strong class="primary-font">{{$list->to_user_id}}</strong> <strong class="pull-right">
                           09:45AM</strong>
                        </div>
                        <!-- <div class="contact_sec">
                           <strong class="primary-font">(123) 123-456</strong> <span class="badge pull-right">3</span>
                        </div> -->
                     </div>
                  </li>
                  @endforeach
                @endif
            </div>
          </div>
         </div>
         <!--chat_sidebar-->
     
     
         <div class="col-sm-5 message_section">
     <div class="row">
     <div class="new_message_head">
     
     </div><!--new_message_head-->
     
     <div class="chat_area">
     <ul class="list-unstyled">
     <li class="left clearfix">
                     <span class="chat-img1 pull-left">
                     <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body1 clearfix">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
            <div class="chat_time pull-right">09:40PM</div>
                     </div>
                  </li>
           <li class="left clearfix">
                     <span class="chat-img1 pull-left">
                     <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body1 clearfix">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
            <div class="chat_time pull-right">09:40PM</div>
                     </div>
                  </li>
                     <li class="left clearfix">
                     <span class="chat-img1 pull-left">
                     <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body1 clearfix">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
              <div class="chat_time pull-right">09:40PM</div>
                     </div>
                  </li>
          <li class="left clearfix admin_chat">
                     <span class="chat-img1 pull-right">
                     <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body1 clearfix">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
            <div class="chat_time pull-left">09:40PM</div>
                     </div>
                  </li>
                  <li class="left clearfix admin_chat">
                     <span class="chat-img1 pull-right">
                     <img src="https://lh6.googleusercontent.com/-y-MY2satK-E/AAAAAAAAAAI/AAAAAAAAAJU/ER_hFddBheQ/photo.jpg" alt="User Avatar" class="img-circle">
                     </span>
                     <div class="chat-body1 clearfix">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia.</p>
              <div class="chat_time pull-left">09:40PM</div>
                     </div>
                  </li>
     
     </ul>
     </div><!--chat_area-->
          <div class="message_write">
       <textarea class="form-control" placeholder="type a message"></textarea>
     <div class="clearfix"></div>
     <div class="chat_bottom"><a href="#" class="pull-left upload_btn"><i class="fa fa-cloud-upload" aria-hidden="true"></i>
 Add Files</a>
 <a href="#" class="pull-right btn btn-success">
 Send</a></div>
     </div>
     </div>
         </div> <!--message_section-->
      </div>
   </div>
</div>
          </div><!-- /.content -->
      </div><!-- /.col-* -->
    </div>
@endsection
  @section('java')

<script src="https://www.gstatic.com/firebasejs/4.2.0/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDIRkl1cY2ICLQfdp5ohLziL3brKgJeLoo",
    authDomain: "tenomed-7b6aa.firebaseapp.com",
    databaseURL: "https://tenomed-7b6aa.firebaseio.com",
    projectId: "tenomed-7b6aa",
    storageBucket: "tenomed-7b6aa.appspot.com",
    messagingSenderId: "214458013786"
  };
  firebase.initializeApp(config);

  var pesan= document.querySelector('#pesanChat');
hideLoading(); 
  $(document).ready(function() {
    hideLoading(); 
     if($("#status").val()==1){
        $('#bookmarks').addClass("marked");
     } 

    var rootchatref = firebase.database().ref('/');  
    var chatref = firebase.database().ref('/'+$("#idUser").val()+'_'+$("#kafe").val()); 
    

    var dataSuk = [];
    chatref.orderByChild('date').on('child_added', function(snapshot) {  
        // snapshot.forEach(function(data){
        //     $('#chat_data').prepend('<li class="left clearfix"><span class="chat-img pull-left"><img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" /></span><div class="chat-body clearfix"><div class="header"><strong class="primary-font">'+data.user+'</strong> <small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span>'+ data.date +'</small></div><p>'+data.msg+'</p></div></li>');
        // });
        var data = snapshot.val();
        // dataSuk.push(data);
        $('#listChat').prepend('<li class="left clearfix"><span class="chat-img pull-left"><img src="http://placehold.it/50/55C1E7/fff&text=U" alt="User Avatar" class="img-circle" /></span><div class="chat-body clearfix"><div class="header"><strong class="primary-font">'+data.user+'</strong> <small class="pull-right text-muted"><span class="glyphicon glyphicon-time"></span>'+ data.date +'</small></div><p>'+data.msg+'</p></div></li>');
        console.log(dataSuk);
    });  


    $('#btnSend').click(function(){
        writeChat('user1', pesan.value);
    });
});

function writeChat(user, msg) {  
    var postData = {  
        msg : msg,  
        user: user,
        date: Date.now()
    };
    console.log(postData);
    // Get a key for a new Post.  
    var newPostKey = firebase.database().ref().child($("#idUser").val()+'_'+$("#kafe").val()).push().key;
    var updates = {};
    updates['/'+$("#idUser").val()+'_'+$("#kafe").val()+'/'+newPostKey] = postData;

    
    return firebase.database().ref().update(updates);
}



</script>
<script >
</script>
@endsection
