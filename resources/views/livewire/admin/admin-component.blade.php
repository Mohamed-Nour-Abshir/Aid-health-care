<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Welcome {{Auth::user()->name}}</h3>
            <h6 class="font-weight-normal mb-0">All systems are running smoothly! </h6>
        </div>
        </div>
    </div>
    </div>

    <div class="row">
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card tale-bg">
            <div class="card-people mt-auto">
                <img src="images/dashboard/people.svg" alt="people">
                <div class="weather-info">
                <div class="d-flex">
                    <div>
                    <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                    </div>
                    <div class="ml-2">
                    <h4 class="location font-weight-normal">Dhaka</h4>
                    <h6 class="font-weight-normal">Bangaldesh</h6>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-6 grid-margin transparent">
            {{-- <div class="row">
            <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card bg-success text-light">
                <div class="card-body">
                    <p class="mb-4">Today Visitors</p>
                    <p class="fs-30 mb-2">{{$todayVisitors}}</p>
                </div>
                </div>
            </div>
            <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card bg-warning text-light">
                <div class="card-body">
                    <p class="mb-4">Total Visitors</p>
                    <p class="fs-30 mb-2">{{$totalVisitors}}</p>
                </div>
                </div>
            </div>
            </div> --}}

            {{-- <div class="row">
            <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card card-tale ">
                <div class="card-body">
                    <p class="mb-4">Last month Visitors</p>
                    <p class="fs-30 mb-2">{{$lastMonthvisitors}}</p>
                </div>
                </div>
            </div>
            <div class="col-md-6 mb-4 stretch-card transparent">
                <div class="card bg-secondary text-light">
                <div class="card-body">
                    <p class="mb-4">Last year Visitors</p>
                    <p class="fs-30 mb-2">{{$lastYearvisitors}}</p>
                </div>
                </div>
            </div>
            </div> --}}

            <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card bg-dark text-light">
                    <div class="card-body">
                        <p class="mb-4">Total Revenue</p>
                        <p class="fs-30 mb-2">{{$totalRevenue}}
                    </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                    <div class="card card-dark-blue">
                    <div class="card-body">
                        <p class="mb-4">Total Sales</p>
                        <p class="fs-30 mb-2">{{$totalSales}}</p>
                    </div>
                    </div>
                </div>
                
                </div>
                <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                    <div class="card card-light-blue">
                    <div class="card-body">
                        <p class="mb-4">Today Revenue</p>
                        <p class="fs-30 mb-2">{{$todayRevenue}}</p>
                    </div>
                    </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                    <div class="card card-light-danger">
                    <div class="card-body">
                        <p class="mb-4">Today Sales</p>
                        <p class="fs-30 mb-2">{{$todaySales}}</p>
                    </div>
                    </div>
                </div>
                </div>
        </div>
    </div>


<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Latest Orders</h4>
            <p class="card-description">
                Here are all the latest orders
            </p>
            <div class="table-responsive pt-3">
                <table class="table table-bordered mb-3">
                <thead>
                    <tr>
                        <th>Order</th>
                        <th>Subtotal</th>
                        <th>Discount</th>
                        <th>Delivery charge</th>
                        <th>Total</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>ZipCode</th>
                        <th>Status</th>
                        <th>Order Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->subtotal}} <span class="text-danger">BDT</span></td>
                            <td>{{$order->discount}} <span class="text-danger">BDT</span></td>
                            <td>{{$order->tax}} <span class="text-danger">BDT</span></td>
                            <td>{{$order->total}} <span class="text-danger">BDT</span></td>
                            <td>{{$order->firstname}}</td>
                            <td>{{$order->lastname}}</td>
                            <td>{{$order->mobile}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->zipcode}}</td>
                            <td>{{$order->status}}</td>
                            <td>{{$order->created_at}}</td>
                            <td><a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}" class="btn btn-info btn-sm">Details</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$orders->links()}}
            </div>
            </div>
        </div>
        </div>
</div>
