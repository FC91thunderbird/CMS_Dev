@extends('layouts.main')
@section('content')

                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Customize Admin</h4>
                                            <!-- Nav tabs -->
                                            <div class="vtabs customvtab">
                                                <ul class="nav nav-tabs tabs-vertical" role="tablist">
                                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">menu</span> </a> </li>
                                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Articles</span></a> </li>
                                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages3" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Messages</span></a> </li>
                                                </ul>
                                                <!-- Tab panes -->
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="home3" role="tabpanel">
                                                        <div class="p-20">
                                                          <a href="#amol" data-toggle="modal" class="btn btn-primary btn-flat" style="margin-top: -7%;float: right;">Add Menu</a>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Menu Name</th>
                                                    <th>Parent</th>
                                                    <th>Url</th>
                                                    <th>Icon</th>
                                                    <th>Order</th>
                                                    <th width="8%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no=1; ?>
 @foreach($menu as $row)
  <tr>
    <td><?= $no++ ?></td>
   <td>{{ $row->menu_name }}</td>
   <td>{{ $row->parent }}</td>
   
   <td>{{ $row->link }}</td>
   <td>{{ $row->icon }}</td>

<td>{{ $row->sort }}</td>


    <td><a href="#view<?= $row->menu_id; ?>" data-toggle="modal" class="btn btn-info btn-flat m-b-10 m-l-5"><i class="ti-eye"></i></a><a href="#edit<?= $row->menu_id; ?>" data-toggle="modal" class="btn btn-info btn-flat m-b-10 m-l-5"><i class="ti-pencil"></i></a><a href="#delete<?= $row->menu_id; ?>" data-toggle="modal" class="btn btn-danger btn-flat m-b-10 m-l-5"><i class="ti-trash"></i></a>
   </td>

