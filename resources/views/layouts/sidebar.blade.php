<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              <img
                src="/assets/img/kaiadmin/logo_light.svg"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item active">
                <a
                  data-bs-toggle="collapse"
                  href="#dashboard"
                  class="collapsed"
                  aria-expanded="false"
                >
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="dashboard">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="../demo1/index.html">
                        <span class="sub-item">Dashboard 1</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            
             
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#forms">
                  <i class="fas fa-pen-square"></i>
                  <p>Add</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="forms">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{url('dashboard/forms/category')}}">
                        <span class="sub-item">Category</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{url('dashboard/forms/companies')}}">
                        <span class="sub-item">Restaurents</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{url('dashboard/forms/products')}}">
                        <span class="sub-item">Products</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#tables">
                  <i class="fas fa-table"></i>
                  <p>Tables</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="tables">
                  <ul class="nav nav-collapse">
                    
                    <li>
                      <a href="{{url("/dashboard/companies")}}">
                        <span class="sub-item">Restaurents</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{url("/dashboard/category")}}">
                        <span class="sub-item">Category</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{url("/dashboard/products")}}">
                        <span class="sub-item">Products</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#tables">
                  <i class="fas fa-table"></i>
                  <p>Offers</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="tables">
                  <ul class="nav nav-collapse">
                    
                    <li>
                      <a href="{{url("/dashboard/forms/create-offer")}}">
                        <span class="sub-item">Create Offer</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{url("/dashboard/offers")}}">
                        <span class="sub-item">View Offers</span>
                      </a>
                    </li>
                   
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a  href="/admin/register">
                  <i class="fas fa-pen-square"></i>
                  <p>Create Admin</p>
                  <span class="caret"></span>
                </a>
                
              </li>
             
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->