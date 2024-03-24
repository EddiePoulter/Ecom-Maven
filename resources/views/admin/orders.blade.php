<!DOCTYPE html>
<html lang="en">
    <head>
        @include('admin.css')
        <style>
            .center {
                margin: auto;
                width: 50%;
                border: 2px solid grey;
                text-align: center;
                margin-top: 40px;
            }

            .h2_class {
                text-align: center;
                font-size: 40px;
                padding-top: 20px;
            }

            th {
                white-space: nowrap;
                padding: 15px;
                background-color: #191c24;
            }


            th,
            td {
                border: 2px solid grey;
            }
        </style>
    </head>
    <body>
    <div class="container-scroller">
        @include('admin.sidebar')
        @include('admin.header')


        <div class="main-panel">
            <div class="content-wrapper">
                <h2 class="h2_class">Orders</h2>
                @if(\Session::has('msgs'))
                    @foreach(\Session::get('msgs') as $msg)
                        <script>alert('{{$msg}}')</script>
                    @endforeach
                @endif
                <table class="center">
                    <tr>
                        <th>User ID</th>
                        <th>Order Number</th>
                        <th>Total</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->created_by}}</td>
                            <td>{{$order->id}}</td>
                            <td>{{$order->total_price}}</td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->status}}</td>
                            @if($order->status == "Pending")
                                <td><a onclick="return confirm('Reject order?')" href="{{ url('reject_order', str($order->id)) }}" class="btn btn-danger">Reject</a></td>
                                <td><a onclick="return confirm('Accept order?')" href="{{ url('accept_order', $order->id) }}" class="btn btn-success">Accept</a></td>
                            @endif
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    @include('admin.script')
    </body>
</html>
