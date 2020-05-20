<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    Category,
    Permission,
    Plan,
    Product,
    Profile,
    Role,
    Table,
    Tenant,
    User
};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        $tenant = auth()->user()->tenant;

        $totalUsers = User::where('tenant_id', $tenant->id)->count();
        $totalTables = Table::count();
        $totalCategories = Category::count();
        $totalProducts = Product::count();
        $totalTenants = Tenant::count();
        $totalPlans = Plan::count();
        $totalRoles = Role::count();
        $totalProfiles = Profile::count();
        $totalPermissions = Permission::count();

        return view('admin.pages.home.home', compact(
            'totalUsers',
            'totalTables',
            'totalCategories',
            'totalProducts',
            'totalTenants',
            'totalPlans',
            'totalRoles',
            'totalProfiles',
            'totalPermissions'
        ));
    }
}
