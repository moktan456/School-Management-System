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
                 <h4 class="box-title">Student Promotion</h4>
                 {{-- <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6> --}}
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form novalidate="" action="{{route('std.reg.promoteupdate',$editData->student_id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$editData->id}}">
                         <div class="row">
                            <div class="col-12">
                                 {{-- 1st Row --}}
                                 <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Student Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="name" type="text" name="name" class="form-control" required="" value="{{$editData['user']['name']}}">
                                            </div>
                                        </div> 
                                    </div>
                                    {{-- End col-md-4 --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Father's Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="fname" type="text" name="fname" class="form-control" required="" value="{{$editData['user']['fname']}}">
                                            </div>
                                        </div> 
                                    </div>
                                    {{-- End col-md-4 --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Mother's Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="mname" type="text" name="mname" class="form-control" required="" value="{{$editData['user']['mname']}}">
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
                                                <input id="mobile" type="text" name="mobile" class="form-control" required="" value="{{$editData['user']['mobile']}}">
                                            </div>
                                        </div> 
                                    </div>
                                    {{-- End col-md-4 --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Address <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="address" type="text" name="address" class="form-control" required="" value="{{$editData['user']['address']}}">
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
                                                    <option value="Male" {{$editData['user']['gender']== 'Male'? 'selected':""}}>Male</option>
                                                    <option value="Female" {{$editData['user']['gender']== 'Female'? 'selected':""}}>Female</option>
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
                                                    <option value="Buddist" {{$editData['user']['religion']=='Buddist'? 'selected':""}}>Buddist</option>
                                                    <option value="Hindu" {{$editData['user']['religion']=='Hindu'? 'selected':""}}>Hindu</option>
                                                    <option value="Muslim" {{$editData['user']['religion']=='Muslim'? 'selected':""}}>Muslim</option>
                                                </select>
                                            </div>
                                        </div> 
                                    </div>
                                    {{-- End col-md-4 --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Date of Birth <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="dob" type="date" name="dob" class="form-control" required="" value="{{$editData['user']['dob']}}">
                                            </div>
                                        </div> 
                                    </div>
                                    {{-- End col-md-4 --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5>Discount <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input id="discount" type="text" name="discount" class="form-control" required="" value="{{$editData['discountstudent']['discount']}}">
                                            </div>
                                        </div> 
                                    </div>
                                    
                                </div>
                                {{-- End 3rd row --}}

                                 {{-- 4th row --}}
                                 <div class="row">
                                    {{-- End col-md-4 --}}
                                    {{-- Start col-md-4 --}}
                                   <div class="col-md-4">
                                       <div class="form-group">
                                           <h5>Year <span class="text-danger">*</span></h5>
                                           <div class="controls">
                                               <select name="year_id" id="year_id" class="form-control" required="">
                                                   <option value="" selected="" disabled="">Select Year</option>
                                                   @foreach ($years as $year)
                                                   <option value="{{$year->id}}" {{($editData->year_id==$year->id)?"selected":""}}>{{$year->name}}</option>     
                                                   @endforeach
                                               </select>
                                           </div>
                                       </div> 
                                   </div>
                                   {{-- End col-md-4 --}}
                                   <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Class <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="class_id" id="class_id" class="form-control" required="">
                                                <option value="" selected="" disabled="">Select Class</option>
                                                @foreach ($classes as $iclass)
                                                <option value="{{$iclass->id}}" {{($editData->class_id==$iclass->id)?"selected":""}}>{{$iclass->name}}</option>
                                                @endforeach
                                               
                                            </select>
                                        </div>
                                    </div> 
                                </div>
                                   {{-- End col-md-4 --}}
                                   <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Group <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="group_id" id="group_id" class="form-control" required="">
                                                <option value="" selected="" disabled="">Select Group</option>
                                                @foreach ($groups as $group)
                                                    <option value="{{$group->id}}" {{($editData->group_id==$group->id)?"selected":""}}>{{$group->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div> 
                                </div>
                                   
                               </div>
                               {{-- End 4th row --}}
                                
                                {{-- 5th row --}}
                                <div class="row">
                                    {{-- End col-md-4 --}}
                                   <div class="col-md-4">
                                       <div class="form-group">
                                           <h5>Shifts <span class="text-danger">*</span></h5>
                                           <div class="controls">
                                               <select name="shift_id" id="shift_id" class="form-control" required="">
                                                   <option value="" selected="" disabled="">Select Shifts</option>
                                                   @foreach ($shifts as $shift)
                                                   <option value="{{$shift->id}}" {{($editData->shift_id==$shift->id)?"selected":""}}>{{$shift->name}}</option>     
                                                   @endforeach
                                               </select>
                                           </div>
                                       </div> 
                                   </div>
                                   {{-- End col-md-4 --}}
                                   <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>
                                    </div> 
                                </div>
                                   {{-- End col-md-4 --}}
                                   <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="controls">
                                            <img id="showImage" src="{{ (!empty($editData['user']['image']))? url('upload/student_images/'.$editData['user']['image']):url('upload/no_image.jpg') }}" alt="" style="height: 100px; width:100px; border:1px solid solid:#000000;">
                                        </div>
                                    </div> 
                                </div>
                                   
                               </div>
                               {{-- End 5th row --}}
                            </div>
                         </div>
                           
                           <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Promote">
                            <a href="{{route('std.reg.view')}}" class="btn btn-rounded btn-warning mb-5">Back</a>
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
		});
	});
</script>
@endsection