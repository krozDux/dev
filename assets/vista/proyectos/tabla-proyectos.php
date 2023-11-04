<?php
include('../config.php');
$sql1 = ("SELECT * FROM usuarios WHERE estado = 1 and rol='cliente'");
$query1 = mysqli_query($con, $sql1);
?>
<div class="d-flex flex-column-fluid">
											<!--begin::Aside-->
<div id="kt_aside" class="aside card drawer drawer-start" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle" style="width: 250px !important;">
    <!--begin::Aside menu-->
	<div class="aside-menu flex-column-fluid px-4">
		<!--begin::Aside Menu-->

<div class="hover-scroll-overlay-y mh-100 my-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto" data-kt-scroll-dependencies="{default: '#kt_aside_footer', lg: '#kt_header, #kt_aside_footer'}" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu" data-kt-scroll-offset="{default: '5px', lg: '75px'}" style="height: 554px;">
    <!--begin::Menu-->
    <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold fs-6" id="#kt_aside_menu" data-kt-menu="true">
        <!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-element-11 fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></span><span class="menu-title">Dashboards</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/index.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Default</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/dashboards/ecommerce.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">eCommerce</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/dashboards/projects.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Projects</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/dashboards/online-courses.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Online Courses</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/dashboards/marketing.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Marketing</span></a><!--end:Menu link--></div><!--end:Menu item--><div class="menu-inner flex-column collapse " id="kt_app_sidebar_menu_dashboards_collapse"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/dashboards/bidding.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Bidding</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/dashboards/pos.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">POS System</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/dashboards/call-center.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Call Center</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/dashboards/logistics.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Logistics</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/dashboards/website-analytics.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Website Analytics</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/dashboards/finance-performance.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Finance Performance</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/dashboards/store-analytics.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Store Analytics</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/dashboards/social.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Social</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/dashboards/delivery.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Delivery</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/dashboards/crypto.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Crypto</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/dashboards/school.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">School</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/dashboards/podcast.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Podcast</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/landing.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Landing</span></a><!--end:Menu link--></div><!--end:Menu item--></div>
            <div class="menu-item">
                <div class="menu-content">
                    <a class="btn btn-flex btn-color-primary d-flex flex-stack fs-base p-0 ms-2 mb-2 toggle collapsible collapsed" data-bs-toggle="collapse" href="#kt_app_sidebar_menu_dashboards_collapse" data-kt-toggle-text="Show Less">
                        <span data-kt-toggle-text-target="true">Show 12 More</span> <i class="ki-duotone ki-minus-square toggle-on fs-2 me-0"><span class="path1"></span><span class="path2"></span></i><i class="ki-duotone ki-plus-square toggle-off fs-2 me-0"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>                        
                    </a>
                </div>
            </div>                 
        </div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item pt-5"><!--begin:Menu content--><div class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">Pages</span></div><!--end:Menu content--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-address-book fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span><span class="menu-title">User Profile</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/user-profile/overview.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Overview</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/user-profile/projects.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Projects</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/user-profile/campaigns.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Campaigns</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/user-profile/documents.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Documents</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/user-profile/followers.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Followers</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/user-profile/activity.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Activity</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-element-plus fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></i></span><span class="menu-title">Account</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/account/overview.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Overview</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/account/settings.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Settings</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/account/security.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Security</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/account/activity.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Activity</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/account/billing.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Billing</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/account/statements.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Statements</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/account/referrals.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Referrals</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/account/api-keys.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">API Keys</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/account/logs.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Logs</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-user fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">Authentication</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Corporate Layout</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion menu-active-bg"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/layouts/corporate/sign-in.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Sign-in</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/layouts/corporate/sign-up.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Sign-up</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/layouts/corporate/two-factor.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Two-Factor</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/layouts/corporate/reset-password.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Reset Password</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/layouts/corporate/new-password.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">New Password</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Overlay Layout</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion menu-active-bg"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/layouts/overlay/sign-in.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Sign-in</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/layouts/overlay/sign-up.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Sign-up</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/layouts/overlay/two-factor.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Two-Factor</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/layouts/overlay/reset-password.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Reset Password</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/layouts/overlay/new-password.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">New Password</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Creative Layout</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion menu-active-bg"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/layouts/creative/sign-in.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Sign-in</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/layouts/creative/sign-up.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Sign-up</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/layouts/creative/two-factor.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Two-Factor</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/layouts/creative/reset-password.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Reset Password</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/layouts/creative/new-password.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">New Password</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Fancy Layout</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion menu-active-bg"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/layouts/fancy/sign-in.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Sign-in</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/layouts/fancy/sign-up.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Sign-up</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/layouts/fancy/two-factor.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Two-Factor</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/layouts/fancy/reset-password.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Reset Password</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/layouts/fancy/new-password.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">New Password</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Email Templates</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion menu-active-bg"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/email/welcome-message.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Welcome Message</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/email/reset-password.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Reset Password</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/email/subscription-confirmed.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Subscription Confirmed</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/email/card-declined.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Credit Card Declined</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/email/promo-1.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Promo 1</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/email/promo-2.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Promo 2</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/email/promo-3.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Promo 3</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/extended/multi-steps-sign-up.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Multi-steps Sign-up</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/general/welcome.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Welcome Message</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/general/verify-email.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Verify Email</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/general/coming-soon.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Coming Soon</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/general/password-confirmation.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Password Confirmation</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/general/account-deactivated.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Account Deactivation</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/general/error-404.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Error 404</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/authentication/general/error-500.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Error 500</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-file fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">Corporate</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-2 py-4 w-200px mh-75 overflow-auto"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/about.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">About</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/team.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Our Team</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/contact.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Contact Us</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/licenses.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Licenses</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/sitemap.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Sitemap</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-abstract-39 fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">Social</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/social/feeds.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Feeds</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/social/activity.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Activty</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/social/followers.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Followers</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/social/settings.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Settings</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-bank fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">Blog</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion menu-active-bg"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/blog/home.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Blog Home</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/blog/post.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Blog Post</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-chart-pie-3 fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span><span class="menu-title">FAQ</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion menu-active-bg"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/faq/classic.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">FAQ Classic</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/faq/extended.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">FAQ Extended</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-bucket fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></span><span class="menu-title">Pricing</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion menu-active-bg"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/pricing.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Column Pricing</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/pricing/table.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Table Pricing</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-call fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span></i></span><span class="menu-title">Careers</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/careers/list.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Careers List</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/pages/careers/apply.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Careers Apply</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-color-swatch fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span><span class="path7"></span><span class="path8"></span><span class="path9"></span><span class="path10"></span><span class="path11"></span><span class="path12"></span><span class="path13"></span><span class="path14"></span><span class="path15"></span><span class="path16"></span><span class="path17"></span><span class="path18"></span><span class="path19"></span><span class="path20"></span><span class="path21"></span></i></span><span class="menu-title">Utilities</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Modals</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">General</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion menu-active-bg"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/modals/general/invite-friends.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Invite Friends</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/modals/general/view-users.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">View Users</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/modals/general/select-users.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Select Users</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/modals/general/upgrade-plan.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Upgrade Plan</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/modals/general/share-earn.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Share &amp; Earn</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Forms</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion menu-active-bg"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/modals/forms/new-target.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">New Target</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/modals/forms/new-card.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">New Card</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/modals/forms/new-address.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">New Address</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/modals/forms/create-api-key.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Create API Key</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/modals/forms/bidding.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Bidding</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Wizards</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion menu-active-bg"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/modals/wizards/create-app.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Create App</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/modals/wizards/create-campaign.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Create Campaign</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/modals/wizards/create-account.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Create Business Acc</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/modals/wizards/create-project.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Create Project</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/modals/wizards/top-up-wallet.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Top Up Wallet</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/modals/wizards/offer-a-deal.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Offer a Deal</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/modals/wizards/two-factor-authentication.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Two Factor Auth</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Search</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion menu-active-bg"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/modals/search/users.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Users</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/modals/search/select-location.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Select Location</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Search</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/search/horizontal.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Horizontal</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/search/vertical.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Vertical</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/search/users.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Users</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/search/select-location.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Location</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Wizards</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/wizards/horizontal.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Horizontal</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/wizards/vertical.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Vertical</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/wizards/two-factor-authentication.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Two Factor Auth</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/wizards/create-app.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Create App</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/wizards/create-campaign.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Create Campaign</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/wizards/create-account.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Create Account</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/wizards/create-project.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Create Project</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/modals/wizards/top-up-wallet.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Top Up Wallet</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/utilities/wizards/offer-a-deal.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Offer a Deal</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-element-7 fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">Widgets</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/widgets/lists.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Lists</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/widgets/statistics.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Statistics</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/widgets/charts.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Charts</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/widgets/mixed.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Mixed</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/widgets/tables.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Tables</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/widgets/feeds.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Feeds</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item pt-5"><!--begin:Menu content--><div class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">Apps</span></div><!--end:Menu content--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item here show menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-abstract-41 fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">Projects</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link active" href="/metronic8/demo14/../demo14/apps/projects/list.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">My Projects</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/projects/project.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">View Project</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/projects/targets.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Targets</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/projects/budget.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Budget</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/projects/users.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Users</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/projects/files.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Files</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/projects/activity.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Activity</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/projects/settings.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Settings</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-basket fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></span><span class="menu-title">eCommerce</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Catalog</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/ecommerce/catalog/products.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Products</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/ecommerce/catalog/categories.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Categories</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/ecommerce/catalog/add-product.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Add Product</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/ecommerce/catalog/edit-product.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Edit Product</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/ecommerce/catalog/add-category.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Add Category</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/ecommerce/catalog/edit-category.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Edit Category</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Sales</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/ecommerce/sales/listing.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Orders Listing</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/ecommerce/sales/details.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Order Details</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/ecommerce/sales/add-order.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Add Order</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/ecommerce/sales/edit-order.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Edit Order</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Customers</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/ecommerce/customers/listing.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Customer Listing</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/ecommerce/customers/details.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Customer Details</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Reports</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/ecommerce/reports/view.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Products Viewed</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/ecommerce/reports/sales.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Sales</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/ecommerce/reports/returns.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Returns</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/ecommerce/reports/customer-orders.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Customer Orders</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/ecommerce/reports/shipping.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Shipping</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/ecommerce/settings.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Settings</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-abstract-25 fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">Contacts</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/contacts/getting-started.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Getting Started</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/contacts/add-contact.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Add Contact</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/contacts/edit-contact.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Edit Contact</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/contacts/view-contact.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">View Contact</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-chart fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">Support Center</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/support-center/overview.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Overview</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1"><!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Tickets</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/support-center/tickets/list.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Tickets List</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/support-center/tickets/view.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">View Ticket</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1"><!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Tutorials</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/support-center/tutorials/list.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Tutorials List</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/support-center/tutorials/post.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Tutorial Post</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/support-center/faq.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">FAQ</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/support-center/licenses.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Licenses</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/support-center/contact.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Contact Us</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-abstract-28 fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">User Management</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1"><!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Users</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/user-management/users/list.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Users List</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/user-management/users/view.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">View User</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Roles</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/user-management/roles/list.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Roles List</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/user-management/roles/view.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">View Role</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/user-management/permissions.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Permissions</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-abstract-38 fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">Customers</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/customers/getting-started.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Getting Started</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/customers/list.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Customer Listing</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/customers/view.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Customer Details</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-map fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span><span class="menu-title">Subscription</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/subscriptions/getting-started.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Getting Started</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/subscriptions/list.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Subscription List</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/subscriptions/add.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Add Subscription</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/subscriptions/view.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">View Subscription</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-credit-cart fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">Invoice Manager</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">View Invoices</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion menu-active-bg"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/invoices/view/invoice-1.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Invoice 1</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/invoices/view/invoice-2.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Invoice 2</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/invoices/view/invoice-3.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Invoice 3</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/invoices/create.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Create Invoice</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-switch fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">File Manager</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/file-manager/folders.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Folders</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/file-manager/files.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Files</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/file-manager/blank.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Blank Directory</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/file-manager/settings.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Settings</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-sms fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">Inbox</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/inbox/listing.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Messages</span><span class="menu-badge"><span class="badge badge-success">3</span></span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/inbox/compose.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Compose</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/inbox/reply.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">View &amp; Reply</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div data-kt-menu-trigger="click" class="menu-item menu-accordion"><!--begin:Menu link--><span class="menu-link"><span class="menu-icon"><i class="ki-duotone ki-message-text-2 fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i></span><span class="menu-title">Chat</span><span class="menu-arrow"></span></span><!--end:Menu link--><!--begin:Menu sub--><div class="menu-sub menu-sub-accordion"><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/chat/private.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Private Chat</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/chat/group.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Group Chat</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/chat/drawer.html"><span class="menu-bullet"><span class="bullet bullet-dot"></span></span><span class="menu-title">Drawer Chat</span></a><!--end:Menu link--></div><!--end:Menu item--></div><!--end:Menu sub--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/apps/calendar.html"><span class="menu-icon"><i class="ki-duotone ki-calendar-8 fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span><span class="path6"></span></i></span><span class="menu-title">Calendar</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item pt-5"><!--begin:Menu content--><div class="menu-content"><span class="menu-heading fw-bold text-uppercase fs-7">Help</span></div><!--end:Menu content--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="https://preview.keenthemes.com/html/metronic/docs/base/utilities" target="_blank"><span class="menu-icon"><i class="ki-duotone ki-rocket fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">Components</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="/metronic8/demo14/../demo14/layout-builder.html"><span class="menu-icon"><i class="ki-duotone ki-abstract-13 fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">Layout Builder</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="https://preview.keenthemes.com/html/metronic/docs" target="_blank"><span class="menu-icon"><i class="ki-duotone ki-abstract-26 fs-2"><span class="path1"></span><span class="path2"></span></i></span><span class="menu-title">Documentation</span></a><!--end:Menu link--></div><!--end:Menu item--><!--begin:Menu item--><div class="menu-item"><!--begin:Menu link--><a class="menu-link" href="https://preview.keenthemes.com/html/metronic/docs/getting-started/changelog" target="_blank"><span class="menu-icon"><i class="ki-duotone ki-code fs-2"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span></i></span><span class="menu-title">Changelog v8.2.1</span></a><!--end:Menu link--></div><!--end:Menu item-->    </div>
    <!--end::Menu-->
