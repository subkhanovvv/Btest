<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>

<body>

    <h4 class="container  mt-2">Date filter</h4>
     {{-- Форма для фильтрации данных --}}
    <form action="/filter_date" class="container border p-3" method="get">

        <label for="start_date" class="pl-4 pr-2">Start Date</label>

        <input type="date" id="start_date" name="start_date" required>

        <label for="end_date" class="pl-4 pr-2">End Date</label>

        <input type="date" id="end_date" name="end_date" required>

        <button class="btn btn-primary float-right" type="submit">Filter</button>

    </form>

    <br>
    {{-- Таблица для отображения данных --}}
    <table class="table container border">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Type</th>
                <th>Created at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->type }}</td>
                    <td>{{ $d->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
