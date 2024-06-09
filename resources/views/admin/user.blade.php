<!DOCTYPE html>
<html lang="en">
<title>Admin FDA</title>

<head>
    @include('admin.css')

    <style>
    .div_center {
        text-align: center;
        padding-top: 50px;
    }

    .h1coy {
        font-size: 30px;
        margin-bottom: 30px;
    }


    .input_color {
        color: black;
    }

    label {
        display: inline-block;
        width: 200px;
        margin-right: 20px;
    }
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('sweetalert::alert')
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.header')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @if(session()-> has('message'))

                    <div class=" alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>
                    @endif
                    <div class="div_center">
                        <h1 class="h1coy">Add User</h1>
                        <form action="{{url('add_user')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label>Nama User</label>
                            <input type="text" name="nama" id="" class="input_color" placeholder="Masukkan Nama"
                                required><br><br>

                            <label>NIK</label>
                            <input type="number" name="nik" id="" class="input_color" placeholder="Masukkan NIK"
                                required><br><br>

                            <label>Password</label>
                            <input type="text" name="password" id="" class="input_color" placeholder="Masukkan Password"
                                required><br><br>

                            <label>Role User</label>
                            <select name="role" id="" class="input_color" style="width: 200px;" required>
                                <option value="" selected="">Tambahkan Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select><br><br>
                            <input type="submit" class="btn btn-primary" value="Add User">
                        </form>
                    </div>
                </div>
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