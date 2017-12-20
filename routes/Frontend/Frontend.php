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

        Route::get('index', 'SalesController@index')->name('slsmark.index');
        Route::get('create', 'SalesController@create')->name('slsmark.create');
        Route::get('createSales', 'SalesController@createSales')->name('slsmark.createSales');
        Route::get('createsco/{id}', 'SalesController@createsco')->name('slsmark.createsco');
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
        Route::get('addrepeat/{id}', 'SalesController@addrepeat')->name('slsmark.addrepeat');
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
        Route::post('imported2', 'SalesController@imported2')->name('slsmark.imported2');
        Route::post('importso', 'SalesController@importso')->name('slsmark.importso');
        Route::get('editrcof/{id}', 'SalesController@editrcof')->name('slsmark.editrcof');
        Route::put('updatercof/{id}', 'SalesController@updatercof')->name('slsmark.updatercof');
        Route::get('showrepeat/{id}', 'SalesController@showrepeat')->name('slsmark.showrepeat');
        Route::get('destroyrepeat/{id}', 'SalesController@destroyrepeat')->name('slsmark.destroyrepeat');
        Route::get('deletestock/{id}', 'SalesController@deletestock')->name('slsmark.deletestock');
        Route::post('importedsales', 'SalesController@importedsales')->name('slsmark.importedsales');
        Route::post('importeditem', 'SalesController@importeditem')->name('slsmark.importeditem');
        Route::get('showsales', 'SalesController@showsales')->name('slsmark.showsales');
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
        Route::get('viewscopaf/{id}', 'SalesController@viewscopaf')->name('slsmark.viewscopaf');


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
        Route::post('imported2', 'PlanController@imported2')->name('plan.imported2');
        Route::post('importso', 'PlanController@importso')->name('plan.importso');
        Route::get('listTable', 'PlanController@listTable')->name('plan.listTable');
        Route::get('sotable', 'PlanController@sotable')->name('plan.sotable');
        Route::get('deletestock/{id}', 'PlanController@deletestock')->name('plan.deletestock');
        Route::post('importwo', 'PlanController@importwo')->name('plan.importwo');
        Route::post('importpo', 'PlanController@importpo')->name('plan.importpo');
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
        Route::get('tablelist', 'PlanController@tablelist')->name('plan.tablelist');
        Route::get('stockbalance/{id}', 'PlanController@stockbalance')->name('plan.stockbalance');
        Route::post('balancestore/{id}', 'PlanController@balancestore')->name('plan.balancestore');
        Route::get('tablebalance', 'PlanController@tablebalance')->name('plan.tablebalance');
        Route::get('delete/{id}', 'PlanController@delete')->name('plan.delete');
        Route::get('sheeting/{id}', 'PlanController@sheeting')->name('plan.sheeting');
        Route::post('sheetingstore/{id}', 'PlanController@sheetingstore')->name('plan.sheetingstore');
        Route::get('viewstock/{id}', 'PlanController@viewstock')->name('plan.viewstock');
        Route::get('sheettable', 'PlanController@sheettable')->name('plan.sheettable');
        Route::get('deletesheet/{id}', 'PlanController@deletesheet')->name('plan.deletesheet');

    });

    Route::group(['prefix' => 'ctp', 'namespace' => 'ctp', 'middleware' => 'auth',], function () {
        Route::get('index', 'CtpController@index')->name('ctp.index');
        Route::get('edit/{id}', 'CtpController@edit')->name('ctp.edit');
        Route::put('update/{id}', 'CtpController@update')->name('ctp.update');
        Route::get('anyData', 'CtpController@anyData')->name('ctp.anyData');
        Route::get('destroy/{id}', 'CtpController@destroy')->name('ctp.destroy');
        Route::get('repeatEdit/{id}', 'CtpController@repeatEdit')->name('ctp.repeatEdit');
        Route::put('repeatUpdate/{id}', 'CtpController@repeatUpdate')->name('ctp.repeatUpdate');
        Route::get('repeatData', 'CtpController@repeatData')->name('ctp.repeatData');
    });

    Route::group(['prefix' => 'printing', 'namespace' => 'printing', 'middleware' => 'auth',], function () {
        Route::get('index', 'PrintingController@index')->name('printing.index');
        Route::get('anyData', 'PrintingController@anyData')->name('printing.anyData');
        Route::get('edit/{id}', 'PrintingController@edit')->name('printing.edit');
        Route::put('update/{id}', 'PrintingController@update')->name('printing.update');
        Route::get('repeatData', 'PrintingController@repeatData')->name('printing.repeatData');
        Route::get('repeatEdit/{id}', 'PrintingController@repeatEdit')->name('printing.repeatEdit');
        Route::put('repeatUpdate/{id}', 'PrintingController@repeatUpdate')->name('printing.repeatUpdate');
        Route::get('destroy/{id}', 'PrintingController@destroy')->name('printing.destroy');
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

    });
});
