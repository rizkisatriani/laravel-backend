<template>
    <div class="content-wrapper">
        <pre-loader v-if="loading" />
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Master Barang</h1>
                        <p><b>Data Barang</b> merupakan item barang yang akan di pakai dalam transaksi.</p>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Master</a></li>
                            <li class="breadcrumb-item active">Barang</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Default box -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Barang</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fa  fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                        <i class="fa  fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body table-responsive   ">
                                <button class='btn btn-primary btn-sm ' @click="showmodal_add()"><i class="fa  fa-plus"></i><span> Tambah</span></button>
                                <div class="base-demo">
                                    <vue-table-dynamic :params="params">
                                        <template v-slot:column-4="{ props }">
                                            <span class="cell--slot-2">
                                                <button class="btn btn-outline-success btn-xs lg-6" size="mini" @click.stop="testSlot(props)">Edit</button>
                                            </span>
                                        </template>
                                    </vue-table-dynamic>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <strong>Copyright &copy; <a href="../index.php">Algebraic</a>.</strong> All rights reserved.
                            </div>
                            <!-- /.card-footer-->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
        <div class="modal fade" id="modal-default" ref="modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Data Barang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" v-model="nama" id="nama" placeholder="Silahkan tulis nama Level">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Barcode</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" v-model="nama" id="nama" placeholder="Silahkan tulis nama Level">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Harga Modal</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" v-model="nama" id="nama" placeholder="Silahkan tulis nama Level">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Harga Jual</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" v-model="nama" id="nama" placeholder="Silahkan tulis nama Level">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Minimal Stock</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" v-model="nama" id="nama" placeholder="Silahkan tulis nama Level">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Stock</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" v-model="nama" id="nama" placeholder="Silahkan tulis nama Level">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Jenis</label>
                            <div class="col-sm-10  select ">
                            <vue-select class="vue-select3" name="select3"
                                :options="options3" :model.sync="result3"
                                :searchable="true" language="zh-CN">
                            </vue-select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" v-model="keterangan" placeholder="Silahkan tulis keterangan Level (Opsional)" ng-model="myTextarea" required data-error="Please enter customer notes"></textarea>
                            </div>
                        </div>
                        <template v-if="modaledit">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <label class="switch">
                                        <input type="checkbox" checked @click="update_status()" v-model="status">
                                        <span class="slider round"></span>
                                    </label>
                                    <span>{{status_name}}</span>
                                </div>
                            </div>
                        </template>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-sm" @click="save_modal()">Save changes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
</template>
<script>
import VueTableDynamic from 'vue-table-dynamic'
import preloader from '../inc/PreLoader.vue'
import vSelect from 'vue-select'

const random = () => {
    return parseInt(Date.now() + Math.random() * 10000000).toString(16).slice(-6)
}

