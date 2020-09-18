<?php
//login
Route::group(['namespace'=>'Admin', 'prefix'=>'admin'],function(){

  Route::get('/', 'LoginController@login')->name('login');
  Route::post('/checklogin', 'LoginController@checkAdminLogin')->name('check-admin-login');
 });
 
      Route::group(['namespace'=>'Admin','middleware'=>'per', 'prefix'=>'admin'],function(){
      //Meenu
	
      /// for home
      Route::get('index', 'HomeController@adminIndex')->name('admin-index');
	  
     
	  
	  //startup
	  Route::get('startup/registered','startupController@registered')->name('registered');
      Route::get('startup/issue_in_verification','startupController@issue_verification')->name('issue_in_verification'); 
      Route::get('startup/verification_success','startupController@verification_success')->name('verification_success');
      Route::get('startup/product_added','startupController@product_added')->name('product_added');
	  Route::get('startup/view/{id}','startupController@ViewProduct')->name('view-startup-admin');
      Route::get('startup/reject/{id}','startupController@reject')->name('reject');
      Route::get('startup/accept/{id}','startupController@accept')->name('accept');
	  
      //adminproduct
       Route::get('product/pending','product1Controller@pendingproduct')->name('admin_pending_product');
      Route::get('product/approved','product1Controller@approvedproduct')->name('admin_approved_product'); 
      Route::get('product/view/{id}','product1Controller@ViewProduct')->name('view-product_admin');
      Route::get('product/reject/{id}','product1Controller@rejectproduct')->name('reject-product');
      Route::get('product/accept/{id}','product1Controller@acceptproduct')->name('accept-product');
      
     //for admin profile
     Route::get('profile', 'ProfileController@adminProfile')->name('admin-profile');
     Route::get('admin/edit/{id}','ProfileController@Editadmin')->name('edit-admin');
     Route::post('update/profile/{id}','ProfileController@adminUpdateProfile')->name('update-admin');
     Route::get('password','ProfileController@adminChangePass')->name('change_pass');
     Route::post('password/change/{id}','ProfileController@adminChangePassword')->name('admin-change-pass');
     Route::get('logout','ProfileController@adminLogout')->name('admin-logout');
 //city 
      Route::get('city','CityController@city')->name('city');
      Route::get('city/add','CityController@Addcity')->name('addcity');
      Route::post('city/add/insert','CityController@AddInsertcity')->name('insert-city');
      Route::get('city/edit/{id}','CityController@Editcity')->name('edit-city');
      Route::post('city/update/{id}','CityController@Updatecity')->name('update-city');
      Route::get('city/delete/{id}','CityController@Deletecity')->name('delete-city');
      
      
//logo 
      Route::get('logo/edit','logoController@Editlogo')->name('edit-logo');
      Route::post('logo/update','logoController@Updatelogo')->name('update-logo');
      
  
 // for cityadmin
     Route::get('cityadmin','cityadminController@cityadmin')->name('cityadmin');
     Route::get('cityadmin/add','cityadminController@Addcityadmin')->name('add-cityadmin');
     Route::post('cityadmin/add/new','cityadminController@AddNewcityadmin')->name('AddNewcityadmin');
     Route::get('cityadmin/edit/{id}','cityadminController@Editcityadmin')->name('edit-cityadmin');
     Route::post('cityadmin/update/{id}','cityadminController@Updatecityadmin')->name('update-cityadmin');
     Route::get('cityadmin/delete/{id}','cityadminController@deletecityadmin')->name('delete-cityadmin');
     Route::get('secretlogin/{id}','cityadminController@secretlogin')->name('secret-login');
     
     // for Member Plan
     Route::get('all_plan','Membership_plan@all_plan')->name('all_plan');
     Route::get('add_plan','Membership_plan@AddPlan')->name('add_plan');
     Route::post('insert_plan','Membership_plan@InsertPlan')->name('InsertPlan');
     Route::get('edit_plan/{id}','Membership_plan@EditPlan')->name('EditPlan');
     Route::post('update_plan/{plan_id}','Membership_plan@UpdatePlan')->name('UpdatePlan');
     Route::get('delete_paln/{id}','Membership_plan@DeletePaln')->name('DeletePaln');
     
     
     // for User Management
     Route::get('users','UsermanageContoller@allusers')->name('alluser');
     Route::get('users/edit/{id}','UsermanageContoller@edituser')->name('edit-users');
     Route::post('users/update/{id}','UsermanageContoller@Updateuser')->name('update-users');
     Route::get('users/delete/{id}','cityadminController@deletecityadmin')->name('delete-cityadmin');

 // for wallet_credits
     Route::get('wallet_credits','WalletController@wallet_credits')->name('wallet_credits');
     Route::get('wallet_credits/edit/{id}','WalletController@Editwallet_credits')->name('edit-wallet_credits');
     Route::post('wallet_credits/update/{id}','WalletController@Updatewallet_credits')->name('update-wallet_credits');  
 //currency 
      Route::get('currency','currencyController@currency')->name('currency');
      Route::get('currency/edit/{id}','currencyController@Editcurrency')->name('edit-currency');
      Route::post('currency/update/{id}','currencyController@Updatecurrency')->name('update-currency');
      
   
 //delivery_timing 
      Route::get('delivery_timing','delivery_timingController@delivery_timing')->name('delivery_timing');
      Route::get('delivery_timing/edit/{id}','delivery_timingController@Editdelivery_timing')->name('edit-delivery_timing');
      Route::post('delivery_timing/update/{id}','delivery_timingController@Updatedelivery_timing')->name('update-delivery_timing');   
   
      
 //for manage spldays
       Route::get('spldays','spldaysController@spldays')->name('spldays');
       Route::get('spldays/add','spldaysController@adminAddspldays')->name('adminAddspldays');
	   Route::post('spldays/add/new','spldaysController@adminAddNewspldays')->name('adminAddNewspldays');
	   Route::get('spldays/edit/{spldays_id}','spldaysController@adminEditspldays')->name('adminEditspldays');
 	   Route::post('spldays/update/{spldays_id}','spldaysController@adminUpdatespldays')->name('adminUpdatespldays');
 	   Route::get('spldays/delete/{spldays_id}','spldaysController@adminDeletespldays')->name('adminDeletespldays'); 
 
   //for manage plans
       Route::get('plan','PlanController@plan')->name('plan');
       Route::get('plan/add','PlanController@adminAddplan')->name('adminAddplan');
	   Route::post('plan/add/new','PlanController@adminAddNewplan')->name('adminAddNewplan');
	   Route::get('plan/edit/{plan_id}','PlanController@adminEditplan')->name('adminEditplan');
 	   Route::post('plan/update/{plan_id}','PlanController@adminUpdateplan')->name('adminUpdateplan');
 	   Route::get('plan/delete/{plan_id}','PlanController@adminDeleteplan')->name('adminDeleteplan');
 	   
 	   
  //for manage Complain
       Route::get('complain','complainController@complain')->name('complain');
       Route::get('complain/add','complainController@adminAddcomplain')->name('adminAddcomplain');
	   Route::post('complain/add/new','complainController@adminAddNewcomplain')->name('adminAddNewcomplain');
	   Route::get('complain/edit/{complain_id}','complainController@adminEditcomplain')->name('adminEditcomplain');
 	   Route::post('complain/update/{complain_id}','complainController@adminUpdatecomplain')->name('adminUpdatecomplain');
 	   Route::get('complain/delete/{complain_id}','complainController@adminDeletecomplain')->name('adminDeletecomplain');	   	   
    
    
    
    //for manage faq
       Route::get('faq','faqController@faq')->name('faq');
       Route::get('faq/add','faqController@adminAddfaq')->name('adminAddfaq');
	   Route::post('faq/add/new','faqController@adminAddNewfaq')->name('adminAddNewfaq');
	   Route::get('faq/edit/{faq_id}','faqController@adminEditfaq')->name('adminEditfaq');
 	   Route::post('faq/update/{faq_id}','faqController@adminUpdatefaq')->name('adminUpdatefaq');
 	   Route::get('faq/delete/{faq_id}','faqController@adminDeletefaq')->name('adminDeletefaq');
    
    
  //for manage cancel_reason
       Route::get('cancel_reason','cancel_reasonController@cancel_reason')->name('cancel_reason');
       Route::get('cancel_reason/add','cancel_reasonController@adminAddcancel_reason')->name('adminAddcancel_reason');
	   Route::post('cancel_reason/add/new','cancel_reasonController@adminAddNewcancel_reason')->name('adminAddNewcancel_reason');
	   Route::get('cancel_reason/edit/{reason_id}','cancel_reasonController@adminEditcancel_reason')->name('adminEditcancel_reason');
 	   Route::post('cancel_reason/update/{reason_id}','cancel_reasonController@adminUpdatecancel_reason')->name('adminUpdatecancel_reason');
 	   Route::get('cancel_reason/delete/{reason_id}','cancel_reasonController@adminDeletecancel_reason')->name('adminDeletecancel_reason');	   	      
    
    
    
   //for notification
   Route::post('spldaynotification', 'spldaynotificationController@splnotification');
         
//for admob

      // Route::get('admob','AdmobController@admob')->name('admob');
      // Route::get('admob/add','AdmobController@Addadmob')->name('addadmob');
      // Route::post('admob/add/insert','AdmobController@AddInsertadmob')->name('insert-admob');
      // Route::get('admob/edit/{id}','AdmobController@Editadmob')->name('edit-admob');
      // Route::post('admob/update/{id}','AdmobController@Updateadmob')->name('update-admob');
      // Route::get('admob/delete/{id}','AdmobController@Deleteadmob')->name('delete-admob'); 
 
 

     Route::post('store/add/insert','StoreController@AddInsertStore')->name('adminAddNewStore');
     Route::get('store/edit/{store_id}','StoreController@EditStore')->name('edit-store');
     Route::post('store/update/{store_id}','StoreController@Updatestore')->name('update-store');
     Route::get('store/delete/{store_id}','StoreController@Deletestore')->name('delete-store');
     
    //for user
	Route::get('user','UserController@adminUser')->name('user'); 
	Route::get('user/add','UserController@adminAddUser')->name('addUser');
	Route::post('user/add/insert','UserController@adminAddUserNew')->name('AddUserNew');
	Route::get('user/edit/{user_id}','UserController@EditUser')->name('edit-user');
	Route::post('user/update/{user_id}','UserController@UpdateEdit')->name('update-user');
    Route::get('user/delete/{user_id}','UserController@adminDeleteUser')->name('delete-banner');
    
    
    // for first wallet recharge deal
         Route::get('deal','dealController@deal')->name('deal');
         Route::get('deal/add','dealController@Adddeal')->name('add-deal');
         Route::post('deal/add/new','dealController@AddNewdeal')->name('AddNewdeal');
         Route::get('deal/edit/{id}','dealController@Editdeal')->name('edit-deal');
         Route::post('deal/update/{id}','dealController@Updatedeal')->name('update-deal');
         Route::get('deal/delete/{id}','dealController@deletedeal')->name('delete-deal');
         
         
         
     //for manage paymentvia
      Route::get('paymentvia','paymentviaController@paymentvia')->name('paymentvia');
      Route::get('paymentvia/add','paymentviaController@adminAddpaymentvia')->name('adminAddpaymentvia');
	  Route::post('paymentvia/add/new','paymentviaController@adminAddNewpaymentvia')->name('adminAddNewpaymentvia');
	  Route::get('paymentvia/edit/{paymentvia_id}','paymentviaController@adminEditpaymentvia')->name('adminEditpaymentvia');
 	  Route::post('paymentvia/update/{paymentvia_id}','paymentviaController@adminUpdatepaymentvia')->name('adminUpdatepaymentvia');
 	  Route::get('paymentvia/delete/{paymentvia_id}','paymentviaController@adminDeletepaymentvia')->name('adminDeletepaymentvia');     
 	   
    //sms api
     Route::get('edit_sms_api', 'sms_apiController@edit_sms_api')->name('edit_sms_api');
	 Route::post('update_sms_api', 'sms_apiController@update_sms_api')->name('update_sms_api');
	 
	 //FCM key
	 Route::get('edit_fcm_api', 'Fcm_Controller@edit_fcm_api')->name('edit_fcm_api');
	 Route::post('update_fcm_api', 'Fcm_Controller@update_fcm_api')->name('update_fcm');
    
    //for notification
    Route::get('send_notification', 'notificationController@notification1')->name('notification1');
    Route::post('send_notificationstep2', 'notificationController@notification2')->name('notification2');
    
	});

	
	
