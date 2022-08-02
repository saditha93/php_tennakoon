<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Test</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sales Team</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('sales.create') }}">Add New</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Current Route</th>
            <th>Action</th>
        </tr>
        @foreach ($sales as $sale)
            <tr>
                <td>{{ $sale->id }}</td>
                <td>{{ $sale->name }}</td>
                <td>{{ $sale->email }}</td>
                <td>{{ $sale->telephone }}</td>
                <td>{{ $sale->route }}</td>
                <td>
                    <div style="display: flex;">
                        <button id="myBtn" class="btn btn-primary">View</button>
                        <form action="{{ route('sales.destroy',$sale->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('sales.edit',$sale->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </td>
                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>{{ $sale->name }}</h2>
                        <h6>ID: {{ $sale->id }}</h6>
                        <h6>Full Name: {{ $sale->name }}</h6>
                        <h6>Email Address: {{ $sale->emain }}</h6>
                        <h6>Telephone: {{ $sale->telephone }}</h6>
                        <h6>Join Date: {{ $sale->created_at }}</h6>
                        <h6>Current Route: {{ $sale->route }}</h6>
                        <h6>Comments: {{ $sale->comment }}</h6>
                    </div>
                </div>
            </tr>
        @endforeach
    </table>
{!! $sales->links() !!}
</body>
</html>

<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0, 0, 0); /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>


<script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function () {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