</div>    </div>
    <!--end::Aside menu-->

    <!--begin::Footer-->
    <div class="aside-footer flex-column-auto pt-5 pb-7 px-7" id="kt_aside_footer">
        <a href="https://preview.keenthemes.com/html/metronic/docs" class="btn btn-bg-light btn-color-gray-500 btn-active-color-gray-900 text-nowrap w-100" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" data-bs-original-title="200+ in-house components and 3rd-party plugins" data-kt-initialized="1">
            <span class="btn-label">
                Docs &amp; Components
            </span>
            <i class="ki-duotone ki-document btn-icon fs-2"><span class="path1"></span><span class="path2"></span></i>        </a>
    </div>
    <!--end::Footer-->
</div>
<!--end::Aside-->
					
					<!--begin::Container-->
					<div class="d-flex flex-column flex-column-fluid  container-fluid ">
													
<!--begin::Toolbar-->
<div class="toolbar mb-5 mb-lg-7" id="kt_toolbar">
    

<!--begin::Page title-->
<div class="page-title d-flex flex-column me-3">
    <!--begin::Title-->
    <h1 class="d-flex text-gray-900 fw-bold my-1 fs-3">
        My Projects
            </h1>
    <!--end::Title-->

            
        <!--begin::Breadcrumb-->
        <ul class="breadcrumb breadcrumb-dot fw-semibold text-gray-600 fs-7 my-1">
                            <!--begin::Item-->
                                    <li class="breadcrumb-item text-gray-600">
                                                    <a href="/metronic8/demo14/../demo14/index.html" class="text-gray-600 text-hover-primary">
                                Home                            </a>
                                            </li>
                                <!--end::Item-->                    
                            <!--begin::Item-->
                                    <li class="breadcrumb-item text-gray-600">
                                                    Projects                                            </li>
                                <!--end::Item-->                    
                            <!--begin::Item-->
                                    <li class="breadcrumb-item text-gray-500">
                        My Projects                    </li>
                                <!--end::Item-->                    
                    </ul>
        <!--end::Breadcrumb-->
    </div>
<!--end::Page title-->
    <!--begin::Actions-->
    <div class="d-flex align-items-center py-2 py-md-1">
        <!--begin::Wrapper-->
        <div class="me-3">
            <!--begin::Menu-->
            <a href="#" class="btn btn-light fw-bold" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                <i class="ki-duotone ki-filter fs-5 text-gray-500 me-1"><span class="path1"></span><span class="path2"></span></i>               
                Filter
            </a>
            
            

<!--begin::Menu 1-->
<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_6545aa6014d50">
    <!--begin::Header-->
    <div class="px-7 py-5">
        <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
    </div>
    <!--end::Header-->

    <!--begin::Menu separator-->
    <div class="separator border-gray-200"></div>
    <!--end::Menu separator-->
    

    <!--begin::Form-->
    <div class="px-7 py-5">
        <!--begin::Input group-->
        <div class="mb-10">
            <!--begin::Label-->
            <label class="form-label fw-semibold">Status:</label>
            <!--end::Label-->

            <!--begin::Input-->
            <div>
                <select class="form-select form-select-solid select2-hidden-accessible" multiple="" data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_6545aa6014d50" data-allow-clear="true" data-select2-id="select2-data-7-qff7" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                    <option></option>
                    <option value="1">Approved</option>
                    <option value="2">Pending</option>
                    <option value="2">In Process</option>
                    <option value="2">Rejected</option>
                </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-8-9kpv" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false"><ul class="select2-selection__rendered" id="select2-6d13-container"></ul><span class="select2-search select2-search--inline"><textarea class="select2-search__field" type="search" tabindex="0" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" autocomplete="off" aria-label="Search" aria-describedby="select2-6d13-container" placeholder="Select option" style="width: 100%;"></textarea></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
            </div>
            <!--end::Input-->
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="mb-10">
            <!--begin::Label-->
            <label class="form-label fw-semibold">Member Type:</label>
            <!--end::Label-->

            <!--begin::Options-->
            <div class="d-flex">
                <!--begin::Options-->    
                <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                    <input class="form-check-input" type="checkbox" value="1">
                    <span class="form-check-label">
                        Author
                    </span>
                </label>
                <!--end::Options-->    

                <!--begin::Options-->    
                <label class="form-check form-check-sm form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" value="2" checked="checked">
                    <span class="form-check-label">
                        Customer
                    </span>
                </label>
                <!--end::Options-->    
            </div>        
            <!--end::Options-->    
        </div>
        <!--end::Input group-->

        <!--begin::Input group-->
        <div class="mb-10">
            <!--begin::Label-->
            <label class="form-label fw-semibold">Notifications:</label>
            <!--end::Label-->

            <!--begin::Switch-->
            <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="" name="notifications" checked="">
                <label class="form-check-label">
                    Enabled
                </label>
            </div>
            <!--end::Switch-->
        </div>
        <!--end::Input group-->

        <!--begin::Actions-->
        <div class="d-flex justify-content-end">
            <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>

            <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
        </div>
        <!--end::Actions-->
    </div>
    <!--end::Form-->
</div>
<!--end::Menu 1-->            <!--end::Menu-->
        </div>
        <!--end::Wrapper-->
        
        <!--begin::Button-->
                    <a href="#" class="btn btn-dark fw-bold" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app" id="kt_toolbar_primary_button">
                Create            </a>
                <!--end::Button-->
    </div>
    <!--end::Actions-->
</div>
<!--end::Toolbar-->
						
						<!--begin::Post-->
						<div class="content flex-column-fluid" id="kt_content">
							<!--begin::Stats-->
<div class="row gx-6 gx-xl-9">
    <div class="col-lg-6 col-xxl-4">
        <!--begin::Card-->
<div class="card h-100">
    <!--begin::Card body-->
    <div class="card-body p-9">
        <!--begin::Heading-->
        <div class="fs-2hx fw-bold">237</div>
        <div class="fs-4 fw-semibold text-gray-500 mb-7">Current Projects</div>
        <!--end::Heading-->

        <!--begin::Wrapper-->
        <div class="d-flex flex-wrap">
            <!--begin::Chart-->
            <div class="d-flex flex-center h-100px w-100px me-9 mb-5">
                <canvas id="kt_project_list_chart" style="display: block; box-sizing: border-box; height: 100px; width: 100px;" width="200" height="200"></canvas>
            </div>
            <!--end::Chart-->
            
            <!--begin::Labels-->
            <div class="d-flex flex-column justify-content-center flex-row-fluid pe-11 mb-5">
                <!--begin::Label-->
                <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                    <div class="bullet bg-primary me-3"></div>
                    <div class="text-gray-500">Active</div>
                    <div class="ms-auto fw-bold text-gray-700">30</div>
                </div>
                <!--end::Label-->

                <!--begin::Label-->
                <div class="d-flex fs-6 fw-semibold align-items-center mb-3">
                    <div class="bullet bg-success me-3"></div>
                    <div class="text-gray-500">Completed</div>
                    <div class="ms-auto fw-bold text-gray-700">45</div>
                </div>
                <!--end::Label-->

                <!--begin::Label-->
                <div class="d-flex fs-6 fw-semibold align-items-center">
                    <div class="bullet bg-gray-300 me-3"></div>
                    <div class="text-gray-500">Yet to start</div>
                    <div class="ms-auto fw-bold text-gray-700">25</div>
                </div>
                <!--end::Label-->
            </div>
            <!--end::Labels-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Card body-->
</div>
<!--end::Card-->    </div>
    <div class="col-lg-6 col-xxl-4">
        <!--begin::Budget-->
