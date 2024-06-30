<!DOCTYPE html>
<html lang="en">
<title>Admin SEA</title>

<head>
    @include('admin.css')

    <style>
        .content-wrapper {
            overflow-x: auto !important;
            background-color: rgb(0,0,0);
        }
        .div_center {
            text-align: center;
            padding-top: 50px;
        }
    
        .h1coy {
            font-size: 30px;
            text-align: center;
        }
    
        
        tr{
            color:black;
        }
        trix-toolbar [data-trix-button-group="file-tools"] 
        {
        display: none;
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

                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{session()->get('message')}}
                    </div>
                    @endif
                        <h1 class="h1coy">Add User</h1>
                        <form action="{{url('add_user')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="name" nameclass="form-label">Nama User</label>
                                <input style="background-color: white !important; color: black!important;" type="text" class="form-control" id="name" name="name" placeholder="Masukan Judul" required value="">
                            </div>
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="number" style="background-color: white !important; color: black!important;" class="form-control" id="nik" name="nik" placeholder="Masukkan Nik" required value="">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="text" style="background-color: white !important; color: black!important;" class="form-control" id="password" name="password" placeholder="Masukkan Password" required value="">
                            </div>


                            <div class="mb-3">
                                <label for="role" class="form-label">Role User</label><br>
                                <select name="role" id="" class="input_color" style="width: 200px;" required>
                                    <option value="" selected="">Tambahkan Role</option>
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                            </div>
                            
                            <input type="submit" class="btn btn-primary" value="Add User">
                        </form>
                    
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