<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        .center {
            margin: auto;
            width: 50%;
            border: 2px solid grey;
            text-align: center;
            margin-top: 40px;
        }


        /*   .h2_class : For "All Products"  */


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

        .img_size {
            max-width: 150px;
            max-height: 150px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}
                </div>
                @endif

                <h2 class="h2_class">All Products</h2>

                <table class="center">
                    <tr>
                        <th>Product title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Product Image</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                    @foreach($product as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->stock}}</td>
                        <td>{{$product->category}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td>
                            <image class="img_size" src="{{$product->image_path}}">
                        </td>


                        </td>
                        <td><a class="btn btn-info" href="{{url('update_product',$product->id)}}">Edit</a>
                    </td>

                        <td><a  onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger" href="{{url('delete_product',$product->id)}}">Delete</a>
                    </td>




                    </tr>
                    @endforeach



                </table>

            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
