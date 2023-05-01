<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['index'] = 'home_controller/index1';
$route['login'] = 'home_controller/login';
$route['login_check'] = 'home_controller/login_check';
$route['logout'] = 'home_controller/logout';
$route['registration'] = 'home_controller/registration';
$route['registration_add'] = 'home_controller/registration_add';
$route['contact'] = 'home_controller/contact';
$route['send_message'] = 'home_controller/send_message';
$route['send_message1'] = 'home_controller/send_message1';
$route['about_us'] = 'home_controller/about_us';
$route['schedule'] = 'home_controller/schedule';
$route['default_controller'] = 'welcome';

//mail id check already in or not
$route['mail_check'] = 'Admin_controller/mail_check';
//mail id check already in or not


//admim start
$route['admin_home'] = 'Admin_controller/admin_home';
$route['plans'] = 'Admin_controller/plans';
$route['add_plans'] = 'Admin_controller/add_plans';
$route['edit_plan/(\d+)'] = 'Admin_controller/edit_plan/$i';
$route['update_plan/(\d+)'] = 'Admin_controller/update_plan/$i';
$route['upd_status/(:any)/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'Admin_controller/upd_status/$i/$j/$k/$l/$m/$n';

//batch
$route['batch'] = 'Admin_controller/batch';
$route['add_batch'] = 'Admin_controller/add_batch';
$route['edit_batch/(\d+)'] = 'Admin_controller/edit_batch/$i';
$route['update_batch/(\d+)'] = 'Admin_controller/update_batch/$i';


//member
$route['member'] = 'Admin_controller/member';
$route['add_member'] = 'Admin_controller/add_member';
$route['edit_member/(:any)/(:any)'] = 'Admin_controller/edit_member/$i/$j';
$route['update_member/(\d+)'] = 'Admin_controller/update_member/$i';

//payments
$route['payment'] = 'Admin_controller/payment';
$route['add_payment'] = 'Admin_controller/add_payment';
$route['member_detail'] = 'Admin_controller/member_detail';
$route['edit_payment/(:any)/(:any)'] = 'Admin_controller/edit_payment/$i/$j';
$route['payment_update/(:any)/(:any)'] = 'Admin_controller/payment_update/$i/$j';

//profile
$route['profile'] = 'Admin_controller/profile';
$route['update_profile'] = 'Admin_controller/update_profile';
$route['queries'] = 'Admin_controller/queries';
$route['reply_ticket/(:any)'] = 'Admin_controller/reply_ticket/$i';
$route['reply_ticket_up'] = 'Admin_controller/reply_ticket_up';
$route['queries_replyed'] = 'Admin_controller/queries_replyed';
$route['issue_coments'] = 'Admin_controller/issue_coments';
$route['update_issue_coments/(:any)'] = 'Admin_controller/update_issue_coments/$i';
$route['update_issue_coments1/(:any)'] = 'Admin_controller/update_issue_coments1/$i';
$route['add_issue_coments'] = 'Admin_controller/add_issue_coments';
$route['trainer'] = 'Admin_controller/trainer';
$route['add_trainer'] = 'Admin_controller/add_trainer';
$route['edit_trainer/(:any)'] = 'Admin_controller/edit_trainer/$i';
$route['update_trainer/(:any)'] = 'Admin_controller/update_trainer/$i';
$route['assign_trainer'] = 'Admin_controller/assign_trainer';
$route['add_assign_trainer'] = 'Admin_controller/add_assign_trainer';
$route['edit_assign_trainer/(:any)'] = 'Admin_controller/edit_assign_trainer/$i';
$route['update_assign_trainer/(:any)'] = 'Admin_controller/update_assign_trainer/$i';
$route['equipment'] = 'Admin_controller/equipment';
$route['add_equipment'] = 'Admin_controller/add_equipment';
$route['edit_equipment/(:any)'] = 'Admin_controller/edit_equipment/$i';
$route['update_equipment/(:any)'] = 'Admin_controller/update_equipment/$i';
$route['unreg_query'] = 'Admin_controller/unreg_query';
$route['reply_unregquery/(:any)'] = 'Admin_controller/reply_unregquery/$i';
$route['reply_query_up'] = 'Admin_controller/reply_query_up';
$route['unreg_query_com'] = 'Admin_controller/unreg_query_com';
$route['raise_mail'] = 'Admin_controller/raise_mail';
$route['diet_plan'] = 'Admin_controller/diet_plan';
$route['add_deit'] = 'Admin_controller/add_deit';
$route['deitp_update'] = 'Admin_controller/deitp_update';
$route['deitp_add'] = 'Admin_controller/deitp_add';
$route['View_chat'] = 'Admin_controller/View_chat';
$route['msg_update'] = 'Admin_controller/msg_update';
$route['reply_msg/(:any)'] = 'Admin_controller/reply_msg/$i';
$route['edit_diet/(:any)'] = 'Admin_controller/edit_diet/$i';
$route['send_mail/(:any)'] = 'Admin_controller/send_mail/$i';
$route['raise_mail_confirm/(:any)'] = 'Admin_controller/raise_mail_confirm/$i';
$route['send_invoice/(:any)'] = 'Admin_controller/send_invoice/$i';
$route['raise_invoice/(:any)'] = 'Admin_controller/raise_invoice/$i';
//admim end

//member start
$route['member_home'] = 'Member_controller/member_home';
$route['update_profile_m'] = 'Member_controller/update_profile_m';
$route['member_payment'] = 'Member_controller/member_payment';
$route['member_ticket'] = 'Member_controller/member_ticket';
$route['add_tickets'] = 'Member_controller/add_tickets';
$route['mem_home'] = 'Member_controller/mem_home';
//member start end
$route['batch_new/(:any)'] = 'Admin_controller/batch_new/$i';
$route['send_mail_sep/(:any)'] = 'Admin_controller/send_mail_sep/$i';
$route['edit_workout/(:any)'] = 'Admin_controller/edit_workout/$i';

$route['send_sep'] = 'Admin_controller/send_sep';
$route['send_sep_mail'] = 'Admin_controller/send_sep_mail';
$route['raise_mail_sep'] = 'Admin_controller/raise_mail_sep';
$route['workouts'] = 'Admin_controller/workouts';
$route['add_workout'] = 'Admin_controller/add_workout';
$route['workout_add'] = 'Admin_controller/workout_add';
$route['workout_update'] = 'Admin_controller/workout_update';

$route['raise_mail_sep'] = 'Member_controller/raise_mail_sep';
$route['send_sep_mem'] = 'Member_controller/send_sep_mem';
$route['workout_view'] = 'Member_controller/workout_view';
$route['view_workouts_sep/(:any)'] = 'Member_controller/view_workouts_sep/$i';
$route['view_foods/(:any)'] = 'Member_controller/view_foods/$i';
$route['update_details'] = 'Member_controller/update_details';
$route['update_details_add'] = 'Member_controller/update_details_add';
$route['health_check'] = 'Member_controller/health_check';
$route['add_health_checkup'] = 'Member_controller/add_health_checkup';
$route['add_health_chup'] = 'Member_controller/add_health_chup';
$route['chat'] = 'Member_controller/chat'; 
$route['find_msg'] = 'Member_controller/find_msg';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
