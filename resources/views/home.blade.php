<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>To-do Planning</title>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-5">
            <h2 class="text-center mb-4">Developer Task Summary</h2>

            <table class="table table-responsive-sm table-striped table-bordered">
                <thead>
                <tr>
                    <th class="w-25">Developer</th>
                    <th class="w-25">Task Count</th>
                    <th class="w-50">Total Duration (hours)</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($summaries as $developerId => $summary)
                    <tr>
                        <td>{{ $summary['developer_name'] }}</td>
                        <td>{{ $summary['task_count'] }}</td>
                        <td>{{ $summary['duration'] }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr class="table-primary">
                    <td>Total: {{ $totalDevelopers }}</td>
                    <td>Total: {{ $totalTasks }}</td>
                    <td>Total: {{ $totalDuration }} hours (~ {{ $totalWeek }} weeks)</td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
