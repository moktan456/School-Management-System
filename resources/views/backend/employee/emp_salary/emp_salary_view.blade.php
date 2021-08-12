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
                     <h3 class="box-title">Employee Salary List</h3>
                     <span class="float-right"><a href="{{route('emp.salary.add')}}" class="btn btn-rounded btn-success">Add Employee Salary</a> </span>
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
                                  
                                  <th width="25%">Action</th>
                                   
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($allData as $key =>$value)
                               <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->id_no}}</td>
                                <td>{{$value->mobile}}</td>
                                <td>{{$value->gender}}</td>
                                <td>{{date('d-m-Y',strtotime($value->join_date))}}</td>
                                <td>{{$value->salary}}</td>
                               
                               
                    
                                <td>
                                    {{-- id should be used to use sweet alert --}}
                                    <a href="{{route('emp.salary.increment',$value->id)}}" class="btn btn-rounded btn-info mb-5">Increment</a>
                                    <a href="" class="btn btn-rounded btn-warning mb-5">Details</a>
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