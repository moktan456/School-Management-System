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
                 <h4 class="box-title">Edit Profile</h4>
                 {{-- <h6 class="box-subtitle">Bootstrap Form Validation check the <a class="text-warning" href="http://reactiveraven.github.io/jqBootstrapValidation/">official website </a></h6> --}}
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                         <div class="row">
                            <div class="col-12">
                                <div class="row">
                                   
                                    <div class="col-md-6">						
                                        <div class="form-group">
                                            <h5>Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" required="" value="{{$editdata->name}}">
                                            </div>
                                        </div> 
                                    </div>
									<div class="col-md-6">						
                                        <div class="form-group">
                                            <h5>User Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" required="" value="{{$editdata->email}}">
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md-6">						
                                        <div class="form-group">
                                            <h5>Mobile No. <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="mobile" class="form-control" required="" value="{{$editdata->mobile}}">
                                            </div>
                                        </div> 
                                    </div>
									<div class="col-md-6">						
                                        <div class="form-group">
                                            <h5>Address <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="textrea" name="address" class="form-control" required="" value="{{$editdata->address}}">
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                         </div>
                        <div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<h5>Gender<span class="text-danger">*</span></h5>
											<div class="controls">
												<select name="gender" id="gender" required="" class="form-control">
													<option value="" selected="" disabled="" >Select Gender</option>
													<option value="Male" {{($editdata->gender == "Male" ? "selected": "")}}>Male</option>
													<option value="Female" {{($editdata->gender == "Female" ? "selected": "")}}>Female</option>
												</select>
											</div>
										</div> 
									</div>
									<div class="col-md-6">						
                                        <div class="form-group">
                                            <h5>Profile Image <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="image" id="image" class="form-control">
                                            </div>
                                        </div> 
										<div class="form-group">
                                            <div class="controls">
                                                <img id="showImage" src="{{(!empty($editdata->image))?url('upload/user_images/'.$editdata->image):url('upload/no_image.jpg')}}" alt="" style="height: 100px; width:100px; border:1px solid solid:#000000;">
                                            </div>
                                        </div> 
                                    </div>
								</div>
							</div>	 
						</div>  

						 

                           <div class="text-xs-right">
                            <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
                            <a href="{{route('profile.view')}}" class="btn btn-rounded btn-warning mb-5">Cancel</a>
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