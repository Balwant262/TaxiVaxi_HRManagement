<!-- -------------- Sidebar - Author -------------- -->
<div class="sidebar-widget author-widget">
    <div class="media">
        <a href="/profile" class="media-left">
            @if(isset(Auth::user()->employee->photo))
                <img src="{{asset('photos/'.Auth::user()->employee->photo)}}" width="40px" height="30px" class="img-responsive">
            @else
                <img src="/assets/img/avatars/profile_pic.png" alt="" class="img-responsive" />
            @endif

        </a>

        <div class="media-body">
            <div class="media-author"><a href="/profile">{{Auth::user()->name}}</a></div>
        </div>
    </div>
</div>

<!-- -------------- Sidebar Menu  -------------- -->
<ul class="nav sidebar-menu scrollable">
    <li class="active">
        <a  href="{{route('dashboard')}}">
            <span class="fa fa-dashboard"></span>
            <span class="sidebar-title">Dashboard</span>
        </a>
    </li>

        <li>
            <a class="accordion-toggle">
                <span class="fa fa-user"></span>
                <span class="sidebar-title">Employees</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
              <li>
                  <a href="{{route('profile')}}">
                      <span class="glyphicon glyphicon-tags"></span> Profile </a>
              </li>

                @if(\Auth::user()->isAdmin || \Auth::user()->isHR() || \Auth::user()->isManager())
                <li>
                    <a href="{{route('add-employee')}}">
                        <span class="glyphicon glyphicon-tags"></span> Add Employee </a>
                </li>
                @endif
                <li>
                    <a href="{{route('employee-manager')}}">
                        <span class="glyphicon glyphicon-tags"></span> Employee Listing </a>
                </li>

              </ul>
          </li>

        <li>
            <a class="accordion-toggle">
                <span class="fa fa-user"></span>
                <span class="sidebar-title">Attendance</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                <li>
                    <a href="{{route('mark-attendance')}}">
                        <span class="glyphicon glyphicon-book"></span> Mark Attendance </a>
                </li>
                <li>
                    <a href="{{route('show-attendance')}}">
                        <span class="glyphicon glyphicon-modal-window"></span> Attendance Listings </a>
                </li>
            </ul>
        </li>

        <li>
            <a class="accordion-toggle">
                <span class="fa fa-group"></span>
                <span class="sidebar-title">Teams</span>
                <span class="caret"></span>
            </a>
            <ul class="nav sub-nav">
                @if(\Auth::user()->isAdmin || \Auth::user()->isHR() || \Auth::user()->isManager())
                <li>
                    <a href="{{route('add-team')}}">
                        <span class="glyphicon glyphicon-book"></span> Add Team </a>
                </li>
                @endif
                <li>
                    <a href="{{route('team-listing')}}">
                        <span class="glyphicon glyphicon-modal-window"></span> Team Listings </a>
                </li>
            </ul>
        </li>

        <li>
             <a class="accordion-toggle">
                 <span class="fa fa-graduation-cap"></span>
                 <span class="sidebar-title">Roles</span>
                 <span class="caret"></span>
             </a>
             <ul class="nav sub-nav">
                 @if(\Auth::user()->isAdmin || \Auth::user()->isHR() || \Auth::user()->isManager())
                 <li>
                     <a href="{{route('add-role')}}">
                         <span class="glyphicon glyphicon-book"></span> Add Role </a>
                 </li>
                 @endif
                 <li>
                     <a href="{{route('role-list')}}">
                         <span class="glyphicon glyphicon-modal-window"></span> Role Listings </a>
                 </li>
             </ul>
         </li>

        <li>
         <a class="accordion-toggle">
             <span class="fa fa-envelope"></span>
             <span class="sidebar-title">Leaves</span>
             <span class="caret"></span>
         </a>
         <ul class="nav sub-nav">
             <li>
                 <a href="{{route('apply-leave')}}">
                     <span class="glyphicon glyphicon-shopping-cart"></span> Apply Leave </a>
             </li>
             <li>
                 <a href="{{route('my-leave-list')}}">
                     <span class="glyphicon glyphicon-calendar"></span> My Leave List </a>
             </li>

             @if(\Auth::user()->isHR() || \Auth::user()->isAdmin )
                 <li>
                     <a href="{{route('add-leave-type')}}">
                         <span class="fa fa-desktop"></span> Add Leave Type </a>
                 </li>
                 <li>
                     <a href="{{route('leave-type-listing')}}">
                         <span class="fa fa-clipboard"></span> Leave Type Listings </a>
                 </li>
             @endif
             @if(Auth::user()->isHR()|| Auth::user()->isCoordinator())
                 <li>
                     <a href="{{route('total-leave-list')}}">
                         <span class="fa fa-clipboard"></span> Total Leave Listings </a>
                 </li>
             @endif
         </ul>
     </li>
     <li>
         <a class="accordion-toggle">
             <span class="fa fa-money"></span>
             <span class="sidebar-title">Reimbursement</span>
             <span class="caret"></span>
         </a>
         <ul class="nav sub-nav">

             <li>
                 <a href="{{route('add-expense')}}">
                     <span class="glyphicon glyphicon-book"></span> Add Expense Claims </a>
             </li>

             <li>
                 <a href="{{route('expense-list')}}">
                     <span class="glyphicon glyphicon-modal-window"></span> Expense Claim List </a>
             </li>

           </ul>
       </li>

       <li>
         <a class="accordion-toggle">
             <span class="fa fa-rupee"></span>
             <span class="sidebar-title">Payroll</span>
             <span class="caret"></span>
         </a>
         <ul class="nav sub-nav">

             <li>
                 <a href="{{route('show-basic-salary')}}">
                     <span class="glyphicon glyphicon-book"></span>Basic Salary </a>
             </li>

             @if(\Auth::user()->isAdmin || \Auth::user()->isHR() || \Auth::user()->isManager())
             <li>
                 <a href="{{route('show-to-generate-salary-slip')}}">
                     <span class="glyphicon glyphicon-modal-window"></span> Manage </a>
             </li>
             @endif

             <li>
                 <a href="{{route('salary_slip_single_emp')}}">
                     <span class="glyphicon glyphicon-modal-window"></span> Report </a>
             </li>

           

             @if(\Auth::user()->isAdmin || \Auth::user()->isHR() || \Auth::user()->isManager())
             <li>
                 <a href="{{route('show-payroll-group-components')}}">
                     <span class="glyphicon glyphicon-modal-window"></span> Payroll Settings </a>
             </li>
            @endif

           </ul>
       </li>


       @if(\Auth::user()->isAdmin || \Auth::user()->isHR() || \Auth::user()->isManager())
       <li>
         <a class="accordion-toggle">
             <span class="glyphicon glyphicon-volume-up"></span>
             <span class="sidebar-title">Announcement</span>
             <span class="caret"></span>
         </a>
         <ul class="nav sub-nav">

             <li>
                 <a href="{{route('add-announcement')}}">
                     <span class="glyphicon glyphicon-book"></span> Add New Announcement </a>
             </li>

             <li>
                 <a href="{{route('announcement-list')}}">
                     <span class="glyphicon glyphicon-modal-window"></span> Announcement List </a>
             </li>

           </ul>
       </li>
            @endif


      @if(\Auth::user()->isAdmin || \Auth::user()->isHR() || \Auth::user()->isManager())
       <li>
         <a class="accordion-toggle">
             <span class="glyphicon glyphicon-pushpin"></span>
             <span class="sidebar-title">Notification</span>
             <span class="caret"></span>
         </a>
         <ul class="nav sub-nav">

             <li>
                 <a href="{{route('add-notification')}}">
                     <span class="glyphicon glyphicon-book"></span> Add New Notification </a>
             </li>

             <li>
                 <a href="{{route('notification-list')}}">
                     <span class="glyphicon glyphicon-modal-window"></span> Notification List </a>
             </li>

           </ul>
       </li>
            @endif 


       @if(\Auth::user()->isAdmin || \Auth::user()->isHR() || \Auth::user()->isManager())
       <li>
         <a class="accordion-toggle">
             <span class="glyphicon glyphicon-pushpin"></span>
             <span class="sidebar-title">GoodThoughts</span>
             <span class="caret"></span>
         </a>
         <ul class="nav sub-nav">

             <li>
                 <a href="{{route('add-goodthoughts')}}">
                     <span class="glyphicon glyphicon-book"></span> Add New GoodThoughts </a>
             </li>

             <li>
                 <a href="{{route('goodthoughts-list')}}">
                     <span class="glyphicon glyphicon-modal-window"></span> GoodThoughts List </a>
             </li>

           </ul>
       </li>
            @endif            

            
        <li>
         <a class="accordion-toggle">
             <span class="glyphicon glyphicon-modal-window"></span>
             <span class="sidebar-title">Calander</span>
             <span class="caret"></span>
         </a>
         <ul class="nav sub-nav">

             <li>
                 <a href="{{route('get-all-events')}}">
                     <span class="glyphicon glyphicon-modal-window"></span> Calander </a>
             </li>

           

             

           </ul>
       </li>  

</ul>
