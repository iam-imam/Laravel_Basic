<!DOCTYPE html>
<html lang="en">

<head>
    <title>Practice</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <h2>Demo Registration</h2>
        <form action="{{ url('store-test') }}" method="post">
            {{ csrf_field() }}
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
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" placeholder="Enter name" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="birth_date">Birth Date:</label>
                <input type="date" class="form-control" name="birth_date">
            </div>
            <div class="form-group">
                <label for="salary">Salary:</label>
                <input type="number" class="form-control" placeholder="Enter salary" name="salary">
            </div>
            <div class="form-group">
                <label for="salary">Gender:</label><br>
                <div class="form-check-inline"><label class="form-check-label"><input type="radio"
                            class="form-check-input" name="gender" value="Male">Male</label>
                </div>
                <div class="form-check-inline"><label class="form-check-label"><input type="radio"
                            class="form-check-input" name="gender" value="Female">Female</label></div>
            </div>
            <div class="form-group">
                <label for="dept">Department:</label>
                <select class="form-control" name="department">
                    <option value="select">Select Department</option>
                    <option value="CSE">CSE</option>
                    <option value="EEE">EEE</option>
                    <option value="LAW">Law</option>
                    <option value="ENG">English</option>
                </select>
            </div>
            <div class="form-group">
                <label for="bio">Bio:</label>
                <textarea class="form-control" name="bio" rows="2" cols="50"></textarea>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" placeholder="Enter password" name="password">
            </div>
            <div class="form-group">
                <label for="pwd">Repeat:</label>
                <input type="password" class="form-control" placeholder="Repeat password" name="repeat">
            </div>
            <div class="form-group">
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="teacher" value="1">Teacher
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="student" value="1">Student
                    </label>
                </div>
            </div>
            <div class="from-group">
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
