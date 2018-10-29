<?php
//TODO 2018-04-08韵达快递保  新接口,新路由
Route::group(['prefix' => 'webapi', 'namespace'=>'ChannelsApiControllers\Yunda'],function (){
	Route::any('/', function() { return 'Hello webapi'; });
	//对外接口
	Route::any('joint_login', 'IntersController@jointLogin');//联合登录
	Route::any('authorization_query', 'IntersController@authorizationQuery');//授权查询
	Route::any('do_wechat_pay', 'IntersController@doWechatpay');//微信支付接口
	Route::any('do_wechat_pre', 'PrepareController@doWechatPrepare');//测试预投保接口
	//投保流程
	Route::any('ins_info', 'IndexController@insInfo');//投保详情页面
	Route::any('ins_center', 'IndexController@insureCenter');//我的保险页面
	Route::any('do_insured', 'IndexController@doInsured');//投保操作
	Route::any('do_new_insured', 'IndexController@doNewInusred');//出新单投保操作
	Route::any('ins_error/{error_type}', 'IndexController@insError');//错误提示页面
	//静态页面
	Route::any('insure_tk_clause', 'IndexController@insTkClause');//产品条款页面-泰康
	Route::any('insure_yd_clause', 'IndexController@insYdClause');//产品条款页面-英大
	Route::any('insure_tk_notice', 'IndexController@insTkNotice');//产品须知页面-泰康
	Route::any('insure_yd_notice', 'IndexController@insYdNotice');//产品须知页面-英大
	//银行卡操作
	Route::any('bank_index', 'BankController@bankIndex');//银行卡列表页面
	Route::any('bank_info/{bank_id}', 'BankController@bankInfo');//银行卡详情页面
	Route::any('bank_bind', 'BankController@bankBind');//添加银行卡页面
	Route::any('do_bank_bind', 'BankController@doBankBind');//添加银行卡操作
	Route::any('bank_del', 'BankController@bankDel');//删除银行卡操作
	Route::any('bank_verify', 'BankController@getBankVerify');//获取银行卡短信验证码
	//银行卡免密设置
	Route::any('insure_authorize', 'BankController@insureAuthorize');//免密授权页面
	Route::any('insure_authorize_info', 'BankController@insureAuthorizeInfo');//免密授权详情页面

	Route::any('bank_authorize', 'BankController@bankAuthorize');//免密授权页面
	Route::any('bank_authorize_info', 'BankController@bankAuthorizeInfo');//免密授权详情页面

	Route::any('do_insure_authorize', 'BankController@doBankAuthorize');//免密授权页面
	//保单管理
	Route::any('warranty_list', 'WarrantyController@warrantyList');//保单列表
	Route::any('warranty_detail/{warranty_id}', 'WarrantyController@warrantyDetail');//保单详情
	//投保设置
	Route::any('insure_setup_list', 'SetingController@insureSetupList');//设置列表页面
	Route::any('insure_seting', 'SetingController@insureSeting');//产品设置页面
	Route::any('insure_auto', 'SetingController@insureAuto');//自动投保页面
	Route::any('do_insure_auto', 'SetingController@doInsureAuto');//自动投保操作
	Route::any('user_info', 'SetingController@userInfo');//用户信息
	Route::any('reset_insure_auto', 'SetingController@resetInsureAuto');//重置自动投保设置
	//申请理赔
	Route::any('claim_contact', 'ClaimController@claimContact');//申请理赔
	Route::any('claim_email', 'ClaimController@claimEmail');
	Route::any('claim_info', 'ClaimController@claimInfo');
	Route::any('claim_material_upload', 'ClaimController@claimMaterialUpload');
	Route::any('claim_progress', 'ClaimController@claimProgress');
	Route::any('claim_reason', 'ClaimController@claimReason');
	Route::any('claim_result', 'ClaimController@claimResult');
	Route::any('claim_type', 'ClaimController@claimType');
	Route::any('claim_user', 'ClaimController@claimUser');
	Route::any('claim_send_email', 'ClaimController@claimSendEmail');
	Route::any('claim_audit', 'ClaimController@claimAudit');
	Route::any('base_upload_file', 'ClaimController@baseUploadFile');

	//todo =============================================泰康理赔=====================================
	//在线理赔
	Route::any('to_claim','TkClaimController@toClaim');//理赔选择
	Route::any('claim_notice/{warranty_code}','TkClaimController@claimNotice');//自助理赔服务须知
	Route::any('claim_step1','TkClaimController@claimStep1');//理赔第一步：填写出险人信息
	Route::any('do_claim_step1','TkClaimController@doClaimStep1');//处理第一步
	Route::any('claim_step2/{warranty_code}','TkClaimController@claimStep2');//理赔第二步：填写收款人账户信息
	Route::any('claim_step3','TkClaimController@claimStep3');//理赔第三步：上传身份证件信息
	Route::any('claim_step4','TkClaimController@claimStep4');//理赔第四步：上传理赔资料
	Route::any('do_claim_step4','TkClaimController@doClaimStep4');//处理第四步
	Route::any('claim_submit/{warranty_code}','TkClaimController@claimSubmit');//理赔资料提交
	Route::any('do_claim_del','TkClaimController@doClaimDel');//处理理赔资料删除
	Route::any('do_claim_submit','TkClaimController@doClaimSubmit');//处理理赔资料提交
	//理赔服务指南
	Route::any('claim_apply_guide','TkClaimController@claimApplyGuide');//理赔操作指引
	Route::any('claim_apply_range','TkClaimController@claimApplyRange');//理赔操作指引
	Route::any('claim_apply_info','TkClaimController@claimApplyInfo');//理赔操作指引
	Route::any('claim_apply_guide_index','TkClaimController@claimApplyGuideIndex');//理赔操作指引
	Route::any('claim_apply_way','TkClaimController@claimApplyWay');//理赔操作指引
	//理赔进度/历史查询
	Route::any('claim_records/{person_code}','TkClaimController@claimRecords');//理赔进度历史列表
	Route::any('claim_info/{warranty_code}','TkClaimController@claimInfo');//理赔详情
	Route::any('claim_add_material/{warranty_code}','TkClaimController@claimAddMaterial');//理赔资料补充
	Route::any('do_claim_add_material','TkClaimController@doClaimAddMaterial');//处理理赔资料补充
	//理赔三方接口
	Route::any('email_send','TkClaimController@getEmailSend');//理赔邮件
	Route::any('sms_send','TkClaimController@getSmsCode');//理赔短信

	//todo===============================================测试韵达推送投保信息========================================================
	Route::any('callback_yd','CallBackYdController@index');
	Route::any('callback_yd_time','CallBackYdController@time');
	Route::any('callback_yd_test','CallBackYdController@doTest');
});