<div class="card  h-100">
    <div class="card-body p-9">
        <div class="fs-2hx fw-bold">$3,290.00</div>
        <div class="fs-4 fw-semibold text-gray-500 mb-7">Project Finance</div>

        <div class="fs-6 d-flex justify-content-between mb-4">
            <div class="fw-semibold">Avg. Project Budget</div>
            <div class="d-flex fw-bold">
                <i class="ki-duotone ki-arrow-up-right fs-3 me-1 text-success"><span class="path1"></span><span class="path2"></span></i>                $6,570
            </div>
        </div>

        <div class="separator separator-dashed"></div>

        <div class="fs-6 d-flex justify-content-between my-4">
            <div class="fw-semibold">Lowest Project Check</div>

            <div class="d-flex fw-bold">
                <i class="ki-duotone ki-arrow-down-left fs-3 me-1 text-danger"><span class="path1"></span><span class="path2"></span></i>                $408
            </div>
        </div>

        <div class="separator separator-dashed"></div>

        <div class="fs-6 d-flex justify-content-between mt-4">
            <div class="fw-semibold">Ambassador Page</div>

            <div class="d-flex fw-bold">
                <i class="ki-duotone ki-arrow-up-right fs-3 me-1 text-success"><span class="path1"></span><span class="path2"></span></i>                $920
            </div>
        </div>
    </div>
</div>
<!--end::Budget-->    </div>
    <div class="col-lg-6 col-xxl-4">
        
<!--begin::Clients-->
<div class="card  h-100">
    <div class="card-body p-9">
        <!--begin::Heading-->
        <div class="fs-2hx fw-bold">49</div>
        <div class="fs-4 fw-semibold text-gray-500 mb-7">Our Clients</div>
        <!--end::Heading-->

        <!--begin::Users group-->
        <div class="symbol-group symbol-hover mb-9">
                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Alan Warden" data-kt-initialized="1">
                                            <span class="symbol-label bg-warning text-inverse-warning fw-bold">A</span>
                                    </div>
                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Michael Eberon" data-bs-original-title="Michael Eberon" data-kt-initialized="1">
                                            <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-11.jpg">
                                    </div>
                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Michelle Swanston" data-bs-original-title="Michelle Swanston" data-kt-initialized="1">
                                            <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-7.jpg">
                                    </div>
                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Francis Mitcham" data-bs-original-title="Francis Mitcham" data-kt-initialized="1">
                                            <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-20.jpg">
                                    </div>
                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Susan Redwood" data-kt-initialized="1">
                                            <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                                    </div>
                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Melody Macy" data-bs-original-title="Melody Macy" data-kt-initialized="1">
                                            <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-2.jpg">
                                    </div>
                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Perry Matthew" data-kt-initialized="1">
                                            <span class="symbol-label bg-info text-inverse-info fw-bold">P</span>
                                    </div>
                            <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Barry Walter" data-bs-original-title="Barry Walter" data-kt-initialized="1">
                                            <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-12.jpg">
                                    </div>
                        <a href="#" class="symbol symbol-35px symbol-circle" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">
                <span class="symbol-label bg-dark text-gray-300 fs-8 fw-bold">+42</span>
            </a>
        </div>
        <!--end::Users group-->

        <!--begin::Actions-->
        <div class="d-flex">
            <a href="#" class="btn btn-primary btn-sm me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_view_users">All Clients</a>
            <a href="#" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#kt_modal_users_search">Invite New</a>
        </div>
        <!--end::Actions-->
    </div>
</div>
<!--end::Clients-->    </div>
</div>
<!--end::Stats-->

<!--begin::Toolbar-->
<div class="d-flex flex-wrap flex-stack my-5">
    <!--begin::Heading-->
    <h2 class="fs-2 fw-semibold my-2">
        Projects 
        <span class="fs-6 text-gray-500 ms-1">by Status</span>
    </h2>
    <!--end::Heading-->

    <!--begin::Controls-->
    <div class="d-flex flex-wrap my-1">
        <!--begin::Select wrapper-->
        <div class="m-0">
            <!--begin::Select-->
            <select name="status" data-control="select2" data-hide-search="true" class="form-select form-select-sm bg-body border-body fw-bold w-125px select2-hidden-accessible" data-select2-id="select2-data-9-t737" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                <option value="Active" selected="" data-select2-id="select2-data-11-ny0k">Active</option>
                <option value="Approved">In Progress</option>
                <option value="Declined">To Do</option>
                <option value="In Progress">Completed</option>
            </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-10-5i3a" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-sm bg-body border-body fw-bold w-125px" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-status-mt-container" aria-controls="select2-status-mt-container"><span class="select2-selection__rendered" id="select2-status-mt-container" role="textbox" aria-readonly="true" title="Active">Active</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
            <!--end::Select-->
        </div>
        <!--end::Select wrapper-->
    </div>
    <!--end::Controls-->
</div>
<!--end::Toolbar-->

<!--begin::Row-->
<div class="row g-6 g-xl-9">
    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">
        
<!--begin::Card-->
<a href="/metronic8/demo14/../demo14/apps/projects/project.html" class="card border-hover-primary ">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-9">
        <!--begin::Card Title-->
        <div class="card-title m-0">
            <!--begin::Avatar-->
            <div class="symbol symbol-50px w-50px bg-light">
                <img src="/metronic8/demo14/assets/media/svg/brand-logos/plurk.svg" alt="image" class="p-3">
            </div>
            <!--end::Avatar-->
        </div>
        <!--end::Car Title-->

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">In Progress</span>
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end:: Card header-->

    <!--begin:: Card body-->
    <div class="card-body p-9">
        <!--begin::Name-->
        <div class="fs-3 fw-bold text-gray-900">
            Fitnes App        </div>
        <!--end::Name-->

        <!--begin::Description-->
        <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
            CRM App application to HR efficiency        </p>
        <!--end::Description-->

        <!--begin::Info-->
        <div class="d-flex flex-wrap mb-5">
            <!--begin::Due-->
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">            
                <div class="fs-6 text-gray-800 fw-bold">Jul 25, 2023</div>
                <div class="fw-semibold text-gray-500">Due Date</div>
            </div>
            <!--end::Due-->

            <!--begin::Budget-->
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                <div class="fs-6 text-gray-800 fw-bold">$284,900.00</div>
                <div class="fw-semibold text-gray-500">Budget</div>
            </div>
            <!--end::Budget-->
        </div>
        <!--end::Info-->

        <!--begin::Progress-->
        <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 50% completed" data-bs-original-title="This project 50% completed" data-kt-initialized="1">
            <div class="bg-primary rounded h-4px" role="progressbar" style="width: 50%" aria-valuenow=" 50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <!--end::Progress-->

                    <!--begin::Users-->
            <div class="symbol-group symbol-hover">
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Emma Smith" data-bs-original-title="Emma Smith" data-kt-initialized="1">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-6.jpg">
                                            </div>
                    <!--begin::User-->
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Rudy Stone" data-bs-original-title="Rudy Stone" data-kt-initialized="1">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-1.jpg">
                                            </div>
                    <!--begin::User-->
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Susan Redwood" data-kt-initialized="1">
                                                    <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                                            </div>
                    <!--begin::User-->
                            </div>
            <!--end::Users-->
            </div>
    <!--end:: Card body-->
</a>
<!--end::Card-->    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">
        
<!--begin::Card-->
<a href="/metronic8/demo14/../demo14/apps/projects/project.html" class="card border-hover-primary ">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-9">
        <!--begin::Card Title-->
        <div class="card-title m-0">
            <!--begin::Avatar-->
            <div class="symbol symbol-50px w-50px bg-light">
                <img src="/metronic8/demo14/assets/media/svg/brand-logos/disqus.svg" alt="image" class="p-3">
            </div>
            <!--end::Avatar-->
        </div>
        <!--end::Car Title-->

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <span class="badge badge-light fw-bold me-auto px-4 py-3">Pending</span>
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end:: Card header-->

    <!--begin:: Card body-->
    <div class="card-body p-9">
        <!--begin::Name-->
        <div class="fs-3 fw-bold text-gray-900">
            Leaf CRM        </div>
        <!--end::Name-->

        <!--begin::Description-->
        <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
            CRM App application to HR efficiency        </p>
        <!--end::Description-->

        <!--begin::Info-->
        <div class="d-flex flex-wrap mb-5">
            <!--begin::Due-->
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">            
                <div class="fs-6 text-gray-800 fw-bold">May 10, 2021 </div>
                <div class="fw-semibold text-gray-500">Due Date</div>
            </div>
            <!--end::Due-->

            <!--begin::Budget-->
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                <div class="fs-6 text-gray-800 fw-bold">$36,400.00</div>
                <div class="fw-semibold text-gray-500">Budget</div>
            </div>
            <!--end::Budget-->
        </div>
        <!--end::Info-->

        <!--begin::Progress-->
        <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 30% completed" data-bs-original-title="This project 30% completed" data-kt-initialized="1">
            <div class="bg-info rounded h-4px" role="progressbar" style="width: 30%" aria-valuenow=" 30" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <!--end::Progress-->

                    <!--begin::Users-->
            <div class="symbol-group symbol-hover">
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Alan Warden" data-kt-initialized="1">
                                                    <span class="symbol-label bg-warning text-inverse-warning fw-bold">A</span>
                                            </div>
                    <!--begin::User-->
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Brian Cox" data-bs-original-title="Brian Cox" data-kt-initialized="1">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-5.jpg">
                                            </div>
                    <!--begin::User-->
                            </div>
            <!--end::Users-->
            </div>
    <!--end:: Card body-->
</a>
<!--end::Card-->    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">
        
<!--begin::Card-->
<a href="/metronic8/demo14/../demo14/apps/projects/project.html" class="card border-hover-primary ">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-9">
        <!--begin::Card Title-->
        <div class="card-title m-0">
            <!--begin::Avatar-->
            <div class="symbol symbol-50px w-50px bg-light">
                <img src="/metronic8/demo14/assets/media/svg/brand-logos/figma-1.svg" alt="image" class="p-3">
            </div>
            <!--end::Avatar-->
        </div>
        <!--end::Car Title-->

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <span class="badge badge-light-success fw-bold me-auto px-4 py-3">Completed</span>
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end:: Card header-->

    <!--begin:: Card body-->
    <div class="card-body p-9">
        <!--begin::Name-->
        <div class="fs-3 fw-bold text-gray-900">
            Atica Banking        </div>
        <!--end::Name-->

        <!--begin::Description-->
        <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
            CRM App application to HR efficiency        </p>
        <!--end::Description-->

        <!--begin::Info-->
        <div class="d-flex flex-wrap mb-5">
            <!--begin::Due-->
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">            
                <div class="fs-6 text-gray-800 fw-bold">Mar 14, 2021 </div>
                <div class="fw-semibold text-gray-500">Due Date</div>
            </div>
            <!--end::Due-->

            <!--begin::Budget-->
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                <div class="fs-6 text-gray-800 fw-bold">$605,100.00</div>
                <div class="fw-semibold text-gray-500">Budget</div>
            </div>
            <!--end::Budget-->
        </div>
        <!--end::Info-->

        <!--begin::Progress-->
        <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 100% completed" data-bs-original-title="This project 100% completed" data-kt-initialized="1">
            <div class="bg-success rounded h-4px" role="progressbar" style="width: 100%" aria-valuenow=" 100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <!--end::Progress-->

                    <!--begin::Users-->
            <div class="symbol-group symbol-hover">
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Mad Macy" data-bs-original-title="Mad Macy" data-kt-initialized="1">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-2.jpg">
                                            </div>
                    <!--begin::User-->
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Cris Willson" data-bs-original-title="Cris Willson" data-kt-initialized="1">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-9.jpg">
                                            </div>
                    <!--begin::User-->
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Mike Garcie" data-kt-initialized="1">
                                                    <span class="symbol-label bg-info text-inverse-info fw-bold">M</span>
                                            </div>
                    <!--begin::User-->
                            </div>
            <!--end::Users-->
            </div>
    <!--end:: Card body-->
