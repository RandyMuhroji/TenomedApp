@extends('layouts.userLayout')
@section('menu')

     <li ><a href="{{url('user/profile')}}"><i class="fa fa-user"></i> Profile</a></li>
    <li ><a href="{{url('user/bookingList')}}"><i class="fa fa-envelope-o"></i> Booking Histories</a></li>
    <li class="active"><a href="{{url('user/bookmarks')}}"><i class="fa fa-bars"></i> Bookmarks</a></li>
    <li ><a href="{{url('user/review')}}"><i class="fa fa-bars"></i> Review</a></li>
    <li ><a href="{{url('user/setting')}}"><i class="fa fa-pencil"></i> Setting</a></li>
    <li><a href="{{url('logout')}}"  onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a></li>

@endsection
@section('content')
    <div class="col-sm-8 col-lg-9">
        <div class="content">
            <div class="page-title">
                <h1>Bookmarks cafe</h1>
            </div><!-- /.page-title -->

              <div class="background-white p20 mb30">
                  <h3 class="page-title">
                    Bookmark List
                      
                  </h3>
                  <div class="row">
                  @foreach($bookmarks as $bookmarkss)
                    <div class="col-sm-4">
                        <div class="card-small">
                          <div class="card-small-image">
                              <a href="{{url('detail/'.$bookmarkss->cafe_id)}}">
                                  <img src="{{ asset('') }}images/{{$bookmarkss->image or 'duku.png'}}" alt="img">
                              </a>
                          </div><!-- /.card-small-image -->

                          <div class="card-small-content">
                              <h3><a href="{{url('detail/'.$bookmarkss->cafe_id)}}">{{$bookmarkss->name}}</a></h3>
                              <h4><a href="{{url('detail/'.$bookmarkss->cafe_id)}}">Bookmarked</a></h4>

                              <div class="card-small-price">{{$bookmarkss->kelurahan}}</div>
                          </div><!-- /.card-small-content -->
                      </div>
                      </div>
                      @endforeach
                      <br>
                      <div class="col-sm-12">{{ $bookmarks->links() }}<br></div>
                  </div>
                </div>
            </div><!-- /.content -->
        </div><!-- /.col-* -->
@endsection

@section('java')
<script >
 $(document).ready(function(){
    hideLoading();
  });
</script>
@endsection