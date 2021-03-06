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
                     <h3 class="box-title">Fee Amount List</h3>
                     <span class="float-right"><a href="{{route('fee.amount.add')}}" class="btn btn-rounded btn-success">Add Fee Amount</a> </span>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       
                       <div class="table-responsive">
                         <table class="table table-bordered table-striped">
                           <thead class="thead-light">
                               <tr>
                                   <th width="5%">SL</th>
                                   <th>Fee Category</th>
                                   <th width="25%">Action</th>
                                   
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($allData as $key =>$amt)
                               <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{$amt['feecategory']['name']}}</td>
                                
                    
                                <td>
                                    {{-- id should be used to use sweet alert --}}
                                    <a href="{{route('fee.amount.edit',$amt->fee_category_id)}}" class="btn btn-rounded btn-info mb-5">Edit</a>
                                    <a href="{{route('fee.amount.detail',$amt->fee_category_id)}}" class="btn btn-rounded btn-primary mb-5">Details</a>
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