</a>
<!--end::Card-->    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">
        
<!--begin::Card-->
<a href="/metronic8/demo14/../demo14/apps/projects/project.html" class="card border-hover-primary ">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-9">
        <!--begin::Card Title-->
        <div class="card-title m-0">
            <!--begin::Avatar-->
            <div class="symbol symbol-50px w-50px bg-light">
                <img src="/metronic8/demo14/assets/media/svg/brand-logos/sentry-3.svg" alt="image" class="p-3">
            </div>
            <!--end::Avatar-->
        </div>
        <!--end::Car Title-->

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <span class="badge badge-light fw-bold me-auto px-4 py-3">Pending</span>
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end:: Card header-->

    <!--begin:: Card body-->
    <div class="card-body p-9">
        <!--begin::Name-->
        <div class="fs-3 fw-bold text-gray-900">
            Finance Dispatch        </div>
        <!--end::Name-->

        <!--begin::Description-->
        <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
            CRM App application to HR efficiency        </p>
        <!--end::Description-->

        <!--begin::Info-->
        <div class="d-flex flex-wrap mb-5">
            <!--begin::Due-->
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">            
                <div class="fs-6 text-gray-800 fw-bold">Oct 25, 2023</div>
                <div class="fw-semibold text-gray-500">Due Date</div>
            </div>
            <!--end::Due-->

            <!--begin::Budget-->
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                <div class="fs-6 text-gray-800 fw-bold">$284,900.00</div>
                <div class="fw-semibold text-gray-500">Budget</div>
            </div>
            <!--end::Budget-->
        </div>
        <!--end::Info-->

        <!--begin::Progress-->
        <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 60% completed" data-bs-original-title="This project 60% completed" data-kt-initialized="1">
            <div class="bg-info rounded h-4px" role="progressbar" style="width: 60%" aria-valuenow=" 60" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <!--end::Progress-->

                    <!--begin::Users-->
            <div class="symbol-group symbol-hover">
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Nich Warden" data-kt-initialized="1">
                                                    <span class="symbol-label bg-warning text-inverse-warning fw-bold">N</span>
                                            </div>
                    <!--begin::User-->
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Rob Otto" data-kt-initialized="1">
                                                    <span class="symbol-label bg-success text-inverse-success fw-bold">R</span>
                                            </div>
                    <!--begin::User-->
                            </div>
            <!--end::Users-->
            </div>
    <!--end:: Card body-->
</a>
<!--end::Card-->    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">
        
<!--begin::Card-->
<a href="/metronic8/demo14/../demo14/apps/projects/project.html" class="card border-hover-primary ">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-9">
        <!--begin::Card Title-->
        <div class="card-title m-0">
            <!--begin::Avatar-->
            <div class="symbol symbol-50px w-50px bg-light">
                <img src="/metronic8/demo14/assets/media/svg/brand-logos/xing-icon.svg" alt="image" class="p-3">
            </div>
            <!--end::Avatar-->
        </div>
        <!--end::Car Title-->

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">In Progress</span>
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end:: Card header-->

    <!--begin:: Card body-->
    <div class="card-body p-9">
        <!--begin::Name-->
        <div class="fs-3 fw-bold text-gray-900">
            9 Degree        </div>
        <!--end::Name-->

        <!--begin::Description-->
        <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
            CRM App application to HR efficiency        </p>
        <!--end::Description-->

        <!--begin::Info-->
        <div class="d-flex flex-wrap mb-5">
            <!--begin::Due-->
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">            
                <div class="fs-6 text-gray-800 fw-bold">Jun 24, 2023</div>
                <div class="fw-semibold text-gray-500">Due Date</div>
            </div>
            <!--end::Due-->

            <!--begin::Budget-->
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                <div class="fs-6 text-gray-800 fw-bold">$284,900.00</div>
                <div class="fw-semibold text-gray-500">Budget</div>
            </div>
            <!--end::Budget-->
        </div>
        <!--end::Info-->

        <!--begin::Progress-->
        <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 40% completed" data-bs-original-title="This project 40% completed" data-kt-initialized="1">
            <div class="bg-primary rounded h-4px" role="progressbar" style="width: 40%" aria-valuenow=" 40" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <!--end::Progress-->

                    <!--begin::Users-->
            <div class="symbol-group symbol-hover">
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Francis Mitcham" data-bs-original-title="Francis Mitcham" data-kt-initialized="1">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-20.jpg">
                                            </div>
                    <!--begin::User-->
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Michelle Swanston" data-bs-original-title="Michelle Swanston" data-kt-initialized="1">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-7.jpg">
                                            </div>
                    <!--begin::User-->
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Susan Redwood" data-kt-initialized="1">
                                                    <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                                            </div>
                    <!--begin::User-->
                            </div>
            <!--end::Users-->
            </div>
    <!--end:: Card body-->
</a>
<!--end::Card-->    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">
        
<!--begin::Card-->
<a href="/metronic8/demo14/../demo14/apps/projects/project.html" class="card border-hover-primary ">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-9">
        <!--begin::Card Title-->
        <div class="card-title m-0">
            <!--begin::Avatar-->
            <div class="symbol symbol-50px w-50px bg-light">
                <img src="/metronic8/demo14/assets/media/svg/brand-logos/tvit.svg" alt="image" class="p-3">
            </div>
            <!--end::Avatar-->
        </div>
        <!--end::Car Title-->

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">In Progress</span>
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end:: Card header-->

    <!--begin:: Card body-->
    <div class="card-body p-9">
        <!--begin::Name-->
        <div class="fs-3 fw-bold text-gray-900">
            GoPro App        </div>
        <!--end::Name-->

        <!--begin::Description-->
        <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
            CRM App application to HR efficiency        </p>
        <!--end::Description-->

        <!--begin::Info-->
        <div class="d-flex flex-wrap mb-5">
            <!--begin::Due-->
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">            
                <div class="fs-6 text-gray-800 fw-bold">Jun 24, 2023</div>
                <div class="fw-semibold text-gray-500">Due Date</div>
            </div>
            <!--end::Due-->

            <!--begin::Budget-->
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                <div class="fs-6 text-gray-800 fw-bold">$284,900.00</div>
                <div class="fw-semibold text-gray-500">Budget</div>
            </div>
            <!--end::Budget-->
        </div>
        <!--end::Info-->

        <!--begin::Progress-->
        <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 70% completed" data-bs-original-title="This project 70% completed" data-kt-initialized="1">
            <div class="bg-primary rounded h-4px" role="progressbar" style="width: 70%" aria-valuenow=" 70" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <!--end::Progress-->

                    <!--begin::Users-->
            <div class="symbol-group symbol-hover">
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Melody Macy" data-bs-original-title="Melody Macy" data-kt-initialized="1">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-2.jpg">
                                            </div>
                    <!--begin::User-->
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Robin Watterman" data-kt-initialized="1">
                                                    <span class="symbol-label bg-success text-inverse-success fw-bold">R</span>
                                            </div>
                    <!--begin::User-->
                            </div>
            <!--end::Users-->
            </div>
    <!--end:: Card body-->
</a>
<!--end::Card-->    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">
        
<!--begin::Card-->
<a href="/metronic8/demo14/../demo14/apps/projects/project.html" class="card border-hover-primary ">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-9">
        <!--begin::Card Title-->
        <div class="card-title m-0">
            <!--begin::Avatar-->
            <div class="symbol symbol-50px w-50px bg-light">
                <img src="/metronic8/demo14/assets/media/svg/brand-logos/aven.svg" alt="image" class="p-3">
            </div>
            <!--end::Avatar-->
        </div>
        <!--end::Car Title-->

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <span class="badge badge-light-primary fw-bold me-auto px-4 py-3">In Progress</span>
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end:: Card header-->

    <!--begin:: Card body-->
    <div class="card-body p-9">
        <!--begin::Name-->
        <div class="fs-3 fw-bold text-gray-900">
            Buldozer CRM        </div>
        <!--end::Name-->

        <!--begin::Description-->
        <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
            CRM App application to HR efficiency        </p>
        <!--end::Description-->

        <!--begin::Info-->
        <div class="d-flex flex-wrap mb-5">
            <!--begin::Due-->
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">            
                <div class="fs-6 text-gray-800 fw-bold">May 05, 2023</div>
                <div class="fw-semibold text-gray-500">Due Date</div>
            </div>
            <!--end::Due-->

            <!--begin::Budget-->
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                <div class="fs-6 text-gray-800 fw-bold">$284,900.00</div>
                <div class="fw-semibold text-gray-500">Budget</div>
            </div>
            <!--end::Budget-->
        </div>
        <!--end::Info-->

        <!--begin::Progress-->
        <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 70% completed" data-bs-original-title="This project 70% completed" data-kt-initialized="1">
            <div class="bg-primary rounded h-4px" role="progressbar" style="width: 70%" aria-valuenow=" 70" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <!--end::Progress-->

                    <!--begin::Users-->
            <div class="symbol-group symbol-hover">
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Melody Macy" data-bs-original-title="Melody Macy" data-kt-initialized="1">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-2.jpg">
                                            </div>
                    <!--begin::User-->
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="John Mixin" data-bs-original-title="John Mixin" data-kt-initialized="1">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-14.jpg">
                                            </div>
                    <!--begin::User-->
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Emma Smith" data-kt-initialized="1">
                                                    <span class="symbol-label bg-primary text-inverse-primary fw-bold">S</span>
                                            </div>
                    <!--begin::User-->
                            </div>
            <!--end::Users-->
            </div>
    <!--end:: Card body-->
</a>
<!--end::Card-->    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">
        
<!--begin::Card-->
<a href="/metronic8/demo14/../demo14/apps/projects/project.html" class="card border-hover-primary ">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-9">
        <!--begin::Card Title-->
        <div class="card-title m-0">
            <!--begin::Avatar-->
            <div class="symbol symbol-50px w-50px bg-light">
                <img src="/metronic8/demo14/assets/media/svg/brand-logos/treva.svg" alt="image" class="p-3">
            </div>
            <!--end::Avatar-->
        </div>
        <!--end::Car Title-->

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <span class="badge badge-light-danger fw-bold me-auto px-4 py-3">Overdue</span>
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end:: Card header-->

    <!--begin:: Card body-->
    <div class="card-body p-9">
        <!--begin::Name-->
        <div class="fs-3 fw-bold text-gray-900">
            Aviasales App        </div>
        <!--end::Name-->

        <!--begin::Description-->
        <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
            CRM App application to HR efficiency        </p>
        <!--end::Description-->

        <!--begin::Info-->
        <div class="d-flex flex-wrap mb-5">
            <!--begin::Due-->
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">            
                <div class="fs-6 text-gray-800 fw-bold">Jul 25, 2023</div>
                <div class="fw-semibold text-gray-500">Due Date</div>
            </div>
            <!--end::Due-->

            <!--begin::Budget-->
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                <div class="fs-6 text-gray-800 fw-bold">$284,900.00</div>
                <div class="fw-semibold text-gray-500">Budget</div>
            </div>
            <!--end::Budget-->
        </div>
        <!--end::Info-->

        <!--begin::Progress-->
        <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 10% completed" data-bs-original-title="This project 10% completed" data-kt-initialized="1">
            <div class="bg-danger rounded h-4px" role="progressbar" style="width: 10%" aria-valuenow=" 10" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <!--end::Progress-->

                    <!--begin::Users-->
            <div class="symbol-group symbol-hover">
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Alan Warden" data-kt-initialized="1">
                                                    <span class="symbol-label bg-warning text-inverse-warning fw-bold">A</span>
                                            </div>
                    <!--begin::User-->
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Brian Cox" data-bs-original-title="Brian Cox" data-kt-initialized="1">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-5.jpg">
                                            </div>
                    <!--begin::User-->
                            </div>
            <!--end::Users-->
            </div>
    <!--end:: Card body-->
