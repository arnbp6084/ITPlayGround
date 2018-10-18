@extends('admin.layouts.default')

@section('content')


<div class="content mt-3">

            <!-- <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Success</span> Welcome to user list page.
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
            <a style="float:right;margin:2%;box-shadow: 25px 15px 20px 0px grey;" class=""  href="{{ url('/adminuser/create') }}" title=""><button  type="button" class="btn btn-warning">+ Add User</button></a>
               <table id="responsive" class="display responsive" style="width:100%;box-shadow: 0px 0px 10px 0px grey;">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>                            
                            <th>Image</th>
                            <th>Email</th>
                            
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        if(!empty($userinfo)){ 
                        @endphp
                            @foreach ($userinfo as $user)
                              @php
                                $userid=$user['id'];
                                $username=$user['name'];
                                $useremail=$user['email'];
                                $useraddress=$user['address'];
                                $userphone=$user['phone'];
                                
                              @endphp
                            <tr>
                                <td>{{ $userid }}</td>
                                <td>{{ $username }}</td>
                                @php
                                if(!empty($user['image'])){
                                    $imge=$user['image'];
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

                                
                                <td>{{ $useremail }}</td>
                                <td>
                                <a class=""  href="{{ URL::to('adminuser/' . $userid) }}" title=""><button style="box-shadow: 25px 15px 20px 0px grey;" type="button" class="btn btn-warning">View</button></a>

                                <a href="{{ URL::to('adminuser/' . $userid . '/edit') }}">
                                <button style="box-shadow: 25px 15px 20px 0px grey;" type="button" class="btn btn-warning">Edit</button>
                                </a>&nbsp;

                                <form id="dltfrm" action="{{url('adminuser', [$userid])}}" method="POST">
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
                    $('.menu-item-has-children:eq( 3 )').addClass('show');
                    $('.sub-menu:eq( 3 )').addClass('show');
                    $('.sub-menu:eq( 3 ) a').addClass('activa');
                    
                    $('#responsive').DataTable();
                });
            </script>

</div>
@stop