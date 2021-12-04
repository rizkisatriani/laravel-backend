<template >
    <div class="content-wrapper">
  <pre-loader v-if="loading"/>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Resto</h1>
                        <p><b>Data Resto</b> merupakan daftar atribute resto mencakup Nama, alamat ,kordinat dll.  </p>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Master</a></li>
                            <li class="breadcrumb-item active">Level</li>
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
                                <h3 class="card-title">Daftar Jenis</h3>
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
                                    <vue-table-dynamic :params="params" >
                                        <template v-slot:column-6="{ props }">
                                            <span class="cell--slot-2">
                                                <button class="btn btn-outline-primary btn-xs lg-6" size="mini" @click="view(props)">View</button>
                                                <button class="btn btn-outline-success btn-xs lg-6" size="mini" @click="testSlot(props)">Edit</button> 
                                                <button class="btn btn-outline-danger btn-xs lg-6" size="mini" @click="delete_data(props)">Delete</button> 
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
                        <h4 class="modal-title">Data Resto</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Nama Resto</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" v-model="nama" id="nama" placeholder="Silahkan tulis nama resto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" v-model="keterangan" placeholder="Silahkan tulis keterangan resto (Opsional)" ng-model="myTextarea" required data-error="Please enter customer notes"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" v-model="alamat" placeholder="Silahkan tulis alamat resto" ng-model="myTextarea" required data-error="Please enter customer notes"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Kordinat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" v-model="kordinat"   placeholder="Silahkan tulis Kordinat resto">
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
  <div class="modal fade" id="modal-default" ref="modal_maps">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    
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

const random = () => {
    return parseInt(Date.now() + Math.random() * 10000000).toString(16).slice(-6)
}

export default {
    name: 'Level',
    data() {
        return { 
            renderComponent: true,
            loading: true,
            index: 0,
            id: "",
            status_name: "Aktif",
            modaledit: false,
            status: false,
            nama: '',
            keterangan: '',
            alamat: '',
            kordinat: '',
            params: {
                header: 'row',
                data: [
                    ['No', `Nama`, `Keterangan`, `Alamat`, `Kordinat`, `Status`, `Action`]
                ],
                border: true,
                enableSearch: true,
                sort: [0, 1],
                stripe: true,
                pagination: true,
                pageSize: 10,
                pageSizes: [5, 10, 20, 50],
                columnWidth: [{ column: 0, width: 50 }, { column: 1, width: 200}, { column: 2, width: 250 }, { column: 3, width: 150 }, { column: 4, width:150 }, { column: 5, width: 150}, { column: 6, width: 150 }],
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
    components: { VueTableDynamic, 
            'pre-loader': preloader,  },
    methods: {forceRerender() {
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
            this.id = slotData.rowData[6].data;
            this.nama = slotData.rowData[1].data;
            this.keterangan = slotData.rowData[2].data;
            this.alamat = slotData.rowData[3].data;
            this.kordinat = slotData.rowData[4].data;
            this.index = slotData.cellData;
            if (slotData.rowData[5].data == "Aktif") {
                this.status = true;
                this.status_name = "Aktif";
            } else {
                this.status = false;
                this.status_name = "Non Aktif";
            }
        }, view(slotData) { 
            this.kordinat = slotData.rowData[4].data; 
            this.nama = slotData.rowData[1].data;
           window.open('http://www.google.com/maps/place/'+this.kordinat+'/@'+this.kordinat+',17z');
        }, delete_data  (slotData) { 

            this.id = slotData.rowData[6].data;
          var result = confirm("Apakah anda yakin ingin menghapus data ini ?");
                if (result) {
                this.loading=true;
                  const params = new URLSearchParams(); 
                params.append('id', this.id); 
                axios({
                    method: 'post',
                    url: '/api/deleteresto',
                    data: params
                }).then(function(response) {  
                    
                     this.$router.go();
                }.bind(this));
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
                alert("Nama resto belum di isi");
            }else if (this.alamat == "") {
                alert("Alamat Resto belum di isi");
            } else if (this.kordinat == "") {
                alert("kordinat resto belum di isi");
            }else {
                var ket = "-";
                if (this.keterangan != "") { 
                    ket = this.keterangan;
                }  
                const params = new URLSearchParams();
                params.append('nama', this.nama);
                params.append('keterangan', ket);
                params.append('alamat', this.alamat);
                params.append('kordinat', this.kordinat);
                axios({
                    method: 'post',
                    url: '/api/storeresto',
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
                    console.log(response.data.data.nama_resto);
                     this.params.data.push([
                            this.params.data.length
                            , `${response.data.data.nama_resto}`
                            , `${response.data.data.keterangan}`
                            , `${response.data.data.alamat}`
                            , `${response.data.data.coordinat}`
                            , `${status}`
                            , `${response.data.data.id}`]);
                    
                    this.nama = "";
                    this.keterangan = "";
                    this.alamat = "";
                    this.kordinat = "";
                }.bind(this));
            }

        },
        update() {
            if (this.nama == "") {
                alert("Nama level belum di isi");
            }else if (this.alamat == "") {
                alert("Alamat Resto belum di isi");
            } else if (this.kordinat == "") {
                alert("kordinat resto belum di isi");
            } else {
          this.loading=true;
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
                params.append('alamat', this.alamat);
                params.append('kordinat', this.kordinat);
                params.append('keterangan', ket);
                params.append('status', status);
                axios({
                    method: 'post',
                    url: '/api/updateresto',
                    data: params
                }).then(function(response) {
                    /*this.params.data.slice(2,this.params.data.length); 
                    this.showdata(); 
                    console.log(response);*/
                    console.log("update3",this.params.data[1][3]); 
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
            axios.get("api/showresto", { headers })
                .then(function(response) {
                    var status = "";
                    for (let i = 0; i < response.data.data.length; i++) {

                        switch (response.data.data[i].status) {
                            case 1:
                                status = "Aktif";
                                break;
                            case 0:
                                status = "Tidak Aktif";
                                break;
                            default:
                        }
                        this.params.data.push([
                            i + 1
                            , `${response.data.data[i].nama_resto}`
                            , `${response.data.data[i].keterangan}`
                            , `${response.data.data[i].alamat}`
                            , `${response.data.data[i].coordinat}`
                            , `${status}`
                            , `${response.data.data[i].id}`]);
                    }
                    console.log(this.params.data);
                    
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
