<!DOCTYPE html>
<html lang="en">
<title>Admin Serat</title>


<head>
    @include('admin.css')
    <style>
        .myButton {
            box-shadow: inset 0px 1px 0px 0px #f5978e;
            background: linear-gradient(to bottom, #f24537 5%, #c62d1f 100%);
            background-color: #f24537;
            border-radius: 6px;
            border: 1px solid #d02718;
            display: inline-block;
            cursor: pointer;
            color: #ffffff;
            font-family: Arial;
            font-size: 15px;
            font-weight: bold;
            padding: 6px 24px;
            text-decoration: none;
            text-shadow: 0px 1px 0px #810e05;
        }

        .myButton:hover {
            background: linear-gradient(to bottom, #c62d1f 5%, #f24537 100%);
            background-color: #c62d1f;
            text-decoration: none;
        }

        .myButton:active {
            position: relative;
            top: 1px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.header')
            <!-- partial -->
            <div class="main-panel">
                @include('admin.content')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('admin.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.js')
</body>

</html>
