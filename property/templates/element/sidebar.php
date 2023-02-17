<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">

    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
            <img src="/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Material Dashboard</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <?= $this->Html->link('<i class="fa-sharp fa-solid fa-table-columns"></i>' . __('Dashboard'), ['controller'=>'users','action' => 'index'], ['escape'=>false,'class' => 'nav-link text-white']) ?>
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                </div>
            </li>
            <li>
                <?= $this->Html->link('<i class="fa fa-users"></i>' . __('User Mangement'), ['controller'=>'users','action' => 'userdata'], ['escape'=>false,'class' => 'nav-link text-white']) ?>
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                </div>
            </li>
            <li>
                <?= $this->Html->link('<i class="fa-brands fa-product-hunt"></i>' . __('Property Mangement'), ['controller'=>'properties','action' => 'index'], ['escape'=>false,'class' => 'nav-link text-white']) ?>
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                </div>
            </li>
            <li>
                <?= $this->Html->link('<i class="fa-brands fa-product-hunt"></i>' . __('Category Mangement'), ['controller'=>'property-categories','action' => 'index'], ['escape'=>false,'class' => 'nav-link text-white']) ?>
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                </div>
            </li>
            <li>
                <?= $this->Html->link('<i class="fa fa-user"></i>' . __('Profile'), ['controller'=>'users','action' => 'profile'], ['escape'=>false,'class' => 'nav-link text-white']) ?>
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                </div>
            </li>
          
           
            <!--  $this->Html->link('<i class="fa-solid fa-right-to-bracket"></i>' . __('Sign In'), ['controller'=>'users','action' => 'login'], ['escape'=>false,'class' => 'nav-link text-white']) ?>

            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10"></i>
            </div>
            </li>
            <li class="nav-item">
                 $this->Html->link('<i class="fa fa-user"></i>' . __('Signup'), ['controller'=>'users','action' => 'signup'], ['escape'=>false,'class' => 'nav-link text-white']) ?>

                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10"></i>
                </div>
            </li> -->

            <li class="nav-item">
                <?= $this->Html->link('<i class="fa-solid fa-right-from-bracket"></i>' . __('Logout'), ['action' => 'logout'], ['escape'=>false,'class' => 'nav-link text-white']) ?>

                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10"></i>
                </div>
            </li>
        </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
        <div class="mx-3">
            <a class="btn bg-gradient-primary mt-4 w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
        </div>
    </div>
</aside>