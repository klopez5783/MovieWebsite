<html>
    <head>
        <?php include 'Partials/AdminHeaderFiles.php';
        include_once '../Configuration/DBconnect.php';?>
        <style>

            .buttonSize{
                
            }

                
  </style>
    </head>
    <body>
    <div class="container-fluid">
    <div class="row flex-nowrap">

    <?php include 'Partials/SideBar.php' ?> 
        
        <div class="col">
            <?php
            if ( isset($_SESSION['AdminUpdated'])){
                echo $_SESSION['AdminUpdated'] ? //if this is true

                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Record Updated Succesfully
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>' : 
                    
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Record Updated Unsuccesful. Error : ' . $_SESSION['AdminUpdated'] . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';

                unset($_SESSION['AdminUpdated']);
            }

            ?>
            <h1>Users</h1>

            <div class="">

                <div class="col-12 col-sm-12 col-md-12">


                    <?php
                    include '../Objects/Customers/CustomersObj.php';
                    include '../Objects/Customers/CustomersFunctions.php';
                    $Customers = getCustomerObjArray();

                    if (!empty($Customers)) {
                        //echo '<div class="container">';
                        echo '<div class="table-responsive">';
                        echo '<table class="table">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th scope="col">Customer ID</th>';
                        echo '<th scope="col">Name</th>';
                        echo '<th scope="col" class="d-none d-lg-table-cell">Email</th>';
                        echo '<th scope="col">Phone Number</th>';
                        echo '<th scope="col">Role</th>';
                        echo '<th scope="col" colspan="2" class="text-center">
                        <div
                        class="btn btn-primary buttonSize" 
                        data-bs-toggle="modal" 
                        data-bs-target="#NewAdminModal">Add Admin User</div>
                        </th>';
                        echo '</tr>';
                        echo '</thead>';
                    
                        echo '<tbody>';
                        foreach ($Customers as $customer) {
                            echo '<tr>';
                            echo '<th scope="row">' . $customer->Customer_ID . '</th>';
                            echo '<td>' . $customer->Customer_Name . '</td>';
                            echo '<td class="d-none d-lg-table-cell">' . $customer->Email . '</td>';
                            echo '<td>' . $customer->phone_number . '</td>';
                            echo '<td>' . $customer->role . '</td>';
                            echo '<td class="text-center">';
                            echo '
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updateAdminModal" onclick="handleEditAdmin('. $customer->Customer_ID .')" >Edit</button> 
                            <button type="button" name="delete" value="Delete" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteRecordModal' . $customer->Customer_ID . '">Delete</button>';
                            echo '</td>';
                            echo '</tr>';
                            echo '<!-- Modal -->
                            <div class="modal fade" id="DeleteRecordModal' . $customer->Customer_ID . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <div class="text-center"><i class="fa-regular fa-circle-xmark fa-4x" style="color: #f05151;"></i></div>
                                            <h4 class="text-center mt-3">Are you sure you want to delete this record? This cannot be undone.</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-danger" onClick="deleteRecord(' . $customer->Customer_ID . ', &quot;users&quot;, &quot;Customer_ID&quot;)">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        }
                        echo '</tbody>';
                    
                        echo '</table>';
                        echo '</div>';
                    }
                    

                    ?>

                    <div class="modal fade" id="NewAdminModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <div class="modal-title w-100">
                                        <div class="fw-bold fs-4 ms-2">
                                            <i class="fas fa-solid fa-user-tie ms-2"></i><i class="fa-solid fa-plus"></i> New Admin
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <form id="signupForm" action="../Processes/AdminProcesses/AddNewAdmin.php" method="POST">
                                        <div class="m-4">
                                            <i class="fa-solid fa-envelope fa-xl"></i>
                                            <input type="email" id="SignupEmail" class="AddAdminForm" name="SignupEmail" placeholder="Email" required>
                                        </div>
                                        <div class="m-4">
                                            <i class="fa-solid fa-lock fa-xl"></i>
                                            <input type="password" id="SignupPassword" class="AddAdminForm" name="SignupPassword" placeholder="Password" required>
                                        </div>
                                        <div class="m-4">
                                            <i class="fa-solid fa-lock fa-xl"></i>
                                            <input type="password" id="ConfirmSignupPassword" class="AddAdminForm" name="ConfirmSignupPassword" placeholder="Confirm Password" required>
                                        </div>
                                        <div class="m-4">
                                            <i class="fa-solid fa-phone fa-xl"></i>
                                            <input type="tel" id="SignupPhoneNumber" class="AddAdminForm" name="SignupPhoneNumber" placeholder="Phone Number" required>
                                        </div>
                                        <div class="m-4">
                                        <i class="fa-solid fa-user-tie fa-xl"></i>
                                            <input type="text" id="SignupCustomerName" class="AddAdminForm" name="SignupCustomerName" placeholder="Admin Name" required>
                                        </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success">Submit Sign Up</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="updateAdminModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <div class="modal-title w-100">
                                        <div class="fw-bold fs-4 ms-2">
                                            <i class="fa-regular fa-pen-to-square"></i> Edit  Admin
                                        </div>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <form id="EditAdminForm" action="../Processes/AdminProcesses/UpdateAdmin.php" method="POST">
                                        <div class="m-4">
                                        <input type="hidden" id="AdminId" name="AdminID" value="1">
                                        <i class="fa-solid fa-user-tie fa-xl"></i>
                                            <input type="text" id="UpdateAdminName" class="AddAdminForm" name="UpdateAdminName" placeholder="Admin Name" required>
                                        </div>
                                        <div class="m-4">
                                            <i class="fa-solid fa-envelope fa-xl"></i>
                                            <input type="email" id="UpdateAdminEmail" class="AddAdminForm" name="UpdateEmail" placeholder="Email" required>
                                        </div>
                                        <div class="m-4">
                                            <i class="fa-solid fa-phone fa-xl"></i>
                                            <input type="tel" id="UpdateAdminPhoneNumber" class="AddAdminForm" name="UpdatePhoneNumber" placeholder="Phone Number" required>
                                        </div>
                                        <div class="m-4">
                                            <select class="form-select w-50 mx-auto" aria-label="Select Role" name="role" id="RoleSelect" required>
                                            <option value="" disabled selected>Select Role</option>
                                            <option value="user">user</option>
                                                <option value="admin">admin</option>
                                            </select>
                                        </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success">Update User</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            
        </div>
    </div>
</div>
    </body>
    <script>
        function deleteRecord(uniqueId, tableName, columnName) {
    // Send data via AJAX to the PHP script
    $.ajax({
        type: "POST",
        url: "../Processes/deleteRecord.php", // PHP script to set session
        data: {
            unique_id: uniqueId,
            table_name: tableName,
            column_name: columnName
        },
        success: function(response) {
            console.log(response);
            if(response == "Record deleted successfully."){
                $('#DeleteRecordModal'+uniqueId).modal('hide');
                $('#deleteSuccessModal').modal('show'); // Show the success modal
            }
        },
        error: function(xhr, status, error) {
            // Handle error if needed
            console.error("Error:", error);
            $('#errorModal .modal-body').text(response.trim()); // Set the error message in the modal
            $('#errorModal').modal('show'); // Show the error modal
        }
    });
    
    }

    function getAdmin(UserID){
        var output = null;
        return new Promise((resolve, reject) => {
            $.ajax({
                url: '../Processes/AdminProcesses/getAdmin.php',
                type: 'POST',
                data: { userID: UserID },
                dataType: 'json',
                success: function(data) {
                    resolve(data)
                },
                error: function(xhr, status, error) {
                    if (xhr.status === 404) {
                        console.error('Error: File not found (404)');
                    } else {
                        reject(error); // Reject the Promise with the error
                    }
                }
            }); 
        });
    }


   async function handleEditAdmin(id){
        try{
            var admin = await getAdmin(id);
            var adminNameInput = document.getElementById("UpdateAdminName");
            var adminEmailInput = document.getElementById("UpdateAdminEmail");
            var AdminPhoneNumberInput = document.getElementById("UpdateAdminPhoneNumber");
            var RoleSelect = document.getElementById("RoleSelect");
            var AdminID =document.getElementById("AdminId");

            AdminID.value = admin.Customer_ID;
            adminNameInput.value = admin.Customer_Name;
            adminEmailInput.value = admin.Email;
            AdminPhoneNumberInput.value = admin.phone_number;
            RoleSelect.value = admin.role;
        }
        catch (error){
            console.error(error);
        }

        console.log(admin);

    }

    </script>
</html>