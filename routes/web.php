<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'WelcomeController@home')->name('index');
Route::post('suburb', 'WelcomeController@suburb')->name('suburb');
Route::post('escorts-ajax-data', 'WelcomeController@escortsAjaxData')->name('escorts-ajax-data');

//FrontEnd Section=======================================================================

Route::post('get/city/ajax', 'FrontEndController@getCityAjax')->name('get.city.ajax');
Route::get('get/notification', 'FrontEndController@getNotification')->name('get.notification');
Route::get('explore/cities', 'FrontEndController@exploreCities');
Route::post('explore/state', 'FrontEndController@exploreState');
Route::post('explore/city', 'FrontEndController@exploreCity');
Route::get('feed/{id}', 'FrontEndController@feedShow')->name('show-feed');
Route::get('delete-comment/{id}', 'FrontEndController@deleteComment')->name('delete-comment');


Route::post('store/testimonal', 'FrontEndController@storeTestimonial')->name('store.testimonial');
Route::get('show/testimonal', 'FrontEndController@showTestimonial')->name('show.testimonial');

Route::get('business/etiquete', 'FrontEndController@businessEtiquete');
Route::get('our/story', 'FrontEndController@ourStory');
Route::get('terms/condition', 'FrontEndController@termsCondition');
Route::get('privacy/statement', 'FrontEndController@privacystatement')->name('privacy.statement');
Route::get('copyright', 'FrontEndController@copyright')->name('copyright');

Route::get('acceptable/usage', 'FrontEndController@acceptable')->name('acceptable.usage');

Route::get('disclaimer', 'FrontEndController@disclaimer')->name('disclaimer');


// Route For Send Email By View The Profile Start Here
Route::get('profile/email/{id}', 'FrontEndController@profileEmailPage')->name('profile.email');
Route::post('profile-guest-mail', 'FrontEndController@emailMe')->name('profile-guest-mail');
Route::get('profile/{id}/{name?}', 'FrontEndController@profile');
// Route For Send Email By View The Profile Start Here

Route::get('client/membership', 'FrontEndController@clientMembership');
Route::get('faq', 'FrontEndController@faq');

Route::get('client/login', 'FrontEndController@clientLogin');
Route::get('client/signup', 'FrontEndController@clientSignup');

Route::get('forgotpassword', 'FrontEndController@forgotpassword');
Route::post('forgotpassword/sentemail', 'FrontEndController@forgotpasswordsentemail');
Route::get('resetpasswordbyemail/{id}/{name}', 'FrontEndController@resetpasswordbyemail');
Route::get('newpassword', 'FrontEndController@newpassword');
Route::post('storenewpassword', 'FrontEndController@storenewpassword');

Route::get('escort/login', 'FrontEndController@escortLogin');
Route::get('escort/signup', 'FrontEndController@escortSignup');
Route::get('escort/confirmation/{id}/{name}', 'FrontEndController@confirmation');

Route::get('profile-guest/{id}', 'FrontEndController@profile')->name('profile-guest');
Route::get('profile-guest/{id}/blogs', 'FrontEndController@profileBlogs')->name('profile-guest.blogs.index');


//Provider resources
Route::get('sex/trafficking', 'FrontEndController@frontSexTrafficking');
Route::get('local/resources', 'FrontEndController@frontLocalResources');
Route::get('purchase/marketing', 'FrontEndController@frontPurchaseMarketing');

Route::get('readmore_purchase/{id}', 'FrontEndController@readmore_purchase')->name('readmore_purchase');

Route::get('bacome/escort', 'FrontEndController@frontBecomeEscort');
Route::match(['get', 'post'], 'blog', 'FrontEndController@frontBlog')->name('front.admin.blog');

// SMPEDIT 21-10-2020
Route::match(['get', 'post'], '/multi/page', 'FrontEndController@multiPage')->name('multi.page.search');
Route::get('blog/details/{id}', 'FrontEndController@frontBlogDetails')->name('multi.blog.details');
Route::post('blog/comment/{id?}/store', 'FrontEndController@storeBlogComment')->name('multi.blog_comment.store');
Route::get('admin/blog/details/{id}', 'FrontEndController@frontAdminBlogDetails')->name('admin.blog.details');
Route::post('admin/blog/comment/{id?}/store', 'FrontEndController@storeAdminBlogComment')->name('admin.blog_comment.store');
Route::get('review/details/{id}', 'FrontEndController@frontReviewDetails')->name('multi.review.details');


// Route::get('multi/page', 'FrontEndController@multiPage');
// Route::post('search/multi/page/blog', 'FrontEndController@searchMultiPageBlog');
// SMPEDIT 21-10-2020

Route::post('clint/escort/signup/store', 'FrontEndController@clientEscoertSignupStore');

Route::get('country/{country}', 'FrontEndController@countryListEscortCountry');
Route::get('country/{country}/{city}', 'FrontEndController@countryListEscortCityCountry');
Route::get('country/{country}/{city}/{gender}', 'FrontEndController@countryListEscortCityCountryGender');
Route::post('country/list/escort/statelist', 'FrontEndController@statelist')->name('country.list.escort.statelist');
Route::post('country/list/escort/citylist', 'FrontEndController@citylist')->name('country.list.escort.citylist');

Route::post('country/city/list/escort/', 'FrontEndController@countryCityListEscort');
Route::post('filter/search/escort/', 'FrontEndController@filterSearchEscort');
Route::post('advance/search/escort/', 'FrontEndController@advanceSearchEscort');
Route::post('search/city/escort/', 'FrontEndController@searchCityEscort');