<!-- Delete -->
<div class="modal fade" id="delete<?= $row->menu_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form method="post" action="menu_delete/{{ $row->menu_id }}" enctype="multipart/form-data">
            @csrf
                    <div class="row">
                        <div class="col-lg-2">
                            <label style="position:relative; top:7px;">ID:</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" readonly name="menu_id" class="form-control" value="<?= $row->menu_id; ?>">
                        </div>
                    </div>
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-2">
                            <label style="position:relative; top:7px;">Menu Name:</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="<?=  $row->menu_name; ?>">
                        </div>
                    </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat btn-addon m-b-10 m-l-5" data-dismiss="modal"> Close</button>
                <button type="submit" class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5">Delete</button>
              </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="edit<?= $row->menu_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="menu_update/{{$row->menu_id}}" enctype="multipart/form-data">
             @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Menu Id:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" readonly name="menu_name" class="form-control" value="<?=  $row->menu_id; ?>">
                        </div>
                    </div>
                    <div style="height:10px;"></div>
                    <div class="row">
                    <div class="col-lg-4">
                            <label>Menu name:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" name="menu_name" class="form-control" value="<?=  $row->menu_name; ?>">
                        </div>
                    </div>
                    
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Parent menu:</label>
                        </div>
                        <div class="col-lg-8">
                            <select name="parent" class="form-control">
                                <option value="{{ $row->parent }}">{{ $row->parent }}</option>
                                <option value="None">None</option>
                                @foreach($menu as $list)
                                <option value="{{ $list->menu_name }}">{{ $list->menu_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>URL:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" name="link" class="form-control" value="<?= $row->link; ?>">
                        </div>
                    </div>

                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Icon:</label>
                        </div>
                        <div class="col-lg-8">
                            <select name="icon" class="form-control">
                                <option value="{{ $row->icon }}">{{ $row->icon }}</option>
                             <option><span class="ti-desktop"></span><span class="icon-name"> ti-desktop</span></option>
                            <option value="ti-save"><span class="ti-save"></span> ti-save</option>
                            <option value="ti-user"><span class="ti-user"></span> ti-user</option>
                            <option value="ti-link"><span class="ti-link">ti-link</option>
                            <option value="ti-trash"><span class="ti-trash"></span> ti-trash</option>
                            <option value="ti-mobile"><span class="ti-mobile"></span> ti-mobile</option>
                            <option value="ti-home"><span class="ti-home"></span> ti-home</option>
                            <option value="<?= $row->icon; ?>"><?= $row->icon; ?></option>
                           </select>
                        </div>
                    </div>

                    

                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Sort:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="number" name="sort" class="form-control" value="<?= $row->sort; ?>">
                        </div>
                    </div>
                   
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat btn-addon m-b-10 m-l-5" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5">Update</button>
                  </div>
                  </form>
              </div>
                </div>
              </div>
            </div>

               
  </tr>
 @endforeach
                                            </tbody>
                                        </table>
                                       
                                    </div>
                                </div>

                           

                                                        </div>
                                                    </div>
                                                    <div class="tab-pane  p-20" id="profile3" role="tabpanel">
                                                                            <a href="#article" data-toggle="modal" class="btn btn-primary btn-flat" style="margin-top: -7%;float: right;">Add Articles</a>
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Title </th>
                                                    <th>Content</th>
                                                    <th>Image</th>
                                                    <th>Category</th>
                                                    <th>Status</th>
                                                    <th>Featured</th>
                                                    <th width="8%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no=1; ?>
 @foreach($article as $key)
  <tr>
    <td><?= $no++ ?></td>
   <td>{{ $key->article_title }}</td>
   <td>{!! $key->article_content !!}</td>
   
   <td><img src="{{ URL::to('/') }}/images/{{ $key->article_image }}" class="img-thumbnail" width="75" /></td>
   <td>{{ $key->first_name }}</td>

<td>{{ $key->article_status==1 ? "Published" : "Draft" }} </td>
<td>@if($key->article_featured==1)<input type="checkbox" checked readonly>@else<input type="checkbox" readonly>@endif</td>
 


    <td><a href="#view{{ $key->article_id }}" data-toggle="modal" class="btn btn-info btn-flat m-b-10 m-l-5"><i class="ti-eye"></i></a><a href="#edit{{ $key->article_id }}" data-toggle="modal" class="btn btn-info btn-flat m-b-10 m-l-5"><i class="ti-pencil"></i></a><a href="#delete{{ $key->article_id }}" data-toggle="modal" class="btn btn-danger btn-flat m-b-10 m-l-5"><i class="ti-trash"></i></a>
   </td>

<!-- Delete -->
<div class="modal fade" id="delete<?= $key->article_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form method="post" action="article_delete/{{ $key->article_id }}" enctype="multipart/form-data">
            @csrf
                    <div class="row">
                        <div class="col-lg-2">
                            <label style="position:relative; top:7px;">ID:</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" readonly name="article_id" class="form-control" value="{{ $key->article_id }} ">
                        </div>
                    </div>
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-2">
                            <label style="position:relative; top:7px;">Article Title:</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="{{ $key->article_title }}">
                        </div>
                    </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat btn-addon m-b-10 m-l-5" data-dismiss="modal"> Close</button>
                <button type="submit" class="btn btn-danger btn-flat btn-addon m-b-10 m-l-5">Delete</button>
              </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="edit{{ $key->article_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="article_update/{{$key->article_id}}" enctype="multipart/form-data">
             @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Article Id:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" readonly name="article_id" class="form-control" value="{{ $key->article_id }}">
                        </div>
                    </div>
                    <div style="height:10px;"></div>
                    <div class="row">
                    <div class="col-lg-4">
                            <label>Article Title:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" name="article_title" class="form-control" value="{{ $key->article_title }}">
                        </div>
                    </div>
                    
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>article_content:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" name="article_content" class="form-control" value="{{$key->article_content}}">
                        </div>
                    </div>

                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>article_image:</label>
                        </div>
                        <div class="col-lg-8">
                <input type="file" name="article_image" />
              <img src="{{ URL::to('/') }}/images/{{ $key->article_image }}" class="img-thumbnail" width="100" />
                        <input type="hidden" name="hidden_image" value="{{ $key->article_image }}">
                        </div>
                    </div>
                    
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Category:</label>
                        </div>
                        <div class="col-lg-8">
                            <select name="article_category" class="form-control" required>
                                <option value="{{ $key->article_category }}">{{ $key->first_name }}</option>
                                @foreach($crud as $menus)
                                <option value="{{ $menus->id }}">{{ $menus->first_name }}</option>
                                @endforeach
                           </select>
                        </div>
                    </div>

                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Status:</label>
                        </div>
                        <div class="col-lg-8">
                            <select name="article_status" class="form-control" required>
                                @if($key->article_status==1)                                
                               <option value="1" selected>Publish</option>
                               <option value="0">Draft</option>
                               @elseif($key->article_status==0)
                                <option value="1">Publish</option>
                               <option value="0" selected>Draft</option>
                               @endif
                           </select>
                        </div>
                    </div>
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Features:</label>
                        </div>
                        <div class="col-lg-8">
                            @if($key->article_featured==1)
                            <input type="checkbox" name="article_featured" checked value="1"> Is Featured
                            @else
                            <input type="checkbox" name="article_featured" value="0"> Is Featured
                            @endif
                        </div>
                    </div>
                   
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat btn-addon m-b-10 m-l-5" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5">Update</button>
                  </div>
                  </form>
              </div>
                </div>
              </div>
            </div>

               
  </tr>
 @endforeach
                                            </tbody>
                                        </table>
                                       
                                    </div>
                                </div>
                                                    </div>
                                                    <div class="tab-pane p-20" id="messages3" role="tabpanel">3</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
@endsection
<!--Add Menus -->
<div class="modal fade" id="amol" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form method="post" action="add_menu" enctype="multipart/form-data">
             @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Menu name:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" id="menu_name" onkeyup="convertToSlug(this.value)" name="menu_name" class="form-control" value="">
                        </div>
                    </div>
                    
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Parent menu:</label>
                        </div>
                        <div class="col-lg-8">
                            <select name="parent" class="form-control">
                                <option value="0">None</option>
                                @foreach($menu as $list)
                                <option value="{{ $list->menu_name }}">{{ $list->menu_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>URL:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" id="link" name="link" class="form-control" value="">
                        </div>
                    </div>

                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Icon:</label>
                        </div>
                        <div class="col-lg-8">
                            <select name="icon" class="form-control" required>
                                <option><span class="ti-desktop"></span><span class="icon-name"> ti-desktop</span></option>
                            <option value="ti-save"><span class="ti-save"></span> ti-save</option>
                            <option value="ti-user"><span class="ti-user"></span> ti-user</option>
                            <option value="ti-link"><span class="ti-link">ti-link</option>
                            <option value="ti-trash"><span class="ti-trash"></span> ti-trash</option>
                            <option value="ti-mobile"><span class="ti-mobile"></span> ti-mobile</option>
                            <option value="ti-home"><span class="ti-home"></span> ti-home</option>
                           </select>
                        </div>
                    </div>

                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Sort:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="number" name="sort" class="form-control" value="">
                        </div>
                    </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat btn-addon m-b-10 m-l-5" data-dismiss="modal"> Close</button>
                    <button type="submit" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5">Insert</button>
                  </div>
          </form>
        </div>
      </div>
    </div>
</div>
<!--  End Menus popup  -- >
<script>
function convertToSlug( str ) {
    
  //replace all special characters | symbols with a space
  str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
  str = str.replace(/\s+/g, '-');   
  document.getElementById("link").value = str;
  //return str;
}
</script>


<!--Add Article -->
<div class="modal fade bd-example-modal-lg" id="article" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Articles</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form method="post" action="add_article" enctype="multipart/form-data">
             @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Title:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" name="article_title" class="form-control" value="">
                        </div>
                    </div>
                    
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Content:</label>
                        </div>
                        <div class="col-lg-8">
                            <textarea name="article_content" id="editor1" rows="5" cols="80"></textarea>
                             </div>
                    </div>
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Image:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="file" name="article_image" />
                        </div>
                    </div>

                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Category:</label>
                        </div>
                        <div class="col-lg-8">
                            <select name="article_category" class="form-control" required>
                                @foreach($crud as $menus)
                                <option value="{{ $menus->id }}">{{ $menus->first_name }}</option>
                                @endforeach
                           </select>
                        </div>
                    </div>

                    

                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Status:</label>
                        </div>
                        <div class="col-lg-8">
                            <select name="article_status" class="form-control" required>
                               <option value="1">Publish</option>
                               <option value="0">Draft</option>
                           </select>
                        </div>
                    </div>
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Features:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="checkbox" name="article_featured"> Is Featured
                        </div>
                    </div>
                             

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat btn-addon m-b-10 m-l-5" data-dismiss="modal"> Close</button>
                    <button type="submit" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5">Add Articles</button>
                  </div>
          </form>
        </div>
      </div>
    </div>
</div>

<script>CKEDITOR.replace( 'editor1' );</script>