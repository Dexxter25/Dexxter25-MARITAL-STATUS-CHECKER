@extends('layouts.app')
@section('content')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        
                        <a class="nav-link" href="{{ route('main.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-home-alt"></i></div>
                            Home
                        </a>
                        <a class="nav-link active" href="{{ route('main.records') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Status
                        </a>
                    </div>
                </div>
               
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Marital Status</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Register Marital</a></li>
                        <li class="breadcrumb-item active">Tables</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            @if (session('success'))
                                <script>
                                    Swal.fire({
                                        title: "Success!",
                                        text: "{{ session('success') }}",
                                        icon: "success",
                                        confirmButtonText: "OK"
                                    });
                                </script>
                            @endif
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Civil Status</th>
                                        <th>Nationality</th>
                                        <th>Citizenship</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Gender</th>
                                        <th>Civil Status</th>
                                        <th>Nationality</th>
                                        <th>Citizenship</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if (count($records) > 0)
                                        @foreach ($records as $record)
                                            <tr>
                                                <td>{{ $record->first_name }} {{ $record->middle_name }} {{ $record->last_name }}</td>
                                                <td>{{ $record->gender }}</td>
                                                <td>{{ $record->civil_status }}</td>
                                                <td>{{ $record->nationality }}</td>
                                                <td>{{ $record->citizenship }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('main.view', $record->id) }}" class="btn btn-primary" style="margin-right: 4px;">
                                                            View
                                                        </a>                                                        
                                                        <form action="{{ route('main.records.destroy', $record->id) }}" method="post">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger" onclick="deleteConfirm(event)">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>                                                
                                            </tr>
                                        @endforeach
                                    @else
                                        <p>Records not Found</p>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main><br><br>
           
        </div>
    </div>
    <script>
        window.deleteConfirm = function(e) {
            e.preventDefault();
            var form = e.target.form;
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }

        window.deleteConfirmatioin = function(e) {
            e.preventDefault();
            var form = e.target.form;
            Swal.fire({
                title: "Are you sure?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        }
    </script>
@endsection