//Escort Dashboard Section==============================
Route::get('new-escort-theme','escortBackEnd\EscortProfileController@index')->name('new-escort-theme');
Route::post('add-escort-profile-availability','escortBackEnd\EscortProfileController@profileAvailabilityStore')->name('add-escort-profile-availability');
Route::post('add-escort-profile-offer','escortBackEnd\EscortProfileController@profileServiceOfferStore')->name('add-escort-profile-offer');

Route::get('escort/profile/setting/{id}', 'adminBackEnd\EscortDashboardController@profileSettings');
Route::post('profile-country-name','adminBackEnd\EscortDashboardController@profileCountry')->name('profile-country-name');
Route::post('profile-suburb-name','adminBackEnd\EscortDashboardController@profileSuburb')->name('profile-suburb-name');

Route::get('escort/my-profiles', 'escortBackEnd\EscortFriendsController@myProfiles')->name('escort.my-profiles');

Route::get('escort/profile/image', 'adminBackEnd\EscortDashboardController@profileImage')->name('escort.profile.image');
Route::get('escort/profile-image-gallery/{id}', 'adminBackEnd\EscortDashboardController@profilegalleryview')->name('escort.profile-image-gallery');
Route::get('addgallery','adminBackEnd\EscortDashboardController@addgallery')->name('addgallery');

Route::get('escort/slider', 'adminBackEnd\EscortDashboardController@slider')->name('escort.slider');
Route::get('escort/slider-edit/{id}', 'adminBackEnd\EscortDashboardController@slideredit')->name('escort.slider-edit');
Route::get('addsilder','adminBackEnd\EscortDashboardController@addsilder')->name('addsilder');

Route::get('escort/video','adminBackEnd\EscortDashboardController@videoView')->name('escort.video');
Route::get('escort/video-edit/{id}', 'adminBackEnd\EscortDashboardController@videoedit')->name('escort.video-edit');
Route::get('addvideo','adminBackEnd\EscortDashboardController@addvideo')->name('addvideo');

Route::get('escort/selfie','adminBackEnd\EscortDashboardController@selfieview')->name('escort.selfie');
Route::get('escort/selfie-edit/{id}', 'adminBackEnd\EscortDashboardController@selfieEdit')->name('escort.selfie-edit');
Route::get('addselfie','adminBackEnd\EscortDashboardController@addselfie')->name('addselfie');

Route::get('escort/profile/description', 'adminBackEnd\EscortDashboardController@profileDescription');
Route::get('escort/profile/list/line', 'adminBackEnd\EscortDashboardController@profileListLine');
Route::get('escort/profile/rates', 'adminBackEnd\EscortDashboardController@profileRates');
Route::get('escort/profile/availability', 'adminBackEnd\EscortDashboardController@profileAvailability');
Route::get('escort/profile/tour', 'adminBackEnd\EscortDashboardController@profileTour');
Route::get('escort/profile/blog', 'adminBackEnd\EscortDashboardController@profileBlog');
Route::get('escort/profile/escort/blog', 'adminBackEnd\EscortDashboardController@escortBlog');

Route::get('escort-services-Offer-add/{id}', 'adminBackEnd\EscortDashboardController@escortServiceOfferAdd')->name('escort-services-Offer-add');

Route::get('escort/feed-upload', 'adminBackEnd\EscortDashboardController@escortFeedUpload')->name('escort.feed-upload');

Route::get('escort/feeds', 'adminBackEnd\EscortDashboardController@escortFeeds');
Route::get('escort/updates', 'adminBackEnd\EscortDashboardController@escortUpdates');
Route::get('3hours/available', 'adminBackEnd\EscortDashboardController@hoursAvailable');

Route::get('escort-service-location/{id}', 'adminBackEnd\EscortDashboardController@escortServiceLocation')->name('escort-service-location');
Route::post('escort-service-location-add', 'adminBackEnd\EscortDashboardController@escortServiceLocationadd')->name('escort-service-location-add');

// SMPEDIT 13-10-2020
Route::group(['prefix' => '/new/profile'], function () { 
    // Step - 1 - Profile Stats
    Route::get('/{id?}', 'escortBackEnd\EscortProfileController@getProfileStats')->name('profile.stats.index');
    Route::post('/{id?}/update', 'escortBackEnd\EscortProfileController@updateProfileStats')->name('profile.stats.update');

    // Step - 2 - Biography
    Route::get('/biography/{id?}', 'escortBackEnd\EscortProfileController@getProfileBiography')->name('profile.biography.index');
    Route::post('/biography/{id?}/update', 'escortBackEnd\EscortProfileController@updateProfileBiography')->name('profile.biography.update');

    // Step - 3 - Services
    Route::get('/services/{id?}', 'escortBackEnd\EscortProfileController@getProfileServices')->name('profile.services.index');
    Route::post('/services/{id?}/update', 'escortBackEnd\EscortProfileController@updateProfileServices')->name('profile.services.update');

    // Step - 4 - Photos
    Route::get('/photos/{id?}', 'escortBackEnd\EscortProfileController@getProfilePhotos')->name('profile.photos.index');
    Route::post('/photos/{id?}/store', 'escortBackEnd\EscortProfileController@storeProfilePhoto')->name('profile.photos.store');
    Route::get('/photos/{id?}/show/{imageId}', 'escortBackEnd\EscortProfileController@showProfilePhoto')->name('profile.photos.show');
    Route::post('/photos/{id}/update', 'escortBackEnd\EscortProfileController@updateProfilePhoto')->name('profile.photos.update');
    Route::post('/photos/{id?}/delete/{imageId}', 'escortBackEnd\EscortProfileController@deleteProfilePhoto')->name('profile.photos.delete');
    Route::get('/photos/delete/{userId?}/{id}/{imageId}', 'escortBackEnd\EscortProfileController@delete')->name('profile.delete');

    // Step 5 - Verification - Disabled on Client's Request
    Route::get('/verification/{id}', 'escortBackEnd\EscortProfileController@getVerification')->name('profile.verification.index');
    Route::post('/verification/{id}/update', 'escortBackEnd\EscortProfileController@updateVerification')->name('profile.verification.update');
});
// SMPEDIT 13-10-2020 END

