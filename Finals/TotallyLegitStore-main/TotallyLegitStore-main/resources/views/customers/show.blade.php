<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Customer Details</h1>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to Customer List</a>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Customer Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Username:</strong> {{ $customer->username }}</p>
                        <p><strong>Email:</strong> {{ $customer->email }}</p>
                        <p><strong>First Name:</strong> {{ $customer->first_name }}</p>
                        <p><strong>Last Name:</strong> {{ $customer->last_name }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Date of Birth:</strong> 
                            @if($customer->date_of_birth)
                                {{ \Carbon\Carbon::parse($customer->date_of_birth)->format('F j, Y') }}
                            @else
                                N/A
                            @endif
                        </p>
                        <p><strong>Phone:</strong> {{ $customer->phone }}</p>
                        <p><strong>Address:</strong> {{ $customer->address }}</p>
                        <p><strong>Created At:</strong> {{ $customer->created_at->format('F j, Y g:i A') }}</p>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="btn-group">
                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit Customer</a>
                    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>