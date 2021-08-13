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
                     <h3 class="box-title">Employee Salary Details</h3>
                     <h5><strong>Employee Name :</strong>{{$details->name}}</h5>
                     <h5><strong>Employee ID :</strong>{{$details->id_no}}</h5>
                     {{-- <span class="float-right"><a href="{{route('emp.salary.add')}}" class="btn btn-rounded btn-success">Add Employee Salary</a> </span> --}}
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table  class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th width="5%">SL</th>
                                   <th>Previous Salary</th>
                                   <th>Incremented value</th>
                                   <th>Present Salary</th>
                                   <th>Increment Date</th>
                                   
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($salary_log as $key =>$log)
                               <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$log->previous_salary}}</td>
                                <td>{{$log->increment_salary}}</td>
                                <td>{{$log->present_salary}}</td>
                                <td>{{date('d-m-Y',strtotime($log->effected_salary))}}</td>
                                
                    
                               
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
                       <div class="text-xs-right">
                        <a href="{{route('emp.salary.view')}}" class="btn btn-rounded btn-warning mb-5">Back</a>
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