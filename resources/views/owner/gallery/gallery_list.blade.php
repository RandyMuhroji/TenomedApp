@extends('templates.owner.layout')

@section('content')


<div class="clearfix"></div>
<div id = "notification" class="alert " role="alert" hidden>
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <p>s</p>
</div>
<div class="">
  <div class="clearfix"></div>
  <div class="row">
  	<div class="col-md-12 col-sm-12 col-xs-12">	
  		<div class="x_panel">
  			<div class="x_title">
          <h2>Media Gallery <a data-toggle="modal" data-target="#add_album" class="btn btn-primary btn-xs"><i class="fa fa-plus"></i> Create New Album</a></h2>
          <div class="clearfix"></div>
        </div>
        @if(count($albums))
          @foreach ($albums as $row)
          <div class="row" id="album{{$row->id}}">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>{{$row->name}} <small> gallery design </small></h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a class = "addImage" data-toggle="modal" data-target="#add_photo" data-name ="{{$row->name}}" data-id = "{{$row->id}}"><i class="fa fa-plus" ></i></a>
                    </li>
                    <li><a class="deleteAlbum" data-id = "{{$row->id}}" data-name = "{{$row->name}}" data-token="{{ csrf_token() }}"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="row">
                    <p>Media gallery design emelents</p>
                    @foreach ($images as $image)
                    @if($row->id == $image->album_id)
                    <div class="col-md-55" id="image{{$image->id}}">
                      <div class="thumbnail">
                        <div class="image view view-first" style="height: 140px;">
                          <img style="width: 100%; display: block;" src = "{{asset('')}}images/{{$image->filename}}" alt="image" />
                          <div class="mask">
                            <p>{{$image->title or 'title here'}}</p>
                            <div class="tools tools-bottom">
                              <a href="#"><i class="fa fa-eye"></i></a>
                              <a href="#" class="editImage" data-name = "{{$row->name}}" data-id = "{{$image->id}}" data-image="{{$image->filename}}" data-title="{{$image->title}}" data-desc="{{$image->desc}}" data-toggle="modal" data-target="#edit_photo"><i class="fa fa-pencil"></i></a>
                              <a href="#" class="deleteImage" data-id = "{{$image->id}}" data-token="{{ csrf_token() }}"><i class="fa fa-times"></i></a>
                            </div>
                          </div>
                        </div>
                        <div class="caption">
                          <p>{{$image->desc or "Caption here"}}</p>
                        </div>
                      </div>
                    </div>
                    @endif
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        @else
            <p>No record album here</p>
        @endif

  		</div>
  	</div>
  </div>
</div>



<div id="add_photo" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Image</h4>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('gallery.store') }}" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="idAlbum" id = "idAlbum" value="{{ Request::old('idAlbum') ?: '' }}"> 
          <div class="form-group{{ '' }}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Album
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" value="{{ Request::old('nameAlbum') ?: '' }}" name = "nameAlbum" id="album" class="form-control col-md-7 col-xs-12" disabled>
              </div>
          </div>
          @if(Session::has('title_image'))
            <div class="form-group{{' has-error'}}">
          @else
          <div class="form-group{{' '}}">
          @endif
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title_image">Title
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" value="{{ Request::old('title_image') ?: '' }}" id="title_image" name="title_image" class="form-control col-md-7 col-xs-12" >
                  <br/>
                  @if(Session::has('title_image'))
                  <span class="help-block">{!! Session::get('title_image') !!}</span>
                  @endif
              </div>
          </div>

          @if(Session::has('image'))
            <div class="form-group{{' has-error'}}">
          @else
          <div class="form-group{{' '}}">
          @endif
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Image
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" value="{{ Request::old('image') ?: '' }}" id="image" name="image" class="form-control col-md-7 col-xs-12" >
                  <br/>
                  @if(Session::has('image'))
                  <span class="help-block">{!! Session::get('image') !!}</span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ '' }}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image_desc">Descripstion
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control" rows="3" value="{{ Request::old('image_desc') ?: '' }}" id="image_desc" name="image_desc" class="form-control col-md-7 col-xs-12" ></textarea>
              </div>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Submit</button>
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>

      </form>
    </div>

  </div>
</div>

