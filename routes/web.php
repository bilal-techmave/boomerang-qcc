<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CleanerInductionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientPortfolioController;
use App\Http\Controllers\ClientProspectController;
use App\Http\Controllers\Common\ListController;
use App\Http\Controllers\ContractorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\MainCompanyController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\FinancialAccountController;
use App\Http\Controllers\ExpenseTypeController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FinancialDashboard;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\NcrController;
use App\Http\Controllers\JobTypeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CleanerController;
use App\Http\Controllers\Common\ExportController;
use App\Http\Controllers\Cron\MissedClenController;
use App\Http\Controllers\GeoController;
use App\Http\Controllers\ManageItemController;
use App\Http\Controllers\ManageSiteController;
use App\Http\Controllers\ManageStorageController;
use App\Http\Controllers\OperationalDashboard;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ShiftQuestionController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TimeAttendance;
use App\Http\Controllers\UserController;
use App\Http\Controllers\{WorkOrderController, TemplatesController, InspectionController, ScheduleController};
use App\Mail\Cleaner\ForgotPasswordMail;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
// use QrCode;
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


Route::match(['get','post'],'login', [AuthController::class,'login'])->name('login');
Route::match(['get','post'],'regester', [AuthController::class,'regester'])->name('regester');
Route::match(['get','post'],'forgot-password', [AuthController::class,'forgotpwd'])->name('forgotpwd');
Route::get('/', [DashboardController::class,'index'])->name('dashboard');
Route::get('export-report/{page}', [ExportController::class,'excelReport'])->name('export.data');

Route::group(['middleware'=>'auth'], function(){
    Route::match(['get','post'],'/profile',[UserController::class,'profile'])->name('user.profile');
});

Route::group(['as'=>'dashboard.','middleware'=>'auth'], function(){
    Route::get('/it-dashboard',[DashboardController::class,'itDashboard'])->name('itDashboard');
    Route::post('/it-dashboard',[DashboardController::class,'itStore'])->name('itStore');
    Route::delete('/it-delete/{id}', [DashboardController::class, 'itDestroy'])->name('itDelete');
});


Route::group(['prefix'=>'cleaner','as'=>'cleaner.','middleware'=>'auth'], function(){

    Route::get('/', [CleanerController::class,'index'])->name('index');
    Route::post('/update-status', [UserController::class , 'updateStatus'])->name('update.status');
    
    Route::get('/dashboard',[CleanerController::class,'dashboard'])->name('dashboard');
    Route::get('/my-job',[CleanerController::class,'myJob'])->name('myjob');
    // Shift
    Route::post('/start-shift', [CleanerController::class , 'startShift'])->name('startShift');
    Route::post('/before-image', [CleanerController::class , 'beforeImage'])->name('beforeImage');
    Route::post('/after-image', [CleanerController::class , 'afterImage'])->name('afterImage');
    Route::post('/end-shift', [CleanerController::class , 'endShift'])->name('endShift');
    // Work
    Route::post('/start-work-shift', [CleanerController::class , 'startWorkShift'])->name('startWorkShift');
    Route::post('/work-before-image', [CleanerController::class , 'workBeforeImage'])->name('workBeforeImage');
    Route::post('/work-after-image', [CleanerController::class , 'workAfterImage'])->name('workAfterImage');
    Route::post('/end-work-shift', [CleanerController::class , 'endWorkShift'])->name('endWorkShift');
});

Route::group(['prefix'=>'operational','as'=>'operational.','middleware'=>'auth'], function(){
    Route::get('/word-order-dashboard', [OperationalDashboard::class,'workOrderDashboard'])->name('work.order.dashboard');
    Route::get('/portfolio-structure', [OperationalDashboard::class,'portfolioStracture'])->name('portfolio.stracture');
    Route::get('/missed-clean', [OperationalDashboard::class,'missedClean'])->name('missed.clean');
    Route::get('/approval-board', [OperationalDashboard::class,'approvalBoard'])->name('approval.board');
    Route::get('/approval-board-view/{id}', [OperationalDashboard::class,'approvalBoardView'])->name('approval.board.view');
    Route::post('/approval-board-change-status', [OperationalDashboard::class,'approvalBoardChangeStatus'])->name('approval.board.change.status');
});


    Route::get('/time-attendance-dashboard', [TimeAttendance::class,'index'])->name('time.attendance.dashboard');