/* Ashish 16-10-2020 */
Route::get('admin/session', 'escortBackEnd\EscortProfileController@moveLoginAdmin')->name('admin.session');
Route::post('escort/profile/activation/ajax', 'escortBackEnd\EscortActivationController@ajaxCall')->name('escort.profile.activation.ajax');
Route::post('escort/profile/deactivation/ajax', 'escortBackEnd\EscortActivationController@ajaxCallDeactivate')->name('escort.profile.deactivation.ajax');

/* Ashish 13-10-2020 */
Route::get('escort/faq','escortBackEnd\EscortFaqController@index')->name('escort.faq');
Route::get('escort/ticket','escortBackEnd\EscortTicketController@index')->name('escort.ticket');
Route::post('escort/submit/ticket','escortBackEnd\EscortTicketController@ticketSubmit')->name('escort.submit.ticket');

Route::get('escort/feed','escortBackEnd\EscortFeedController@index')->name('escort.feed');
Route::get('escort/friend-list','escortBackEnd\EscortFriendsController@index')->name('escort.friend-list');
Route::get('escort/newprofiles','escortBackEnd\EscortFriendsController@newProfiles')->name('escort.newprofiles');

/* Ashish Escort Route 13-10-2020 */

Route::get('escort/blog','escortBackEnd\EscortBlogController@index')->name('escort.blog');
Route::get('escort/blog/details/{id}','escortBackEnd\EscortBlogController@details')->name('escort.blog.details');
Route::get('escort/blog/edit/{id}','escortBackEnd\EscortBlogController@edit')->name('escort.blog.edit');
Route::post('escort/blog/update','escortBackEnd\EscortBlogController@update')->name('escort.blog.update');
Route::get('escort/blog/delete/{id}','escortBackEnd\EscortBlogController@delete')->name('escort.blog.delete');
Route::post('escort/blog/store','escortBackEnd\EscortBlogController@store')->name('escort.blog.store');

Route::get('escort/notifications','escortBackEnd\EscortNotificationController@index')->name('escort.notifications');
Route::get('escort/notifications/data','escortBackEnd\EscortNotificationController@data')->name('escort.notifications.data');
Route::get('client/notifications/data','clientBackEnd\ClientNotificationController@data')->name('client.notifications.data');
Route::get('escort/frequest/data','escortBackEnd\EscortNotificationController@friendRequestData')->name('escort.frequest.data');
Route::get('escort/friend-requests','escortBackEnd\EscortFriendsController@friendRequest')->name('escort.friend-requests');
Route::post('escort/change-request-status','escortBackEnd\EscortFriendsController@changeRequestStatus')->name('escort.change-request-status');

Route::post('escort/feed/store','escortBackEnd\EscortFeedController@store')->name('escort.feed.store');
Route::get('delete/feed/{id}','escortBackEnd\EscortFeedController@delete')->name('escort.feed.delete');
Route::get('new-post','escortBackEnd\EscortFeedController@uploadPost')->name('escort.feed.upload');

/* Ashish Escort Route For Tours 14-10-2020 */
Route::get('escort/tour','escortBackEnd\EscortTourController@index')->name('escort.tour');
Route::post('escort/tour/store','escortBackEnd\EscortTourController@store')->name('escort.tour.store');
Route::get('escort/tour/delete/{id}','escortBackEnd\EscortTourController@delete')->name('escort.tour.delete');
Route::get('escort/tour/update/{id}','escortBackEnd\EscortTourController@update')->name('escort.tour.update');

Route::get('manage-account','escortBackEnd\EscortManageAccountController@index')->name('manage-account');
Route::post('escort/check-password','escortBackEnd\EscortManageAccountController@checkPassword')->name('escort.check-password');
Route::post('escort/change-password','escortBackEnd\EscortManageAccountController@changePassword')->name('escort.change-password');
Route::post('escort/email-notification','escortBackEnd\EscortManageAccountController@emailNotification')->name('escort.email-notification');
Route::post('escort/account-activation-or-deactivation','escortBackEnd\EscortManageAccountController@activationORdeactivation')->name('escort.account-activation-or-deactivation');

//Client Dashboard Section==============================
Route::get('client/profile/setting/{id}', 'adminBackEnd\ClientDashboardController@clientProfileSettings');
Route::post('client/profile/setting/update', 'adminBackEnd\ClientDashboardController@clientProfileSettingsUpdate');

Route::post('follow/store', 'adminBackEnd\ClientDashboardController@followStore');
Route::post('follow/update', 'adminBackEnd\ClientDashboardController@followUpdate');
Route::get('notification', 'adminBackEnd\ClientDashboardController@notification');

Route::get('client/report','clientBackEnd\ClientReportController@index')->name('client.report');
Route::get('client/manage-account','clientBackEnd\ClientAccountController@index')->name('client.manage-account');

Route::get('client/send-friend-request/{id}','FrontEndController@SendFriendRequest')->name('client.send-friend-request');
Route::get('client/unfriend/{id}','FrontEndController@UnFriendRequest')->name('client.unfriend');