/////////////////////////////////////////////////	
/////////////for city admin//////////////////////
////////////////////////////////////////////////
Route::group(['namespace'=>'Cityadmin', 'prefix'=>'startup'],function(){	
	Route::get('/', 'LoginController@cityadminlogin')->name('cityadminlogin');
    Route::post('/checklogin', 'LoginController@checkcityadminLogin')->name('checkcityadmin-login');
    Route::post('/mobileotp_check', 'LoginController@mobileotpcheck');
    Route::post('/mobileotpsend', 'LoginController@mobileotpsend');
  
});
      Route::group(['namespace'=>'Cityadmin', 'prefix'=>'startup'],function(){	
    /// for cityadmin home
      Route::get('index', 'HomeController@cityadminIndex')->name('cityadmin-index');
	  Route::post('status/{id}','HomeController@changestatus')->name('status-change');
	  //for cityadmin profile
     Route::get('profile', 'cityadminProfileController@cityadminProfile')->name('cityadmin-profile');
     Route::get('cityadmin/edit','cityadminProfileController@Editcityadmin')->name('edit-cityadmin');
     Route::post('update/profile','cityadminProfileController@cityadminUpdateProfile')->name('update-cityadmin');
     Route::get('password','cityadminProfileController@cityadminChangePass')->name('change_pass_c');
     Route::post('password/change/{id}','cityadminProfileController@cityadminChangePassword')->name('cityadmin-change-pass');
      //cityadmin logout
	 Route::get('logout','cityadminProfileController@cityadminLogout')->name('cityadmin-logout');
	 
	

   //for manage category
      Route::get('category','CategoryController@category')->name('category');
      Route::get('category/add','CategoryController@cityadminAddCategory')->name('cityadminAddCategory');
	  Route::post('category/add/new','CategoryController@cityadminAddNewCategory')->name('cityadminAddNewCategory');
	  Route::get('category/edit/{category_id}','CategoryController@cityadminEditCategory')->name('cityadminEditCategory');
 	  Route::post('category/update/{category_id}','CategoryController@cityadminUpdateCategory')->name('cityadminUpdateCategory');
 	  Route::get('category/delete/{category_id}','CategoryController@cityadminDeleteCategory')->name('cityadminDeleteCategory');
 	  
 	  // homecate 
 	    Route::get('home-category','HomecateController@allhomecate')->name('homecate');
 	    Route::get('home-category/add','HomecateController@AddCategory')->name('AddHomeCategory');
 	    Route::post('home-category/insert','HomecateController@InsertCategory')->name('InsertHomeCategory');
 	    Route::get('home-category/edit/{id}','HomecateController@EditCategory')->name('HomecateEditCategory');
 	    Route::post('home-category/update/{id}','HomecateController@UpdateCategory')->name('UpdateHomeCategory');
 	    Route::get('home-category/delete/{id}','HomecateController@DeleteCategory')->name('HomecateDeleteCategory');
 	    
 	 
 	  
        Route::get('assign-home-category/{id}','AssignHomecateController@assignhomecat')->name('AssignHomeCategory');
        Route::post('assign-home-category/insert','AssignHomecateController@InsertAssignHomeCat')->name('InsertAssignHomeCategory');
 	    Route::get('assign-home-category/delete/{id}','AssignHomecateController@DeleteAssignhomecat')->name('DeleteAssignHomeCategory');
 	    
         //registration
		 Route::get('registration','registrationCityController@registrationcityadmin')->name('registration-cityadmin');
         Route::post('registration/fill','registrationCityController@fillcityregistration')->name('fill-startup');
         Route::post('registration/saveajax','registrationCityController@saveregistration');
         Route::get('regsuccess','registrationCityController@regsucess')->name('regsucess');

 	  
      
      
 	     // for product
         Route::get('product','productController@product')->name('product-cityadmin');
         Route::get('product/add','productController@Addproduct')->name('add-product');
         Route::post('product/add/new','productController@AddNewproduct')->name('AddNewproduct');
		 Route::get('product/sendemail','productController@send_email');
         Route::get('product/edit/{id}','productController@Editproduct')->name('edit-product');
         Route::post('product/update/{id}','productController@Updateproduct')->name('update-product');
         Route::get('product/delete/{id}','productController@deleteproduct')->name('delete-product');
         Route::get('product/view/{id}','productController@ViewProduct')->name('view-product');
		 Route::get('product/deletetectspech/{id}','productController@deletetechspech')->name('deletetechspech'); 
         
         // for subcat
         Route::get('subcat','subcatController@subcat')->name('subcat');
         Route::get('subcat/add','subcatController@Addsubcat')->name('add-subcat');
         Route::post('subcat/add/new','subcatController@AddNewsubcat')->name('AddNewsubcat');
         Route::get('subcat/edit/{id}','subcatController@Editsubcat')->name('edit-subcat');
         Route::post('subcat/update/{id}','subcatController@Updatesubcat')->name('update-subcat');
         Route::get('subcat/delete/{id}','subcatController@deletesubcat')->name('delete-subcat');
         
         // for area
         Route::get('area','areaController@area')->name('area');
		 Route::get('sendbasicemail','areaController@basic_email');
         Route::get('area/add','areaController@Addarea')->name('add-area');
         Route::post('area/add/new','areaController@AddInsertarea')->name('AddNewarea');
         Route::get('area/edit/{id}','areaController@Editarea')->name('edit-area');
         Route::post('area/update/{id}','areaController@Updatearea')->name('update-area');
         Route::get('area/delete/{id}','areaController@deletearea')->name('delete-area');
         
          // for banner
         Route::get('banner','bannerController@banner')->name('banner');
         Route::get('banner/add','bannerController@Addbanner')->name('add-banner');
         Route::post('banner/add/new','bannerController@AddNewbanner')->name('AddNewbanner');
         Route::get('banner/edit/{id}','bannerController@Editbanner')->name('edit-banner');
         Route::post('banner/update/{id}','bannerController@Updatebanner')->name('update-banner');
         Route::get('banner/delete/{id}','bannerController@deletebanner')->name('delete-banner');
         
          // for delivery_boy
         Route::get('delivery_boy','delivery_boyController@delivery_boy')->name('delivery_boy');
         Route::get('delivery_boy/add','delivery_boyController@Adddelivery_boy')->name('add-delivery_boy');
         Route::post('delivery_boy/add/new','delivery_boyController@AddNewdelivery_boy')->name('AddNewdelivery_boy');
         Route::get('delivery_boy/edit/{id}','delivery_boyController@Editdelivery_boy')->name('edit-delivery_boy');
         Route::post('delivery_boy/update/{id}','delivery_boyController@Updatedelivery_boy')->name('update-delivery_boy');
         Route::get('delivery_boy/delete/{id}','delivery_boyController@deletedelivery_boy')->name('delete-delivery_boy');
         Route::get('confirm_delivery_status/{id}/{status}', 'delivery_boyController@confirmdeliverystatus')->name('confirm.delivery.status');
         
        /// for bulk upload
        Route::post('bulk_upload', 'ImportExcelController@import')->name('bulk_upload');
        
        
        //order management
        Route::get('today_orders', 'OrderController@today_orders')->name('today_orders');
        Route::get('next_day_orders', 'OrderController@next_day_orders')->name('next_day_orders');
        Route::get('completed', 'OrderController@completed')->name('completed');
        Route::get('incentive', 'incentiveController@incentive')->name('incentive');
        //Route::post('today_orders', 'OrderController@today_orders')->name('incentive');
	    Route::post('assigned', 'OrderController@assigned')->name('assigned');
	    Route::post('paid', 'incentiveController@pay')->name('paid');
	    Route::get('edit_incentive_amount', 'incentiveController@edit_incentive_amount')->name('edit_incentive_amount');
	    Route::post('update_incentive_amount', 'incentiveController@update_incentive_amount')->name('update_incentive_amount');
	    
	    
	   //dispatch panel
	   
	     Route::get('dispatch_panel', 'dispatchController@dispatch_panel')->name('dispatch_panel');
	     Route::post('assignedcashrequest', 'dispatchController@assignedcashrequest')->name('assignedcashrequest');
	      
	      
	     Route::get('financial_report', 'inventoryController@inventory')->name('inventory');
	     Route::post('paycustomer', 'inventoryController@paycustomer')->name('paycustomer');
	    
	    Route::get('import-export-csv-excel',array('as'=>'excel.import','uses'=>'FileController@importExportExcelORCSV'));
        Route::post('import-csv-excel',array('as'=>'import-csv-excel','uses'=>'FileController@importFileIntoDB'));
       
        //notification to delivery boy from dispatch panel
        
        Route::post('send_notificationtodboy', 'notificationController@notification2')->name('notificationtodeliveryboy');
        
       //for notification
       Route::get('send_notification', 'notiController@notification1')->name('notificationCA1');
       Route::post('send_notificationstep2', 'notiController@notification2')->name('notificationCA2');
       
       // for coupon
       Route::get('coupon', 'CouponController@allcoupons')->name('coupon');
	    
		
});	
	
	 //for selecting date
	 Route::get('date/{id}','emailController@selectdate')->name('select_date');
	  Route::post('date','emailController@selecttwodates')->name('selecttwodates');
	
	
