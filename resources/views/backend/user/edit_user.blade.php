@extends('admin.admin_master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
      <!-- Main content -->
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Edit User</h4>
                 {{-- <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6> --}}
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form action="{{route('user.update',$editdata->id)}}" method="POST" >
                        @csrf
                         <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>User Role<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="role" id="role" required="" class="form-control">
                                                    <option value="" selected="" disabled="" >Select Role</option>
                                                    <option value="Admin" {{($editdata->role == "Admin" ? "selected": "")}}>Admin</option>
                                                    <option value="Operator" {{($editdata->role == "Operator" ? "selected": "")}}>Operator</option>
                                                </select>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-md-6">						
                                        <div class="form-group">
                                            <h5>Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" required="" value="{{$editdata->name}}">
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6">						
                                        <div class="form-group">
                                            <h5>User Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" required="" value="{{$editdata->email}}">
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                         </div>
                           
                           <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
                            <a href="{{route('user.view')}}" class="btn btn-rounded btn-warning mb-5">Cancel</a>
                           </div>
                       </form>
   
                   </div>
                   <!-- /.col -->
                 </div>
                 <!-- /.row -->
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
   
           </section>
    </div>
</div>
@endsection