</a>
<!--end::Card-->    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-md-6 col-xl-4">
        
<!--begin::Card-->
<a href="/metronic8/demo14/../demo14/apps/projects/project.html" class="card border-hover-primary ">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-9">
        <!--begin::Card Title-->
        <div class="card-title m-0">
            <!--begin::Avatar-->
            <div class="symbol symbol-50px w-50px bg-light">
                <img src="/metronic8/demo14/assets/media/svg/brand-logos/kanba.svg" alt="image" class="p-3">
            </div>
            <!--end::Avatar-->
        </div>
        <!--end::Car Title-->

        <!--begin::Card toolbar-->
        <div class="card-toolbar">
            <span class="badge badge-light-success fw-bold me-auto px-4 py-3">Completed</span>
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end:: Card header-->

    <!--begin:: Card body-->
    <div class="card-body p-9">
        <!--begin::Name-->
        <div class="fs-3 fw-bold text-gray-900">
            Oppo CRM        </div>
        <!--end::Name-->

        <!--begin::Description-->
        <p class="text-gray-500 fw-semibold fs-5 mt-1 mb-7">
            CRM App application to HR efficiency        </p>
        <!--end::Description-->

        <!--begin::Info-->
        <div class="d-flex flex-wrap mb-5">
            <!--begin::Due-->
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">            
                <div class="fs-6 text-gray-800 fw-bold">Nov 10, 2023</div>
                <div class="fw-semibold text-gray-500">Due Date</div>
            </div>
            <!--end::Due-->

            <!--begin::Budget-->
            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                <div class="fs-6 text-gray-800 fw-bold">$284,900.00</div>
                <div class="fw-semibold text-gray-500">Budget</div>
            </div>
            <!--end::Budget-->
        </div>
        <!--end::Info-->

        <!--begin::Progress-->
        <div class="h-4px w-100 bg-light mb-5" data-bs-toggle="tooltip" aria-label="This project 100% completed" data-bs-original-title="This project 100% completed" data-kt-initialized="1">
            <div class="bg-success rounded h-4px" role="progressbar" style="width: 100%" aria-valuenow=" 100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <!--end::Progress-->

                    <!--begin::Users-->
            <div class="symbol-group symbol-hover">
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Nick Macy" data-bs-original-title="Nick Macy" data-kt-initialized="1">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-2.jpg">
                                            </div>
                    <!--begin::User-->
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" aria-label="Sean Paul" data-bs-original-title="Sean Paul" data-kt-initialized="1">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-9.jpg">
                                            </div>
                    <!--begin::User-->
                                    <!--begin::User-->
                    <div class="symbol symbol-35px symbol-circle" data-bs-toggle="tooltip" data-bs-original-title="Mike Collin" data-kt-initialized="1">
                                                    <span class="symbol-label bg-info text-inverse-info fw-bold">M</span>
                                            </div>
                    <!--begin::User-->
                            </div>
            <!--end::Users-->
            </div>
    <!--end:: Card body-->
</a>
<!--end::Card-->    </div>
    <!--end::Col-->
</div>
<!--end::Row-->

<!--begin::Pagination-->
<div class="d-flex flex-stack flex-wrap pt-10">
    <div class="fs-6 fw-semibold text-gray-700">
        Showing 1 to 10 of 50 entries
    </div>

    <!--begin::Pages-->
    <ul class="pagination">
        <li class="page-item previous">
            <a href="#" class="page-link"><i class="previous"></i></a>
        </li>

        <li class="page-item active">
            <a href="#" class="page-link">1</a>
        </li>

        <li class="page-item">
            <a href="#" class="page-link">2</a>
        </li>

        <li class="page-item">
            <a href="#" class="page-link">3</a>
        </li>

        <li class="page-item">
            <a href="#" class="page-link">4</a>
        </li>

        <li class="page-item">
            <a href="#" class="page-link">5</a>
        </li>

        <li class="page-item">
            <a href="#" class="page-link">6</a>
        </li>

        <li class="page-item next">
            <a href="#" class="page-link"><i class="next"></i></a>
        </li>
    </ul>
    <!--end::Pages-->
</div>
<!--end::Pagination-->
<!--begin::Modals-->

