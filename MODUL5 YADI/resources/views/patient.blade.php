@extends('layout')

@section('main')

<div class="container mt-3">

    <div class="d-flex justify-content-center">
        <h1>LIST VACCINE</h1>
    </div>

    <div class="row mt-3">

        @foreach ($vaccines as $vaccine)
        <div class="col-md-4 justify-content-center">

            <div class="card">

                {{-- <img src="..." class="card-img-top" alt="..."> --}}
                <div class="card-body">
                    <h5 class="card-title">{{$vaccine->name}}</h5>
                    <p class="text-secondary">{{$vaccine->price}}</p>
                    <p class="card-text">{{$vaccine->description}}</p>

                    <button type="button" data-bs-toggle="modal" data-bs-target="#registerpatient{{$vaccine->id}}" class="btn btn-success">Vaccine Now</button>

                </div>
            </div>
        </div>

        <!-- MODAL REGISTER VACCINE -->
        <div class="modal fade" id="registerpatient{{$vaccine->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Register {{$vaccine->name}} Patient</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/patient/{{$vaccine->id}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <label for="basic-url" class="form-label">Vaccine Name</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{$vaccine->name}}" disabled>
                            </div>

                            <label for="basic-url" class="form-label">Patient Name</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="name">
                            </div>

                            <label for="basic-url" class="form-label">NIK</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="nik">
                            </div>

                            <label for="basic-url" class="form-label">Alamat</label>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="alamat">
                            </div>

                            <label for="basic-url" class="form-label">Image</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="image_ktp">
                            </div>

                            <label for="basic-url" class="form-label">No HP</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" name="no_hp">
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
        <!-- END MODAL REGISTER VACCINE -->
        @endforeach
    </div>


    <div class="d-flex justify-content-center mt-5">
        <h2>LIST PATIENT</h2>
    </div>

    @if ($patients->isNotEmpty())
    <table class="table table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th class="col-md-1">#</th>
                <th class="col">Nama Pasien</th>
                <th class="col">Vaccine</th>
                <th class="col">NIK</th>
                <th class="col">Alamat</th>
                <th class="col">No HP</th>
                <th class="col-md-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
            <tr>
                <th>{{$patient->id}}</th>
                <th>{{$patient->name}}</th>
                <td>{{$patient->vaccine->name}}</td>
                <td>{{$patient->nik}}</td>
                <td>{{$patient->alamat}}</td>
                <td>{{$patient->no_hp}}</td>
                <td>

                    <button type="button" data-bs-toggle="modal" data-bs-target="#editpatient{{$patient->id}}" class="btn btn-success mr-5">Edit</button>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#deletepatient{{$patient->id}}" class="btn btn-danger">Delete</button>
                </td>
            </tr>

            <!-- MODAL EDIT PATIENT -->
            <div class="modal fade" id="editpatient{{$patient->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Patient</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/patient/update/{{$patient->id}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="modal-body">
                                <label for="basic-url" class="form-label">Vaccine Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" value="{{$patient->vaccine->name}}" disabled>
                                </div>

                                <label for="basic-url" class="form-label">Patient Name</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="name" value="{{$patient->name}}">
                                </div>

                                <label for="basic-url" class="form-label">NIK</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" name="nik" value="{{$patient->nik}}">
                                </div>

                                <label for="basic-url" class="form-label">Alamat</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="alamat" value="{{$patient->alamat}}">
                                </div>

                                <label for="basic-url" class="form-label">Image</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" name="image_ktp" value="{{$patient->image_ktp}}">
                                </div>

                                <label for="basic-url" class="form-label">No HP</label>
                                <div class="input-group mb-3">
                                    <input type="number" class="form-control" name="no_hp" value="{{$patient->no_hp}}">
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
            <!-- END MODAL EDIT PATIENT -->

            <!-- MODAL DELETE PATIENT -->
            <div class="modal fade" id="deletepatient{{$patient->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Patient</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="/patient/delete/{{$patient->id}}" method="post">
                            @csrf
                            @method('delete')
                            <div class="modal-body">
                                <h5>Yakin ingin menghapus pasien "{{$patient->name}}" ?</h5>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- MODAL DELETE PATIENT -->

            @endforeach
        </tbody>
    </table>

    @else

    <div class="d-flex justify-content-center mt-3">
        Belum ada vaksin pada pasien
    </div>
    @endif

</div>

@endsection
