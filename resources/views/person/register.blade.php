<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person Register</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet"
        id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
    <form class="form-horizontal" action="{{ url('personregister-store') }}" method="POST">
        {{ csrf_field() }}
        <fieldset>
            <div id="legend">
                <legend class="">Person Register</legend>
            </div>
            @if(Session::has('err'))
            <div class="controls input-xlarge">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    {{ Session::get('err') }}
                </div>
            </div>
            @endif
            @if(Session::has('success'))
            <div class="controls input-xlarge">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    {{ Session::get('success') }}
                </div>
            </div>
            @endif
            </div>
            <div class="control-group">
                <label class="control-label" for="username">Username</label>
                <div class="controls">
                    <input type="text" name="name" id="username" placeholder="Enter your name" class="input-xlarge">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="email">E-mail</label>
                <div class="controls">
                    <input type="email" name="email" id="email" placeholder="Enter your email" class="input-xlarge">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="password">Password</label>
                <div class="controls">
                    <input type="password" name="password" id="password" placeholder="Enter your password"
                        class="input-xlarge">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="password_confirm">Password (Confirm)</label>
                <div class="controls">
                    <input type="password" name="repeat" id="password_confirm" placeholder="Repeat your password"
                        class="input-xlarge">
                </div>
            </div>

            <div class="control-group">
                <div class="controls">
                    <button class="btn btn-success">Register</button>
                    <a class="btn btn-primary" href="{{ url('person-login') }}">Login</a>
                </div>
            </div>
        </fieldset>
    </form>

    <script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
    </script>
</body>

</html>
