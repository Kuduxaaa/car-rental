<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Car Search Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
        }

        form {
            max-width: 800px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <form action="{{ route('test.search') }}" method="get">
        @csrf
    
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    
        <div class="form-group">
            <label for="pickup_date">Pickup Date</label>
            <input type="datetime-local" class="form-control" id="pickup_date" name="pickup_date">
        </div>
    
        <div class="form-group">
            <label for="dropoff_date">Dropoff Date</label>
            <input type="datetime-local" class="form-control" id="dropoff_date" name="dropoff_date">
        </div>
    
        @foreach ($filters as $name => $values)
            <div class="form-group">
                <label for="{{ $name }}">{{ $name }}</label>
                <select class="form-control" id="{{ $name }}" name="filters[{{ $name }}][]" multiple>
                    <option value="">Any {{ $name }}</option>
                    @foreach ($values as $value)
                        <option value="filters[{{ $name }}]">{{ $value->value }}</option>
                    @endforeach
                </select>
            </div>
        @endforeach
    
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    
</body>

</html>
