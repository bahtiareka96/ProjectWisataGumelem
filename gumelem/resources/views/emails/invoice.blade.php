<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Invoice for Your Recent Purchase
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Hi {{ $user->name }},</h5>
                        <p>Thank you for your purchase. Here are your transaction details:</p>
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">Item Name</th>
                                    <td>{{ $invoice->item_name }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Quantity</th>
                                    <td>{{ $invoice->quantity }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Total Price</th>
                                    <td>{{ $invoice->total_price }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Status</th>
                                    <td>{{ $invoice->status }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <p>Please contact us if you have any questions regarding your order.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
