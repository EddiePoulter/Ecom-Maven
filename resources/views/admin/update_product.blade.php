<!DOCTYPE html>
<html lang="en">

<head>

    <base href="../">
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;
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


                <div class="div_center">
                    <h1 class="font_size">Update Product</h1>


                    <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label>Product Title:</label>
                            <input type="text" name="name" placeholder="Write a title" required=""
                                value="{{$product->name}}">
                        </div>
                        <div class="div_design">
                            <label>Product Description:</label>
                            <input type="text" name="description" placeholder="Write a Description" required=""
                                value="{{$product->description}}">
                        </div>
                        <div class="div_design">
                            <label>Product Price:</label>
                            <input type="number" name="price" placeholder="Write a price" value="{{$product->price}}">
                        </div>

                        <div class="div_design">
                            <label>Discounted Price:</label>
                            <input type="Number" name="dis_price" placeholder="Write discounted price if applicable"
                                 value="{{$product->discount_price}}">
                        </div>

                        <div class="div_design">
                            <label>Product Quantitiy:</label>
                            <input type="number" min="0" name="quantity" placeholder="Write a quantity" required=""
                                value="{{$product->stock}}">
                        </div>

                        <div class="div_design">
                            <label>Product Category:</label>
                            <select name="category" >
                                <option value="{{$product->category}}" selected="">{{$product->category}}</option>
                                @foreach($category as $category)

                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>

                                @endforeach




                            </select>
                        </div>

                        <div class="div_design">
                            <label> Current Product Image:</label>
                            <img height="200px" src="{{$product->image_path}}">
                        </div>


                        <div class="div_design">
                            <label> Change Product Image:</label>
                            <input type="file" name="image" placeholder="Write a title">
                        </div>

                        <div class="div_design">

                            <input type="submit" value="Update Product" class="btn btn-primary">
                        </div>

                    </form>



                </div>

            </div>

        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>
