@php 

  // Sidebar Organisation
  // Admin
  $tableLinks = array(
    //    Name              Route                   Font-Awesome
    array('Messages',       'message.index',        'fas fa-comments'),
    array('Users' ,         'user.index',           'fas fa-users'),
    array('Timetables',     'timetable.index',      'fas fa-calendar-week'),
    array('Attendances',    'attendance.index',     'fas fa-user-plus'),
    array('Subjects',       'subject.index',        'fas fa-chalkboard-teacher'),
    array('Fees',           'fee.index',            'fas fa-comment-dollar'),
    array('Reports',        'report.index',         'fas fa-newspaper'),
    array('Permissions',    'permission.index',     'fas fa-lock-open'),
    array('Roles',          'role.index',           'fas fa-user-tag'),
    array('Students',       'student.index',        'fas fa-users'),
    array('Parents',        'parent.index',         'fas fa-user-tie'),
    array('Admins',         'admin.index',          'fas fa-users-cog'),
  );

  sort($tableLinks);

@endphp

{{-- 
  
      I. Student Side Bar
      II. Parent Side Bar
      III. Admin Side Bar
  
--}}

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('welcome')}}">
  <div class="sidebar-brand-text mx-2">{{ config('app.name', 'Laravel') }} </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
  <a class="nav-link" href="">
    <i class="fas fa-fw fa-home"></i>
    <span>Home</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Student
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudentClasses" aria-expanded="true" aria-controls="collapseStudentClasses">
    <i class="fas fa-fw fa-cog"></i>
    <span>Classes</span>
  </a>
  <div id="collapseStudentClasses" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="buttons.html"><i class="fas fa-fw fa-chalkboard-teacher"></i>&emsp;Maths</a>
      <a class="collapse-item" href="cards.html"><i class="fas fa-fw fa-chalkboard-teacher"></i>&emsp;English</a>
      <a class="collapse-item" href="cards.html"><i class="fas fa-fw fa-chalkboard-teacher"></i>&emsp;Geography</a>
    </div>
  </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStudentSettings" aria-expanded="true" aria-controls="collapseStudentSettings">
    <i class="fas fa-fw fa-wrench"></i>
    <span>Tools</span>
  </a>
  <div id="collapseStudentSettings" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="utilities-color.html"><i class="fas fa-fw fa-inbox"></i>&emsp;Messages</a>
      <a class="collapse-item" href="utilities-other.html"><i class="fas fa-fw fa-photo-video"></i>&emsp;Media</a>
      <a class="collapse-item" href="utilities-border.html"><i class="fas fa-fw fa-calendar-alt"></i>&emsp;Calendar</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Parent
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseParent" aria-expanded="true" aria-controls="collapseParent">
    <i class="fas fa-fw fa-child"></i>
    <span>Siblings</span>
  </a>
  <div id="collapseParent" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="buttons.html"><i class="fas fa-fw fa-user"></i></i>&emsp;Harry</a>
      <a class="collapse-item" href="cards.html"><i class="fas fa-fw fa-user"></i></i>&emsp;John</a>
      <a class="collapse-item" href="cards.html"><i class="fas fa-fw fa-user"></i></i>&emsp;Sarah</a>
    </div>
  </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseParentSettings" aria-expanded="true" aria-controls="collapseParentSettings">
    <i class="fas fa-fw fa-wrench"></i>
    <span>Tools</span>
  </a>
  <div id="collapseParentSettings" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="utilities-color.html"><i class="fas fa-fw fa-inbox"></i>&emsp;Messages</a>
      <a class="collapse-item" href="utilities-other.html"><i class="fas fa-fw fa-photo-video"></i>&emsp;Media</a>
      <a class="collapse-item" href="utilities-border.html"><i class="fas fa-fw fa-calendar-alt"></i>&emsp;Calendar</a>
    </div>
  </div>
</li>

<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Admin
</div>

{{-- ADMIN SIDEBAR --}}


{{-- TABLES --}}

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdminTables" aria-expanded="true" aria-controls="collapseAdminTables">
    <i class="fas fa-fw fa-table"></i>
    <span>Tables</span>
  </a>
  <div id="collapseAdminTables" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
    
      @for ($i = 0; $i < count($tableLinks); $i++)
        <a class="collapse-item" href="{{route($tableLinks[$i][1])}}">
          <i class="{{$tableLinks[$i][2]}}"></i>
          &emsp;{{$tableLinks[$i][0]}}
        </a>
      @endfor

    </div>
  </div>
</li>

<!-- Nav Item - Pages Collapse Menu -->

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">



<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->