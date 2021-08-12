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
                 <h4 class="box-title">Edit Employee</h4>
                 {{-- <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6> --}}
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form novalidate="" action="{{route('emp.update',$editData->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <div class="row">
                            <div class="col-12">
                                 {{-- 1st Row --}}
                                 <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Employee Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="name" type="text" name="name" class="form-control" required="" value="{{$editData->name}}">
                                            </div>
                                        </div> 
                                    </div>
                                    {{-- End col-md-4 --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Father's Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="fname" type="text" name="fname" class="form-control" required="" value="{{$editData->fname}}">
                                            </div>
                                        </div> 
                                    </div>
                                    {{-- End col-md-4 --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Mother's Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="mname" type="text" name="mname" class="form-control" required="" value="{{$editData->mname}}">
                                            </div>
                                        </div> 
                                    </div>
                                    {{-- End col-md-4 --}}
                                </div>
                                {{-- End 1st row --}}
                                 {{-- 2st row --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Mobile No <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="mobile" type="text" name="mobile" class="form-control" required="" value="{{$editData->mobile}}">
                                            </div>
                                        </div> 
                                    </div>
                                    {{-- End col-md-4 --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Address <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="address" type="text" name="address" class="form-control" required="" value="{{$editData->address}}">
                                            </div>
                                        </div> 
                                    </div>
                                    {{-- End col-md-4 --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Gender <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="gender" id="gender" class="form-control" required="">
                                                    <option value="" selected="" disabled="">Select Gender</option>
                                                    <option value="Male" {{($editData->gender=='Male')? "selected":""}}>Male</option>
                                                    <option value="Female"{{($editData->gender=='Female')? "selected":""}}>Female</option>
                                                </select>
                                            </div>
                                        </div> 
                                    </div>
                                    {{-- End col-md-4 --}}
                                </div>
                                {{-- End 2nd row --}}
                               
                                 {{-- 3rd row --}}
                                 <div class="row">
                                     {{-- End col-md-4 --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Religion <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="religion" id="religion" class="form-control" required="">
                                                    <option value="" selected="" disabled="">Select Religion</option>
                                                    <option value="Buddist" {{($editData->religion=='Buddist')? "selected":""}}>Buddist</option>
                                                    <option value="Hindu" {{($editData->religion=='Hindu')? "selected":""}}>Hindu</option>
                                                    <option value="Muslim" {{($editData->religion=='Muslim')? "selected":""}}>Muslim</option>
                                                </select>
                                            </div>
                                        </div> 
                                    </div>
                                    {{-- End col-md-4 --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Date of Birth <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="dob" type="date" name="dob" class="form-control" required="" value="{{$editData->dob}}">
                                            </div>
                                        </div> 
                                    </div>
                                    {{-- End col-md-4 --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Designation <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <select name="designation_id" id="designation_id" class="form-control" required="">
                                                    <option value="" selected="" disabled="">Select Year</option>
                                                    @foreach ($designation as $desig)
                                                    <option value="{{$desig->id}}" {{($editData->designation_id==$desig->id)? "selected":""}}>{{$desig->name}}</option>     
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> 
                                    </div>
                                    
                                </div>
                                {{-- End 3rd row --}}

                                 {{-- 4th row --}}
                                 <div class="row">
                                    {{-- End col-md-4 --}}
                                    @if (!@editData)
                                     {{-- Start col-md-4 --}}
                                     <div class="col-md-3">
                                        <div class="form-group">
                                            <h5>Salary <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="salary" type="text" name="salary" class="form-control" required="" value="{{$editData->salary}}">
                                            </div>
                                        </div> 
                                    </div>
                                   {{-- End col-md-4 --}}                                      
                                    @endif
                                   @if (!@editData)
                                   div class="col-md-3">
                                   <div class="form-group">
                                       <h5>Joining Date <span class="text-danger">*</span></h5>
                                       <div class="controls">
                                           <input id="join_date" type="date" name="join_date" class="form-control" required="" value="{{$editData->join_date}}" >
                                       </div>
                                   </div> 
                                   </div>
                                  {{-- End col-md-4 --}} 
                                   @endif
                                    
                                   {{-- End col-md-4 --}}
                                   <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>
                                    </div> 
                                </div>
                                   {{-- End col-md-4 --}}
                                   <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="controls">
                                            <img id="showImage" src="{{ (!empty($editData->image))? url('upload/employee_images/'.$editData->image):url('upload/no_image.jpg') }}" alt="" style="height: 100px; width:100px; border:1px solid solid:#000000;">
                                        </div>
                                    </div> 
                                </div>
                                   
                               </div>
                               {{-- End 4th row --}}
                            </div>
                         </div>
                           
                           <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
                            <a href="{{route('emp.view')}}" class="btn btn-rounded btn-warning mb-5">Cancel</a>
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
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>
@endsection