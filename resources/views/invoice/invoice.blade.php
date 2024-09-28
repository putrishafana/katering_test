<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->id }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<style>
    @media print {
        .no-print {
            display: none;
            /* Hide elements with the class 'no-print' */
        }
    }
</style>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Invoice #{{ $order->id }}</h3>
                <p>Tanggal Order: {{ $order->created_at }}</p>
            </div>
            <div class="card-body">
                <h5>Order Details</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Menu</th>
                            <th>Tanggal Pengiriman</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $order->menu->menu }}</td>
                            <td>{{ $order->tanggal_pengiriman }}</td>
                            <td>{{ number_format($order->harga, 2) }}</td>
                            <td>{{ $order->jumlah }}</td>
                        </tr>
                    </tbody>
                </table>
                <h4 class="mt-4 d-flex justify-content-end">Total: {{ number_format($order->total_harga, 2) }}
                </h4>
            </div>
            <div class="card-footer text-right no-print">
                <button onclick="window.print()" class="btn btn-primary">Print Invoice</button>
            </div>
        </div>
    </div>

    <script>
        window.onafterprint = function() {
            window.location.reload();
        };
    </script>
</body>

</html>
