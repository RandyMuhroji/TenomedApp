@extends('templates.owner.layout')

@section('content')
<div class="">

  <div class="row">
    <div class="col-md-12" style="padding: 0;">
      <div class="x_panel">
        <div class="x_title">
          <h2>Inbox Design<small>User Mail</small></h2>
          <div class="title_right">
            <div class="col-md-3 col-sm-3 col-xs-8 form-group pull-right top_search" style="margin-bottom: 0;">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-primary" type="button" style="color: white;">Go!</button>
                </span>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="row">
            <div class="col-sm-3 mail_list_column scroll-view"  >
              <div style="height: 50px;">
                <button id="compose" class="btn btn-sm btn-success btn-block" type="button">COMPOSE</button>
              </div>
              <div id ="side_contact" style="max-height: 550px;overflow-y: scroll;">
                <a href="#">
                  <div class="mail_list">
                    <div class="left">
                      <i class="fa fa-circle"></i> <i class="fa fa-edit"></i>
                    </div>
                    <div class="right">
                      <h3>Dennis Mugo <small>3.00 PM</small></h3>
                      <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                    </div>
                  </div>
                </a>
                <a href="#">
                  <div class="mail_list">
                    <div class="left">
                      <i class="fa fa-star"></i>
                    </div>
                    <div class="right">
                      <h3>Jane Nobert <small>4.09 PM</small></h3>
                      <p><span class="badge">To</span> Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                    </div>
                  </div>
                </a>
                <a href="#">
                  <div class="mail_list">
                    <div class="left">
                      <i class="fa fa-circle-o"></i><i class="fa fa-paperclip"></i>
                    </div>
                    <div class="right">
                      <h3>Musimbi Anne <small>4.09 PM</small></h3>
                      <p><span class="badge">CC</span> Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                    </div>
                  </div>
                </a>
                <a href="#">
                  <div class="mail_list">
                    <div class="left">
                      <i class="fa fa-paperclip"></i>
                    </div>
                    <div class="right">
                      <h3>Jon Dibbs <small>4.09 PM</small></h3>
                      <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                    </div>
                  </div>
                </a>
                <a href="#">
                  <div class="mail_list">
                    <div class="left">
                      .
                    </div>
                    <div class="right">
                      <h3>Debbis & Raymond <small>4.09 PM</small></h3>
                      <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                    </div>
                  </div>
                </a>
                <a href="#">
                  <div class="mail_list">
                    <div class="left">
                      .
                    </div>
                    <div class="right">
                      <h3>Debbis & Raymond <small>4.09 PM</small></h3>
                      <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                    </div>
                  </div>
                </a>
                <a href="#">
                  <div class="mail_list">
                    <div class="left">
                      <i class="fa fa-circle"></i> <i class="fa fa-edit"></i>
                    </div>
                    <div class="right">
                      <h3>Dennis Mugo <small>3.00 PM</small></h3>
                      <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                    </div>
                  </div>
                </a>
                <a href="#">
                  <div class="mail_list">
                    <div class="left">
                      <i class="fa fa-star"></i>
                    </div>
                    <div class="right">
                      <h3>Jane Nobert <small>4.09 PM</small></h3>
                      <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                    </div>
                  </div>
                </a>
                <a href="#">
                  <div class="mail_list">
                    <div class="left">
                      <i class="fa fa-star"></i>
                    </div>
                    <div class="right">
                      <h3>Jane Nobert <small>4.09 PM</small></h3>
                      <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                    </div>
                  </div>
                </a>
                <a href="#">
                  <div class="mail_list">
                    <div class="left">
                      <i class="fa fa-star"></i>
                    </div>
                    <div class="right">
                      <h3>Jane Nobert <small>4.09 PM</small></h3>
                      <p>Ut enim ad minim veniam, quis nostrud exercitation enim ad minim veniam, quis nostrud exercitation...</p>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <!-- /MAIL LIST -->

            <!-- CONTENT MAIL -->
            <div class="col-sm-9 mail_view" >
              <div class="inbox-body" >
                <div class="mail_heading row">
                  <div class="col-md-8">
                    <div class="btn-group">
                      <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-reply"></i> Reply</button>
                      <button class="btn btn-sm btn-default" type="button"  data-placement="top" data-toggle="tooltip" data-original-title="Forward"><i class="fa fa-share"></i></button>
                      <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Print"><i class="fa fa-print"></i></button>
                      <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Trash"><i class="fa fa-trash-o"></i></button>
                    </div>
                  </div>
                  <div class="col-md-4 text-right">
                    <p class="date"> 8:02 PM 12 FEB 2014</p>
                  </div>
                </div>
                <div class="view-mail" style="height: 450px;overflow-y: scroll; overflow-x: hidden;">
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
                  <p>Riusmod tempor incididunt ut labor erem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                    mollit anim id est laborum.</p>
                  <p>Modesed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                    velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="attachment" style="margin-top:5px;">
                  <textarea rows="3"></textarea>
                </div>
                <div class="btn-group">
                  <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-reply"></i> Reply</button>
                  <button class="btn btn-sm btn-default" type="button"  data-placement="top" data-toggle="tooltip" data-original-title="Forward"><i class="fa fa-share"></i></button>
                  <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Print"><i class="fa fa-print"></i></button>
                  <button class="btn btn-sm btn-default" type="button" data-placement="top" data-toggle="tooltip" data-original-title="Trash"><i class="fa fa-trash-o"></i></button>
                </div>
              </div>

            </div>
            <!-- /CONTENT MAIL -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('style')
  <style type="text/css">
    .side_contact{
        max-height: 550px;
        overflow-y: scroll;
    }
  </style>
@stop

@section('js')
  <script type="text/javascript">
    
  </script>
@stop