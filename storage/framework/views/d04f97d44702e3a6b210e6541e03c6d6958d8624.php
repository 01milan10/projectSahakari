<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo e(route('landingPage')); ?>" class="brand-link">
        <img src="<?php echo e(asset('img/AdminLTELogo.png')); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Sahakari App</span>
    </a>

    <!-- Sidebar -->

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <?php if(Auth:: user()->image == null): ?>
                <img src="<?php echo e(asset('uploaded_images/team_avatar/profile_pictures/user.jpg')); ?>" alt="User Image" class="img-circle elevation-2">
                <?php else: ?>
                <img src="<?php echo e(asset('uploaded_images/team_avatar/profile_pictures').'/'.Auth::user()->image); ?>" class="img-circle elevation-2" alt="User Image">
                <?php endif; ?>
            </div>
            <div class="info">
                <a class="d-block"><?php echo e(Auth:: user()->name); ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo e(route('home')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('inbox')); ?>" class="nav-link inbox">
                        <i class="nav-icon fas fa-inbox"></i>
                        <p>
                            Inbox
                            <span class="right badge badge-pill badge-warning newMessageCount"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-header">
                    <h5>MANAGE PAGES</h5>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('show.reportForm')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Report Entry
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create',App\User::class)): ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('create.user')); ?>" class="nav-link">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>
                                    Add User
                                </p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a href="<?php echo e(route('list.user')); ?>" class="nav-link">
                                <i class="fas fa-list-alt mr-2"></i>
                                <p>List Users</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            Opportunities
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('show.oppurtunitiesForm')); ?>" class="nav-link">
                                <i class="fas fa-plus mr-2"></i>
                                <p>Add Opportunities</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('list.oppurtunities')); ?>" class="nav-link">
                                <i class="fas fa-list-alt mr-2"></i>
                                <p>List Opportunities</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/features/create" class="nav-link">
                        <i class="nav-icon fas fa-anchor"></i>
                        <p>
                            Features
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('show.gallery')); ?>" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('show.messageForm')); ?>" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Messages
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('show.downloadables')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-file-download"></i>
                        <p>Downloads</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('show.contactForm')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-id-badge"></i>
                        <p>
                            Contacts
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('show.teamForm')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Our Team
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('show.visionForm')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Our Vision & Objectives
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('show.commentForm')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <p>
                            Testimonials
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('create.client')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>
                            Clients
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside><?php /**PATH C:\xampp\htdocs\projectSahakari\resources\views/layouts/backend/sidebar.blade.php ENDPATH**/ ?>