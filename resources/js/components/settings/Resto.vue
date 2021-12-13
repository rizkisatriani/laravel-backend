<template >
    <div class="content-wrapper">
  <pre-loader v-if="loading"/>
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User Subscribe Ruang Guru</h1>
                        <p><b>Prize</b> for user  </p>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Subscriptions</a></li> 
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
                                <h3 class="card-title">List Of User</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                        <i class="fa  fa-minus"></i></button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                                        <i class="fa  fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body table-responsive   ">     
                                <div class="base-demo">
                                    <vue-table-dynamic :params="params" >
                                        <template v-slot:column-5="{ props }">
                                            <span class="cell--slot-2">  
                                               <select v-model="props.rowData[5].data"> 
                                                <option>Created</option>
                                                <option>Rejected</option>
                                                <option>In Order</option>
                                                </select>
                                                <button class="btn btn-outline-primary btn-xs lg-6" size="mini" @click="update(props)">Process</button> 
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
        <!-- <div class="modal fade" id="modal-default" ref="modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Data User</h4>
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
            </div> 
        </div> -->
  <!-- <div class="modal fade" id="modal-default" ref="modal_maps">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-sm" @click="save_modal()">Save changes</button>
                    </div>
                </div> 
            </div> 
        </div>   -->
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
            user_id: "",
            status_name: "Created",
            modaledit: false,
            status: false,
            nama: '',
            keterangan:'',
            user_delivery_address: '',
            contact_number: '',
            contact_person_name: '',
            params: {
                header: 'row',
                data: [
                    ['No', `User Id` , `User Delivery Address`, `Contact Number`, `Contact Person Name`, `Status`]
                ],
                border: true,
                enableSearch: true,
                sort: [0, 1],
                stripe: true,
                pagination: true,
                pageSize: 10,
                pageSizes: [5, 10, 20, 50],
                columnWidth: [{ column: 0, width: 90 }, { column: 1, width: 200}, { column: 2, width: 250 }, { column: 3, width: 250 }, { column: 4, width:250 }, { column: 5, width: 250}, { column: 6, width: 250 }],
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
                    console.log(response.data.data.nama_resto);
                     this.params.data.push([
                             `${response.data.data.id}`
                            , `${response.data.data.nama_resto}`
                            , `${response.data.data.keterangan}`
                            , `${response.data.data.alamat}`
                            , `${response.data.data.coordinat}`
                            , `${response.data.data.status}`]);
                    
                    this.nama = "";
                    this.keterangan = "";
                    this.alamat = "";
                    this.kordinat = "";
                }.bind(this));
            }

        },
        update(data) { 
           
          this.loading=true; 
             
                const params = new URLSearchParams();
                params.append('id', data.rowData[0].data);
                params.append('status', data.rowData[5].data); 
                axios({
                    method: 'post',
                    url: '/api/edit-sub',
                    data: params
                }).then(function(response) {
              
                     this.$router.go();
                }.bind(this)); 
 
        }, 
        showdata() {
            const headers = {
                "Authorization": "Bearer if need token",
                "My-Custom-Header": "foobar"
            };
            axios.get("api/get-sub-ruang-guru", { headers })
                .then(function(response) { 
                    for (let i = 0; i < response.data.data.length; i++) {

                        
                        this.params.data.push([
                              `${response.data.data[i].id}`
                            , `${response.data.data[i].user_id}`
                            , `${response.data.data[i].user_delivery_address}`
                            , `${response.data.data[i].contact_number}`
                            , `${response.data.data[i].contact_person_name}`
                            , `${response.data.data[i].status}` ]);
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
