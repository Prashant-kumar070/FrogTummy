<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queue Monitor</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ddd; text-align: left; }
        th { background-color: #f4f4f4; }
        .status-pending { color: orange; }
        .status-failed { color: red; }
        .status-completed { color: green; }
        .retry-btn { padding: 5px 10px; background: red; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>

    <h2>Queue Monitor Dashboard</h2>

    <table>
        <thead>
            <tr>
                <th>Job Name</th>
                <th>Status</th>
                <th>Attempts</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jobs as $job)
            <tr>
                <td>{{ $job->job_name }}</td>
                <td class="status-{{ strtolower($job->status) }}">{{ ucfirst($job->status) }}</td>
                <td>{{ $job->attempts }}</td>
                <td>{{ $job->created_at }}</td>
                <td>
                    @if($job->status === 'failed')
                        <form method="POST" action="/queue-monitor/retry/{{ $job->id }}">
                            @csrf
                            <button type="submit" class="retry-btn">Retry</button>
                        </form>
                    @else
                        --
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
