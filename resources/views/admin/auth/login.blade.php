<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">    
    <style>
        html,body{
            height:100%;
        }
        body{
            background-repeat: no-repeat;
            background-position:center;
            background-size:cover;
            background-image: url("{{ asset('/storage/images/login.jpg') }}");
            display:flex;
            justify-content:center;
            align-items:center;
        }

        #login-form{
            width:400px;
            color:white;
        }
        
    </style>
</head>
<body>
    <div id="login-form">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <h4 class="text-center">Login</h4>
                </div>
                <div class="mb-3">
                    <form action="{{ url('admin/login') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @if($errors->has('email'))
                                <p class="text-white mt-1">{{ $errors->first('email')}}</p>                
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                            @if($errors->has('password'))
                                <p class="text-white mt-1">{{ $errors->first('password')}}</p>                
                            @endif
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(()=>{
            $("[name='email']").focus();
        });
    </script>
</body>
</html>