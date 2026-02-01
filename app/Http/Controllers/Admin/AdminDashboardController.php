<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobApplicant;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard with job application statistics and charts.
     */
    public function index()
    {
        $now = Carbon::now();
        $startOfMonth = $now->copy()->startOfMonth();
        $endOfMonth = $now->copy()->endOfMonth();
        $lastMonthStart = $now->copy()->subMonth()->startOfMonth();
        $lastMonthEnd = $now->copy()->subMonth()->endOfMonth();
        $startOfWeek = $now->copy()->startOfWeek();
        $endOfWeek = $now->copy()->endOfWeek();
        $lastWeekStart = $now->copy()->subWeek()->startOfWeek();
        $lastWeekEnd = $now->copy()->subWeek()->endOfWeek();

        // Total applications (job applicants = one submission per row)
        $totalApplications = JobApplicant::count();

        // This month
        $applicationsThisMonth = JobApplicant::whereBetween('created_at', [$startOfMonth, $endOfMonth])->count();
        $applicationsLastMonth = JobApplicant::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->count();
        $applicationsMonthChange = $this->percentChange($applicationsLastMonth, $applicationsThisMonth);

        // This week
        $applicationsThisWeek = JobApplicant::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
        $applicationsLastWeek = JobApplicant::whereBetween('created_at', [$lastWeekStart, $lastWeekEnd])->count();
        $applicationsWeekChange = $this->percentChange($applicationsLastWeek, $applicationsThisWeek);

        // Active jobs count
        $activeJobs = Job::active()->count();

        // Applications per month (last 12 months)
        $applicationsPerMonth = JobApplicant::query()
            ->selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->where('created_at', '>=', $now->copy()->subMonths(11)->startOfMonth())
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->keyBy(fn ($r) => sprintf('%d-%02d', $r->year, $r->month));

        $last12Months = collect();
        for ($i = 11; $i >= 0; $i--) {
            $d = $now->copy()->subMonths($i);
            $key = $d->format('Y-m');
            $last12Months->push([
                'label' => $d->format('M Y'),
                'key'   => $key,
                'count' => $applicationsPerMonth->get($key)?->count ?? 0,
            ]);
        }

        // Applications per year (last 6 years)
        $applicationsPerYear = JobApplicant::query()
            ->selectRaw('YEAR(created_at) as year, COUNT(*) as count')
            ->where('created_at', '>=', $now->copy()->subYears(5)->startOfYear())
            ->groupBy('year')
            ->orderBy('year')
            ->get()
            ->keyBy('year');

        $last6Years = collect();
        for ($i = 5; $i >= 0; $i--) {
            $y = $now->copy()->subYears($i)->year;
            $last6Years->push([
                'label' => (string) $y,
                'count' => $applicationsPerYear->get($y)?->count ?? 0,
            ]);
        }

        // Recent activity: latest job applicants (applications)
        $recentApplications = JobApplicant::withCount('jobApplications')
            ->latest('created_at')
            ->take(8)
            ->get();

        return view('admin.dashboard', compact(
            'totalApplications',
            'applicationsThisMonth',
            'applicationsMonthChange',
            'applicationsThisWeek',
            'applicationsWeekChange',
            'activeJobs',
            'last12Months',
            'last6Years',
            'recentApplications'
        ));
    }

    private function percentChange($old, $new): ?float
    {
        if ($old == 0) {
            return $new > 0 ? 100 : null;
        }
        return round((($new - $old) / $old) * 100, 1);
    }
}