<!--begin::Modal - View Users-->
<div class="modal fade" id="kt_modal_view_users" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                <!--begin::Heading-->
                <div class="text-center mb-13">
                    <!--begin::Title-->
                    <h1 class="mb-3">Browse Users</h1>
                    <!--end::Title-->

                    <!--begin::Description-->
                    <div class="text-muted fw-semibold fs-5">
                        If you need more info, please check out our 
                        <a href="#" class="link-primary fw-bold">Users Directory</a>.
                    </div>
                    <!--end::Description-->
                </div>
                <!--end::Heading-->

                <!--begin::Users-->
                <div class="mb-15">
                    <!--begin::List-->
                    <div class="mh-375px scroll-y me-n7 pe-7">
                                                                                <!--begin::User-->
                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-6.jpg">
                                                                            </div>
                                    <!--end::Avatar-->

                                    <!--begin::Details-->
                                    <div class="ms-6">
                                        <!--begin::Name-->
                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                            Emma Smith   

                                            <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                Art Director                                            </span>
                                        </a>
                                        <!--end::Name-->

                                        <!--begin::Email-->
                                        <div class="fw-semibold text-muted">smith@kpmg.com</div>
                                        <!--end::Email-->
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Stats-->
                                <div class="d-flex">
                                    <!--begin::Sales-->
                                    <div class="text-end">
                                        <div class="fs-5 fw-bold text-gray-900">$23,000</div>

                                        <div class="fs-7 text-muted">Sales</div>
                                    </div>
                                    <!--end::Sales-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::User-->
                                                                                <!--begin::User-->
                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                                M                                            </span>
                                                                            </div>
                                    <!--end::Avatar-->

                                    <!--begin::Details-->
                                    <div class="ms-6">
                                        <!--begin::Name-->
                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                            Melody Macy   

                                            <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                Marketing Analytic                                            </span>
                                        </a>
                                        <!--end::Name-->

                                        <!--begin::Email-->
                                        <div class="fw-semibold text-muted">melody@altbox.com</div>
                                        <!--end::Email-->
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Stats-->
                                <div class="d-flex">
                                    <!--begin::Sales-->
                                    <div class="text-end">
                                        <div class="fs-5 fw-bold text-gray-900">$50,500</div>

                                        <div class="fs-7 text-muted">Sales</div>
                                    </div>
                                    <!--end::Sales-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::User-->
                                                                                <!--begin::User-->
                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-1.jpg">
                                                                            </div>
                                    <!--end::Avatar-->

                                    <!--begin::Details-->
                                    <div class="ms-6">
                                        <!--begin::Name-->
                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                            Max Smith   

                                            <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                Software Enginer                                            </span>
                                        </a>
                                        <!--end::Name-->

                                        <!--begin::Email-->
                                        <div class="fw-semibold text-muted">max@kt.com</div>
                                        <!--end::Email-->
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Stats-->
                                <div class="d-flex">
                                    <!--begin::Sales-->
                                    <div class="text-end">
                                        <div class="fs-5 fw-bold text-gray-900">$75,900</div>

                                        <div class="fs-7 text-muted">Sales</div>
                                    </div>
                                    <!--end::Sales-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::User-->
                                                                                <!--begin::User-->
                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-5.jpg">
                                                                            </div>
                                    <!--end::Avatar-->

                                    <!--begin::Details-->
                                    <div class="ms-6">
                                        <!--begin::Name-->
                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                            Sean Bean   

                                            <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                Web Developer                                            </span>
                                        </a>
                                        <!--end::Name-->

                                        <!--begin::Email-->
                                        <div class="fw-semibold text-muted">sean@dellito.com</div>
                                        <!--end::Email-->
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Stats-->
                                <div class="d-flex">
                                    <!--begin::Sales-->
                                    <div class="text-end">
                                        <div class="fs-5 fw-bold text-gray-900">$10,500</div>

                                        <div class="fs-7 text-muted">Sales</div>
                                    </div>
                                    <!--end::Sales-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::User-->
                                                                                <!--begin::User-->
                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-25.jpg">
                                                                            </div>
                                    <!--end::Avatar-->

                                    <!--begin::Details-->
                                    <div class="ms-6">
                                        <!--begin::Name-->
                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                            Brian Cox   

                                            <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                UI/UX Designer                                            </span>
                                        </a>
                                        <!--end::Name-->

                                        <!--begin::Email-->
                                        <div class="fw-semibold text-muted">brian@exchange.com</div>
                                        <!--end::Email-->
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Stats-->
                                <div class="d-flex">
                                    <!--begin::Sales-->
                                    <div class="text-end">
                                        <div class="fs-5 fw-bold text-gray-900">$20,000</div>

                                        <div class="fs-7 text-muted">Sales</div>
                                    </div>
                                    <!--end::Sales-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::User-->
                                                                                <!--begin::User-->
                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                                                                    <span class="symbol-label bg-light-warning text-warning fw-semibold">
                                                C                                            </span>
                                                                            </div>
                                    <!--end::Avatar-->

                                    <!--begin::Details-->
                                    <div class="ms-6">
                                        <!--begin::Name-->
                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                            Mikaela Collins   

                                            <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                Head Of Marketing                                            </span>
                                        </a>
                                        <!--end::Name-->

                                        <!--begin::Email-->
                                        <div class="fw-semibold text-muted">mik@pex.com</div>
                                        <!--end::Email-->
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Stats-->
                                <div class="d-flex">
                                    <!--begin::Sales-->
                                    <div class="text-end">
                                        <div class="fs-5 fw-bold text-gray-900">$9,300</div>

                                        <div class="fs-7 text-muted">Sales</div>
                                    </div>
                                    <!--end::Sales-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::User-->
                                                                                <!--begin::User-->
                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-9.jpg">
                                                                            </div>
                                    <!--end::Avatar-->

                                    <!--begin::Details-->
                                    <div class="ms-6">
                                        <!--begin::Name-->
                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                            Francis Mitcham   

                                            <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                Software Arcitect                                            </span>
                                        </a>
                                        <!--end::Name-->

                                        <!--begin::Email-->
                                        <div class="fw-semibold text-muted">f.mit@kpmg.com</div>
                                        <!--end::Email-->
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Stats-->
                                <div class="d-flex">
                                    <!--begin::Sales-->
                                    <div class="text-end">
                                        <div class="fs-5 fw-bold text-gray-900">$15,000</div>

                                        <div class="fs-7 text-muted">Sales</div>
                                    </div>
                                    <!--end::Sales-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::User-->
                                                                                <!--begin::User-->
                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                                O                                            </span>
                                                                            </div>
                                    <!--end::Avatar-->

                                    <!--begin::Details-->
                                    <div class="ms-6">
                                        <!--begin::Name-->
                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                            Olivia Wild   

                                            <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                System Admin                                            </span>
                                        </a>
                                        <!--end::Name-->

                                        <!--begin::Email-->
                                        <div class="fw-semibold text-muted">olivia@corpmail.com</div>
                                        <!--end::Email-->
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Stats-->
                                <div class="d-flex">
                                    <!--begin::Sales-->
                                    <div class="text-end">
                                        <div class="fs-5 fw-bold text-gray-900">$23,000</div>

                                        <div class="fs-7 text-muted">Sales</div>
                                    </div>
                                    <!--end::Sales-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::User-->
                                                                                <!--begin::User-->
                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                                                                    <span class="symbol-label bg-light-primary text-primary fw-semibold">
                                                N                                            </span>
                                                                            </div>
                                    <!--end::Avatar-->

                                    <!--begin::Details-->
                                    <div class="ms-6">
                                        <!--begin::Name-->
                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                            Neil Owen   

                                            <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                Account Manager                                            </span>
                                        </a>
                                        <!--end::Name-->

                                        <!--begin::Email-->
                                        <div class="fw-semibold text-muted">owen.neil@gmail.com</div>
                                        <!--end::Email-->
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Stats-->
                                <div class="d-flex">
                                    <!--begin::Sales-->
                                    <div class="text-end">
                                        <div class="fs-5 fw-bold text-gray-900">$45,800</div>

                                        <div class="fs-7 text-muted">Sales</div>
                                    </div>
                                    <!--end::Sales-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::User-->
                                                                                <!--begin::User-->
                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-23.jpg">
                                                                            </div>
                                    <!--end::Avatar-->

                                    <!--begin::Details-->
                                    <div class="ms-6">
                                        <!--begin::Name-->
                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                            Dan Wilson   

                                            <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                Web Desinger                                            </span>
                                        </a>
                                        <!--end::Name-->

                                        <!--begin::Email-->
                                        <div class="fw-semibold text-muted">dam@consilting.com</div>
                                        <!--end::Email-->
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Stats-->
                                <div class="d-flex">
                                    <!--begin::Sales-->
                                    <div class="text-end">
                                        <div class="fs-5 fw-bold text-gray-900">$90,500</div>

                                        <div class="fs-7 text-muted">Sales</div>
                                    </div>
                                    <!--end::Sales-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::User-->
                                                                                <!--begin::User-->
                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                                E                                            </span>
                                                                            </div>
                                    <!--end::Avatar-->

                                    <!--begin::Details-->
                                    <div class="ms-6">
                                        <!--begin::Name-->
                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                            Emma Bold   

                                            <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                Corporate Finance                                            </span>
                                        </a>
                                        <!--end::Name-->

                                        <!--begin::Email-->
                                        <div class="fw-semibold text-muted">emma@intenso.com</div>
                                        <!--end::Email-->
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Stats-->
                                <div class="d-flex">
                                    <!--begin::Sales-->
                                    <div class="text-end">
                                        <div class="fs-5 fw-bold text-gray-900">$5,000</div>

                                        <div class="fs-7 text-muted">Sales</div>
                                    </div>
                                    <!--end::Sales-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::User-->
                                                                                <!--begin::User-->
                            <div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-12.jpg">
                                                                            </div>
                                    <!--end::Avatar-->

                                    <!--begin::Details-->
                                    <div class="ms-6">
                                        <!--begin::Name-->
                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                            Ana Crown   

                                            <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                Customer Relationship                                            </span>
                                        </a>
                                        <!--end::Name-->

                                        <!--begin::Email-->
                                        <div class="fw-semibold text-muted">ana.cf@limtel.com</div>
                                        <!--end::Email-->
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Stats-->
                                <div class="d-flex">
                                    <!--begin::Sales-->
                                    <div class="text-end">
                                        <div class="fs-5 fw-bold text-gray-900">$70,000</div>

                                        <div class="fs-7 text-muted">Sales</div>
                                    </div>
                                    <!--end::Sales-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::User-->
                                                                                <!--begin::User-->
                            <div class="d-flex flex-stack py-5 ">
                                <!--begin::Details-->
                                <div class="d-flex align-items-center">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-35px symbol-circle">
                                                                                    <span class="symbol-label bg-light-info text-info fw-semibold">
                                                A                                            </span>
                                                                            </div>
                                    <!--end::Avatar-->

                                    <!--begin::Details-->
                                    <div class="ms-6">
                                        <!--begin::Name-->
                                        <a href="#" class="d-flex align-items-center fs-5 fw-bold text-gray-900 text-hover-primary">
                                            Robert Doe   

                                            <span class="badge badge-light fs-8 fw-semibold ms-2">
                                                Marketing Executive                                            </span>
                                        </a>
                                        <!--end::Name-->

                                        <!--begin::Email-->
                                        <div class="fw-semibold text-muted">robert@benko.com</div>
                                        <!--end::Email-->
                                    </div>
                                    <!--end::Details-->
                                </div>
                                <!--end::Details-->

                                <!--begin::Stats-->
                                <div class="d-flex">
                                    <!--begin::Sales-->
                                    <div class="text-end">
                                        <div class="fs-5 fw-bold text-gray-900">$45,500</div>

                                        <div class="fs-7 text-muted">Sales</div>
                                    </div>
                                    <!--end::Sales-->
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::User-->
                                            </div>
                    <!--end::List-->
                </div>
                <!--end::Users-->

                <!--begin::Notice-->
                <div class="d-flex justify-content-between">
                    <!--begin::Label-->                        
                    <div class="fw-semibold">
                        <label class="fs-6">Adding Users by Team Members</label>

                        <div class="fs-7 text-muted">If you need more info, please check budget planning</div>
                    </div>
                    <!--end::Label-->   

                    <!--begin::Switch-->
                    <label class="form-check form-switch form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" value="" checked="checked">

                        <span class="form-check-label fw-semibold text-muted">
                            Allowed
                        </span>
                    </label>
                    <!--end::Switch-->
                </div>
                <!--end::Notice-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - View Users--><!--begin::Modal - Users Search-->
<div class="modal fade" id="kt_modal_users_search" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                <!--begin::Content-->
                <div class="text-center mb-13">
                    <h1 class="mb-3">Search Users</h1>

                    <div class="text-muted fw-semibold fs-5">
                        Invite Collaborators To Your Project
                    </div>
                </div>
                <!--end::Content-->

                <!--begin::Search-->
                <div id="kt_modal_users_search_handler" data-kt-search-keypress="true" data-kt-search-min-length="2" data-kt-search-enter="enter" data-kt-search-layout="inline" data-kt-search="true">

                    <!--begin::Form-->
                    <form data-kt-search-element="form" class="w-100 position-relative mb-5" autocomplete="off">	
                        <!--begin::Hidden input(Added to disable form autocomplete)-->
                        <input type="hidden">
                        <!--end::Hidden input-->

                        <!--begin::Icon-->
                        <i class="ki-duotone ki-magnifier fs-2 fs-lg-1 text-gray-500 position-absolute top-50 ms-5 translate-middle-y"><span class="path1"></span><span class="path2"></span></i>                        <!--end::Icon-->

                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-lg form-control-solid px-15" name="search" value="" placeholder="Search by username, full name or email..." data-kt-search-element="input">
                        <!--end::Input-->

                        <!--begin::Spinner-->
                        <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
                            <span class="spinner-border h-15px w-15px align-middle text-muted"></span>
                        </span>
                        <!--end::Spinner-->

                        <!--begin::Reset-->
                        <span class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 me-5 d-none" data-kt-search-element="clear">
                            <i class="ki-duotone ki-cross fs-2 fs-lg-1 me-0"><span class="path1"></span><span class="path2"></span></i>                        </span>
                        <!--end::Reset-->
                    </form>
                    <!--end::Form-->

                    <!--begin::Wrapper-->
                    <div class="py-5">                            
                        <!--begin::Suggestions-->
<div data-kt-search-element="suggestions">
    <!--begin::Heading-->
    <h3 class="fw-semibold mb-5">Recently searched:</h3>
    <!--end::Heading-->

    <!--begin::Users-->
    <div class="mh-375px scroll-y me-n7 pe-7">
                                <!--begin::User-->
            <a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                <!--begin::Avatar-->
                <div class="symbol symbol-35px symbol-circle me-5">
                                            <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-6.jpg">
                                    </div>
                <!--end::Avatar-->

                <!--begin::Info-->
                <div class="fw-semibold">
                    <span class="fs-6 text-gray-800 me-2">Emma Smith</span>
                    <span class="badge badge-light">Art Director</span>
                </div>
                <!--end::Info-->
            </a>
            <!--end::User-->
                                <!--begin::User-->
            <a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                <!--begin::Avatar-->
                <div class="symbol symbol-35px symbol-circle me-5">
                                            <span class="symbol-label bg-light-danger text-danger fw-semibold">
                            M                        </span>
                                    </div>
                <!--end::Avatar-->

                <!--begin::Info-->
                <div class="fw-semibold">
                    <span class="fs-6 text-gray-800 me-2">Melody Macy</span>
                    <span class="badge badge-light">Marketing Analytic</span>
                </div>
                <!--end::Info-->
            </a>
            <!--end::User-->
                                <!--begin::User-->
            <a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                <!--begin::Avatar-->
                <div class="symbol symbol-35px symbol-circle me-5">
                                            <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-1.jpg">
                                    </div>
                <!--end::Avatar-->

                <!--begin::Info-->
                <div class="fw-semibold">
                    <span class="fs-6 text-gray-800 me-2">Max Smith</span>
                    <span class="badge badge-light">Software Enginer</span>
                </div>
                <!--end::Info-->
            </a>
            <!--end::User-->
                                <!--begin::User-->
            <a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                <!--begin::Avatar-->
                <div class="symbol symbol-35px symbol-circle me-5">
                                            <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-5.jpg">
                                    </div>
                <!--end::Avatar-->

                <!--begin::Info-->
                <div class="fw-semibold">
                    <span class="fs-6 text-gray-800 me-2">Sean Bean</span>
                    <span class="badge badge-light">Web Developer</span>
                </div>
                <!--end::Info-->
            </a>
            <!--end::User-->
                                <!--begin::User-->
            <a href="#" class="d-flex align-items-center p-3 rounded bg-state-light bg-state-opacity-50 mb-1">
                <!--begin::Avatar-->
                <div class="symbol symbol-35px symbol-circle me-5">
                                            <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-25.jpg">
                                    </div>
                <!--end::Avatar-->

                <!--begin::Info-->
                <div class="fw-semibold">
                    <span class="fs-6 text-gray-800 me-2">Brian Cox</span>
                    <span class="badge badge-light">UI/UX Designer</span>
                </div>
                <!--end::Info-->
            </a>
            <!--end::User-->
            </div>
    <!--end::Users-->
