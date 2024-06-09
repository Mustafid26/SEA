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

    .label {
        margin-right: 20px;
    }

    .input_color {
        color: black;
    }

    label {
        display: inline-block;
        width: 200px;
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
                    <div class="div_center">
                        <h1 class="h1coy">Update User</h1>
                        <form action="{{url('update_user_2',$data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label class="label">Nama User</label>
                            <input type="text" name="nama" id="" class=" input_color" placeholder="" required
                                value="{{$data->name}}"><br><br>

                            <label class="label">NIK</label>
                            <input type="text" name="nik" id="" class="input_color" placeholder="" required
                                value="{{$data->nik}}"><br><br>


                            <label class="label">Role</label>
                            <select name="role" id="" class="input_color" style="width: 200px;" required>
                                <option value="" selected="">Tambahkan Role</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select><br><br>

                            <input type="submit" class="btn btn-primary" value="Add Update">
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