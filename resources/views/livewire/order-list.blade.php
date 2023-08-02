<div>
    <table>
        <thead>
            <tr>
                <th>Order Reference</th>
                <th>Customer Name</th>
                <th>Total Qty</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->order_ref }}</td>
                <td>{{ $order->customer_name }}</td>
                <td>{{ $order->orderLines->sum('qty') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>