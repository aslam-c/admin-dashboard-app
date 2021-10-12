@extends('dashboard')
<script src='{{asset("plugins/jquery/jquery.min.js")}}'></script>
<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

@section('child_content')

<div class="container">
<div class="card-body">
<table id="employee_table" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Designation</th>
      <th>Actions</th>

    </tr>
    </thead>
</table>
</div>
</div>



@endsection
<script>
    $(document).ready(function() {
        $('#employee_table').DataTable({
            "ajax":"{{url('api/employees/list')}}",
            aoColumns:[{
                mData:'name',
                sTitle:'Name'
            },
            {
                mData:'email',
                sTitle:'Email'
            },
            {
                mData:'designation.name',
                sTitle:'Designation'
            },
            {
                mData:'id',
                render: function(data,type){
                    console.log(data);
                    return `<a href="{{url('employees/update/${data}')}}">Edit/Delete</a>`;
                }
            }
        ]

        });
    } );
    </script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
