<div class="sidebar-nav navbar-collapse" style="width:100%">
    <ul class="nav" id="side-menu">

        <li>
            <!-- User Profile-->
            <div style="text-align: center;">
            <img src="{{ asset('backend/images/DSL-Logo.png') }}" alt="dashboard" class=" " width="210" />
            
            </div>
            <!-- End User Profile-->
        </li>
        <li>
            <a href="{{ route('dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
        </li>
        <li>
            <a href="{{ route('account.index') }}"><i class="fa fa-user fa-fw"></i> Accounts</a>
        </li>
        <li>
            <a href="{{ route('transaction.index') }}"><i class="fa fa-exchange fa-fw"></i>Transaction</a>
        </li>
    </ul>
</div>