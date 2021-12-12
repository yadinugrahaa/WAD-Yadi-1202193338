@extends('layout')

@section('main')

<div class="container mt-3">
    <div class="d-flex justify-content-center">
        <h1>LIST VACCINE</h1>

    </div>

    <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addvaccine">
            INPUT VACCINE
        </button>
    </div>

    @if ($vaccines->isNotEmpty())
    <table class="table table-striped mt-3">
        <thead class="table-Secondary">
            
            <tr>
                <th class="col-md-1">#</th>
                <th class="col">Name</th>
                <th class="col-md-3">Image</th>
                <th class="col-md-3">Price</th>
                <th class="col-md-2">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($vaccines as $vaccine)
            <tr>
                <th>{{$vaccine->id}}</th>
                <td>{{$vaccine->name}}</td>
                <td>{{$vaccine->image}}</td>
                <td>{{$vaccine->price}}</td>
                <td>

                    <button type="button" data-bs-toggle="modal" data-bs-target="#editvaccine{{$vaccine->id}}" class="btn btn-success mr-5">Edit</button>

                    <button type="button" data-bs-toggle="modal" data-bs-target="#deletevaccine{{$vaccine->id}}" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>


    @else
    <div class="d-flex justify-content-center mt-3">
        Tidak ada data Vaksin
    </div>
    @endif

    <!-- MODAL ADD VACCINE -->
    <div class="modal fade" id="addvaccine" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Vaccine</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="/vaccine" method="post">
                    @csrf
                    <div class="modal-body">
                        <label for="basic-url" class="form-label">Vaccine Name</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="name">
                        </div>

                        <label for="basic-url" class="form-label">Price</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" name="price">
                        </div>

                        <label for="basic-url" class="form-label">Description</label>
                        <div class="input-group mb-3">
                            <input type="textarea" class="form-control" name="description">
                        </div>

                        <label for="basic-url" class="form-label">Image</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- END MODAL ADD -->
    @foreach ($vaccines as $vaccine)

    <!-- MODAL EDIT VACCINE -->
    <div class="modal fade" id="editvaccine{{$vaccine->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">EDIT VAKSIN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="/vaccine/update/{{$vaccine->id}}" method="post">
                    @csrf
                    @method('patch')

                    <div class="modal-body">
                        <label for="basic-url" class="form-label">Vaccine Name</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="name" value="{{$vaccine->name}}">
                        </div>

                        <label for="basic-url" class="form-label">Price</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" name="price" value="{{$vaccine->price}}">
                        </div>

                        <label for="basic-url" class="form-label">Description</label>
                        <div class="input-group mb-3">
                            <input type="textarea" class="form-control" name="description" value="{{$vaccine->description}}">
                        </div>

                        <label for="basic-url" class="form-label">Image</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- END MODAL EDIT VACCINE -->

    <!-- MODAL DELETE VACCINE -->
    <div class="modal fade" id="deletevaccine{{$vaccine->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">HAPUS VAKSIN</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="/vaccine/delete/{{$vaccine->id}}" method="post">
                    @csrf
                    @method('delete')

                    <div class="modal-body">
                        <h5>Yakin ingin menghapus Vaksin <b>{{$vaccine->name}}?</b></h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- END MODAL DELETE VACCINE -->
    @endforeach
</div>

@endsection
