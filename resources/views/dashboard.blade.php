<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sensor Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Custom background style */
        body {
            background-color: #e0f7fa; /* Light teal background */
        }

        /* Centered container for the dashboard */
        .dashboard-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Table header */
        .table-header {
            background-color: #00796b; /* Deep teal header */
            color: white;
        }

        /* Table row hover effect */
        .table-row:hover {
            background-color: #e0f2f1; /* Very light teal hover effect */
        }

        /* Table column header text color */
        th {
            color: #ffffff;
        }

        /* Table row text color */
        td {
            color: #004d40; /* Dark teal text */
        }

        /* Pagination button style */
        .pagination {
            background-color: #004d40; /* Darker teal */
            color: white;
            border-radius: 4px;
        }

        .pagination a {
            color: white;
        }

        .pagination a:hover {
            background-color: #00796b;
        }
    </style>
</head>

<body class="p-6">

    <div class="max-w-6xl mx-auto dashboard-container p-8">
        <center>
            <h1 class="text-3xl font-semibold text-gray-800 mb-6">Sensor Data Dashboard</h1>
        </center>

        <table class="w-full table-auto bg-white rounded-lg shadow-lg">
            <thead class="table-header">
                <tr>
                    <th class="p-4 text-left">Device ID</th>
                    <th class="p-4 text-left">Temperature (°C)</th>
                    <th class="p-4 text-left">Humidity (%)</th>
                    <th class="p-4 text-left">Timestamp</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sensorData as $data)
                <tr class="border-t table-row">
                    <td class="p-4">{{ $data->device_id ?? 'N/A' }}</td>
                    <td class="p-4">{{ $data->temperature }}</td>
                    <td class="p-4">{{ $data->humidity }}</td>
                    <td class="p-4">{{ $data->created_at->toDayDateTimeString() }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            {{ $sensorData->links() }}
        </div>
    </div>

</body>

</html>
