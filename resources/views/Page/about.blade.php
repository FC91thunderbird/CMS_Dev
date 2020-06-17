@extends('layouts.main')
@section('content')

                <section id="main-content">
                  
                    <div class="row">

                        <div class="col-lg-12">
                            <div class="card">
                                <div class="bootstrap-data-table-panel">
                                  <span class="pull-right" style="float: right;"><a href="#amol" data-toggle="modal" class="btn btn-primary btn-flat btn-addon m-b-10 m-l-5">Add Products</a></span>
                                    <div class="table-responsive">
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Category Name</th>
                                                    <th>Picture</th>
                                                    <th>Product Price</th>
                                                    <th width="8%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no=1; ?>
 @foreach($data as $row)
  <tr>
    <td><?= $no++ ?></td>
   <td>{{ $row->product_name }}</td>
   <td>{{ $row->product_description }}</td>
   
   <td>{{ $row->first_name }}</td>

   <td><img src="{{ URL::to('/') }}/images/{{ $row->product_image }}" class="img-thumbnail" width="75" /></td>
   <td>{{ $row->product_price }}</td>
    <td><a href="#view<?= $row->product_id; ?>" data-toggle="modal" class="btn btn-info btn-flat m-b-10 m-l-5"><i class="ti-eye"></i></a><a href="#edit<?= $row->product_id; ?>" data-toggle="modal" class="btn btn-info btn-flat m-b-10 m-l-5"><i class="ti-pencil"></i></a><a href="#delete<?= $row->product_id; ?>" data-toggle="modal" class="btn btn-danger btn-flat m-b-10 m-l-5"><i class="ti-trash"></i></a>
   </td>

<!-- Delete -->
<div class="modal fade" id="delete<?= $row->product_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <form method="post" action="delete_prod/{{ $row->product_id }}" enctype="multipart/form-data">
            @csrf
                    <div class="row">
                        <div class="col-lg-2">
                            <label style="position:relative; top:7px;">ID:</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" readonly name="product_id" class="form-control" value="<?= $row->product_id; ?>">
                        </div>
                    </div>
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-2">
                            <label style="position:relative; top:7px;">First Name:</label>
                        </div>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" value="<?=  $row->product_name; ?>">
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
<div class="modal fade" id="edit<?= $row->product_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="cat/product_update/{{$row->product_id}}" enctype="multipart/form-data">
             @csrf
             @method('PATCH')
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Product Id:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" readonly name="product_id" class="form-control" value="<?=  $row->product_id ?>">
                        </div>
                    </div>
                    
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label> Category:</label>
                        </div>
                        <div class="col-lg-8">
                            <select name="product_cat" class="form-control">
                              
                             <option value="{{ $row->id }}">{{ $row->first_name }}</option>
                            
                               @foreach($crud as $cruds)
                               <option value="{{ $cruds->id }}">{{ $cruds->first_name }}</option>
                            @endforeach
                           </select>
                        </div>
                    </div>

                    
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>product Name:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" name="product_name" class="form-control" value="<?=  $row->product_name; ?>">
                        </div>
                    </div>

                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>product description:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" name="product_description" class="form-control" value="<?=  $row->product_description; ?>">
                        </div>
                    </div>
                    
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Image:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="file" name="product_image" />
              <img src="{{ URL::to('/') }}/images/{{ $row->product_image }}" class="img-thumbnail" width="100" />
                        <input type="hidden" name="hidden_image" value="{{ $row->product_image }}" />
                        </div>
                    </div>

                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>product Price:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" name="product_price" class="form-control" value="<?=  $row->product_price; ?>">
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
         <form method="post" action="{{ url('crud/add_product') }}" enctype="multipart/form-data">
             @csrf
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Product name:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" name="product_name" class="form-control" value="">
                        </div>
                    </div>
                    
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Category:</label>
                        </div>
                        <div class="col-lg-8">
                            <select name="product_cat" class="form-control" required>
                            <option>Select</option>
                            @foreach($crud as $cruds)
                               <option value="{{ $cruds->id }}">{{ $cruds->first_name }}</option>
                            @endforeach
                           </select>
                        </div>
                    </div>

                    

                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>product description:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" name="product_description" class="form-control" value="">
                        </div>
                    </div>
                    
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>Image:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="file" name="product_image" />
             </div>
                    </div>
                    <div style="height:10px;"></div>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>product Price:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" name="product_price" class="form-control" value="">
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