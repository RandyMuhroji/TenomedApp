      @foreach($lists as $list) 
        @if($list->fr_user_id!=Auth::user()->id)   
          <li class="left clearfix">
             <span class="chat-img1 pull-left">
               @if($img!="")
             <img src="{{ asset('') }}images/{{$img}}" alt="User Avatar" class="img-circle">
             @else
             <img src="{{ asset('') }}images/user.png" alt="User Avatar" class="img-circle">
             @endif
             </span>
             <div class="chat-body1 clearfix">
                <p>{{$list->message}} <br><br> @if($list->images!="")<img src="{{ asset('') }}images/{{$list->images}}" alt="User Avatar" class="" width="300">@endif</p>
                <!-- <div class="chat_time pull-right">09:40PM</div> -->
             </div>
            </li>
          @else
            <li class="left clearfix admin_chat">
               <span class="chat-img1 pull-right">
             @if(Auth::user()->avatar!="")
             <img src="{{ asset('') }}images/{{Auth::user()->avatar}}" alt="User Avatar" class="img-circle">
             @else
              <img src="{{ asset('') }}images/user.png" alt="User Avatar" class="img-circle">
             @endif
               </span>
               <div class="chat-body1 clearfix">
                  <p>{{$list->message}} <br><br> @if($list->images!="")<img src="{{ asset('') }}images/{{$list->images}}" alt="User Avatar" class="" width="300">@endif</p>
                  <!-- <div class="chat_time pull-left">09:40PM</div> -->
               </div>
            </li>
          @endif
          @endforeach