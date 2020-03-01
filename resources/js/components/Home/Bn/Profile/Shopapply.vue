<template>
    <!-- Horizontal Form -->
    <div class="card card-info mt-5 container bg-info">
        <div class="card-header">
            <h2 class="card-title center"><Strong>Apply For Shop</Strong></h2>
        </div>

               

        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" class="" @submit.prevent="applyshop">
            <div class="card-body">
        
                <div class="form-group">
                    <label for="shoptype">Shop Type</label>
                    <select :class="{'is-invalid' :form.errors.has('shoptype')}" v-model="form.shoptype" id="shoptype" class="form-control">
                  <option disabled  value="">Select One</option>
                      <option value="bike">Bike</option>
                      <option value="car">Car</option>
                      <option value="accessories">Accessories</option>
                      <option value="all">All</option>
                    </select>
                   <has-error :form="form" field="shoptype"></has-error>
                  </div>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Apply </button>
                <router-link to="/en/myprofile" class="btn btn-default ">Cancel</router-link>
            </div>
            <!-- /.card-footer -->
        </form>
    </div>
</template>

<script>
    export default {
        name: 'Bike',
        data() {
            return {
                form: new Form({
                    shoptype: '',
                   
                }),
            

            }
        },
        create() {
           document.title="Apply"
           

        },
        mounted(){

            var user= localStorage.getItem("user");
            var shoptype=JSON.parse(localStorage.getItem("user")).shoptype;
                if(!user){
               this.$router.push("/en/login") 
            }
            else{
               if(shoptype !=0){
              
                      this.$router.push('/en/paidmyaccount')
                      }
            }

        },
        methods: {
            applyshop() {
              //alert(5);
                  //console.log(this.form);
                this.form.post("/en/applyform", this.form)
                    .then(response => {
                        [toastr.success('Apply Submit Successfully','Pay Now')], [this.$router.push('/en/paidmyaccount')]
                        
                    })
                    .catch(response => {
                        //console.log(response);
                        [toastr.warning("Sorry Try Again"), ]
                    });
            },
           

            //  [localStorage.setItem("token", response.data.token)], [this.$route.defaults.headers.common['Authorization']="Token " + localStorage.getItem("token")],
        }
    }

</script>