</div>
<!--end::Suggestions-->
                        
<!--begin::Results(add d-none to below element to hide the users list by default)-->
<div data-kt-search-element="results" class="d-none">
    <!--begin::Users-->
    <div class="mh-375px scroll-y me-n7 pe-7">
                                <!--begin::User-->
            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="0">
                <!--begin::Details-->
                <div class="d-flex align-items-center">
                    <!--begin::Checkbox-->
                    <label class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='0']" value="0">
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Avatar-->
                    <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-6.jpg">
                                            </div>
                    <!--end::Avatar-->

                    <!--begin::Details-->
                    <div class="ms-5">
                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma Smith</a>

                        <div class="fw-semibold text-muted">smith@kpmg.com</div>
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Details-->

                <!--begin::Access menu-->
                <div class="ms-2 w-100px">
                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-12-7j6s" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                        <option value="1">Guest</option>
                        <option value="2" selected="" data-select2-id="select2-data-14-3qpu">Owner</option>
                        <option value="3">Can Edit</option>
                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-13-32e2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-g1kx-container" aria-controls="select2-g1kx-container"><span class="select2-selection__rendered" id="select2-g1kx-container" role="textbox" aria-readonly="true" title="Owner">Owner</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
                <!--end::Access menu-->
            </div>
            <!--end::User-->

                            <!--begin::Separator-->
                <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                <!--end::Separator-->
            
                                <!--begin::User-->
            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="1">
                <!--begin::Details-->
                <div class="d-flex align-items-center">
                    <!--begin::Checkbox-->
                    <label class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='1']" value="1">
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Avatar-->
                    <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                M                            </span>
                                            </div>
                    <!--end::Avatar-->

                    <!--begin::Details-->
                    <div class="ms-5">
                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Melody Macy</a>

                        <div class="fw-semibold text-muted">melody@altbox.com</div>
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Details-->

                <!--begin::Access menu-->
                <div class="ms-2 w-100px">
                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-15-t5lj" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                        <option value="1" selected="" data-select2-id="select2-data-17-z3qr">Guest</option>
                        <option value="2">Owner</option>
                        <option value="3">Can Edit</option>
                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-16-3yh9" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-gqy6-container" aria-controls="select2-gqy6-container"><span class="select2-selection__rendered" id="select2-gqy6-container" role="textbox" aria-readonly="true" title="Guest">Guest</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
                <!--end::Access menu-->
            </div>
            <!--end::User-->

                            <!--begin::Separator-->
                <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                <!--end::Separator-->
            
                                <!--begin::User-->
            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="2">
                <!--begin::Details-->
                <div class="d-flex align-items-center">
                    <!--begin::Checkbox-->
                    <label class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='2']" value="2">
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Avatar-->
                    <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-1.jpg">
                                            </div>
                    <!--end::Avatar-->

                    <!--begin::Details-->
                    <div class="ms-5">
                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Max Smith</a>

                        <div class="fw-semibold text-muted">max@kt.com</div>
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Details-->

                <!--begin::Access menu-->
                <div class="ms-2 w-100px">
                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-18-01gd" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                        <option value="1">Guest</option>
                        <option value="2">Owner</option>
                        <option value="3" selected="" data-select2-id="select2-data-20-9i2k">Can Edit</option>
                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-19-23fv" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-fyry-container" aria-controls="select2-fyry-container"><span class="select2-selection__rendered" id="select2-fyry-container" role="textbox" aria-readonly="true" title="Can Edit">Can Edit</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
                <!--end::Access menu-->
            </div>
            <!--end::User-->

                            <!--begin::Separator-->
                <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                <!--end::Separator-->
            
                                <!--begin::User-->
            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="3">
                <!--begin::Details-->
                <div class="d-flex align-items-center">
                    <!--begin::Checkbox-->
                    <label class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='3']" value="3">
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Avatar-->
                    <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-5.jpg">
                                            </div>
                    <!--end::Avatar-->

                    <!--begin::Details-->
                    <div class="ms-5">
                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Sean Bean</a>

                        <div class="fw-semibold text-muted">sean@dellito.com</div>
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Details-->

                <!--begin::Access menu-->
                <div class="ms-2 w-100px">
                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-21-79r3" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                        <option value="1">Guest</option>
                        <option value="2" selected="" data-select2-id="select2-data-23-o7p8">Owner</option>
                        <option value="3">Can Edit</option>
                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-22-kycy" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-owlu-container" aria-controls="select2-owlu-container"><span class="select2-selection__rendered" id="select2-owlu-container" role="textbox" aria-readonly="true" title="Owner">Owner</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
                <!--end::Access menu-->
            </div>
            <!--end::User-->

                            <!--begin::Separator-->
                <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                <!--end::Separator-->
            
                                <!--begin::User-->
            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="4">
                <!--begin::Details-->
                <div class="d-flex align-items-center">
                    <!--begin::Checkbox-->
                    <label class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='4']" value="4">
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Avatar-->
                    <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-25.jpg">
                                            </div>
                    <!--end::Avatar-->

                    <!--begin::Details-->
                    <div class="ms-5">
                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Brian Cox</a>

                        <div class="fw-semibold text-muted">brian@exchange.com</div>
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Details-->

                <!--begin::Access menu-->
                <div class="ms-2 w-100px">
                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-24-ox4i" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                        <option value="1">Guest</option>
                        <option value="2">Owner</option>
                        <option value="3" selected="" data-select2-id="select2-data-26-ybww">Can Edit</option>
                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-25-xe44" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-m19j-container" aria-controls="select2-m19j-container"><span class="select2-selection__rendered" id="select2-m19j-container" role="textbox" aria-readonly="true" title="Can Edit">Can Edit</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
                <!--end::Access menu-->
            </div>
            <!--end::User-->

                            <!--begin::Separator-->
                <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                <!--end::Separator-->
            
                                <!--begin::User-->
            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="5">
                <!--begin::Details-->
                <div class="d-flex align-items-center">
                    <!--begin::Checkbox-->
                    <label class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='5']" value="5">
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Avatar-->
                    <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-warning text-warning fw-semibold">
                                C                            </span>
                                            </div>
                    <!--end::Avatar-->

                    <!--begin::Details-->
                    <div class="ms-5">
                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Mikaela Collins</a>

                        <div class="fw-semibold text-muted">mik@pex.com</div>
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Details-->

                <!--begin::Access menu-->
                <div class="ms-2 w-100px">
                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-27-yoku" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                        <option value="1">Guest</option>
                        <option value="2" selected="" data-select2-id="select2-data-29-u2t8">Owner</option>
                        <option value="3">Can Edit</option>
                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-28-ycmi" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-2ybo-container" aria-controls="select2-2ybo-container"><span class="select2-selection__rendered" id="select2-2ybo-container" role="textbox" aria-readonly="true" title="Owner">Owner</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
                <!--end::Access menu-->
            </div>
            <!--end::User-->

                            <!--begin::Separator-->
                <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                <!--end::Separator-->
            
                                <!--begin::User-->
            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="6">
                <!--begin::Details-->
                <div class="d-flex align-items-center">
                    <!--begin::Checkbox-->
                    <label class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='6']" value="6">
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Avatar-->
                    <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-9.jpg">
                                            </div>
                    <!--end::Avatar-->

                    <!--begin::Details-->
                    <div class="ms-5">
                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Francis Mitcham</a>

                        <div class="fw-semibold text-muted">f.mit@kpmg.com</div>
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Details-->

                <!--begin::Access menu-->
                <div class="ms-2 w-100px">
                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-30-cie6" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                        <option value="1">Guest</option>
                        <option value="2">Owner</option>
                        <option value="3" selected="" data-select2-id="select2-data-32-jhgt">Can Edit</option>
                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-31-xnef" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-w2ee-container" aria-controls="select2-w2ee-container"><span class="select2-selection__rendered" id="select2-w2ee-container" role="textbox" aria-readonly="true" title="Can Edit">Can Edit</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
                <!--end::Access menu-->
            </div>
            <!--end::User-->

                            <!--begin::Separator-->
                <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                <!--end::Separator-->
            
                                <!--begin::User-->
            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="7">
                <!--begin::Details-->
                <div class="d-flex align-items-center">
                    <!--begin::Checkbox-->
                    <label class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='7']" value="7">
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Avatar-->
                    <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                O                            </span>
                                            </div>
                    <!--end::Avatar-->

                    <!--begin::Details-->
                    <div class="ms-5">
                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Olivia Wild</a>

                        <div class="fw-semibold text-muted">olivia@corpmail.com</div>
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Details-->

                <!--begin::Access menu-->
                <div class="ms-2 w-100px">
                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-33-w7l9" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                        <option value="1">Guest</option>
                        <option value="2" selected="" data-select2-id="select2-data-35-54st">Owner</option>
                        <option value="3">Can Edit</option>
                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-34-9ve0" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-rz3p-container" aria-controls="select2-rz3p-container"><span class="select2-selection__rendered" id="select2-rz3p-container" role="textbox" aria-readonly="true" title="Owner">Owner</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
                <!--end::Access menu-->
            </div>
            <!--end::User-->

                            <!--begin::Separator-->
                <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                <!--end::Separator-->
            
                                <!--begin::User-->
            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="8">
                <!--begin::Details-->
                <div class="d-flex align-items-center">
                    <!--begin::Checkbox-->
                    <label class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='8']" value="8">
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Avatar-->
                    <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-primary text-primary fw-semibold">
                                N                            </span>
                                            </div>
                    <!--end::Avatar-->

                    <!--begin::Details-->
                    <div class="ms-5">
                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Neil Owen</a>

                        <div class="fw-semibold text-muted">owen.neil@gmail.com</div>
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Details-->

                <!--begin::Access menu-->
                <div class="ms-2 w-100px">
                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-36-me3p" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                        <option value="1" selected="" data-select2-id="select2-data-38-xenv">Guest</option>
                        <option value="2">Owner</option>
                        <option value="3">Can Edit</option>
                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-37-rmvj" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-mjmu-container" aria-controls="select2-mjmu-container"><span class="select2-selection__rendered" id="select2-mjmu-container" role="textbox" aria-readonly="true" title="Guest">Guest</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
                <!--end::Access menu-->
            </div>
            <!--end::User-->

                            <!--begin::Separator-->
                <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                <!--end::Separator-->
            
                                <!--begin::User-->
            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="9">
                <!--begin::Details-->
                <div class="d-flex align-items-center">
                    <!--begin::Checkbox-->
                    <label class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='9']" value="9">
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Avatar-->
                    <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-23.jpg">
                                            </div>
                    <!--end::Avatar-->

                    <!--begin::Details-->
                    <div class="ms-5">
                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Dan Wilson</a>

                        <div class="fw-semibold text-muted">dam@consilting.com</div>
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Details-->

                <!--begin::Access menu-->
                <div class="ms-2 w-100px">
                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-39-r7xq" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                        <option value="1">Guest</option>
                        <option value="2">Owner</option>
                        <option value="3" selected="" data-select2-id="select2-data-41-msfm">Can Edit</option>
                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-40-3bgj" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-zgxl-container" aria-controls="select2-zgxl-container"><span class="select2-selection__rendered" id="select2-zgxl-container" role="textbox" aria-readonly="true" title="Can Edit">Can Edit</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
                <!--end::Access menu-->
            </div>
            <!--end::User-->

                            <!--begin::Separator-->
                <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                <!--end::Separator-->
            
                                <!--begin::User-->
            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="10">
                <!--begin::Details-->
                <div class="d-flex align-items-center">
                    <!--begin::Checkbox-->
                    <label class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='10']" value="10">
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Avatar-->
                    <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                E                            </span>
                                            </div>
                    <!--end::Avatar-->

                    <!--begin::Details-->
                    <div class="ms-5">
                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Emma Bold</a>

                        <div class="fw-semibold text-muted">emma@intenso.com</div>
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Details-->

                <!--begin::Access menu-->
                <div class="ms-2 w-100px">
                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-42-335b" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                        <option value="1">Guest</option>
                        <option value="2" selected="" data-select2-id="select2-data-44-aofh">Owner</option>
                        <option value="3">Can Edit</option>
                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-43-vbtc" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-ulue-container" aria-controls="select2-ulue-container"><span class="select2-selection__rendered" id="select2-ulue-container" role="textbox" aria-readonly="true" title="Owner">Owner</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
                <!--end::Access menu-->
            </div>
            <!--end::User-->

                            <!--begin::Separator-->
                <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                <!--end::Separator-->
            
                                <!--begin::User-->
            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="11">
                <!--begin::Details-->
                <div class="d-flex align-items-center">
                    <!--begin::Checkbox-->
                    <label class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='11']" value="11">
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Avatar-->
                    <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-12.jpg">
                                            </div>
                    <!--end::Avatar-->

                    <!--begin::Details-->
                    <div class="ms-5">
                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Ana Crown</a>

                        <div class="fw-semibold text-muted">ana.cf@limtel.com</div>
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Details-->

                <!--begin::Access menu-->
                <div class="ms-2 w-100px">
                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-45-llv5" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                        <option value="1" selected="" data-select2-id="select2-data-47-e6x0">Guest</option>
                        <option value="2">Owner</option>
                        <option value="3">Can Edit</option>
                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-46-x0j2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-uvrb-container" aria-controls="select2-uvrb-container"><span class="select2-selection__rendered" id="select2-uvrb-container" role="textbox" aria-readonly="true" title="Guest">Guest</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
                <!--end::Access menu-->
            </div>
            <!--end::User-->

                            <!--begin::Separator-->
                <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                <!--end::Separator-->
            
                                <!--begin::User-->
            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="12">
                <!--begin::Details-->
                <div class="d-flex align-items-center">
                    <!--begin::Checkbox-->
                    <label class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='12']" value="12">
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Avatar-->
                    <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-info text-info fw-semibold">
                                A                            </span>
                                            </div>
                    <!--end::Avatar-->

                    <!--begin::Details-->
                    <div class="ms-5">
                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Robert Doe</a>

                        <div class="fw-semibold text-muted">robert@benko.com</div>
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Details-->

                <!--begin::Access menu-->
                <div class="ms-2 w-100px">
                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-48-cmdr" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                        <option value="1">Guest</option>
                        <option value="2">Owner</option>
                        <option value="3" selected="" data-select2-id="select2-data-50-qo9f">Can Edit</option>
                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-49-9vj6" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-ygr0-container" aria-controls="select2-ygr0-container"><span class="select2-selection__rendered" id="select2-ygr0-container" role="textbox" aria-readonly="true" title="Can Edit">Can Edit</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
                <!--end::Access menu-->
            </div>
            <!--end::User-->

                            <!--begin::Separator-->
                <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                <!--end::Separator-->
            
                                <!--begin::User-->
            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="13">
                <!--begin::Details-->
                <div class="d-flex align-items-center">
                    <!--begin::Checkbox-->
                    <label class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='13']" value="13">
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Avatar-->
                    <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-13.jpg">
                                            </div>
                    <!--end::Avatar-->

                    <!--begin::Details-->
                    <div class="ms-5">
                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">John Miller</a>

                        <div class="fw-semibold text-muted">miller@mapple.com</div>
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Details-->

                <!--begin::Access menu-->
                <div class="ms-2 w-100px">
                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-51-z7x2" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                        <option value="1">Guest</option>
                        <option value="2">Owner</option>
                        <option value="3" selected="" data-select2-id="select2-data-53-0aee">Can Edit</option>
                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-52-0w7d" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-nt3v-container" aria-controls="select2-nt3v-container"><span class="select2-selection__rendered" id="select2-nt3v-container" role="textbox" aria-readonly="true" title="Can Edit">Can Edit</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
                <!--end::Access menu-->
            </div>
            <!--end::User-->

                            <!--begin::Separator-->
                <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                <!--end::Separator-->
            
                                <!--begin::User-->
            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="14">
                <!--begin::Details-->
                <div class="d-flex align-items-center">
                    <!--begin::Checkbox-->
                    <label class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='14']" value="14">
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Avatar-->
                    <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-success text-success fw-semibold">
                                L                            </span>
                                            </div>
                    <!--end::Avatar-->

                    <!--begin::Details-->
                    <div class="ms-5">
                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Lucy Kunic</a>

                        <div class="fw-semibold text-muted">lucy.m@fentech.com</div>
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Details-->

                <!--begin::Access menu-->
                <div class="ms-2 w-100px">
                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-54-pwda" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                        <option value="1">Guest</option>
                        <option value="2" selected="" data-select2-id="select2-data-56-fzj6">Owner</option>
                        <option value="3">Can Edit</option>
                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-55-13mg" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-xxt1-container" aria-controls="select2-xxt1-container"><span class="select2-selection__rendered" id="select2-xxt1-container" role="textbox" aria-readonly="true" title="Owner">Owner</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
                <!--end::Access menu-->
            </div>
            <!--end::User-->

                            <!--begin::Separator-->
                <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                <!--end::Separator-->
            
                                <!--begin::User-->
            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="15">
                <!--begin::Details-->
                <div class="d-flex align-items-center">
                    <!--begin::Checkbox-->
                    <label class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='15']" value="15">
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Avatar-->
                    <div class="symbol symbol-35px symbol-circle">
                                                    <img alt="Pic" src="/metronic8/demo14/assets/media/avatars/300-21.jpg">
                                            </div>
                    <!--end::Avatar-->

                    <!--begin::Details-->
                    <div class="ms-5">
                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Ethan Wilder</a>

                        <div class="fw-semibold text-muted">ethan@loop.com.au</div>
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Details-->

                <!--begin::Access menu-->
                <div class="ms-2 w-100px">
                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-57-tier" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                        <option value="1" selected="" data-select2-id="select2-data-59-rxnz">Guest</option>
                        <option value="2">Owner</option>
                        <option value="3">Can Edit</option>
                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-58-l60z" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-szem-container" aria-controls="select2-szem-container"><span class="select2-selection__rendered" id="select2-szem-container" role="textbox" aria-readonly="true" title="Guest">Guest</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
                <!--end::Access menu-->
            </div>
            <!--end::User-->

                            <!--begin::Separator-->
                <div class="border-bottom border-gray-300 border-bottom-dashed"></div>
                <!--end::Separator-->
            
                                <!--begin::User-->
            <div class="rounded d-flex flex-stack bg-active-lighten p-4" data-user-id="16">
                <!--begin::Details-->
                <div class="d-flex align-items-center">
                    <!--begin::Checkbox-->
                    <label class="form-check form-check-custom form-check-solid me-5">
                        <input class="form-check-input" type="checkbox" name="users" data-kt-check="true" data-kt-check-target="[data-user-id='16']" value="16">
                    </label>
                    <!--end::Checkbox-->

                    <!--begin::Avatar-->
                    <div class="symbol symbol-35px symbol-circle">
                                                    <span class="symbol-label bg-light-danger text-danger fw-semibold">
                                O                            </span>
                                            </div>
                    <!--end::Avatar-->

                    <!--begin::Details-->
                    <div class="ms-5">
                        <a href="#" class="fs-5 fw-bold text-gray-900 text-hover-primary mb-2">Olivia Wild</a>

                        <div class="fw-semibold text-muted">olivia@corpmail.com</div>
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Details-->

                <!--begin::Access menu-->
                <div class="ms-2 w-100px">
                    <select class="form-select form-select-solid form-select-sm select2-hidden-accessible" data-control="select2" data-hide-search="true" data-select2-id="select2-data-60-ztt1" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                        <option value="1">Guest</option>
                        <option value="2">Owner</option>
                        <option value="3" selected="" data-select2-id="select2-data-62-p4c3">Can Edit</option>
                    </select><span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-61-zky8" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single form-select form-select-solid form-select-sm" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-sdu8-container" aria-controls="select2-sdu8-container"><span class="select2-selection__rendered" id="select2-sdu8-container" role="textbox" aria-readonly="true" title="Can Edit">Can Edit</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                </div>
                <!--end::Access menu-->
            </div>
            <!--end::User-->

            
            </div>
    <!--end::Users-->

    <!--begin::Actions-->
    <div class="d-flex flex-center mt-15">
        <button type="reset" id="kt_modal_users_search_reset" data-bs-dismiss="modal" class="btn btn-active-light me-3">
            Cancel
        </button>

        <button type="submit" id="kt_modal_users_search_submit" class="btn btn-primary">
            Add Selected Users
        </button>
    </div>
    <!--end::Actions-->
