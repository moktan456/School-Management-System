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
                     <h3 class="box-title">Assigned Subject List</h3>
                     <span class="float-right"><a href="{{route('assign.subject.add')}}" 
                        class="btn btn-rounded btn-success">Assign Subject</a> </span>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       
                       <div class="table-responsive">
                         <table class="table table-bordered table-striped">
                           <thead class="thead-light">
                               <tr>
                                   <th width="5%">SL</th>
                                   <th>Class Name</th>
                                   <th width="25%">Action</th>
                                   
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($allData as $key =>$assign)
                               <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$assign['studentclass']['name']}}</td>
                                
                    
                                <td>
                                    {{-- id should be used to use sweet alert --}}
                                    <a href="{{route('assign.subject.edit',$assign->class_id)}}" class="btn btn-rounded btn-info mb-5">Edit</a>
                                    {{-- <a href="{{route('fee.amount.detail',$assign->fee_category_id)}}" class="btn btn-rounded btn-primary mb-5">Details</a> --}}
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