Route::get('client/feed','clientBackEnd\ClientFeedController@index')->name('client.feed');
Route::post('client/like-unlike','clientBackEnd\ClientFeedController@likeUnlike')->name('client.like-unlike');
Route::post('client/do-comment','clientBackEnd\ClientFeedController@doComment')->name('client.do-comment');


Route::post('escort/like-unlike','escortBackEnd\EscortFeedController@likeUnlike')->name('escort.like-unlike');
Route::post('escort/do-comment','escortBackEnd\EscortFeedController@doComment')->name('escort.do-comment');

Route::get('escort/report','escortBackEnd\EscortReportController@index')->name('escort.report');
Route::post('escort/get-client-by-number','escortBackEnd\EscortReportController@GetClientByNumber')->name('escort.get-client-by-number');

Route::post('escort/store-report','escortBackEnd\EscortReportController@storeReport')->name('escort.store-report');

/* Ashish  08-10-2020 */
Route::get('client/blog','clientBackEnd\ClientBlogController@index')->name('client.blog');
Route::get('client/blog/details/{id}','clientBackEnd\ClientBlogController@details')->name('client.blog.details');
Route::get('client/blog/edit/{id}','clientBackEnd\ClientBlogController@edit')->name('client.blog.edit');
Route::post('client/blog/update','clientBackEnd\ClientBlogController@update')->name('client.blog.update');
Route::get('client/blog/delete/{id}','clientBackEnd\ClientBlogController@delete')->name('client.blog.delete');

Route::post('client/blog/store','clientBackEnd\ClientBlogController@store')->name('client.blog.store');
Route::get('client/notification','clientBackEnd\ClientNotificationController@index')->name('client.notification');
Route::get('client/friendlist','clientBackEnd\ClientFriendsController@index')->name('client.friendlist');
Route::post('client/friendlist/unfriend','clientBackEnd\ClientFriendsController@unfriend')->name('client.unfriend');
Route::get('client/newprofiles','clientBackEnd\ClientFriendsController@newProfiles')->name('client.newprofiles');
Route::get('client/escort-tours','clientBackEnd\ClientFriendsController@newEscortTours')->name('client.escort-tours');

Route::get('client/available-now','clientBackEnd\AvailableNowController@index')->name('client.available-now');


Route::get('client/faq/client','clientBackEnd\ClientFaqController@index')->name('client.faq.client');

Route::get('client/logout', 'HomeController@logoutClient')->name('client.logout');

/* Ashsih 09-10-2020 */
Route::get('client/profile','clientBackEnd\ClientProfileController@index')->name('client.profile');
Route::post('client/profile/upgrade','clientBackEnd\ClientProfileController@upgrade')->name('client.profile.upgrade');

Route::post('client/check-password','clientBackEnd\ClientAccountController@checkPassword')->name('client.check-password');
Route::post('client/change-password','clientBackEnd\ClientAccountController@changePassword')->name('client.change-password');

/* Ashish 13-10-2020 */
Route::get('client/ticket','clientBackEnd\ClientTicketController@index')->name('client.ticket');
Route::post('client/submit/ticket','clientBackEnd\ClientTicketController@ticketSubmit')->name('client.submit.ticket');


Route::post('city/get','clientBackEnd\LocationGetController@city')->name('city.get');
Route::post('suburb/get','clientBackEnd\LocationGetController@suburb')->name('suburb.get');
//Backend Section====================================================

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('admin/logout', 'HomeController@logoutAdmin')->name('admin.logout');

// 22-10-2020 Ashish Escort Profile Request Start's Here
Route::get('admin/escort/profile/request', 'adminBackEnd\EscortProfileRequestController@index')->name('admin.escort.profile.request');
Route::get('admin/escort/profile/request/accept/{id}/{name}/{request}', 'adminBackEnd\EscortProfileRequestController@accept')->name('admin.escort.profile.request.accept');
Route::get('admin/escort/profile/request/deny/{id}/{email}/{name}', 'adminBackEnd\EscortProfileRequestController@deny')->name('admin.escort.profile.request.deny');
Route::post('admin/escort/profile/request/deny/reason', 'adminBackEnd\EscortProfileRequestController@denyReason')->name('admin.escort.profile.request.deny.reason');
Route::get('admin/escort/request/deny/reason', 'adminBackEnd\EscortProfileRequestController@denyList')->name('admin.escort.request.deny.reason');
// Route::get('admin/escort/request/reject/list', 'adminBackEnd\EscortProfileRequestController@rejectList')->name('admin.escort.request.reject.list');

// 22-10-2020 Ashish Escort Profile Request End's Here

Route::get('admin/social/media', 'adminBackEnd\SocailMediaController@index')->name('admin.social.media');
Route::post('admin/social/media/store', 'adminBackEnd\SocailMediaController@store')->name('admin.social.media.store');
Route::get('admin/social/media/delete/{id}', 'adminBackEnd\SocailMediaController@delete')->name('admin.social.media.delete');
Route::get('admin/social/media/edit/{id}', 'adminBackEnd\SocailMediaController@edit')->name('admin.social.media.edit');
Route::post('admin/social/media/update', 'adminBackEnd\SocailMediaController@update')->name('admin.social.media.update');

Route::get('faq/client/escort', 'adminBackEnd\FaqClientEscortController@index')->name('faq.client.escort');
Route::post('faq/client/escort/store', 'adminBackEnd\FaqClientEscortController@store')->name('faq.client.escort.store');
Route::get('faq/client/escort/view', 'adminBackEnd\FaqClientEscortController@view')->name('faq.client.escort.view');
Route::get('faq/client/escort/delete/{id}', 'adminBackEnd\FaqClientEscortController@delete')->name('faq.client.escort.delete');
Route::get('faq/client/escort/edit/{id}', 'adminBackEnd\FaqClientEscortController@edit')->name('faq.client.escort.edit');
Route::post('faq/client/escort/update', 'adminBackEnd\FaqClientEscortController@update')->name('faq.client.escort.update');

