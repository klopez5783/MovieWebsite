<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Web Page</title>
    <!-- Add your CSS files here -->
    <!-- Add any meta tags, external stylesheets, or scripts here -->


    <?php include '../Webpages/HeaderFiles/HeaderTags.php';
    
    $showAlert = 1;

    if (isset($_SESSION['token']) && !$_SESSION['token'] ){
        $showAlert = $_SESSION['token'];
        unset($_SESSION['token']); // Unset the token session variable
    }
    ?>
 

    </style>

  <!-- <link rel="stylesheet" type="text/css" href="HeaderFiles/PageStyles.css"> -->

  

</head>

<body>


<div class="container-fluid">
    <div class="row flex-nowrap">

    <?php include 'Partials/SideBar.php' ?> 
        
        <div class="col py-3">
            <h3>Left Sidebar with Submenus</h3>
            <h1>HomePage</h1>
            
        </div>
    </div>
</div>
    

</body>

</html>