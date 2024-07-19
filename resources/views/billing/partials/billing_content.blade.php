<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Charges</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($charges as $charge)
                        <tr>
                            <td>{{ $charge->title }}</td>
                            <td>{{ number_format($charge->amount, 2) }}</td>
                            <td>
                                <form hx-delete="{{ route('charges.destroy', $charge) }}" hx-target="#billing-content" hx-swap="innerHTML">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total</th>
                            <th>{{ number_format($charges->sum('amount'), 2) }}</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Add Charge</h4>
            </div>
            <div class="card-body">
                <form hx-post="{{ route('charges.store') }}" hx-target="#billing-content" hx-swap="innerHTML">
                    @csrf
                    <input type="hidden" name="account_id" value="{{ $account->id }}">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount:</label>
                        <input type="number" class="form-control" id="amount" name="amount" step="0.01" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Payments</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                        <tr>
                            <td>{{ $payment->datetime }}</td>
                            <td>{{ number_format($payment->amount, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total Payments</th>
                            <th>{{ number_format($payments->sum('amount'), 2) }}</th>
                        </tr>
                        <tr>
                            <th>Remaining Balance</th>
                            <th>{{ number_format($charges->sum('amount') - $payments->sum('amount'), 2) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4>Record Payment</h4>
            </div>
            <div class="card-body">
                <form hx-post="{{ route('payments.store') }}" hx-target="#billing-content" hx-swap="innerHTML">
                    @csrf
                    <input type="hidden" name="account_id" value="{{ $account->id }}">
                    <div class="mb-3">
                        <label for="datetime" class="form-label">Date:</label>
                        <input type="datetime-local" class="form-control" id="datetime" name="datetime" required>
                    </div>
                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount:</label>
                        <input type="number" class="form-control" id="amount" name="amount" step="0.01" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Record Payment</button>
                </form>
            </div>
        </div>
    </div>
</div>
