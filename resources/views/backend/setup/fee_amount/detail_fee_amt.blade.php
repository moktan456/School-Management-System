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
                     <h3 class="box-title">Fee Amount Details</h3>
                     <span class="float-right"><a href="{{route('fee.amount.add')}}" class="btn btn-rounded btn-success">Add Fee Amount</a> <a href="{{route('fee.amount.view')}}" class="btn btn-rounded btn-warning mb-5">Cancel</a></span>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         <table class="table table-bordered table-striped">
                           <thead>
                               <tr>
                                   <th width="5%">SL</th>
                                   <th>Class Name</th>
                                   <th width="25%">Amount</th>
                                   
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($detaildata as $key =>$detail)
                               <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$detail['studentclass']['name']}}</td>
                                <td>{{$detail->amount}}</td>   
                    
                               
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