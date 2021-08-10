@extends('admin.admin_master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
      <!-- Main content -->
<div class="content-wrapper">
    <div class="container-full">
      <section class="content">
          <div class="row">
            <div class="col-12">
              <div class="box bb-3 border-warning">
                <div class="box-header">
                <h4 class="box-title">Student <strong>Search</strong></h4>
                </div>
      
                <div class="box-body">
                  <form action="{{route('std.custom.search')}}" method="GET">
                    {{-- Start row --}}
                    <div class="row">
                       {{-- Start col-md-4 --}}
                       <div class="col-md-4">
                        <div class="form-group">
                            <h5>Year <span class="text-danger"></span></h5>
                            <div class="controls">
                                <select name="year_id" id="year_id" class="form-control" required="">
                                    <option value="" selected="" disabled="">Select Year</option>
                                    @foreach($years as $year)
                                      <option value="{{ $year->id }}" {{ (@$year_id == $year->id)? "selected":"" }} >{{ $year->name }}</option>
		 	                              @endforeach
                                </select>
                            </div>
                        </div> 
                    </div>
                    {{-- End col-md-4 --}}
                    <div class="col-md-4">
                      <div class="form-group">
                          <h5>Class <span class="text-danger"></span></h5>
                          <div class="controls">
                              <select name="class_id" id="class_id" class="form-control" required="">
                                  <option value="" selected="" disabled="">Select Class</option>
                                  @foreach($classes as $class)
                                  <option value="{{ $class->id }}" {{(@$class_id == $class->id)? "selected":"" }}>{{ $class->name }}</option>
                                   @endforeach
                                 
                              </select>
                          </div>
                      </div> 
                  </div>
                     {{-- End col-md-4 --}}
                     <div class="col-md-4" style="padding-top: 25px">
                      <input type="submit" class="btn btn-rounded btn-dark mb-5" name="search" value="Search">
                  </div>
                     {{-- End col-md-4 --}}
                    </div>
                    {{-- End row --}}
                  </form>
                </div>
              
              </div>
            </div>
            
            <div class="col-12">

                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Student List</h3>
                     <span class="float-right"><a href="{{route('std.reg.add')}}" class="btn btn-rounded btn-success">Add Student</a> </span>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                         @if(!@search)
                         <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th width="5%">SL</th>
                                  <th>Name</th>
                                  <th>ID No</th>
                                  <th>Roll</th>
                                  <th>Year</th>
                                  <th>Class</th>
                                  <th>Image</th>
                                  @if (Auth::user()->role =='Admin')
                                  <th>Code</th>     
                                  @endif
                                  <th width="">Action</th>
                                  
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($allData as $key =>$value)
                              <tr>
                               <td>{{$key + 1}}</td>
                               <td>{{$value['user']['name']}}</td>
                               <td>{{$value['user']['id_no']}}</td>
                               <td>{{$value->roll}}</td>
                               <td>{{$value['studentyear']['name']}}</td>
                               <td>{{$value['studentclass']['name']}}</td>
                               <td><img src="{{(!empty($value['user']['image']))?url('upload/student_images/'.$value['user']['image']):url('upload/no_image.jpg')}}" alt="" style="height: 60px; width:60px; border:1px solid solid:#000000;"></td>
                               <td>{{$value->year_id}}</td>
                               <td>
                                   {{-- id should be used to use sweet alert --}}
                                   <a href="{{route('std.reg.edit',$value->student_id)}}" class="btn btn-rounded btn-info mb-5">Edit</a>
                                   <a href="{{route('std.reg.promote',$value->student_id)}}" class="btn btn-rounded btn-danger mb-5">Promote</a>
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
                         @else
                         <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th width="5%">SL</th>
                                  <th>Name</th>
                                  <th>ID No</th>
                                  <th>Roll</th>
                                  <th>Year</th>
                                  <th>Class</th>
                                  <th>Image</th>
                                  @if (Auth::user()->role =='Admin')
                                  <th>Code</th>     
                                  @endif
                                  <th width="">Action</th>
                                  
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($allData as $key =>$value)
                              <tr>
                               <td>{{$key + 1}}</td>
                               <td>{{$value['user']['name']}}</td>
                               <td>{{$value['user']['id_no']}}</td>
                               <td>{{$value->roll}}</td>
                               <td>{{$value['studentyear']['name']}}</td>
                               <td>{{$value['studentclass']['name']}}</td>
                               <td><img src="{{(!empty($value['user']['image']))?url('upload/student_images/'.$value['user']['image']):url('upload/no_image.jpg')}}" alt="" style="height: 60px; width:60px; border:1px solid solid:#000000;"></td>
                               <td>{{$value->year_id}}</td>
                               <td>
                                   {{-- id should be used to use sweet alert --}}
                                   <a href="{{route('std.reg.edit',$value->student_id)}}" class="btn btn-rounded btn-info mb-5">Edit</a>
                                   <a href="{{route('std.reg.promote',$value->student_id)}}" class="btn btn-rounded btn-danger mb-5">Promote</a>
                               </td>
                           </tr> 
                              @endforeach
                              
                            
                          </tbody>
                        </table>
                         @endif
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