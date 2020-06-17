@extends('layouts.main')
@section('content')

               
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="bootstrap-data-table-panel">
                                  <span class="pull-right" style="float: right;"><a href="#amol" data-toggle="modal" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5">Add New</a></span>
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Category Name</th>
                                                    <th>Last Name</th>
                                                    <th>Picture</th>
                                                    <th>Date</th>
                                                    <th width="10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no=1; ?>
 @foreach($data as $row)
 
  <tr>
    <td><?= $no++ ?></td>
   <td>{{ $row->first_name }}</td>
   <td>{{ $row->last_name }}</td>
   <td><img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="75" /></td>
    <td>{{ date('dM Y', strtotime($row->created_at)) }}</td>
    <td><a href="#view<?= $row->id; ?>" data-toggle="modal" class="btn btn-info btn-flat m-b-10 m-l-5"><i class="ti-eye"></i></a><a href="#edit<?= $row->id; ?>" data-toggle="modal" class="btn btn-info btn-flat m-b-10 m-l-5"><i class="ti-pencil"></i></a><a href="#delete<?= $row->id; ?>" data-toggle="modal" class="btn btn-danger btn-flat m-b-10 m-l-5"><i class="ti-trash"></i></a>
   </td>

<!-- Delete -->
<div class="modal fade" id="delete<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('crud.destroy', $row->id) }}" enctype="multipart/form-data">
            @csrf
            @method('DELETE')
                    <div class="row">
                        <div class="col-lg-2">
                            <label style="position:relative; top:7px;">ID:</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" disabled class="form-control" value="<?= $row->id; ?>">
                        </div>
                    </div>
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-2">
                            <label style="position:relative; top:7px;">First Name:</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="<?=  $row->first_name; ?>">
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
<div class="modal fade" id="edit<?= $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ route('crud.update', $row->id) }}" enctype="multipart/form-data">
             @csrf
             @method('PATCH')
                    <div class="row">
                        <div class="col-lg-4">
                            <label style="position:relative; top:7px;">Id:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" disabled name="id" class="form-control" value="<?=  $row->id ?>">
                        </div>
                    </div>
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label style="position:relative; top:7px;">First Name:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" name="first_name" class="form-control" value="<?=  $row->first_name; ?>">
                        </div>
                    </div>

                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label style="position:relative; top:7px;">Last Name:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" name="last_name" class="form-control" value="<?=  $row->last_name; ?>">
                        </div>
                    </div>
                    
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label style="position:relative; top:7px;">Image:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="file" name="image" />
              <img src="{{ URL::to('/') }}/images/{{ $row->image }}" class="img-thumbnail" width="100" />
                        <input type="hidden" name="hidden_image" value="{{ $row->image }}" />
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
                            <!-- /# card -->
                        </div>
</div>
@endsection

<!--Add Modal -->
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
         <form method="POST" action="{{ route('crud.store') }}" enctype="multipart/form-data">
             @csrf
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label style="position:relative; top:7px;">First Name:</label>
                        </div>
                        <div class="col-lg-9">
                            <input type="text" name="first_name" class="form-control" autofocus required>
                        </div>
                    </div>
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label style="position:relative; top:7px;">Last Name:</label>
                        </div>
                        <div class="col-lg-9">
                          <input type="text" name="last_name" class="form-control">
                        </div>
                    </div>
                    
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-3">
                            <label style="position:relative; top:7px;">Picture:</label>
                        </div>
                        <div class="col-lg-9">
                           <input type="file" name="image" required>
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