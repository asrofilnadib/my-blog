<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dasboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
          <span data-feather="home"></span>
          Dashboard
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dasboard.posts*') ? 'active' : '' }}" href="/dashboard/posts">
          <span data-feather="file-text"></span>
          My Posts
        </a>
      </li>
    </ul>

    @can('adminG')
    <h6 class="sidebar-heading justify-content-between d-flex align-items-center px-3 mb-1 mt-4 text-muted">
      <span>Administrator</span>
    </h6>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link {{ Request::is('dasboard.categories*') ? 'active' : '' }}" href="/dashboard/categories">
          <span data-feather="grid"></span>
          Category Post
        </a>
      </li>
    </ul>
    @endcan
  </div>
</nav>
