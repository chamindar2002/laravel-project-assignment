<!doctype html>
<html>
    <head>
        
        <meta charset='utf-8'>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
<!--        <script src="../vendor/js/jquery-1.11.2.min.js"></script>-->
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

        {{ HTML::script('../vendor/js/jquery-1.11.2.min.js')}}
        <style>
           .content{
                width:100%;
                float: left;
                height: 100%;
                background: #f1f1f1;
                border: 1px solid #ccc;
                padding-left:20px;
            }
            .header{
                width:100%;
                float: left;
                height: 50px;
                background: #f1f1f1;
                border: 1px solid #ccc;
                padding-left:20px;
                margin-bottom: 10px;
            }
            
            .row{
                margin: 10px;
                float: right;
                width:100%;
            }
            
            .error{
                font-weight: bold;
                color:red;
            }
            
          
        </style>
        <body>
            <div class="container-fluid">
            <div class='navbar-header'>
             <ul class="nav nav-pills" role="tablist">
                <li role="presentation" >{{ link_to("users/create", 'Add New User') }}</li>
                <li role="presentation" >{{ link_to("users/", 'List User') }}</li>
                <li role="presentation" >{{ link_to("authors", 'Authors') }}</li>
                <li role="presentation" >{{ link_to("register", 'Register') }}</li>
                
                <li role="presentation" >{{ link_to("city/", 'List Cities') }}</li>
                <li>{{ link_to("logout", 'Logout') }}</li>
<!--                <li>{{ link_to("api/authors", 'test') }}</li>-->
             </ul>
              
            </div>
            <div class='content'>
                @if($errors->any())
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </div>
                @endif
            
                @yield('content')
            </div>
            </div>
        </body>
    </head>
</html>