Route::group(['prefix'=>'administration','as'=>'administration.','middleware'=>'auth'], function(){

    Route::resource('company', MainCompanyController::class);
    Route::post('company-unique-check', [MainCompanyController::class,'unique_check'])->name('company.unique');

    Route::resource('department', DepartmentController::class);
    Route::post('department-unique-check', [DepartmentController::class,'unique_check'])->name('department.unique');

    Route::get('settings', [SettingController::class,'index'])->name('site-settings');
    Route::post('settings', [SettingController::class,'create'])->name('site-settings-post');

    Route::get('cities', [GeoController::class,'cities'])->name('cities');
    Route::post('create-city', [GeoController::class,'create_city'])->name('create-city');
    Route::post('update-city', [GeoController::class,'update_city'])->name('update-city');
    Route::post('cities-unique-check', [GeoController::class,'unique_check'])->name('cities.unique');
    
    Route::get('states', [GeoController::class,'states'])->name('states');
    Route::post('create-state', [GeoController::class,'create_state'])->name('create-state');
    Route::post('update-state', [GeoController::class,'update_state'])->name('update-state');
    Route::post('state-unique-check', [GeoController::class,'unique_check_state'])->name('state.unique');
});

Route::group(['prefix'=>'financial','as'=>'financial.','middleware'=>'auth'], function(){
    Route::resource('accounts', FinancialAccountController::class);
    Route::post('accounts-unique-check', [FinancialAccountController::class,'unique_check'])->name('accounts.unique');
    Route::resource('expensetype', ExpenseTypeController::class);
    Route::post('expensetype-unique-check', [ExpenseTypeController::class,'unique_check'])->name('expensetype.unique');
    Route::resource('expense', ExpenseController::class);

    Route::get('/word-order-dashboard', [FinancialDashboard::class,'workOrderDashboard'])->name('work.order.dashboard');
    Route::get('/manager-dashboard', [FinancialDashboard::class,'managerDashboard'])->name('manager.dashboard');


});

Route::group(['prefix'=>'human-resources','as'=>'hr.','middleware'=>'auth'], function(){
    Route::resource('team-player', UserController::class);
    Route::post('team-player-unique-check', [UserController::class,'unique_check'])->name('user.unique');
    Route::get('waiting-approval', [UserController::class,'waiting_approval'])->name('waiting_approval');
    Route::get('approval-view/{id}', [UserController::class,'approval_view'])->name('approval_view');
    Route::resource('contractor', ContractorController::class);
    Route::post('contractor-unique-check', [ContractorController::class,'unique_check'])->name('contractor.unique');
    // Route::resource('expensetype', ExpenseTypeController::class);
});

Route::group(['prefix'=>'supplier','as'=>'supplier.','middleware'=>'auth'], function(){
    Route::resource('suppliers', SupplierController::class);
    Route::post('suppliers-unique-check', [SupplierController::class,'unique_check'])->name('unique');

});
Route::group(['prefix'=>'user','as'=>'user.','middleware'=>'auth'], function(){
    Route::resource('roles', RoleController::class);
    Route::post('role-unique-check', [RoleController::class,'unique_check'])->name('role.unique');
});


Route::group(['prefix'=>'job-type','as'=>'job-type.','middleware'=>'auth'], function(){
    Route::get('/', [JobTypeController::class,'index'])->name('index');
    Route::post('/store', [JobTypeController::class,'store'])->name('store');
    Route::post('/update', [JobTypeController::class,'update'])->name('update');
    Route::post('/add-jobsubtype', [JobTypeController::class,'addSubtype'])->name('addSubtype');
    Route::post('/update-both', [JobTypeController::class,'updatedBoth'])->name('updatedBoth');
    Route::post('/job-unique-check', [JobTypeController::class,'unique_check'])->name('unique-check');
    Route::post('/sub-job-unique-check', [JobTypeController::class,'sub_unique_check'])->name('sub-unique-check');
});

Route::group(['prefix'=>'induction','as'=>'induction.','middleware'=>'auth'], function(){
    Route::resource('induction', CleanerInductionController::class);
    Route::any('/check-status', [CleanerInductionController::class,'index'])->name('item-status');
    Route::post('/induction-unique-check', [CleanerInductionController::class,'unique_check'])->name('unique-check');

});
Route::group(['prefix'=>'work-order','as'=>'work-order.','middleware'=>'auth'], function(){
    Route::resource('work-order', WorkOrderController::class);
    // Route::any('/work-order-filter', [WorkOrderController::class,'workOrderFilter'])->name('work-filter');
    Route::any('/work-order-cleaner-view/{id}', [WorkOrderController::class,'work_order_view'])->name('work-order.cleaner.view');
    Route::post('/work-order-chenge-status/{id}', [WorkOrderController::class,'change_status'])->name('work-order.change.status');
    Route::post('/upload-before-after-image/{id}', [WorkOrderController::class,'uploadBeforeAfterImage'])->name('work-order.before-after-image.upload');
    Route::post('/upload-other-document/{id}', [WorkOrderController::class,'uploadOtherDoc'])->name('work-order.upload-other-doc');
    Route::post('/upload-adminstrative-document/{id}', [WorkOrderController::class,'administrativeDoc'])->name('work-order.upload-adminstrative-doc');
    Route::post('/work-order-unique-check', [WorkOrderController::class,'unique_check'])->name('unique-check');

});

