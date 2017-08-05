@extends('layouts.intro')

@section('content')

<div class="page-wrapper">

    <header class="header header-transparent opaque">
        <div class="header-wrapper">
            <div class="container">
                <div class="header-inner">
                    <div class="header-logo">
                        <a href="{{url('/')}}">
                            <img src="{{ asset('') }}assets/img/logo-white.png" alt="Logo">
                            <span>Tenomed</span>
                        </a>
                    </div><!-- /.header-logo -->

                    <div class="header-content">
                        <div class="header-bottom">
                            <!-- /.header-action -->
                            <ul class="header-nav-primary nav nav-pills collapse navbar-collapse" style="font-weight: 500;">

                                <li class="active" >
                                    <a href="/" style="color: white;">Home </a>

                                </li>
                            @if(Auth::check())

                                @permission(('user'))

                               <li><input type="hidden" name="idUser" value="{{Auth::user()->id}}">
                                    <a href="#">
                                    @if(Auth::user()->avatar=="")
                                    <img src="{{Auth::user()->getAvatarUrl()}}" alt="" style="width:30px;height: 30px; border-radius: 30px; overflow: relative; margin-right: 7px; margin-top: -5px;"><span style="text-transform: capitalize;  color: white;">{{Auth::user()->name}}</span> <i class="fa fa-chevron-down"></i></a>
                                    @else
                                    <img src="{{ asset('') }}images/{{Auth::user()->avatar}}" alt="" style="width:30px;height: 30px; border-radius: 30px; overflow: relative; margin-right: 7px; margin-top: -5px;"><span style="text-transform: capitalize;  color: white;">{{Auth::user()->name}}</span> <i class="fa fa-chevron-down"></i></a>
                                    @endif

                                    <ul class="sub-menu">
                                        <li><a href="{{url('user/profile')}}">Profile</a></li>
                                        <li><a href="{{url('user/bookingList')}}">Booking Histories</a></li>
                                        <li><a href="{{url('user/bookmarks')}}">Bookmarks</a></li>
                                        <li><a href="{{url('user/review')}}">Review</a></li>
                                        <li><a href="{{url('user/setting')}}">Setting</a></li>
                                        <li>
                                            <a href="{{route('logout')}}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="fa fa-sign-out pull-right"></i> @lang('general.logout.logout')
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                        </li>
                                    </ul>
                                </li>
                                @endpermission

                            @else
                                <li class="active" >
                                    <a style="border: 1px solid white;padding: 10px 17px;margin-top: 10px;" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Login</a>

                                </li>
                                <li class="active">
                                    <a data-toggle="modal" href="javascript:void(0)" onclick="openRegisterModal();">Sign Up</a>

                                </li>
                            @endif

                            </ul>

                            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".header-nav-primary">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div><!-- /.header-bottom -->
                    </div><!-- /.header-content -->
                </div><!-- /.header-inner -->
            </div><!-- /.container -->
        </div><!-- /.header-wrapper -->
    </header><!-- /.header -->

    <div class="main" style="margin-top:100px;display:block">
        <!-- <div class="mt-150" style="background-image: url('{{ asset('') }}assets/img/pizza5.jpg');">
            <div class="document-title">
            <br><br><br><br>
                <h1>Row List cafe</h1>

                <ul class="breadcrumb">
                    <li><a href="#">Superlist</a></li>
                    <li><a href="#">Listing</a></li>
                </ul>
            </div>
        </div> -->

        <div class="col-sm-4 col-lg-3">
            <div class="sidebar">
                
                <div class="widget">
                  <h2 class="widgettitle">Recent Listings</h2>
                      <div class="cards-small">
                      @foreach($recent as $item)
                          <div class="card-small">
                              <div class="card-small-image">
                                  <a href="">
                                      <img src="{{ asset('') }}images/{{$item->image or 'kafe.png'}}" alt="img">
                                  </a>
                              </div><!-- /.card-small-image -->

                              <div class="card-small-content">
                                  <h3><a href="/detail/{{$item->id}}">{{$item->name}}</a></h3>
                                  <h4><a href="/detail/{{$item->id}}">{{$item->desc}}</a></h4>
                                  <div class="/detail/{{$item->id}}">{{$item->seat}}/ person</div>
                              </div><!-- /.card-small-content -->
                          </div><!-- /.card-small -->
                        @endforeach
                      </div><!-- /.cards-small -->
                </div><!-- /.widget -->
                
            </div><!-- /.sidebar -->
        </div><!-- /.col-* -->

        <div class="col-sm-8 col-lg-9">
            <div class="content">
                <form class="filter" method="get" action="/cari">
                    <div class="row">

                          <div class="col-sm-12 col-lg-12">
                                            <form method="get" action="/cari">
                                           <!--  {{ csrf_field() }} -->

                                              <div class="form-group row">

                                                 <div class="   col-xs-12 col-sm-4">
                                                    <select class="form-control" title="Location" name="location" id="location">
                                                        <option selected="">Medan Kota</option>
                                                        <option>Medan Tuntungan</option>
                                                        <option>Medan Timur</option>
                                                        <option>Medan Tembung</option>
                                                        <option>Medan Sunggal</option>
                                                        <option>Medan Selayang</option>
                                                        <option>Medan Polonia</option>
                                                        <option>Medan Petisah</option>
                                                        <option>Medan Perjuangan</option>
                                                        <option>Medan Marelan</option>
                                                        <option>Medan Maimun</option>
                                                        <option>Medan Labuhan</option>
                                                        <option>Medan Petisah</option>
                                                        <option>Medan Perjuangan</option>
                                                    </select>
                                                 </div>

                                                  <div class="hero-image-keyword col-xs-12 col-sm-6">
                                                      <input type="text" class="form-control" placeholder="Keyword" name="kata">
                                                  </div>

                                                  <div class=" col-xs-4 col-xs-offset-8 col-sm-2 col-sm-offset-0">
                                                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                                                  </div>

                                              </div><!-- /.form-group -->

                                                <!-- <div class="hero-image-category form-group">
                                                    <select class="form-control" title="Category" id="category" name="kategory">
                                                        <option value="" selected="">Coffe</option>
                                                        <option value="">Dessert And Bake</option>
                                                        <option value="">dinner</option>
                                                        <option value="">lunch</option>
                                                        <option value="">Drink</option>
                                                    </select>
                                                </div> --><!-- /.form-group --><!--
                                                <input type="hidden" name="_method" value="POST">
                                                <input type="hidden" name="_token" value="{{ Session::token() }}"> -->

                                                <!-- <div class="hero-image-price form-group">
                                                    <input type="text" class="form-control" placeholder="Min. Price" name="price" value="0">
                                                </div> --><!-- /.form-group -->

                                            </form>
                                        </div><!-- /.col-* -->

                    </div>
                </form>


        <div class="card-row">
            <div class="card-row-inner">
              <div class="card-row-body">
              @if(count($data ))
                    @foreach($data as $datas)
                          <div class="col-sm-6 col-md-4 col-lg-4">
                            <div class="card-simple" data-background-image="{{ asset('') }}images/{{$datas->image or 'kafe.jpg'}}">
                                <div class="card-simple-background">
                                    <div class="card-simple-content">
                                        <h2><a href="{{url('detail/'.$datas->id)}}" style="">{{$datas->name}}</a></h2>
                                        <div class="card-simple-rating">
                                            <?php
                                              if($datas->total==null){$datas->total=0;}
                                                if((int)$datas->total==$datas->total){
                                                  $sts="genab";
                                                  $x=(int)$datas->total;
                                                }else{
                                                  $sts="ganjil";
                                                   $x=((int)$datas->total)+1;
                                              }
                                              for($i=0;$i<5;$i++){
                                                if($i<$x){
                                                  if($sts=="genab"){echo('<i class="fa fa-star"></i>');}
                                                  else{
                                                    if($i==($x-1)){
                                                      echo('<i class="fa fa-star-half-o"></i>');
                                                    }else{
                                                      echo('<i class="fa fa-star"></i>');
                                                    }
                                                  }
                                                }else{
                                                  echo('<i class="fa fa-star-o"></i>');
                                                }
                                              }
                                            ?>
                                            </div><!-- /.card-rati
                                        </div><!-- /.card-rating -->

                                        <div class="card-simple-actions">
                                            <a href="detail/{{$datas->id}}" class="fa fa-search"></a>
                                        </div><!-- /.card-simple-actions -->
                                    </div><!-- /.card-simple-content -->

                                    
                                    <div class="card-simple-label" alt="availabe seat">{{$datas->seat or 0}} People</div>
                                    
                                </div><!-- /.card-simple-background -->
                            </div><!-- /.card-simple -->
                        </div><!-- /.col-* -->
                    @endforeach
                @else
                    <p>No Cafe founds.</p>
                @endif

              </div>
            </div>
            {{ $data->links() }}
            <br>
          </div>
          <br><br>
                

            </div><!-- /.content -->
        </div><!-- /.col-* -->

    </div>

    

</div><!-- /.page-wrapper -->

@endsection
@section('java')
<script>
     $(document).ready(function(){
        hideLoading();
      });
 </script>
@endsection
