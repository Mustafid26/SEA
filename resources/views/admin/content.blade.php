<div class="content-wrapper">
    <div class="row">
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{$total_artikel}}</h3>
                                <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                            </div>
                        </div>
                        <div class="col-3">
                            <a href="{{url('/show_artikel')}}">
                                <div class="icon icon-box-success ">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </a>
                            
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Artikel</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{$total_kelas}}</h3>
                                <p class="text-success ml-2 mb-0 font-weight-medium"></p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success">
                                <span class="mdi mdi-arrow-top-right icon-item"><a href=""></a></span>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Kelas</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{$total_user}}</h3>
                                <p class="text-danger ml-2 mb-0 font-weight-medium"></p>
                            </div>
                        </div>
                        <div class="col-3">
                            <a href="{{url('/show_user')}}">
                                <div class="icon icon-box-success">
                                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total User</h6>
                </div>
            </div>
        </div>
    </div>
</div>