export default {
    name: 'Level',
    data() {
        return {
            options3: [
      'foo',
      'bar',
      'baz'], 
    result3: "",
            renderComponent: true,
            loading: true,
            index: 0,
            id: "",
            status_name: "Aktif",
            modaledit: false,
            status: false,
            nama: '',
            keterangan: '',
            params: {
                header: 'row',
                data: [
                    [   'No',
                        `Nama`,
                        `Stock`,
                        `Status`,
                        `Action`,
                        `Barcode`,
                        `Harga Modal`,
                        `Harga Jual`,
                        `Stock Minimal`,
                        `Jenis`,
                        `Type`,
                        `Merek`,
                        `Keterangan`
                    ]
                ],
                border: true,
                enableSearch: true,
                sort: [0, 1,11],
                stripe: true,
                pagination: true,
                pageSize: 10,
                pageSizes: [5, 10, 20, 50],
                columnWidth: [
                    { column: 0, width: 60 },
                    { column: 1, width: 350 },
                    { column: 2, width: 150 },
                    { column: 3, width: 150 },
                    { column: 4, width: 100 },
                    { column: 5, width: 120 },
                    { column: 6, width: 100 },
                    { column: 7, width: 100 },
                    { column: 8, width: 100 },
                    { column: 9, width: 150 },
                    { column: 10, width: 100 },
                    { column: 10, width: 100 },
                    { column: 11, width: 100 },
                    { column: 12, width: 450 }
                ],
                height: 290

                /*,
                        fixed: 0 */
            }
        }
    },
    mounted() {
        this.showdata();
        /**/
    },
    components: {
        VueTableDynamic,
        'pre-loader': preloader,
        "vue-select": vSelect
    },
    methods: {
        forceRerender() {
            // Remove my-component from the DOM
            this.renderComponent = false;

            this.$nextTick(() => {
                // Add the component back in
                this.renderComponent = true;
            });
        },
        testSlot(slotData) {
            this.modaledit = true;
            let element = this.$refs.modal;
            $(element).modal('show');
            console.log('testSlot ', slotData)
            this.id = slotData.rowData[4].data;
            this.nama = slotData.rowData[1].data;
            this.keterangan = slotData.rowData[2].data;
            this.index = slotData.cellData;
            if (slotData.rowData[3].data == "Aktif") {
                this.status = true;
                this.status_name = "Aktif";
            } else {
                this.status = false;
                3
                this.status_name = "Non Aktif";
            }
        },
        showmodal_add() {
            this.modaledit = false;
            let element = this.$refs.modal;

            this.id = "";
            this.nama = "";
            this.keterangan = "";
            $(element).modal('show');
        },
        update_status() {
            if (this.status == false) {
                this.status_name = "Aktif";
            } else {
                this.status_name = "Non Aktif";
            }
        },
        save_modal() {
            if (this.modaledit == false) {
                this.insert();
            } else {
                console.log("update");
                this.update();
            }
        },
        insert() {
            if (this.nama == "") {
                alert("Nama level belum di isi");
            } else {
                var ket = "-";
                if (this.keterangan == "") {

                } else {
                    ket = this.keterangan;
                }
                const params = new URLSearchParams();
                params.append('nama', this.nama);
                params.append('keterangan', ket);
                axios({
                    method: 'post',
                    url: '/api/storelevel',
                    data: params
                }).then(function(response) {
                    switch (response.data.data.status) {
                        case 1:
                            status = "Aktif";
                            break;
                        case 0:
                            status = "Tidak Aktif";
                            break;
                        default:
                    }
                    this.params.data.push([this.params.data.length, response.data.data.nama, response.data.data.keterangan, status, response.data.data.id]);
                    this.nama = "";
                    this.keterangan = "";
                }.bind(this));
            }

        },
        update() {
            this.loading = true;
            if (this.nama == "") {
                alert("Nama level belum di isi");
            } else {
                var ket = "-";
                var status = 1;
                if (this.keterangan == "") {

                } else {
                    ket = this.keterangan;
                }
                if (this.status == true) {
                    status = 1;
                } else {
                    status = 0;
                }
                const params = new URLSearchParams();
                params.append('nama', this.nama);
                params.append('id', this.id);
                params.append('keterangan', ket);
                params.append('status', status);
                axios({
                    method: 'post',
                    url: '/api/updatelevel',
                    data: params
                }).then(function(response) {
                    /*this.params.data.slice(2,this.params.data.length); 
                    this.showdata(); 
                    console.log(response);*/
                    console.log("update3", this.params.data[1][3]);
                    switch (response.data.data.status) {
                        case 1:
                            status = "Aktif";
                            break;
                        case 0:
                            status = "Tidak Aktif";
                            break;
                        default:
                    }
                    /*this.params.data[this.index]=[this.params.data.length, response.data.data.nama, response.data.data.keterangan, status, response.data.data.id]*/
                    let element = this.$refs.modal;

                    this.id = "";
                    this.nama = "";
                    this.keterangan = "";
                    this.$router.go();
                }.bind(this));
            }

        },
        showdata() {
            const headers = {
                "Authorization": "Bearer my-token",
                "My-Custom-Header": "foobar"
            };
            axios.get("api/showbarang", { headers })
                .then(function(response) {
                    var status = "";
                    for (let i = 0; i < response.data.data.length; i++) { 
                        switch (response.data.data[i].status) {
                            case "1":
                                status = "Aktif";
                                break;
                            case "0":
                                status = "Tidak Aktif";
                                break;
                            default:
                        }   
                        this.params.data.push([
                            i + 1,
                            `${response.data.data[i].nama}`,
                            `${response.data.data[i].stock}`,
                            `${status}`,
                            `${response.data.data[i].id}`,
                            `${response.data.data[i].barcode}`,
                            `${response.data.data[i].harga_modal}`,
                            `${response.data.data[i].harga_jual}`,
                            `${response.data.data[i].minimal_stock}`,
                            `${response.data.data[i].jenis}`,
                            `${response.data.data[i].type}`,
                            `${response.data.data[i].merek}`,
                            `${response.data.data[i].keterangan}`
                        ]);
                    }

                    this.loading = false;
                }.bind(this)).catch(error => {
                    console.log(error)
                    this.errored = true
                })
                .finally(() =>
                    console.log("finish"),
                );
        }
    }
}

</script>