//Escorts
Route::get('new/escort', 'adminBackEnd\EscortController@newEscort');
Route::post('escort/store', 'adminBackEnd\EscortController@escortStore');
Route::get('escort/list', 'adminBackEnd\EscortController@escortList');
Route::get('escort/modify/{id}', 'adminBackEnd\EscortController@escortModify');
Route::post('escort/update', 'adminBackEnd\EscortController@escortUpdate');
Route::get('escort/activation/{id}/{activation_id}', 'adminBackEnd\EscortController@activation');

Route::post('escort/state', 'adminBackEnd\EscortController@state');
Route::post('escort/city', 'adminBackEnd\EscortController@city');


Route::get('profile/rate/admin/{id}', 'adminBackEnd\FrontPagesController@profileRate');
Route::get('profile/description/admin/{id}', 'adminBackEnd\FrontPagesController@profileDescription');
Route::get('profile/list/admin/{id}', 'adminBackEnd\FrontPagesController@profileList');
Route::get('profile/availability/admin/{id}', 'adminBackEnd\FrontPagesController@profileAvailability');
Route::get('profile/tour/admin/{id}', 'adminBackEnd\FrontPagesController@profileTour');

Route::get('escort/dropdown', 'adminBackEnd\EscortController@escortDropdown');
Route::post('escort/dropdown/store', 'adminBackEnd\EscortController@escortDropdownStore');
Route::post('escort/dropdown/update', 'adminBackEnd\EscortController@escortDropdownUpdate');

Route::post('service/offer/store', 'adminBackEnd\EscortController@serviceOfferStore');
Route::post('service/offer/update', 'adminBackEnd\EscortController@serviceOfferUpdate');
Route::get('service/offer/delete/{id}', 'adminBackEnd\EscortController@serviceOfferDelete');

Route::get('admin/escort/feeds', 'adminBackEnd\EscortController@escortFeeds');
Route::post('admin/escort/feeds/store', 'adminBackEnd\EscortController@escortFeedsStore');
Route::post('admin/escort/feeds/update', 'adminBackEnd\EscortController@escortFeedsUpdate');

Route::get('service/offer', 'adminBackEnd\EscortController@serviceOffer');

Route::get('service/offer/assign/list', 'adminBackEnd\EscortController@serviceOfferAssignList');
Route::post('service/offer/assign/store', 'adminBackEnd\EscortController@serviceOfferAssignStore');
Route::post('service/offer/assign/update', 'adminBackEnd\EscortController@serviceOfferAssignUpdate');
Route::get('service/offer/assign/delete/{id}', 'adminBackEnd\EscortController@serviceOfferAssignDelete');

//User
Route::post('like/comment/store', 'adminBackEnd\ClientController@likeCommentStore');
Route::get('likes/{escortid}', 'adminBackEnd\ClientController@likes');
Route::get('comments/{escortid}', 'adminBackEnd\ClientController@comments');

//Location
Route::get('location/add', 'adminBackEnd\GeneralSettingController@locationAdd');
Route::get('admin/location/state/{id}','adminBackEnd\GeneralSettingController@locationstate')->name('admin.location.state');
Route::get('admin/location/stateadd/{id}','adminBackEnd\GeneralSettingController@locationstateadd')->name('admin.location.stateadd');
Route::post('admin/location/statebulk','adminBackEnd\GeneralSettingController@statebulk')->name('admin.location.statebulk');

// 23-10-2020 Ashish Manage SEO City route Start's Here
Route::get('admin/seo/city/{id}/{gender}/{cityid}','adminBackEnd\GeneralSettingController@seoIndex')->name('admin.seo.city');
Route::post('admin/seo/city/store','adminBackEnd\GeneralSettingController@seoStore')->name('admin.seo.city.store');
Route::get('admin/seo/city/delete/{id}','adminBackEnd\GeneralSettingController@seodelete')->name('admin.seo.city.delete');
Route::post('admin/seo/city/update/{id}','adminBackEnd\GeneralSettingController@seoUpdate')->name('admin.seo.city.update');
// 23-10-2020 Ashish Manage SEO City route End's Here

Route::get('admin/location/city/{id}','adminBackEnd\GeneralSettingController@locationcity')->name('admin.location.city');
Route::get('admin/location/cityadd/{id}','adminBackEnd\GeneralSettingController@locationcityadd')->name('admin.location.cityadd');
Route::post('admin/location/citybulk','adminBackEnd\GeneralSettingController@citybulk')->name('admin.location.citybulk');

Route::post('country/store', 'adminBackEnd\GeneralSettingController@countryStore');
Route::post('country/update', 'adminBackEnd\GeneralSettingController@countryUpdate');
Route::get('delete/country/{id}', 'adminBackEnd\GeneralSettingController@countryDelete')->name('delete.country');



Route::post('state/store', 'adminBackEnd\GeneralSettingController@stateStore');
Route::post('state/update', 'adminBackEnd\GeneralSettingController@stateUpdate');
Route::get('state/delete/{id}', 'adminBackEnd\GeneralSettingController@stateDelete');
Route::post('city/store', 'adminBackEnd\GeneralSettingController@cityStore');
Route::post('city/update', 'adminBackEnd\GeneralSettingController@cityUpdate');
Route::get('city/delete/{id}', 'adminBackEnd\GeneralSettingController@cityDelete');


