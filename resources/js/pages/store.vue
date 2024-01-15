<template>
    <div class="card">
        <h5 class="card-header">ລາຍການ ອາຫານ</h5>
        <div class="card-body">

            <div v-if="ShowForm">
                <div class=" d-flex justify-content-end">
                    <button type="button" class="btn btn-success me-2" @click="SaveStore()"
                        :disabled="CheckForm">ບັນທຶກ</button>
                    <button type="button" class="btn btn-secondary" @click="CancalStore()">ຍົກເລີກ</button>
                </div>
                <hr>
                <div class="row">

                    <!-- <div class=" col-md-4 text-center" style=" position: relative;">
                        <button class="btn rounded-pill btn-icon btn-danger" style="position: absolute;right: 0px;">
                            <i class='bx bxs-x-circle fs-4'></i>
                        </button>
                        <img src="" class=" rounded cursor-pointer" style=" width: 80%;" alt="">
                        <input type="file" ref="img_store" style=" display: none;" @change="onSelect">
                    </div> -->
                    <hr>
                    {{ FormStore }}
                    <div class=" col-md-8">
                        <div>
                            <label class="form-label fs-6">ຊື່: <span class="text-danger">*</span></label>
                            <input type="text" class="form-control mb-2" v-model="FormStore.name" placeholder=".....">

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label fs-6">ປະເພດ: <span class="text-danger">*</span></label>
                                    <select class="form-select" v-model="FormStore.protype_id">
                                        <option value="" selected="">--ເລືອກປະເພດ--</option>
                                        <option :value="list.id" v-for="list in ComboData" :key="list">{{ list.name }}
                                        </option>
                                    </select>
                                </div>







                                <div class="col-md-6">
                                    <label class="form-label fs-6">ຈຳນວນ: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control mb-2" v-model="FormStore.amount"
                                        placeholder=".....">
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label fs-6">ລາຄາຊື້: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control mb-2" v-model="FormStore.price_buy"
                                        placeholder=".....">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fs-6">ລາຄາຂາຍ: <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control mb-2" v-model="FormStore.price_sell"
                                        placeholder=".....">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive text-nowrap" v-if="!ShowForm">
                <div class=" d-flex justify-content-between mb-2">
                    <div class=" d-flex align-items-center">
                        <div class=" me-2 cursor-pointer">
                            <i class='bx bx-sort-up fs-4'></i>
                            <i class='bx bx-sort-down fs-4'></i>
                        </div>
                        <select class=" form-select">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="30">30</option>
                        </select>
                    </div>
                    <div class=" d-flex">
                        <input type="text" class=" form-control me-2" placeholder="ຄົ້ນຫາ...">
                        <button type="button" class="btn btn-primary" @click="AddStore()"> <i
                                class='bx bxs-user-plus me-2 fs-4'></i>
                            ເພີ່ມໃໝ່</button>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th width=" 70">ລະຫັດ</th>
                            <th class="text-center">ຮູບ</th>
                            <th class="text-center">ລາຍການ</th>
                            <th class="text-center">ຈຳນວນ</th>
                            <th class="text-center">ລາຄາຊື້</th>
                            <th class="text-center">ລາຄາຂາຍ</th>
                            <th class="text-center">ປະເພດ</th>

                            <th class="text-center">ຈັດການ</th>
                        </tr>
                    </thead>
                    <tbody class="table-secondary">
                        <tr v-for="list in StoreData" :key="list.id">
                            <td class="text-center">{{ list.id }}</td>
                            <td class="text-center"></td>
                            <td class="text-center">{{ list.name }}</td>
                            <td class="text-center">{{ list.amount }}</td>
                            <td class="text-center">{{ list.price_buy }}</td>
                            <td class="text-center">{{ list.price_sell }}</td>
                            <td class="text-center">{{ list.protype_id }}</td>
                            <td class=" text-center">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                class="bx bx-edit-alt me-1"></i> ແກ້ໄຂ</a>
                                        <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i>
                                            ລຶບ</a>
                                    </div>
                                </div>
                            </td>
                        </tr>




                    </tbody>
                </table>
            </div>

        </div>
    </div>
</template>

<script>
import { useStore } from '../store/auth';
import axios from "axios";
export default {
    name: 'WorkspaceJsonStore',
    setup() {
        const store = useStore();
        return { store }
    },
    data() {
        return {
            ShowForm: false,
            Formtype: true,
            StoreData: [],
            ComboData: [],
            FormStore: {
                name: '',
                image: '',
                amount: '',
                price_buy: '',
                price_sell: '',
                protype_id: '',


            }
        };
    },

    mounted() {

    },
    computed: {
        CheckForm() {
            if (this.FormStore.name == '' || this.FormStore.amount == '' || this.FormStore.price_buy == '' || this.FormStore.price_sell == '') {
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
            this.FormStore.name = '';
            this.FormStore.image = '';
            this.FormStore.amount = '';
            this.FormStore.price_buy = '';
            this.FormStore.price_sell = '';
            this.FormStore.protype_id = '';


        },
        CancalStore() {
            this.ShowForm = false;
        },
        SaveStore() {
            if (this.FormType) {
                // add the store
                axios.post('api/ProductList/add', this.FormStore, { headers: { "content-type": "multipart/form-data", Authorization: 'Bearer ' + this.store.get_token } }).then((res) => {
                    console.log(res.data);

                    if (res.data.success) {
                        this.ShowForm = false;
                        this.GetStore()


                    } else {



                    }


                }).catch((error) => {
                    console.log(error);

                })
            } else {
                // update the store



            }

        },
        GetStore() {
            axios.get(`api/ProductList`, this.FormStore, { headers: { "content-type": "multipart/form-data", Authorization: 'Bearer ' + this.store.get_token } }).then((res) => {
                this.StoreData = res.data

                if (res.data.success) {
                    this.ShowForm = false;

                } else { }


            }).catch((error) => {
                console.log(error);

            })
        },
        GetCombo() {
            axios.get(`api/ProductList/initem`, this.FormStore, { headers: { "content-type": "multipart/form-data", Authorization: 'Bearer ' + this.store.get_token } }).then((res) => {

                this.ComboData = res.data

                if (res.data.success) {
                    // this.ShowForm = false;

                } else { }


            }).catch((error) => {
                console.log(error);

            })
        },

    },
    created() {
        this.GetStore()
        this.GetCombo()
    },


};
</script>

<style lang="scss" scoped></style>