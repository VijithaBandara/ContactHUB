<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <!-- Add contact -->
    <div class="modal fade" id="contactAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Contact</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="saveContact">
        <div class="modal-body">
        <div class="alert alert-warning d-none" id="errorMessage"></div>
        
            <div class="mb-3">
                <label for="">First Name</label>
                <input type="text" name="firstName" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="">Last Name</label>
                <input type="text" name="lastName" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="">Phone Number</label>
                <input type="text" name="phone" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="">Message</label>
                <input type="text" name="message" class="form-control" />
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save Contact</button>
        </div>
        </form>

        </div>
    </div>
    </div>

    <!-- Edit contact -->
    <div class="modal fade" id="contactEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Contact</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form id="updateContact">
        <div class="modal-body">
        <div class="alert alert-warning d-none" id="errorMessageUpdate"></div>
            <input type='hidden' name='contact_id' id='contact_id'>
            <div class="mb-3">
                <label for="">First Name</label>
                <input type="text" name="firstName" id="firstName" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="">Last Name</label>
                <input type="text" name="lastName" id="lastName" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="">Email</label>
                <input type="text" name="email" id="email" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="">Phone Number</label>
                <input type="text" name="phone" id="phone" class="form-control" />
            </div>
            <div class="mb-3">
                <label for="">Message</label>
                <input type="text" name="message" id="message" class="form-control" />
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update Contact</button>
        </div>
        </form>

        </div>
    </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Contact HUB
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#contactAddModal">
                            Add Contact
                        </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    require 'dbcon.php';
                                    $query = "SELECT * FROM contacts";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $contactinfo)
                                        {
                                            ?>
                                            <tr>
                                                <td><?php echo $contactinfo['id']; ?></td>
                                                <td><?php echo $contactinfo['firstName']; ?></td>
                                                <td><?php echo $contactinfo['lastName']; ?></td>
                                                <td><?php echo $contactinfo['email']; ?></td>
                                                <td><?php echo $contactinfo['phone']; ?></td>
                                                <td><?php echo $contactinfo['message']; ?></td>
                                                <td>
                                                    <button type="button" value="<?=$contactinfo['id'];?>" class="editContactBtn btn btn-success">Edit</button>
                                                    <button type="button" value="<?=$contactinfo['id'];?>" class="deleteContactBtn btn btn-success">Delete</button>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).on('submit', '#saveContact', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_contact",true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,

                success: function (response){

                    var res = jQuery.parseJSON(response);
                    if(res.status == 422){
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);
                    }else if(res.status == 200){
                        $('#errorMessage').addClass('d-none');
                        $('#contactAddModal').modal('hide');
                        $('#saveContact')[0].reset();

                        $('#myTable').load(location.href + "#myTable");
                    }
                }
            })

        });

        $(document).on('click', '.editContactBtn', function() {
            var contact_id = $(this).val();
            //alert(contact_id);
            $.ajax({
                type:"GET",
                url: "code.php?contact_id=" + contact_id,
                success: function (response){
                    var res = jQuery.parseJSON(response);
                    if(res.status == 422){
                        alert(res.message);
                    }else if(res.status == 200){
                        $('#contact_id').val(res.data.id);
                        $('#firstName').val(res.data.firstName);
                        $('#lastName').val(res.data.lastName);
                        $('#email').val(res.data.email);
                        $('#phone').val(res.data.phone);
                        $('#message').val(res.data.message);

                        $('#contactEditModal').modal("show");
                    }
                }
            })

        });

        $(document).on('submit', '#updateContact', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_contact",true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,

                success: function (response){

                    var res = jQuery.parseJSON(response);
                    if(res.status == 422){
                        $('#errorMessageUpdate').removeClass('d-none');
                        $('#errorMessageUpdate').text(res.message);
                    }else if(res.status == 200){
                        $('#errorMessageUpdate').addClass('d-none');
                        $('#contactEditModal').modal('hide');
                        $('#updateContact')[0].reset();

                        $('#myTable').load(location.href + "#myTable");
                    }
                }
            })

        });
    </script>
  
</body>
</html>;