<div id="edit_photo" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Image</h4>
      </div>
      <div class="modal-body">
        <form method="post" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" id="editImage">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="PUT">
          <input type="hidden" name="idAlbum" id = "idAlbum" value="{{ Request::old('idAlbum') ?: '' }}"> 
          <div class="form-group{{ '' }}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_name">Album
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" value="{{ Request::old('edit_name') ?: '' }}" name = "edit_name" id="edit_name" class="form-control col-md-7 col-xs-12" disabled>
              </div>
          </div>
          @if(Session::has('edit_title'))
            <div class="form-group{{' has-error'}}">
          @else
          <div class="form-group{{' '}}">
          @endif
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_title">Title
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" value="{{ Request::old('edit_title') ?: '' }}" id="edit_title" name="edit_title" class="form-control col-md-7 col-xs-12" >
                  <br/>
                  @if(Session::has('edit_title'))
                  <span class="help-block">{!! Session::get('edit_title') !!}</span>
                  @endif
              </div>
          </div>

          @if(Session::has('edit_image'))
            <div class="form-group{{' has-error'}}">
          @else
          <div class="form-group{{' '}}">
          @endif
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="image">Image
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" value="{{ Request::old('image') ?: '' }}" id="image" name="edit_image" class="form-control col-md-7 col-xs-12" >
                  <br/>
                  @if(Session::has('edit_image'))
                  <span class="help-block">{!! Session::get('edit_image') !!}</span>
                  @endif
              </div>
          </div>

          <div class="form-group{{ '' }}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="edit_desc">Descripstion
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control" rows="3" value="{{ Request::old('edit_desc') ?: '' }}" id="edit_desc" name="edit_desc" class="form-control col-md-7 col-xs-12" ></textarea>
              </div>
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Save Change</button>
        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
      </div>

      </form>
    </div>

  </div>
</div>

<div id="add_album" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" >
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Album</h4>
      </div>
      <form method="post" action="{{ route('galery_album') }}" data-parsley-validate class="form-horizontal form-label-left">
      		<div class="modal-body">
      		 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
      		  @if(Session::has('album_name'))
            <div class="form-group{{' has-error'}}">
            @else
            <div class="form-group{{' '}}">
            @endif
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current_password">Album Name <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" class="form-control col-md-7 col-xs-12" id="album_name" name="album_name" value="{{ Request::old('album_name') ?: '' }}">
                @if(Session::has('album_name'))
                <span class="help-block">{!! Session::get('album_name') !!}</span>
                @endif
              </div>
            </div>
            <div class="form-group{{' '}}">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="current_password">Description
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea class="form-control" rows="3" value="{{ Request::old('album_desc') ?: '' }}" id="album_desc" name="album_desc" class="form-control col-md-7 col-xs-12" ></textarea>
              </div>
            </div>
          </div>

      <div class="modal-footer">
      		<button type="submit" class="btn btn-success">Save Change</button>
          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        </form>
      </div>
    </div>

  </div>
</div>

@stop

@section('js')
	<script type="text/javascript">
  var id,name,image,desc,title;
		$(".addImage").click(function(){

			id = $(this).data("id");
      name = $(this).data("name");
      console.log(name);
      $("input#album").val(name);
      $("input#idAlbum").val(id);

		});

    $('.deleteImage').click(function(){

      var id = $(this).data("id");

      if(confirm("Are you sure delete this image ?")){
        var token = $(this).data("token");

        $.ajax({

          url  :"/manage-cafe/gallery/"+id,
          type : 'DELETE',
          dataType: "JSON",
          data:{
              "id": id,
              "_method": 'DELETE',
              "_token": token,
          },
          success:function(msg){
            $('#image'+id).remove();
            $('div#notification').show();
            $('div#notification p').text(msg['success']);
            $('div#notification').addClass('alert-success');
            console.log(msg['success']);
          }

        });
      }
    });

    $('.editImage').click(function(){
          image = $(this).data('image');
          id    = $(this).data('id');
          desc  = $(this).data('desc');
          title = $(this).data('title');
          name  = $(this).data('name');
          console.log(image,id,desc,title,name);

          $('form#editImage').attr('action','/manage-cafe/gallery/'+id);
          $('#edit_desc').text(desc);
          $('#edit_name').val(name);
          $('#edit_title').val(title);

    });

    $(".deleteAlbum").click(function(){

        var id = $(this).data("id");
        var name = $(this).data("name");
        if(name != 'slider'){
          if(confirm("Are you sure delete album " + name + " ?")){
              var token = $(this).data("token");
              $.ajax(
              {
                  url: "/manage-cafe/gallery/album/"+id,
                  type: 'DELETE',
                  dataType: "JSON",
                  data: {
                      "id": id,
                      "_method": 'DELETE',
                      "_token": token,
                  },
                  success: function (msg)
                  {
                    console.log(msg);
                    $('#album'+id).remove();
                    $('div#notification').show();
                    $('div#notification p').text(msg['success']);
                    $('div#notification').addClass('alert-success');

                    var closeAlert = setTimeout(function(){
                      $('div#notification').hide();
                    }, 100);

                    return clearTimeout(closeAlert);
                  }
              }); 
          }
        }
        
    });
	</script>

	@if (Session::has('album_name') )
        <script type="text/javascript">
           $('#add_album').modal('show');
        </script>
    @endif

  @if (Session::has('image') or Session::has('title_image'))
      <script type="text/javascript">
            $('#add_photo').modal('show');
            $("input#album").val(name);
            $("input#idAlbum").val(id);
      </script>
  @endif

  @if (Session::has('edit_image') or Session::has('edit_title'))
      <script type="text/javascript">
            $('#add_photo').modal('show');
            $('form#editImage').attr('action','/manage-cafe/gallery/'+id);
            $('#edit_desc').text(desc);
            $('#edit_name').val(name);
            $('#edit_title').val(title);
      </script>
  @endif

@stop

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('gantella/build/css/me.css')}}">
@stop