/////////////////////////////////////////////////	
/////////////for API//////////////////////
////////////////////////////////////////////////
Route::group(['prefix'=>'api','namespace'=>'Api'],function(){
    //for address
    Route::post('address', 'AddressController@address')->name('address');
    Route::post('editaddress', 'AddressController@editaddress')->name('editaddress');
    Route::post('showaddress', 'AddressController@showaddress');
    Route::post('deleteuseraddress', 'AddressController@DeleteUserAddress');
    
    //for product search 
    Route::post('search_keyword', 'searchController@searchingFor');
    
    //for user 
    Route::post('user_register', 'UserController@signUp');
    Route::post('verify_phone', 'UserController@verifyPhone');
    Route::post('forgot_password', 'UserController@forgotPassword');
    Route::post('verify_otp', 'UserController@verifyOtp');
    Route::post('change_password', 'UserController@changePassword');
    Route::post('login', 'UserController@login');
    Route::post('checkotp', 'UserController@checkOTP');
    Route::post('checkMember', 'UserController@checkMember');
    //for profile
    Route::post('myprofile', 'UserController@myprofile');
    
     //for category and subcategory
    Route::post('appcategory', 'categoryController@category');
    Route::post('appsubcategory', 'categoryController@subcat');
    Route::post('appproduct', 'categoryController@product');
    Route::post('homecategory', 'categoryController@allproduct');
    Route::post('newhomecategory', 'categoryController@homecat');
    
    //for app currency
    Route::post('currency', 'categoryController@currency');
   
    //for banner
    Route::post('homebanner', 'bannerController@homebanner');
    Route::post('home2banner', 'bannerController@home2banner');
    Route::post('catbanner', 'bannerController@catbanner');
    
    //for subscription plan
    Route::post('planlist', 'planController@planlist');
    
     //For city list
    Route::post('showcity', 'cityController@showcity');
    Route::post('city', 'cityController@city');
    
    
    //for showing area list
     Route::post('showarea', 'cityController@showarea');
     
     
     //insert special day notification
    Route::post('spldaynoti', 'notificationController@spldaynotification');
    
    
    //insert data at the time of subscribe
    Route::post('subscribe', 'subController@subscription');
    Route::post('buyonce', 'subController@buyonce');
    
    //for my subscription
    Route::post('modifysubs', 'subController@modifysubs');
    Route::post('pauseorders', 'subController@pause_order');
    Route::post('resumeorders', 'subController@resume_order');
    Route::post('showsubscription', 'subController@showsubscription');
    Route::post('showcart', 'subController@showcart');
    
     //for App Logo
    Route::post('logo', 'logoController@logo');
    
    
    //subscription of the day
    Route::post('subscriptionoftheday', 'subController@subscriptionoftheday');
    
    //delete order
    Route::post('cancelreasons', 'subController@reasonofcancellist');
    Route::post('delete_order', 'subController@delete_order');
    
    //wallet
    Route::post('showcredit', 'walletController@showcredit');
    Route::post('add_credit', 'walletController@add_credit');
    Route::post('show_recharge_history', 'walletController@show_recharge_history');
    //cash recharge request
    Route::post('cash_recharge', 'collectcashController@cashrequest');
    
    
    
    //complain
    Route::post('showcomplain', 'complainController@showcomplain');
    Route::post('report_issue', 'complainController@report_issue');
    Route::post('showcompleted', 'complainController@showcompleted');
   
    //for FAQ
    Route::post('faq', 'faqController@faq');
    
    //notificationby
    Route::post('notificationby', 'notificationbyController@notificationby');
    
    //for delivery timing 
    Route::post('subsdelivery_timing', 'delivery_timingController@delivery_timing');
    
    //for schedule
    Route::post('schedule', 'subController@scheduled');
    
    //for Payment Mode
    Route::post('paymentvia', 'paymentController@payment_mode');
    
    //total bill ,last recharge, current balance
    Route::post('total_bill', 'walletController@totalbill');
    
    //billing history
    Route::post('credit_history', 'walletController@credit_history');
    Route::post('billing_history', 'walletController@billing_history');
    
     
    //delivery boy
     Route::post('dboylogin', 'deliveryboyController@dboylogin');
     Route::post('dboyprofile', 'deliveryboyController@dboyprofile');
     Route::post('dboytoday_orders', 'deliveryboyController@today_orders');
     Route::post('dboynextday_orders', 'deliveryboyController@nextday_orders');
     Route::post('dboy_status', 'deliveryboyController@dboy_status');
     Route::post('marked', 'deliveryboyController@marked');
     Route::post('update_loc', 'deliveryboyController@update_loc');
     Route::post('dboyincentive', 'deliveryboyController@dboyincentive');
     Route::post('dboycompleted', 'deliveryboyController@dboycompleted');
     Route::post('not_accepted', 'deliveryboyController@not_accepted');
     Route::post('cityadmin_address', 'deliveryboyController@cityadmin_address');
     Route::post('generateDeliveredOtp', 'deliveryboyController@generateDeliveredOtp');
     Route::get('delievery_boy_city', 'deliveryboyController@delieveryboycity');
     Route::post('delievery_boy_sign_up', 'deliveryboyController@delieveryboysignup');
     Route::post('delievery_boy_phone_verify', 'deliveryboyController@delieveryboyphoneverify');
     Route::post('sendotpformarked', 'deliveryboyController@sendotpformarked');
     Route::post('verifyotpformarked', 'deliveryboyController@verifyotpformarked');
     Route::post('dboyforgetpassword', 'deliveryboyController@dboyforgetpassword');
     Route::post('dboyverifyotp', 'deliveryboyController@dboyverifyotp');
     Route::post('dboychangepassword', 'deliveryboyController@dboychangepassword');
     
     //Manager
     Route::post('managerlogin', 'managerController@managerlogin');
     Route::post('managerprofile', 'managerController@managerprofile');
     Route::post('managertoday_orders', 'managerController@managertoday_orders');
     Route::post('managernextday_orders', 'managerController@managernextday_orders');
     Route::post('showdelivery_boys', 'managerController@showdelivery_boys');
     
     Route::post('cancelOrder', 'managerController@cancelOrder');
     
     Route::post('appassign', 'managerController@appassign');
     Route::post('show_product', 'managerController@show_product');
     Route::post('incstock', 'managerController@incstock');
     
     
     //cash recharge
     Route::post('today_cashcollection', 'deliveryboyController@today_cashcollection');
     Route::post('mark_collected', 'deliveryboyController@mark_collected');
    
    //MemberPlanController
    Route::post('memberplanlist', 'MemberController@MemberPlanList');
    Route::post('memberplanpurchase', 'MemberController@MemberPlanPurchase');
    
    
    Route::post('timesloteproduct', 'TimeslotProductController@TimeslotProductController');
    
});






