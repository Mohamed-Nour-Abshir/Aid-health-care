<div>
    <div class="container" style="padding: 30px 0;">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="pull-left card-title">All Orders</p>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        @if (Session::has('order_message'))
                            <div class="alert alert-success" role="alert">{{Session::get('order_message')}}</div>
                        @endif
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Subtotal</th>
                                    <th>Discount</th>
                                    <th>Delivery charge</th>
                                    <th>Total</th>
                                    {{-- <th>First Name</th> --}}
                                    <th>Full Name</th>
                                    <th>Mobile</th>
                                    {{-- <th>Email</th> --}}
                                    <th>ZipCode</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                    <th colspan="2" class="text-center">Action</th>
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
                                        {{-- <td>{{$order->firstname}}</td> --}}
                                        <td>{{$order->lastname}}</td>
                                        <td>{{$order->mobile}}</td>
                                        {{-- <td>{{$order->email}}</td> --}}
                                        <td>{{$order->zipcode}}</td>
                                        <td>{{$order->status}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td><a href="{{route('admin.orderdetails',['order_id'=>$order->id])}}" class="btn btn-info btn-sm">Details</a></td>
                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-success btn-sm dropdown-toggle" type="submit" data-toggle="dropdown">Status
                                                    <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li class="dropdown-item"><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'delivered')">Delivered</a></li>
                                                    <li class="dropdown-item"><a href="#" wire:click.prevent="updateOrderStatus({{$order->id}},'canceled')">Canceled</a></li>
                                                </ul>
                                            </div>
                                        </td>
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
</div>
