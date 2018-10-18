<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>IT PlayGround</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- popup modal
    ================================================== -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.0/animate.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="{{ URL::asset('css/base.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}">

    <!-- script
    ================================================== -->
    <script src="{{ URL::asset('js/modernizr.js') }}"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="{{ URL::asset('images/logoit.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ URL::asset('images/logoit.png') }}" type="image/x-icon">

    <style>
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 0px 10px 0px 10px;
            font-size: 16px;
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 50px 10px grey;
        }

        .dropdown {
            position: relative;
            display: inline-block;
            float: right;
            right: 14%;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            font-size: 12px;
        }

        .dropdown-content a:hover {background-color: #ddd;}

        .dropdown:hover .dropdown-content {display: block;}

        .dropdown:hover .dropbtn {background-color: #3e8e41;}

        .modal { top:5%; }
        #signinmodal, #signupmodal, #forgotpasswordmodal { opacity: 0.9; }
        .modal-body { background-color: #000; }
        .modal-body input {height: 40px; background-color: #000; box-shadow: 0px 0px 200px 20px springgreen; opacity: 0.6}
        .modal-header .close {margin-top: 10px;margin-right: 1%;}
        .modal-header h4 { color:darkgray; }
        .modal-footer { color:#000; font-size: smaller; font-size: smaller; height: 65px;}
        /*close*/
        .box {
          height: 20%;
          width: 100%;
          box-sizing: border-box;
          position: relative;
          overflow: hidden;
          /*border: 2px solid #ecf0f1;*/
        }
        .box h3 {margin-left: 8%;}
        .box img {
          top: 5px;
          right: 5px;
          width: 25px;
          height: 25px;
          position: absolute;
          -webkit-transition: -webkit-transform .25s, opacity .25s;
          -moz-transition: -moz-transform .25s, opacity .25s;
          transition: transform .25s, opacity .25s;
          opacity: .25;
        }

        .box img:hover {
          -webkit-transform: rotate(270deg);
          -moz-transform: rotate(270deg);
          transform: rotate(270deg);
          opacity: 1;
        }

        #siteMsg{
            background-color: #4CAF50;
            width: 65%;
            margin: 0 auto;
            padding: 1%;
            border-radius: 10px 10px 10px 10px;
            color: white;
            box-shadow: 0px 0px 102px 20px silver;
            /* margin-top: 32%; */
            z-index: 0;
        }

        .invalid-feedback { color: orangered; font-size: 14px; }

        .display-1 { font-size: 1.8rem; color:white;}

        .subcourses a { box-shadow: 0px 0px 23px 0px grey; border-radius: 20px 20px 20px 20px; padding-left: 8%; width: auto; margin:2%;}
    </style>
    <!-- <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}"> -->

    <!-- custom scrollbar plugin -->
    <!-- <script src="{{ URL::asset('js/jquery.mCustomScrollbar.concat.min.js') }}"></script> -->
    
    <!-- <script>
        (function($){
            $(window).on("load",function(){
                
                $("#content-1").mCustomScrollbar({
                    autoHideScrollbar:true,
                    theme:"rounded"
                });
                
            });
        })(jQuery);
    </script> -->

</head>
