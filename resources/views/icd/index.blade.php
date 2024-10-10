@extends('layout.apps')

@section('content')
    <div class="container-fluid py-4">
        <h2 class="mb-4 text-primary">ICD Management</h2>

        <div class="card shadow">
            <div class="card-header bg-white py-3">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addIcdModal">
                    <i class="fas fa-plus mr-2"></i> Add New ICD
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="icdTable">
                        <thead>
                            <tr>
                                <th>Code</th>
                                <th>Name (ID)</th>
                                <th>Name (EN)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add ICD Modal -->
    <div class="modal fade" id="addIcdModal" tabindex="-1" role="dialog" aria-labelledby="addIcdModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addIcdModalLabel">Add New ICD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addIcdForm">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" id="code" name="code">
                        </div>
                        <div class="form-group">
                            <label for="name_id">Name (ID)</label>
                            <input type="text" class="form-control" id="name_id" name="name_id">
                        </div>
                        <div class="form-group">
                            <label for="name_en">Name (EN)</label>
                            <input type="text" class="form-control" id="name_en" name="name_en">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit ICD Modal -->
    <div class="modal fade" id="editIcdModal" tabindex="-1" role="dialog" aria-labelledby="editIcdModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editIcdModalLabel">Edit ICD</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editIcdForm">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="edit_code">Code</label>
                            <input type="text" class="form-control" id="edit_code" name="code" readonly>
                        </div>
                        <div class="form-group">
                            <label for="edit_name_id">Name (ID)</label>
                            <input type="text" class="form-control" id="edit_name_id" name="name_id">
                        </div>
                        <div class="form-group">
                            <label for="edit_name_en">Name (EN)</label>
                            <input type="text" class="form-control" id="edit_name_en" name="name_en">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('#icdTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('icd.data') }}",
                columns: [{
                        data: 'code',
                        name: 'code'
                    },
                    {
                        data: 'name_id',
                        name: 'name_id'
                    },
                    {
                        data: 'name_en',
                        name: 'name_en'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('#addIcdForm').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var formData = new FormData(form[0]);
                var data = {};
                formData.forEach((value, key) => {
                    if (value !== "") {
                        data[key] = value;
                    }
                });

                $.ajax({
                    url: "{{ route('icd.store') }}",
                    method: 'POST',
                    data: data,
                    success: function(response) {
                        $('#addIcdModal').modal('hide');
                        form[0].reset();
                        table.ajax.reload();
                        Swal.fire('Success', response.message, 'success');
                    },
                    error: function(xhr) {
                        handleAjaxError(xhr);
                    }
                });
            });

            $('#icdTable').on('click', '.edit-icd', function() {
                var code = $(this).data('code');
                var nameId = $(this).data('name-id');
                var nameEn = $(this).data('name-en');

                $('#edit_code').val(code);
                $('#edit_name_id').val(nameId);
                $('#edit_name_en').val(nameEn);
                $('#editIcdModal').modal('show');
            });

            $('#editIcdForm').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var code = $('#edit_code').val();
                var formData = new FormData(form[0]);
                var data = {};
                formData.forEach((value, key) => {
                    if (value !== "") {
                        data[key] = value;
                    }
                });

                $.ajax({
                    url: "/icd/" + code,
                    method: 'PUT',
                    data: data,
                    success: function(response) {
                        $('#editIcdModal').modal('hide');
                        table.ajax.reload();
                        Swal.fire('Success', response.message, 'success');
                    },
                    error: function(xhr) {
                        handleAjaxError(xhr);
                    }
                });
            });

            $('#icdTable').on('click', '.delete-icd', function() {
                var code = $(this).data('code');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "/icd/" + code,
                            method: 'DELETE',
                            success: function(response) {
                                table.ajax.reload();
                                Swal.fire('Deleted!', response.message, 'success');
                            },
                            error: function(xhr) {
                                handleAjaxError(xhr);
                            }
                        });
                    }
                });
            });

            function handleAjaxError(xhr) {
                var errorMessage = 'An error occurred. Please try again.';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }

                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    errorMessage += '<ul>';
                    $.each(xhr.responseJSON.errors, function(key, value) {
                        errorMessage += '<li>' + key + ': ' + value + '</li>';
                    });
                    errorMessage += '</ul>';
                }

                Swal.fire('Error', errorMessage, 'error');
            }
        });
    </script>
@endsection
