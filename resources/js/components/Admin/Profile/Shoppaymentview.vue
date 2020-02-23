<template>
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
                          
                           <td>    
                         <span class="btn btn-sm btn-danger" @click.prevent="activestatus(paidinfo._id)" v-if="paidinfo.status==2"><i class="fas fa-ban"></i> </span>
                         <span class="btn btn-sm btn-primary" @click.prevent="inactivestatus(paidinfo._id)"  v-else><i class="fas fa-check-square"></i></span>
                         </td>
                       <td>
                        
                                            
                        <button type="button" class="btn btn-default" @click="updateShop(paidinfo._id)"  data-toggle="modal" data-target="#updateModal">
                  <i class="fas fa-edit"></i>
                </button>
                        
                        
                    </td>
                       <td>
                        <button class="btn btn-sm btn-warning" @click.prevent="deletePayment(paidinfo._id)"><i class="fas fa-trash-alt"></i></button>
                        
                        
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
         
            axios.get(`http://127.0.0.1:8000/admin/shoppaymentcheck`)
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
            activestatus(id){
      axios
        .post("/admin/shoppaymentactive/" + id)
        .then(({ response = true }) => {
          [toastr.info("Payment  Successfully", "Payment")],[this.$router.go(0)];
        })
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for inactive account
// alert('Hello');
    },
      inactivestatus(id){
      axios .post("/admin/shoppaymentinactive/" + id)
        .then(({ response = true }) => {
          [toastr.success("Payment invalid Successfully", "Payment")],[this.$router.go(0)];
        })
        .catch(function(response = false) {
          console.log(response);
          toastr.error("Sorry Try Agin");
        }); //for active Account
// alert('Hello');
    },

           
        }
    }

</script>
