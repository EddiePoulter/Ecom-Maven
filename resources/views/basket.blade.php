<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Cusotm CSS -->
    <link rel="stylesheet" href="checkout.css">
    <?php include "css.blade.php"; ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->


    <title>Checkout</title>
</head>

<body>
    <?php include("nav.blade.php"); ?>

    <section id="main" class="container">
        <h1>Checkout</h1>

        <main class="row">
            <div class="col-1"></div>
            <!-- form -->
            <div id="chekout-form" class="col-md-6">
                <form action="" method="POST">
                    <h3>Delivery</h3>
                    <div class="mini-heading">
                        <p>Add Address</p>
                    </div>
                    <!-- first name -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="fname" name="fname" placeholder="John" required>
                        <label for="fname">First Name *</label>
                    </div>
                    <!-- last name -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="lanem" name="lname" placeholder="Doe" required>
                        <label for="lanem">Last Name *</label>
                    </div>
                    <!-- phone -->
                    <div class="form-floating mb-3">
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="012 345 6789"
                            min="10" max="10" required>
                        <label for="phone">Phone *</label>
                    </div>
                    <!-- email -->
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"
                            required>
                        <label for="email">Email Address *</label>
                    </div>

                    <!-- address line 1 -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="address1" name="address1"
                            placeholder="Am Funkturm 47" required>
                        <label for="address1">Address Line 1 *</label>
                    </div>

                    <!-- address line 2 -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="address2" name="address2" placeholder="">
                        <label for="address2">Address Line 2</label>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city">
                        </div>
                        <div class="col-md-4">
                            <label for="inputState" class="form-label">State</label>
                            <input type="text" class="form-control" id="state" name="state">
                        </div>
                        <div class="col-md-2">
                            <label for="zip" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="zip" name="zip">
                        </div>
                    </div>

                    <br>
                    <br>
                    <br>
                    <h3>Payment</h3>

                    <div class="mini-heading">
                        <p> Enter your payment details </p>
                    </div>
                    <!-- Name on Card -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nameOnCard" name="nameOnCard" placeholder="John Doe"
                            required>
                        <label for="nameOnCard">Name on Card *</label>
                    </div>
                    <!-- Card Number -->
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder=""
                            required>
                        <label for="cardNumber">Card Number *</label>
                    </div>
                    <!-- Month -->
                    <div class="row g-3 justify-content-between">
                        <div class="form-floating col-4">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option selected disabled>MM *</option>
                                <option value="1">01</option>
                                <option value="2">02</option>
                                <option value="3">03</option>
                                <option value="4">04</option>
                                <option value="5">05</option>
                                <option value="6">06</option>
                                <option value="7">07</option>
                                <option value="8">08</option>
                                <option value="9">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                            <label for="floatingSelect">Month</label>
                        </div>

                        <div class="form-floating col-4">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                <option selected disabled>YY *</option>
                                <option value="1990">1990</option>
                                <option value="1991">1991</option>
                                <option value="1992">1992</option>
                                <option value="1993">1993</option>
                                <option value="1994">1994</option>
                                <option value="1995">1995</option>
                                <option value="1996">1996</option>
                                <option value="1997">1997</option>
                                <option value="1998">1998</option>
                                <option value="1999">1999</option>
                                <option value="2000">2000</option>
                                <option value="2001">2001</option>
                                <option value="2002">2002</option>
                                <option value="2003">2003</option>
                                <option value="2004">2004</option>
                                <option value="2005">2005</option>
                                <option value="2006">2006</option>
                                <option value="2007">2007</option>
                                <option value="2008">2008</option>
                                <option value="2009">2009</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>

                            </select>
                            <label for="floatingSelect">Year *</label>
                        </div>

                        <div class="form-floating col-3">
                            <input type="text" class="form-control" id="CVV" name="CVV" placeholder="CVV" min="3"
                                max="3" pattern="[0-9]" required>
                            <label for="CVV">CVV *</label>
                        </div>

                        <div class="col-12 mt-4">
                            <button type="submit" class="btn btn-primary">Submit Order</button>
                        </div>
                    </div>


                </form>


            </div>

            <!-- summary -->
            <div id="chekout-summary" class="col-md-4">
                <h3>Summary</h3>

                <div class="sub-total-sec">
                    <div class="row">
                        <div class="col-6">
                            <p> Subtotal (2 Items)</p>
                        </div>
                        <div class="col-6">
                            <p>SAR 1,550.00</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <p> Standard delivery</p>
                        </div>
                        <div class="col-6">
                            <p>FREE</p>
                        </div>
                    </div>
                </div>

                <div class="total-sec">
                    <div class="row">
                        <div class="col-6">
                            <p> Total <br> <span class="small"> Including SAR 202.18 in taxes </span></p>
                        </div>
                        <div class="col-6">
                            <p>SAR 1,550.00</p>
                        </div>
                    </div>
                </div>

                <div class="items-preview-sec">
                    <!-- item -->
                    <div class="row">
                        <div class="col-6 item-img">
                            <img src="https://www.nike.sa/dw/image/v2/BDVB_PRD/on/demandware.static/-/Sites-akeneo-master-catalog/default/dw21c2dffe/nk/32b/0/f/1/7/a/32b0f17a_38ba_40fa_9de7_31c5bb1661e3.png?sw=520&sh=520&sm=fit"
                                alt="">
                        </div>
                        <div class="col-6 item-info">
                            <p><a href="#"> Air Jordan 1 Low Men's Shoes</a></p>
                            <div class="d-flex flex-column gap-2
                            ">
                                <span>QTY - <span> 1 </span></span>
                                <span>Size - <span> EU 44.5 </span></span>
                                <span>SAR 775.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- item -->
                    <div class="row">
                        <div class="col-6 item-img">
                            <img src="https://www.nike.sa/dw/image/v2/BDVB_PRD/on/demandware.static/-/Sites-akeneo-master-catalog/default/dw21c2dffe/nk/32b/0/f/1/7/a/32b0f17a_38ba_40fa_9de7_31c5bb1661e3.png?sw=520&sh=520&sm=fit"
                                alt="">
                        </div>
                        <div class="col-6 item-info">
                            <p><a href="#"> Air Jordan 1 Low Men's Shoes</a></p>
                            <div class="d-flex flex-column gap-2
                            ">
                                <span>QTY - <span> 1 </span></span>
                                <span>Size - <span> EU 44.5 </span></span>
                                <span>SAR 775.00</span>
                            </div>
                        </div>
                    </div>
                    <!-- item -->
                    <div class="row">
                        <div class="col-6 item-img">
                            <img src="https://www.nike.sa/dw/image/v2/BDVB_PRD/on/demandware.static/-/Sites-akeneo-master-catalog/default/dw21c2dffe/nk/32b/0/f/1/7/a/32b0f17a_38ba_40fa_9de7_31c5bb1661e3.png?sw=520&sh=520&sm=fit"
                                alt="">
                        </div>
                        <div class="col-6 item-info">
                            <p><a href="#"> Air Jordan 1 Low Men's Shoes</a></p>
                            <div class="d-flex flex-column gap-2
                            ">
                                <span>QTY - <span> 1 </span></span>
                                <span>Size - <span> EU 44.5 </span></span>
                                <span>SAR 775.00</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-1"></div>

        </main>
    </section>
    <?php include "footer.blade.php"; ?>
</body>

</html>