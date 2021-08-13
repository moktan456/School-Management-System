@extends('admin.admin_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Content Wrapper. Contains page content -->
      <!-- Main content -->
<div class="content-wrapper">
    <div class="container-full">
        <section class="content">
            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Employee Leave</h4>
                 {{-- <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6> --}}
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form novalidate="" action="{{route('emp.leave.store')}}" method="POST" >
                        @csrf
                         <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <h5>Emloyee Name<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <select name="employee_id" required="" class="form-control">
                                        <option value="" selected="" disabled="" >Select Employee Name</option>
                                        @foreach ($employees as $employee)
                                        <option value="{{$employee->id}}">{{$employee->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('employee_id')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div> 
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                  <h5>Start Date<span class="text-danger">*</span></h5>
                                  <div class="controls">
                                      <input id="start_date" type="date" name="start_date" class="form-control" required="" >
                                  </div>
                                
                              </div> 
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <h5>Leave Purpose<span class="text-danger">*</span></h5>
                              <div class="controls">
                                  <select name="leave_purpose_id" id="leave_purpose_id" required="" class="form-control">
                                      <option value="" selected="" disabled="" >Select leave purpose</option>
                                      @foreach ($leave_purposes as $purpose)
                                      <option value="{{$purpose->id}}">{{$purpose->name}}</option>
                                      @endforeach
                                      <option value="0">New Purpose</option>
                                  </select>
                                  <input type="text" name="name" id="add_another" class="form-control" placeholder="Write Purpose" style="display: none">
                              </div>
                            </div> 
                        </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <h5>End Date<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input id="end_date" type="date" name="end_date" class="form-control" required="" >
                                    </div>
                                    
                                </div> 
                            </div>
                         </div>
                           
                           <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Submit">
                            <a href="{{route('emp.leave.view')}}" class="btn btn-rounded btn-warning mb-5">Cancel</a>
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
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('change','#leave_purpose_id',function(){
      var leave_purpose_id = $(this).val();
      if(leave_purpose_id=='0'){
        $('#add_another').show();
      }else{
        $('#add_another').hide();
      }
    });
  });
</script>
@endsection