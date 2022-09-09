<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Edit User</title>
</head>

<body>
    <div class="container">
        <h2>Edit User</h2>
        <form action="{{ url('update-user/'.$user->id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Birth Date</label>
                <input type="date" name="birth_date" value="{{ $user->birth_date }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Salary</label>
                <input type="number" name="salary" value="{{ $user->salary }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Gender</label>
                <div class="form-check-inline"><label class="form-check-label"><input type="radio"
                            class="form-check-input" name="gender" value="Male"
                            {{ ($user->gender=='Male')? "checked": ""}}>Male</label>
                </div>
                <div class="form-check-inline"><label class="form-check-label"><input type="radio"
                            class="form-check-input" name="gender" value="Female"
                            {{ ($user->gender=="Female")? "checked" : "" }}>Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="">Department</label>
                <select class="form-control" name="department">
                    <option value="CSE" @if ($user->department == "CSE")selected="selected" @endif>CSE</option>
                    <option value="EEE" @if ($user->department == "EEE")selected="selected" @endif>EEE</option>
                    <option value="LAW" @if ($user->department == "LAW")selected="selected" @endif>LAW</option>
                    <option value="ENG" @if ($user->department == "ENG")selected="selected" @endif>ENG</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Bio</label>
                <input type="textarea" name="bio" value="{{ $user->bio }}" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Update</button>
                <a class="btn btn-success" href="{{ url('users') }}">Back to person</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>