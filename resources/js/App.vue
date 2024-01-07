<template>
    <div>

        <!-- Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0"
                style="display: none; visibility: hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->


        <!-- Layout Content -->
        <div class="layout-wrapper layout-content-navbar ">
            <div class="layout-container">

                <menusidebar />


                <!-- Layout page -->
                <div class="layout-page">
                    <!-- BEGIN: Navbar-->
                    <!-- Navbar -->
                    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                        id="layout-navbar">

                        <!--  Brand demo (display only for navbar-full and hide on below xl) -->

                        <!-- ! Not required for layout-without-menu -->
                        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0  d-xl-none ">
                            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                                <i class="mdi mdi-menu mdi-24px"></i>
                            </a>
                        </div>

                        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                            <!-- Search -->
                            <div class="navbar-nav align-items-center">
                                <div class="nav-item d-flex align-items-center">
                                    <i class="mdi mdi-magnify mdi-24px lh-0"></i>
                                    <input type="text" class="form-control border-0 shadow-none bg-body"
                                        placeholder="Search..." aria-label="Search...">
                                </div>
                            </div>
                            <!-- /Search -->
                            <ul class="navbar-nav flex-row align-items-center ms-auto">

                                <!-- Place this tag where you want the button to render. -->
                                <li class="nav-item lh-1 me-3">
                                    <a class="github-button"
                                        href="https://github.com/themeselection/materio-bootstrap-html-laravel-admin-template-free"
                                        data-icon="octicon-star" data-size="large" data-show-count="true"
                                        aria-label="Star themeselection/materio-bootstrap-html-laravel-admin-template-free on GitHub">Star</a>
                                </li>

                                <!-- User -->
                                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                    <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);"
                                        data-bs-toggle="dropdown">
                                        <div class="avatar avatar-online">
                                            <img src="../../public/assets/img/avatars/1.png" alt=""
                                                class="w-px-40 h-auto rounded-circle">
                                        </div>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end mt-3 py-2">
                                        <li>
                                            <a class="dropdown-item pb-2 mb-1" href="javascript:void(0);">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-shrink-0 me-2 pe-1">
                                                        <div class="avatar avatar-online">
                                                            <img src="../../public/assets/img/avatars/1.png" alt=""
                                                                class="w-px-40 h-auto rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">John Doe</h6>
                                                        <small class="text-muted">Admin</small>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider my-1"></div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);">
                                                <i class="mdi mdi-account-outline me-1 mdi-20px"></i>
                                                <span class="align-middle">My Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);">
                                                <i class='mdi mdi-cog-outline me-1 mdi-20px'></i>
                                                <span class="align-middle">Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);">
                                                <span class="d-flex align-items-center align-middle">
                                                    <i class="flex-shrink-0 mdi mdi-credit-card-outline me-1 mdi-20px"></i>
                                                    <span class="flex-grow-1 align-middle ms-1">Billing</span>
                                                    <span
                                                        class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider my-1"></div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);">
                                                <i class='mdi mdi-power me-1 mdi-20px'></i>
                                                <span class="align-middle">Log Out</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!--/ User -->
                            </ul>
                        </div>

                    </nav>
                    <!-- / Navbar -->
                    <!-- END: Navbar-->


                    <!-- Content wrapper -->
                    <div class="content-wrapper">

                        <!-- Content -->
                        <div class="container-xxl flex-grow-1 container-p-y">

                            <router-view></router-view>

                        </div>
                        <!-- / Content -->

                        <!-- Footer -->
                        <!-- Footer-->
                        <footer class="content-footer footer bg-footer-theme">
                            <div class="container-xxl">
                                <div
                                    class="footer-container d-flex align-items-center justify-content-between py-3 flex-md-row flex-column">
                                    <div class="text-body mb-2 mb-md-0">
                                        © made with <span class="text-danger"><i class="tf-icons mdi mdi-heart"></i></span>
                                        by <a href="https://themeselection.com" target="_blank"
                                            class="footer-link fw-medium">ThemeSelection</a>
                                    </div>
                                    <div class="d-none d-lg-inline-block">
                                        <a href="https://themeselection.com/license/" class="footer-link me-3"
                                            target="_blank">License</a>
                                        <a href="https://themeselection.com/" target="_blank" class="footer-link me-3">More
                                            Themes</a>
                                        <a href="https://demos.themeselection.com/materio-bootstrap-html-admin-template/documentation/laravel-introduction.html"
                                            target="_blank" class="footer-link me-3">Documentation</a>
                                        <a href="https://github.com/themeselection/materio-bootstrap-html-laravel-admin-template-free/issues"
                                            target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>
                                    </div>
                                </div>
                            </div>
                        </footer>
                        <!--/ Footer-->
                        <!-- / Footer -->
                        <div class="content-backdrop fade"></div>
                    </div>
                    <!--/ Content wrapper -->
                </div>
                <!-- / Layout page -->
            </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>
            <!-- Drag Target Area To SlideIn Menu On Small Screens -->
            <div class="drag-target"></div>
        </div>
        <!-- / Layout wrapper -->
        <!--/ Layout Content -->


    </div>
</template>

<script>
export default {
    name: 'WorkspaceJsonApp',

    data() {
        return {

        };
    },

    mounted() {

    },

    methods: {

    },
};
</script>

<style lang="scss" scoped></style>