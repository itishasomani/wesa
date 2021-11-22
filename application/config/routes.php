<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['admin'] = "admin/dashboard";
$route['employee'] = "employee/dashboard";
// $route['employee'] = "employee/login";
// $route['employee/login'] = "employee/login/login";

$route['login'] = "login";
$route['login/do-login'] = "login/do_login";

/*Reset Password*/
$route['reset-password'] = 'login/forgot_password';
$route['reset-password'] = 'login/reset_password_view';
$route['admin/log'] = 'admin/log';

$route['admin/numberd_vacation'] = "admin/Numberd_vacation";
$route['admin/vacation_form'] = "admin/Numberd_vacation/vacation_form";
$route['admin/vacation_save'] = "admin/Numberd_vacation/vacation_save" ;
/*leavemanagement */
$route['admin/leave-management'] = "admin/leave_management";
$route['admin/add_leave_management'] = "admin/leave_management/add_leave_management";
$route['admin/add-leave-management'] = "admin/leave_management/save_leave_management";
$route['admin/fetch_name']="admin/leave_management/fetch_name";
$route['admin/leave-management-edit'] = "admin/leave_management/leave_management_edit";
$route['admin/leave-edit'] = "admin/leave_management/leave_edit";
$route['admin/show_leave_details'] = "admin/leave_management/show_leave_details";
$route['admin/approve_request'] = "admin/leave_management/approve_request";
$route['admin/status'] = "admin/leave_management/status";
$route['admin/my_leave_management'] = "admin/leave_management/my_leave_management";
$route['admin/approve_hr_request'] = "admin/leave_management/approve_hr_request";
$route['admin/approve_manager_request'] = "admin/leave_management/approve_manager_request";
$route['admin/add_comment'] = "admin/dashboard/add_comment";
$route['admin/add'] = "admin/dashboard/add";
$route['admin/main'] = "admin/dashboard/main";
/*emplaoyee */
$route['admin/employee'] = "admin/employee";
$route['admin/add-employee'] = "admin/employee/add_employee";
$route['admin/add_employee'] = "admin/employee/save_employee";
$route['admin/employee-edit'] = "admin/employee/employee_edit";

/*procurement */
$route['admin/procurement'] = "admin/procurement";
$route['admin/view-all-request'] = "admin/procurement/view_all_request";
$route['admin/add_procurement'] = "admin/procurement/add_procurement";
$route['admin/procurement_edit'] = "admin/procurement/procurement_edit";
$route['admin/show_procurement'] = "admin/procurement/show_procurement";
$route['admin/procurement_request'] = "admin/procurement/procurement_request";
$route['admin/approve_procurement_edit'] = "admin/procurement/approve_procurement_edit";
$route['admin/all_request'] = "admin/procurement/all_request";
$route['admin/procurement_manage'] = "admin/procurement/procurement_manage";
$route['admin/advisor_request'] = "admin/procurement/advisor_request";
$route['admin/procurement_manager_request'] = "admin/procurement/procurement_manager_request";
$route['admin/advisor'] = "admin/procurement/advisor";
$route['admin/hr_approver'] = "admin/procurement/hr_approver";
/*assets */
$route['admin/assets'] = "admin/assets";
$route['admin/add_assets'] = "admin/assets/add_assets";
$route['admin/my_assets'] = "admin/assets/my_assets";
$route['admin/view_my_assets'] = "admin/assets/view_my_assets";
$route['admin/edit_assets'] = "admin/assets/edit_assets";
$route['admin/hr_assets'] = "admin/assets/hr_assets";
/*profile */
$route['admin/change-password'] = "admin/profile";
$route['admin/password-change'] = "admin/profile/password_change";

/*Project  */
$route['admin/project'] = "admin/project";
$route['admin/add-project'] = "admin/project/add_project";
$route['admin/add_project'] = "admin/project/save_project";
$route['admin/project-edit'] = "admin/project/project_edit";

/*Budget */
$route['admin/budget'] = "admin/budget";
$route['admin/add_budget'] = "admin/budget/add_budget";
$route['admin/save_budget'] = "admin/budget/save_budget";
$route['admin/approve_budget'] = "admin/budget/approve_budget";

/*supply*/
$route['admin/supply'] = "admin/supply";
$route['admin/add_supply'] = "admin/supply/add_supply";
$route['admin/save_supply'] = "admin/supply/save_supply";
$route['admin/update_supply'] = "admin/supply/update_supply";
/* Employee ******************************************************* */

/*LeaveManagement */
$route['employee/leave_management'] = "employee/leave_management";
$route['employee/add_leave_management'] = "employee/leave_management/add_leave_management";
$route['employee/add-leave-management'] = "employee/leave_management/save_leave_management";
$route['employee/fetch_name']="employee/leave_management/fetch_name";
$route['employee/leave-management-edit'] = "employee/leave_management/leave_management_edit";
$route['employee/show_leave_details'] = "employee/leave_management/show_leave_details";
$route['employee/approve_request'] = "employee/leave_management/approve_request";

/*Assets */
$route['employee/assets'] = "employee/assets";
$route['employee/add_assets'] = "employee/assets/add_assets";
$route['employee/view_my_assets'] = "employee/assets/view_my_assets";
$route['employee/edit_assets'] = "employee/assets/edit_assets";
$route['employee/my_assets'] = "employee/assets/my_assets";

/*procurement */
$route['employee/procurement'] = "employee/procurement";
$route['employee/add_procurement'] = "employee/procurement/add_procurement";
$route['employee/procurement_add'] = "employee/procurement/procurement_add";
$route['employee/procurement_edit'] = "employee/procurement/procurement_edit";
$route['employee/approve_procurement'] = "employee/procurement/approve_procurement";

/*profile */
$route['employee/change-password'] = "employee/profile";
$route['employee/password-change'] = "employee/profile/password_change";
