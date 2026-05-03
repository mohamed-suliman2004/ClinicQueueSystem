@extends('admin.layouts.layout')

@section('title','Admin Dashboard')

@section('admin-content')

<style>
    .stat-card {
        border-radius: 20px;
        border: none;
        transition: all 0.3s ease;
        overflow: hidden;
        position: relative;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .stat-icon {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 4rem;
        opacity: 0.15;
    }

    .stat-card .card-body {
        padding: 1.5rem;
    }

    .stat-card h6 {
        font-size: 0.875rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 0.5rem;
        font-weight: 600;
    }

    .stat-card h2 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0;
    }

    .dashboard-card {
        border-radius: 20px;
        border: none;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }

    .dashboard-card:hover {
        box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    .dashboard-card .card-header {
        background: transparent;
        border-bottom: 2px solid #f0f0f0;
        padding: 1.25rem 1.5rem;
        font-weight: 600;
        font-size: 1.1rem;
    }

    .table-custom {
        margin-bottom: 0;
    }

    .table-custom td, .table-custom th {
        padding: 1rem;
        vertical-align: middle;
    }

    .avatar-sm {
        width: 40px;
        height: 40px;
        border-radius: 12px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
    }

    .greeting-banner {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        color: white;
    }

    .progress-card {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        border-radius: 20px;
        padding: 1.5rem;
        height: 100%;
    }

    .badge-custom {
        padding: 0.5rem 1rem;
        border-radius: 12px;
        font-weight: 500;
    }
</style>

<div class="container-fluid px-4">

    <!-- Greeting Banner -->
    <div class="greeting-banner">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h3 class="mb-2">Welcome back, {{ auth()->user()->name }}! 👋</h3>
                <p class="mb-0 opacity-75">Here's what's happening with your healthcare system today.</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <small class="opacity-75">Today's Date</small>
                <h5 class="mb-0">{{ now()->format('l, F j, Y') }}</h5>
            </div>
        </div>
    </div>

    <!-- Statistics Cards Row -->
    <div class="row g-4 mb-4">
        <!-- Total Users -->
        <div class="col-xl-3 col-md-6">
            <div class="card stat-card bg-primary text-white">
                <div class="card-body">
                    <h6>Total Users</h6>
                    <h2>{{ number_format($users) }}</h2>
                    <small class="opacity-75">+12% from last month</small>
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Doctors -->
        <div class="col-xl-3 col-md-6">
            <div class="card stat-card bg-success text-white">
                <div class="card-body">
                    <h6>Medical Staff</h6>
                    <h2>{{ number_format($doctors) }}</h2>
                    <small class="opacity-75">+5 new this month</small>
                    <div class="stat-icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Patients -->
        <div class="col-xl-3 col-md-6">
            <div class="card stat-card bg-info text-white">
                <div class="card-body">
                    <h6>Active Patients</h6>
                    <h2>{{ number_format($patients) }}</h2>
                    <small class="opacity-75">+18% growth rate</small>
                    <div class="stat-icon">
                        <i class="fas fa-procedures"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Appointments -->
        {{-- <div class="col-xl-3 col-md-6">
            <div class="card stat-card bg-warning text-white">
                <div class="card-body">
                    <h6>Monthly Appointments</h6>
                    <h2>{{ number_format($monthlyAppointments) }}</h2>
                    <small class="opacity-75">This month's bookings</small>
                    <div class="stat-icon">
                        <i class="fas fa-calendar-check"></i>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

    <!-- Secondary Stats Row -->
    <div class="row g-4 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card stat-card bg-danger text-white">
                <div class="card-body">
                    <h6>Departments</h6>
                    <h2>{{ number_format($departments) }}</h2>
                    <small class="opacity-75">Specialized units</small>
                    <div class="stat-icon">
                        <i class="fas fa-building"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card stat-card bg-dark text-white">
                <div class="card-body">
                    <h6>Reception Staff</h6>
                    <h2>{{ number_format($receptionists) }}</h2>
                    <small class="opacity-75">Front desk team</small>
                    <div class="stat-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-xl-3 col-md-6">
            <div class="card stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white;">
                <div class="card-body">
                    <h6>Pending Appointments</h6>
                    <h2>{{ number_format($pendingAppointments) }}</h2>
                    <small class="opacity-75">Awaiting confirmation</small>
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="col-xl-3 col-md-6">
            <div class="card stat-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white;">
                <div class="card-body">
                    <h6>Completed Today</h6>
                    <h2>{{ number_format($completedAppointments) }}</h2>
                    <small class="opacity-75">Successful visits</small>
                    <div class="stat-icon">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>

    <!-- Charts and Progress Row -->
    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="card dashboard-card">
                <div class="card-header">
                    <i class="fas fa-chart-line me-2"></i> Appointment Trends
                </div>
                <div class="card-body">
                    <canvas id="appointmentChart" height="300"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card dashboard-card h-100">
                <div class="card-header">
                    <i class="fas fa-chart-pie me-2"></i> System Overview
                </div>
                <div class="card-body">
                    <canvas id="systemPieChart" height="250"></canvas>
                    <div class="mt-3">
                        <div class="d-flex justify-content-between mb-2">
                            <span><i class="fas fa-circle text-primary me-2"></i>Users</span>
                            <span class="fw-bold">{{ number_format($users) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span><i class="fas fa-circle text-success me-2"></i>Doctors</span>
                            <span class="fw-bold">{{ number_format($doctors) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span><i class="fas fa-circle text-info me-2"></i>Patients</span>
                            <span class="fw-bold">{{ number_format($patients) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity Row -->
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card dashboard-card">
                <div class="card-header">
                    <i class="fas fa-user-plus me-2"></i> New Users
                    <a href="{{ route('admin.users.manage') }}" class="btn btn-sm btn-link float-end">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-custom">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Role</th>
                                    <th>Joined Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentUsers as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2">
                                                {{ substr($user->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="fw-bold">{{ $user->name }}</div>
                                                <small class="text-muted">{{ $user->email }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge badge-custom bg-{{ $user->role == 'admin' ? 'danger' : ($user->role == 'doctor' ? 'success' : 'info') }} bg-opacity-10">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>
                                        <span class="badge bg-success bg-opacity-10 text-success">Active</span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">No recent users</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card dashboard-card">
                <div class="card-header">
                    <i class="fas fa-stethoscope me-2"></i> Recent Doctors
                    <a href="{{ route('admin.doctors.manage') }}" class="btn btn-sm btn-link float-end">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-custom">
                            <thead>
                                <tr>
                                    <th>Doctor</th>
                                    <th>Department</th>
                                    <th>Experience</th>
                                    <th>Rating</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentDoctors as $doctor)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm me-2" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                                                {{ substr($doctor->name ?? 'Dr', 0, 1) }}
                                            </div>
                                            <div>
                                                <div class="fw-bold">Dr. {{ $doctor->name ?? 'Unknown' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $doctor->department->name ?? 'N/A' }}</td>
                                    <td>{{ $doctor->experience_years ?? 0 }} years</td>
                                    <td>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star text-warning"></i>
                                        <i class="fas fa-star-half-alt text-warning"></i>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">No recent doctors</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>

<script>
// Appointment Trends Chart
const ctx = document.getElementById('appointmentChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
            label: 'Appointments',
            data: [65, 78, 82, 88, 95, 102, 98, 105, 112, 118, 125, 130],
            borderColor: '#667eea',
            backgroundColor: 'rgba(102, 126, 234, 0.1)',
            borderWidth: 3,
            tension: 0.4,
            fill: true
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                grid: {
                    display: true,
                    color: 'rgba(0,0,0,0.05)'
                }
            },
            x: {
                grid: {
                    display: false
                }
            }
        }
    }
});

// System Overview Pie Chart
const pieCtx = document.getElementById('systemPieChart').getContext('2d');
new Chart(pieCtx, {
    type: 'doughnut',
    data: {
        labels: ['Users', 'Doctors', 'Patients'],
        datasets: [{
            data: [{{ $users }}, {{ $doctors }}, {{ $patients }}],
            backgroundColor: ['#667eea', '#28a745', '#17a2b8'],
            borderWidth: 0,
            cutout: '60%'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script>

@endsection
