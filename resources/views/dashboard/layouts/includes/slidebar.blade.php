<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
   
</head>
<body>
    
    
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="/dashboard">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        @if(auth()->user()->level=="Super Admin")
        <li class="nav-item">
          <a class="nav-link" href="/users">
            <i class="icon-head menu-icon"></i>
            <span class="menu-title">Users</span>
          </a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link" href="/kendaraan">
            <i class="icon-columns menu-icon"></i>
            <span class="menu-title">Data Kendaraan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pemesanan">
            <i class="icon-paper menu-icon"></i>
            <span class="menu-title">Pemesanan</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/jadwal">
            <i class="icon-grid-2 menu-icon"></i>
            <span class="menu-title">Jadwal</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/logout">
              <i class="ti-power-off text-primary menu-icon"></i>
            <span class="menu-title">Logout</span>
          </a>
        </li>
        
      </ul>
    </nav>
</body>
</html>