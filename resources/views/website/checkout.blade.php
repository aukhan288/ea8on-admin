@extends('layouts.base')
@section('page')
<section class="client_section layout_padding-bottom layout_padding">
    <div class="container  ">
        <div class="row mt-5">
            <div class="col-sm-8 form_container">
            <form method="post" action="submit_form_url"> <!-- Replace with your form action URL -->
            <div class=" row">
                <div class="col-sm-2">
                <label for="title" class="col-form-label">Title</label>
                <select id="title" name="title" class="form-control">
                    <option value="Mr.">Mr.</option>
                    <option value="Ms.">Ms.</option>
                    <option value="Mrs.">Mrs.</option>
                </select>
            </div>

            <div class="col-sm-10">
                <label for="full_name" class="col-form-label">Full Name<span class="text-danger">*</span></label>
                <input type="text" id="full_name" name="full_name" class="form-control" required>
            </div>
        </div>
            <div class="row">
                <div class="col-sm-6">
                 <label for="mobile_number">Mobile Number<span class="text-danger">*</span></label>
                 <input type="tel" id="mobile_number" name="mobile_number" class="form-control" required placeholder="03xx-xxxxxxx">
            </div>

            <div class="col-sm-6">
            <label for="alt_mobile_number">Alternate Mobile Number</label>
            <input type="tel" id="alt_mobile_number" name="alt_mobile_number" class="form-control" placeholder="03xx-xxxxxxx">
            </div>
        </div>
            <div class=" row">
                <div class="col-sm-6">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email">
            </div>

            <div class="col-sm-6">
            <label for="payment_information">Payment Information<span class="text-danger">*</span></label>
            <select id="payment_information" name="payment_information" class="form-control">
                <option value="cash_on_delivery">Cash on Delivery</option>
                <option value="online_payment">Online Payment</option>
            </select>
            </div>
        </div>

        <div class="form-group">
            <label for="delivery_address">Delivery Address<span class="text-danger">*</span></label>
            <textarea id="delivery_address" name="delivery_address" class="form-control" required placeholder="Enter your complete address"></textarea>
        </div>

        <div class="form-group">
            <label for="nearest_landmark">Nearest Landmark</label>
            <input type="text" id="nearest_landmark" name="nearest_landmark" class="form-control" placeholder="Any famous place nearby">
        </div>



        <div class="form-group ">
            <label for="delivery_instructions">Delivery Instructions</label>
            <textarea id="delivery_instructions" name="delivery_instructions" class="form-control"></textarea>
        </div>

       

        <button type="submit" style="
        display: inline-block;
    padding: 8px 30px;
    background-color: #ffbe33;
    color: #ffffff;
    border-radius: 45px;
    -webkit-transition: all 0.3s;
    transition: all 0.3s;
    border: none;
        ">Submit</button>
    </form>
            </div>
            <div class="col-sm-4">
                <div class="card mb-5 p-3" style="background-color: #f7f7f7 !important;">
                <h1>Your Order</h1>
                <hr>
                <span><strong>Total Rs.</strong>2458</span>
                <span><strong>Tax</strong> 18%</span>
                <span><strong>Delivery Fee Rs.</strong>150</span>
                <span><strong>Total Rs.</strong> 2458</span>
                <hr>
                 <h3><strong>Grand Total Rs.</strong> 3050</h3>
                 
                
                
                
                
                </div>
            </div>
        </div>
    </div>
</section>
@endsection