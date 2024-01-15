<template>
    <div>


        <div class="card">
            <h5 class="card-header">ລາຍການ ສະຕ໋ອກສິນຄ້າ</h5>
            <div class="card-body">

                <div v-if="ShowForm">
                    <div class=" d-flex justify-content-end">
                        <button type="button" class="btn btn-success me-2">ບັນທຶກ</button>
                        <button type="button" class="btn btn-secondary" @click="CancalStore()">ຍົກເລີກ</button>
                    </div>
                    <hr>
                    <div class="row">
                        <div class=" col-md-8">
                            <div>
                                <label class="form-label fs-6">ເລກໂຕະ: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-2" placeholder=".....">
                                <label class="form-label fs-6">ສະຖານະ: <span class="text-danger">*</span></label>
                                <select class="form-select">
                                    <option value="ວ່າງ">ວ່າງ</option>
                                    <option value="ວ່າງ">ກຳລັງໃຊ້ງານ</option>
                                </select>
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
                                <th width="70">ລະຫັດ</th>
                                <th>ເລກໂຕະ</th>
                                <th>ສະຖານະ</th>
                                <th>ຈັດການ</th>
                            </tr>
                        </thead>
                        <tbody class="table-secondary">
                            <tr>
                                <td class="text-end">A</td>
                                <td class="text-end">A</td>
                                <td class="text-end">A</td>
                                <td class=" text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i> ແກ້ໄຂ</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-trash me-1"></i>
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


    </div>
</template>

<script>
export default {
    name: 'WorkspaceJsonExForm',

    data() {
        return {
            ShowForm: false,

        };
    },

    mounted() {

    },

    methods: {
        AddStore() {
            this.ShowForm = true;
        },
        CancalStore() {
            this.ShowForm = false;
        }
    },
};
</script>

<style lang="scss" scoped></style>