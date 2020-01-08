@extends('Sample_Copy.adminlte_page')

@section('content')
@push('custom_style')
<style>
</style>
@endpush

{{--<div class="row">
         <!-- START Assignments  -->
        <div class="col-md-6">
            <div class="box box-primary" >
                <div class="box-header with-border">
                <h3 class="box-title">SUBJECT_NAME Assignments </h3>
                    <div class="box-tools pull-right">
                                    
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>

                <div id="div1" class="box-body" >
                  <ul style="list-style: none;">
                        @isset($homework_data)
                            @foreach($homework_data as $val)
                            <li style="border-bottom: 1px solid #ccc;">
                              <div id="HWcontent">
                                  <h4 style="font-weight:bold;">{{ucwords($val->subject)}} {{$val->grade}} {{$val->section}}</h4>
                                  <span style="float:right; font-style:italic;">{{$val->pubdate}}</span>
                                  <span style="display:block;">{{$val->description}} teacher firstname lastname</span>
                                  <div class="target">
                                      <br /><br />
                                      <div class="pull-right">
                                      </div> 
                                  </div>
                              </div>
                                  <span class="read-more pull-right-container" style="display:block; width:100%;">
                                      <i class="fa  pull-right  fa-angle-up"></i>
                                  </span>
                                  
                              </li>
                            @endforeach
                        @endisset
                  </ul>
                <!-- homeworks here -->
                </div>
                
                <div class="box-footer">

                <button type="button" class="btn  btn-primary center-block" data-toggle="modal" data-target="#hwModal">load more</button>
                </div><!-- /.box-footer-->
                 <!-- The Modal -->
                  <div class="modal" id="hwModal">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      
                        <!-- Modal Header -->
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">ADD HOMEWORK</h4>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                          Modal body..
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                <div class="overlay" style="display:none;" id="loaderTarget">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="box box-primary" >
                <div class="box-header with-border">
                <h3 class="box-title">SUBJECT_NAME Subject Schedule </h3>
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
                        </div>
                
                <div id="div1" class="box-body" >
                  @isset($subject_schedule)
                  <table class="table table-bordered table-striped table-hover">
                    <tbody>
                      <tr>
                        <th style="width: 80px">day</th>
                        <th>Subject</th>
                        <th>Schedule</th>
                      </tr>
                        @foreach($subject_schedule as $val)
                          <tr>
                            <td>{{date("l")}}</td>
                            <td>{{$val[0]}}</td>
                            <td>{{$val[1]}} - {{$val[2]}}</td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                  @endisset
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

        <div class="col-md-4">
            <div class="box box-warning" >
                <div class="box-header with-border">
                <h2>Calendar of Events</h2>
                </div>

                
                <div id="div1" class="box-body" >
                   
                    <ul style="list-style: none;" id="hw">
                        
                        @isset($calendar_events)
                            @foreach($calendar_months as $month)
                              <div class="box-header with-border">
                                <h4>{{UCWORDS($month->month)}}</h4>                           
                              </div>
                            
                              @foreach($calendar_events as $val)
                                @if(strtolower($month->month) == strtolower(date('F', strtotime($val->date))))
                                  <div class="col-md-12">
                                  <div class="col-md-2 no-padding">
                                    <p>{{$val->date}}</p>
                                  </div>
                                  <div class="col-md-8 no-padding text-center">
                                    <p><strong>{{$val->event}}</strong></p>
                                  </div>
                                  </div>
                                  @endif
                              @endforeach
                            @endforeach
                        @endisset
                        
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
                <h3 class="box-title">SUBJECT_NAME Handouts </h3>
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



</div>--}}

@push('scripts')
    <script>
    </script>
@endpush
@endsection
