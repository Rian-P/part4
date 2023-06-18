<!-- dashboard.report.blade.php -->

<h1>Report</h1>

@if($report->isEmpty())
    <p>No data found for the selected date range.</p>
@else
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Customer Name</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($report as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->tanggal_ambil }}</td>
                    <td>{{ $item->customer_name }}</td>
                    <td>{{ $item->total_harga }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
