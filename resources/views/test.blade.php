<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body{
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 100%;
            margin-right: auto;
            margin-left: auto;
        }
        .brand-section{
           background-color: #0d1033;
           padding: 10px 40px;
        }
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
        }
        .col-6{
            width: 50%;
      
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 14px;
            margin-bottom: 08px;
        }
        .sub-heading{
          font-size: 12px;
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="brand-section">
            <div class="row">
                <div class="col-6">
                    <h2 class="text-white">Foodie</h2>
                   <div class="text-white">kathmandu nepal</div> 
                   <div class="text-white">893434</div> 

                </div>
               
            </div>
        </div>

        <div class="body-section">
            <h2 class="heading">Invoice No.: 001</h2>
           <table>
                <tr>         
                    <p class="sub-heading">Order Date: {{$user->orders[0]->created_at}} </p>
                    <p class="sub-heading">Email Address: {{$user->email}}</p>
                    <p class="sub-heading">Full Name:{{$user->name}}  </p>
                    <p class="sub-heading">Address: {{$user->address}} </p>
                    <p class="sub-heading">Phone Number:  </p>
                    <p class="sub-heading">City,State,Pincode:  </p>
                </tr>
                </table>
        </div>

        <div class="body-section">
            <h3 class="heading">Ordered Items</h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th class="w-20">Price per unit</th>
                        <th class="w-20">Quantity</th>
                        <th class="w-20">Discount per unit</th>
                        <th class="w-20">Sub Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user->orders as $order)
                    <tr>
                        <td>{{$order->item_name}}</td>
                        <td>{{$order->price_per_unit}}</td>
                        <td>{{$order->amount}}</td>
                        <td>{{$order->discount_per_unit}}</td>
                        <td>100</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="4" class="text-right"> Total</td>
                        <td> 10.XX</td>
                    </tr>
                  
                    <tr>
                        <td colspan="4" class="text-right">Grand Total</td>
                        <td> 12.XX</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h3 class="heading">Payment Status: Paid</h3>
            <h3 class="heading">Payment Mode: Cash on Delivery</h3>
        </div>

          
    </div>      


</body>
</html>