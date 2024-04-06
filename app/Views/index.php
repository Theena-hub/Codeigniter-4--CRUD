<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid bg-dark">
        <div class="container">
            <div class="card p-3">
                <button type="button" id="addBtn" class="btn btn-primary text-white" data-bs-toggle="modal"
                    data-bs-target="#Modal">
                    Add
                </button>
            </div>
            <div id="getResult"></div>
        </div>
    </div>
    <!-- Modal start -->
    <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel"></h5>
                    <button type="button" class="btn-close close-btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form action="" id="form">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                    <div id="name_msg" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                    <div id="email_msg" class="invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone">
                                    <div id="phone_msg" class="invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal end -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            // Function to fetch data
            function getData() {
                $.ajax({
                    url: "http://localhost:8080/getData",
                    method: "POST",
                    dataType: "json",
                    success: function (response) {
                        $('#getResult').html(response);
                    },
                });
            }          
            // fetch end 
            // close button -start 
            $('.close-btn').click(function () {
                $('#form')[0].reset();            
            });
            // close button - end
            // data adding or updating - start
            $('#form').on('submit', function (e) {
                e.preventDefault();
                let formData = $(this).serialize();
                let action = $('#submit').text();
                $.ajax({
                    url: action === 'Add' ? "http://localhost:8080/create" : "http://localhost:8080/updateData",
                    method: "POST",
                    data: formData + (action === 'Update' ? '&id=' + $('#submit').data('id') : ''),
                    dataType: "json",
                    success: function (response) {
                        $('#Modal').modal('hide'); 
                        if (response.status === 'Success') {                            
                            Swal.fire({
                                icon: 'success',
                                title: action === 'Add' ? 'Added!' : 'Updated!',
                                text: response.data,
                            });
                            $('#form')[0].reset();
                            getData();
                        } else {                            
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: response.data,
                            });
                        }
                    },
                    error: function (error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: action === 'Add' ? 'An error occurred while adding data.' : 'An error occurred while updating data.',
                        });
                    }
                });
            });
            // data adding or Updating - end
            // Handle adding button click
            $('#addBtn').click(function () {
                $('#modalLabel').text('Add Data');
                $('#submit').text('Add');
            });
            // get data by id - end
            $('#getResult').on('click', '.edit-btn', function () {
                $('#modalLabel').text('Edit Data');
                $('#submit').text('Update');
                var id = $(this).data('id');
                $.ajax({
                    url: "http://localhost:8080/getDataById",
                    method: "POST",
                    data: { id: id },
                    dataType: "json",
                    success: function (response) {
                        $('#name').val(response.name);
                        $('#email').val(response.email);
                        $('#phone').val(response.phone);
                        $('#submit').data('id', id);
                    },
                });
            });
            // get data by id - end
            // delete start
            $('#getResult').on('click', '.delete-btn', function () {
                var id = $(this).data('id');
                $.ajax({
                    url: "http://localhost:8080/deleteData",
                    method: "POST",
                    dataType: "json",
                    data: { id: id },
                    success: function (response) {
                        getData();
                    },
                });
            });
            // delete end     
            getData();       
        });
    </script>
</body>
</html>