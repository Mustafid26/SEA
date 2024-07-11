<!DOCTYPE html>
<html lang="en">
<title>Admin SEA</title>
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}">
<head>
    @include('admin.css')
    <style>
    .div_center {
        text-align: center;
        padding-top: 50px;
    }

    .h1coy {
        font-size: 30px;
        text-align: center;
    }

    .input_color {
        color: black;
    }

    .center {
        margin: auto;
        width: 50%;
        text-align: center;
        margin-top: 50px;
        border: 4px solid gray;
        background-color: white;
    }

    tr,
    td,
    th {
        color: black;
        border: 2px solid black;

    }

    th {
        background-color: gray;
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
                    <h1 class="h1coy">List Produk</h1>
                    <table class="center table-responsive-sm table-responsive-md">
                        <tr>
                            <th>Nama Produk</th>
                            <th>Deskripsi</th>
                            <th>Kuantitas</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Harga Diskon</th>
                            <th>Gambar</th>
                            <th>Action</th>
                        </tr>
                        @foreach($data as $item)
                        <tr>
                            <td>{{$item->title}}</td>
                            <td>{{$item->description}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->category}}</td>
                            <td>{{$item->prize}}</td>
                            <td>{{$item->discount_prize}}</td>
                            <td>
                                <img style="width: 300px; height: 150px;" src="/product/{{$item->image}}"
                                    alt="gambar produk">
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{url('update_product',$item->id)}}">
                                    Edit
                                </a>
                                <br><br>
                                <a onclick="return confirm('Apakah Kamu Yakin Mau Hapus Ini?')" class="btn btn-danger"
                                    href="{{url('delete_product',$item->id)}}">
                                    Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
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