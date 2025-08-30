<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('dashboard.index') }}" data-toggle="collapse" data-target="#dashboard">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text">{{ __('dashboard.dashboard') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components</li>
                    <!-- menu item Grades-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#grades">
                            <div class="pull-left"><i class="ti-palette"></i>
                                <span class="right-nav-text">{{ __('grades.grades') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="grades" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('grades.index') }}">{{ __('grades.grades_menu') }}</a></li>
                        </ul>
                    </li>
                    <!-- menu item classrooms-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left">
                                <i class="ti-calendar"></i>
                                <span class="right-nav-text">{{ __('classrooms.page_title') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('classrooms.index') }}">{{ __('classrooms.classrooms') }} </a></li>
                        </ul>
                    </li>
                    <!-- menu item classrooms-->

                    <!-- menu item Sections-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections">
                            <div class="pull-left">
                                <i class="ti-calendar"></i>
                                <span class="right-nav-text">{{ __('sections.title_page') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('sections.index') }}">{{ __('sections.list_section') }} </a></li>
                        </ul>
                    </li>
                    <!-- menu item Sections-->

                    <!-- menu item parents-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#parents">
                            <div class="pull-left">
                                <i class="ti-calendar"></i>
                                <span class="right-nav-text">{{ __('parents.parents') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="parents" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('parents.index') }}">{{ __('parents.list_parents') }} </a></li>
                            <li><a href="{{ route('parents.create') }}">{{ __('parents.add_parent') }} </a></li>
                        </ul>
                    </li>
                    <!-- menu item parents-->

                    <!-- menu item teachers-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#teachers">
                            <div class="pull-left">
                                <i class="ti-calendar"></i>
                                <span class="right-nav-text">{{ __('teachers.teachers') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="teachers" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('teachers.index') }}">{{ __('teachers.teacher_list') }} </a></li>
                            <li><a href="{{ route('teachers.create') }}">{{ __('teachers.add_teacher') }} </a></li>
                        </ul>
                    </li>

                    <!-- menu item students-->
                    <!-- students-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#students-menu"><i
                                class="fas fa-user-graduate"></i>students
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="students-menu" class="collapse">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#Student_information">Student_information
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Student_information" class="collapse">
                                    <li><a
                                            href="{{ route('students.create') }}">{{ trans('students.add_student') }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('students.index') }}">{{ trans('students.student_list') }}</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#Students_upgrade">{{ trans('dashboard.student_promotion') }}
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Students_upgrade" class="collapse">
                                    <li><a
                                            href="{{ route('student-promotion.index') }}">{{ trans('students.promote_students_list') }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('student-promotion.create') }}">{{ trans('dashboard.student_promotion') }}</a>
                                    </li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#Graduate students">Graduate_students
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="Graduate students" class="collapse">
                                    <li><a href="{{ route('graduated-student.create') }}">add_Graduate</a></li>
                                    <li><a href="{{ route('graduated-student.index') }}">list_Graduate</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>


                    <!-- Accounts-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Accounts-menu">
                            <div class="pull-left"><i class="fas fa-money-bill-wave-alt"></i><span
                                    class="right-nav-text">Accounts</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Accounts-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{ route('student-fees.index') }}">Fees</a> </li>
                            <li> <a href="{{ route('student-fees.create') }}">Add Fee</a> </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