Route::get('select_country','adminBackEnd\GeneralSettingController@country')->name('select_country');
Route::get('select_state','adminBackEnd\GeneralSettingController@state')->name('select_state');
Route::get('get_cities','adminBackEnd\GeneralSettingController@getCities')->name('get_cities'); // SMPEDIT 30-09-2020
Route::post('getCity','adminBackEnd\GeneralSettingController@getCity')->name('getCity'); // SMPEDIT 30-09-2020


//General Setting
Route::get('new/user', 'adminBackEnd\GeneralSettingController@newUserCreate');
Route::post('user/store', 'adminBackEnd\GeneralSettingController@newUserCreateStore');
Route::get('user/list', 'adminBackEnd\GeneralSettingController@userList');

Route::get('user/list/delete/{id}/{name}', 'adminBackEnd\GeneralSettingController@userListDelete')->name('user.list.delete');

Route::get('testimonial/list', 'adminBackEnd\GeneralSettingController@testimonialList')->name('testimonial.list');
Route::get('testimonial/approve/{id}', 'adminBackEnd\GeneralSettingController@testimonialApprove')->name('testimonial.approve');
Route::get('testimonial/reject/{id}', 'adminBackEnd\GeneralSettingController@testimonialReject')->name('testimonial.reject');
Route::get('testimonial/delete-page', 'adminBackEnd\GeneralSettingController@testimonialDeletePage')->name('testimonial.delete-page');
Route::get('testimonial/delete/{id}', 'adminBackEnd\GeneralSettingController@testimonialDelete')->name('testimonial.delete');

Route::get('profile/edit/{id}', 'adminBackEnd\GeneralSettingController@userProfileEdit');
Route::post('profile/update', 'adminBackEnd\GeneralSettingController@userProfileUpdated');

//Slider
Route::get('slider/add', 'adminBackEnd\GeneralSettingController@sliderAdd');
Route::post('slider/store', 'adminBackEnd\GeneralSettingController@sliderStore');
Route::post('slider/update', 'adminBackEnd\GeneralSettingController@sliderUpdate');
Route::get('slider/delete/{id}', 'adminBackEnd\GeneralSettingController@sliderDelete');
Route::get('header/footer', 'adminBackEnd\GeneralSettingController@headerFooter');
Route::post('header/footer/store', 'adminBackEnd\GeneralSettingController@headerFooterStore');
Route::post('header/footer/update', 'adminBackEnd\GeneralSettingController@headerFooterUpdate');
Route::get('header/footer/delete/{id}', 'adminBackEnd\GeneralSettingController@headerFooterDelete');



//Front Pages

//Home page
Route::get('home/page', 'adminBackEnd\FrontPagesController@homePage');
Route::post('independent/update', 'adminBackEnd\FrontPagesController@independentUpdate');

Route::get('provider/resource', 'adminBackEnd\FrontPagesController@providerResource');
Route::post('provider/resource/update', 'adminBackEnd\FrontPagesController@providerUpdate');

Route::get('professional/admin', 'adminBackEnd\FrontPagesController@professionalAdmin');
Route::post('professional/update', 'adminBackEnd\FrontPagesController@professionalUpdate');

Route::get('about/admin', 'adminBackEnd\FrontPagesController@aboutAdmin');
Route::post('about/update', 'adminBackEnd\FrontPagesController@aboutUpdate');




//Profile========================================================
Route::get('profile', 'adminBackEnd\FrontPagesController@profile');
Route::post('profile/image/store', 'adminBackEnd\FrontPagesController@profileImageStore');
Route::post('profile/image/update', 'adminBackEnd\FrontPagesController@profileImageUpdate');
Route::get('profile/image/delete/{id}', 'adminBackEnd\FrontPagesController@profileImageDelete');


Route::get('profile/description/admin', 'adminBackEnd\FrontPagesController@profileDescription');
Route::post('profile/description/store', 'adminBackEnd\FrontPagesController@profileDescriptionStore');
Route::post('profile/description/update', 'adminBackEnd\FrontPagesController@profileDescriptionUpdate');
Route::get('profile/description/delete', 'adminBackEnd\FrontPagesController@profileDescriptionDelete');

Route::get('profile/list/admin', 'adminBackEnd\FrontPagesController@profileList');
Route::post('profile/list/store', 'adminBackEnd\FrontPagesController@profileListStore');
Route::post('profile/list/update', 'adminBackEnd\FrontPagesController@profileListUpdate');
Route::get('profile/list/delete/{id}', 'adminBackEnd\FrontPagesController@profileListDelete');

Route::get('profile/rate/admin', 'adminBackEnd\FrontPagesController@profileRate');
Route::post('profile/rate/store', 'adminBackEnd\FrontPagesController@profileRateStore');
Route::post('profile/rate/update', 'adminBackEnd\FrontPagesController@profileRateUpdate');
Route::get('profile/rate/delete', 'adminBackEnd\FrontPagesController@profileRateDelete');

Route::get('profile/availability/admin', 'adminBackEnd\FrontPagesController@profileAvailability');
Route::post('profile/availability/store', 'adminBackEnd\FrontPagesController@profileAvailabilityStore');
Route::post('profile/availability/update', 'adminBackEnd\FrontPagesController@profileAvailabilityUpdate');
Route::get('profile/availability/delete/{id}', 'adminBackEnd\FrontPagesController@profileAvailabilityDelete');

Route::get('profile/tour/admin', 'adminBackEnd\FrontPagesController@profileTour');
Route::post('profile/tour/store', 'adminBackEnd\FrontPagesController@profileTourStore');
Route::post('profile/tour/update', 'adminBackEnd\FrontPagesController@profileTourUpdate');
Route::get('profile/tour/delete/{id}', 'adminBackEnd\FrontPagesController@profileTourDelete');

