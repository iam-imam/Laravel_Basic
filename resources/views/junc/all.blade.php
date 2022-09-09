<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <title>All Juncs</title>
</head>

<body>
    <div class="container">
        <h2>All Juncs</h2>
        <span><a class="btn btn-primary" href="{{ url('junc') }}">Insert Junc</a></span>
        @if(Session::has('del'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            {{ Session::get('del') }}
        </div>
        @endif
        <table class="table table-striped">
            <thead>
                <th>Name</th>
                <th>Birth Date</th>
                <th>Salary</th>
                <th>Gender</th>
                <th>Department</th>
                <th>Skills</th>
                <th>Bio</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($juncs as $j)
                <tr>
                    <td>{{ $j->name }}</td>
                    <td>{{ $j->birth_date }}</td>
                    <td>{{ $j->salary }}</td>
                    <td>{{ $j->gender }}</td>
                    <td>{{ $j->department }}</td>
                    <td>
                        @php
                        $skills = json_decode($j->skill)
                        @endphp
                        @foreach($skills as $s)
                        @if(count($skills) == array_search($s, $skills)+1)
                        {{$s}}
                        @else
                        {{$s}},
                        @endif
                        @endforeach
                    </td>
                    <td>{{ $j->bio }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ url('edit-junc/'.$j->id) }}">Edit</a>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#id{{ $j->id }}">Delete</a>
                        <div class="modal" id="id{{ $j->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Delete user?</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete <b>{{ $j->name }}</b>?
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-danger" href="{{ url('delete-junc/'.$j->id) }}">Yes</a>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>