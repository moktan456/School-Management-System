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
                 <h4 class="box-title">Employee Salary Increment</h4>
                 {{-- <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6> --}}
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form novalidate="" action="{{route('emp.salary.incrementupdate',$editData->id)}}" method="POST" >
                        @csrf
                         <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <h5>Increment Amount<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input id="increment_salary" type="text" name="increment_salary" class="form-control" required="" >
                                    </div>
                                  
                                </div> 
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <h5>Increment Date<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input id="effected_salary" type="date" name="effected_salary" class="form-control" required="" >
                                    </div>
                                    
                                </div> 
                            </div>
                         </div>
                           
                           <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Add">
                            <a href="{{route('emp.salary.view')}}" class="btn btn-rounded btn-warning mb-5">Cancel</a>
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