// Route::get('/login', 'admin\LoginController@login')->name('check-login');


//////////////////////////////////////////////////////////////
//////////////////           USER logged in     ///////////////////////////////
//////////////////////////////////////////////////////////////



 
      Route::group(['namespace'=>'user', 'prefix'=>'user'],function(){
		 
		   Route::get('/','HomeUserController@main');
		   Route::get('/login','LoginUserController@userlogin')->name('UserLogin');
           Route::post('/checklogin', 'LoginUserController@checkuserLogin')->name('checkuserLogin');
          		   
		 
		  Route::get('product','HomeUserController@product')->name('product');
		  Route::get('productdetail/{product_id}','HomeUserController@productdetail')->name('productdetail');
		  Route::get('cart/{user_id}','HomeUserController@cart')->name('cart');
		  Route::post('cart','HomeUserController@cartpost')->name('cartpost');
		  Route::post('cartupdate','HomeUserController@cartupdate')->name('cartupdate');
	     // Route::get('cart/checkout/{id}','HomeUserController@checkout')->name('checkout');
		  Route::get('user/edit/{user_id}','HomeUserController@Edituser')->name('edit-user');
		  Route::post('update/profile/{user_id}','HomeUserController@userUpdateProfile')->name('update-user');
		  Route::get('order-history','HomeUserController@orderhistory')->name('order-history');
		   Route::get('logout','HomeUserController@userLogout')->name('user-logout');
		    Route::get('checkout','HomeUserController@checkout')->name('checkout');
		  Route::get('regsuccess','HomeUserController@paysucess')->name('paysucess');
		  Route::post('categoryfilter','HomeUserController@categoryfilter')->name('categoryfilter');
		  Route::get('livesearch','HomeUserController@livesearch')->name('livesearch');
		  Route::get('paywithrazorpay', 'RazorpayController@payWithRazorpay')->name('paywithrazorpay');
		  // Post Route For Makw Payment Request
Route::post('payment', 'RazorpayController@payment')->name('payment');
Route::get('removeitem/{id}','HomeUserController@itemremovecart')->name('del-item');
Route::get('empty','HomeUserController@deletecart')->name('del-cart');
		  Route::get('cancel/{id}','HomeUserController@cancelorder')->name('cancel-order');
		  Route::get('review/{id}','HomeUserController@revieworder')->name('review-order');
		   Route::post('review','HomeUserController@review')->name('review');
		   Route::get('track/{id}','HomeUserController@track')->name('track-order');
		   Route::get('customer-support','HomeUserController@customersupport')->name('customer-support');
		 
		  //Route::get('products','HomeUserController@pagination')->name('pagination');
	
	  });
	  
	  