</div>
<!--end::Results-->
                        <!--begin::Empty-->
<div data-kt-search-element="empty" class="text-center d-none">
    <!--begin::Message-->
    <div class="fw-semibold py-10">
        <div class="text-gray-600 fs-3 mb-2">No users found</div>

        <div class="text-muted fs-6">Try to search by username, full name or email...</div>
    </div>
    <!--end::Message-->

    <!--begin::Illustration-->
    <div class="text-center px-5">
        <img src="/metronic8/demo14/assets/media/illustrations/sketchy-1/1.png" alt="" class="w-100 h-200px h-sm-325px">        
    </div>
    <!--end::Illustration-->
</div>
<!--end::Empty-->                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Search-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Users Search--><!--end::Modals-->						</div>
						<!--end::Post-->

						<!--begin::Footer-->
<div class="footer py-4 d-flex flex-column flex-md-row flex-stack " id="kt_footer">
	<!--begin::Copyright-->
	<div class="text-gray-900 order-2 order-md-1">
		<span class="text-muted fw-semibold me-1">2023©</span>
		<a href="https://keenthemes.com" target="_blank" class="text-gray-800 text-hover-primary">Keenthemes</a>
	</div>
	<!--end::Copyright-->

	<!--begin::Menu-->
	<ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
		<li class="menu-item"><a href="https://keenthemes.com" target="_blank" class="menu-link px-2">About</a></li>

		<li class="menu-item"><a href="https://devs.keenthemes.com" target="_blank" class="menu-link px-2">Support</a></li>

		<li class="menu-item"><a href="https://1.envato.market/EA4JP" target="_blank" class="menu-link px-2">Purchase</a></li>
	</ul>
	<!--end::Menu-->
</div>
<!--end::Footer-->
					</div>
					<!--end::Container-->
				</div>