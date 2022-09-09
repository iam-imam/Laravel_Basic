<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Persons</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Persons</h2>
        <a class="btn btn-success" href="{{ url('person-dashboard') }}">Dashboard</a>
        <a class="btn btn-info" href="{{ url('persons/all') }}">All Persons</a>
        <a class="btn btn-dark" href="{{ url('persons/pending') }}">Pending Perons</a>
        @if(Session::has('msg'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            {{ Session::get('msg') }}
        </div>
        @endif
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
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($persons as $p)
                <tr>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->email }}</td>
                    <td>{{ $p->role }}</td>
                    <td>{{ $p->is_approved == 1 ? 'Approved' : 'Pending' }}</td>
                    <td>
                        @if($p->is_approved == 0)
                        <a class="btn btn-success" href="{{ url('approve-person/'.$p->id) }}">Approve</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#id{{ $p->id }}">
                            Reject
                        </button>

                        <!-- The Modal -->
                        <div class="modal" id="id{{ $p->id }}">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Reject Person?</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Are your sure you want to reject <b>{{ $p-> name }}</b>?
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <a class="btn btn-danger" href="{{ url('delete-person/'.$p->id) }}">Yes</a>
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>


</html>
