
@extends('admin/layouts/admin')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div id="kt_content_container" class="container-fluid">
        <div class="card">
            <div class="card-header border-0 pt-6">
                <h2>Orders</h2>
            </div>
            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                        <thead>
                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-125px">Full name</th>
                                <th class="min-w-125px">Birth date</th>
                                <th class="min-w-125px">Phone number</th>
                                <th class="min-w-125px">Email</th>
                                <th class="min-w-125px">Pickup/Dropoff Date</th>
                                <th class="min-w-125px">Pickup/Dropoff Location</th>
                                <th class="min-w-125px">Total price</th>
                                <th class="min-w-125px">Comm. with</th>
                                <th class="min-w-125px">Car</th>
                                <th class="min-w-125px">Created at</th>
                                <th class="min-w-125px">Action</th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold text-gray-600">
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                <td>{{ $order->birth_date }}</td>
                                <td>{{ $order->phone_number }}</td>
                                <td><a href="mailto:{{ $order->email }}">{{ $order->email }}</a></td>
                                <td>{{ $order->pickup_date }} / {{ $order->dropoff_date }}</td>
                                <td>{{ $order->pickup_loc }} / {{ $order->dropoff_loc }}</td>
                                <td><b>{{ number_format((int) $order->totalp) }}</b></td>
                                <td>{{ str_replace('_', ' ', $order->communicate_with) }}</td>
                                <td><a href="{{ route('cars.detail', $order->car_id) }}" target="_blank">View</a></td>
                                <td>{{ $order->created_at }}</td>
                                <td><a href="" class="text-danger">Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection