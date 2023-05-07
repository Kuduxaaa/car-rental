<div class="container">
    <h1>Search Results</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Drive Type</th>
                <th>Fuel Type</th>
                <th>Pickup Date</th>
                <th>Dropoff Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cars as $car)
                <tr>
                    <td>{{ $car->name }}</td>
                    <td>{{ $car->category->name }}</td>
                    <td>{{ $car->price }}</td>
                    <td>{{ $car->filters->where('name', 'Drive Type')->first()->value }}</td>
                    <td>{{ $car->filters->where('name', 'Fuel Type')->first()->value }}</td>
                    <td>{{ $pickup_date }}</td>
                    <td>{{ $dropoff_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
