<template>
    <div class="card">
        <h5 class="card-header">ລາຍການ ຈຳນວນໂຕະ</h5>
        <div class="card-body">

            <div v-if="ShowForm">
                <div class=" d-flex justify-content-end">
                    <button type="button" class="btn btn-success me-2" @click="SaveStore()"
                        :disabled="CheckForm">ບັນທຶກ</button>
                    <button type="button" class="btn btn-secondary" @click="CancalStore()">ຍົກເລີກ</button>
                </div>
                <hr>
                {{ FormStore }}
                <div class="row">
                    <div class=" col-md-8">
                        <div>
                            <label class="form-label fs-6">ເລກໂຕະ: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-2" v-model="FormStore.name" placeholder=".....">


                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive text-nowrap" v-if="!ShowForm">
                <div class=" d-flex justify-content-between mb-2">
                    <div class=" d-flex align-items-center">
                        <div class=" me-2 cursor-pointer" @click="ChangeSort()">
                            <i class='bx bx-sort-up fs-4' v-if="Sort == 'asc'"></i>
                            <i class='bx bx-sort-down fs-4' v-if="Sort == 'desc'"></i>
                        </div>
                        <select class=" form-select" v-model="PerPage" @change="GetStore()">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                    <div class=" d-flex">
                        <input type="text" class=" form-control me-2" v-model="Search" @keyup.enter="GetStore()"
                            placeholder="ຄົ້ນຫາ...">
                        <button type="button" class="btn btn-primary" @click="AddStore()"> <i
                                class='bx bxs-user-plus me-2 fs-4'></i>
                            ເພີ່ມໃໝ່</button>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th width="70">ລະຫັດ</th>
                            <th class="text-center">ເລກໂຕະ</th>
                            <th class="text-center">ສະຖານະ</th>
                            <th class="text-center">ຈັດການ</th>
                        </tr>
                    </thead>
                    <tbody class="table-secondary">
                        <tr v-for="list in StoreData.data" :key="list.id">
                            <td class="text-center">{{ list.id }}</td>
                            <td class="text">{{ list.name }}</td>
                            <td class="text-center">{{ list.status }}</td>
                            <td class=" text-center">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);" @click="EditStore(list.id)"><i
                                                class="bx bx-edit-alt me-1"></i> ແກ້ໄຂ</a>

                                        <a class="dropdown-item" href="javascript:void(0);" @click="DeleteStore(list.id)"><i
                                                class="bx bx-trash me-1"></i>
                                            ລຶບ</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <Pagination :pagination="StoreData" :offset="4" @paginate="GetStore($event)" />

            </div>

        </div>
    </div>
</template>

