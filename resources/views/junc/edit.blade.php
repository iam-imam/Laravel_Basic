<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>Edit Junc</title>
</head>

<body>
    <div class="container">
        <h2>Edit Junc</h2>
        <form action="{{ url('update-junc/'.$junc->id) }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" value="{{ $junc->name }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Birth Date</label>
                <input type="date" name="birth_date" value="{{ $junc->birth_date }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Salary</label>
                <input type="number" name="salary" value="{{ $junc->salary }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Gender</label>
                <div class="form-check-inline"><label class="form-check-label"><input type="radio"
                            class="form-check-input" name="gender" value="Male"
                            {{ ($junc->gender=='Male')? "checked": ""}}>Male</label>
                </div>
                <div class="form-check-inline"><label class="form-check-label"><input type="radio"
                            class="form-check-input" name="gender" value="Female"
                            {{ ($junc->gender=="Female")? "checked" : ""}}> Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="">Department</label>
                <select class="form-control" name="department">
                    <option value="CSE" @if ($junc->department == "CSE")selected="selected" @endif>CSE</option>
                    <option value="EEE" @if ($junc->department == "EEE")selected="selected" @endif>EEE</option>
                    <option value="LAW" @if ($junc->department == "LAW")selected="selected" @endif>LAW</option>
                    <option value="ENG" @if ($junc->department == "ENG")selected="selected" @endif>ENG</option>
                </select>
            </div>
            <div class="form-group">
                @php
                $skills = json_decode($junc->skill)
                @endphp

                <label for="">Skills:</label>
                <label class="form-check">
                    <input class="form-check-input" type="checkbox" name="skill[]" value="HTML" @foreach($skills as
                        $s){{ ($s=="HTML")? "checked" : ""}}@endforeach>HTML
                </label>
                <label class="form-check">
                    <input class="form-check-input" type="checkbox" name="skill[]" value="CSS" @foreach($skills as
                        $s){{ ($s=="CSS")? "checked" : ""}}@endforeach>CSS
                </label>
                <label class="form-check">
                    <input class="form-check-input" type="checkbox" name="skill[]" value="JavaScript" @foreach($skills
                        as $s){{ ($s=="JavaScript")? "checked" : ""}}@endforeach>JAVASCRIPT
                </label>
                <label class="form-check">
                    <input class="form-check-input" type="checkbox" name="skill[]" value="PHP" @foreach($skills as
                        $s){{ ($s=="PHP")? "checked" : ""}}@endforeach>PHP
                </label>
                <label class="form-check">
                    <input class="form-check-input" type="checkbox" name="skill[]" value="MySQL" @foreach($skills as
                        $s){{ ($s=="MySQL")? "checked" : ""}}@endforeach>MySQL
                </label>
            </div>
            <div class="form-group">
                <label for="">Bio</label>
                <input type="textarea" name="bio" value="{{ $junc->bio }}" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-dark">Update</button>
                <a class="btn btn-success" href="{{ url('juncs') }}">Back to Juncs</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>