Route::get('profile/blog/admin', 'adminBackEnd\FrontPagesController@profileBlog');
Route::post('profile/blog/store', 'adminBackEnd\FrontPagesController@profileBlogStore');
Route::post('profile/blog/update', 'adminBackEnd\FrontPagesController@profileBlogUpdate');
Route::get('profile/blog/delete/{id}', 'adminBackEnd\FrontPagesController@profileBlogDelete');



//Terms
Route::get('admin/terms', 'adminBackEnd\FrontPagesController@adminTerms');

Route::get('admin/copy/view', 'adminBackEnd\FrontPagesController@copyview')->name('admin.copy.view');
Route::get('admin/copy/update/{id}', 'adminBackEnd\FrontPagesController@copyupdate')->name('admin.copy.update');
Route::post('admin/copy.edit', 'adminBackEnd\FrontPagesController@copyedit')->name('admin.copy.edit');

Route::get('admin/acceptable/view', 'adminBackEnd\FrontPagesController@acceptableview')->name('admin.acceptable.view');
Route::get('admin/acceptable/update/{id}', 'adminBackEnd\FrontPagesController@acceptableupdate')->name('admin.acceptable.update');
Route::post('admin/acceptable.edit', 'adminBackEnd\FrontPagesController@acceptableedit')->name('admin.acceptable.edit');


Route::get('admin/privacyview', 'adminBackEnd\FrontPagesController@privacyview')->name('admin.privacyview');
Route::post('admin/privacyadd', 'adminBackEnd\FrontPagesController@privacyadd')->name('admin.privacyadd');
Route::get('admin/privacydelete/{id}', 'adminBackEnd\FrontPagesController@privacydelete')->name('admin.privacydelete');
Route::get('admin/privacyupdate/{id}', 'adminBackEnd\FrontPagesController@privacyupdate')->name('admin.privacyupdate');
Route::post('admin/privacyedit', 'adminBackEnd\FrontPagesController@privacyedit')->name('admin.privacyedit');

Route::get('admin/disclaimerview', 'adminBackEnd\FrontPagesController@disclaimerview')->name('admin.disclaimerview');
Route::post('admin/disclaimer/add', 'adminBackEnd\FrontPagesController@disclaimeradd')->name('admin.disclaimer.add');
Route::get('admin/disclaimer/delete/{id}', 'adminBackEnd\FrontPagesController@disclaimerdelete')->name('admin.disclaimer.delete');
Route::get('admin/disclaimer/update/{id}', 'adminBackEnd\FrontPagesController@disclaimerupdate')->name('admin.disclaimer.update');
Route::post('disclaimer/edit', 'adminBackEnd\FrontPagesController@disclaimeredit')->name('disclaimer.edit');

Route::post('admin/terms/store', 'adminBackEnd\FrontPagesController@adminTermStore');
Route::post('admin/terms/update', 'adminBackEnd\FrontPagesController@adminTermUpdate');
Route::get('admin/terms/delete/{id}', 'adminBackEnd\FrontPagesController@adminTermsDelete');

//Business Etiquete
Route::get('admin/business/etiquete', 'adminBackEnd\FrontPagesController@adminBusinessEtiquete');
Route::post('admin/business/etiquete/store', 'adminBackEnd\FrontPagesController@adminBusinessEtiqueteStore');
Route::post('admin/business/etiquete/update', 'adminBackEnd\FrontPagesController@adminBusinessEtiqueteUpdate');
Route::get('admin/business/etiquete/delete/{id}', 'adminBackEnd\FrontPagesController@adminBusinessEtiqueteDelete');

Route::post('admin/business/question/etiquete/store', 'adminBackEnd\FrontPagesController@adminBusinessQuestionEtiqueteStore');
Route::post('admin/business/question/etiquete/update', 'adminBackEnd\FrontPagesController@adminBusinessQuestionEtiqueteUpdate');
Route::get('admin/business/question/etiquete/delete/{id}', 'adminBackEnd\FrontPagesController@adminBusinessQuestionEtiqueteDelete');


//Our Story

Route::get('admin/our/story', 'adminBackEnd\FrontPagesController@adminOurStory');
Route::post('admin/our/story/store', 'adminBackEnd\FrontPagesController@adminOurStoryStore');
Route::post('admin/our/story/update', 'adminBackEnd\FrontPagesController@adminOurStoryUpdate');
Route::get('admin/our/story/delete/{id}', 'adminBackEnd\FrontPagesController@adminOurStoryDelete');


//FAQ
Route::get('admin/faq', 'adminBackEnd\FrontPagesController@adminFaq');
Route::post('admin/faq/store', 'adminBackEnd\FrontPagesController@adminFaqStore');
Route::post('admin/faq/update', 'adminBackEnd\FrontPagesController@adminFaqUpdate');
Route::get('admin/faq/delete/{id}', 'adminBackEnd\FrontPagesController@adminFaqDelete');

Route::post('admin/faq/question/store', 'adminBackEnd\FrontPagesController@adminFaqQuestionStore');
Route::post('admin/faq/question/update', 'adminBackEnd\FrontPagesController@adminFaqQuestionUpdate');
Route::get('admin/faq/question/delete/{id}', 'adminBackEnd\FrontPagesController@adminFaqQuestionDelete');

