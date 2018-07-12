<div class="panel-heading">
    <h3 class="panel-title" style="font-weight:bold">{{ $mainTitle }}</h3>
    <br>
    <ul class="nav nav-tabs navbar-custom">
        <li><h5 style="font-weight:bold">Maintenance : &nbsp</h5></li>
        <li {{{(Request::is('printing/request') ? 'class=active' : '')}}}><a href="request">Request</a></li>
        <li {{{(Request::is('printing/index_plate') ? 'class=active' : '')}}}><a href="index_plate">Plate</a></li>
        <li {{{(Request::is('printing/index_dc') ? 'class=active' : '')}}}><a href="index_dc">Die Cut</a></li>
        <li {{{(Request::is('printing/index_fd') ? 'class=active' : '')}}}><a href="index_fd">Flexi Die</a></li>
        <li {{{(Request::is('printing/index_ff') ? 'class=active' : '')}}}><a href="index_ff">Flexi Film</a></li>
        <li {{{(Request::is('printing/drop_down') ? 'class=active' : '')}}}><a href="drop_down">Drop Down</a></li>
        <li {{{(Request::is('printing/pack') ? 'class=active' : '')}}}><a href="pack">Packing Size</a></li>
        <li {{{(Request::is('printing/wc') ? 'class=active' : '')}}}><a href="wc">Work Center</a></li>
        <li {{{(Request::is('printing/employee') ? 'class=active' : '')}}}><a href="employee">Employee</a></li>
    </ul>
    <br>
    <ul class="nav nav-tabs navbar-custom">
        <li><h5 style="font-weight:bold">Transactions : &nbsp</h5></li>
        <li {{{(Request::is('printing/index') ? 'class=active' : '')}}}><a href="index">Work Order</a></li>
        <li {{{(Request::is('printing/trans') ? 'class=active' : '')}}}><a href="trans">Plate</a></li>
        <li {{{(Request::is('printing/trans_dc') ? 'class=active' : '')}}}><a href="trans_dc">Die Cut</a></li>
        <li {{{(Request::is('printing/trans_fd') ? 'class=active' : '')}}}><a href="trans_fd">Flexi Die</a></li>
        <li {{{(Request::is('printing/trans_ff') ? 'class=active' : '')}}}><a href="trans_ff">Flexi Film</a></li>
        
    </ul>
</div>