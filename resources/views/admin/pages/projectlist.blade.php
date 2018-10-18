@extends('admin.layouts.default')

@section('content')


<div class="content mt-3">

            <!-- <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Success</span> Welcome to Project list page.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div> -->

            @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
            </div>
            @endif


            <div class="col-sm-12">
            <a style="float:right;margin:2%;box-shadow: 25px 15px 20px 0px grey;" class=""  href="{{ url('/adminproject/create') }}" title=""><button  type="button" class="btn btn-warning">+ Add Project</button></a>
               <table id="responsive" class="display responsive" style="width:100%;box-shadow: 0px 0px 10px 0px grey;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        if(!empty($projectinfo)){ 
                        @endphp
                            @foreach ($projectinfo as $proj)
                              @php
                                $projid=$proj['id'];
                                $projname=$proj['name'];
                                $projdesc=$proj['description'];
                                $projstatus=$proj['status'];
                              @endphp
                            <tr>
                                <td>{{ $projid }}</td>
                                <td>{{ $projname }}</td>
                                @php
                                if(!empty($proj['images'])){
                                    $imge=$proj['images'];
                                }else{
                                    $imge='';
                                }
                                if(file_exists( public_path() . "/upload/$imge") && !empty($imge))
                                     $prflepth="/upload/$imge";
                                else
                                    $prflepth="/images/profile.png";
                                @endphp
                                <td style="width:15%;">
                                    <img style="width:25%;box-shadow: 25px 15px 20px 0px grey;border-radius: 80px 80px 80px 80px;" src="{{ asset($prflepth) }}" alt="Homepage">
                                </td>

                                <td>
                                    <form id="stsfrm" action="{{url('/adminprojectsts')}}" method="POST">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="hidden" name="projectid" value="{{ $projid }}">
                                    @if($projstatus == 1)
                                            <input type="hidden" name="status" value="0">
                                            <input style="box-shadow: 25px 15px 20px 0px grey;" type="submit" class="btn btn-success" id="stst" value="Deactivate"/>
                                    @else
                                            <input type="hidden" name="status" value="1">
                                            <input style="box-shadow: 25px 15px 20px 0px grey;" type="submit" class="btn btn-danger" id="stst" value="Activate"/>
                                    @endif
                                    </form>

                                </td>
                                <td>
                                <a class=""  href="{{ URL::to('adminproject/' . $projid) }}" title=""><button style="box-shadow: 25px 15px 20px 0px grey;" type="button" class="btn btn-warning">View</button></a>

                                <a href="{{ URL::to('adminproject/' . $projid . '/edit') }}">
                                <button style="box-shadow: 25px 15px 20px 0px grey;" type="button" class="btn btn-warning">Edit</button>
                                </a>&nbsp;

                                <form id="dltfrm" action="{{url('adminproject', [$projid])}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" style="width:117px; box-shadow: 25px 15px 20px 0px grey;" class="btn btn-danger" id="del" value="Delete"/>
                                </form>
                                
                            </tr>
                            @endforeach
                        @php }else{ 
                            echo 'No content';
                        } @endphp
                        
                    </tbody>
                    <!-- <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot> -->
                </table> 
            </div>
            <!--/.col-->         
            <style type="text/css">
                
            </style> 
            <link href='https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
            <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>  
            <script type="text/javascript">
                $(document).ready(function() {                    
                    $(document).on("submit", "#dltfrm", function(e){
                        if(confirm('Are you sure you want to delete?')){
                            return true;
                        }else{
                            e.preventDefault();
                            return false;
                        }
                    });
                    $('.menu-item-has-children:eq( 0 )').addClass('show');
                    $('.sub-menu:eq( 0 )').addClass('show');
                    $('.sub-menu:eq( 0 ) a').addClass('activa');
                    
                    $('#responsive').DataTable();
                });
            </script>

</div>
@stop