//Client Relationship
Route::get('admin/client/relationship', 'adminBackEnd\FrontPagesController@adminClientRelationship');
Route::post('admin/client/relationship/store', 'adminBackEnd\FrontPagesController@adminClientRelationshipStore');
Route::post('admin/client/relationship/update', 'adminBackEnd\FrontPagesController@adminClientRelationshipUpdate');
Route::get('admin/client/relationship/delete/{id}', 'adminBackEnd\FrontPagesController@adminClientRelationshipDelete');

Route::post('admin/client/relation/question/store', 'adminBackEnd\FrontPagesController@adminClientRelationQuestionStore');
Route::post('admin/client/relation/question/update', 'adminBackEnd\FrontPagesController@adminClientRelationQuestionUpdate');
Route::get('admin/client/relation/question/delete/{id}', 'adminBackEnd\FrontPagesController@adminClientRelationQuestionDelete');



//Provider Resources==========================================================================================

//Sex Trafficking
Route::get('admin/sex/trafficking', 'adminBackEnd\ProviderResourcesController@adminSexTrafficking');
Route::post('admin/sex/trafficking/store', 'adminBackEnd\ProviderResourcesController@adminSexTraffickingStore');
Route::post('admin/sex/trafficking/update', 'adminBackEnd\ProviderResourcesController@adminSexTraffickingUpdate');
Route::get('admin/sex/trafficking/delete/{id}', 'adminBackEnd\ProviderResourcesController@adminSexTraffickingDelete');

//Local Resources
Route::get('local/resources/admin', 'adminBackEnd\LocalResoucesController@index')->name('local.resources.admin');
Route::post('local/resources/store/admin', 'adminBackEnd\LocalResoucesController@store')->name('local.resources.store.admin');
Route::get('local/resources/admin/view', 'adminBackEnd\LocalResoucesController@view')->name('local.resources.admin.view');
Route::get('local/resources/admin/delete/{id}', 'adminBackEnd\LocalResoucesController@delete')->name('local.resources.admin.delete');
Route::get('local/resources/admin/edit/{id}', 'adminBackEnd\LocalResoucesController@edit')->name('local.resources.admin.edit');
Route::post('local/resources/admin/update', 'adminBackEnd\LocalResoucesController@update')->name('local.resources.admin.update');

Route::get('purchase/marketing/admin', 'adminBackEnd\PurchaseMarketingController@index')->name('purchase.marketing.admin');
Route::post('purchase/marketing/store/admin', 'adminBackEnd\PurchaseMarketingController@store')->name('purchase.marketing.store.admin');
Route::get('purchase/marketing/admin/view', 'adminBackEnd\PurchaseMarketingController@view')->name('purchase.marketing.admin.view');
Route::get('purchase/marketing/admin/delete/{id}', 'adminBackEnd\PurchaseMarketingController@delete')->name('purchase.marketing.admin.delete');
Route::get('purchase/marketing/admin/edit/{id}', 'adminBackEnd\PurchaseMarketingController@edit')->name('purchase.marketing.admin.edit');
Route::post('purchase/marketing/admin/update', 'adminBackEnd\PurchaseMarketingController@update')->name('purchase.marketing.admin.update');

Route::get('admin/local/resources', 'adminBackEnd\ProviderResourcesController@adminLocalResources');
Route::post('admin/local/resources/store', 'adminBackEnd\ProviderResourcesController@adminLocalResourcesStore');
Route::post('admin/local/resources/update', 'adminBackEnd\ProviderResourcesController@adminLocalResourcesUpdate');
Route::get('admin/local/resources/delete/{id}', 'adminBackEnd\ProviderResourcesController@adminLocalResourcesDelete');

//Purchase Marketing
Route::get('admin/purchase/marketing', 'adminBackEnd\ProviderResourcesController@adminPurchaseMarketing');
Route::post('admin/purchase/marketing/store', 'adminBackEnd\ProviderResourcesController@adminPurchaseMarketingStore');
Route::post('admin/purchase/marketing/update', 'adminBackEnd\ProviderResourcesController@adminPurchaseMarketingUpdate');
Route::get('admin/purchase/marketing/delete/{id}', 'adminBackEnd\ProviderResourcesController@adminPurchaseMarketingDelete');


//Become Escort
Route::get('admin/become/escort', 'adminBackEnd\ProviderResourcesController@adminBecomeEscort');
Route::post('admin/become/escort/store', 'adminBackEnd\ProviderResourcesController@adminBecomeEscortStore');
Route::post('admin/become/escort/update', 'adminBackEnd\ProviderResourcesController@adminBecomeEscortUpdate');
Route::get('admin/become/escort/delete/{id}', 'adminBackEnd\ProviderResourcesController@adminBecomeEscortDelete');


//Blogs
Route::get('admin/blog', 'adminBackEnd\ProviderResourcesController@adminBlog');
Route::post('admin/blog/store', 'adminBackEnd\ProviderResourcesController@adminBlogStore');
Route::post('admin/blog/update', 'adminBackEnd\ProviderResourcesController@adminBlogUpdate');
Route::get('admin/blog/delete/{id}', 'adminBackEnd\ProviderResourcesController@adminBlogDelete');

//Blogging Center
Route::get('admin/blogging', 'adminBackEnd\ProviderResourcesController@adminBlogging')->name('admin.blogging.index');
Route::post('admin/blogging/store', 'adminBackEnd\ProviderResourcesController@adminBloggingStore')->name('admin.blogging.store');
Route::post('admin/blogging/{id}/update', 'adminBackEnd\ProviderResourcesController@adminBloggingUpdate')->name('admin.blogging.update');
Route::get('admin/blogging/{id}/delete', 'adminBackEnd\ProviderResourcesController@adminBloggingDelete')->name('admin.blogging.delete');