<script>
import { useStore } from '../store/auth';
import axios from "axios";
export default {
    name: 'WorkspaceJsonTables',
    setup() {
        const store = useStore();
        return { store }
    },
    data() {
        return {

            ShowForm: false,
            Formtype: true,
            Sort: 'asc',
            PerPage: '5',
            Search: '',
            EditID: '',
            StoreData: [],
            FormStore: {
                name: '',

            }
        };
    },

    mounted() {

    },
    computed: {
        CheckForm() {
            if (this.FormStore.name == '') {
                return true
            } else {
                return false
            }
        }
    },



    methods: {
        AddStore() {
            this.ShowForm = true;
            this.FormType = true;
            this.FormStore.name = ''
        },
        CancalStore() {
            this.ShowForm = false;
        },
        ChangeSort() {
            if (this.Sort == 'asc') {
                this.Sort = 'desc'
            } else {
                this.Sort = 'asc'
            }
            this.GetStore()
        },
        showAlert() {


            this.$swal({
                // position: 'top-end',
                //  toast: true,
                title: "The Internet?",
                icon: "error",
                showConfirmButton: false,
                timer: 3500
            });
        },
        SaveStore() {
            if (this.FormType) {
                axios.post('api/TableList/add', this.FormStore, { headers: { "content-type": "multipart/form-data", Authorization: 'Bearer ' + this.store.get_token } }).then((res) => {
                    console.log(res.data);

                    if (res.data.success) {
                        this.ShowForm = false;
                        this.GetStore()
                        this.$swal({
                            position: 'top-end',
                            toast: true,
                            title: res.data.message,
                            icon: "success",
                            showConfirmButton: false,
                            timer: 2500
                        });

                    } else {
                        this.$swal({
                            // position: 'top-end',
                            //  toast: true,
                            title: res.data.message,
                            icon: "error",
                            showConfirmButton: false,
                            timer: 3500
                        });

                    }


                }).catch((error) => {
                    console.log(error);
                    if (error) {
                        if (error.response.status == 401) {
                            this.store.remove_token();
                            this.store.remove_user();
                            localStorage.removeItem("web_token");
                            localStorage.removeItem("web_user");
                            this.$router.push("/login");
                        }
                    }
                })
            } else {

                axios.post(`api/TableList/update/${this.EditID}`, this.FormStore, { headers: { Authorization: 'Bearer ' + this.store.get_token } }).then((res) => {

                    console.log(res.data);

                    if (res.data.success) {
                        this.ShowForm = false;
                        this.GetStore()
                        this.$swal({
                            position: 'top-end',
                            toast: true,
                            title: res.data.message,
                            icon: "success",
                            showConfirmButton: false,
                            timer: 2500
                        });

                    } else {
                        this.$swal({
                            // position: 'top-end',
                            //  toast: true,
                            title: res.data.message,
                            icon: "error",
                            showConfirmButton: false,
                            timer: 3500
                        });

                    }


                }).catch((error) => {
                    console.log(error);
                    if (error) {
                        if (error.response.status == 401) {
                            this.store.remove_token();
                            this.store.remove_user();
                            localStorage.removeItem("web_token");
                            localStorage.removeItem("web_user");
                            this.$router.push("/login");
                        }
                    }
                })

            }
        },
        EditStore(id) {
            this.FormType = false;
            this.EditID = id;

            axios.get(`api/TableList/edit/${id}`, { headers: { Authorization: 'Bearer ' + this.store.get_token } }).then((res) => {

                this.FormStore = res.data
                this.ShowForm = true

            }).catch((error) => {
                console.log(error);
                if (error) {
                    if (error.response.status == 401) {
                        this.store.remove_token();
                        this.store.remove_user();
                        localStorage.removeItem("web_token");
                        localStorage.removeItem("web_user");
                        this.$router.push("/login");
                    }
                }
            })

        },
        DeleteStore(id) {
            this.$swal({
                title: "ທ່ານແນ່ໃຈບໍ່?",
                text: "ທີ່ຈະລຶບຂໍ້ມູນນີ້!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "ຕົກລົງ!",
                cancelButtonText: "ຍົກເລີກ"
            }).then((result) => {
                if (result.isConfirmed) {

                    axios.delete(`api/TableList/delete/${id}`, { headers: { Authorization: 'Bearer ' + this.store.get_token } }).then((res) => {

                        if (res.data.success) {
                            this.GetStore()
                            this.$swal({
                                title: "ການລຶບຂໍ້ມູນ!",
                                text: res.data.message,
                                icon: "success"
                            });
                        } else {
                            this.$swal({
                                // position: 'top-end',
                                //  toast: true,
                                title: res.data.message,
                                icon: "error",
                                showConfirmButton: false,
                                timer: 3500
                            });
                        }

                    }).catch((error) => {
                        console.log(error);
                        if (error) {
                            if (error.response.status == 401) {
                                this.store.remove_token();
                                this.store.remove_user();
                                localStorage.removeItem("web_token");
                                localStorage.removeItem("web_user");
                                this.$router.push("/login");
                            }
                        }
                    })


                }
            });
        },
        GetStore(page) {
            axios.get(`api/TableList?page=${page}&sort=${this.Sort}&perpage=${this.PerPage}&search=${this.Search}`, this.FormStore, { headers: { "content-type": "multipart/form-data", Authorization: 'Bearer ' + this.store.get_token } }).then((res) => {
                this.StoreData = res.data

                if (res.data.success) {
                    this.ShowForm = false;

                } else { }


            }).catch((error) => {
                console.log(error);
                if (error) {
                    if (error.response.status == 401) {
                        this.store.remove_token();
                        this.store.remove_user();
                        localStorage.removeItem("web_token");
                        localStorage.removeItem("web_user");
                        this.$router.push("/login");
                    }
                }
            })
        }




    },
    created() {
        this.GetStore()
    },
    watch: {
        Search() {
            if (this.Search == '') {
                this.GetStore()
            }
        }
    }
};
</script>

<style lang="scss" scoped></style>