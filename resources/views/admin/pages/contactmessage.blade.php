@extends('admin.layouts.default')

@section('content')
       
<div class="content mt-3">

            <!-- <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                  <span class="badge badge-pill badge-success">Success</span> Welcome to content list page.
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
            
               <table id="responsive1" class="display responsive" style="width:100%;box-shadow: 0px 0px 10px 0px grey;">
                    <thead>
                        <tr>
                            <th>User Id</th>
                            <th>Name</th>
                            <th>Messages</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @php
                        if(!empty($userarrall)){ 
                        @endphp
                            @foreach ($userarrall as $usermsg)
                              @php
                                $contactid=$usermsg['id'];
                                $contactname=$usermsg['name'];
                                $contactemail=$usermsg['email'];
                                $contactphone=$usermsg['phone'];
                                $contactaddress=$usermsg['address'];
                              @endphp
                            <tr>
                                <td>{{ $contactid }}</td>
                                <td>{{ $contactname }} <br><a style="cursor: pointer;font-size: 15px;color:green;" class="viewdets">View details</a>
                                    <div class="detcont" style="display: none; margin: 4% 10% 4% 10%;">
                                        <ul>
                                            <li><b>Name:</b> {{ $contactname }}</li>
                                            <li><b>Email:</b> {{ $contactemail }}</li>
                                            <li><b>Phone:</b> {{ $contactphone }}</li>
                                            <li><b>Address:</b> {{ $contactaddress }}</li>
                                        </ul>
                                    </div>
                                </td>
                                <td>
                                    @foreach ($usermsg['msgs'] as $usercontactmsg)
                                        <span>{{ $usercontactmsg }}<br></span>
                                    @endforeach
                                </td>
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
                    //alert('kjhkjh');
                    $(document).on("submit", "#dltfrm", function(e){
                        if(confirm('Are you sure you want to delete?')){
                            return true;
                        }else{
                            e.preventDefault();
                            return false;
                        }
                    });

                    $('.menu-item-has-children:eq( 4 )').addClass('show');
                    $('.sub-menu:eq( 4 )').addClass('show');
                    $('.sub-menu:eq( 4 ) a').addClass('activa');
                    
                    
                    $('#responsive1').DataTable();

                    //changepassword
                    $(".viewdets").click(function(){
                        
                        $(this).closest('td').children('.detcont').slideToggle();
                        
                    });
                });
            </script>

</div>
@stop