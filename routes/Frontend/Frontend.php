<?php

/**
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', 'FrontendController@index')->name('index');
Route::get('macros', 'FrontendController@macros')->name('macros');
Route::get('contact', 'ContactController@index')->name('contact');
Route::post('contact/send', 'ContactController@send')->name('contact.send');
Route::get('odbctest', 'FrontendController@odbctest')->name('odbctest');

Route::get('imported', 'ImportedController@imported')->name('imported');

Route::post('imported2', 'ImportedController@imported2')->name('imported2');
Route::post('importso', 'ImportedController@importso')->name('importso');
Route::post('importedsales', 'ImportedController@importedsales')->name('importedsales');
Route::post('importedprod', 'ImportedController@importedprod')->name('importedprod');
Route::post('importps', 'ImportedController@importps')->name('importps');
Route::post('importth', 'ImportedController@importth')->name('importth');
Route::post('importinv', 'ImportedController@importinv')->name('importinv');
Route::post('importbosch', 'ImportedController@importbosch')->name('importbosch');
Route::post('importmanual', 'ImportedController@importmanual')->name('importmanual');
Route::post('importcomment', 'ImportedController@importcomment')->name('importcomment');
Route::post('importedpo', 'ImportedController@importedpo')->name('importedpo');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        /*
         * User Account Specific
         */
        Route::get('account', 'AccountController@index')->name('account');
        /*
         * User Profile Specific
         */
        Route::patch('profile/update', 'ProfileController@update')->name('profile.update');

    });
    Route::group(['prefix' => 'slsmark', 'namespace' => 'slsmark', 'middleware' => 'auth',], function () {

        Route::get('history', 'SalesController@history')->name('slsmark.history');
        Route::get('historytable', 'SalesController@historytable')->name('slsmark.historytable');
        Route::get('createcanceltable', 'SalesController@createcanceltable')->name('slsmark.createcanceltable');
        Route::get('cancelso', 'SalesController@cancelso')->name('slsmark.cancelso');
        Route::get('send', 'SalesController@send')->name('slsmark.send');
        Route::get('index', 'SalesController@index')->name('slsmark.index');
        Route::get('notfinish', 'SalesController@notfinish')->name('slsmark.notfinish');
        Route::get('unfinishtable', 'SalesController@unfinishtable')->name('slsmark.unfinishtable');
        Route::get('create', 'SalesController@create')->name('slsmark.create');
        Route::get('createhist', 'SalesController@createhist')->name('slsmark.createhist');
        Route::get('recordchange/{id}', 'SalesController@recordchange')->name('slsmark.recordchange');
        Route::get('createSales', 'SalesController@createSales')->name('slsmark.createSales');
        Route::get('createtable', 'SalesController@createtable')->name('slsmark.createtable');
        Route::get('createhistorytable', 'SalesController@createhistorytable')->name('slsmark.createhistorytable');
        Route::get('createsco/{id}', 'SalesController@createsco')->name('slsmark.createsco');
        Route::get('createsc', 'SalesController@createsc')->name('slsmark.createsc');
        Route::post('storesc', 'SalesController@storesc')->name('slsmark.storesc');
        Route::post('store/{id}', 'SalesController@store')->name('slsmark.store');
        Route::get('dataTable', 'SalesController@anyData')->name('slsmark.dataTable');
        Route::get('review', 'SalesController@review')->name('slsmark.review');
        Route::get('product', 'SalesController@product')->name('slsmark.product');
        Route::get('productrepeat', 'SalesController@productrepeat')->name('slsmark.productrepeat');
        Route::get('edit/{id}', 'SalesController@edit')->name('slsmark.edit');
        Route::get('destroy/{id}', 'SalesController@destroy')->name('slsmark.destroy');
        Route::post('storeProd/{id}', 'SalesController@storeProd')->name('slsmark.storeProd');
        Route::get('repeatpaf/{id}', 'SalesController@repeatpaf')->name('slsmark.repeatpaf');
        Route::post('storepafrepeat/{id}', 'SalesController@storepafrepeat')->name('slsmark.storepafrepeat');
        Route::get('showform', 'SalesController@showform')->name('slsmark.showform');
        Route::get('showformTable', 'SalesController@showformTable')->name('slsmark.showformTable');
        Route::get('showrepeatformTable', 'SalesController@showrepeatformTable')->name('slsmark.showrepeatformTable');
        Route::get('show/{id}', 'SalesController@show')->name('slsmark.show');
        Route::get('addrepeat', 'SalesController@addrepeat')->name('slsmark.addrepeat');
        Route::get('editrepeat/{id}', 'SalesController@editrepeat')->name('slsmark.editrepeat');
        Route::post('storeeditrepeat/{id}', 'SalesController@storeeditrepeat')->name('slsmark.storeeditrepeat');
        Route::get('tablerepeat', 'SalesController@tablerepeat')->name('slsmark.tablerepeat');
        Route::post('repeatstore', 'SalesController@repeatstore')->name('slsmark.repeatstore');
        Route::get('editform/{id}', 'SalesController@editform')->name('slsmark.editform');
        Route::post('storeform/{id}', 'SalesController@storeform')->name('slsmark.storeform');
        Route::get('delete/{id}', 'SalesController@delete')->name('slsmark.delete');
        Route::get('editscof/{id}', 'SalesController@editscof')->name('slsmark.editscof');
        Route::put('updatescof/{id}', 'SalesController@updatescof')->name('slsmark.updatescof');
        Route::get('repeat', 'SalesController@repeat')->name('slsmark.repeat');
        Route::get('repeatTable', 'SalesController@repeatTable')->name('slsmark.repeatTable');
        Route::get('listStock', 'SalesController@listStock')->name('slsmark.listStock');
        Route::get('listTable', 'SalesController@listTable')->name('slsmark.listTable');
        Route::get('stock/{id}', 'SalesController@stock')->name('slsmark.stock');
        Route::post('storestock/{id}', 'SalesController@storestock')->name('slsmark.storestock');
        Route::get('viewstock/{id}', 'SalesController@viewstock')->name('slsmark.viewstock');
        Route::get('viewstocktable/($id)', 'SalesController@viewstocktable')->name('slsmark.viewstocktable');

        // Route::get('button', 'SalesController@button')->name('slsmark.button');

        Route::get('editrcof/{id}', 'SalesController@editrcof')->name('slsmark.editrcof');
        Route::put('updatercof/{id}', 'SalesController@updatercof')->name('slsmark.updatercof');
        Route::get('showrepeat/{id}', 'SalesController@showrepeat')->name('slsmark.showrepeat');
        Route::get('destroyrepeat/{id}', 'SalesController@destroyrepeat')->name('slsmark.destroyrepeat');
        Route::get('deletestock/{id}', 'SalesController@deletestock')->name('slsmark.deletestock');

        Route::get('showsales', 'SalesController@showsales')->name('slsmark.showsales');
        Route::get('pafsro/{id}', 'SalesController@pafsro')->name('slsmark.pafsro');
        Route::post('storepafsro/{id}', 'SalesController@storepafsro')->name('slsmark.storepafsro');
        Route::get('samplerequisite/{id}', 'SalesController@samplerequisite')->name('slsmark.samplerequisite');
        Route::get('tablesample', 'SalesController@tablesample')->name('slsmark.tablesample');
        Route::post('storereq/{id}', 'SalesController@storereq')->name('slsmark.storereq');
        Route::get('requisition', 'SalesController@requisition')->name('slsmark.requisition');
        Route::get('editreq/{id}', 'SalesController@editreq')->name('slsmark.editreq');
        Route::get('viewreq/{id}', 'SalesController@viewreq')->name('slsmark.viewreq');
        Route::post('storeeditreq/{id}', 'SalesController@storeeditreq')->name('slsmark.storeeditreq');
        Route::get('sotable', 'SalesController@sotable')->name('slsmark.sotable');
        Route::get('wotable', 'SalesController@wotable')->name('slsmark.wotable');
        Route::get('wosotable', 'SalesController@wosotable')->name('slsmark.wosotable');
        Route::get('destroyreq/{id}', 'SalesController@destroyreq')->name('slsmark.destroyreq');
        Route::get('sco_paf/{id}', 'SalesController@sco_paf')->name('slsmark.sco_paf');
        Route::post('storesco/{id}', 'SalesController@storesco')->name('slsmark.storesco');
        Route::get('viewpaf/{id}', 'SalesController@viewpaf')->name('slsmark.viewpaf');
        Route::get('createpaf/{id}', 'SalesController@createpaf')->name('slsmark.createpaf');
        Route::get('da', 'SalesController@da')->name('slsmark.da');
        Route::get('deliveryadvice/{id}', 'SalesController@deliveryadvice')->name('slsmark.deliveryadvice');
        Route::get('datable', 'SalesController@datable')->name('slsmark.datable');
        Route::post('dastore/{id}', 'SalesController@dastore')->name('slsmark.dastore');

        Route::post('storedateda/{id}', 'SalesController@storedateda')->name('slsmark.storedateda');
        Route::post('search', 'SalesController@search')->name('slsmark.search');
        Route::get('searchda/{id}', 'SalesController@searchda')->name('slsmark.searchda');
        Route::get('searchdatable', 'SalesController@searchdatable')->name('slsmark.searchdatable');
        Route::get('deletefile/{id}', 'SalesController@deletefile')->name('slsmark.deletefile');
        Route::get('deletereqfile/{id}', 'SalesController@deletereqfile')->name('slsmark.deletereqfile');
        Route::get('stockstatus', 'SalesController@stockstatus')->name('slsmark.stockstatus');
        Route::get('tablestock', 'SalesController@tablestock')->name('slsmark.tablestock');
        Route::get('stocklist', 'SalesController@stocklist')->name('slsmark.stocklist');
        Route::get('addremarkmstock/{id}', 'SalesController@addremarkmstock')->name('slsmark.addremarkmstock');
        Route::post('storeremarkmanual/{id}', 'SalesController@storeremarkmanual')->name('slsmark.storeremarkmanual');
        Route::get('manualstock/{id}', 'SalesController@manualstock')->name('slsmark.manualstock');
        Route::post('manualstore/{id}', 'SalesController@manualstore')->name('slsmark.manualstore');
        Route::get('stocktables1', 'SalesController@stocktables1')->name('slsmark.stocktables1');
        Route::get('stocktables2', 'SalesController@stocktables2')->name('slsmark.stocktables2');
        Route::post('storestocks1/{id}', 'SalesController@storestocks1')->name('slsmark.storestocks1');
        Route::post('storestocks2', 'SalesController@storestocks2')->name('slsmark.storestocks2');
        Route::get('confirmreq/{id}', 'SalesController@confirmreq')->name('slsmark.confirmreq');

        Route::get('samplereq', 'SalesController@samplereq')->name('slsmark.samplereq');
        Route::post('storereq2', 'SalesController@storereq2')->name('slsmark.storereq2');
        Route::get('editstock/{id}', 'SalesController@editstock')->name('slsmark.editstock');
        Route::get('updatewidtable', 'SalesController@updatewidtable')->name('slsmark.updatewidtable');
        Route::get('updatewid', 'SalesController@updatewid')->name('slsmark.updatewid');
        Route::get('tablewid', 'SalesController@tablewid')->name('slsmark.tablewid');
        Route::post('updatewidview', 'SalesController@updatewidview')->name('slsmark.updatewidview');
        Route::post('updatewidstore', 'SalesController@updatewidstore')->name('slsmark.updatewidstore');
        Route::get('editwid/{id}', 'SalesController@editwid')->name('slsmark.editwid');
        Route::post('editwidstore/{id}', 'SalesController@editwidstore')->name('slsmark.editwidstore');
        Route::get('editwidtable', 'SalesController@editwidtable')->name('slsmark.editwidtable');
        Route::get('deletewid/{id}', 'SalesController@deletewid')->name('slsmark.deletewid');
        Route::get('dalist/', 'SalesController@dalist')->name('slsmark.dalist');
        Route::post('storebosch', 'SalesController@storebosch')->name('slsmark.storebosch');
        Route::post('changebosch', 'SalesController@changebosch')->name('slsmark.changebosch');
        Route::get('daselect', 'SalesController@daselect')->name('slsmark.daselect');
        Route::get('format1', 'SalesController@format1')->name('slsmark.format1');
        Route::get('format2/{id}', 'SalesController@format2')->name('slsmark.format2');
        Route::post('savef2/{id}', 'SalesController@savef2')->name('slsmark.savef2');
        Route::get('format3/{id}', 'SalesController@format3')->name('slsmark.format3');
        Route::post('updatef2/{id}', 'SalesController@updatef2')->name('slsmark.updatef2');
        Route::get('etctable', 'SalesController@etctable')->name('slsmark.etctable');
        Route::get('boschtable', 'SalesController@boschtable')->name('slsmark.boschtable');
        Route::get('editname', 'SalesController@editname')->name('slsmark.editname');
        Route::post('storeeditname', 'SalesController@storeeditname')->name('slsmark.storeeditname');
        Route::post('storeeditbosch', 'SalesController@storeeditbosch')->name('slsmark.storeeditbosch');
        Route::get('historysc', 'SalesController@historysc')->name('slsmark.historysc');
        Route::get('histsctable', 'SalesController@histsctable')->name('slsmark.histsctable');
        Route::get('newsc', 'SalesController@newsc')->name('slsmark.newsc');
        Route::get('newsctable', 'SalesController@newsctable')->name('slsmark.newsctable');
        Route::get('notfinishistorysc', 'SalesController@notfinishistorysc')->name('slsmark.notfinishistorysc');
        Route::get('notfinishnewsc', 'SalesController@notfinishnewsc')->name('slsmark.notfinishnewsc');
        Route::get('printbosch', 'SalesController@printbosch')->name('slsmark.printbosch');
        Route::post('boschpdf', 'SalesController@boschpdf')->name('slsmark.boschpdf');
        Route::get('bosch', 'SalesController@bosch')->name('slsmark.bosch');
        Route::get('otherformat', 'SalesController@otherformat')->name('slsmark.otherformat');
        Route::get('otherformattable', 'SalesController@otherformattable')->name('slsmark.otherformattable');
        Route::get('printother', 'SalesController@printother')->name('slsmark.printother');
        Route::post('otherpdf', 'SalesController@otherpdf')->name('slsmark.otherpdf');
        Route::get('createrepeat/{id}', 'SalesController@createrepeat')->name('slsmark.createrepeat');
        Route::get('createpaf/{id}', 'SalesController@createpaf')->name('slsmark.createpaf');
        Route::post('storepaf/{id}', 'SalesController@storepaf')->name('slsmark.storepaf');
        Route::get('storerepeat/{id}', 'SalesController@storerepeat')->name('slsmark.storerepeat');
        Route::get('remarkso/{id}', 'SalesController@remarkso')->name('slsmark.remarkso');
        Route::post('storeremarkso/{id}', 'SalesController@storeremarkso')->name('slsmark.storeremarkso');
        Route::get('reviewhistory', 'SalesController@reviewhistory')->name('slsmark.reviewhistory');
        Route::get('showformhistTable', 'SalesController@showformhistTable')->name('slsmark.showformhistTable');
        Route::get('showsaleshist', 'SalesController@showsaleshist')->name('slsmark.showsaleshist');
        Route::get('requisition2', 'SalesController@requisition2')->name('slsmark.requisition2');
        Route::get('navsro', 'SalesController@navsro')->name('slsmark.navsro');
        Route::get('newmanualso', 'SalesController@newmanualso')->name('slsmark.newmanualso');
        Route::get('histmanualso', 'SalesController@histmanualso')->name('slsmark.histmanualso');
        Route::get('navmanual', 'SalesController@navmanual')->name('slsmark.navmanual');
        Route::get('newmanualtable', 'SalesController@newmanualtable')->name('slsmark.newmanualtable');
        Route::get('histmanualtable', 'SalesController@histmanualtable')->name('slsmark.histmanualtable');
        Route::get('confirmmanualso', 'SalesController@confirmmanualso')->name('slsmark.confirmmanualso');
        Route::put('excel', 'SalesController@excel')->name('slsmark.excel');
        Route::get('reporting', 'SalesController@reporting')->name('slsmark.reporting');
        Route::get('reportingtable', 'SalesController@reportingtable')->name('slsmark.reportingtable');
        Route::get('report', 'SalesController@report')->name('slsmark.report');
        Route::get('createstock/{id}', 'SalesController@createstock')->name('slsmark.createstock');
        Route::post('stockstores/{id}', 'SalesController@stockstores')->name('slsmark.stockstores');



    });

    Route::group(['prefix' => 'plan', 'namespace' => 'plan', 'middleware' => 'auth',], function () {

        Route::get('index', 'PlanController@index')->name('plan.index');
        Route::get('anyData', 'PlanController@anyData')->name('plan.anyData');
        Route::get('destroy/{id}', 'PlanController@destroy')->name('plan.destroy');
        Route::get('edit/{id}', 'PlanController@edit')->name('plan.edit');
        Route::put('update/{id}', 'PlanController@update')->name('plan.update');
        Route::get('repeatData', 'PlanController@repeatData')->name('plan.repeatData');
        Route::get('repeatEdit/{id}', 'PlanController@repeatEdit')->name('plan.repeatEdit');
        Route::put('repeatUpdate/{id}', 'PlanController@repeatUpdate')->name('plan.repeatUpdate');
        Route::get('paf', 'PlanController@paf')->name('plan.paf');
        Route::get('pafTable', 'PlanController@pafTable')->name('plan.pafTable');
        Route::get('pafform/{id}', 'PlanController@pafform')->name('plan.pafform');
        Route::get('planningmaster', 'PlanController@planningmaster')->name('plan.planningmaster');
        Route::get('planningTable', 'PlanController@planningTable')->name('plan.planningTable');

        Route::get('softCover/{id}', 'PlanController@softCover')->name('plan.softCover');
        Route::post('softcoverStore/{id}', 'PlanController@softcoverStore')->name('plan.softcoverStore');
        Route::get('softCoverBW/{id}', 'PlanController@softCoverBW')->name('plan.softCoverBW');
        Route::post('softcoverbwStore/{id}', 'PlanController@softcoverbwStore')->name('plan.softcoverbwStore');
        Route::get('softCoverOverseas/{id}', 'PlanController@softCoverOverseas')->name('plan.softCoverOverseas');
        Route::post('softcoveroverseasStore/{id}', 'PlanController@softcoveroverseasStore')->name('plan.softcoveroverseasStore');
        Route::get('softCoverOverseaWT/{id}', 'PlanController@softCoverOverseaWT')->name('plan.softCoverOverseaWT');
        Route::post('softcoveroverseawtStore/{id}', 'PlanController@softcoveroverseawtStore')->name('plan.softcoveroverseawtStore');
        Route::get('boxes/{id}', 'PlanController@boxes')->name('plan.boxes');
        Route::post('boxesstore/{id}', 'PlanController@boxesstore')->name('plan.boxesstore');
        Route::get('planning/{id}', 'PlanController@planning')->name('plan.planning');
        Route::post('planningstore/{id}', 'PlanController@planningstore')->name('plan.planningstore');

        Route::get('liststock', 'PlanController@liststock')->name('plan.liststock');
        Route::get('stock/{id}', 'PlanController@stock')->name('plan.stock');
        Route::post('storestock/{id}', 'PlanController@storestock')->name('plan.storestock');
        Route::get('viewstock/{id}', 'PlanController@viewstock')->name('plan.viewstock');
        Route::get('viewstocktableplan/(id)', 'PlanController@viewstocktableplan')->name('plan.viewstocktableplan');

        Route::get('listTable', 'PlanController@listTable')->name('plan.listTable');
        Route::get('sotable', 'PlanController@sotable')->name('plan.sotable');
        Route::get('deletestock/{id}', 'PlanController@deletestock')->name('plan.deletestock');

        Route::get('potable', 'PlanController@potable')->name('plan.potable');
        Route::get('wotable', 'PlanController@wotable')->name('plan.wotable');
        Route::get('powotable', 'PlanController@powotable')->name('plan.powotable');

        Route::get('softcoverpreview/{id}', 'PlanController@softcoverpreview')->name('plan.softcoverpreview');
        Route::get('softcoverbwpreview/{id}', 'PlanController@softcoverbwpreview')->name('plan.softcoverbwpreview');
        Route::get('softcoveroverseaspreview/{id}', 'PlanController@softcoveroverseaspreview')->name('plan.softcoveroverseaspreview');
        Route::get('softcoveroverseaswtpreview/{id}', 'PlanController@softcoveroverseaswtpreview')->name('plan.softcoveroverseaswtpreview');
        Route::get('planningpreview/{id}', 'PlanController@planningpreview')->name('plan.planningpreview');
        Route::get('boxespreview/{id}', 'PlanController@boxespreview')->name('plan.boxespreview');

        Route::get('softcoverview', 'PlanController@softcoverview')->name('plan.softcoverview');
        Route::get('softcovertable', 'PlanController@softcovertable')->name('plan.softcovertable');
        Route::get('softcoverbwview', 'PlanController@softcoverbwview')->name('plan.softcoverbwview');
        Route::get('softcoverbwtable', 'PlanController@softcoverbwtable')->name('plan.softcoverbwtable');
        Route::get('softcoveroverseasview', 'PlanController@softcoveroverseasview')->name('plan.softcoveroverseasview');
        Route::get('softcoveroverseastable', 'PlanController@softcoveroverseastable')->name('plan.softcoveroverseastable');
        Route::get('softcoveroverseaswtview', 'PlanController@softcoveroverseaswtview')->name('plan.softcoveroverseaswtview');
        Route::get('softcoveroverseaswttable', 'PlanController@softcoveroverseaswttable')->name('plan.softcoveroverseaswttable');
        Route::get('boxesview', 'PlanController@boxesview')->name('plan.boxesview');
        Route::get('boxestable', 'PlanController@boxestable')->name('plan.boxestable');
        Route::get('planningview', 'PlanController@planningview')->name('plan.planningview');
        Route::get('planningstable', 'PlanController@planningstable')->name('plan.planningstable');

        Route::get('selectformula/{id}', 'PlanController@selectformula')->name('plan.selectformula');
        Route::get('selectpn', 'PlanController@selectpn')->name('plan.selectpn');
        Route::get('selectpntable', 'PlanController@selectpntable')->name('plan.selectpntable');
        Route::get('select/{id}', 'PlanController@select')->name('plan.select');
        Route::get('viewscopaf/{id}', 'PlanController@viewscopaf')->name('plan.viewscopaf');
        Route::get('production/{id}', 'PlanController@production')->name('plan.production');
        Route::get('listsales', 'PlanController@listsales')->name('plan.listsales');
        Route::get('prodtable', 'PlanController@prodtable')->name('plan.prodtable');
        Route::post('storeproduction/{id}', 'PlanController@storeproduction')->name('plan.storeproduction');
        Route::get('productiontable', 'PlanController@productiontable')->name('plan.productiontable');
        Route::get('viewproduction/{id}', 'PlanController@viewproduction')->name('plan.viewproduction');
        Route::get('listbalance', 'PlanController@listbalance')->name('plan.listbalance');
        Route::get('listhistorybalance', 'PlanController@listhistorybalance')->name('plan.listhistorybalance');
        Route::get('tablelisthist', 'PlanController@tablelisthist')->name('plan.tablelisthist');

        Route::get('tablelist', 'PlanController@tablelist')->name('plan.tablelist');
        Route::get('stockbalance/{id}', 'PlanController@stockbalance')->name('plan.stockbalance');
        Route::post('searchwid/{id}', 'PlanController@searchwid')->name('plan.searchwid');
        Route::get('editpaperroll/{id}', 'PlanController@editpaperroll')->name('plan.editpaperroll');
        Route::post('updateroll/{id}', 'PlanController@updateroll')->name('plan.updateroll');
        Route::post('balancestore/{id}', 'PlanController@balancestore')->name('plan.balancestore');
        Route::get('tablebalance', 'PlanController@tablebalance')->name('plan.tablebalance');
        Route::get('delete/{id}', 'PlanController@delete')->name('plan.delete');
        Route::get('editbalance/{id}', 'PlanController@editbalance')->name('plan.editbalance');
        Route::post('storeeditbalance/{id}', 'PlanController@storeeditbalance')->name('plan.storeeditbalance');
        Route::get('sheeting/{id}', 'PlanController@sheeting')->name('plan.sheeting');
        Route::post('sheetingstore/{id}', 'PlanController@sheetingstore')->name('plan.sheetingstore');
        Route::get('viewstock/{id}', 'PlanController@viewstock')->name('plan.viewstock');
        Route::get('sheettable', 'PlanController@sheettable')->name('plan.sheettable');
        Route::get('deletesheet/{id}', 'PlanController@deletesheet')->name('plan.deletesheet');

        Route::get('deletes1/{id}', 'PlanController@deletes1')->name('plan.deletes1');
        Route::get('deletes2/{id}', 'PlanController@deletes2')->name('plan.deletes2');
        Route::get('deletes3/{id}', 'PlanController@deletes3')->name('plan.deletes3');
        Route::get('deletes4/{id}', 'PlanController@deletes4')->name('plan.deletes4');
        Route::get('deletes5/{id}', 'PlanController@deletes5')->name('plan.deletes5');
        Route::get('deletes6/{id}', 'PlanController@deletes6')->name('plan.deletes6');

        Route::get('softcoveredit/{id}', 'PlanController@softcoveredit')->name('plan.softcoveredit');
        Route::post('softcoverupdate/{id}', 'PlanController@softcoverupdate')->name('plan.softcoverupdate');
        Route::get('softcoverbwedit/{id}', 'PlanController@softcoverbwedit')->name('plan.softcoverbwedit');
        Route::post('softcoverbwupdate/{id}', 'PlanController@softcoverbwupdate')->name('plan.softcoverbwupdate');
        Route::get('softcoveroverseawtedit/{id}', 'PlanController@softcoveroverseawtedit')->name('plan.softcoveroverseawtedit');
        Route::post('softcoveroverseawtupdate/{id}', 'PlanController@softcoveroverseawtupdate')->name('plan.softcoveroverseawtupdate');
        Route::get('softcoveroverseafbedit/{id}', 'PlanController@softcoveroverseafbedit')->name('plan.softcoveroverseafbedit');
        Route::post('softcoveroverseafbupdate/{id}', 'PlanController@softcoveroverseafbupdate')->name('plan.softcoveroverseafbupdate');
        Route::get('boxesedit/{id}', 'PlanController@boxesedit')->name('plan.boxesedit');
        Route::post('boxesupdate/{id}', 'PlanController@boxesupdate')->name('plan.boxesupdate');
        Route::get('planningedit/{id}', 'PlanController@planningedit')->name('plan.planningedit');
        Route::post('planningupdate/{id}', 'PlanController@planningupdate')->name('plan.planningupdate');


        Route::get('editproduction/{id}', 'PlanController@editproduction')->name('plan.editproduction');
        Route::post('updateproduction/{id}', 'PlanController@updateproduction')->name('plan.updateproduction');

        Route::get('listformula', 'PlanController@listformula')->name('plan.listformula');
        Route::get('formulatable', 'PlanController@formulatable')->name('plan.formulatable');
        Route::get('addremark/{id}', 'PlanController@addremark')->name('plan.addremark');
        Route::post('remarkstore/{id}', 'PlanController@remarkstore')->name('plan.remarkstore');
        Route::post('updateremark/{id}', 'PlanController@updateremark')->name('plan.updateremark');
        Route::get('requisition', 'PlanController@requisition')->name('plan.requisition');
        Route::get('sample', 'PlanController@sample')->name('plan.sample');
        Route::get('viewreq/{id}', 'PlanController@viewreq')->name('plan.viewreq');
        Route::get('confirmreq/{id}', 'PlanController@confirmreq')->name('plan.confirmreq');
        Route::post('jobconfirmstore/{id}', 'PlanController@jobconfirmstore')->name('plan.jobconfirmstore');
        Route::get('oldjob', 'PlanController@oldjob')->name('plan.oldjob');
        Route::get('oldjobtable', 'PlanController@oldjobtable')->name('plan.oldjobtable');
        Route::get('choosepo', 'PlanController@choosepo')->name('plan.choosepo');
        Route::post('chooseposearch', 'PlanController@chooseposearch')->name('plan.chooseposearch');
        Route::get('newroll/{id}', 'PlanController@newroll')->name('plan.newroll');
        Route::post('storeroll', 'PlanController@storeroll')->name('plan.storeroll');
        Route::get('pafconfirm', 'PlanController@pafconfirm')->name('plan.pafconfirm');
        Route::get('navpaf', 'PlanController@navpaf')->name('plan.navpaf');
        Route::get('pafTable2', 'PlanController@pafTable2')->name('plan.pafTable2');
        Route::get('requisition2', 'PlanController@requisition2')->name('plan.requisition2');
        Route::get('sroconfirm', 'PlanController@sroconfirm')->name('plan.sroconfirm');
        Route::get('navsro', 'PlanController@navsro')->name('plan.navsro');
        Route::get('navrep', 'PlanController@navrep')->name('plan.navrep');
        Route::get('repeat', 'PlanController@repeat')->name('plan.repeat');
        Route::get('repeattable1', 'PlanController@repeattable1')->name('plan.repeattable1');
        Route::get('repeatconfirm', 'PlanController@repeatconfirm')->name('plan.repeatconfirm');
        Route::get('repeattable2', 'PlanController@repeattable2')->name('plan.repeattable2');
        Route::get('repeats/{id}', 'PlanController@repeats')->name('plan.repeats');
        Route::put('updatebom/{id}', 'PlanController@updatebom')->name('plan.updatebom');
        Route::get('newmanualso', 'PlanController@newmanualso')->name('plan.newmanualso');
        Route::get('confirmmanualso/{id}', 'PlanController@confirmmanualso')->name('plan.confirmmanualso');
        Route::get('histmanualso', 'PlanController@histmanualso')->name('plan.histmanualso');
        Route::get('navmanual', 'PlanController@navmanual')->name('plan.navmanual');
        Route::get('newmanualtable', 'PlanController@newmanualtable')->name('plan.newmanualtable');
        Route::get('histmanualtable', 'PlanController@histmanualtable')->name('plan.histmanualtable');
        Route::get('navroll', 'PlanController@navroll')->name('plan.navroll');

        Route::get('addmanual/{id}', 'PlanController@addmanual')->name('plan.addmanual');
        Route::post('storemanual/{id}', 'PlanController@storemanual')->name('plan.storemanual');

	});

    

   Route::group(['prefix' => 'production', 'namespace' => 'production', 'middleware' => 'auth',], function () {
        Route::get('index', 'ProductionController@index')->name('production.index');
        Route::get('anyData', 'ProductionController@anyData')->name('production.anyData');

        Route::get('diecut', 'ProductionController@diecut')->name('production.diecut');
        Route::get('viewdiecut/{id}', 'ProductionController@viewdiecut')->name('production.viewdiecut');
        Route::get('dietable', 'ProductionController@dietable')->name('production.dietable');
        Route::post('storedie/{id}', 'ProductionController@storedie')->name('production.storedie');

        Route::get('print', 'ProductionController@print')->name('production.print');
        Route::get('viewprint/{id}', 'ProductionController@viewprint')->name('production.viewprint');
        Route::get('printtable', 'ProductionController@printtable')->name('production.printtable');
        Route::post('storeprint/{id}', 'ProductionController@storeprint')->name('production.storeprint');

        Route::get('trim', 'ProductionController@trim')->name('production.trim');
        Route::get('viewtrim/{id}', 'ProductionController@viewtrim')->name('production.viewtrim');
        Route::get('trimtable', 'ProductionController@trimtable')->name('production.trimtable');
        Route::post('storetrim/{id}', 'ProductionController@storetrim')->name('production.storetrim');

        Route::get('stripping', 'ProductionController@stripping')->name('production.stripping');
        Route::get('viewstrip/{id}', 'ProductionController@viewstrip')->name('production.viewstrip');
        Route::get('striptable', 'ProductionController@striptable')->name('production.striptable');
        Route::post('storestrip/{id}', 'ProductionController@storestrip')->name('production.storestrip');

        Route::get('folding', 'ProductionController@folding')->name('production.folding');
        Route::get('viewfold/{id}', 'ProductionController@viewfold')->name('production.viewfold');
        Route::get('foldtable', 'ProductionController@foldtable')->name('production.foldtable');
        Route::post('storefold/{id}', 'ProductionController@storefold')->name('production.storefold');

        Route::get('sewing', 'ProductionController@sewing')->name('production.sewing');
        Route::get('viewsew/{id}', 'ProductionController@viewsew')->name('production.viewsew');
        Route::get('sewtable', 'ProductionController@sewtable')->name('production.sewtable');
        Route::post('storesew/{id}', 'ProductionController@storesew')->name('production.storesew');

        Route::get('binding', 'ProductionController@binding')->name('production.binding');
        Route::get('viewbind/{id}', 'ProductionController@viewbind')->name('production.viewbind');
        Route::get('bindtable', 'ProductionController@bindtable')->name('production.bindtable');
        Route::post('storebind/{id}', 'ProductionController@storebind')->name('production.storebind');

        Route::get('threeknifetrim', 'ProductionController@threeknifetrim')->name('production.threeknifetrim');
        Route::get('viewthreeknife/{id}', 'ProductionController@viewthreeknife')->name('production.viewthreeknife');
        Route::get('threetable', 'ProductionController@threetable')->name('production.threetable');
        Route::post('storethree/{id}', 'ProductionController@storethree')->name('production.storethree');

        Route::get('packing', 'ProductionController@packing')->name('production.packing');
        Route::get('viewpack/{id}', 'ProductionController@viewpack')->name('production.viewpack');
        Route::get('packtable', 'ProductionController@packtable')->name('production.packtable');
        Route::post('storepack/{id}', 'ProductionController@storepack')->name('production.storepack');

        Route::get('surfacefinishing', 'ProductionController@surfacefinishing')->name('production.surfacefinishing');
        Route::get('viewsurface/{id}', 'ProductionController@viewsurface')->name('production.viewsurface');
        Route::get('surfacetable', 'ProductionController@surfacetable')->name('production.surfacetable');
        Route::post('storesurf/{id}', 'ProductionController@storesurf')->name('production.storesurf');

        Route::get('flute', 'ProductionController@flute')->name('production.flute');
        Route::get('viewflute/{id}', 'ProductionController@viewflute')->name('production.viewflute');
        Route::get('flutetable', 'ProductionController@flutetable')->name('production.flutetable');
        Route::post('storeflute/{id}', 'ProductionController@storeflute')->name('production.storeflute');

        Route::get('window', 'ProductionController@window')->name('production.window');
        Route::get('viewwindow/{id}', 'ProductionController@viewwindow')->name('production.viewwindow');
        Route::get('windowtable', 'ProductionController@windowtable')->name('production.windowtable');
        Route::post('storewindow/{id}', 'ProductionController@storewindow')->name('production.storewindow');

        Route::get('glue', 'ProductionController@glue')->name('production.glue');
        Route::get('viewglue/{id}', 'ProductionController@viewglue')->name('production.viewglue');
        Route::get('gluetable', 'ProductionController@gluetable')->name('production.gluetable');
        Route::post('storeglue/{id}', 'ProductionController@storeglue')->name('production.storeglue');

        Route::get('cut', 'ProductionController@cut')->name('production.cut');
        Route::get('viewcut/{id}', 'ProductionController@viewcut')->name('production.viewcut');
        Route::get('cuttable', 'ProductionController@cuttable')->name('production.cuttable');
        Route::post('storecut/{id}', 'ProductionController@storecut')->name('production.storecut');

        Route::get('ai', 'ProductionController@ai')->name('production.ai');
        Route::get('viewai/{id}', 'ProductionController@viewai')->name('production.viewai');
        Route::get('aitable', 'ProductionController@aitable')->name('production.aitable');
        Route::post('storeai/{id}', 'ProductionController@storeai')->name('production.storeai');

        Route::get('varnish', 'ProductionController@varnish')->name('production.varnish');
        Route::get('viewvarnish/{id}', 'ProductionController@viewvarnish')->name('production.viewvarnish');
        Route::get('varnishtable', 'ProductionController@varnishtable')->name('production.varnishtable');
        Route::post('storevarnish/{id}', 'ProductionController@storevarnish')->name('production.storevarnish');

    });

    Route::group(['prefix' => 'report', 'namespace' => 'report', 'middleware' => 'auth',], function () {
        Route::get('index', 'ReportController@index')->name('report.index');
        Route::get('indexresult', 'ReportController@indexresult')->name('report.indexresult');
        Route::post('indexpdf', 'ReportController@indexpdf')->name('report.indexpdf');
        Route::post('reportsearch', 'ReportController@reportsearch')->name('report.reportsearch');
        Route::get('anydata', 'ReportController@anydata')->name('report.anydata');

        Route::get('slsmarktable', 'ReportController@slsmarktable')->name('report.slsmarktable');
        Route::get('viewplanning', 'ReportController@viewplanning')->name('report.viewplanning');
        Route::get('edit/{id}', 'ReportController@edit')->name('report.edit');
        Route::get('destroy/{id}', 'ReportController@destroy')->name('report.destroy');
    });

    Route::group(['prefix' => 'ctp', 'namespace' => 'ctp', 'middleware' => 'auth',], function () {
        Route::get('index', 'CtpController@index')->name('ctp.index');
        Route::get('index_dc', 'CtpController@index_dc')->name('ctp.index_dc');
        Route::get('index_fd', 'CtpController@index_fd')->name('ctp.index_fd');
        Route::get('index_ff', 'CtpController@index_ff')->name('ctp.index_ff');
        Route::get('drop_down', 'CtpController@drop_down')->name('ctp.drop_down');
        Route::get('request', 'CtpController@request')->name('ctp.request');
        Route::get('drop_down_insert', 'CtpController@drop_down_insert')->name('ctp.drop_down_insert');
        Route::get('anyData', 'CtpController@anyData')->name('ctp.anyData');
        Route::get('insert', 'CtpController@insert')->name('ctp.insert');
        Route::get('insertRequest', 'CtpController@insertRequest')->name('ctp.insertRequest');
        Route::get('pickup', 'CtpController@pickup')->name('ctp.pickup');
        Route::get('delete', 'CtpController@delete')->name('ctp.delete');
        Route::get('deleteRequest', 'CtpController@deleteRequest')->name('ctp.deleteRequest');
        Route::get('modify', 'CtpController@modify')->name('ctp.modify');
        Route::get('modifyRequest', 'CtpController@modifyRequest')->name('ctp.modifyRequest');
        Route::get('replace', 'CtpController@replace')->name('ctp.replace');
        Route::get('complete', 'CtpController@complete')->name('ctp.complete');
        Route::get('selectData', 'CtpController@selectData')->name('ctp.selectData');
        Route::get('selectDataTran', 'CtpController@selectDataTran')->name('ctp.selectDataTran');
        Route::get('selectDataWo', 'CtpController@selectDataWo')->name('ctp.selectDataWo');
        Route::get('selectDataReq', 'CtpController@selectDataReq')->name('ctp.selectDataReq');
        Route::get('trans', 'CtpController@trans')->name('ctp.trans');
        Route::get('trans_dc', 'CtpController@trans_dc')->name('ctp.trans_dc');
        Route::get('trans_fd', 'CtpController@trans_fd')->name('ctp.trans_fd');
        Route::get('trans_ff', 'CtpController@trans_ff')->name('ctp.trans_ff');
        Route::get('print', 'CtpController@print')->name('ctp.print');
        Route::get('anyDataWo', 'CtpController@anyDataWo')->name('ctp.anyDataWo');
        Route::get('anyDataMove', 'CtpController@anyDataMove')->name('ctp.anyDataMove');
        Route::get('anyDataMain', 'CtpController@anyDataMain')->name('ctp.anyDataMain');
        Route::get('anyDataRequest', 'CtpController@anyDataRequest')->name('ctp.anyDataRequest');
        /* Route::get('edit/{id}', 'CtpController@edit')->name('ctp.edit');
        Route::put('update/{id}', 'CtpController@update')->name('ctp.update');
        Route::get('destroy/{id}', 'CtpController@destroy')->name('ctp.destroy');
        Route::get('repeatEdit/{id}', 'CtpController@repeatEdit')->name('ctp.repeatEdit');
        Route::put('repeatUpdate/{id}', 'CtpController@repeatUpdate')->name('ctp.repeatUpdate');
        Route::get('repeatData', 'CtpController@repeatData')->name('ctp.repeatData'); */
    });

    Route::group(['prefix' => 'printing', 'namespace' => 'printing', 'middleware' => 'auth',], function () {
        Route::get('index', 'PrintingController@index')->name('printing.index');
        Route::get('employee', 'PrintingController@employee')->name('printing.employee');
        Route::get('wc', 'PrintingController@wc')->name('printing.wc');
        Route::get('pack', 'PrintingController@pack')->name('printing.pack');
        Route::get('index_plate', 'PrintingController@index_plate')->name('printing.index_plate');
        Route::get('index_dc', 'PrintingController@index_dc')->name('printing.index_dc');
        Route::get('index_fd', 'PrintingController@index_fd')->name('printing.index_fd');
        Route::get('index_ff', 'PrintingController@index_ff')->name('printing.index_ff');
        Route::get('drop_down', 'PrintingController@drop_down')->name('printing.drop_down');
        Route::get('trans', 'PrintingController@trans')->name('printing.trans');
        Route::get('trans_dc', 'PrintingController@trans_dc')->name('printing.trans_dc');
        Route::get('trans_fd', 'PrintingController@trans_fd')->name('printing.trans_fd');
        Route::get('trans_ff', 'PrintingController@trans_ff')->name('printing.trans_ff');
        Route::get('request', 'PrintingController@request')->name('printing.request');
        Route::get('insert', 'PrintingController@insert')->name('printing.insert');
        Route::get('insertEmp', 'PrintingController@insertEmp')->name('printing.insertEmp');
        Route::post('insertWc', 'PrintingController@insertWc')->name('printing.insertWc');
        Route::get('insertPack', 'PrintingController@insertPack')->name('printing.insertPack');
        Route::get('modify', 'PrintingController@modify')->name('printing.modify');
        Route::get('modifyEmp', 'PrintingController@modifyEmp')->name('printing.modifyEmp');
        Route::post('modifyWc', 'PrintingController@modifyWc')->name('printing.modifyWc');
        Route::get('modifyPack', 'PrintingController@modifyPack')->name('printing.modifyPack');
        Route::get('delete', 'PrintingController@delete')->name('printing.delete');
        Route::get('deleteEmp', 'PrintingController@deleteEmp')->name('printing.deleteEmp');
        Route::get('deleteWc', 'PrintingController@deleteWc')->name('printing.deleteWc');
        Route::get('deletePack', 'PrintingController@deletePack')->name('printing.deletePack');
        Route::get('verify', 'PrintingController@verify')->name('printing.verify');
        Route::get('transfer', 'PrintingController@transfer')->name('printing.transfer');
        Route::get('anyData', 'PrintingController@anyData')->name('printing.anyData');
        Route::get('anyDataEmp', 'PrintingController@anyDataEmp')->name('printing.anyDataEmp');
        Route::get('anyDataWc', 'PrintingController@anyDataWc')->name('printing.anyDataWc');
        Route::get('anyDataPack', 'PrintingController@anyDataPack')->name('printing.anyDataPack');
        Route::get('selectData', 'PrintingController@selectData')->name('printing.selectData');
        Route::get('selectDataEmp', 'PrintingController@selectDataEmp')->name('printing.selectDataEmp');
        Route::get('selectDataWc', 'PrintingController@selectDataWc')->name('printing.selectDataWc');
        Route::get('selectDataPack', 'PrintingController@selectDataPack')->name('printing.selectDataPack');
        Route::get('selectDataWorkCenter', 'PrintingController@selectDataWorkCenter')->name('printing.selectDataWorkCenter');
        Route::get('selectDataWoId', 'PrintingController@selectDataWoId')->name('printing.selectDataWoId');
        Route::get('selectDataPartNo', 'PrintingController@selectDataPartNo')->name('printing.selectDataPartNo');
        Route::get('selectDataWoEmp', 'PrintingController@selectDataWoEmp')->name('printing.selectDataWoEmp');
        Route::get('selectDataPartUm', 'PrintingController@selectDataPartUm')->name('printing.selectDataPartUm');

        Route::get('view', 'PrintingController@view')->name('printing.view');


        Route::get('edit/{id}', 'PrintingController@edit')->name('printing.edit');
        Route::put('update/{id}', 'PrintingController@update')->name('printing.update');
        Route::get('repeatData', 'PrintingController@repeatData')->name('printing.repeatData');
        Route::get('repeatEdit/{id}', 'PrintingController@repeatEdit')->name('printing.repeatEdit');
        Route::put('repeatUpdate/{id}', 'PrintingController@repeatUpdate')->name('printing.repeatUpdate');
        Route::get('destroy/{id}', 'PrintingController@destroy')->name('printing.destroy');
    });

    Route::group(['prefix' => 'request', 'namespace' => 'request', 'middleware' => 'auth',], function () {
        Route::get('index', 'RequestController@index')->name('request.index');
        Route::get('anyData', 'RequestController@anyData')->name('request.anyData');
        Route::get('insert', 'RequestController@insert')->name('request.insert');
        Route::get('modify', 'RequestController@modify')->name('request.modify');
        Route::get('delete', 'RequestController@delete')->name('request.delete');
        Route::get('approve', 'RequestController@approve')->name('request.approve');
        Route::get('close', 'RequestController@close')->name('request.close');
        Route::get('selectData', 'RequestController@selectData')->name('request.selectData');
    });

    Route::group(['prefix' => 'jobreq', 'namespace' => 'jobreq', 'middleware' => 'auth',], function () {
        Route::get('index', 'JobReqController@index')->name('jobreq.index');
        Route::get('anyDataRequest', 'JobReqController@anyDataRequest')->name('jobreq.anyDataRequest');
        Route::get('insertRequest', 'JobReqController@insertRequest')->name('jobreq.insertRequest');
        Route::get('modifyRequest', 'JobReqController@modifyRequest')->name('jobreq.modifyRequest');
        Route::get('deleteRequest', 'JobReqController@deleteRequest')->name('jobreq.deleteRequest');
        Route::get('startRequest', 'JobReqController@startRequest')->name('jobreq.startRequest');
        Route::get('completeRequest', 'JobReqController@completeRequest')->name('jobreq.completeRequest');
        Route::get('pickupRequest', 'JobReqController@pickupRequest')->name('jobreq.pickupRequest');
        Route::get('selectDataRequest', 'JobReqController@selectDataRequest')->name('jobreq.selectDataRequest');
    });

});
