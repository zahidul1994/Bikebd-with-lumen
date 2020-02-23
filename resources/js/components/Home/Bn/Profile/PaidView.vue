<template>
<span>
     <!-- /.col -->
          <div class="col-md-12">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username" ></h3>
                
                
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="/images/shopprofile/1577623707_5e089dfc41270000780076e7_456542.jpeg" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
           <!--create Modal-->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Shop Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="clearefrom()">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <form role="form" @submit.prevent="userShop">
             
                <div class="card-body">
                                    <div class="form-group">
                    <label for="amount">Pay Amount</label>
                     <input  v-model="form.amount" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('amount') }" id="amount" placeholder="Your Ammount">
                        <has-error :form="form" field="shopname"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="payingby">Paid By</label>
                    <select :class="{'is-invalid' :form.errors.has('payingby')}" v-model="form.payingby" id="paying" class="form-control">
                  <option disabled  value="">Select One</option>
                      <option value="Bikas">Bikas</option>
                      <option value="Rocket">Rocket</option>
                      <option value="Bank">Bank</option>
                    </select>
                   <has-error :form="form" field="payingby"></has-error>
                  </div>
                   <div class="form-group">
                    <label for="tarnsaction">Transaction No</label>
                     <input  v-model="form.transaction" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('transaction') }" id="tarnsaction" placeholder="Your Tarnsaction Number ">
                        <has-error :form="form" field="transaction"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="date">Date</label>
                     <input  v-model="form.paiddate" type="date" class="form-control" :class="{ 'is-invalid': form.errors.has('paiddate') }" id="date" placeholder="Your Transaction Paid date ">
                        <has-error :form="form" field="paiddate"></has-error>
                  </div>
    



                </div>
                <!-- /.card-body -->
 <button type="submit" class="btn btn-primary">Submit</button>
  <button type="button" class="btn btn-default" data-dismiss="modal" @click="clearefrom()">Close</button>
                  </form>
         
              
            </div>
            <div class="modal-footer justify-content-between">
            
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!--create Modal-->


        <!--Update Modal-->
      <div class="modal fade" id="updateModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Shop Update</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="clearefrom()">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <form role="form" @submit.prevent="userPaidUpdate(paidid)">
             
                <div class="card-body">
                      <div class="form-group">
                    <label for="updatepayingby">Paid By</label>
                    <select :class="{'is-invalid' :form.errors.has('payingby')}" v-model="form.payingby" id="updatepaying" class="form-control">
                  <option disabled  value="">Select One</option>
                      <option value="Bikas">Bikas</option>
                      <option value="Rocket">Rocket</option>
                      <option value="Bank">Bank</option>
                    </select>
                   <has-error :form="form" field="updatepayingby"></has-error>
                  </div>
                   <div class="form-group">
                    <label for="tarnsaction">Transaction No</label>
                     <input  v-model="form.transaction" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('transaction') }" id="updatetarnsaction" placeholder="Your Tarnsaction Number ">
                        <has-error :form="form" field="transaction"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="updatedate">Date</label>
                     <input  v-model="form.paiddate" type="date" class="form-control" :class="{ 'is-invalid': form.errors.has('paiddate') }" id="updatedate" placeholder="Your Transaction Paid date ">
                        <has-error :form="form" field="paiddate"></has-error>
                  </div>
    



                </div>
                <!-- /.card-body -->
 <button type="submit" class="btn btn-primary">Update</button>
  <button type="button" class="btn btn-default"  data-dismiss="modal" @click="clearefrom()">Close</button>
                  </form>
        
            </div>
            <div class="modal-footer justify-content-between">
             
              
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!--Update Modal-->


                <div class="card">
            <div class="card-header">
              <h3 class="card-title">Shop Paid Info </h3>
                <div class="text-right">  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                  Pay Now
                </button></div>
            </div>
          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl</th>
                  <th>Date</th>
                  <th>Pay By</th>
                  <th>Transaction</th>
                  <th>Paid Date</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="paidinfo, index in userpaid">
                        
                          <td>{{ index + 1 }}</td>
                          <td>{{ paidinfo.created_at }}</td>
                            <td>{{paidinfo.payingby}}</td>
                          <td>{{paidinfo.transaction}}</td>
                          <td>{{paidinfo.paiddate}}</td>
                          <td v-if="paidinfo.status==2">Pending</td>
                          <td v-else>Complete</td>
                       <td>
                        
                                            
                        <button type="button" class="btn btn-default" @click="updateShop(paidinfo.id)"  data-toggle="modal" data-target="#updateModal">
                  <i class="fas fa-edit"></i>
                </button>
                        
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deletePayment(paidinfo.id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
                    </td>
                </tr>
                
                </tbody>
                <!-- <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                 
                </tr>
                </tfoot> -->
              </table>
            </div>
            <!-- /.card-body -->
          </div>
      <!-- /.modal -->
      </span>
</template>

<script>
    export default {
        name: 'PaidView',
        data() {
            return {
                form: new Form({
                    payingby: '',
                    transaction: '',
                    paiddate: '',
                   
                }),
                gender: null,
                userpaid:null,
                paidid:null,

            }
        },
        mounted() {
          var user= localStorage.getItem("user");
     
      if(!user){
       
          this.$router.push("/en/login") 
        }
            axios.get(`http://127.0.0.1:8000/en/paidmyaccount`)
                .then(response => {
                    (this.userpaid = response.data.userpaid)
                    //console.log(response);

                });
           
        },
        methods: {
            userShop() {
              //alert(5);
                //console.log(this.form);
                this.form.post("/en/createshop", this.form)
                    .then(response => {
                        [toastr.success('Shop Create Successfull')],[$("#modal-default").modal("toggle")],[this.form.reset()],[this.$router.go(0)]
                        
                    })
                    .catch(response => {
                        //console.log(response);
                        [toastr.warning("Sorry Try Agin"), ]
                    });
                   
            },
            clearefrom(){
              this.form.reset()
            },
            deletePayment(id) {
      if (confirm("Do you really want to delete it tipu?")) {
                   
      axios.delete("/en/shoppaiddelete/" + id)

          .then(({ response =true}) => { [toastr.success('Payment Delete Successfull')],[[this.$router.go(0)]]})
        
      
      }
      },
     
    updateShop(id){
     // console.log(this.form);
       axios.get(`/en/editshoppayment/`+id)
                .then((response)=>{
                   // console.log(response.data)
                    this.form.fill(response.data.shoppayment)
                }),
                this.paidid=id;

    },
      userPaidUpdate(id) {
              this.form.put(`/en/updateshoppayment/`+id)
                         .then(response => {
                        [toastr.success('Shop Update Successfully')],[$("#updateModal").modal("toggle")],[this.form.reset()],[this.$router.go(0)]
                        
                    })
                    .catch(response => {
                       // console.log(response);
                        [toastr.warning("Sorry Try Agin Tipu Sultan"), ]
                    });
                   
            },

           
        }
    }

</script>
