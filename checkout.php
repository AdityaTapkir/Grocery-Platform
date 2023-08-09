 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>CHECKOUT</title>
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--bootstrap-->
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
     <style media="screen">

     </style>
   </head>
   <body>
     <div class="container">
 <div class="py-5 ">

 <div class="row">
     <div class="col-md-4 order-md-2 mb-4">
         <h4 class="d-flex justify-content-between align-items-center mb-3">
             <span class="text-muted">Your cart</span>
             <span class="badge badge-secondary badge-pill">3</span>
         </h4>
         <ul class="list-group mb-3 sticky-top">


             <li class="list-group-item d-flex justify-content-between">
                <span>Total items</span>
               <?php
               include 'config.php';
               session_start();
               $sql2="SELECT count(amount) FROM cart WHERE UID='{$_SESSION['UID']}'";
               $result2=mysqli_query($conn,$sql2);

               if(mysqli_num_rows($result2)>0)
               {
                 while ($row2=mysqli_fetch_assoc($result2)) {
               ?>
                <strong><?php echo $row2['count(amount)']  ?></strong>

               <?php
                 }
               }else{
                 echo "no post available";
               }
                mysqli_close($conn);
               ?>


             </li>
             <li class="list-group-item d-flex justify-content-between">
                 <span>Total (Rs)</span>
                 <strong><?php echo  $_GET['id'] ?>Rs</strong>
             </li>
         </ul>
         <form class="card p-2" action="savecheckout.php" method="post">
             <div class="input-group">
                 <input type="text" class="form-control" placeholder="Promo code">
                 <div class="input-group-append">
                     <button type="submit" class="btn btn-secondary">Redeem</button>
                 </div>
             </div>
         </form>
     </div>
     <div class="col-md-8 order-md-1">
         <h4 class="mb-3">Billing address</h4>
         <form class="needs-validation" novalidate="" action="savecheckout.php" method="post">
           <?php  $amount=$_GET['id'] ?>

           <input type="hidden"   name="amount" value="<?php echo $amount ?>">

             <div class="row">
                 <div class="col-md-6 mb-3">
                     <label for="firstName">First name</label>
                     <input type="text" name="fname"class="form-control" id="firstName" placeholder="" value="" required="">
                     <div class="invalid-feedback"> Valid first name is required. </div>
                 </div>
                 <div class="col-md-6 mb-3">
                     <label for="lastName">Last name</label>
                     <input type="text" name="lname"class="form-control" id="lastName" placeholder="" value="" required="">
                     <div class="invalid-feedback"> Valid last name is required. </div>
                 </div>
             </div>
             <div class="mb-3">
                 <label for="username">Username</label>
                 <div class="input-group">
                     <div class="input-group-prepend">
                         <span class="input-group-text">@</span>
                     </div>
                     <input type="text" name="username"class="form-control" id="username" placeholder="username" required="">
                     <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                 </div>
             </div>
             <div class="mb-3">
                 <label for="email">Email <span class="text-muted"> </span></label>
                 <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com">
                 <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
             </div>
             <div class="mb-3">
                 <label for="address">Address</label>
                 <input type="text" name="address1"class="form-control" id="address" placeholder=" " required="">
                 <div class="invalid-feedback"> Please enter your shipping address. </div>
             </div>
             <div class="mb-3">
                 <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                 <input type="text" name="address2" class="form-control" id="address2" placeholder="Apartment or suite">
             </div>
             <div class="row">
                 <div class="col-md-5 mb-3">
                     <label for="country">Country</label>
                     <select class="custom-select d-block w-100" name="country"id="country" required="">
                         <option value="">Choose...</option>
                         <option>india</option>
                     </select>
                     <div class="invalid-feedback"> Please select a valid country. </div>
                 </div>
                 <div class="col-md-4 mb-3">
                     <label for="state">State</label>
                     <select class="custom-select d-block w-100" name="state" id="state" required="">
                         <option value="">Choose...</option>
                         <option>indore</option>
                     </select>
                     <div class="invalid-feedback"> Please provide a valid state. </div>
                 </div>
                 <div class="col-md-3 mb-3">
                     <label for="zip">Zip</label>
                     <input type="text" name="zip"class="form-control" id="zip" placeholder="" required="">
                     <div class="invalid-feedback"> Zip code required. </div>
                 </div>
             </div>
             <hr class="mb-4">

             <hr class="mb-4">
             <h4 class="mb-3">Payment</h4>
             <div class="d-block my-3">
                 <div class="custom-control custom-radio">
                     <input id="credit" name="Payment" type="radio" class="custom-control-input" checked="" required="" value="CREDIT CARD">
                     <label class="custom-control-label" for="credit">Credit card</label>
                 </div>
                 <div class="custom-control custom-radio">
                     <input id="debit" name="Payment" type="radio" class="custom-control-input" required="" value="Debit card">
                     <label class="custom-control-label" for="debit">Debit card</label>
                 </div>
                 <div class="custom-control custom-radio">
                     <input id="paypal" name="Payment" type="radio" class="custom-control-input" required="" value="Cash On Delivery">
                     <label class="custom-control-label" for="paypal">COD</label>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-6 mb-3">
                     <label for="cc-name">Name on card</label>
                     <input type="text" name="cardname" class="form-control" id="cc-name" placeholder="" required="">
                     <small class="text-muted">Full name as displayed on card</small>
                     <div class="invalid-feedback"> Name on card is required </div>
                 </div>
                 <div class="col-md-6 mb-3">
                     <label for="cc-number">Credit card number</label>
                     <input type="text" name="cardnumber" class="form-control" id="cc-number" placeholder="" required="">
                     <div class="invalid-feedback"> Credit card number is required </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-3 mb-3">
                     <label for="cc-expiration">Expiration</label>
                     <input type="text" name="exp" class="form-control" id="cc-expiration" placeholder="" required="">
                     <div class="invalid-feedback"> Expiration date required </div>
                 </div>
                 <div class="col-md-3 mb-3">
                     <label for="cc-cvv">CVV</label>
                     <input type="text" name="cvv" class="form-control" id="cc-cvv" placeholder="" required="">
                     <div class="invalid-feedback"> Security code required </div>
                 </div>
             </div>
             <hr class="mb-4">
             <button class="btn btn-primary btn-lg btn-block" type="submit" name="save">PLACE ORDER</button>
         </form>
     </div>
 </div>
 <footer class="my-5 pt-5 text-muted text-center text-small">

 </footer>
</div>
<script type="text/javascript" src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js">
</script>
   </body>
 </html>
