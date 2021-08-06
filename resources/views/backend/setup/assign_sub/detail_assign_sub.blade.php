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
                     <h3 class="box-title">Assigned Subject Details</h3>
                     <span class="float-right"><a href="{{route('assign.subject.add')}}" class="btn btn-rounded btn-success">Assign Subject</a> </span>
                     <span class="float-right"><a href="{{route('assign.subject.view')}}" class="btn btn-rounded btn-warning mb-5">Back</a></span>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                    <h4><strong>Assigned Subject : {{$detaildata['0']['studentclass']['name']}}</strong></h4>
                       <div class="table-responsive">
                         <table class="table table-bordered table-striped">
                           <thead class="thead-light">
                               <tr>
                                   <th width="5%">SL</th>
                                   <th width="20%">Subject</th>
                                   <th width="20%">Full Mark</th>
                                   <th width="20%">Pass Mark</th>
                                   <th width="20%">Subjective Mark</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($detaildata as $key =>$detail)
                               <tr>
                                <td>{{$key + 1}}</td>
                                {{-- Accessing the data from parent table: [method_name][field_name] --}}
                                <td>{{$detail['subject']['name']}}</td>
                                <td>{{$detail->full_mark}}</td>   
                                <td>{{$detail->pass_mark}}</td>
                                <td>{{$detail->subjective_mark}}</td>
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