<div class="panel-heading">
    <h3 class="panel-title" style="font-weight:bold">{{ $mainTitle }}</h3>
    <br>
    <ul class="nav nav-tabs navbar-custom">
        <li><h5 style="font-weight:bold">Maintenance : &nbsp</h5></li>
        <li {{{(Request::is('ctp/index') ? 'class=active' : '')}}}><a href="index">Plate</a></li>
        <li {{{(Request::is('ctp/index_dc') ? 'class=active' : '')}}}><a href="index_dc">Die Cut</a></li>
        <li {{{(Request::is('ctp/index_fd') ? 'class=active' : '')}}}><a href="index_fd">Flexi Die</a></li>
        <li {{{(Request::is('ctp/index_ff') ? 'class=active' : '')}}}><a href="index_ff">Flexi Film</a></li>
        <li {{{(Request::is('ctp/drop_down') ? 'class=active' : '')}}}><a href="drop_down">Drop Down</a></li>
        <li {{{(Request::is('ctp/request') ? 'class=active' : '')}}}><a href="request">Request</a></li>
    </ul>
        <ul class="nav nav-tabs navbar-custom">
        <li><h5 style="font-weight:bold">Transactions : &nbsp</h5></li>
        <li {{{(Request::is('ctp/trans') ? 'class=active' : '')}}}><a href="trans">Plate</a></li>
        <li {{{(Request::is('ctp/trans_dc') ? 'class=active' : '')}}}><a href="trans_dc">Die Cut</a></li>
        <li {{{(Request::is('ctp/trans_fd') ? 'class=active' : '')}}}><a href="trans_fd">Flexi Die</a></li>
        <li {{{(Request::is('ctp/trans_ff') ? 'class=active' : '')}}}><a href="trans_ff">Flexi Film</a></li>
    </ul>
</div>


