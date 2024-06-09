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
                        <h1 class="h1coy">Update Product</h1>
                        <form action="{{url('update_product_2',$data->id)}}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <label class="label"> Nama Produk</label>
                            <input type="text" name="title" id="" class="input_color" placeholder="Masukkan Nama"
                                required value="{{$data->title}}"><br><br>

                            <label class="label"> Deskripsi Produk</label>
                            <input type="text" name="description" id="" class="input_color"
                                placeholder="Masukkan Deskripsi" required value="{{$data->description}}"><br><br>

                            <label class="label"> Harga Produk</label>
                            <input type="number" name="prize" id="" class="input_color" placeholder="Masukkan Harga"
                                required value="{{$data->prize}}"><br><br>

                            <label class="label"> Harga Diskon </label>
                            <input type="number" name="discount_prize" id="" class="input_color"
                                placeholder="Masukkan Diskon" required value="{{$data->discount_prize}}"><br><br>

                            <label class="label"> Kuantitas Produk</label>
                            <input type="number" name="quantity" id="" min="0" class="input_color"
                                placeholder="Masukkan Jumlah" size="100px" required value="{{$data->quantity}}"><br><br>

                            <label class="label"> Kategori Produk</label>
                            <select name="category" id="" class="input_color" required>
                                <option value="{{$data->category}}" selected="">{{$data->category}}</option>
                                @foreach($category as $ctg)
                                <option value="{{$ctg->category_name}}">{{$ctg->category_name}}</option>
                                @endforeach
                            </select><br><br>


                            <label for=""> Foto Terkini</label>
                            <img style="margin: auto;" width="300" height="300" src="/product/{{$data->image}}"
                                alt="foto terkini">
                            <br><br>
                            <label class="label">Foto Produk </label>
                            <input type="file" src="" alt="" name="image"><br><br>

                            <input type="submit" class="btn btn-primary" value="AddProduct">
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