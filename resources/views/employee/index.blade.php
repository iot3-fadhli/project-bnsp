@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployee">
                            <i class="ti ti-plus fs-6"></i>
                            Tambah Pegawai</button>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Aksi</td>
                                <td>Nama</td>
                                <td>Email</td>
                                <td>No HP</td>
                                <td>Alamat</td>
                                <td>Jabatan</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $employee)
                                <td>1</td>
                                <td>
                                    <button type="button" class="btn btn-warning">
                                        <i class="ti ti-pencil fs-6"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger">
                                        <i class="ti ti-trash fs-6"></i>
                                    </button>
                                </td>
                                <td>
                                    Fadhli Harzian Syah
                                </td>
                                <td>fadhliharziansyah@gmail.com</td>
                                <td>082122109026</td>
                                <td>Padang Utara</td>
                                <td>HRD</td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="addEmployee" tabindex="-1" aria-labelledby="addEmployeeLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <form class="modal-content" action="{{ route('employee.store')}}" id="formAddEmployee">
                @csrf
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addEmployeeLabel">Tambah Pegawai</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="nama Lengkap"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" email="email" placeholder="E-mail"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">No. HP</label>
                        <input type="text" class="form-control" id="phone" phone="phone" placeholder="No. HP"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="address" address="address" placeholder="Alamat"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="position" position="position" placeholder="Jabatan"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('script')
<script>
    $(document).ready(function(){
        $('#addEmployee').on('hidden.bs.modal', function(){
            $(this).find('form').trigger('reset');
        });

        $('#formAddEmployee').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data:$(this).serialize(),
                success: function(response) {
                    allert(response.message);
                    $('#addEmployee').modal('hide');
                }
            });
        });
    });
</script>
@endpush
