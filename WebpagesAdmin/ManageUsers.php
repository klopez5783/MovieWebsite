<html>
    <head>
        <?php include '../Webpages/HeaderFiles/HeaderTags.php';
        include_once '../Configuration/DBconnect.php';?>
        <style>
  th.col{
  border-style: dotted;
  }
  .col-2{
  border-style: dashed;
  }
  </style>
    </head>
    <body>
    <div class="container-fluid">
    <div class="row flex-nowrap">

    <?php include 'Partials/SideBar.php' ?> 
        
        <div class="col">
            <h3>Left Sidebar with Submenus</h3>
            <h1>Users</h1>

            <div class="">

                <div class="col-12 col-sm-10 col-md-12">


                    <?php



                    //if(isset($_POST['Customers'])){
                    include '../Objects/Customers/CustomersObj.php';
                    include '../Objects/Customers/CustomersFunctions.php';
                    $Customers = getCustomerObjArray();

                    // if (!empty($Customers)) {
                    // //echo '<a href="addCustomer.php" class="btn btn-primary float-end me-3" data-bs-toggle="modal" data-bs-target="#AddCustomerModal" >Add Customer</a>';
                    // echo '<table class="table">';
                    // echo '<thead>';
                    // echo '<tr>';
                    // echo '<th scope="col">Customer ID</th>';
                    // echo '<th scope="col">Name</th>';
                    // echo '<th scope="col" class="d-none d-lg-block">Email</th>';
                    // echo '<th scope="col">Phone Number</th>';
                    // echo '<th scope="col">Role</th>';
                    // echo '<th scope="col" colspan="2" class="text-center"><a href="addCustomer.php" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddCustomerModal" >Add Customer</a></th>';
                    // echo '</tr>';
                    // echo '</thead>';

                    // echo '<tbody>';
                    // foreach ($Customers as $customer) {
                    // echo '<tr>';
                    // echo '<th scope="row">' . $customer->Customer_ID . '</th>';
                    // echo '<td>' . $customer->Customer_Name . '</td>';
                    // echo '<td class="d-none d-lg-block">' . $customer->Email . '</td>';
                    // echo '<td>' . $customer->phone_number . '</td>';
                    // echo '<td>' . $customer->role . '</td>';
                    // // echo '<td></td>';
                    // echo '<td class="text-center">';
                    // echo '<a class="btn btn-success" href="edit_customer.php?id=' . $customer->Customer_ID . '">Edit</a> <button type="button" name="delete" value="Delete" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteRecordModal' . $customer->Customer_ID . '"  >Delete</delete>';
                    // echo '</td>';
                    // echo '</tr>';
                    // echo '<!-- Modal -->
                    // <div class="modal fade" id="DeleteRecordModal' . $customer->Customer_ID . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    //     <div class="modal-dialog">
                    //         <div class="modal-content">
                    //             <div class="modal-body">
                    //                 <div class="text-center"><i class="fa-regular fa-circle-xmark fa-4x" style="color: #f05151;"></i></div>
                    //                 <h4 class="text-center mt-3" >Are you sure you want to delete this record? This cannot be undone.</h4>
                    //             </div>
                    //             <div class="modal-footer">
                    //                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    //                 <button type="button" class="btn btn-danger" onClick="deleteRecord(' . $customer->Customer_ID . ', &quot;Customers&quot;, &quot;Customer_ID&quot;)">Delete</button>
                    //             </div>
                    //         </div>
                    //     </div>
                    // </div>
                    // ';
                    // }
                    // echo '</tbody>';

                    // echo '</table>';
                    // }

                    // }

                    if (!empty($Customers)) {
                        echo '<div class="container">';
                        echo '<div class="table-responsive">';
                        echo '<table class="table">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th scope="col">Customer ID</th>';
                        echo '<th scope="col">Name</th>';
                        echo '<th scope="col" class="d-none d-lg-table-cell">Email</th>';
                        echo '<th scope="col">Phone Number</th>';
                        echo '<th scope="col">Role</th>';
                        echo '<th scope="col" colspan="2" class="text-center"><a href="addCustomer.php" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#AddCustomerModal">Add Customer</a></th>';
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
                            echo '<a class="btn btn-success" href="edit_customer.php?id=' . $customer->Customer_ID . '">Edit</a> <button type="button" name="delete" value="Delete" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#DeleteRecordModal' . $customer->Customer_ID . '">Delete</button>';
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
                                            <button type="button" class="btn btn-danger" onClick="deleteRecord(' . $customer->Customer_ID . ', &quot;Customers&quot;, &quot;Customer_ID&quot;)">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        }
                        echo '</tbody>';
                    
                        echo '</table>';
                        echo '</div>';
                        echo '</div>';
                    }
                    

                    ?>

                </div>

            </div>

            
        </div>
    </div>
</div>
    </body>
    <footer>

    </footer>
</html>