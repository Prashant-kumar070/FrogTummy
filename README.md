# QBeacon - Monitor

QBeacon is a real-time dashboard for monitoring Laravel queued jobs. It provides an easy-to-use interface for tracking the status of your jobs, retrying failed ones, and gaining insights into your job processing.

![QBeacon Dashboard](https://path-to-your-image/QBeacon-Dashboard.png)  <!-- Replace with actual URL of the image -->

---

## Features

- Real-time monitoring of Laravel jobs.
- Retry failed jobs directly from the dashboard.
- View detailed job statuses (e.g., Pending, Processing, Failed, Completed).
- Tracks job attempts and provides detailed logs.

---

## Installation

### Requirements
- **PHP**: `>=8.0`
- **Laravel**: `>=9.x`
- **Database**: Ensure you have the `failed_jobs` table configured in your Laravel project.

### Steps
1. Install the package via Composer:
   ```bash
   composer require qbeacon/queue-monitor
   ```

2. Publish the package assets:
   ```bash
   php artisan vendor:publish --tag=queue-monitor-assets --force
   ```

3. Run migrations to create the required tables:
   ```bash
   php artisan migrate
   ```

4. Add the following route to your `web.php` file (optional if routes are not automatically loaded):
   ```php
   Route::get('/queue-monitor', function () {
       return view('queue-monitor::dashboard');
   });
   ```

5. Start the Laravel queue worker:
   ```bash
   php artisan queue:work
   ```

---

## Usage

### Monitoring Jobs
Navigate to `/queue-monitor` in your application to view the dashboard. The dashboard shows:
- **Job Name**: The name of the job class.
- **Status**: The current status of the job (e.g., Failed, Completed, Processing).
- **Attempts**: The number of attempts made to process the job.
- **Created At**: The timestamp when the job was created.

### Retrying Failed Jobs
1. Identify the failed job in the list.
2. Click the red **Retry** button in the "Action" column.
3. The job will be re-queued, and the status will update accordingly.

---

## Dashboard

Below is a snapshot of the QBeacon dashboard:
![Screenshot from 2025-02-10 23-44-20](https://github.com/user-attachments/assets/67a1f587-3d1d-41b5-8cf5-474badec0f0e)

---

## Contributing

Feel free to contribute to this project by submitting issues or pull requests. Contributions are welcome to improve features or fix bugs.

---

## License

QBeacon is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

## Support

If you encounter any issues, feel free to open an issue on the [GitHub repository](https://github.com/your-repo-url).