//////////////////////////////////////////////////////////////
//////////////////           USER   not logged in    ///////////////////////////////
//////////////////////////////////////////////////////////////
	   Route::group(['namespace'=>'user'],function(){
	  Route::get('/','HomeUserController@main')->name('main');
	  Route::get('product','HomeUserController@product')->name('product');
		 Route::get('productdetail/{product_id}','HomeUserController@productdetail')->name('productdetail');
	   });

//////////////////////////////////////////////////////////////
//////////////////RESOURCE-TEAM///////////////////////////////
//////////////////////////////////////////////////////////////

//login
Route::group(['namespace'=>'Resource_team', 'prefix'=>'resource_team'],function(){

  Route::get('/', 'LoginresourceController@resourceteamlogin')->name('resourceteamlogin');
  Route::post('/checklogin', 'LoginresourceController@checkresourceLogin')->name('check-resource-login');
 });
 
      Route::group(['namespace'=>'Resource_team', 'prefix'=>'resource_team'],function(){
      //Meenu
	
      /// for home
      Route::get('index','HomeresourceController@resourceIndex')->name('resource-index');
      
	   //sidebar
 Route::get('newstartup','resourceController@newstartup')->name('newstartup');
 Route::get('date-allocated','resourceController@dateallocated')->name('dateallocatedstartup');
 Route::get('verified-startup','resourceController@verifiedstartup')->name('verifiedstartup');
 Route::get('startup/view/{id}','resourceController@ViewProduct')->name('view-startup');
 Route::get('startup/view/allocate-date/{id}','resourceController@ViewProductallocate')->name('view-startup-allocate');
 Route::get('startup/reject/{id}','resourceController@rejectstartup')->name('reject-resource-team');
 Route::get('startup/allocate-date','resourceController@acceptstartup')->name('accept-resource-team');
 Route::post('startup/reject_reason','resourceController@reason_rejection')->name('reason_rejection');
 Route::post('startup/allocate_date','resourceController@Allocatedate')->name('Allocatedate');
 
// resource_team profile
     Route::get('profile', 'resourceProfileController@resourceteamProfile')->name('resource_team-profile');
     Route::get('resource_team/edit','resourceProfileController@Editresourceteam')->name('edit-resource_team');
     Route::post('update/profile/{id}','resourceProfileController@resourceteamUpdateProfile')->name('update-resource_team');
     Route::get('password','resourceProfileController@resourceteamChangePass')->name('change_pass_r');
     Route::post('password/change/{id}','resourceProfileController@resourceteamChangePassword')->name('resource_team-change-pass');
     Route::get('logout','resourceProfileController@resourceteamLogout')->name('resource_team-logout');
 
    //for notification
    
    Route::get('registration', 'registrationController@registration')->name('registration');
	Route::post('registration_fill', 'registrationController@fillregistration')->name('fillregistration');
    
	});
	
