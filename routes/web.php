<?php

Route::group(['middleware' => ['guest']], function ()
{

    Route::get('/', 'AuthController@showLogin');

    Route::post('/', 'AuthController@doLogin');

    Route::get('login', 'AuthController@showLogin');
    Route::get('login', [ 'as' => 'login', 'uses' => 'AuthController@showLogin']);

    Route::post('login', 'AuthController@doLogin');

    Route::get('logout', 'AuthController@doLogout');

    Route::post('logout', 'AuthController@doLogout');

    Route::get('reset-password', 'AuthController@resetPassword');

    Route::post('reset-password', 'AuthController@processPasswordReset');

    Route::get('register', 'AuthController@showRegister');


});

Route::group(['middleware' => ['auth']], function ()
{

    Route::get('home', 'HomeController@index');

    Route::get('change-password', 'AuthController@changePassword');

    Route::post('change-password', 'AuthController@processPasswordChange');

    Route::get('logout', 'AuthController@doLogout');

    Route::post('logout', 'AuthController@doLogout');

    Route::get('welcome', 'AuthController@welcome');

    Route::get('not-found', 'AuthController@notFound');

    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'AuthController@dashboard']);

    Route::get('profile', ['as' => 'profile', 'uses' =>'ProfileController@show']);

    // My Routes
    Route::post('update-emp-bankdetail', ['as' => 'update-emp-bankdetail', 'uses' => 'EmpController@saveEdit_bankdetails']);
    Route::post('update-emp-personal-detail', ['as' => 'update-emp-personal-detail', 'uses' => 'EmpController@saveEdit_personal_detail']);
    
    //Routes for add-employees

    Route::get('add-employee', ['as' => 'add-employee', 'uses' => 'EmpController@addEmployee']);

    Route::post('add-employee', ['as' => 'add-employee', 'uses' => 'EmpController@processEmployee']);

    Route::get('employee-manager', ['as' => 'employee-manager', 'uses' => 'EmpController@showEmployee']);

    Route::post('employee-manager', 'EmpController@searchEmployee');

    Route::get('upload-emp', ['as' => 'upload-emp', 'uses' => 'EmpController@importFile']);

    Route::post('upload-emp', ['as' => 'upload-emp', 'uses' => 'EmpController@uploadFile']);

    Route::get('edit-emp/{id}', ['as' => 'edit-emp', 'uses' => 'EmpController@showEdit']);

    Route::post('edit-emp/{id}', ['as' => 'edit-emp', 'uses' => 'EmpController@doEdit']);

    Route::get('delete-emp/{id}', ['as' => 'delete-emp', 'uses' => 'EmpController@doDelete']);

    //Routes for Leave.

    Route::get('add-leave-type', ['as' => 'add-leave-type', 'uses' => 'LeaveController@addLeaveType']);

    Route::post('add-leave-type', ['as' => 'add-leave-type', 'uses' => 'LeaveController@processLeaveType']);

    Route::get('leave-type-listing', ['as' => 'leave-type-listing', 'uses' => 'LeaveController@showLeaveType']);

    Route::get('edit-leave-type/{id}', ['as' => 'edit-leave-type', 'uses' => 'LeaveController@showEdit']);

    Route::post('edit-leave-type/{id}', ['as' => 'edit-leave-type', 'uses' => 'LeaveController@doEdit']);

    Route::get('delete-leave-type/{id}', ['as' => 'delete-leave-type', 'uses' => 'LeaveController@doDelete']);

    Route::get('apply-leave', ['as' => 'apply-leave', 'uses' => 'LeaveController@doApply']);

    Route::post('apply-leave', ['as' => 'apply-leave', 'uses' => 'LeaveController@processApply']);

    Route::get('my-leave-list', ['as' => 'my-leave-list', 'uses' => 'LeaveController@showMyLeave']);

    Route::get('total-leave-list', ['as' => 'total-leave-list', 'uses' => 'LeaveController@showAllLeave']);

    Route::post('total-leave-list', 'LeaveController@searchLeave');

    Route::get('leave-drafting', ['as' => 'leave-drafting', 'uses' => 'LeaveController@showLeaveDraft']);

    Route::post('leave-drafting', ['as' => 'leave-drafting', 'uses' => 'LeaveController@createLeaveDraft']);

    Route::post('get-leave-count', 'LeaveController@getLeaveCount');

    Route::get('approve-leave', ['as' => 'approve-leave', 'uses' => 'LeaveController@approveLeave']);

    Route::post('approve-leave', ['as' => 'approve-leave', 'uses' => 'LeaveController@approveLeave']);

    Route::post('disapprove-leave', 'LeaveController@disapproveLeave');

    //Routes for Team.

    Route::get('add-team', ['as' => 'add-team', 'uses' => 'TeamController@addTeam']);

    Route::post('add-team', ['as' => 'add-team', 'uses' => 'TeamController@processTeam']);

    Route::get('team-listing', ['as' => 'team-listing', 'uses' => 'TeamController@showTeam']);

    Route::get('edit-team/{id}', ['as' => 'edit-team', 'uses' => 'TeamController@showEdit']);

    Route::post('edit-team/{id}', ['as' => 'edit-team', 'uses' => 'TeamController@doEdit']);

    Route::get('delete-team/{id}', ['as' => 'delete-team', 'uses' => 'TeamController@doDelete']);

    //Routes for Role.

    Route::get('add-role', ['as' => 'add-role', 'uses' => 'RoleController@addRole']);

    Route::post('add-role', ['as' => 'add-role', 'uses' => 'RoleController@processRole']);

    Route::get('role-list', ['as' => 'role-list', 'uses' => 'RoleController@showRole']);

    Route::get('edit-role/{id}', ['as' => 'edit-role', 'uses' => 'RoleController@showEdit']);

    Route::post('edit-role/{id}', ['as' => 'edit-role', 'uses' => 'RoleController@doEdit']);

    Route::get('delete-role/{id}', ['as' => 'delete-role', 'uses' => 'RoleController@doDelete']);

    //Routes for Expense.

    Route::get('add-expense', ['as' => 'add-expense', 'uses' => 'ExpenseController@addExpense']);

    Route::post('add-expense', ['as' => 'add-expense', 'uses' => 'ExpenseController@processExpense']);

    Route::get('expense-list', ['as' => 'expense-list', 'uses' => 'ExpenseController@showExpense']);

    Route::get('edit-expense/{id}', ['as' => 'edit-expense', 'uses' => 'ExpenseController@showEdit']);

    Route::post('edit-expense/{id}', ['as' => 'edit-expense', 'uses' => 'ExpenseController@doEdit']);

    Route::get('delete-expense/{id}', ['as' => 'delete-expense', 'uses' => 'ExpenseController@doDelete']);

     //Show Attendance_Emp

     Route::get('show-attendance', ['as' => 'show-attendance', 'uses' => 'EmpController@showAttendance']);  


     //Route For PayRoll
     Route::get('show-basic-salary', ['as' => 'show-basic-salary', 'uses' => 'PayrollController@show_emp_basic_salary']);
     
     Route::get('show-payroll-group-components', ['as' => 'show-payroll-group-components', 'uses' => 'PayrollController@show_payroll_group_components']);
     Route::get('add-new-payroll-group-componant', ['as' => 'add-new-payroll-group-componant', 'uses' => 'PayrollController@add_new_payroll_group_components']);
     Route::post('save-new-payroll-group-components', ['as' => 'save-new-payroll-group-components', 'uses' => 'PayrollController@save_new_payroll_group_components']);
     Route::get('edit-payroll-group-components/{id}', ['as' => 'edit-payroll-group-components', 'uses' => 'PayrollController@edit_show_one_payroll_group_components']);
     Route::post('editsave-payroll-group-components/{id}', ['as' => 'editsave-payroll-group-components', 'uses' => 'PayrollController@edit_save_show_one_payroll_group_components']);
     Route::get('delete-payroll-group-components/{id}', ['as' => 'delete-payroll-group-components', 'uses' => 'PayrollController@delete_one_payroll_group_components']);
     Route::get('show-to-generate-salary-slip', ['as' => 'show-to-generate-salary-slip', 'uses' => 'PayrollController@show_to_generate_salary_slip']);
     Route::get('generate-salary-slip-single-employee/{id}', ['as' => 'generate-salary-slip-single-employee', 'uses' => 'PayrollController@generate_salary_slip_single_employee']);
     Route::post('/salary_slip_DownloadPDF/{id}', ['as' => 'salary_slip_DownloadPDF', 'uses' => 'PayrollController@salary_slip_DownloadPDF']);

     Route::get('/salary_slip_single_emp', ['as' => 'salary_slip_single_emp', 'uses' => 'PayrollController@Download_salary_slip_single_emp']);
     Route::post('/salary_slip_single_emp_DownloadPDF/{id}', ['as' => 'salary_slip_single_emp_DownloadPDF', 'uses' => 'PayrollController@salary_slip_single_emp_DownloadPDF']);

    //Route For Announcement
    Route::get('add-announcement', ['as' => 'add-announcement', 'uses' => 'AnnouncementController@addAnnouncement']);
    Route::post('add-announcement', ['as' => 'add-announcement', 'uses' => 'AnnouncementController@processAnnouncement']);
    Route::get('announcement-list', ['as' => 'announcement-list', 'uses' => 'AnnouncementController@showAnnouncement']);
    Route::get('edit-announcement/{id}', ['as' => 'edit-announcement', 'uses' => 'AnnouncementController@showEdit']);
    Route::post('edit-announcement/{id}', ['as' => 'edit-announcement', 'uses' => 'AnnouncementController@doEdit']);
    Route::get('delete-announcement/{id}', ['as' => 'delete-announcement', 'uses' => 'AnnouncementController@doDelete']);

     //Route For Notification 
     Route::get('add-notification', ['as' => 'add-notification', 'uses' => 'NotificationController@addNotification']);
     Route::post('add-notification', ['as' => 'add-notification', 'uses' => 'NotificationController@processNotification']);
     Route::get('notification-list', ['as' => 'notification-list', 'uses' => 'NotificationController@showNotification']);
     Route::get('edit-notification/{id}', ['as' => 'edit-notification', 'uses' => 'NotificationController@showEdit']);
     Route::post('edit-notification/{id}', ['as' => 'edit-notification', 'uses' => 'NotificationController@doEdit']);
     Route::get('delete-notification/{id}', ['as' => 'delete-notification', 'uses' => 'NotificationController@doDelete']);

     //Route For GoodThoughts 
     Route::get('add-goodthoughts', ['as' => 'add-goodthoughts', 'uses' => 'GoodThoughtsController@addGoodThoughts']);
     Route::post('add-goodthoughts', ['as' => 'add-goodthoughts', 'uses' => 'GoodThoughtsController@processGoodThoughts']);
     Route::get('goodthoughts-list', ['as' => 'goodthoughts-list', 'uses' => 'GoodThoughtsController@showGoodThoughts']);
     Route::get('edit-goodthoughts/{id}', ['as' => 'edit-goodthoughts', 'uses' => 'GoodThoughtsController@showEdit']);
     Route::post('edit-goodthoughts/{id}', ['as' => 'edit-goodthoughts', 'uses' => 'GoodThoughtsController@doEdit']);
     Route::get('delete-goodthoughts/{id}', ['as' => 'delete-goodthoughts', 'uses' => 'GoodThoughtsController@doDelete']);

     //Route For Calander
     Route::get('get-all-events', ['as' => 'get-all-events', 'uses' => 'CalanderEventsController@get_all_events']);
     Route::get('create-events', ['as' => 'create-events', 'uses' => 'CalanderEventsController@create_events']);
     Route::post('store-events', ['as' => 'store-events', 'uses' => 'CalanderEventsController@store_events']);
     Route::post('update-events', ['as' => 'update-events', 'uses' => 'CalanderEventsController@update_events']);
});

 Route::group(['middleware' => 'whitelist:group1'], function() {

  //Attendance

  Route::get('mark-attendance', ['as' => 'mark-attendance', 'uses' => 'EmpController@markAttendance']);
  Route::post('mark-attendance_in', ['as' => 'mark-attendance_in', 'uses' => 'EmpController@processAttendance_in']);
  Route::post('mark-attendance_out', ['as' => 'mark-attendance_out', 'uses' => 'EmpController@processAttendance_out']);
});