Route::group(['prefix'=>'faqs','as'=>'faqs.','middleware'=>'auth'], function(){
    Route::get('/', [FaqController::class,'index'])->name('index');
    Route::post('/store', [FaqController::class,'store'])->name('store');
    Route::get('/faq/{id}', [FaqController::class, 'edit'])->name('getFaq');
    Route::post('/update',[FaqController::class, 'update'])->name('faqUpdate');
    Route::post('/faq-unique-check',[FaqController::class, 'unique_check'])->name('unique-check');
});

Route::group(['prefix'=>'incident','as'=>'incident.','middleware'=>'auth'], function(){
    Route::get('/', [IncidentController::class,'index'])->name('index');
    Route::get('/add', [IncidentController::class,'create'])->name('add');
    Route::get('/show/{id?}', [IncidentController::class,'show'])->name('show');
    Route::post('/store', [IncidentController::class,'store'])->name('store');
    Route::get('/edit/{id}', [IncidentController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',[IncidentController::class, 'update'])->name('update');
});

Route::group(['prefix'=>'ncr','as'=>'ncr.','middleware'=>'auth'], function(){
    Route::get('/', [NcrController::class,'index'])->name('index');
    Route::get('/add/{incident_id?}', [NcrController::class,'create'])->name('add');
    Route::post('/store', [NcrController::class,'store'])->name('store');
    Route::get('/show/{id?}', [NcrController::class,'show'])->name('show');
    Route::get('/edit/{id}', [NcrController::class, 'edit'])->name('edit');
    Route::post('/update/{id}',[NcrController::class, 'update'])->name('update');
    Route::post('/recommended-action', [NcrController::class,'recommendedActions'])->name('recommendedActions');
    Route::get('/show-action/{id?}', [NcrController::class,'showAction'])->name('showAction');
});

Route::group(['prefix'=>'report','as'=>'report.','middleware'=>'auth'], function(){
    Route::get('/time-attendance', [ReportController::class,'timeAttendance'])->name('time.attendance');
    Route::any('/time-attendance-view/{id}', [ReportController::class,'timeAttendance_view'])->name('time.attendance.view');
    Route::get('/invoice-runner', [ReportController::class,'invoiceRunner'])->name('invoice.runner');
    Route::any('/invoice-runner-view/{id}', [ReportController::class,'invoiceRunner_view'])->name('invoice.runner.view');
    Route::any('/kpi-qcc-qh', [ReportController::class,'kpiQccQh'])->name('kpi.qcc.qh');
    Route::any('/portfolio-site-summary', [ReportController::class,'portfolioSite'])->name('portfolio.site.summary');
    Route::any('/client-cleaners-summary', [ReportController::class,'clientCleaner'])->name('client.cleaners.summary');
});

Route::group(['prefix'=>'shift-question','as'=>'question.','middleware'=>'auth'], function(){
    Route::get('/', [ShiftQuestionController::class,'index'])->name('question.index');
    Route::get('/add', [ShiftQuestionController::class,'create'])->name('question.create');
    Route::post('/store', [ShiftQuestionController::class,'store'])->name('question.store');
    Route::get('/edit/{id}', [ShiftQuestionController::class,'edit'])->name('question.edit');
    Route::post('/update/{id}', [ShiftQuestionController::class,'update'])->name('question.update');
    Route::post('/shift-question-unique-check', [ShiftQuestionController::class,'unique_check'])->name('unique-check');
});

Route::group(['prefix'=>'templates','as'=>'template.','middleware'=>'auth'], function(){
    Route::get('/', [TemplatesController::class,'index'])->name('index');
    Route::get('/add', [TemplatesController::class,'create'])->name('create');
    Route::post('/store', [TemplatesController::class,'store'])->name('store');
    Route::get('/edit/{id}', [TemplatesController::class,'edit'])->name('edit');
    Route::post('/update/{id}', [TemplatesController::class,'update'])->name('update');
    Route::get('/get-fields', [TemplatesController::class,'getFields'])->name('getFields');
    Route::get('/add-page', [TemplatesController::class,'addPage'])->name('addPage');

    // Route::post('/update/{id}', [TemplatesController::class,'update'])->name('update');
    // Route::post('/shift-question-unique-check', [TemplatesController::class,'unique_check'])->name('unique-check');
});

Route::group(['prefix'=>'inspections','as'=>'inspections.','middleware'=>'auth'], function(){
    Route::get('/', [InspectionController::class,'index'])->name('index');
    Route::get('/add', [InspectionController::class,'create'])->name('create');
    Route::get('/view-reportd', [InspectionController::class,'viewReport'])->name('viewReport');
    Route::get('/view-history', [InspectionController::class,'viewHistory'])->name('viewHistory');
    Route::post('/store', [InspectionController::class,'store'])->name('store');
    Route::get('/edit/{id?}', [InspectionController::class,'edit'])->name('edit');
    // Route::post('/update/{id}', [TemplatesController::class,'update'])->name('update');
    // Route::post('/shift-question-unique-check', [TemplatesController::class,'unique_check'])->name('unique-check');
});

Route::group(['prefix'=>'schedules','as'=>'schedule.','middleware'=>'auth'], function(){
    Route::get('/schedule', [ScheduleController::class,'index'])->name('index');
    Route::get('/create', [ScheduleController::class,'create'])->name('create');
    Route::post('/store', [ScheduleController::class,'store'])->name('store');
    Route::post('/add/asset', [ScheduleController::class,'storeAsset'])->name('storeAsset');

});

Route::group(['prefix'=>'storage','as'=>'storage.','middleware'=>'auth'], function(){
    Route::resource('storage', ManageStorageController::class);
    Route::get('/items',[ManageItemController::class,'index'])->name('items.index');
    Route::get('/item/create',[ManageItemController::class,'create'])->name('items.create');
    Route::post('/item/store',[ManageItemController::class,'store'])->name('items.store');
    Route::get('/item/edit/{item}',[ManageItemController::class,'edit'])->name('items.edit');
    Route::post('/item/update/{item}',[ManageItemController::class,'update'])->name('items.update');
    Route::post('/item/maintenance/{item}',[ManageItemController::class,'maintenance'])->name('items.maintenance');
    Route::get('/item/show/{item}',[ManageItemController::class,'show'])->name('items.show');
    Route::post('company-unique-check', [ManageItemController::class,'itemUniqueCheck'])->name('itemUniqueCheck');
    // Route::resource('items', ManageItemController::class);

    Route::match(['get','post'],'movement', [ManageStorageController::class,'storage_movement'])->name('movement');
    Route::post('/deleteItems', [ManageStorageController::class,'deleteItems'])->name('delete.items');
    Route::any('/items', [ManageItemController::class,'itemFilter'])->name('itemFilter');

    Route::any('/add-items', [ManageItemController::class,'addItem'])->name('addItem');
    Route::any('/remove-items', [ManageItemController::class,'removeitem'])->name('removeItem');
    Route::any('/remove-test-items', [ManageItemController::class,'removeDummyItem'])->name('removeDummyItem');

    Route::any('/addmovement', [ManageItemController::class,'addMovement'])->name('addmovement');
    Route::any('/update-movement', [ManageItemController::class,'updateMovement'])->name('updateMovement');
    Route::any('/movement-finished', [ManageItemController::class,'updateMovementFinished'])->name('updateMovementFinished');
    Route::any('/get-storage-items', [ManageItemController::class,'getStorageItems'])->name('getStorageItems');
    Route::any('/add-items-html', [ManageItemController::class,'addItemsHtml'])->name('addItemsHtml');
});

Route::group(['prefix'=>'ticket','as'=>'ticket.','middleware'=>'auth'], function(){
    Route::resource('ticket', TicketController::class);
    Route::any('/ticket-view/{id}', [TicketController::class,'ticket_view'])->name('view');
    Route::post('/store-ticket', [TicketController::class,'store'])->name('store');
    Route::post('/ticket-document', [TicketController::class,'delete_document'])->name('document.delete');
    Route::post('/assign/{id}', [TicketController::class,'assign_ticket'])->name('assign');
    Route::post('/reply/{id}', [TicketController::class,'reply_ticket'])->name('reply');
    Route::post('/change/status/{id}', [TicketController::class,'change_status'])->name('change.status');
});

Route::group(['prefix' => 'ticket'], function(){
    Route::match(['get','post'],'/', [TicketController::class, 'index'])->name('admin.ticket.index');
    Route::match(['get','post'],'create',[TicketController::class, 'create'])->name('admin.ticket.create');
});

Route::group(['prefix'=>'client','as'=>'client.','middleware'=>'auth'], function(){
    Route::resource('/client', ClientController::class);
    Route::resource('/prospect', ClientProspectController::class);
    Route::post('prospect-unique-check', [ClientProspectController::class,'unique_check'])->name('prospect.unique');
    Route::resource('/portfolio', ClientPortfolioController::class);
    Route::post('/portfolio-unique-check', [ClientPortfolioController::class,'unique_check'])->name('portfolio.unique');
    
    Route::resource('/site', ManageSiteController::class);
    Route::post('/site-unique-check', [ManageSiteController::class,'unique_check'])->name('site.unique');

    // manish side
    Route::post('getContactData', [ClientPortfolioController::class, 'getContactData'])->name('getContactData');
    // end

    Route::post('add-comment',[ClientController::class,'addComment'])->name('addComment');

    Route::post('get-contact', [ClientController::class,'getContact'])->name('get-contact');
    Route::post('get-user', [ClientController::class,'getUser'])->name('get-user');
    Route::post('save-address', [ClientController::class,'saveAddress'])->name('save-address');
    Route::post('save-comment', [ClientController::class,'saveComment'])->name('save-comment');
    Route::post('delete-address', [ClientController::class,'deleteAddress'])->name('delete-address');
    Route::post('delete-comment', [ClientController::class,'deleteComment'])->name('delete-comment');
    Route::post('deactivate', [ClientController::class,'deactivate'])->name('deactivate');
});

Route::group(['prefix'=>'common','as'=>'common.','name'=>'common.','middleware'=>'auth'], function(){
    Route::post('get-contact', [ListController::class,'statusUpdate'])->name('statusUpdate');
    Route::post('add-person', [ListController::class,'addPerson'])->name('add-person');
    Route::post('get-subjob', [ListController::class,'subJob'])->name('subJob');
    Route::post('delete-record', [ListController::class,'deleteRecord'])->name('delete-record');

    Route::post('client-portfolio',[ListController::class,'clientPortfolioData'])->name('client-portfolio');
    Route::post('portfolio-site',[ListController::class,'portfolioSiteData'])->name('portfolio-site');
});


Route::group(['prefix'=>'datatable','as'=>'datatable.','name'=>'datatable.'],function(){

    Route::post('users',[UserController::class,'indexAjax'])->name('users');


});

Route::group(['prefix'=>'cron'], function(){
    Route::get('missed-clean',[MissedClenController::class,'store']);
});

Route::group(['prefix'=>'test'],function(){
    Route::get('/',[TestController::class,'index']);
    Route::post('/datatable',[TestController::class,'ajaxIndex'])->name('testDatatable');
    // dd(Artisan::call('route:list'));
    // echo $hash;
});
Route::get('routes/',function(){
    $hash = Artisan::call('route:list');
    echo $hash;
});

Route::get('links/',function(){
     Artisan::call('storage:link');
    echo "done";
});
Route::get('cron/',function(){
     Artisan::call('schedule:run');
    echo "done";
});

Route::get('dbm/',function(){
    // $hash = Artisan::call('migrate --path=/database/migrations/2023_09_22_061802_create_client_portfolios.php');
    // $hash = Artisan::call('make:model ClientPortfolio -a');
    // echo $hash;
});

// Route::get('/testmail', function() {
//     Mail::to('basant@techmavesoftware.com')->send(new ForgotPasswordMail('Test ---',['code'=>'asdasdasd']));
// });

// Route::get('qrcode', function () {
//     return QrCode::size(100)->generate('89899');;
// });

// Route::get('/mail', function () {
//     $to = 'basant@techmavesoftware.com'; // Replace with the recipient's email address
//     $subject = 'Test Subject DDDDDDDD';
//     $body = '<p>This is a test email body.</p>';

//     Mail::raw($body, function ($message) use ($to, $subject) {
//         $message->to($to)->subject($subject);
//     });
//     dd('done');
// });


Route::get('logout/', function () {
    Auth::logout();
    return view('auth.login');
})->name('logout');


Route::get('/clear',function(){

    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('clear-compiled');
    Artisan::call('config:clear');
    // Artisan::call('session:clear');
    dd('done');
});



