@extends('layouts.adminlte_page')

@section('content')
@push('custom_style')
<style>
    .target{
        overflow: hidden;
        height:40px;
        position: relative;
        border:0px solid #999;
        transition: .3s ease;
        cursor: pointer;
    
    }

</style>
@endpush

<div class="row">
         <!-- START Assignments  -->
        <div class="col-md-6">
            <div class="box box-primary" >
                <div class="box-header with-border">
                <h3 class="box-title">SUBJECT_NAME Assignments </h3>
                    <div class="box-tools pull-right">
                            
                                    
                                    <input type="text" id="datepicker" class="form-control" name="date" style="width: 100px; border: 0; line-height: 12px; height: 1px;padding: 5px; display: inline;">
                                       <span class="fa fa-calendar"></span>
                                    
                                    <button class="btn btn-box-tool" id='hideshow' title="add assignment">
                                            <i class="fa fa-plus-circle" style="font-size: 16px;"></i></button>
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>

                        <div class="box " id="myForm">
                          <style>
                            #myForm,
                            #testUpload,
                            #asUpload,
                            #hoUpload {
                              display: none;
                              margin: 20px;
                              width: auto;
                            }
                          </style>
                
                          <div class="box-header with-border">
                            <h3 class="box-title">Post Assignment Form</h3>
                          
                          </div>
                          <form role="form" method="post" enctype="multipart/form-data" action="#" autocomplete="off">
                            <div class="box-body">
                              @csrf
                              <div class="form-group col-md-6">
                                <label for="exampleInputSubject">Publish Date</label>
                                <input type="text" class="form-control" id="test2" name = "pubdate"placeholder="Enter Title" required>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="exampleInputSubject">Subject</label>
                
                                <select class="form-control" name="class">
                                    <option value=""selected>[SUBJECT] [GRADE]-[SECTION]</option>
                                  {{--@foreach($subjects as $subj)
                                <option  value="{{$subj->subj}}_{{$subj->grade}}_{{$subj->section}}">
                                    {{UCWORDS($subj->subj)}} {{UCWORDS($subj->grade)}} - {{UCWORDS($subj->section)}}
                                </option>
                                  @endforeach--}}
                                </select>
                              </div>
                              <div class="form-group col-md-12">
                                <textarea id="editor1" name="description" rows="10" cols="80">
                                  
                                </textarea>
                              </div>
                
                              <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary">Post Assignment</button>
                              </div>
                              
                            </div>
                            <div class="box-footer">
                            </div>
                          </form>
                        </div>
                
                <div id="div1" class="box-body" >
                   
                    <ul style="list-style: none;" id="hw">
                        
                        {{--@foreach($homeworks as $homework)
                        <li style="border-bottom: 1px solid #ccc;">
                        <div id="HWcontent{{$homework->id}}">
                            <h4 style="font-weight:bold;">{{UCWORDS($homework->subject)}} {{$homework->grade .$homework->section}}</h4>
                            <span style="float:right; font-style:italic;">{{date("l M d, Y", strtotime($homework->pubdate))}}</span>
                            <span style="display:block;">{{$homework->title}} {{UCWORDS($homework->firstname)}} {{UCWORDS($homework->lastname)}}</span>
                            <div class="target">
                                <br /><br />
                                <div class="pull-right">
                                  <!-- <button type="button" id="editShow{{$homework->id}}"class="btn btn-success btn-sm "><i class="fa  fa-pencil"> </i> </button> -->
                                  
                                  <!-- <button type="button" id="delShow{{$homework->id}}"class="btn btn-danger btn-sm " data-toggle="modal" data-target="#confirm-delete{{$homework->id}}"><i class="fa  fa-trash"></i></button> -->
                                </div> 
                            </div>
                        </div>
                            <span class="read-more pull-right-container" style="display:block; width:100%;">
                                <i class="fa  pull-right  fa-angle-up"></i>
                            </span>
             <!-- START EDIT assignment  -->
            <div class="box box-danger">
                <!-- <style>
                  #HW{{$homework->id}} {
                    display: none;
                    margin: 20px;
                    width: auto;
                  }
                </style> -->
      
                <div class="box-header with-border">
                  <h3 class="box-title">EDIT Assignment </h3>
                  <!-- <button class="btn btn-box-tool pull-right" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            <button class="btn btn-box-tool pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button> -->
                </div>
              <form role="form" method="post" action="/ajaxAssignment/e/{{$homework->id}}" enctype="multipart/form-data"  name="editAssignment{{$homework->id}}" autocomplete="off">
                  <div class="box-body">
                  @csrf
                    <div class="form-group col-md-6">
                      
                    <input type="hidden" name="hw" value="{{$homework->id}}" >
                      <label for="exampleInputSubject">Publish Date</label>
                    <input type="text" class="form-control" id="datepicker{{$homework->id}}" name = "pubdate"placeholder="Enter Title" value="{{$homework->pubdate}}" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputSubject">Subject</label>
      
                      <select class="form-control" name="class">
                      <option value="{{$homework->subject}}_{{$homework->grade}}_{{$homework->section}}"selected>{{$homework->subject}} {{$homework->grade}} - {{$homework->section}}</option>
                        @foreach($subjects as $subj)
                      <option  value="{{$subj->subj}}_{{$subj->grade}}_{{$subj->section}}">{{UCWORDS($subj->subj)}} {{UCWORDS($subj->grade)}} - {{UCWORDS($subj->section)}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-12">
                    <textarea id="editorHW{{$homework->id}}" name="description" rows="10" cols="80">
                        
                      </textarea>
                    </div>
      
                    <div class="form-group col-md-6">
                      <button type="submit" class="btn btn-primary" id="editAjax{{$homework->id}}">Edit this Assignment</button>
                      
                    </div>
                    <div class="form-group col-md-6" id="chars">
                        <button type="button" class="btn" id="editCancel{{$homework->id}}">Cancelt</button>
                    </div>
                  </div>
                  <div class="box-footer">
                  </div>
                </form>
              </div>
            <!-- END EDIT assignment  -->
              
           <!-- START modal for delete start  -->
              <div class="modal fade" id="confirm-delete{{$homework->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              Confirm Delete Homework {{$homework->id}} - {{$homework->subject}} {{$homework->grade}} {{$homework->section}} 
                          </div>
                          <div class="modal-body">
                              <strong>Are you sure you want to delete this assignment?</strong> <p> {!! htmlspecialchars_decode(substr($homework->description, 0, 360)) !!}...</p>
                          </div>
                          <div class="modal-footer">
                              
                              <form role="form" method="post" action="/ajaxAssignment/x/{{$homework->id}}" enctype="multipart/form-data"  name="delAssignment{{$homework->id}}" >
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                @csrf
                                <input type="hidden" name="hw" value="{{$homework->id}}" />
                              <button type="submit" class="btn btn-danger btn-ok" id="delHW{{$homework->id}}" data-dismiss="modal">Delete</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
         <!-- END modal for delete   -->
                            
                        </li>
                        @endforeach --}}
                        
                    </ul>
                    
                    
                </div><!-- /.box-body -->
                <div class="box-footer">

                <button type="button" class="btn  btn-primary center-block" id="hwLoader">load more</button>
                <button type="button" class="btn  btn-primary center-block hidden" id="hwShowAll">More Homework</button>
                </div><!-- /.box-footer-->
                <div class="overlay" style="display:none;" id="loaderTarget">
                        <i class="fa fa-refresh fa-spin"></i>
                      </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="box box-primary" >
                <div class="box-header with-border">
                <h3 class="box-title">SUBJECT_NAME Assignments </h3>
                    <div class="box-tools pull-right">
                            
                                    
                                    <input type="text" id="datepicker" class="form-control" name="date" style="width: 100px; border: 0; line-height: 12px; height: 1px;padding: 5px; display: inline;">
                                       <span class="fa fa-calendar"></span>
                                    
                                    <button class="btn btn-box-tool" id='hideshow' title="add assignment">
                                            <i class="fa fa-plus-circle" style="font-size: 16px;"></i></button>
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>

                        <div class="box " id="myForm">
                          <style>
                            #myForm,
                            #testUpload,
                            #asUpload,
                            #hoUpload {
                              display: none;
                              margin: 20px;
                              width: auto;
                            }
                          </style>
                
                          <div class="box-header with-border">
                            <h3 class="box-title">Post Assignment Form</h3>
                          
                          </div>
                          <form role="form" method="post" enctype="multipart/form-data" action="#" autocomplete="off">
                            <div class="box-body">
                              @csrf
                              <div class="form-group col-md-6">
                                <label for="exampleInputSubject">Publish Date</label>
                                <input type="text" class="form-control" id="test2" name = "pubdate"placeholder="Enter Title" required>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="exampleInputSubject">Subject</label>
                
                                <select class="form-control" name="class">
                                    <option value=""selected>[SUBJECT] [GRADE]-[SECTION]</option>
                                  {{--@foreach($subjects as $subj)
                                <option  value="{{$subj->subj}}_{{$subj->grade}}_{{$subj->section}}">
                                    {{UCWORDS($subj->subj)}} {{UCWORDS($subj->grade)}} - {{UCWORDS($subj->section)}}
                                </option>
                                  @endforeach--}}
                                </select>
                              </div>
                              <div class="form-group col-md-12">
                                <textarea id="editor1" name="description" rows="10" cols="80">
                                  
                                </textarea>
                              </div>
                
                              <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary">Post Assignment</button>
                              </div>
                              
                            </div>
                            <div class="box-footer">
                            </div>
                          </form>
                        </div>
                
                <div id="div1" class="box-body" >
                   
                    <ul style="list-style: none;" id="hw">
                        
                        {{--@foreach($homeworks as $homework)
                        <li style="border-bottom: 1px solid #ccc;">
                        <div id="HWcontent{{$homework->id}}">
                            <h4 style="font-weight:bold;">{{UCWORDS($homework->subject)}} {{$homework->grade .$homework->section}}</h4>
                            <span style="float:right; font-style:italic;">{{date("l M d, Y", strtotime($homework->pubdate))}}</span>
                            <span style="display:block;">{{$homework->title}} {{UCWORDS($homework->firstname)}} {{UCWORDS($homework->lastname)}}</span>
                            <div class="target">
                                <br /><br />
                                <div class="pull-right">
                                  <!-- <button type="button" id="editShow{{$homework->id}}"class="btn btn-success btn-sm "><i class="fa  fa-pencil"> </i> </button> -->
                                  
                                  <!-- <button type="button" id="delShow{{$homework->id}}"class="btn btn-danger btn-sm " data-toggle="modal" data-target="#confirm-delete{{$homework->id}}"><i class="fa  fa-trash"></i></button> -->
                                </div> 
                            </div>
                        </div>
                            <span class="read-more pull-right-container" style="display:block; width:100%;">
                                <i class="fa  pull-right  fa-angle-up"></i>
                            </span>
             <!-- START EDIT assignment  -->
            <div class="box box-danger">
                <!-- <style>
                  #HW{{$homework->id}} {
                    display: none;
                    margin: 20px;
                    width: auto;
                  }
                </style> -->
      
                <div class="box-header with-border">
                  <h3 class="box-title">EDIT Assignment </h3>
                  <!-- <button class="btn btn-box-tool pull-right" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            <button class="btn btn-box-tool pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button> -->
                </div>
              <form role="form" method="post" action="/ajaxAssignment/e/{{$homework->id}}" enctype="multipart/form-data"  name="editAssignment{{$homework->id}}" autocomplete="off">
                  <div class="box-body">
                  @csrf
                    <div class="form-group col-md-6">
                      
                    <input type="hidden" name="hw" value="{{$homework->id}}" >
                      <label for="exampleInputSubject">Publish Date</label>
                    <input type="text" class="form-control" id="datepicker{{$homework->id}}" name = "pubdate"placeholder="Enter Title" value="{{$homework->pubdate}}" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputSubject">Subject</label>
      
                      <select class="form-control" name="class">
                      <option value="{{$homework->subject}}_{{$homework->grade}}_{{$homework->section}}"selected>{{$homework->subject}} {{$homework->grade}} - {{$homework->section}}</option>
                        @foreach($subjects as $subj)
                      <option  value="{{$subj->subj}}_{{$subj->grade}}_{{$subj->section}}">{{UCWORDS($subj->subj)}} {{UCWORDS($subj->grade)}} - {{UCWORDS($subj->section)}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-12">
                    <textarea id="editorHW{{$homework->id}}" name="description" rows="10" cols="80">
                        
                      </textarea>
                    </div>
      
                    <div class="form-group col-md-6">
                      <button type="submit" class="btn btn-primary" id="editAjax{{$homework->id}}">Edit this Assignment</button>
                      
                    </div>
                    <div class="form-group col-md-6" id="chars">
                        <button type="button" class="btn" id="editCancel{{$homework->id}}">Cancelt</button>
                    </div>
                  </div>
                  <div class="box-footer">
                  </div>
                </form>
              </div>
            <!-- END EDIT assignment  -->
              
           <!-- START modal for delete start  -->
              <div class="modal fade" id="confirm-delete{{$homework->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              Confirm Delete Homework {{$homework->id}} - {{$homework->subject}} {{$homework->grade}} {{$homework->section}} 
                          </div>
                          <div class="modal-body">
                              <strong>Are you sure you want to delete this assignment?</strong> <p> {!! htmlspecialchars_decode(substr($homework->description, 0, 360)) !!}...</p>
                          </div>
                          <div class="modal-footer">
                              
                              <form role="form" method="post" action="/ajaxAssignment/x/{{$homework->id}}" enctype="multipart/form-data"  name="delAssignment{{$homework->id}}" >
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                @csrf
                                <input type="hidden" name="hw" value="{{$homework->id}}" />
                              <button type="submit" class="btn btn-danger btn-ok" id="delHW{{$homework->id}}" data-dismiss="modal">Delete</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
         <!-- END modal for delete   -->
                            
                        </li>
                        @endforeach --}}
                        
                    </ul>
                    
                    
                </div><!-- /.box-body -->
                <div class="box-footer">

                <button type="button" class="btn  btn-primary center-block" id="hwLoader">load more</button>
                <button type="button" class="btn  btn-primary center-block hidden" id="hwShowAll">More Homework</button>
                </div><!-- /.box-footer-->
                <div class="overlay" style="display:none;" id="loaderTarget">
                        <i class="fa fa-refresh fa-spin"></i>
                      </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-primary" >
                <div class="box-header with-border">
                <h3 class="box-title">SUBJECT_NAME Assignments </h3>
                    <div class="box-tools pull-right">
                            
                                    
                                    <input type="text" id="datepicker" class="form-control" name="date" style="width: 100px; border: 0; line-height: 12px; height: 1px;padding: 5px; display: inline;">
                                       <span class="fa fa-calendar"></span>
                                    
                                    <button class="btn btn-box-tool" id='hideshow' title="add assignment">
                                            <i class="fa fa-plus-circle" style="font-size: 16px;"></i></button>
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>

                        <div class="box " id="myForm">
                          <style>
                            #myForm,
                            #testUpload,
                            #asUpload,
                            #hoUpload {
                              display: none;
                              margin: 20px;
                              width: auto;
                            }
                          </style>
                
                          <div class="box-header with-border">
                            <h3 class="box-title">Post Assignment Form</h3>
                          
                          </div>
                          <form role="form" method="post" enctype="multipart/form-data" action="#" autocomplete="off">
                            <div class="box-body">
                              @csrf
                              <div class="form-group col-md-6">
                                <label for="exampleInputSubject">Publish Date</label>
                                <input type="text" class="form-control" id="test2" name = "pubdate"placeholder="Enter Title" required>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="exampleInputSubject">Subject</label>
                
                                <select class="form-control" name="class">
                                    <option value=""selected>[SUBJECT] [GRADE]-[SECTION]</option>
                                  {{--@foreach($subjects as $subj)
                                <option  value="{{$subj->subj}}_{{$subj->grade}}_{{$subj->section}}">
                                    {{UCWORDS($subj->subj)}} {{UCWORDS($subj->grade)}} - {{UCWORDS($subj->section)}}
                                </option>
                                  @endforeach--}}
                                </select>
                              </div>
                              <div class="form-group col-md-12">
                                <textarea id="editor1" name="description" rows="10" cols="80">
                                  
                                </textarea>
                              </div>
                
                              <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary">Post Assignment</button>
                              </div>
                              
                            </div>
                            <div class="box-footer">
                            </div>
                          </form>
                        </div>
                
                <div id="div1" class="box-body" >
                   
                    <ul style="list-style: none;" id="hw">
                        
                        {{--@foreach($homeworks as $homework)
                        <li style="border-bottom: 1px solid #ccc;">
                        <div id="HWcontent{{$homework->id}}">
                            <h4 style="font-weight:bold;">{{UCWORDS($homework->subject)}} {{$homework->grade .$homework->section}}</h4>
                            <span style="float:right; font-style:italic;">{{date("l M d, Y", strtotime($homework->pubdate))}}</span>
                            <span style="display:block;">{{$homework->title}} {{UCWORDS($homework->firstname)}} {{UCWORDS($homework->lastname)}}</span>
                            <div class="target">
                                <br /><br />
                                <div class="pull-right">
                                  <!-- <button type="button" id="editShow{{$homework->id}}"class="btn btn-success btn-sm "><i class="fa  fa-pencil"> </i> </button> -->
                                  
                                  <!-- <button type="button" id="delShow{{$homework->id}}"class="btn btn-danger btn-sm " data-toggle="modal" data-target="#confirm-delete{{$homework->id}}"><i class="fa  fa-trash"></i></button> -->
                                </div> 
                            </div>
                        </div>
                            <span class="read-more pull-right-container" style="display:block; width:100%;">
                                <i class="fa  pull-right  fa-angle-up"></i>
                            </span>
             <!-- START EDIT assignment  -->
            <div class="box box-danger">
                <!-- <style>
                  #HW{{$homework->id}} {
                    display: none;
                    margin: 20px;
                    width: auto;
                  }
                </style> -->
      
                <div class="box-header with-border">
                  <h3 class="box-title">EDIT Assignment </h3>
                  <!-- <button class="btn btn-box-tool pull-right" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            <button class="btn btn-box-tool pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button> -->
                </div>
              <form role="form" method="post" action="/ajaxAssignment/e/{{$homework->id}}" enctype="multipart/form-data"  name="editAssignment{{$homework->id}}" autocomplete="off">
                  <div class="box-body">
                  @csrf
                    <div class="form-group col-md-6">
                      
                    <input type="hidden" name="hw" value="{{$homework->id}}" >
                      <label for="exampleInputSubject">Publish Date</label>
                    <input type="text" class="form-control" id="datepicker{{$homework->id}}" name = "pubdate"placeholder="Enter Title" value="{{$homework->pubdate}}" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputSubject">Subject</label>
      
                      <select class="form-control" name="class">
                      <option value="{{$homework->subject}}_{{$homework->grade}}_{{$homework->section}}"selected>{{$homework->subject}} {{$homework->grade}} - {{$homework->section}}</option>
                        @foreach($subjects as $subj)
                      <option  value="{{$subj->subj}}_{{$subj->grade}}_{{$subj->section}}">{{UCWORDS($subj->subj)}} {{UCWORDS($subj->grade)}} - {{UCWORDS($subj->section)}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-12">
                    <textarea id="editorHW{{$homework->id}}" name="description" rows="10" cols="80">
                        
                      </textarea>
                    </div>
      
                    <div class="form-group col-md-6">
                      <button type="submit" class="btn btn-primary" id="editAjax{{$homework->id}}">Edit this Assignment</button>
                      
                    </div>
                    <div class="form-group col-md-6" id="chars">
                        <button type="button" class="btn" id="editCancel{{$homework->id}}">Cancelt</button>
                    </div>
                  </div>
                  <div class="box-footer">
                  </div>
                </form>
              </div>
            <!-- END EDIT assignment  -->
              
           <!-- START modal for delete start  -->
              <div class="modal fade" id="confirm-delete{{$homework->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              Confirm Delete Homework {{$homework->id}} - {{$homework->subject}} {{$homework->grade}} {{$homework->section}} 
                          </div>
                          <div class="modal-body">
                              <strong>Are you sure you want to delete this assignment?</strong> <p> {!! htmlspecialchars_decode(substr($homework->description, 0, 360)) !!}...</p>
                          </div>
                          <div class="modal-footer">
                              
                              <form role="form" method="post" action="/ajaxAssignment/x/{{$homework->id}}" enctype="multipart/form-data"  name="delAssignment{{$homework->id}}" >
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                @csrf
                                <input type="hidden" name="hw" value="{{$homework->id}}" />
                              <button type="submit" class="btn btn-danger btn-ok" id="delHW{{$homework->id}}" data-dismiss="modal">Delete</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
         <!-- END modal for delete   -->
                            
                        </li>
                        @endforeach --}}
                        
                    </ul>
                    
                    
                </div><!-- /.box-body -->
                <div class="box-footer">

                <button type="button" class="btn  btn-primary center-block" id="hwLoader">load more</button>
                <button type="button" class="btn  btn-primary center-block hidden" id="hwShowAll">More Homework</button>
                </div><!-- /.box-footer-->
                <div class="overlay" style="display:none;" id="loaderTarget">
                        <i class="fa fa-refresh fa-spin"></i>
                      </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-primary" >
                <div class="box-header with-border">
                <h3 class="box-title">SUBJECT_NAME Assignments </h3>
                    <div class="box-tools pull-right">
                            
                                    
                                    <input type="text" id="datepicker" class="form-control" name="date" style="width: 100px; border: 0; line-height: 12px; height: 1px;padding: 5px; display: inline;">
                                       <span class="fa fa-calendar"></span>
                                    
                                    <button class="btn btn-box-tool" id='hideshow' title="add assignment">
                                            <i class="fa fa-plus-circle" style="font-size: 16px;"></i></button>
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>

                        <div class="box " id="myForm">
                          <style>
                            #myForm,
                            #testUpload,
                            #asUpload,
                            #hoUpload {
                              display: none;
                              margin: 20px;
                              width: auto;
                            }
                          </style>
                
                          <div class="box-header with-border">
                            <h3 class="box-title">Post Assignment Form</h3>
                          
                          </div>
                          <form role="form" method="post" enctype="multipart/form-data" action="#" autocomplete="off">
                            <div class="box-body">
                              @csrf
                              <div class="form-group col-md-6">
                                <label for="exampleInputSubject">Publish Date</label>
                                <input type="text" class="form-control" id="test2" name = "pubdate"placeholder="Enter Title" required>
                              </div>
                              <div class="form-group col-md-6">
                                <label for="exampleInputSubject">Subject</label>
                
                                <select class="form-control" name="class">
                                    <option value=""selected>[SUBJECT] [GRADE]-[SECTION]</option>
                                  {{--@foreach($subjects as $subj)
                                <option  value="{{$subj->subj}}_{{$subj->grade}}_{{$subj->section}}">
                                    {{UCWORDS($subj->subj)}} {{UCWORDS($subj->grade)}} - {{UCWORDS($subj->section)}}
                                </option>
                                  @endforeach--}}
                                </select>
                              </div>
                              <div class="form-group col-md-12">
                                <textarea id="editor1" name="description" rows="10" cols="80">
                                  
                                </textarea>
                              </div>
                
                              <div class="form-group col-md-6">
                                <button type="submit" class="btn btn-primary">Post Assignment</button>
                              </div>
                              
                            </div>
                            <div class="box-footer">
                            </div>
                          </form>
                        </div>
                
                <div id="div1" class="box-body" >
                   
                    <ul style="list-style: none;" id="hw">
                        
                        {{--@foreach($homeworks as $homework)
                        <li style="border-bottom: 1px solid #ccc;">
                        <div id="HWcontent{{$homework->id}}">
                            <h4 style="font-weight:bold;">{{UCWORDS($homework->subject)}} {{$homework->grade .$homework->section}}</h4>
                            <span style="float:right; font-style:italic;">{{date("l M d, Y", strtotime($homework->pubdate))}}</span>
                            <span style="display:block;">{{$homework->title}} {{UCWORDS($homework->firstname)}} {{UCWORDS($homework->lastname)}}</span>
                            <div class="target">
                                <br /><br />
                                <div class="pull-right">
                                  <!-- <button type="button" id="editShow{{$homework->id}}"class="btn btn-success btn-sm "><i class="fa  fa-pencil"> </i> </button> -->
                                  
                                  <!-- <button type="button" id="delShow{{$homework->id}}"class="btn btn-danger btn-sm " data-toggle="modal" data-target="#confirm-delete{{$homework->id}}"><i class="fa  fa-trash"></i></button> -->
                                </div> 
                            </div>
                        </div>
                            <span class="read-more pull-right-container" style="display:block; width:100%;">
                                <i class="fa  pull-right  fa-angle-up"></i>
                            </span>
             <!-- START EDIT assignment  -->
            <div class="box box-danger">
                <!-- <style>
                  #HW{{$homework->id}} {
                    display: none;
                    margin: 20px;
                    width: auto;
                  }
                </style> -->
      
                <div class="box-header with-border">
                  <h3 class="box-title">EDIT Assignment </h3>
                  <!-- <button class="btn btn-box-tool pull-right" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            <button class="btn btn-box-tool pull-right" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button> -->
                </div>
              <form role="form" method="post" action="/ajaxAssignment/e/{{$homework->id}}" enctype="multipart/form-data"  name="editAssignment{{$homework->id}}" autocomplete="off">
                  <div class="box-body">
                  @csrf
                    <div class="form-group col-md-6">
                      
                    <input type="hidden" name="hw" value="{{$homework->id}}" >
                      <label for="exampleInputSubject">Publish Date</label>
                    <input type="text" class="form-control" id="datepicker{{$homework->id}}" name = "pubdate"placeholder="Enter Title" value="{{$homework->pubdate}}" required>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="exampleInputSubject">Subject</label>
      
                      <select class="form-control" name="class">
                      <option value="{{$homework->subject}}_{{$homework->grade}}_{{$homework->section}}"selected>{{$homework->subject}} {{$homework->grade}} - {{$homework->section}}</option>
                        @foreach($subjects as $subj)
                      <option  value="{{$subj->subj}}_{{$subj->grade}}_{{$subj->section}}">{{UCWORDS($subj->subj)}} {{UCWORDS($subj->grade)}} - {{UCWORDS($subj->section)}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-12">
                    <textarea id="editorHW{{$homework->id}}" name="description" rows="10" cols="80">
                        
                      </textarea>
                    </div>
      
                    <div class="form-group col-md-6">
                      <button type="submit" class="btn btn-primary" id="editAjax{{$homework->id}}">Edit this Assignment</button>
                      
                    </div>
                    <div class="form-group col-md-6" id="chars">
                        <button type="button" class="btn" id="editCancel{{$homework->id}}">Cancelt</button>
                    </div>
                  </div>
                  <div class="box-footer">
                  </div>
                </form>
              </div>
            <!-- END EDIT assignment  -->
              
           <!-- START modal for delete start  -->
              <div class="modal fade" id="confirm-delete{{$homework->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              Confirm Delete Homework {{$homework->id}} - {{$homework->subject}} {{$homework->grade}} {{$homework->section}} 
                          </div>
                          <div class="modal-body">
                              <strong>Are you sure you want to delete this assignment?</strong> <p> {!! htmlspecialchars_decode(substr($homework->description, 0, 360)) !!}...</p>
                          </div>
                          <div class="modal-footer">
                              
                              <form role="form" method="post" action="/ajaxAssignment/x/{{$homework->id}}" enctype="multipart/form-data"  name="delAssignment{{$homework->id}}" >
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                @csrf
                                <input type="hidden" name="hw" value="{{$homework->id}}" />
                              <button type="submit" class="btn btn-danger btn-ok" id="delHW{{$homework->id}}" data-dismiss="modal">Delete</button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
         <!-- END modal for delete   -->
                            
                        </li>
                        @endforeach --}}
                        
                    </ul>
                    
                    
                </div><!-- /.box-body -->
                <div class="box-footer">

                <button type="button" class="btn  btn-primary center-block" id="hwLoader">load more</button>
                <button type="button" class="btn  btn-primary center-block hidden" id="hwShowAll">More Homework</button>
                </div><!-- /.box-footer-->
                <div class="overlay" style="display:none;" id="loaderTarget">
                        <i class="fa fa-refresh fa-spin"></i>
                      </div>
            </div>
        </div>



</div>

@push('scripts')
    <script>
        $(document).ready(function(){
        });
    </script>
@endpush
@endsection
