<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Account Type</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="UpdateAccounttype">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="gender">Account Type</label>
                     <input  v-model="form.accounttype" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('accounttype') }" id="gender" placeholder="Gender Name">
                        <has-error :form="form" field="accounttype"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/superadmin/accounttypelist" class="btn btn-default ">Cancle</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditAccounttype',
        created () {
            document.title = "Edit Account Type";
        },
      mounted(){
          axios.get(`/superadmin/editaccountype/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.accounttypes)
          })
      },
        data(){
        return {
          form: new Form({
            accounttype:'',
          })
          
        }
    },
    
    
    methods: {
      UpdateAccounttype(){
        this.form.patch('/superadmin/updateaccountype/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Account Type Update Successfull')],[this.$router.push('/superadmin/accounttypelist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>