//////////////////////////////////////////////////////////////
//////////////////Support-TEAM////////////////////////////////
//////////////////////////////////////////////////////////////

//login
Route::group(['namespace'=>'Support_team', 'prefix'=>'support_team'],function(){

  Route::get('/', 'LoginsupportController@supportteamlogin')->name('supportteamlogin');
  Route::post('/checklogin', 'LoginsupportController@checksupportLogin')->name('check-support-login');
 });
 
      Route::group(['namespace'=>'Support_team', 'prefix'=>'support_team'],function(){
      //Meenu
	
      /// for home
      Route::get('index','HomesupportController@supportIndex')->name('support-index');
      
	   //sidebar
	   
	    //SUPPORT TEAM//      	   
 Route::get('startup_all','supportController@startup_team')->name('view-startup-support');
 Route::get('startup_add','supportController@startup_add')->name('add-new-startup');
 Route::post('startup/add','supportController@startup_addnew')->name('AddNewstartup_supportteam');
 Route::get('startup/reject/{id}','supportController@reject_team')->name('reject-support');
 Route::get('startup/pending/{id}','supportController@pending_team')->name('pending-support');
 Route::get('startup/accept/{id}','supportController@accept_team')->name('accept-support');
 Route::get('startup/pending','supportController@pending')->name('pendingbysupport_startup');
 Route::get('startup/interested','supportController@interested')->name('interestedstartup');
 Route::get('startup/registered','supportController@registered')->name('registeredstartup');
 Route::get('logout','supportController@supportteamLogout')->name('support_team-logout');
 Route::post('status/update','supportController@update_status')->name('status_update');
 Route::get('send_test_email','mailcontroller@sendmail');

	});




