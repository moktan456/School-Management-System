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
                     <h3 class="box-title">Employee List</h3>
                     <span class="float-right"><a href="{{route('emp.add')}}" class="btn btn-rounded btn-success">Add Employee</a> </span>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table id="example1" class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th width="5%">SL</th>
                                   <th>Name</th>
                                   <th>EID</th>
                                   <th>Mobile</th>
                                   <th>Gender</th>
                                   <th>Join Date</th>
                                   <th>Salary</th>
                                   @if (Auth::user()->role=='Admin')
                                   <th>Code</th>     
                                   @endif
                                  <th width="25%">Action</th>
                                   
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($allData as $key =>$emp)
                               <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$emp->name}}</td>
                                <td>{{$emp->id_no}}</td>
                                <td>{{$emp->mobile}}</td>
                                <td>{{$emp->gender}}</td>
                                <td>{{$emp->join_date}}</td>
                                <td>{{$emp->salary}}</td>
                                @if (Auth::user()->role == 'Admin')
                                <td>{{$emp->code}}</td>
                                @endif
                               
                    
                                <td>
                                    {{-- id should be used to use sweet alert --}}
                                    <a href="{{route('emp.edit',$emp->id)}}" class="btn btn-rounded btn-info mb-5">Edit</a>
                                    <a href="{{route('emp.details',$emp->id)}}" class="btn btn-rounded btn-warning mb-5">Details</a>
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