    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\LoginController;
    use App\Http\Controllers\CompanyInfoController;
    use App\Http\Controllers\EmployeeController;
    use App\Http\Controllers\InventoryController;
    use App\Http\Controllers\VendorsController;
    use App\Http\Controllers\EmployeeInventoryController;
    use App\Http\Controllers\UnreturnedItemsController;
    use App\Http\Controllers\LogoutController;
    ;





    /*
    |--------------------------------------------------------------------------
    | Web Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register web routes for your application. These
    | routes are loaded by the RouteServiceProvider and all of them will
    | be assigned to the "web" middleware group. Make something great!
    |
    */

    Route::get('/',function(){return view('Index');});

    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/DashBoard',function(){return view('DashBoard');})->name('DashBoard');
    Route::view('/DashBoard', 'DashBoard')->name('DashBoard');
    Route::get('/company-info', [CompanyInfoController::class, 'index'])->name('company.info');
    Route::get('/Employee', [EmployeeController::class, 'index'])->name('employee');
    Route::get('/Inventory', [InventoryController::class, 'index'])->name('inventory');
    Route::get('/Vendors', [VendorsController::class, 'index'])->name('vendors');
    Route::get('/EmployeeInventory', [EmployeeInventoryController::class, 'index'])->name('employeeinventory');
    Route::get('/UnreturnedItems', [UnreturnedItemsController::class, 'index'])->name('unreturneditems');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
    Route::post('/add_company', [CompanyInfoController::class, 'addCompany'])->name('add.company');
    Route::post('/edit_company', [CompanyInfoController::class, 'editCompany'])->name('edit.company');
    Route::get('/get-company-details/{id}', [CompanyInfoController::class, 'getCompanyDetails']);
    Route::get('/delete-company/{id}',[CompanyInfoController::class, 'deleteCompany'])->name('delete.company');
    Route::post('/add_Employee', [EmployeeController::class, 'addEmployee'])->name('add.employee');
    Route::post('/edit_Employee', [EmployeeController::class, 'editEmployee'])->name('edit.employee');
    Route::get('/get-Employee-details/{id}', [EmployeeController::class, 'getEmployeeDetails']);
    Route::get('/delete-Employee/{id}',[EmployeeController::class, 'deleteEmployee'])->name('delete.employee');
    Route::post('/add_item', [InventoryController::class, 'addItem'])->name('add.item');
    Route::post('/edit_item', [InventoryController::class, 'editItem'])->name('edit.item');
    Route::get('/get-item-details/{id}', [InventoryController::class, 'getItemDetails'])->name('get-item-details');
    Route::get('/delete_item/{id}', [InventoryController::class, 'deleteItem'])->name('delete.item');
    Route::post('/add_vendor', [VendorsController::class, 'addVendor'])->name('add.vendor');
    Route::post('/edit_vendor', [VendorsController::class, 'editVendor'])->name('edit.vendor');
    Route::get('/get-vendor-details/{id}', [VendorsController::class, 'getVendorDetails']);
    Route::get('/delete-vendor/{id}',[VendorsController::class, 'deleteVendor'])->name('delete.vendor');
    Route::post('/add_employee_inventory', [EmployeeInventoryController::class, 'addEmployeeInventory'])->name('add.employeeinventory');
    Route::get('/delete-employeeinventory/{name}', [EmployeeInventoryController::class, 'deleteEmployeeInventory'])->name('delete.employeeinventory');
    Route::post('/add_UnreturnedItems', [UnreturnedItemsController::class, 'addUnreturnedItems'])->name('add.UnreturnedItems');
    Route::get('/delete-UnreturnedItems/{id}', [UnreturnedItemsController::class, 'deleteUnreturnedItems'])->name('delete.UnreturnedItems');
    Route::get('/UnreturnedItems', [UnreturnedItemsController::class, 'index'])->name('unreturneditems');



    ?>
