<!-- Sidemenu -->
<div class="navbar-content scroll-div ps ps--active-y">
    <ul class="nav pcoded-inner-navbar">

        @php
            function panel($slug){
                return \App\Models\Field::field($slug);
            }
        @endphp

        <li class="nav-item {{ Request::is('student/dashboard*') ? 'active' : '' }}">
            <a href="{{ route('student.dashboard.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-desktop"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_dashboard', 1) }}</span>
            </a>
        </li>

        @if(panel('panel_class_routine')->status == 1)
        <li class="nav-item {{ Request::is('student/class-routine*') ? 'active' : '' }}">
            <a href="{{ route('student.class-routine.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-clock"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_class_routine', 2) }}</span>
            </a>
        </li>
        @endif

        @if(panel('panel_exam_routine')->status == 1)
        <li class="nav-item {{ Request::is('student/exam-routine*') ? 'active' : '' }}">
            <a href="{{ route('student.exam-routine.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-align-left"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_exam_routine', 2) }}</span>
            </a>
        </li>
        @endif

        @if(panel('panel_attendance')->status == 1)
        <li class="nav-item {{ Request::is('student/attendance*') ? 'active' : '' }}">
            <a href="{{ route('student.attendance.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-calendar-check"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_attendance', 2) }}</span>
            </a>
        </li>
        @endif

        @if(panel('panel_leave')->status == 1)
        <li class="nav-item {{ Request::is('student/leave*') ? 'active' : '' }}">
            <a href="{{ route('student.leave.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="far fa-edit"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_apply_leave', 2) }}</span>
            </a>
        </li>
        @endif

        {{-- <li class="nav-item {{ Request::is('student/event-calendar*') ? 'active' : '' }}">
            <a href="{{ route('student.event.calendar') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-calendar-alt"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_calendar', 1) }}</span>
            </a>
        </li> --}}

        @if(panel('panel_fees_report')->status == 1)
        <li class="nav-item {{ Request::is('student/fees*') ? 'active' : '' }}">
            <a href="{{ route('student.fees.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-money-bill-wave"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_fees_report', 2) }}</span>
            </a>
        </li>
        @endif

        @if(panel('panel_library')->status == 1)
        <li class="nav-item {{ Request::is('student/library*') ? 'active' : '' }}">
            <a href="{{ route('student.library.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-book-open"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_library', 2) }}</span>
            </a>
        </li>
        @endif



        @if(panel('panel_notice')->status == 1)
        <li class="nav-item {{ Request::is('student/notice*') ? 'active' : '' }}">
            <a href="{{ route('student.notice.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-bullhorn"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_notice', 2) }}</span>
            </a>
        </li>
        @endif

        @if(panel('panel_assignment')->status == 1)
        <li class="nav-item {{ Request::is('student/assignment*') ? 'active' : '' }}">
            <a href="{{ route('student.assignment.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-newspaper"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_assignment', 2) }}</span>
            </a>
        </li>
        @endif

       

        @if(panel('panel_transcript')->status == 1)
        <li class="nav-item {{ Request::is('student/transcript*') ? 'active' : '' }}">
            <a href="{{ route('student.transcript.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-pen-square"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_transcript', 1) }}</span>
            </a>
        </li>
        @endif

        <li class="nav-item pcoded-hasmenu {{ Request::is('student/course-learning-outcome*') ? 'pcoded-trigger active' : '' }}">
            <a href="#!" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-graduation-cap"></i></span>
                <span class="pcoded-mtext">Course Mapping</span>
            </a>
            <ul class="pcoded-submenu">
               
            
                <li class="nav-item pcoded-hasmenu {{ Request::is('student/student/single-enroll*') ? 'pcoded-trigger active' : '' }} {{ Request::is('student/student/group-enroll*') ? 'pcoded-trigger active' : '' }} {{ Request::is('student/student/subject-adddrop*') ? 'pcoded-trigger active' : '' }} {{ Request::is('student/student/course-complete*') ? 'pcoded-trigger active' : '' }}">
                    <a href="#!" class="nav-link">
                        <span class="pcoded-mtext">Faculty of CS</span>
                    </a>

                    <ul class="pcoded-submenu">
                        <li class="{{ Request::is('student/student/single-enroll*') ? 'active' : '' }}"><a href="/files/cs/CS-Courses.xlsx" download="CS-Courses.xlsx"  class="">BS-CS</a></li>
                        <li class="{{ Request::is('student/student/single-enroll*') ? 'active' : '' }}"><a href="/files/cs/AI-Courses.xlsx" download="AI-Courses.xlsx" class="">BS-AI</a></li>
                        <li class="{{ Request::is('student/student/single-enroll*') ? 'active' : '' }}"><a href="/files/cs/CST-Courses.xlsx" download="CST-Courses.xlsx" class="">BS-CST</a></li>
                        <li class="{{ Request::is('student/student/single-enroll*') ? 'active' : '' }}"><a href="/files/cs/DS-Courses.xlsx" download="DS-Courses.xlsx" class="">BS-DS</a></li>
        
                    </ul>
                </li>

                <li class="nav-item pcoded-hasmenu {{ Request::is('student/student/single-enroll*') ? 'pcoded-trigger active' : '' }} {{ Request::is('student/student/group-enroll*') ? 'pcoded-trigger active' : '' }} {{ Request::is('student/student/subject-adddrop*') ? 'pcoded-trigger active' : '' }} {{ Request::is('student/student/course-complete*') ? 'pcoded-trigger active' : '' }}">
                    <a href="#!" class="nav-link">
                        <span class="pcoded-mtext">Faculty of SE</span>
                    </a>

                    <ul class="pcoded-submenu">
                        <li class="{{ Request::is('student/student/single-enroll*') ? 'active' : '' }}"><a href="/files/se/IT-Courses.xlsx" download="IT-Courses.xlsx" class="">BS-IT</a></li>
                        <li class="{{ Request::is('student/student/single-enroll*') ? 'active' : '' }}"><a href="/files/se/SE-Courses.xlsx" download="SE-Courses.xlsx" class="">BS-SE</a></li>
                      
                    </ul>
                </li>

            </ul>
        </li>

        @if(panel('panel_profile')->status == 1)
        <li class="nav-item {{ Request::is('student/profile*') ? 'active' : '' }}">
            <a href="{{ route('student.profile.index') }}" class="nav-link">
                <span class="pcoded-micon"><i class="fas fa-id-card"></i></span>
                <span class="pcoded-mtext">{{ trans_choice('module_profile', 2) }}</span>
            </a>
        </li>
        @endif

    </ul>
</div>
<!-- End Sidebar -->