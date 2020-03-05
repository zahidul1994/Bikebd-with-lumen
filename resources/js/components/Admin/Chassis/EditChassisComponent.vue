<template>
 <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Chassis</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
               <form role="form"  @submit.prevent="updateChassis">
             
                <div class="card-body">
                  <div class="form-group">
                    <label for="chassis">Chassis</label>
                     <input  v-model="form.chassis" type="text" class="form-control" :class="{ 'is-invalid': form.errors.has('chassis') }" id="chassis" placeholder="Chassis Name">
                        <has-error :form="form" field="chassis"></has-error>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                   <router-link to="/admin/chassislist" class="btn btn-default ">Cancel</router-link>
               </div>
            </form>
                </div>

</template>

<script>
    export default {
      name:'EditChassis',
       created () {
            document.title = "Edit Chassis";
        },
      mounted(){
          axios.get(`/admin/editchassis/${this.$route.params.id}`)
          .then((response)=>{
              this.form.fill(response.data.chassis)
          })
      },
        data(){
        return {
          form: new Form({
            chassis:'',
          })
          
        }
    },
    
    
    methods: {
      updateChassis(){
        this.form.patch('/admin/updatechassis/'+`${this.$route.params.id}`)
        //console.log('ok');
        .then(({ response }) => { [toastr.success('Chassis Update Successfull')],[this.$router.push('/admin/chassislist')]})
        .catch(function (response) {console.log(response);toastr.warning("Sorry Try Agin"); });
      }
       
    }
  }
</script>