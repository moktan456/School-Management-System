@extends('admin.admin_master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
      <!-- Main content -->
<div class="content-wrapper">
    <div class="container-full">
      <section class="content">
          <div class="row">
            <div class="col-12">

                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Exam Type List</h3>
                     <span class="float-right"><a href="{{route('exam.type.add')}}" class="btn btn-rounded btn-success">Add Exam Type</a> </span>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th width="5%">SL</th>
                                   <th>Exam Type</th>
                                   <th width="25%">Action</th>
                                   
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($allData as $key =>$examtype)
                               <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$examtype->name}}</td>
                                
                    
                                <td>
                                    {{-- id should be used to use sweet alert --}}
                                    <a href="{{route('exam.type.edit',$examtype->id)}}" class="btn btn-rounded btn-info mb-5">Edit</a>
                                    <a href="{{route('exam.type.delete',$examtype->id)}}" id="delete" class="btn btn-rounded btn-danger mb-5">Delete</a>
                                </td>
                            </tr> 
                               @endforeach
                               
                             
                           </tbody>
                           {{-- <tfoot>
                            <tr>
                                <th width="5%">SL</th>
                                <th>Role</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Code</th>
                                <th width="25%">Action</th>
                                
                            </tr>
                           </tfoot> --}}
                         </table>
                       </div>
                   </div>
                   <!-- /.box-body -->
                 </div>
                 <!-- /.box -->        
               </div>
          </div>
      </section>
    </div>
</div>
@endsection