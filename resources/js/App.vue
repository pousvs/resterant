<template>
    <div>

        <!-- Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5DDHKGP" height="0" width="0"
                style="display: none; visibility: hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->


        <!-- Layout Content -->
        <div class="layout-wrapper layout-content-navbar ">
            <div class="layout-container">

                <menusidebar v-if="store.get_token" />


                <!-- Layout page -->
                <div class="layout-page">
                    <!-- BEGIN: Navbar-->
                    <!-- Navbar -->
                    <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                        id="layout-navbar" v-if="store.get_token">

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
                                            <div class="dropdown-divider my-1"></div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0);" @click="Logout()">
                                                <i class='bx bx-power-off me-2'></i>
                                                <span class="align-middle">ອອກຈາກລະບົບ</span>
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
                        <footer class="content-footer footer bg-footer-theme" v-if="store.get_token">
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
import { useStore } from './store/auth';
import axios from 'axios';
export default {
    name: 'WorkspaceJsonApp',
    setup() {
        const store = useStore();
        return { store }
    },
    data() {
        return {

        };
    },

    mounted() {

    },

    methods: {
        Logout() {
            axios.get('api/logout', { headers: { Authorization: 'Bearer ' + this.store.get_token } }).then((res) => {
                if (res.data.success) {
                    // ເຄຼີຍຂໍ້ມູນເກົ່າອອກ
                    localStorage.removeItem('web_token')
                    localStorage.removeItem('web_user')
                    this.store.remove_token()
                    this.store.remove_user()
                    this.$router.push('/login')
                }
            }).catch((error) => {
                console.log(error);
            })
        }
    },
};
</script>

<style lang="scss" scoped></style>