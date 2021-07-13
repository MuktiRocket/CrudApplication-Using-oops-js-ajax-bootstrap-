<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CRUD APPLICATION USING OOPS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- add new user modal starts -->
    <div class="modal fade" tabindex="-1" id="addNewUserModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New User</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="add-user-form" class="p-2" novalidate>
                        <div class="row mb-3 gx-3">
                            <div class="col">
                                <input type="text" name="fname" class="form-control form-control-lg" placeholder="Enter First Name" required>
                                <div class="invalid-feedback">First name is required!</div>
                            </div>

                            <div class="col">
                                <input type="text" name="lname" class="form-control form-control-lg" placeholder="Enter Last Name" required>
                                <div class="invalid-feedback">Last name is required!</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="Enter E-mail" required>
                            <div class="invalid-feedback">E-mail is required!</div>
                        </div>

                        <div class="mb-3">
                            <input type="tel" name="phone" class="form-control form-control-lg" placeholder="Enter Phone" required>
                            <div class="invalid-feedback">Phone is required!</div>
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Add User" class="btn btn-primary btn-block btn-lg" id="add-user-btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- add new user modal ends -->

    <!-- Edit user modal starts -->
    <div class="modal fade" tabindex="-1" id="editUserModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit New User</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="edit-user-form" class="p-2" novalidate>
                        <input type="hidden" name="id" id="id" value=''>
                        <div class="row mb-3 gx-3">
                            <div class="col">
                                <input type="text" name="fname" id="fname" class="form-control form-control-lg" placeholder="Enter First Name" required>
                                <div class="invalid-feedback">First name is required!</div>
                            </div>

                            <div class="col">
                                <input type="text" name="lname" id="lname" class="form-control form-control-lg" placeholder="Enter Last Name" required>
                                <div class="invalid-feedback">Last name is required!</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Enter E-mail" required>
                            <div class="invalid-feedback">E-mail is required!</div>
                        </div>

                        <div class="mb-3">
                            <input type="tel" name="phone" id="phone" class="form-control form-control-lg" placeholder="Enter Phone" required>
                            <div class="invalid-feedback">Phone is required!</div>
                        </div>

                        <div class="mb-3">
                            <input type="submit" value="Update User" class="btn btn-success btn-block btn-lg" id="edit-user-btn">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Edit user modal ends -->
    <div class="container">
        <div class="row mt-4">
            <div class="col-lg-12 d-flex justify-content-between align-items-center">
                <div>
                    <h4 class="text-secondary">All Users In The Database</h4>
                </div>
                <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewUserModal">
                        Add New User
                    </button>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-12">
                <div id="showAlert"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered text-centered">
                        <thead>
                            <tr>
                                <th>
                                    ID
                                </th>
                                <th>
                                    First_Name
                                </th>
                                <th>
                                    Last_name
                                </th>
                                <th>
                                    E-mail
                                </th>
                                <th>
                                    Phone
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>


                </div>

            </div>

        </div>
    </div>
</body>
<script src="main.js"></script>

</html>